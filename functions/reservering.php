<?php
    include "entReservation.php";
	class reservering
    {
        private $con;

        //connectie met de database aanmaken
        function __construct($host, $user, $pass, $dbnaam)
        {
            $this->con = new PDO("mysql: host=$host; dbname=$dbnaam", $user, $pass);
        }

        //functie voor het opslaan van de onderhoud
        function registerMaintence($registerUID, $registerFirstname, $registerSurname, $registerEmail, $registerRoomnumber, $registerCheckin, $registerCheckout, $registerType, $registerReservationNumber, $registerPrice){
            $sql = "INSERT INTO reservation (uid, firstname, surname, email, roomnumber, checkin_date, checkout_date, type, reservation_number, price)
            VALUES ('$registerUID', '$registerFirstname', '$registerSurname', '$registerEmail', '$registerRoomnumber', '$registerCheckin', '$registerCheckout', '$registerType', '$registerReservationNumber', '$registerPrice')";
            $stm = $this->con->prepare($sql);
            $stm->execute();
            //echo "<br><br><br><br><br><br>".$sql;
            header("Location: ../admin/reservations.php");
        }

         //functie voor het opslaan van de reservering
         function registerReservation($reserveerUID, $reserveerFirstname, $reserveerSurname, $reserveerEmail, $reserveerRoomnumber, $reserveerCheckin, $reserveerCheckout, $resrveerType, $reserveerNumber, $reserveerPrice){
             $newReservation = "INSERT INTO reservation (uid, firstname, surname, email, roomnumber, checkin_date, checkout_date, type, reservation_number, price)
             VALUES ('$reserveerUID', '$reserveerFirstname', '$reserveerSurname', '$reserveerEmail', '$reserveerRoomnumber', '$reserveerCheckin', '$reserveerCheckout', '$resrveerType', '$reserveerNumber', '$reserveerPrice')";
             $stm = $this->con->prepare($newReservation);
             $stm->execute();
             //echo $newReservation;
             header("Location: index.php");
         }

        //Haal reservering op voor de check reservation pagina
        function checkReservering($reservationNumber){
            $listReservations = array();
            $query = "SELECT * FROM reservation where reservation_number=$reservationNumber";
            $stm = $this->con->prepare($query);
            if($stm->execute())
            {
                $result = $stm->fetchAll(PDO::FETCH_OBJ);
                foreach($result as $resultQuery)
                {
                    $entReservation = new entReservation($resultQuery->rid, $resultQuery->uid, $resultQuery->firstname, $resultQuery->surname, $resultQuery->email, $resultQuery->roomnumber, $resultQuery->checkin_date, $resultQuery->checkout_date, $resultQuery->type, $resultQuery->reservation_number, $resultQuery->price);
                    array_push($listReservations, $entReservation);
                }
                return $listReservations;

            }else {echo "Query did not work, check those damm quotes!";}
        }

        //overzicht van alle reserveringen
        function getOverviewreservation(){
            $listReservations = array();
            $query = "SELECT * FROM reservation";
            $stm = $this->con->prepare($query);
            if($stm->execute())
            {
                $result = $stm->fetchAll(PDO::FETCH_OBJ);
                foreach($result as $resultQuery)
                {
                    $entReservation = new entReservation($resultQuery->rid, $resultQuery->uid, $resultQuery->firstname, $resultQuery->surname, $resultQuery->email, $resultQuery->roomnumber, $resultQuery->checkin_date, $resultQuery->checkout_date, $resultQuery->type, $resultQuery->reservation_number, $resultQuery->price);
                    array_push($listReservations, $entReservation);
                }
                return $listReservations;

            }else {echo "Query did not work, check those damm quotes!";}
        }

        //functie voor overzicht van een geselecteerde reservering
        function getOverviewById($rid){
            $listReservation = array();
            $query = "SELECT * FROM reservation WHERE rid= '$rid'";
            $stm = $this->con->prepare($query);
            if($stm->execute())
            {
                $result = $stm->fetchAll(PDO::FETCH_OBJ);
                foreach($result as $resultQuery)
                {
                    $entReservation = new entReservation($resultQuery->rid, $resultQuery->uid, $resultQuery->firstname, $resultQuery->surname, $resultQuery->email, $resultQuery->roomnumber, $resultQuery->checkin_date, $resultQuery->checkout_date, $resultQuery->type, $resultQuery->reservation_number, $resultQuery->price);
                    array_push($listReservation, $entReservation);
                }
                return $listReservation;

            }else {echo "Query did not work, check those damm quotes!";}
        }

        //verander een reservering
        function changeReservation($changeRID, $changeUID, $changeFirstname, $changeSurname, $changeEmail, $changeRoomnumber, $changeCheckin, $changeCheckout, $changePrice){
            $changereservation = "UPDATE reservation SET uid='$changeUID', firstname='$changeFirstname', surname='$changeSurname', email='$changeEmail', roomnumber='$changeRoomnumber', checkin_date='$changeCheckin', checkout_date='$changeCheckout', price='$changePrice'   
            WHERE rid='$changeRID'";
            $stm = $this->con->prepare($changereservation);
            $stm->execute();
            header("Location: reservations.php");
        }

        //verwijder een resrevering
        function deleteReservation($rid){
            $query = "DELETE FROM reservation WHERE rid=$rid";
            $stm = $this->con->prepare($query);
            $stm->execute();
            header("Location: reservations.php");
            //echo $query;
        }

        //checken of de kamer beschikbaar is om te boeken
        function checkRoom($room_kid, $checkin, $checkout, $roomnumber){
            $bestaandeReservering = "SELECT * FROM reservation WHERE checkin_date BETWEEN '$checkin' AND '$checkout' AND checkout_date > '$checkin' AND roomnumber = $roomnumber";
            $stm = $this->con->prepare($bestaandeReservering);
            var_dump($bestaandeReservering);
            $stm->execute();

            var_dump($bestaandeReservering);
            $count = $stm->rowCount();
            if($count > 1)
            {
                session_start();
                header("Location: overviewreservation.php?kid=".$room_kid."&checkin=".$checkin."&checkout=".$checkout);
            }else{
                session_start();
                header("Location: roomdetails.php?kid=$room_kid&error=1");
            }
        }

        function weekoverviewReservations($date1, $date2){
            $listReservation = array();
            $sql = "SELECT * FROM reservation WHERE (checkin_date BETWEEN '$date1' AND '$date2') OR (checkout_date BETWEEN '$date1' AND '$date2')";
            //$query = "SELECT * FROM reservation WHERE checkin_date OR checkout_date BETWEEN '$date1' AND '$date2'";
            $stm = $this->con->prepare($sql);
            //echo $sql;
            if($stm->execute()){
                $result = $stm->fetchAll(PDO::FETCH_OBJ);
                foreach($result as $resultQuery)
                {
                    $entReservation = new entReservation($resultQuery->rid, $resultQuery->uid, $resultQuery->firstname, $resultQuery->surname, $resultQuery->email, $resultQuery->roomnumber, $resultQuery->checkin_date, $resultQuery->checkout_date, $resultQuery->type, $resultQuery->reservation_number, $resultQuery->price);
                    array_push($listReservation, $entReservation);
                }
                return $listReservation;
            }
        }

        function checkRoomMaintence($checkRoomnumber, $checkStardate, $checkEnddate){
            $bestaandeReservering = "SELECT * FROM reservation WHERE checkin_date BETWEEN '$checkStardate' AND '$checkEnddate' AND checkout_date > '$checkStardate' AND roomnumber = $checkRoomnumber";
            $stm = $this->con->prepare($bestaandeReservering);
            var_dump($bestaandeReservering);
            $stm->execute();

            var_dump($bestaandeReservering);
            $count = $stm->rowCount();
            if($count < 1)
            {
                session_start();
                header("Location: maintenance.php?error=0");
            }else{
                session_start();
                header("Location: maintenance.php?error=1");
            }
        }
    }
?>