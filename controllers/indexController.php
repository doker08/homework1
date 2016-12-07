<?php
	class indexController extends baseController{
		
		public function __construct(){
			parent::__construct();
		}
		public function index(){
            $this->load->model('doctors');
            $this->load->model('patients');

            $doctorsList = $this->doctors->getAllDoctors();
            $patientList = $this->patients->getAllPatients();

            $this->load->view('index',$doctorsList, $patientList);
		}

	}
