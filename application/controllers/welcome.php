<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Welcome extends Layout {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct()
        {
            parent::__construct();
            $this->__add_stylesheet('layout');
            $this->__add_keyword('Welcome');
            $this->data['site_title'] = 'Taylor\'s Arcade';
            $this->data['menu'] = array('Home' => '/','Sidebar' => '/welcome/sidebar', array('Dropdown' => '/','Dropdown 2' => '/welcome/sidebar',array('Dropdown level 2' => get_url() , 'Level 2 Item 1' => '/welcome/sidebar')));
            
            
        }
         function index()
	{
			$this->__render();
        }
        public function sidebar()
        {
            $this->__set_title('Sidebar');
            $this->__set_description('The Standard Layout of my site with a sidebar');
            $this->__set_sidebar('template/sidebar/default');
            $this->__render();
        }

        
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */