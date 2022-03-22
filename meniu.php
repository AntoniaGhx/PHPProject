<!DOCTYPE html>
<body>
    <div id="header">
        <div>
            <a href="#">
                <?php
                if(isset($_SESSION["user"])){
                    $user=unserialize($_SESSION["user"]);
                    echo "Salut ".$user->getNume()." ".$user->getPrenume();
                }
                ?>
            </a>

            <div>
                <ul style="list-style: none">
                <?php
                if(!isset($_SESSION["user"]))
                {?>
                    <li>
                        <a href="index.php">LOGIN / SIGN-UP</a>
                    </li>
                <?php }else{?>
                    <li>
                        <a href="index.php">HOME</a>
                    </li>
                <?php }?>
                <!-- <?php
            if(isset($_SESSION["utilizator"])){?>
                <li>
                    <a class="nav-link" href="profil.php">PROFIL</a>
                </li>
            <?php }?> -->
                <li>
                    <a class="nav-link" href="user.php">USERS</a>
                </li>
                <?php
                if(isset($_SESSION["user"]))
                {?>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">LOGOUT</a>
                </li>
                <?php }?>
                </ul>
            </div>
        </div>
    </div>
</body>
