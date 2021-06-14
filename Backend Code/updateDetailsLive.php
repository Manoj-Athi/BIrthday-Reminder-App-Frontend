<?php

    include_once($_SERVER['DOCUMENT_ROOT'].'/Database.class.php');
    include_once($_SERVER['DOCUMENT_ROOT'].'/addBirthday.class.php');

    class updateDetails extends addBirthday{

        private $conn;

        public function __construct(){
            $this->conn = Database::getConnection();

            $query1 = "SELECT * FROM `birthday` WHERE 1;";
            $result = mysqli_query($this->conn, $query1);

            if (mysqli_num_rows($result) > 0) {

                while($row_data = mysqli_fetch_assoc($result)) {

                    $id = $row_data["id"];
                    
                    $Dob = $row_data["Dob"];
                    $today = $this->is_today($Dob);
                    $daysRemaining = $this->days_remaining($Dob);

                    $query2 = "UPDATE `birthday` SET `daysRemaining`='$daysRemaining', `today`='$today' WHERE id = $id";

                    if(!mysqli_query($this->conn, $query2)){
                        $this->send_data = [
                            "data" => ["Error" => "error in updating"]
                        ];
                        $this->response($this->json($this->send_data), 400);
                    }
                }
            } else{
                $this->send_data = [
                    "data" => ["Error" => "error in retrieving data"]
                ];
                $this->response($this->json($this->send_data), 400);
            }
        }

    }

?>