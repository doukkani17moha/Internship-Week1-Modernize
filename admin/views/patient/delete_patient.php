<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/admin/controllers/patientcontr.php';

if (isset($_POST["patient_id"])) {
    $db = new Patientcontr();
    $db->deletePatient($_POST["patient_id"]);
}
?>
