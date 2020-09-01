<?php
    include "../functions/kamer.php";
    include "../functions/connectie.php";
    session_start();

    $kamertje = new kamer("localhost", "root", "", "stardust");

    if (isset($_SESSION['AdminEmail'])){
       
    }else{
        header("Location:log-in.php");
    }

    if(isset($_POST['btnAdd']))
    {
        $addRoomnumber = htmlentities($_POST['txtRoomnumber']);
        $addRoomname = htmlentities($_POST['txtRoomname']);
        $addPrice = htmlentities($_POST['txtPrice']);
        $addImage = $_FILES['txtFoto'];
        $addDiscription = htmlentities($_POST['txtDescription']);

        $addKamer = $kamertje->registerRoom($addRoomnumber, $addRoomname, $addPrice, $addImage, $addDiscription);
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
                            <li class="align-left"><a class="active" href="add-room.php">Add room</a></li>
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
                    <form id="addRoom" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-sm-12">
                                <h2 style="text-align: center;">Add a room to the Stardust Hotel</h2>
                            </div>
                        </div>

                         <div class="extra-padding">
                            <p> </p>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Roomnumber</label>
                                    <input type="number" name="txtRoomnumber" id="roomnumber" class="form-control" required onkeyup="roomnumberValidation()"/>
                                    <span id="roomnumberError" class="input-feedback"></span>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Room name</label>
                                    <input type="text" name="txtRoomname" id="name" class="form-control" required onkeyup="nameValidation()"/>
                                    <span id="nameError" class="input-feedback"></span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-groep">
                                    <label>Price per night</label>
                                    <input type="number" id="price" name="txtPrice" class="form-control" required onkeyup="priceValidation()"/>
                                    <span id="priceError" class="input-feedback"></span>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Picture of the room</label>
                                    <input type="file" id="img" name="txtFoto" class="form-control" required onkeyup="imgValidation()"/>
                                    <span id="ImgError" class="input-feedback"></span>
                                </div>
                            </div>
                        </div>  
            </div>

            <div class="background-grey">
                <div class="container">
                        <div class="extra-padding">
                            <p> </p>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Description of the room</label>
                                    <textarea class="form-control" rows="5" name="txtDescription" id="text" required onkeyup="textValidation()"></textarea>
                                    <span id="textError" class="input-feedback"></span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="from-group">
                                    <input type="submit" id="text" name="btnAdd" value="Save room" class="btn btn-primary">
                                </div>
                            </div>
                        </div> 

                         <div class="extra-padding">
                            <p> </p>
                        </div>
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