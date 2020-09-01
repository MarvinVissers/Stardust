<?php
    session_start();
    //include "../functions/connectie.php";
    include "../functions/reservering.php";

    $reservering = new reservering("localhost", "root", "", "stardust");

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
        <script src="../validation.js"></script>>

        <!-- Link voor Bootstrap -->
        <link rel="stylesheet" href="../bootstrap/css/bootstrap-grid.css"/>
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.css"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>

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
                            <li class="align-left"><a class="active" href="weekoverview.php">Week overview</a></li>
                            <li class="align-left"><a href="index.php">Log out</a></li>
                        </div>
                    </ul>
                </div>
            </nav>
        </header>

        <section>
            <div class="container">
                <div class="content">
                    <div class="row">
                        <div class="col-sm-12">
                            <h2 style="text-align: center;">Select the date for the week overview</h2>
                        </div>
                    </div>

                    <form method="POST" id="weekoverviewForm">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="date" class="form-control" name="txtDate" id="checkin" required onchange="checkinValidation()"/>
                                    <span id="checkinError"></span>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="date" class="form-control" name="txtCheckout" id="checkout" required onchange="checkoutValidation()"/>
                                    <span id="checkoutError"></span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="get weekoverview" name="btnView"/>
                                </div>
                            </div>
                        </div> 
                    </form>

                    <?php
                        if(isset($_POST['btnView']))
                        {
                            $date1 = $_POST['txtDate'];
                            $date2 = $_POST['txtCheckout'];

                            $result = $reservering->weekoverviewReservations($date1, $date2);
                    ?>
                </div>
            </div>

            <h3 style="text-align:center;">Result for all reservations between <?php echo $date1." en ".$date2;?></h3>
            <table class="table table-hover overzicht">
                <th>Name</th> <th>Roomnumber</th> <th>Checkin date</th> <th>Checkout date</th> <th>Type</th> <th>Reservation number</th> <th>Price</th>
                <?php
                    $weekoverviewReservations = $reservering->weekoverviewReservations($date1, $date2);

                    foreach($weekoverviewReservations as $reservation)
                    {
                        $rid = $reservation->rid;
                        $uid = $reservation->uid;
                        $firstname = $reservation->firstname;
                        $surname = $reservation->surname;
                        $email = $reservation->email;
                        $roomnumber = $reservation->roomnumber;
                        $checkin_date = $reservation->checkin_date;
                        $date = $reservation->checkout_date;
                        //$checkout_date = $$rij->checkout_date;
                        $type = $reservation->type;
                        $reservation_number = $reservation->reservation_number;
                        $price = $reservation->price;
                ?>
                    <tr>
                        <td> <?php echo $firstname. " ". $surname; ?> </td>
                        <td> <?php echo $roomnumber; ?> </td>
                        <td> <?php echo $checkin_date; ?> </td>
                        <td> <?php echo $date; ?> </td>
                        <td> <?php echo $type; ?> </td>
                        <td> <?php echo $reservation_number; ?> </td>
                        <td> <?php echo $price; ?> </td>
                    </tr>
                <?php                       
                    }
                }
                ?>
            </table>
            <span><?php //echo $error; ?></span>
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