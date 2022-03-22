<?php
    /*
    getData = preia dintr-o variabila superglobala de tipul $_POST["nume"] valoarea daca exista
    */
    function getData($method,$key){
        $value="";
        if(isset($method["$key"]))
            $value=htmlentities($method["$key"]);
        return $value;
    }

    /* *************** VALIDARI ****************** */
    function validareNume($nume){
        if($nume=="") return "Continutul nu poate fi gol";
        else if (preg_match("/[^a-zA-Z _-]/",$nume)) return "Caracterele permise sunt a-z, A-Z, spatii, _ si -<br>";
        return "";
    }

    function validareEmail($email){
        if($email=="") return "Continutul nu poate fi gol";
        else {
            $eroare="";
            
            if (preg_match("/[^a-z0-9A-Z.@_-]/",$email)) $eroare.= "Caracterele permise sunt a-z, A-Z, 0-9, ., @, _ si -<br>";
            if ( strpos($email, ".") ===false || strpos ($email, "@") ===false ) $eroare.= "Trebuie sa existe caracterul . sau @<br>";
            return $eroare;
        }
        return "";
    }
    
    function validareParola($parola){
        if($parola=="") return "Continutul nu poate fi gol";
        else if (!preg_match("/[a-z]/",$parola) || !preg_match("/[A-Z]/",$parola) || !preg_match("/[0-9]/",$parola) || !preg_match("/[!@#$%^&*()_-]/",$parola)) return "Parola trebuie sa contina cel putin cate o litera mica, litera mare, cifra sau caracterele speciale !@#$%^&*()_-<br>";
        return "";
    }

?>