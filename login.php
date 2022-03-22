<!DOCTYPE HTML>  
<html>
  <head>
  </head>
  <body>  
  <?php
	  if(!isset($_SESSION["user"]))
	  {?>
    <h2>Login Form</h2>
    <form method="post" action="loginScript.php">  
      Username: <input type="text" name="username">
      <br><br>
      Parola: <input type="password" name="parola">
      <br><br>
      ORDER BY NAME:
      <input type="radio" name="order" value="a">Asc
      <input type="radio" name="order" value="d">Desc
      <br>
      <br>
      <input type="submit" name="autentificare" value="Submit">
    </form>
    <?php }?>  
  </body>
</html>