<?php
    include "entUser.php";
	class inloggen
    {
        private $con;

        //connectie met de database aanmaken
        function __construct($host, $user, $pass, $dbnaam)
        {
            $this->con = new PDO("mysql: host=$host; dbname=$dbnaam", $user, $pass);
        }

        //functie voor het inloggen voor de klant
        function loginUser($loginEmail, $loginPassword)
        {
            //kijken of er iets ingevuld is
            if (empty($loginEmail) || empty($loginPassword)) {
                echo "";
            } else {
                //query om te kijken of het account bestaat
                $query = "SELECT * FROM user WHERE email = '$loginEmail' AND password = '$loginPassword' AND rights = 'none'";
                $stm = $this->con->prepare($query);
                $stm->execute(
                    array(
                        //checken voor resultaat
                        'email' => $loginEmail,
                        'password' => $loginPassword
                    )
                );
                $count = $stm->rowCount();
                if ($count > 0) {
                    session_start();
                    $_SESSION['email'] = $loginEmail;
                    header("Location:home.php");
                } else {
                    header("Location:sign-in.php");
                }
            }
        }

        //functie voor het registreren van de user
        function registerUser($registerFirstname, $registerSurname, $registerGender, $registerBirthday, $registerCountry, $registerCity, $registerPostalcode, $registerStreet, $registerEmail, $registerPassword)
        {
            $sql = "INSERT INTO user (firstname, surname, gender, birthday, country, city, postal_code, street, email, password, rights)
						VALUES ('$registerFirstname', '$registerSurname', '$registerGender', '$registerBirthday', '$registerCountry', '$registerCity', '$registerPostalcode', '$registerStreet', '$registerEmail', '$registerPassword', 'none')";
            $stm = $this->con->prepare($sql);
            $stm->execute();
            session_start();
            $_SESSION['email'] = $registerEmail;
            header('Location: home.php');
        }

        //functie voor het inloggen voor de admin
        function loginAdmin($LoginEmailAdmin, $LoginPasswordAdmin)
        {
            //kijken of er iets ingevuld is
            if (empty($LoginEmailAdmin) || empty($LoginPasswordAdmin)) {
                echo "";
            } else {
                //query om te kijken of het account bestaat
                $query = "SELECT * FROM user WHERE email = '$LoginEmailAdmin' AND password = '$LoginPasswordAdmin' AND rights = 'admin'";
                $stm = $this->con->prepare($query);
                $stm->execute(
                    array(
                        //checken voor resultaat
                        'email' => $LoginEmailAdmin,
                        'password' => $LoginPasswordAdmin
                    )
                );
                $count = $stm->rowCount();
                if ($count > 0) {
                    session_start();
                    $_SESSION['AdminEmail'] = $LoginEmailAdmin;
                    header("Location:index.php");
                } else {
                    header("Location:sign-in.php");
                }
            }
        }

        //functie voor het registreren van de admin
        function registerAdmin()//$RegistreerKlantVoornaam, $RegistreerKlantAchternaam, $RegistreerKlantEmail, $RegistreerKlantGebruikersnaam, $RegistreerKlantWachtwoord)
        {
            $sql = "INSERT INTO user (firstname, surname, gender, birthday, country, city, postal_code, street, email, password, rights)
						VALUES ('$registerFirstname', '$registerSurname', '$registerGender', '$registerBirthday', '$registerCountry', '$registerCity', '$registerPostalcode', '$registerStreet', '$registerEmail', '$registerPassword', 'admin')";
            $stm = $this->con->prepare($sql);
            $stm->execute();
        }

        //functie voor het selecteren van de ingelogde gebruiker
        function getOverviewUser($email){
            $listUser = array();
            $query = "SELECT * FROM user WHERE email = '$email'";
            $stm = $this->con->prepare($query);
            if($stm->execute()){
                $result = $stm->fetchAll(PDO::FETCH_OBJ);
                foreach($result as $resultQuery){
                    $entUser = new entUser($resultQuery->uid, $resultQuery->firstname, $resultQuery->surname, $resultQuery->gender, $resultQuery->birthday, $resultQuery->country, $resultQuery->city, $resultQuery->postal_code, $resultQuery->street, $resultQuery->email, $resultQuery->password, $resultQuery->rights);
                    array_push($listUser, $entUser);
                }
                return $listUser;
            }
        }
    }