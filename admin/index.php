<?php
    session_start();

    if (isset($_SESSION['AdminEmail'])){
       
    }else{
        header("Location:log-in.php");
    }
?>

<html>
    <head>
        <title>CMR - Stardust Hotel</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!--Link voor eigen stylesheet-->
        <link rel="stylesheet" href="../css/style.css"/>

        <!--Link voor eigen jquery-->
        <script src="../validation.js"></script>

        <!-- Link voor Bootstrap -->
        <link rel="stylesheet" href="../bootstrap/css/bootstrap-grid.css"/>
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.css"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <!--Link naar bootstrap Jquery-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <!--link voor de icons-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>

        <!--Link voor de favicon-->
        <link rel="icon" href="../images/favicon.png"/>
    </head>

    <body>
        <header>
            <nav class="fixed-top">
                <div class="container">
                    <div class="align-left logo">
                        <a href="index.php"><img src="../images/logo.jpg" class="navbar-logo"/></a>
                    </div>

                    <div class="handle">
                        <div class="always-align-right">
                            <img src="../images/burger-menu.png" style="height:40px; width:40px; margin-top:25px; margin-bottom:15px;">
                        </div>
                    </div>

                    <ul>
                        <div class="align-right">
                            <li class="align-left"><a href="reservations.php">Reservations</a></li>
                            <li class="align-left"><a href="maintenance.php">Plan Maintence</a></li>
                            <li class="align-left"><a href="add-room.php">Add room</a></li>
                            <li class="align-left"><a href="weekoverview.php">Week overview</a></li>
                            <li class="align-left"><a href="index.php">Log out</a></li>
                        </div>
                    </ul>
                </div>
            </nav>
        </header>

        <section>
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 style="text-align: center;">Welcome back <?php echo $_SESSION['AdminEmail'];?></h3>
                        </div>
                    </div>             
                </div>
            </div>

            <div class="extra-padding">
                <p> </p>
            </div>
        </section>

        <footer>
            <div class="footer-background">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="footer-content">
                                <p>
                                    <div class="content-maker">
                                        <i class="fa fa-copyright" style="font-size:15px; color: #89cee6;"></i> geraliseerd door: <a href="#" class="maker">Marvin Vissers</a>
                                    </div>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </body>

    <script>
        //Functie voor openen menubalk
        $('.handle').on('click', function(){
            $('nav ul').toggleClass('showing');
        });
    </script>
</html>