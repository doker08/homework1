<?php

class patientsController extends baseController{
    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $args = func_get_args();
        $this->load->model('patients');

        $sort = "ASC";
        if(!empty($args) && ($args[0] == "ASC" || $args[0] == "DESC"))
            $sort = $args[0];

        $patientList = $this->patients->getAllPatients($sort);
        $this->load->view('patients',$patientList);
    }

    public function profile(){
        $args = func_get_args();
        $this->load->model('patients');

        if(empty($args)){
            $this->index();
            return false;
        }

        $patientInfo = $this->patients->getPatient($args[0]);
        $patientDoctors = $this->patients->getPatientDoctors($args[0]);

        $this->load->view('patientsProfile', $patientDoctors, $patientInfo);
    }

    public function set(){
        $this->load->model('patients');
        $args = func_get_args();

        $id = $args[0];
        $name = $args[1];

        $this->patients->setName($id, $name);
    }
}