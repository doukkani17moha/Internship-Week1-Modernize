<?php
$baseUrl = 'http://localhost/admin/admin';
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/admin/models/admin.php';

class logincontr extends login{
    
    public function emptyinput() {
        $result;
        if (empty($this->username) || empty($this->password)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    public function loginadmin() {
        if ($this->emptyinput() == false) {
            header("location: login.php?error=emptyinput");
            exit();
        }

        $this->getadmin($this->username, $this->password);
    }

    protected function getadmin($username, $password) {
        $stmt = $this->connect()->prepare('SELECT admin_password FROM admin WHERE admin_username = ? OR admin_email = ?');
        if (!$stmt->execute(array($username, $username))) {
            $stmt = null;
            header("location: login.php?error=stmtfailed");
            exit();
        }

        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: login.php?error=usernotfound");
            exit();
        }

        $pwdHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkPwd = password_verify($password, $pwdHashed[0]["admin_password"]);

        if ($checkPwd == true) {
            $targetDirectory = "http://localhost/admin/admin/";

            // Redirect to the desired page within the target directory
            header("Location: " . $targetDirectory . "index.php");
                    exit();
        } else {
            echo "<script>alert('Wrong Password');</script>";
            header("location: login.php?error=wrongpassword");

            exit();
        }
    }


}