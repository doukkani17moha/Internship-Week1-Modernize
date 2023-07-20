<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/admin/config/db.php';

class Patient extends db{

    Protected $patient_id ;
    Protected $patient_name ;
    Protected $patient_lastname;
    Protected $patient_email ;
    Protected $patient_adress ;
    Protected $patient_phone;
    Protected $patient_probleme;
    Protected $doctor_id ;
    Protected $appointement_id;
    Protected $dateajoutation;
    

    public function getpatientid(){
        return $this->patient_id;
    }

    public function getpatientname(){
        return $this->patient_name;
    }

    public function getpatientlastname(){
        return $this->patient_lastname;
    }

    public function getpatientemail(){
        return $this->patient_email;
    }

    public function getpatientadress(){
        return $this->patient_adress;
    }

    public function getpatientphone(){
        return $this->patient_phone;
    }

    public function getpatientprob(){
        return $this->patient_probleme;
    }

    public function getdoctorid(){
        return $this->doctor_id;
    }

    public function getappointementid(){
        return $this->appointement_id;
    }

    public function dateajoutation(){
        return $this->dateajoutation;
    }



}
    
