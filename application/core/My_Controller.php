<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	class My_Controller extends CI_Controller{
		function __construct(){
			parent::__construct();
			$this->load->helper(array('form','url','security','language'));
			
			$this->lang->load('en_admin','english');	
		}
	}
?>