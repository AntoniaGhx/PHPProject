
<?php
require_once 'head.php';
require_once 'meniu.php';

echo "<div>";
$array=array();
$order="ORDER BY nume ASC";
if(isset($_SESSION["order"])) if ($_SESSION["order"]==="d") $order="ORDER BY nume DESC";
	
$query="SELECT nume,prenume,username,email,parola,sex,casatorit,dataregistrare FROM utilizatori ".$order;
	
$result=$conn->query($query);
if($result->num_rows > 0){
	while($row=$result->fetch_assoc()){
		$found=1;
		$nume_fisier=$row["nume"];
		$prenume_fisier=$row["prenume"];
		$username_fisier=$row["username"];
		$email_fisier=$row["email"];
		$parola_fisier=$row["parola"];
		$sex_fisier=$row["sex"];
		$casatorit_fisier=$row["casatorit"];
		$dataregistrare_fisier=$row["dataregistrare"];
		$array[$username_fisier]=array();
		$array[$username_fisier]["nume"]=$nume_fisier;
		$array[$username_fisier]["prenume"]=$prenume_fisier;
		$array[$username_fisier]["email"]=$email_fisier;
		$array[$username_fisier]["parola"]=$parola_fisier;
		$array[$username_fisier]["sex"]=$sex_fisier;
		$array[$username_fisier]["casatorit"]=$casatorit_fisier;
		$array[$username_fisier]["dataregistrare"]=$dataregistrare_fisier;
	}
}

echo '<ul style="list-style: none">';
echo '<li style="padding: 5px; border: 1px solid blue">';
	echo '<div style="display: flex; justify-content: center; align-items: center">';
	echo '<div style="display: flex; justify-content: center; align-items: center">';
		echo "<div style='padding: 0px 5px; border-right: 1px solid black'>Username</div>";
		echo "<div style='padding: 0px 5px; border-right: 1px solid black'>Nume si prenume</div>";
		echo "<div style='padding: 0px 5px; border-right: 1px solid black'>Email</div>";
		echo "<div style='padding: 0px 5px'>Data inregistrarii</div>";
	echo '</div>';
	echo '</div>';
echo '</li>';
foreach($array as $k => $v){
	echo '<li style="padding: 5px; border: 1px solid blue">';
	if(isset($_SESSION["user"])){
	//	print_r($v);
		echo '<div style="display: flex; justify-content: center; align-items: center">';
			echo '<div style="display: flex; justify-content: center; align-items: center">';
				echo "<div style='padding: 0px 5px; border-right: 1px solid black'>".$k."</div>";
				echo "<div style='padding: 0px 5px; border-right: 1px solid black'>".$v["nume"]." ".$v["prenume"]."</div>";
				echo "<div style='padding: 0px 5px; border-right: 1px solid black'>".$v["email"]."</div>";
				echo "<div style='padding: 0px 5px'>".$v["dataregistrare"]."</div>";
			echo '</div>';
		echo '</div>';
	}else{
		echo $k;

	}
	echo '</li>';
}
echo "</ul>";
echo "</div>";
require_once 'footer.php';
?>