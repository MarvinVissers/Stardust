<?php
    require_once '../functions/inloggen.php';

    $logintje = new inloggen("localhost", "root", "", "stardust");
	
	// Waarden uit het form naar de inlog functie sturen
	if(isset($_POST['Log-inClient']))
	{
        $LoginEmailAdmin = htmlentities($_POST['txtEmail']);
        $LoginPasswordAdmin = htmlentities($_POST['txtPassword']);
    
		$result = $logintje->loginAdmin($LoginEmailAdmin, $LoginPasswordAdmin);
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
        <section>
            <div class="container">
                <div class="inlogForm">
                    <div class="inlogForm-content">
                        <form method="POST" name="inlog" id="inlog">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="input">
                                        <label>E-mail</label>
                                        <div class="form-group">
                                            <input type="email" class="form-control" name="txtEmail" id="email" required onchange="emailValidation()">
                                            <span id="emailError" class="input-feedback"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="input">
                                        <label>Password</label>
                                        <div class="form-group">
                                            <input type="password" class="form-control" name="txtPassword" id="inlogPassword" required onchange="inlogPassValidation()"/>
                                            <span id="inlogPassError" class="input-feedback"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="input">
                                        <div class="from-group">
                                            <input type="submit" name="Log-inClient" value="Log in" class="btn btn-primary btn-lg" required/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </body>
</html>