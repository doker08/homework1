<?php

/**
 * Created by PhpStorm.
 * User: sokol_000
 * Date: 06.12.2016
 * Time: 14:27
 */
class doctorsModel extends baseModel
{
    public function getAllDoctors($sort = 'ASC'){
        $db = Db::getConnection();

        $doctorsList = array();
        $result = $db->query('SELECT * FROM doctors ORDER BY name '.$sort);

        $i = 0;
        while ($row = $result->fetch()){
            $doctorsList[$i]['id'] = $row['id'];
            $doctorsList[$i]['name'] = $row['name'];
            $doctorsList[$i]['post'] = $row['post'];
            $i++;
        }

        return $doctorsList;
    }

    public function getDoctorPatients($id){
        $id = intval($id);

        if($id > 0){
            $patientDoctors = array();

            $db = Db::getConnection();

            $result = $db->query('SELECT doctors.name AS d_name, patients.name AS p_name '
                .'FROM '
                .'(doctors INNER JOIN patientsDoctors ON doctors.id=patientsDoctors.doctorId) '
                .'INNER JOIN patients ON patients.id=patientsDoctors.patientId '
                .'WHERE doctors.id='.$id);

            $i = 0;
            while ($row = $result->fetch()){
                $patientDoctors[$i]['name'] = $row['p_name'];
                $i++;
            }

            return $patientDoctors;
        }
    }

    public function getName($id){
        $db = Db::getConnection();
        $result = $db->query('SELECT name FROM doctors WHERE id='.$id);
        $row = $result->fetch();
        return $row['name'];
    }

    public function getDoctor($id){
        $db = Db::getConnection();
        $result = $db->query('SELECT * FROM doctors WHERE id='.$id);

        return $result->fetch();
    }

    public function setName($id, $name){
        $id = intval($id);
        $name = urldecode(strval($name));

        $db = Db::getConnection();
        $result = $db->query('UPDATE doctors SET name=\''.$name.'\' WHERE id='.$id);
        echo 'Доктор: '.$name;
    }
}