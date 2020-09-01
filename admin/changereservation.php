<?php
    include "../functions/reservering.php";
    session_start();

    if (isset($_SESSION['AdminEmail'])){
       
    }else{
        header("Location:log-in.php");
    }

    //connectie maken met de database
    $reserveringnkje = new reservering("localhost", "root", "", "stardust");
    
    //kijken of er een rid in zit
	if(isset($_GET["rid"]))
	{
		$rid = $_GET["rid"];
		
        $result = $reserveringnkje->getOverviewById($rid);

        $chosenResrvation = $reserveringnkje->getOverviewById($rid);
		
		foreach($chosenResrvation as $selectedReservation)
		{
            // Waarden uit het form naar de verander reservering functie sturen
            if(isset($_POST['btnChange']))
            {
                $changeRID = $rid;
                $changeUID = htmlentities($_POST['txtUserID']);
                $changeFirstname = htmlentities($_POST['txtFirstname']);
                $changeSurname = htmlentities($_POST['txtSurname']);
                $changeEmail = htmlentities($_POST['txtEmail']);
                $changeRoomnumber = htmlentities($_POST['txtRoomnumber']);
                $changeCheckin = htmlentities($_POST['txtCheckinDate']);
                $changeCheckout = htmlentities($_POST['txtCheckoutDate']);
                $changePrice = htmlentities($_POST['txtPrice']);
            
                $change = $reserveringnkje->changeReservation($changeRID, $changeUID, $changeFirstname, $changeSurname, $changeEmail, $changeRoomnumber, $changeCheckin, $changeCheckout, $changePrice);
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
                            <li class="align-left"><a class="active" href="reservations.php">Reservations</a></li>
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
                            <h2 style="text-align:center;">Change reservation of <?php echo $selectedReservation->firstname. " ".$selectedReservation->surname;?></h2>
                        </div>
                    </div>

                    <div class="extra-padding">
                        <p> </p>
                    </div>

                    <form id="changeReservation" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Reservation ID</label>
                                    <input type="text" class="form-control" value="<?php echo $selectedReservation->rid;?>" name="txtRID" required disabled/>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>User ID</label>
                                    <input type="text" class="form-control" value="<?php echo $selectedReservation->uid;?>" id="ID" name="txtUserID" required onkeyup="idValidation()"/>
                                    <span id="IDError" class="input-feedback"></span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-groep">
                                    <label>Firstname</label>
                                    <input type="text" class="form-control" value="<?php echo $selectedReservation->firstname;?>" id="name" name="txtFirstname" required onkeyup="nameValidation()"/>
                                    <span id="nameError" class="input-feedback"></span>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-groep">
                                    <label>Surname</label>
                                    <input type="text" class="form-control" value="<?php echo $selectedReservation->surname;?>" id="surname" name="txtSurname" required onkeyup="surnameValidation()"/>
                                    <span id="surnameError" class="input-feedback"></span>
                                </div>
                            </div>
                        </div>
                </div>

                <div class="background-grey">
                    <div class="extra-padding">
                            <p> </p>
                    </div>

                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" value="<?php echo $selectedReservation->email; ?>" id="email" name="txtEmail" required onkeyup="emailValidation()"/>
                                    <span id="emailError" class="input-feedback"></span>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Roomnumber</label>
                                    <input type="number" class="form-control" value="<?php echo $selectedReservation->roomnumber; ?>" id="roomnumber" name="txtRoomnumber" required onkeyup="roomnumberValidation()"/>
                                    <span id="roomnumberError" class="input-feedback"></span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Check-in date</label>
                                    <input type="date" class="form-control" value="<?php echo $selectedReservation->checkin_date; ?>" id="checkin" name="txtCheckinDate" required onkeyup="checkinValidation()"/> 
                                    <span id="checkinError" class="input-feedback"></span>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Check-out date</label>
                                    <input type="date" class="form-control" value="<?php echo $selectedReservation->checkout_date; ?>" id="checkout" name="txtCheckoutDate" required onkeyup="checkoutValidation()"/> 
                                    <span id="checkoutError" class="input-feedback"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="extra-padding">
                        <p> </p>
                    </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Reservation number</label>
                                    <input type="number" class="form-control" value="<?php echo $selectedReservation->reservation_number; ?>" id="resNumber" name="txtReservationNumber" required disabled/> 
                                    <span id="checkinError" class="input-feedback"></span>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Price</label>
                                    <input type="number" class="form-control" value="<?php echo $selectedReservation->price; ?>" id="price" name="txtPrice" required onkeyup="priceValidation()"/> 
                                    <span id="priceError" class="input-feedback"></span>
                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="iets" value="<?php $selectedReservation->rid; ?>" disabled/>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input type="submit" name="btnChange" value="Change reservation" class="btn btn-primary"/>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
<?php
        }
    }else
        {
            header("Location: reservations.php");
        }
?>
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