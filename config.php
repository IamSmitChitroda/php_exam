<?php

class Config
{
    private $HOST = 'localhost';
    private $USERNAME = 'root';
    private $PASSWORD = '';
    private $DATABASE = "library_db";



    public function connect()
    {
        $response = mysqli_connect($this->HOST, $this->USERNAME, $this->PASSWORD, $this->DATABASE); 
        return $response;

    }
}