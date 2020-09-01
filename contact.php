<?php
    session_start();
?>

<html>
    <head>
        <title>Stardust Hotel</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!--Link voor eigen stylesheet-->
        <link rel="stylesheet" href="css/style.css"/>

        <!--Link voor eigen jquery-->
        <script src="validation.js"></script>

        <!-- Link voor Bootstrap -->
        <link rel="stylesheet" href="bootstrap/css/bootstrap-grid.css"/>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css"/>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css"/>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Oswald">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open Sans">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

        <!--Link naar bootstrap Jquery-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        <script src='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js'></script>
        <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        <script src='http://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/js/bootstrapvalidator.min.js'></script>
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

        <!--Link voor de favicon-->
        <link rel="icon" href="images/favicon.png"/>
    </head>

    <body background="images/background.jpg" style="background-repeat: no-repeat; background-attachment: fixed;">
        <div class="container">
            <header style="width: 100%;">
                <nav>
                    <div class="handle">
                        <img src="images/burger-menu.png" style="height:40px; width:40px; margin-top:5px; margin-bottom:15px;">
                    </div>

                    <ul>
                        <li class="align-left"><a href="index.php">Home</a></li>
                        <li class="align-left"><a href="reservation.php">Reserve</a></li>
                        <li class="align-left"><a href="check-reservation.php">Check reservation</a></li>
                        <li class="active align-left"><a href="contact.php">Contact</a></li>
                        <?php 
                            if (isset($_SESSION['email'])){
                                echo "<li class='align-right'><a href='logout.php'>Log out</a></li>";
                                echo "<li class='align-right'><a href='home.php'>My acoount</a></li>";
                            }else{
                                echo "<li class='align-right'><a href='sign-up.php'>Sign up</a></li>";
                                echo "<li class='align-right'><a href='log-in.php'>Log in</a></li>";
                            }
                        ?>
                    </ul>
                </nav>
            </header>
        </div>

        <div class="container">
            <div class="content" style="background-color: white;">
                <div class="text" style="padding: 10px 10px 10px 10px;">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3>Contact</h3>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-12">
                            <p>Welcome at the contact page of Stardust Hotel, here you can find our information to contact us.</p>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-6">
                            <table class="table table-hover">
                                <tr> <td>Name</td> <td>Stardust Hotel</td> <tr>
                                <tr> <td>Country</td> <td>United States of America</td> <tr>
                                <tr> <td>State</td> <td>Nevada</td> <tr>
                                <tr> <td>City</td> <td>Las Vegas</td> <tr>
                                <tr> <td>Addres</td> <td>Industrial road</td> <tr>
                                <tr> <td>House Number</td> <td>89109</td> <tr>
                                <tr> <td>Phone number</td> <td>+1-202-555-0152</td> <tr>
                                <tr> <td>Email</td> <td>info@stardust.com</td> <tr>
                            </table>
                        </div>

                        <div class="col-sm-6">
                            <div class="maps">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1611.1931582213545!2d-115.17229402403535!3d36.132806011292004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c8c411f6244da5%3A0x71b0798e4fed29ff!2sLas+Vegas%2C+Nevada+89109%2C+Verenigde+Staten!5e0!3m2!1snl!2snl!4v1537202951018" width="100%;" height="60%;" frameborder="0" style="border:0" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>                    
                </div>
            </div>

            <footer>
                <div class="footer">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="footer-text">
                                <p>Created by Marvin Vissers</p>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </body>

    <script>
        //Functie voor openen menubalk
        $('.handle').on('click', function(){
            $('nav ul').toggleClass('showing');
        });
    </script>
</html>