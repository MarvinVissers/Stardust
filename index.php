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
                            <li class="align-left"><a class="active" href="index.php">Home</a></li>
                            <li class="align-left"><a href="reservation.php">Reserve</a></li>
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

        <div class="content">
            <section>
                <div class="intro">
                    <div class="intro-blok">
                        <div class="intro-tekst">
                            <H1 class="intro-tekst-header">Good day</h1>
                            <h3>Welcome to the website of Stardust Hotel. Our hotel is in the center of Las Vegas so you can you aren't very far from all the casiono's this city has to offer for you. After a few night of gambling you be sure to wanne go to back to your old life where thing were simple and you were living, not surviving.</h3>
                        </div>
                    </div>

                    <div class="intro-blok-rechts">
                        <div class="intro-image-box">
                            <img src="images/foto-intro.jpg" class="intro-image">
                        </div>
                    </div>
                </div>
            </section>

            <section class="grey-background">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8">
                            <h2 class="mt-4">Who are we</h2>
                            <p>Stardust Hotel is a hotel in center of Las Vegas, what does this mean for you? This means you are very close to all the beutiful bankrupt machines this city has to offer, I mean gamble machines in the casino's.</p>
                            <p> Our staff is happy to throw you out when you have some bad draws so you cant afford us anymore. Futhermore there are a lot of beutiful things to see in the city, like a druken guy marrying a hooker in one of the local wedding vends. For more information you can ask our customer service, click on the button down here to go too the contact page for more details on where our hotel is in Las Vegas. Enjoy your day!</p>
                            <p>
                                <!--<a class="btn btn-primary btn-lg" href="contact.php">Contact information &raquo;</a>-->
                            </p>
                        </div>

                        <div class="col-lg-4">
                            <h2 class="mt-4">Stardust Hotel</h2>
                            <address>
                                <strong>Customer service</strong> <br>
                                Industrial road 3150<br>
                                89109 Las Vegas <br>
                            </address>

                            <address>
                                <!--<abbr title="Phone">-->Phone:<!--</abbr>-->
                                +1-202-555-0152 <br>
                                
                                <!--<abbr title="Email"-->Email:<!--</abbr>-->
                                <a href="mailto:info@stardust.com">info@stardust.com</a>
                            </address>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1611.1931582213545!2d-115.17229402403535!3d36.132806011292004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c8c411f6244da5%3A0x71b0798e4fed29ff!2sLas+Vegas%2C+Nevada+89109%2C+Verenigde+Staten!5e0!3m2!1snl!2snl!4v1537202951018" width="100%;" height="20%;" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </section>
        </div>

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