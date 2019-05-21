<?php

class Muser extends CI_Controller{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Muser_model');
	} 

	/*
	 * Listing of musers
	 */
	function index()
	{
		$data['musers'] = $this->Muser_model->get_all_musers();
		
		$data['_view'] = 'muser/index';
		$this->load->view('layouts/main',$data);
	}

	/*
	 * Adding a new muser
	 */
	function add()
	{   
		$this->load->library('form_validation');

		$this->form_validation->set_rules('Height','Height','numeric');
		$this->form_validation->set_rules('Weight','Weight','numeric');
		$this->form_validation->set_rules('FirstName','FirstName','required');
		$this->form_validation->set_rules('LastName','LastName','required');
		$this->form_validation->set_rules('NBAdebut','NBAdebut','required');
		$this->form_validation->set_rules('Number','Number','numeric');
		$this->form_validation->set_rules('CountryUID','CountryUID','required');

		if($this->form_validation->run())     
		{   
			$target_dir = "uploads/avatar/";
			$target_file = $target_dir . time().basename($_FILES["imageUpload"]["name"]);
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			$imgName = time().basename($_FILES["imageUpload"]["name"]);
			move_uploaded_file($_FILES["imageUpload"]["tmp_name"], $target_file);

			$params = array(
				'CountryUID' => $this->input->post('CountryUID'),
				'TeamUID' => $this->input->post('TeamUID'),
				'CollegeUID' => $this->input->post('CollegeUID'),
				'Position' => $this->input->post('Position'),
				'FirstName' => $this->input->post('FirstName'),
				'LastName' => $this->input->post('LastName'),
				'Birthday' => date('Y-m-d', strtotime($this->input->post('Birthday'))),
				'Height' => $this->input->post('Height'),
				'Weight' => $this->input->post('Weight'),
				'Avatar' => $imgName,
				'Number' => $this->input->post('Number'),
				'NBAdebut' => $this->input->post('NBAdebut'),
			);


			
			$muser_id = $this->Muser_model->add_muser($params);
			redirect('muser/index');
		}
		else
		{
			$data['all_mcountries'] = $this->Muser_model->get_all_mcountries();
			$data['all_mteams'] = $this->Muser_model->get_all_mteams();
			$data['all_mcolleges'] = $this->Muser_model->get_all_mcolleges();
			
			$data['_view'] = 'muser/add';
			$this->load->view('layouts/main',$data);
		}
	}  

	/*
	 * Editing a muser
	 */
	function edit($UserUID)
	{   
		// check if the muser exists before trying to edit it
		$data['muser'] = $this->Muser_model->get_muser($UserUID);
		
		if(isset($data['muser']['UserUID']))
		{
			$this->load->library('form_validation');

			$this->form_validation->set_rules('Height','Height','numeric');
			$this->form_validation->set_rules('Weight','Weight','numeric');
			$this->form_validation->set_rules('FirstName','FirstName','required');
			$this->form_validation->set_rules('LastName','LastName','required');
			$this->form_validation->set_rules('NBAdebut','NBAdebut','required');
			$this->form_validation->set_rules('Number','Number','numeric');
			$this->form_validation->set_rules('CountryUID','CountryUID','required');

			if($this->form_validation->run())     
			{   
				$params = array(
					'CountryUID' => $this->input->post('CountryUID'),
					'TeamUID' => $this->input->post('TeamUID'),
					'CollegeUID' => $this->input->post('CollegeUID'),
					'Position' => $this->input->post('Position'),
					'FirstName' => $this->input->post('FirstName'),
					'LastName' => $this->input->post('LastName'),
					'Birthday' => date('Y-m-d', strtotime($this->input->post('Birthday'))),
					'Height' => $this->input->post('Height'),
					'Weight' => $this->input->post('Weight'),
					'Avatar' => $this->input->post('Avatar'),
					'Number' => $this->input->post('Number'),
					'NBAdebut' => $this->input->post('NBAdebut'),
				);

				$this->Muser_model->update_muser($UserUID,$params);            
				redirect('muser/index');
			}
			else
			{
				$data['all_mcountries'] = $this->Muser_model->get_all_mcountries();

				$data['all_mteams'] = $this->Muser_model->get_all_mteams();

				$data['all_mcolleges'] = $this->Muser_model->get_all_mcolleges();

				$data['_view'] = 'muser/edit';
				$this->load->view('layouts/main',$data);
			}
		}
		else
			show_error('The muser you are trying to edit does not exist.');
	} 

	
	 // Deleting muser

	function remove($UserUID)
	{
		$muser = $this->Muser_model->get_muser($UserUID);

		// check if the muser exists before trying to delete it
		if(isset($muser['UserUID']))
		{
			$this->Muser_model->delete_muser($UserUID);
			echo json_encode(array('success'=>1,'message'=>'Deleted'));
		}
		else{
			echo json_encode(array('success'=>0,'message'=>'The user you are trying to delete does not exist.'));
		}
	}
	
}
