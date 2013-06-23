<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Layout extends CI_Controller
{
    protected $data;
    private $css;
    private $javascript;
    
    function __construct() 
    {
        parent::__construct();
        $this->load->helper('layout');
        $this->__set_application_name('Taylors Arcade');
        $this->__set_description('A great place to kick back and play flash games with your friends for free');
        $this->__set_keywords("Flash, Games, Free, Arcade, Freinds");
        $this->__set_title('Title');
        $this->__set_stylesheet_path();
        $this->__set_javascript_path();
        $this->__set_main('template/default');
        
    }
    function __add_stylesheet($stylesheet)
    {
        $this->data['stylesheets'][] = $this->css . $stylesheet .'.css';
    }
    function __add_javascript_head($src)
    {
        $this->data['javascript_head'][] = $this->javascript . $src . '.js';
    }
    function __add_ajax_script($src)
    {
        $this->data['javascript_ajax'][] = $this->javascript . $src . '.js';
    }
    function __add_keyword($str)
    {
        $this->data['keywords'] .= ', ' . $str;
    }
    function __set_title($title)
    {
        $this->data['title'] = $title;
    }
    function __set_stylesheet_path($path = NULL)
    {
        if($path === NULL) $this->css = base_url() . 'assets/css/';
        else $this->css = base_url() . $path;
    }
    function __set_javascript_path($path = NULL)
    {
        if($path === NULL) $this->javascript = base_url() . 'assets/javascript/';
        else $this->javascript = base_url() . $path;
    }
    function __set_keywords($str)
    {
        $this->data['keywords'] = $str;
    }
    function __set_description($str)
    {
        $this->data['description'] = $str;
    }
    function __set_application_name($str)
    {
        $this->data['application_name'] = $str;
    }
    function __set_main($view)
    {
        $this->data['main'] = $view;
    }
    function __set_sidebar($view)
    {
        $this->data['sidebar'] = $view;
    }
    function __render($view = FALSE)
    {
        if ($view !== FALSE) $this->data['main'] = $view;
        $this->load->view('template/layout', $this->data);
    }
    
}
//end of file