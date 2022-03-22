<?php
require_once 'head.php';

	if(isset($_POST["autentificare"]))
	{
		$user="";
		$username=getData($_POST,"username");
		$parola=md5(getData($_POST,"parola"));
		$order=getData($_POST,"order");
		
		$found=0;
		$query="SELECT username,parola,sex,casatorit,nume,prenume,email FROM utilizatori WHERE username=? AND parola=?";
		$stmt=$conn->prepare($query);
		$stmt->bind_param("ss",$username,$parola);
		$stmt->execute();
		$stmt->bind_result($usernameRes,$parolaRes,$sexRes,$casatoritRes,$numeRes,$prenumeRes,$emailRes);
		
		while($stmt->fetch()){        
			$found=1;
			$user = new User($usernameRes,$parolaRes,$sexRes,$casatoritRes,$numeRes,$prenumeRes,$emailRes);
		}
		
		if($found==1){
			$_SESSION["user"]=serialize($user);		
			$_SESSION["order"]=$order;
			require_once 'meniu.php';
			echo "<div style='padding: 10px'>Autentificare reusita</div>";
		} else {
			echo "<div class='alert alert-danger'>Autentificare fara succes</div>";
		    // include 'login.php';
			echo "</div>";
		}
	}else{
		if(isset($_SESSION["user"])){
			echo "<div class='alert alert-success'>Am ajuns si aici</div>";
			echo "<li class='nav-item'>
				<a class='nav-link' href='logout.php'>LOGOUT</a>
				</li>";
		} else{
			echo "<div class='alert alert-danger'>Nu ati trecut prin formularul de autentificare</div>";
			// include 'login.php';
		}
	}

require_once 'footer.php';
?>