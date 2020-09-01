<?php
    class EntReservation{

        private $show_rid;
        private $show_uid;
        private $show_firstname;
        private $show_surname;
        private $show_email;
        private $show_roomnumber;
        private $show_checkin_date;
        private $show_checkout_date;
        private $show_type;
        private $show_reservation_number;
        private $show_price;

        function __construct($show_rid, $show_uid, $show_firstname, $show_surname, $show_email, $show_roomnumber, $show_checkin_date, $show_checkout_date, $show_type, $show_reservation_number, $show_price)
        {
            $this->rid = $show_rid;
            $this->uid = $show_uid;
            $this->firstname = $show_firstname;
            $this->surname = $show_surname;
            $this->email = $show_email;
            $this->roomnumber = $show_roomnumber;
            $this->checkin_date = $show_checkin_date;
            $this->checkout_date = $show_checkout_date;
            $this->type = $show_type;
            $this->reservation_number = $show_reservation_number;
            $this->price = $show_price;
        }

        function getRid(){
            return $this->rid;
        }

        function getUid(){
            return $this->uid;
        }

        function getFirstname(){
            return $this->firstname;
        }

        function getSurname(){
            return $this->surname;
        }

        function getEmail(){
            return $this->email;
        }

        function getRoomnumber(){
            return $this->roomnumber;
        }

        function getCheckindate(){
            return $this->checkin_date;
        }

        function getCheckoutdate(){
            return $this->checkout_date;
        }

        function getType(){
            return $this->type;
        }

        function getReservationnumber(){
            return $this->reservation_number;
        }

        function getPrice(){
            return $this->price;
        }
    }
?>