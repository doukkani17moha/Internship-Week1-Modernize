<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/admin/models/patient.php';

class Patientcontr extends Patient{

    public function getpatientbyid($id) {
        $sql = "SELECT * FROM patient WHERE patient_id = :id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $patients = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        $patientObjects = array();
        foreach ($patients as $patient) {
            $patientObject = new Patient();
            $patientObject->patient_name = $patient['patient_name'];
            $patientObject->patient_lastname = $patient['patient_lastname'];
            $patientObject->patient_email = $patient['patient_email'];
            $patientObject->patient_adress = $patient['patient_adress'];
            $patientObject->patient_phone = $patient['patient_phone'];
            $patientObject->patient_probleme = $patient['patient_probleme'];
            $patientObject->doctor_id = $patient['doctor_id'];
            $patientObject->appointement_id = $patient['appointement_id'];
            $patientObject->dateajoutation = $patient['dateajoutation'];
            $patientObjects[] = $patientObject;
        }
    
        return $patientObjects;
    }
    

    public function getPatients(){
        $sql = "SELECT * FROM patient ORDER BY patient_id ASC";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $patients = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        $patientObjects = array();
        foreach ($patients as $patient) {
            $patientObject = new Patient();
            $patientObject->patient_id = $patient['patient_id'];
            $patientObject->patient_name = $patient['patient_name'];
            $patientObject->patient_lastname = $patient['patient_lastname'];
            $patientObject->patient_email = $patient['patient_email'];
            $patientObject->patient_adress = $patient['patient_adress'];
            $patientObject->patient_phone = $patient['patient_phone'];
            $patientObject->patient_probleme = $patient['patient_probleme'];
            $patientObject->doctor_id = $patient['doctor_id'];
            $patientObject->appointement_id = $patient['appointement_id'];
            $patientObject->dateajoutation = $patient['dateajoutation'];
            $patientObjects[] = $patientObject;
        }
    
        return $patientObjects;
    }
     
    // function delete Patient
    public function deletePatient($id) {
        $sql = "DELETE FROM patient WHERE patient_id = :id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    
        if ($stmt->execute()) {
            echo "Patient with ID " . $id . " has been deleted successfully.";
        } else {
            echo "Error: " . $stmt->error;
        }
    }
    
    // function insert Patient
    public function insertPatient($name, $lastname, $email, $adress, $phone, $probleme, $doctor_id) {
        $name = $this->connect()->quote($name);
        $lastname = $this->connect()->quote($lastname);
        $email = $this->connect()->quote($email);
        $adress = $this->connect()->quote($adress);
        $phone = (int) $phone; 
        $probleme = $this->connect()->quote($probleme);
        $doctor_id = (int) $doctor_id; 
    
        $query = "INSERT INTO patient (patient_name, patient_lastname, patient_email, patient_adress, patient_phone, patient_probleme, doctor_id) 
        VALUES ($name, $lastname, $email, $adress, $phone, $probleme, $doctor_id)";
    
        if ($this->connect()->exec($query) !== false) {
             echo '<div class="alert alert-success" role="alert">
                   Patient data inserted successfully.
                   </div>';
        } else {
             echo "Error: " . print_r($this->connect()->errorInfo(), true);
        }
    }
    

    public function updatePatient($name, $lastname, $email, $adress, $phone, $probleme, $doctor_id, $patientId) {
        $query = "UPDATE patient SET patient_name = ?, patient_lastname = ?, patient_email = ?, patient_adress = ?, patient_phone = ?, patient_probleme = ?, doctor_id = ? WHERE patient_id = ?";
                
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$name, $lastname, $email, $adress, $phone, $probleme, $doctor_id, $patientId]);
            
        if ($stmt->rowCount() > 0) {
            echo '<div class="alert alert-success" role="alert">
                    Patient data updated successfully.
                  </div>';
                  
            // Redirect to managepatient.php after successful update
            header("Location: managepatients.php");
            exit();
              
        } else {
            echo "Error updating patient data: " . print_r($stmt->errorInfo(), true);
        }
    }
    

}
