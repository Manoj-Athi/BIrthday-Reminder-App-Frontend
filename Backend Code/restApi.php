<?php
    class rest{
        public function response($json_encoded_data, $status_code){
            $this->set_headers($status_code);
            echo $json_encoded_data;
        }

        public function json($data){
            return json_encode($data);
        }

        public function set_headers($code){
            header("Access-Control-Allow-Origin: *");
            header("Access-Control-Allow-Headers: *");
            header("HTTP/1.1 ".$code);
            header("Content-Type:application/json");
        }
    }
?>