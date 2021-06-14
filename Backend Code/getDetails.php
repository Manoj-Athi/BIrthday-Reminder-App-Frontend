<?php

    include_once($_SERVER['DOCUMENT_ROOT'].'/Database.class.php');
    include_once($_SERVER['DOCUMENT_ROOT'].'/restApi.php');

    class getDetails extends rest {

        private $conn;
        private $send_data;

        public function __construct(){
            $this->conn = Database::getConnection();
        }

        public function get_details(){

            $query = "SELECT * FROM `birthday` WHERE 1;";

            $result = mysqli_query($this->conn, $query);

            if (mysqli_num_rows($result) > 0) {

                $this->send_data = array();
                $this->send_data['data'] = array();

                while($row_data = mysqli_fetch_assoc($result)) {
                    $send_array = array(
                        "id" => $row_data["id"],
                        "Name" => $row_data["Name"],
                        "Dob" => $row_data["Dob"],
                        "today" => $row_data["today"],
                        "daysRemaining" => $row_data["daysRemaining"]
                    );
                    array_push( $this->send_data['data'], $send_array);
                }
                $this->response($this->json($this->send_data), 200);
            } else {
                $this->send_data = [
                    "data" => ["Error" => "Zero rows found..."]
                ];
                $this->response($this->json($this->send_data), 406);
            }

        }

    }

?>