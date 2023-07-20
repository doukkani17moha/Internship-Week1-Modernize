<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/admin/config/db.php';

class Doctor extends db {
    private $doctor_id;
    private $doctor_name;
    private $doctor_lastname;
    private $doctor_Image;
    private $doctor_email;
    private $doctor_phone;
    private $doctor_specialite;
    private $dateajoutation;
    private $is_active;


    public function getdoctorid(){
        return $this->doctor_id;
    }

    public function getdoctorname(){
        return $this->doctor_name . ' ' .$this->doctor_lastname ;
    }

    public function getdoctorimg(){
        return $this->doctor_Image;
    }

    public function getdoctoremail(){
        return $this->doctor_email;
    }

    public function getdoctorphone(){
        return $this->doctor_phone;
    }

    public function getdoctorspeciality(){
        return $this->doctor_specialite;
    }

    public function dateajoutation(){
        return $this->dateajoutation;
    }

    public function isactive(){
        return $this->is_active;
    }

    public function getAllDoctors(){
        $sql = "SELECT * FROM doctor ORDER BY doctor_id ASC";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $doctors = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        $doctorObjects = array();
        foreach ($doctors as $doctor) {
            $doctorObject = new Doctor();
            $doctorObject->doctor_id = $doctor['doctor_id'];
            $doctorObject->doctor_name = $doctor['doctor_name'];
            $doctorObject->doctor_lastname = $doctor['doctor_lastname'];
            $doctorObject->doctor_Image = $doctor['doctor_Image'];
            $doctorObject->doctor_email = $doctor['doctor_email'];
            $doctorObject->doctor_phone = $doctor['doctor_phone'];
            $doctorObject->doctor_specialite = $doctor['doctor_specialite'];
            $doctorObject->dateajoutation = $doctor['dateajoutation'];
            $doctorObject->is_active = $doctor['is_active'];
            $doctorObjects[] = $doctorObject;
        }
    
        return $doctorObjects;
    }
    public function getactiveDoctors(){
        $sql = "SELECT * FROM doctor where is_active = 1 ";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $doctors = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        $activedoctors = array();
        foreach ($doctors as $doctor) {
            $activedoctor = new Doctor();
            $activedoctor->doctor_name = $doctor['doctor_name'];
            $activedoctor->doctor_lastname = $doctor['doctor_lastname'];
            $activedoctor->is_active = $doctor['is_active'];
            $activedoctors[] = $activedoctor;
        }
    
        return $activedoctors;
    }
    
}
