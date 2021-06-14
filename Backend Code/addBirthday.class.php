<?php

    include_once($_SERVER['DOCUMENT_ROOT']."/Database.class.php");
    include_once($_SERVER['DOCUMENT_ROOT'].'/restApi.php');

    class addBirthday extends rest{
        
        private $conn;
        public function __construct($Name, $Dob){
            
            $today = $this->is_today($Dob);
            $daysRemaining = $this->days_remaining($Dob);

            $this->conn = Database::getConnection();

            $query = "INSERT INTO `birth`.`birthday` (`Name`, `Dob`, `today`, `daysRemaining`) VALUES ('$Name', '$Dob', '$today', '$daysRemaining');";
            if(!mysqli_query($this->conn, $query)){
                $this->response($this->json([
                    "data" => ["Error" => "Unable to save data in db..."]
                ]), 406);
            }else{
                $this->response($this->json(array(
                    "data" => array(
                        "id" => mysqli_insert_id($this->conn),
                        "Name" => $Name,
                        "Dob" => $Dob,
                        "today" => $today,
                        "daysRemaining" => $daysRemaining
                        )
                    )), 200);
            }
        }

        public function is_today($Dob){
            $today_date = date("m-d");
            $birth_date = substr($Dob, 5);
            if($birth_date === $today_date){
                return 1;
            } else {
                return 0;
            }
        }

        public function days_remaining($Dob){
            $this_year = date("Y");
            $this_month = date("m");
            $this_day = date("d");
            $birth_month = substr($Dob, 5, 2);
            $birth_day = substr($Dob, 8, 2);

            if(((int)$birth_day < (int)$this_day) and ((int)$birth_month <= (int)$this_month)){
                $this_year = (int)$this_year + 1;
                $this_year = strval($this_year);
            } 

            if($this->is_today($Dob)){
                return 0;
            }else{
                return $this->calculate_days_different($this_year."-".$birth_month."-".$birth_day, date("Y-m-d"));
            }
        }

        public function calculate_days_different($date1, $date2){
            $time_diff = strtotime($date1) - strtotime($date2);
            return round($time_diff / 86400);
        }
    }
?>