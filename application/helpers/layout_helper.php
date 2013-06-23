<?php
if(!function_exists('full_url'))
{
    function get_url()
    {
       $ci=& get_instance();
       $return = $ci->config->site_url().$ci->uri->uri_string();
       if(count($_GET) > 0)
       {
          $get =  array();
          foreach($_GET as $key => $val)
          {
             $get[] = $key.'='.$val;
          }
          $return .= '?'.implode('&',$get);
       }
       return $return;
    }
}