<?php

/**
 * Created by PhpStorm.
 * User: sokol_000
 * Date: 06.12.2016
 * Time: 14:26
 */
class doctorsController extends baseController
{
    public function index()
    {
        $args = func_get_args();
        $this->load->model('doctors');

        $sort = "ASC";
        if(!empty($args) && ($args[0] == "ASC" || $args[0] == "DESC"))
            $sort = $args[0];

        $doctorsList = $this->doctors->getAllDoctors($sort);
        $this->load->view('doctors',$doctorsList);
    }

    public function profile(){
        $args = func_get_args();
        $this->load->model('doctors');

        if(empty($args)){
            $this->index();
            return false;
        }

        $doctorInfo = $this->doctors->getDoctor($args[0]);
        $patientDoctors = $this->doctors->getDoctorPatients($args[0]);
        $this->load->view('doctorsProfile', $patientDoctors, $doctorInfo);
    }

    public function set(){
        $this->load->model('doctors');
        $args = func_get_args();

        $id = $args[0];
        $name = $args[1];

        $this->doctors->setName($id, $name);
    }
}