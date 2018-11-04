<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Create extends My_Controller {

	function __construct(){
		parent::__construct();

		$this->load->helper('string');
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">','</div>');
	}

	public function index()
	{
		$this->form_validation->set_rules('url_address', $this->lang->line('create_url_address'), 'required|min_length[1]|max_length[10000]|trim');

		if ($this->form_validation->run()==FALSE) {
			$page_data=array('success_fail'=>null,
							  'encoded_url'=>false);

			$this->load->view('common/header');
			$this->load->view('nav/top_nav');
			$this->load->view('create/create',$page_data);
			$this->load->view('common/footer');
		}
		else{
			$data=array('url_address'=>$this->input->post('url_address'));
			$this->load->model('urls_model');

			if ($res=$this->urls_model->save_url($data)) {
				$page_data['success_fail']='Success';
				$page_data['encoded_url']=$res;
			} 
			else{
				$page_data['success_fail']='Fail';
			}
				$page_data['encoded_url']=base_url().$res;

				$this->load->view('common/header');
				$this->load->view('nav/top_nav');
				$this->load->view('create/create',$page_data);
				$this->load->view('common/footer');
		}
	}

}

/* End of file create.php */
/* Location: ./application/controllers/create.php */