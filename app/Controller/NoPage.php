<?php 

    class NoPage{

        public function index(){
           
            header("HTTP/1.0 404 Not Found");
            echo ' <h1>404</h1> This page was not found';
            
        }
    }
?>
