<?php 

if(isset($_GET["roomnumber"]))
{
    $roomnumber = $_GET["roomnumber"];
    
    $query = "SELECT * FROM reservation WHERE roomnumber = $roomnumber";
    //echo $query;
    $stm = $con->prepare($query);
    $stm->execute();
    
    $result = $stm->fetchAll(PDO::FETCH_OBJ);
    foreach($result as $selectedReservation)
    {    
        $result = $stm->fetchAll(PDO::FETCH_OBJ);
        foreach ($result as $rij)
        {
            $kid = $rij->kid;
            $picture = $rij->picture;
            echo $query."<br>";
        
            error_reporting(0);
            $uploadOk = 1;
            // Check if image file is a actual image or fake image
            $check = getimagesize($_FILES["foto"]["tmp_name"]);
            if($check !== false && $foto !== "") {
                ob_start();
                unlink("../uploads/$fid.jpg");
                unlink("../uploads/$fid.png");
                unlink("../uploads/$fid.gif");
        
                $input="foto";
                $place="../uploads/";
                $RESIZEWIDTH=184;
                $RESIZEHEIGHT=273;
        
                if($_FILES[$input]['type'] == "image/jpg" || $_FILES[$input]['type'] == "image/jpeg"){
                    $extensie="jpeg";
                }
                if($_FILES[$input]['type'] == "image/x-png" || $_FILES[$input]['type'] == "image/png"){
                    $extensie="png";
                }
                if($_FILES[$input]['type'] == "image/gif"){
                    $extensie="gif";
                }
        
        
                $sql = "UPDATE film SET film_foto='$extensie' WHERE fid='$fid'";
                $stm = $con->prepare($sql);
                $stm->execute();
                echo $sql;
        
                $filename=$fid;
                if($extensie=="jpg"){
                    $im = imagecreatefromjpeg($_FILES[$input]['tmp_name']);
                    $width = imagesx($im);
                    $height = imagesy($im);
                    ResizeImage($im,$RESIZEWIDTH,$RESIZEHEIGHT,$filename,$place);
                    ImageDestroy ($im);
                    echo $filename;
                }else{
                    $foto1=$_FILES[$input]['tmp_name'];
                    $target= "$place$filename.$extensie";
                    copy($foto1,$target);
                }
        
                $film = "UPDATE film SET film_naam='$film_naam', film_foto='$extensie', genre='$genre', duur='$duur', over='$over', trailer='$trailer', begin_datum='$begin_datum'  
                        WHERE fid='$fid'";
                $stm = $con->prepare($film);
                $stm->execute();
        
                header("Location: FilmOverzicht.php");
                $uploadOk = 1;
            } else {
        
                $filmpie = "UPDATE film SET film_naam='$film_naam', film_foto='$extensie', genre='$genre', duur='$duur', over='$over', trailer='$trailer', begin_datum='$begin_datum'  
                        WHERE fid='$fid'";
                $stm = $con->prepare($filmpie);
                $stm->execute();
                echo $filmpie;
                //header ("Location: FilmOverzicht.php");
                echo "it not a oke";
                $uploadOk = 0;
            }
        }
    } else echo "niets";
?>