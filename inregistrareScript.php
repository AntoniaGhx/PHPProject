<?php
    require_once 'head.php';

    if(isset($_POST["inregistrare"])){
        $username = htmlentities($_POST['username']);
        $parola = md5(htmlentities($_POST['parola']));
        $parolaUnhashed = htmlentities($_POST['parola']);
        $sex = htmlentities($_POST['sex']);
        $casatorit = htmlentities($_POST['casatorit']);
        $nume = htmlentities($_POST['nume']);
        $prenume = htmlentities($_POST['prenume']);
        $email = htmlentities($_POST['email']);
        $_SESSION["validare"]=array();

        echo $username, '<br>';
        echo $parolaUnhashed;
        echo $parola, '<br>';
        echo $sex, '<br>';
        echo $casatorit, '<br>';
        echo $nume, '<br>';
        echo $prenume, '<br>';
        echo $email, '<br>';

        $found=0;
        if(validareNume($nume)!="")
            $_SESSION["validare"]["nume"]=0;
        else
            $_SESSION["validare"]["nume"]=1;

        if(validareNume($username)!="")
            $_SESSION["validare"]["username"]=0;
        else
            $_SESSION["validare"]["username"]=1;
        
        if(validareNume($prenume)!="")
            $_SESSION["validare"]["prenume"]=0;
        else
            $_SESSION["validare"]["prenume"]=1;

        if(validareEmail($email)!="")
            $_SESSION["validare"]["email"]=0;
        else
            $_SESSION["validare"]["email"]=1;
        
        if(validareParola($parolaUnhashed)!="")
            $_SESSION["validare"]["parola"]=0;
        else
            $_SESSION["validare"]["parola"]=1;

        $found = 0;
        $query="SELECT * FROM utilizatori WHERE username='$username'";
        $result=$conn->query($query);
        if($result->num_rows > 0){
            $_SESSION["validare"]["username"]=0; $found=1;
        }
        
        $query="SELECT * FROM utilizatori WHERE email='$email'";
        $result=$conn->query($query);
        if($result->num_rows > 0){
            $_SESSION["validare"]["email"]=0; $found=1;
        }
        
        if($_SESSION["validare"]["nume"]==1 
            && $_SESSION["validare"]["prenume"]==1 
            && $_SESSION["validare"]["email"]==1 
            && $_SESSION["validare"]["username"]=1
            && $_SESSION["validare"]["parola"]==1 
            && $found==0) {

            $user=new User($username,md5($parola),$sex,$casatorit,$nume,$prenume,$email);
		    $_SESSION["user"]=serialize($user);	
            $date=date("Y/m/d");
            echo '<br>';	
            echo '<br>';	
            echo $date;
            $sql = "INSERT INTO utilizatori (username, parola, sex, casatorit, nume, prenume, email, dataregistrare) 
            VALUES ('$username', '$parola', '$sex', '$casatorit', '$nume', '$prenume', '$email', '$date')";
            
            if ($conn->query($sql) === TRUE) {
                require_once 'meniu.php';
                echo "New record created successfully";
                unset($_SESSION["validare"]);
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }else{
            if($_SESSION["validare"]["nume"]==0) 
                echo "<div class='alert alert-danger'><b>Nume:</b> ".validareNume($nume)."</div>";
            if($_SESSION["validare"]["prenume"]==0) 
                echo "<div class='alert alert-danger'><b>Prenume: </b>".validareNume($prenume)."</div>";
            if($_SESSION["validare"]["email"]==0) 
                echo "<div class='alert alert-danger'><b>Email: </b>".validareEmail($email).", exista in DB</div>";
            if($_SESSION["validare"]["parola"]==0) 
                echo "<div class='alert alert-danger'><b>Parola: </b>".validareParola($parolaUnhashed)."</div>";
            if($_SESSION["validare"]["username"]==0){		
                echo "<div class='alert alert-danger'><b>Username: </b> ".validareNume($username).", exista deja in baza de date</div>";
            }
            echo '<div id="erori"></div>';
            include "inregistrare.php";

        }
        echo '</div>';
    }else{
        echo '<div id="erori"></div>';
        echo "<div class='alert alert-danger'>Nu ati trecut prin formularul de inregistrare</div>";
        
        header("Location:inregistrare.php");

        echo "</div>";
    }

    require_once 'footer.php';
?>