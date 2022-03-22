<?php
    class User{
        private $username,$parola,$sex,$casatorit,$nume,$prenume,$email;
        
        function getSex(){
            return $this->sex;
        }
        function getCasatorit(){
            return $this->casatorit;
        }
        function getNume(){
            return $this->nume;
        }
        function getPrenume(){
            return $this->prenume;
        }
        function getUsername(){
            return $this->username;
        }
        function getEmail(){
            return $this->email;
        }
        function getParola(){
            return $this->parola;
        }
        
        function setSex($sex){
            $this->sex=$sex;
        }
        function setCasatorit($casatorit){
            $this->casatorit=$casatorit;
        }
        function setNume($nume){
            $this->nume=$nume;
        }
        function setPrenume($prenume){
            $this->prenume=$prenume;
        }
        function setUsername($username){
            $this->username=$username;
        }
        function setEmail($email){
            $this->email=$email;
        }
        function setParola($parola){
            $this->parola=$parola;
        }
        function toCSV(){
            return "$this->nume,$this->prenume,$this->username,$this->email,$this->parola,$this->sex,$this->casatorit\r\n";
        }
        function toInsert(){
            return "'$this->nume','$this->prenume','$this->username','$this->email','$this->parola','$this->sex'";
        }
        function __construct($username, $parola, $sex, $casatorit, $nume, $prenume, $email){
            $this->sex=$sex;
            $this->casatorit=$casatorit;
            $this->nume=$nume;
            $this->prenume=$prenume;
            $this->username=$username;
            $this->email=$email;
            $this->parola=$parola;
        }
    }
?>