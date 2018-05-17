<?php

class Connection{
    
    public function dbConnect(){
        return new PDO("mysql:host=localhost; dbname=db_oacrwebapp", "root", ""); //Returns PDO object that'll connect db'
    }
} 