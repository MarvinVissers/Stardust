<?php
    require_once 'functions/reservering.php';
    require_once 'functions/kamer.php';
    require_once 'functions/inloggen.php';

    session_start();

    $reservering = new reservering("localhost", "root", "", "stardust");
    $kamer = new kamer("localhost", "root", "", "stardust");
    $inloggen = new inloggen("localhost", "root", "", "stardust");

    if(isset($_GET["kid"]))
	{
        $kid = $_GET["kid"];
        $checkin = $_GET['checkin'];
        $checkout = $_GET['checkout'];

        $resultKamer = $kamer->detailsRoom($kid);
        //$resultAantalNachten = $kamer->priceReservation($kid, $checkin, $checkout);

        $chosenRoom = $kamer->detailsRoom($kid);
        //$priceReservation = $kamer->priceReservation();

        foreach($chosenRoom as $selectedRoom)
        {
            //bereken van de prijs van de reservering
            $date1 = $checkin;
            $date2 = $checkout;

            $diff = abs(strtotime($date2) - strtotime($date1));

            $years = floor($diff / (365*60*60*24));
            $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
            $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

            $jaren = $years;
            $maanden = $months;
            $dagen = $days;

            if($years > 0){
                $kamer_kosten_jaar = 365 * $selectedRoom->getAmount();
                $jaren = $years * $kamer_kosten_jaar;
            }

            if($maanden > 0){
                $kamer_kosten_maand = 30 * $selectedRoom->getAmount();
                $maanden = $months * $kamer_kosten_jaar;
            }

            if($dagen > 0){
                $dagen = $days * $selectedRoom->getAmount();
            }

            $reservation_price = $jaren + $maanden + $dagen;

            /*echo "<br><br><br><br>days ".$days."<br>";
            echo "months ". $months."<br>";
            echo "years ". $years."<br><br>";

            echo "dagen: ".$dagen."<br>";
            echo "maanden: ".$maanden."<br>";
            echo "jaren: ".$jaren."<br>";
            echo "totaal prijs: ".$reservation_price."<br>";*/

            if (isset($_SESSION['email'])){
                $email = $_SESSION['email'];

                $resultUser = $inloggen->getOverviewUser($email);

                $chosenUser = $inloggen->getOverviewUser($email);

                foreach($chosenUser as $selectedUser)
                {  
                    //berekenen reserveringsnummer
                    $reserveerNummer = $selectedUser->getUid() * $selectedRoom->getRoomnumber() * $reservation_price;

                    if(isset($_POST['btnReservation']))
                    {
                        //informatie van de boeker
                        $reserveerUID = $selectedUser->getUid();
                        $reserveerFirstname = $selectedUser->getFirstname();
                        $reserveerSurname = $selectedUser->getSurname();
                        $reserveerEmail = $selectedUser->getEmail();

                        /*echo "<br><br><br><br><br><br>uid: ".$reserveerUID."<br>";
                        echo "firstname: ".$reserveerFirstname."<br>";
                        echo "surname: ".$reserveerSurname."<br>";
                        echo "Email: ".$reserveerEmail."<br><br>";*/

                        //informatie van de kamer
                        $reserveerRoomnumber = $selectedRoom->getRoomnumber();
                        $reserveerCheckin = $checkin;
                        $reserveerCheckout = $checkout;

                        /*echo "Roomnumber: ".$reserveerRoomnumber."<br>";
                        echo "Checkin: ".$reserveerCheckin."<br>";
                        echo "Checkout: ".$reserveerCheckout."<br><br>";*/

                        //informatie van de reservering
                        $reserveerType = "R";
                        $reserveerPrice = $reservation_price;
                        $reserveerNumber = $reserveerNummer;

                        /*echo "Type: ".$reserveerRoomnumber."<br>";
                        echo "Prijs: ".$reserveerPrice."<br>";
                        echo "Reserveernummer: ".$reserveerNumber."<br><br>";*/
                        
                        $nieuweReservering = $reservering->registerReservation($reserveerUID, $reserveerFirstname, $reserveerSurname, $reserveerEmail, $reserveerRoomnumber, $reserveerCheckin, $reserveerCheckout, $reserveerType, $reserveerNumber, $reserveerPrice);
                    }
?>

<html>
    <head>
        <title>Overview Reservation - Stardust Hotel</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!--Link voor eigen stylesheet-->
        <link rel="stylesheet" href="css/style.css"/>

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
                            <li class="align-left"><a class="active" href="reservation.php">Reserve</a></li>
                            <li class="align-left"><a href="check-reservation.php">Check resrvation</a></li>
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

        <section>
            <div class="content">
                <div class="container">
                    <form method="POST">
                        <div class="row">
                            <div class="col-sm-12">
                                <h2><?php echo $selectedRoom->getRoomnumber(); ?> is availible between <?php echo $checkin; ?> and <?php echo $checkout; ?></h2>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <h3>Details reservation</h3>
                                <h4>Name: <?php echo $selectedUser->getFirstname(). " ". $selectedUser->getSurname(); ?></h4>

                                <h4>Email adress: <?php echo $selectedUser->getEmail(); ?></h4>

                                <h4>roomnumber: <?php echo $selectedRoom->getRoomnumber(); ?></h4> <br>

                                <h3>Price</h3>
                                <h4>The price for this reservation will be €<?php echo number_format($reservation_price , 0, ',', '.'); ?>,- for <?php printf("%d days\n", $days);?> </h4> <br>

                                <h3>Reservation number</h3>
                                <h4>Your reservation number is <?php echo $reserveerNummer; ?>, you can use this to check on the details of your reservation later and to checkin in the hotel.</h4>
                            </div>

                            <div class="col-md-6">
                                <h3>Picture of room <?php echo $selectedRoom->getRoomnumber(); ?></h3>
                                <img src="images/<?php echo$selectedRoom->getKid().$selectedRoom->getPicture(); ?>" class="img-responsive img-rounded">
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-12">
                                <input type="submit" class="btn btn-lg btn-primary btn-block" style="margin-top: 10px;" value="Confirm Reservation" name="btnReservation">
                            </div>
                        </div>
                    </form>
<?php
                }
            }else{
                header("Location: sign-in.php");
            }
        }
    }
?>                   
                </div>
            </div>
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