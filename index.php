<?php 
require_once 'head.php';
require_once 'meniu.php';

$R=rand(0,255);
$G=rand(0,255);
$B=rand(0,255);
$culoare=sprintf("rgb(%u,%u,%u)!important",$R,$G,$B);

?>
<!--<style>
body{color:<?php printf("rgb(%u,%u,%u)!important",$R,$G,$B);?>}
</style>

<style>
body{color:<?=$culoare;?>}
</style>-->
<div class="container mt-4">
<div id="erori"></div>
<?php
    echo '<div style="display: inline-block; padding-right: 50px">';
    require_once 'inregistrare.php';
    echo '</div>';
    echo '<div style="display: inline-block">';
    require_once 'login.php';
    echo '</div>';
    if(isset($_SESSION["user"])){
        require_once 'usersList.php';
    }
 ?>
</div>

<?php
    require_once 'footer.php';
?>