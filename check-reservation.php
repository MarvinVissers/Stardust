<?php
    require_once 'functions/reservering.php';

    session_start();

    $checkReservering = new reservering("localhost", "root", "", "stardust");
	
	// Waarden uit het form naar de check reservering functie sturen
	
?>

<html>
    <head>
        <title>Check reservation - Stardust Hotel</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!--Link voor eigen stylesheet-->
        <link rel="stylesheet" href="css/style.css"/>

        <!--Link voor eigen jquery-->
        <script src="validation.js"></script>

        <!-- Link voor Bootstrap -->
        <link rel="stylesheet" href="bootstrap/css/bootstrap-grid.css"/>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <!--Link naar bootstrap Jquery-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <!--link voor de icons-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>

        <!--Link voor de favicon-->
        <link rel="icon" href="images/favicon.png"/>
    </head>

    <body>
        <header>
            <nav class="fixed-top">
                <div class="container">
                    <div class="align-left logo">
                        <a href="index.php"><img src="images/logo.jpg" class="navbar-logo"/></a>
                    </div>

                    <div class="handle">
                        <div class="always-align-right">
                            <img src="images/burger-menu.png" style="height:40px; width:40px; margin-top:25px; margin-bottom:15px;">
                        </div>
                    </div>

                    <ul>
                        <div class="align-right">
                            <li class="align-left"><a href="index.php">Home</a></li>
                            <li class="align-left"><a href="reservation.php">Reserve</a></li>
                            <li class="align-left"><a class="active" href="check-reservation.php">Check resrvation</a></li>
                            <?php 
                                if (isset($_SESSION['email'])){
                                    echo "<li class='align-right'><a href='logout.php'>Log out</a></li>";
                                    echo "<li class='align-right'><a href='home.php'>My acoount</a></li>";
                                }else{
                                    echo "<li class='align-right'><a href='sign-up.php'>Sign up</a></li>";
                                    echo "<li class='ative align-right'><a href='sign-in.php'>Sign in</a></li>";
                                }
                            ?>
                        </div>
                    </ul>
                </div>
            </nav>
        </header>

        <div class="content">
            <section>
                <div class="intro">
                    <div class="intro-blok">
                        <div class="intro-tekst">
                            <H1 class="intro-tekst-header">Check your reservation</h1>
                            <h3>This is our check reservation page. If you have already made an reservation and would like to look over what amazing room you have before then you check that here. Just type in you reservation number, press the button and let the magic happen. </h3>
                        </div>
                    </div>

                    <div class="intro-blok-rechts">
                        <div class="intro-image-box">
                            <img src="images/foto-intro.jpg" class="intro-image">
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <section>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h2>Check your reservation</h2>
                    </div>
                </div>

                <form id="checkReservation" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <h4>Reservation number</h4>
                                <input type="number" class="form-control" id="ID" name="txtReservationNumber" onchange="idValidation()">
                                <span id="IDError" class="input-feedback"></span>
                            </div>
                            <!--<span class="input-feedback error"><?php //echo $error; ?></span>-->
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" name="btnCheck" value="Check reservation"/>
                            </div>
                        </div> 
                    </div>  
                </form>
            </div>
        </section>

        <section>
            <span>
                <?php 
                    if(isset($_POST['btnCheck']))
                    {
                        $reservationNumber = htmlentities($_POST['txtReservationNumber']);

                        $result = $checkReservering->checkReservering($reservationNumber);

                        $chosenReservation = $checkReservering->checkReservering($reservationNumber);

                        foreach($chosenReservation as $reservation){
                ?>
                    <div class="background-grey extra-padding">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-12">
                                    <h2 class="align-center">Details for reservation <?php echo $reservation->getReservationnumber(); ?></h2>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-hover">
                                        <tr> <td>Name</td> <td><?php echo $reservation->getFirstname()." ".$reservation->getSurname();?></td> </tr>
                                        <tr> <td>Email</td> <td><?php echo $reservation->getEmail();?></td> </tr>
                                        <tr> <td>Roomnumber</td> <td><?php echo $reservation->getRoomnumber();?></td> </tr>
                                        <tr> <td>Checkin date</td> <td><?php echo $reservation->getCheckindate();?></td> </tr>
                                        <tr> <td>Checkout date</td> <td><?php echo $reservation->getCheckoutdate();?></td> </tr>
                                        <tr> <td>Reservation number</td> <td><?php echo $reservation->getReservationnumber();?></td> </tr>
                                        <tr> <td>Price</td> <td>€<?php echo $reservation->getPrice();?>,-</td> </tr>
                                        <tr> <td>Roominformation</td> <td><a href="roomdetails.php?kid=<?php echo $reservation->getRoomnumber();?>">View room details</a></td> </tr>
                                    </table>
                                </div>
                            </div> 
                        </div>
                    </div>
                <?php
                        }
                    }

                ?>
            </span>
        </section>

        <div class="container">
            <div class="zwarte-lijn"><p></p></div>
        </div>

        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Stardust Hotel</h3>
                        
                        <div class="row" style="padding-top: 5px;">
                            <div class="col-sm-1">
                                <i class="material-icons" style="font-size:24px; color: #89cee6;">place</i>
                            </div>

                            <div class="col-sm-11">
                                Industrial road 3150 Las Vegas
                            </div>
                        </div>

                        <div class="row" style="padding-top: 5px;">
                            <div class="col-sm-1">
                                <i class="fa fa-phone" style="font-size:24px; color: #89cee6;"></i>
                            </div>

                            <div class="col-sm-11">
                                +1-202-555-0152
                            </div>
                        </div>

                        <div class="row" style="padding-top: 5px;">
                            <div class="col-sm-1">
                                <i class="material-icons" style="font-size:24px; color: #89cee6;">email</i>
                            </div>

                            <div class="col-sm-11">
                                <a href="mailto:info@stardust.com">info@stardust.com</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <h3>Opening hours</h3>
                        <table class="openingstijden">
                            <tr id="1"> <td>Mondag</td> <td>06:00 - 23:00</td> </tr>
                            <tr id="2"> <td>Thuesday</td> <td>06:00 - 23:00</td> </tr> 
                            <tr id="3"> <td>Wensday</td> <td>06:00 - 23:00</td> </tr> 
                            <tr id="4"> <td>Thursday</td> <td>06:00 - 23:00</td> </tr> 
                            <tr id="5"> <td>Friday</td> <td>06:00 - 23:00</td> </tr> 
                            <tr id="6"> <td>Saterday</td> <td>06:00 - 23:00</td> </tr> 
                            <tr id="0"> <td>Sunday</td> <td>08:00 - 20:00</td> </tr>     
                        </table>
                    </div>
                </div>
            </div>
        </footer>
        
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

        //functie voor de slider
        $('.carousel').carousel({
            interval: 5000
        })

        //functie voor het krijgen van de dag
        var today = new Date().getDay();
        $("#" + today).addClass("highlight");
    </script>
</html>