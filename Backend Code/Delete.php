<?php

    include_once($_SERVER['DOCUMENT_ROOT'].'/Database.class.php');
    include_once($_SERVER['DOCUMENT_ROOT'].'/restApi.php');

    class Delete extends rest {
        private $conn;

        public function __construct($id){

            $this->conn = Database::getConnection();

            $query = "DELETE FROM `birthday` WHERE id = '$id';";

            if(!mysqli_query($this->conn, $query)){
                $this->response($this->json([
                    "data" => ["Error" => "Unable to delete data in db..."]
                ]), 406);
            }else{
                $this->response($this->json([
                    "data" => ["message" => "Successfully deleted data in db..."]
                ]), 200);
            }
        }

    }
?>