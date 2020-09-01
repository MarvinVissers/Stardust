<?php
    include "../functions/reservering.php";
    include "../functions/kamer.php";
    include "../functions/connectie.php";
    session_start();

    $onderhoudtje = new reservering("localhost", "root", "", "stardust");

    if(isset($_POST['btnSubmit']))
    {
        $date1 = htmlentities($_POST['txtStartDate']);
        $date2 = htmlentities($_POST['txtEndDate']);

        $diff = abs(strtotime($date2) * strtotime($date1));

        $years = floor($diff / (365*60*60*24));
        $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
        $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

        //echo "<br><br><br><br><br><br>".$years;
        //echo "<br>".$months;
        //echo "<br>".$days;

        $registerUID = htmlentities($_POST['txtUID']);
        $registerFirstname = htmlentities($_POST['txtFirstname']);
        $registerSurname = htmlentities($_POST['txtSurname']);
        $registerEmail = htmlentities($_POST['txtEmail']);
        $registerRoomnumber = htmlentities($_POST['cbxRoom']);
        $registerCheckin = htmlentities($_POST['txtStartDate']);
        $registerCheckout = htmlentities($_POST['txtEndDate']);
        $registerType = "X";
        $registerReservationNumber = $years * $registerRoomnumber * $days + $months;
        $registerPrice = 0;

        /*echo "<br><br><br><br><br><br>".$registerUID;
        echo "<br>".$registerFirstname;
        echo "<br>".$registerSurname;
        echo "<br>".$registerEmail;
        echo "<br>".$registerRoomnumber;
        echo "<br>".$registerCheckin;
        echo "<br>".$registerCheckout;
        echo "<br>".$registerType;
        echo "<br>".$registerReservationNumber;
        echo "<br>".$registerPrice;*/
    
        $result = $onderhoudtje->registerMaintence($registerUID, $registerFirstname, $registerSurname, $registerEmail, $registerRoomnumber, $registerCheckin, $registerCheckout, $registerType, $registerReservationNumber, $registerPrice);
    }

    if (isset($_SESSION['AdminEmail'])){
        $sql = "SELECT * FROM user WHERE email = '".$_SESSION['AdminEmail']."'";
        $stm = $con->prepare($sql);
        $stm->execute();

        $resultaat = $stm->fetchAll(PDO::FETCH_OBJ);
        foreach($resultaat as $sessionUser)
        {
            $uid = $sessionUser->uid;
            $firstname = $sessionUser->firstname;
            $surname = $sessionUser->surname;
            
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
                            <li class="align-left"><a class="active" href="maintenance.php">Plan Maintence</a></li>
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
                            <h2 style="text-align: center;">Plan maintenance</h2>
                        </div>
                    </div>
                    
                    <form id="addMaintaince" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Choose a room</label>
                                    <select class="form-control cbx" name="cbxRoom" required>
                                        <?php
                                            $query = "SELECT roomnumber FROM room";
                                            $stm = $con->prepare($query);
                                            $stm->execute();
                                            
                                            $result = $stm->fetchAll(PDO::FETCH_OBJ);
                                            foreach($result as $chooseRoomnumber)
                                            {
                                                echo "<option value=". $chooseRoomnumber->roomnumber.">".$chooseRoomnumber->roomnumber."</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Start date</label>
                                    <input type="date" class="form-control" name="txtStartDate" id="checkin" onkeyup="checkinValidation()" required/>
                                    <span id="checkinError" class="input-feedback"></span>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>End date</label>
                                    <input type="date" class="form-control" name="txtEndDate" id="checkout" onkeyup="checkoutValidation()" required/>
                                    <span id="checkoutError" class="input-feedback"></span>
                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="txtEmail" value="<?php echo $_SESSION['AdminEmail']; ?>" />
                        <input type="hidden" name="txtFirstname" value="<?php echo $sessionUser->firstname; ?>" />
                        <input type="hidden" name="txtSurname" value="<?php echo $sessionUser->surname; ?>" />
                        <input type="hidden" name="txtUID" value="<?php echo $sessionUser->uid; ?>" />

                        <?php
                                }
                            }else{
                                header("Location:log-in.php");
                            }
                        ?>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" name="btnSubmit" value="Plan maintenance"/>
                                </div>
                            </div>
                        </div>

                        <span>
                            <div class="row">
                                <div class="col-sm-12">
                                    <?php
                                        if(isset($_GET['error'])){
                                            if($_GET['error']==1){
                                                $error = "Sorry, this room is not avalible between these dates. Try another room or another time.";
                                            }
                                        }
                                    ?>
                                </div>
                            </div>
                        </span>
                    </form>
                </div>
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