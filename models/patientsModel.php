<?php

/**
 * Created by PhpStorm.
 * User: sokol_000
 * Date: 06.12.2016
 * Time: 14:27
 */
class patientsModel extends baseModel
{
    public function getAllPatients($sort = 'ASC'){
        $db = Db::getConnection();

        $patientList = array();
        $result = $db->query('SELECT * FROM patients ORDER BY name '.$sort);

        $i = 0;
        while ($row = $result->fetch()){
            $patientList[$i]['id'] = $row['id'];
            $patientList[$i]['name'] = $row['name'];
            $patientList[$i]['birthday'] = $this->getYears($row['birthday']);
            $i++;
        }

        return $patientList;
    }

    public function getPatientDoctors($id){
        $id = intval($id);

        if($id > 0){
            $patientDoctors = array();

            $db = Db::getConnection();

            $result = $db->query('SELECT patients.id, patients.name AS p_name, doctors.id, doctors.name AS d_name '
                .'FROM '
                .'(patients INNER JOIN patientsDoctors ON patients.id=patientsDoctors.patientId) '
                .'INNER JOIN doctors ON doctors.id=patientsDoctors.doctorId '
                .'WHERE patients.id='.$id);

            $i = 0;
            while ($row = $result->fetch()){
                $patientDoctors[$i]['name'] = $row['d_name'];
                $i++;
            }

            return $patientDoctors;
        }
    }

    function getYears($birthdate){
        $today = date('Y-m-d');
        return $today - $birthdate;
    }

    public function getPatient($id){
        $db = Db::getConnection();
        $result = $db->query('SELECT * FROM patients WHERE id='.$id);
        $row = $result->fetch();
        $row['birthday'] = $this->getYears($row['birthday']);
        return $row;
    }

    public function setName($id, $name){
        $id = intval($id);
        $name = urldecode(strval($name));

        $db = Db::getConnection();
        $result = $db->query('UPDATE patients SET name=\''.$name.'\' WHERE id='.$id);
        echo 'Пациент: '.$name;
    }
}