<?php
    include "../functions/reservering.php";
    session_start();

    if (isset($_SESSION['AdminEmail'])){
    
    }else{
        header("Location:log-in.php");
    }

    //connectie maken met de database
    $reserveringDeleten = new reservering("localhost", "root", "", "stardust");
    
    //kijken of er een rid in zit
    if(isset($_GET["rid"])){
        $rid = $_GET["rid"];

        $delete = $reserveringDeleten->deleteReservation($rid);        
    }
    else{
        header("Location: reservations.php");
    }
?>