<?php
    class EntUser{

        private $show_uid;
        private $show_firstname;
        private $show_surname;
        private $show_gender;
        private $show_birthday;
        private $show_country;
        private $show_city;
        private $show_postal_code;
        private $show_straat;
        private $show_email;
        private $show_password;
        private $show_rights;

        function __construct($show_uid, $show_firstname, $show_surname, $show_gender, $show_birthday, $show_country, $show_city, $show_postal_code, $show_straat, $show_email, $show_password, $show_rights)
        {
            $this->uid = $show_uid;
            $this->firstname = $show_firstname;
            $this->surname = $show_surname;
            $this->gender = $show_gender;
            $this->birthday = $show_birthday;
            $this->country = $show_country;
            $this->city = $show_city;
            $this->postal_code = $show_postal_code;
            $this->street = $show_straat;
            $this->email = $show_email;
            $this->password = $show_password;
            $this->email = $show_email;
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

        function getGender(){
            return $this->gender;
        }

        function getBirtday(){
            return $this->birthday;
        }

        function getCountry(){
            return $this->country;
        }

        function getCity(){
            return $this->city;
        }

        function getPostalCode(){
            return $this->street;
        }

        function getEmail(){
            return $this->email;
        }

        function getPassword(){
            return $this->password;
        }

        function getRights(){
            return $this->rights;
        }
    }
?>