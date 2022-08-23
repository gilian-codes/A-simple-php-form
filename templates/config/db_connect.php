<?php 
   //connect to the data base
   $conn = mysqli_connect('localhost','gilian','gilian1234','ninja_pizza');

       //check the connection

         if(!$conn){
            echo 'Connection error:' .mysqli_connect_error();
             };



?>