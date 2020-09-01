<?php
    require_once 'functions/inloggen.php';

    $logintje = new inloggen("localhost", "root", "", "stardust");
     
    // Waarden uit het form naar de registreer functie sturen
    if(isset($_POST['Sign-upClient']))
    {
        $registerFirstname = htmlentities($_POST['txtFirstname']);
        $registerSurname = htmlentities($_POST['txtSurname']);
        $registerGender = htmlentities($_POST['cbxGender']);
        $registerBirthday = htmlentities($_POST['txtBirthday']);
        $registerCountry = htmlentities($_POST['txtCountry']);
        $registerCity = htmlentities($_POST['txtCity']);
        $registerPostalcode = htmlentities($_POST['txtPostalcode']);
        $registerStreet = htmlentities($_POST['txtStreet']);
        $registerEmail = htmlentities($_POST['txtEmail']);
        $registerPassword = htmlentities($_POST['txtPassword']);

        $result = $logintje->registerUser($registerFirstname, $registerSurname, $registerGender, $registerBirthday, $registerCountry, $registerCity, $registerPostalcode, $registerStreet, $registerEmail, $registerPassword);
    }
?>

<html>
    <head>
         <title>Sign-up - Stardust Hotel</title>

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
                            <li class="align-left"><a href="check-reservation.php">Check resrvation</a></li>
                            <?php 
                                if (isset($_SESSION['email'])){
                                    echo "<li class='align-right'><a href='logout.php'>Log out</a></li>";
                                    echo "<li class='align-right'><a href='home.php'>My acoount</a></li>";
                                }else{
                                    echo "<li class='align-right'><a class='active' href='sign-up.php'>Sign up</a></li>";
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
                            <H1 class="intro-tekst-header">Sign-up</h1>
                            <h3>This is the amazing sign-up page. You just have to fil in all your personal data and than you can start makeing reservations at our awsome hotel. Who would not want to do that?</h3>
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
                <form id="registerForm" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
                    <div class="row">
                        <div class="col-sm-12">
                            <h2>Make an account<h2>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <h3>Personal information<h3>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <label class="control-label">First name</label>
                            <div class="form-group">
                                <input type="text" class="form-control" name="txtFirstname" id="name" required onchange="nameValidation()"/>
                                <span id="nameError" class="input-feedback"></span>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <label>Surname</label>
                            <div class="form-group">
                                <input type="text" class="form-control" name="txtSurname" id="surname" required onchange="surnameValidation()"/>
                                <span id="surnameError" class="input-feedback"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <label>Gender</label>
                            <div class="form-group">
                                <select class="input form-control" name="cbxGender" style="height: auto;" id="gender" required onchange="genderValidation()">
                                    <option value="0">Select gender</option>
                                    <option value="Man">Man</option>
                                    <option value="Women">Women</option>
                                    <option value="Apache helikoper">Apache helikopter</option>
                                    <option value="other">Other</option>
                                    <option value="Prefered not to anwser">Prefer not the answer</option>
                                </select>
                                <span id="genderError" class="input-feedback"></span>
                            </div>
                        </div>

                        <div class="col-sm-6">
                        <label>Date of birth</label>
                            <div class="form-group">
                                <input type="date" class="form-control" name="txtBirthday" id="birthday" required onchange="birthdayValidation()"/>
                                <span id="birthdayError" class="input-feedback"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <label>Country</label>
                            <div class="form-group">
                                <input type="text" class="form-control" name="txtCountry" id="country" required onchange="countryValidation()"/>
                                <span id="countryError"  class="input-feedback"></span>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <label>City</label>
                            <div class="form-group">
                                <input type="text" class="form-control" name="txtCity" id="city" required onchange="cityValidation()"/>
                                <span id="cityError"  class="input-feedback"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <label>Postal code</label>
                            <div class="form-group">
                                <input type="text" class="form-control" maxlength="50" name="txtPostalcode" id="postal" required onchange="postalValidation()"/>
                                <span id="postalError" class="input-feedback"></span>
                            </div>
                        </div>

                        <div class="col-sm-6">
                        <label>Street</label>
                            <div class="form-group">
                                <input type="text" class="form-control" name="txtStreet" id="street" id="street" required onchange="streetValidation()"/>
                                <span id="streetError" class="input-feedback"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
                    
            <section class="grey">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3>Additional information<h3>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <label>E-mail</label>
                            <div class="form-group">
                                <input type="email" class="form-control" name="txtEmail" id="email" required onchange="emailValidation()">
                                <span id="emailError" class="input-feedback"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <label>Password</label>
                            <div class="form-group">
                                <input type="password" class="form-control" name="txtPassword" id="password" required onchange="passValidation()"/>
                                <span id="passError" class="input-feedback"></span>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <label>Confirm password</label>
                            <div class="form-group">
                                <input type="password" class="form-control" name="txtConfirmPassword" id="cpassword" required onchange="passConfirm()"/>
                                <span id="confError" class="input-feedback"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="from-group">
                                <input type="submit" id="signUpButton" name="Sign-upClient" value="Sign-up" class="btn btn-primary btn-lg"/>
                            </div>
                        </div>
                    </div>
                </div>
            </section> 
        </form>

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