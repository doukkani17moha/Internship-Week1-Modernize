<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/admin/config/db.php';

class Appointement extends db {
    private $appointement_id;
    private $patient_name;
    private $patient_email;
    private $doctor_name;
    private $date_appointement;
    private $time_appointement;
    private $probleme;

    public function getappointementid(){
        return $this->appointement_id;
    }

    public function getpatientname(){
        return $this->patient_name;
    }

    public function getpatientemail(){
        return $this->patient_email;
    }

    public function getdoctorname(){
        return $this->doctor_name;
    }

    public function getdateappointement(){
        return $this->date_appointement;
    }

    public function gettimeappointement(){
        return $this->time_appointement;
    }

    public function getprobleme(){
        return $this->probleme;
    }

    public function getAllAppointements(){
        $sql = "SELECT * FROM appointment ORDER BY appointement_id ASC";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $appointements = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        $appointementObjects = array();
        foreach ($appointements as $appointement) {
            $appointementObject = new Appointement();
            $appointementObject->appointement_id = $appointement['appointement_id'];
            $appointementObject->patient_name = $appointement['patient_name'];
            $appointementObject->patient_email = $appointement['patient_email'];
            $appointementObject->doctor_name = $appointement['doctor_name'];
            $appointementObject->date_appointement = $appointement['date_appointement'];
            $appointementObject->time_appointement = $appointement['time_appointement'];
            $appointementObject->probleme = $appointement['probleme'];
            $appointementObjects[] = $appointementObject;
        }
    
        return $appointementObjects;
    }

    public function latestAppointements(){
        $sql = "SELECT * FROM appointment ORDER BY appointement_id DESC";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $appointements = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        $latestappointementObjects = array();
        foreach ($appointements as $appointement) {
            $latestappointementObject = new Appointement();
            $latestappointementObject->appointement_id = $appointement['appointement_id'];
            $latestappointementObject->patient_name = $appointement['patient_name'];
            $latestappointementObject->patient_email = $appointement['patient_email'];
            $latestappointementObject->doctor_name = $appointement['doctor_name'];
            $latestappointementObject->date_appointement = $appointement['date_appointement'];
            $latestappointementObject->time_appointement = $appointement['time_appointement'];
            $latestappointementObject->probleme = $appointement['probleme'];
            $latestappointementObjects[] = $latestappointementObject;
        }
    
        return $latestappointementObjects;
    }


    public function insertFormData($name, $email, $doctor, $date, $time, $problem) {
        $conn = $this->connect();

        $name = $conn->quote($name);
        $email = $conn->quote($email);
        $doctor = $conn->quote($doctor);
        $date = $conn->quote($date);
        $time = $conn->quote($time);
        $problem = $conn->quote($problem);

        $query = "INSERT INTO appointment (patient_name, patient_email, doctor_name, date_appointement, time_appointement, probleme) 
                  VALUES ($name, $email, $doctor, $date, $time, $problem)";

        try {
            $conn->exec($query);
            echo '<script>$("#appointmentSuccessModal").modal("show");</script>';
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}

    
