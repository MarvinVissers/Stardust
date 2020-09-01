<?php
    class EntKamer{

        private $show_kid;
        private $show_roomnumber;
        private $show_room_name;
        private $show_amount;
        private $show_description;
        private $show_picture;

        function __construct($show_kid, $show_roomnumber, $show_room_name, $show_amount, $show_description, $show_picture)
        {
            $this->kid = $show_kid;
            $this->roomnumber = $show_roomnumber;
            $this->room_name = $show_room_name;
            $this->amount = $show_amount;
            $this->description = $show_description;
            $this->picture = $show_picture;
        }

        function getKid(){
            return $this->kid;
        }

        function getRoomnumber(){
            return $this->roomnumber;
        }

        function getRoomName(){
            return $this->room_name;
        }

        function getAmount(){
            return $this->amount;
        }

        function getDescription(){
            return $this->discription;
        }

        function getPicture(){
            return $this->picture;
        }
    }
?>