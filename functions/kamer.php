<?php
    include "entKamer.php";
	class kamer
    {
        private $con;

        //connectie met de database aanmaken
        function __construct($host, $user, $pass, $dbnaam)
        {
            $this->con = new PDO("mysql: host=$host; dbname=$dbnaam", $user, $pass);
        }

        //functie voor het opslaan van de kamer
        function registerRoom($addRoomnumber, $addRoomname, $addPrice, $addImage, $addDiscription){
            $sql = "INSERT INTO room (roomnumber, room_name, amount, description, picture)
            VALUES ('$addRoomnumber', '$addRoomname', '$addPrice', '$addDiscription', '')";
            $stm = $this->con->prepare($sql);
            $stm->execute();

            $query = "SELECT * FROM room WHERE roomnumber  = $addRoomnumber";
            $stm = $this->con->prepare($query);
            $stm->execute(
                array(
                    //checken voor resultaat
                    'roomnumber' => $addRoomnumber
                )
            );
            $count = $stm->rowCount();
            if ($count > 0) {
                //echo "kamer kan gevonden worden <br><br>";
                $result = $stm->fetchAll(PDO::FETCH_OBJ);
                foreach($result as $resultQuery)
                {
                    $kid = $resultQuery->kid;
                    $roomnumber = $resultQuery->roomnumber;
                    $room_name = $resultQuery->room_name;
                    $price = $resultQuery->amount;
                    $extensie = $resultQuery->picture;

                    //echo $kid;

                    error_reporting(0);
                    $uploadOk = 1;
                    // Check if image file is a actual image or fake image
                    getimagesize($addImage["tmp_name"]);
                    if($check !== false AND $addImage !== "") {
                        ob_start();
                        unlink("../images/$kid.jpg");
                        unlink("../images/$kid.png");
                        unlink("../images/$kid.gif");
            
                        $place="../images/";
            
                        if($addImage['type'] == "image/jpg" || $addImage['type'] == "image/jpeg"){
                            $extensie=".jpeg";
                        }
                        if($addImage['type'] == "image/x-png" || $addImage['type'] == "image/png"){
                            $extensie=".png";
                        }
                        
                        //var_dump($addImage);
                        //var_dump($extensie);
                        //var_dump($kid);
                        
                        $updatePicture = "UPDATE room SET picture='$extensie' WHERE kid='$kid'";
                        $stm = $this->con->prepare($updatePicture);
                        $stm->execute();
                        //echo $updatePicture."<br>";
            
                        $filename=$kid;
                        if($extensie==".jpg"){
                            $im = imagecreatefromjpeg($addImage['tmp_name']);
                            $width = imagesx($im);
                            $height = imagesy($im);
                            ImageDestroy ($im);
                            echo $filename;
                        }else{
                            $foto1=$addImage['tmp_name'];
                            $target= "$place$filename$extensie";
                            copy($foto1,$target);
                        }
            
                        //header("Location: ../admin/index.php");
                    }else{
                        echo "er gaat iets fout";
                    }
                }
            } else {
                //echo "kamer wordt niet gevonden <br>";
                //echo $query. "<br>";
                //var_dump($query);
            }
            //header("Location: ../admin/reservations.php");
        }

        function getOverviewroom(){
            $listRooms = array();
            $query = "SELECT * FROM room";
            $stm = $this->con->prepare($query);
            if($stm->execute())
            {
                $result = $stm->fetchAll(PDO::FETCH_OBJ);
                foreach($result as $resultQuery)
                {
                    $entKamer = new entKamer($resultQuery->kid, $resultQuery->roomnumber, $resultQuery->room_name, $resultQuery->amount, $resultQuery->description, $resultQuery->picture);
                    array_push($listRooms, $entKamer);
                }
                return $listRooms;

            }else {echo "Query did not work, check those damm quotes!";}
        }

        function detailsRoom($kid){
            $listRoom = array();
            $query = "SELECT * FROM room WHERE kid = $kid";
            $stm = $this->con->prepare($query);
            if($stm->execute())
            {
                $result = $stm->fetchAll(PDO::FETCH_OBJ);
                foreach($result as $resultQuery)
                {
                    $entKamer = new entKamer($resultQuery->kid, $resultQuery->roomnumber, $resultQuery->room_name, $resultQuery->amount, $resultQuery->description, $resultQuery->picture);
                    array_push($listRoom, $entKamer);
                }
                return $listRoom;

            }else {echo "Query did not work, check those damm quotes!";}
        }
    }
?>