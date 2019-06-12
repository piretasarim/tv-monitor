<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Model extends CI_Model {
	protected $tableName;
	protected $name;
	protected $primaryKey = 'id';
	protected $multiPKSeparator = '.';
	protected $fields = array();
    protected $resultMode = 'array'; /* [array, object] */
    public $last_query = '';
    public $last_count_query = '';

	function __construct() {
		parent::__construct();
		$this->name = get_class($this);
		if (empty($this->tableName))
			$this->tableName = $this->name;

		$this->load->database();
	}

	public function getFields() {
      if (empty($this->fields)) {
         $this->fields = $this->db->list_fields($this->tableName);
		}
		return $this->fields;
	}

   public function findAll($order=null, $limit=null, $pages=null) {
      return $this->find(null, $order, $limit, $pages);
   }

   public function findById($value) {
		$filter = null;
		if (is_array($this->primaryKey)) {
			$ids = explode($this->multiPKSeparator, $value);
			foreach($this->primaryKey as $idx => $key) {
				$filter["{$this->tableName}.{$key}"] = $ids[$idx];
			}
		} else {
			$filter = array("{$this->tableName}.{$this->primaryKey}" => $value);
		}
      $tmp = $this->find(compact('filter'));
      return $tmp[0];
   }
	
	
   public function find($filters=null, $order=null, $limit=null, $offset=null,$fields=null) { 
	// print_r($filters);

		if (is_array($filters)) {
			extract($filters);
		} else {
			$filter = $filters;
		}

      if (!empty($limit) && !empty($offset)) {
         $this->db->limit($limit, $offset);
      } elseif (!empty($limit)) {
         $this->db->limit($limit);
      }

      if (is_array($order)) {
         foreach ($order as $key => $value) {
            $this->db->order_by($key, $value);
         }
      } elseif (!empty($order)) {
         $this->db->order_by($order);
      }

      if (!empty($filter)) {
         $this->db->where($filter);
      }	
	 
      $this->beforeFind();

		if (isset($join)) {
			foreach($join as $table => $val) {
				//list($condition, $type) = each($val);
				//$this->db->join($table, $condition, $type);
				$this->db->join($table, @$val[0], @$val[1]);
			}
		}

		$strId = "";
		if (is_array($this->primaryKey)) {
			$strId = "CONCAT_WS('{$this->multiPKSeparator}'";
			foreach($this->primaryKey as $idx => $key) {
				$strId .= ", {$this->tableName}.{$key}";
			}
			$strId .= " ) as id, ";
		} else {
			$strId = "{$this->tableName}.{$this->primaryKey} as id, ";
		}
        

      $this->getFields();
		if (isset($fields)) {
			$strFields = $strId . (is_array($fields) ? implode(', ', $fields) : $fields);
		} else {
			if ($this->primaryKey != 'id') {
				$strFields = $strId . implode(', ', $this->fields);
			} else {
				$strFields = implode(', ', $this->fields);
			}
		}
	 
      $this->db->select($strFields, false);
      $query = $this->db->get($this->tableName);
      $this->last_query = $this->db->last_query();
      if ($query->num_rows() > 0) {
         if ($this->resultMode === 'object') {
            return $query->result();
         } else {
            return $query->result_array();
         }
      }
	 
   }

   protected function beforeFind() {
      return true;
   }

   public function findCount($filters=null) {
		if (is_array($filters)) {
			extract($filters);
		} else {
			$filter = $filters;
		}

      if (!empty($filter)) {
         $this->db->where($filter);
      }

      $this->beforeFind();

		if (isset($join)) {
			foreach($join as $table => $val) {
				//list($condition, $type) = each($val);
				$this->db->join($table, $val[0], @$val[1]);
			}
		}

      // $query = $this->db->get($this->tableName);
      $this->db->from($this->tableName);
      $num_rows = $this->db->count_all_results();
      $this->last_count_query = $this->db->last_query();
      return $num_rows;
   }

	public function save($data,$getID = null) {
		$this->getFields();
      foreach ($this->fields as $field) {
         if (isset($data[$field]))
            $this->db->set($field, $data[$field]);
      }
		if (!isset($data['id'])) {
			$return = $this->db->insert($this->tableName);
			$last_id = $this->db->insert_id();
		} else {

			if (is_array($this->primaryKey)) {
				$ids = explode($this->multiPKSeparator, $data['id']);
				foreach($this->primaryKey as $idx => $key) {
					$this->db->where("{$this->tableName}.{$key}", $ids[$idx]);
				}
			} else {
				$this->db->where("{$this->tableName}.{$this->primaryKey}", $data['id']);
			}

			$return = $this->db->update($this->tableName);
		}

		if($getID)
        return $last_id;
		else
		return $return;
	}

	public function delete($id) {
		if (is_array($this->primaryKey)) {
			$ids = explode($this->multiPKSeparator, $id);
			foreach($this->primaryKey as $idx => $key) {
				$this->db->where("{$this->tableName}.{$key}", $ids[$idx]);
			}
		} else {
			$this->db->where("{$this->tableName}.{$this->primaryKey}", $id);
		}
      return $this->db->delete($this->tableName);
   }
   
   public function dataTableParser($args=array(), $listFields=null, $action=null, $extra=null,$filter_manual = null) {
      if (is_array($extra)) {
			extract($extra);
		}

		if (empty($listFields)) {
         $listFields = $this->getFields();
         $listFields = array_combine($listFields, $listFields);
      }

      $aColumns = array_keys($listFields);
      #$sIndexColumn = $this->model->primaryKey;

      /*
      * Paging
      */
      $sLimit = $sOffset = "";
      if ( isset( $args['iDisplayStart'] ) && $args['iDisplayLength'] != '-1' ) {
         $sOffset = mysqli_real_escape_string( $this->db->conn_id,  $args['iDisplayStart'] );
         $sLimit = mysqli_real_escape_string( $this->db->conn_id,  $args['iDisplayLength'] );
      }

      /*
       * Ordering
       */
      $sOrder = "";
      if ( isset( $args['iSortCol_0'] ) ) {
         for ( $i=0 ; $i<intval( $args['iSortingCols'] ) ; $i++ )
         {
            if ( $args[ 'bSortable_'.intval($args['iSortCol_'.$i]) ] == "true" )
            {
               $sOrder .= "`".$this->field_name($aColumns[ intval( $args['iSortCol_'.$i] ) ])."` ".
                  mysqli_real_escape_string( $this->db->conn_id,  $args['sSortDir_'.$i] ) .", ";
            }
         }

         $sOrder = substr_replace( $sOrder, "", -2 );
      }

      /*
       * Filtering
       * NOTE this does not match the built-in DataTables filtering which does it
       * word by word on any field. It's possible to do here, but concerned about efficiency
       * on very large tables, and MySQL's regex functionality is very limited
       */
      $sWhere = "";
      if ( isset($args['sSearch']) && $args['sSearch'] != "" )
      {
         $sWhere = "(";
         for ( $i=0 ; $i<count($aColumns) ; $i++ ) {
				if (isset($args['bSearchable_'.$i]) && $args['bSearchable_'.$i] == "true") {
					$sWhere .= "lower(".str_replace(array("HC_","#"),array("","."),$this->field_name($aColumns[$i])).") LIKE '%".mysqli_real_escape_string( $this->db->conn_id, strtolower($args['sSearch']) )."%' OR ";
				}
         }
         $sWhere = substr_replace( $sWhere, "", -3 );
         $sWhere .= ')';
      }

      /* Individual column filtering */
      for ( $i=0 ; $i<count($aColumns) ; $i++ ) {
         if ( isset($args['bSearchable_'.$i]) && $args['bSearchable_'.$i] == "true" && $args['sSearch_'.$i] != '' ) {
            if ( $sWhere != "" ) {
               $sWhere .= " AND ";
            }
            $sWhere .= "lower(".$this->field_name($aColumns[$i]).") LIKE '%".mysqli_real_escape_string( $this->db->conn_id, strtolower($args['sSearch_'.$i]))."%' ";
         }
      }

      /* onather column filtering */
      if (isset($args['filter'])) {
         if ( $sWhere != "" ) {
            $sWhere .= " AND ";
         }
         $sWhere .= $args['filter'];
      }

		//if (isset($join))
		$extraFilter = array();
		if (isset($filter) && is_array($filter)) {
			foreach($filter as $key => $val) {
				if ( $sWhere != "" ) {
					$sWhere .= " AND ";
				}
				if (preg_match('@(=|<|>)@i', $key)) {
					$sWhere .= "{$key} '{$val}'";
				} else {
					$sWhere .= "{$key} = '{$val}'";
				}
			}
			$extraFilter = $filter;
		}
		if(!empty($filter_manual))
		{
		  if ( isset($args['sSearch']) && $args['sSearch'] != "" )
		  $sWhere .= ' AND '.$filter_manual;
		  else
		  $sWhere .= $filter_manual;
		}
		$filter = $sWhere;

		if (!isset($formatDate)) $formatDate = "d-m-Y";

      /*
       * SQL queries
       * Get data to display
       */
      $rResult = $this->find(compact('filter', 'join', 'fields'), $sOrder, $sLimit, $sOffset); // echo $this->db->last_query();
      $this->last_query = $this->db->last_query();
      
      // log query to file
	  //saya hilangkan untuk sementara
      //$log = @fopen('simrs/tmp/aplous-slow-query.log', 'a');
      
      /* Data set length after filtering */
      /** SLOW QUERY ON LARGE DATA **/
      $iFilteredTotal = $this->findCount(compact('filter', 'join', 'fields'));
      // $iFilteredTotal = 100;
      $this->last_count_query = $this->db->last_query();
	  //saya hilangkan untuk sementara
      //@fwrite($log, '['.date('Y-m-d H:i:s').'][model/MY_Model/dataTableParser] : '.str_replace("\n", ' ', $this->last_count_query)."\n");

      /* Total data set length */
      /** SLOW QUERY ON LARGE DATA **/
      // $iTotal = $this->findCount(array_merge(compact('join', 'fields'), array('filter' => $extraFilter)));
      // $iTotal = 100;
	  //saya hilangkan untuk sementara
      //fwrite($log, '['.date('Y-m-d H:i:s').'][model/MY_Model/dataTableParser] : '.str_replace("\n", ' ', $this->db->last_query())."\n");
      //saya hilangkan untuk sementara
      //@fclose($log);

      /*
       * Output
       */
      $output = array(
         "sEcho" => intval($args['sEcho']),
         "iTotalRecords" => $iTotal,
         "iTotalDisplayRecords" => $iFilteredTotal,
         "aaData" => array()
      );
	  
	  
      return $this->_parse($rResult, $aColumns, $action, $output);

   }
   
   public function findEndNo() {
   		if ($this->tableName == 'propinsi') $t=" where id_prop != '9999'";
		else $t="";
   		$query = $this->db->query("select * from $this->tableName $t order by $this->primaryKey desc limit 1");
         if ($query->num_rows() > 0) {
         $rs = $query->result_array();
         return $rs[0][$this->primaryKey] + 1;
      } else {
         return 1;
      } 
	 }

   protected function _parse($rResult, $aColumns, $action, $output) {

      if ($rResult) {
         foreach($rResult as $aRow) {
            $row = array();
            for ( $i=0 ; $i<count($aColumns) ; $i++ ) {
               /* General output */
               $field = $this->field_alias($aColumns[$i]);
               $row[] = $this->isDateFormat($aRow->{$field});
            }

           if ($action) {
			   if(!empty($aRow->no_urut))
               $row[] = sprintf($action, $aRow->id,$aRow->no_urut);
			   else
			   $row[] = sprintf($action, $aRow->id);
            }


				$row["DT_RowId"] = trim($aRow->id);

            $output['aaData'][] = $row;
         }
      } else {
         $output['aaData'] = "";
      }

      return json_encode( $output );

   }

  protected function isDateFormat($data, $format="d-m-Y") {
	  if (trim($data) == '0000-00-00' || trim($data) == '0000-00-00 00:00' || trim($data) == '0000-00-00 00:00:00') return;
      if (@date('Y-m-d', @strtotime($data)) == trim($data) || @date('Y-m-d H:i:s', @strtotime($data)) == trim($data))
        return @date($format, @strtotime($data));
      else
        return $data;
   }
  
  protected function format_number($data)
  {
	  if($data == "bahan_alat" OR $data == "jasa_rumah_sakit" OR $data == "jasa_pelayanan" )
	  $data = number_format($row->{$data}, 0, ",", ".");
	  return $data;
  }
   
   	protected function field_alias($field) {
	  $split = preg_split('/\s[aAsS]+\s|\s|\./', $field);
	  return trim($split[count($split) - 1]);
	}

   	protected function field_name($field) {
		$split = preg_split('/\s[aAsS]+\s|\s/', $field);
		return trim($split[0]);
	}
	
	function queryOne($conditions = NULL, $fields, $order) {
        $result = $this->find($conditions, $order);
		if ($this->resultMode === 'object') {
			return $result[0]->$fields;
		}
        return $result[0][$fields];
    }
	
	function do_empty_fields(){
		$this->fields = '';
		return;
	}
	

}
