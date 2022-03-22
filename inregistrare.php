
<!DOCTYPE html>
<html>
  <head>
    <title>Registration Page</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
  </head>
  <body>
  <?php
	  if(!isset($_SESSION["user"]))
	  {?> 
    <div class="container">
      <div class="row col-md-6 col-md-offset-3">
        <div class="panel panel-primary">
          <div class="panel-heading text-center">
            <h1>Registration Form</h1>
          </div>
          <div class="panel-body">
            <form action="inregistrareScript.php" method="post">
              <div class="form-group">
                <label for="username">Username</label>
                <input
                  type="text"
                  class="form-control"
                  id="username"
                  name="username"
                />
              </div>
              <div class="form-group">
                <label for="parola">Parola</label>
                <input
                  type="password"
                  class="form-control"
                  id="parola"
                  name="parola"
                />
              </div>
              <div class="form-group">
                <label for="sex">Sex</label>
                <div>
                  <label for="male" class="radio-inline"
                    ><input
                      type="radio"
                      name="sex"
                      value="m"
                      id="male"
                    />Masculin</label
                  >
                  <label for="female" class="radio-inline"
                    ><input
                      type="radio"
                      name="sex"
                      value="f"
                      id="female"
                    />Feminin</label
                  >
                  <label for="others" class="radio-inline"
                    ><input
                      type="radio"
                      name="sex"
                      value="o"
                      id="others"
                    />Altele</label
                  >
                </div>
              </div>
              <div class="form-group">
                <label for="casatorit">Casatorit</label>
                <div>
                  <label for="da" class="radio-inline"
                    ><input
                      type="radio"
                      name="casatorit"
                      value="d"
                      id="da"
                    />da</label
                  >
                  <label for="nu" class="radio-inline"
                    ><input
                      type="radio"
                      name="casatorit"
                      value="n"
                      id="nu"
                    />nu</label
                  >
                </div>
              </div>
              <div class="form-group">
                <label for="nume">Nume</label>
                <input
                  type="text"
                  class="form-control"
                  id="nume"
                  name="nume"
                />
              </div>
              <div class="form-group">
                <label for="prenume">Prenume</label>
                <input
                  type="prenume"
                  class="form-control"
                  id="prenume"
                  name="prenume"
                />
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input
                  type="email"
                  class="form-control"
                  id="email"
                  name="email"
                />
              </div>
              <input type="submit" name="inregistrare" class="btn btn-primary" />
            </form>
          </div>
        </div>
      </div>
    </div>
    <?php }?> 
  </body>
</html>

