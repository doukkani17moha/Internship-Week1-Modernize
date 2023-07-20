<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/admin/config/db.php';

class Blog extends db {
    private $blog_id;
    private $blog_title;
    private $blog_Image;
    private $blog_description;
    private $datecreation;

    public function getblogid(){
        return $this->blog_id;
    }

    public function getblogtitle(){
        return $this->blog_title;
    }

    public function getblogimg(){
        return $this->blog_Image;
    }

    public function getblogdescription(){
        return $this->blog_description;
    }

    public function getdatecreation(){
        return $this->datecreation;
    }


    public function getAllBlogs(){
        $sql = "SELECT * FROM blog ORDER BY blog_id ASC";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $blogs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        $blogObjects = array();
        foreach ($blogs as $blog) {
            $blogObject = new Blog();
            $blogObject->blog_id = $blog['blog_id'];
            $blogObject->blog_title = $blog['blog_title'];
            $blogObject->blog_Image = $blog['blog_Image'];
            $blogObject->blog_description = $blog['blog_description'];
            $blogObject->datecreation = $blog['datecreation'];
            $blogObjects[] = $blogObject;
        }
    
        return $blogObjects;
    }
    
}
