<?php

    include_once($_SERVER['DOCUMENT_ROOT'].'/Database.class.php');
    include_once($_SERVER['DOCUMENT_ROOT'].'/getDetails.php');
    include_once($_SERVER['DOCUMENT_ROOT'].'/restApi.php');
    include_once($_SERVER['DOCUMENT_ROOT'].'/addBirthday.class.php');
    include_once($_SERVER['DOCUMENT_ROOT'].'/Delete.php');
    include_once($_SERVER['DOCUMENT_ROOT'].'/updateDetailsLive.php');

    class API extends rest {
        
        private $send_data;
        
        private $Name;
        private $Dob;

        public function __construct(){
            new updateDetails();
        }

        public function processApi(){
            $func = strtolower(trim(str_replace("/","",$_REQUEST['rquest'])));
            if((int)method_exists($this, $func) > 0){
                $this->$func();
            } else {
                $this->send_data = [
                    "data" => ["Error" => "method not found"]
                ];
                $this->response($this->json($this->send_data), 404);
            }
        }

        private function test(){
            $this->send_data = getallheaders();
            $this->response($this->json($this->send_data), 200);
        }

        private function getdetails(){
            $details = new getDetails();
            $details->get_details();
        }
        
        private function addbirthday(){
            if(isset($_GET['Name']) and isset($_GET['Dob'])){

                $this->Name = $_GET['Name'];
                $this->Dob = $_GET['Dob'];

                $birthday = new addBirthday($this->Name, $this->Dob);

            } else {
                $this->send_data = [
                    "data" => ["error" => "Enter Name and Dob"]
                ];
                $this->response($this->json($this->send_data), 204);
            }
        }

        private function deletedetails(){
            if(isset($_GET['id'])){

                $id = $_GET['id'];

                $delete = new Delete($id);

            } else{
                $this->send_data = [
                    "data" => ["error" => "Enter id"]
                ];
                $this->response($this->json($this->send_data), 204);
            }
        }

    }

    $api = new API();
    $api->processApi();

?>