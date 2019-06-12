function addDataLabel() {
   var head_col_count =  $('thead td, thead th').size();
   
   for ( i=0; i <= head_col_count; i++ )  {
      var head_col_label = $('thead td:nth-child('+ i +'), thead th:nth-child('+ i +')').text();
      $('tr td:nth-child('+ i +')').attr('data-label', head_col_label);
   }
}

addDataLabel();