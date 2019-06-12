<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('show'))
    {
        function  show($view, $data)
        {
           global $template;
           $ci = &get_instance();
           $data['view'] = $view;
           $ci->load->view($template, $data);
        }
    }

if ( ! function_exists('show_2'))
    {
        function  show_2($view, $data)
        {
           global $template_2;
           $ci = &get_instance();
           $data['view'] = $view;
           $ci->load->view($template_2, $data);
        }
    }


?>
