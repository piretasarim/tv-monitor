<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * added by dezta
 * source: https://github.com/gpedro/CodeIgniter-Assets-Helper
 * very litle modified
 */

// define('DS', DIRECTORY_SEPARATOR);
define('DS', '/');


if (!function_exists('_getConfig'))
{
  function _getConfig()
  {
    $CI =& get_instance();
    // $CI->load->config('config_assets');
    $config = array();
    // $config['path_base'] = $CI->config->item('path_base');
    // $config['path_js']   = $CI->config->item('path_js');
    // $config['path_css']  = $CI->config->item('path_css');
    // $config['path_img']  = $CI->config->item('path_img');

    // $config['path_base'] = ASSETURL;
    $config['path_base'] = BASEURL.'/assets/';
    $config['path_base_docs'] = BASEURL.'/assets/docs/';    
    $config['path_js']   = 'js';
    $config['path_css']  = 'css';
    $config['path_img']  = 'img';
    $config['path_wav']  = 'rekaman';
    
    return $config;
  }
}

if (!function_exists('_process_array'))
{
  function _process_array($data, $type)
  {
    if(is_array($data))
    {
      $head = '';
      $attr = '';
      foreach($data as $parent)
      {
        if(is_array($parent))
        {
          foreach($parent as $child_1_key => $child_1_value)
          {
            if(is_array($child_1_value))
            {
              $attr .= ' ';
              foreach($child_1_value as $child_2_key => $child_2_value)
              {
                $attr .= $child_2_key.'="'.$child_2_value.'"';
              }
            }
            else
            {
              $file = $child_1_value;
            }
          }
        } else {
          $file = $parent;
        }
      
        $config = _getConfig();
        // $path = base_url($config['path_base'].DS.$config['path_'.$type].DS.$file);
        $path = $config['path_base'].$config['path_'.$type].DS.$file;
      
        if($type == 'js')
          $head .= '<script type="text/javascript" src="' . $path . '"' . $attr . '></script>';
        else if($type == 'css')
          $head .= '<link rel="stylesheet" type="text/css" href="' . $path . '"' . $attr . '>';
        else if($type == 'img')
          $head .= '<img src="' . $path . '"'.$attr.'/>';
        else if($type == 'wav')
          // $head .= '<audio src="' . $path . '"'.$attr.'/>';
          $head .= '<audio  src="' . $path . '"' . $attr . '></audio>';
      }

      return $head;
    }
  }
}

if (!function_exists('_process_array_docs'))
{
  function _process_array_docs($data, $type)
  {
    if(is_array($data))
    {
      $head = '';
      $attr = '';
      foreach($data as $parent)
      {
        if(is_array($parent))
        {
          foreach($parent as $child_1_key => $child_1_value)
          {
            if(is_array($child_1_value))
            {
              $attr .= ' ';
              foreach($child_1_value as $child_2_key => $child_2_value)
              {
                $attr .= $child_2_key.'="'.$child_2_value.'"';
              }
            }
            else
            {
              $file = $child_1_value;
            }
          }
        } else {
          $file = $parent;
        }
      
        $config = _getConfig();
        // $path = base_url($config['path_base'].DS.$config['path_'.$type].DS.$file);
        $path = $config['path_base_docs'].$config['path_'.$type].DS.$file;
      
        if($type == 'js')
          $head .= '<script type="text/javascript" src="' . $path . '"' . $attr . '></script>';
        else if($type == 'css')
          $head .= '<link rel="stylesheet" type="text/css" href="' . $path . '"' . $attr . '>';
        else if($type == 'img')
          $head .= '<img src="' . $path . '"'.$attr.'/>';
        else if($type == 'wav')
          // $head .= '<audio src="' . $path . '"'.$attr.'/>';
          $head .= '<audio  src="' . $path . '"' . $attr . '></audio>';
      }

      return $head;
    }
  }
}

if (!function_exists('_assets_base'))
{
  function _assets_base($file, $attr ,$type, $attribute = null)
  {
    if(is_array($file))
    {
      return _process_array($file, $type);
    }
    else
    {
      if(!empty($attr) && is_array($attr))
      {
        $attribute = ' ';
        foreach($attr as $key => $value)
        {
          $attribute .= ' '.$key.'="'.$value.'"';
        }
      }
    
      $config = _getConfig();
      // $path = base_url($config['path_base'].DS.$config['path_'.$type].DS.$file);
      $path = $config['path_base'].$config['path_'.$type].DS.$file;
    
      if($type == 'js')
        return '<script type="text/javascript" src="' . $path . '"' . $attribute . '></script>';
      else if($type == 'css')
        return '<link rel="stylesheet" type="text/css" href="' . $path . '"' . $attribute . '>';
      else if($type == 'img')
        return '<img src="' . $path . '"'.$attribute.'/>';
      else if($type == 'wav')
        // return '<audio src="' . $path . '"'.$attribute.'/>';
        return '<audio  src="' . $path . '"' . $attribute . '></audio>';
    }
  }
}

if (!function_exists('_assets_base_docs'))
{
  function _assets_base_docs($file, $attr ,$type, $attribute = null)
  {
    if(is_array($file))
    {
      return _process_array_docs($file, $type);
    }
    else
    {
      if(!empty($attr) && is_array($attr))
      {
        $attribute = ' ';
        foreach($attr as $key => $value)
        {
          $attribute .= ' '.$key.'="'.$value.'"';
        }
      }
    
      $config = _getConfig();
      // $path = base_url($config['path_base'].DS.$config['path_'.$type].DS.$file);
      $path = $config['path_base_docs'].$config['path_'.$type].DS.$file;
    
      if($type == 'js')
        return '<script type="text/javascript" src="' . $path . '"' . $attribute . '></script>';
      else if($type == 'css')
        return '<link rel="stylesheet" type="text/css" href="' . $path . '"' . $attribute . '>';
      else if($type == 'img')
        return '<img src="' . $path . '"'.$attribute.'/>';
      else if($type == 'wav')
        // return '<audio src="' . $path . '"'.$attribute.'/>';
        return '<audio  src="' . $path . '"' . $attribute . '></audio>';
    }
  }
}

if (!function_exists('css_asset_docs'))
{
  function css_asset_docs($file, $attr = array())
  {
    return _assets_base_docs($file, $attr, 'css');
  }
}

if (!function_exists('js_asset_docs'))
{
  function js_asset_docs($file, $attr = array())
  {
    return _assets_base_docs($file, $attr, 'js');
  }
}

if (!function_exists('css_asset'))
{
  function css_asset($file, $attr = array())
  {
    return _assets_base($file, $attr, 'css');
  }
}

if (!function_exists('js_asset'))
{
  function js_asset($file, $attr = array())
  {
    return _assets_base($file, $attr, 'js');
  }
}

if (!function_exists('img_asset'))
{
  function img_asset($file, $attr = array())
  {
    return _assets_base($file, $attr, 'img');
  }
}

if (!function_exists('rec_asset'))
{
  function rec_asset($file, $attr = array())
  {
    return _assets_base($file, $attr, 'wav');
  }
}
