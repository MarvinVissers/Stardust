// form validation voor alle forms

//form validation voor de voornaam
function nameValidation()
{
    var name = document.getElementById('name').value;
     
    if(name=='')
    {
        document.getElementById('nameError').innerHTML="* First name is required";
        document.getElementById('nameError').style.color='red';
        document.getElementById('name').style.borderColor = "red";
        return false;
    }

    if(!name.match(/^[a-zA-Z]+[a-z A-Z]+$/g))
    {  
        document.getElementById('nameError').innerHTML="* Only Alphabates";
        document.getElementById('nameError').style.color='red';
        document.getElementById('name').style.borderColor = "red";
        return false;
    }
    
    else
    {
        document.getElementById('nameError').innerHTML="Good";
        document.getElementById('nameError').style.color='green';
        document.getElementById('name').style.borderColor = "green";
        return true;
    } 
}

//formvalidation voor de achternaam
function surnameValidation()
{
    var surname = document.getElementById('surname').value;
     
    if(surname=='')
    {
        document.getElementById('surnameError').innerHTML="* Surname is required";
        document.getElementById('surnameError').style.color='red';
        document.getElementById('surname').style.borderColor = "red";
        return false;
    }
    if(!surname.match(/^[a-zA-Z]+[a-z A-Z]+$/g))
    {      
        document.getElementById('surnameError').innerHTML="* Only Alphabates";
        document.getElementById('surnameError').style.color='red';
        document.getElementById('surname').style.borderColor = "red";
        return false;
    }
    
    else
    {
        document.getElementById('surnameError').innerHTML="Good";
        document.getElementById('surnameError').style.color='green';
        document.getElementById('surname').style.borderColor = "green";
        return true;
    } 
}

//formvalidation voor de gender
function genderValidation()
{
    var gender = document.getElementById('gender').value;
    if(gender==0)
    {
        document.getElementById('genderError').innerHTML="* Gender is required";
        document.getElementById('genderError').style.color='red';
        document.getElementById('gender').style.borderColor = "red";
        return false;
    }

    else 
    {
        document.getElementById('genderError').innerHTML="Good" ; 
        document.getElementById('genderError').style.color='green';
        document.getElementById('gender').style.borderColor = "green";
        return true;
    }  
}

//formvalidation voor de geboortedatum
function birthdayValidation()
{
    var birthday = document.getElementById('birthday').value;
    if(birthday=='')
    {
        document.getElementById('birthdayError').innerHTML="* Birthday is required";
        document.getElementById('birthdayError').style.color='red';
        document.getElementById('birthday').style.borderColor = "red";
        return false;
    }

    else 
    {
        document.getElementById('birthdayError').innerHTML="Good" ; 
        document.getElementById('birthdayError').style.color='green';
        document.getElementById('birthday').style.borderColor = "green";
        return true;
    } 
}

//formvalidation voor het land waar de users in wonen
function countryValidation()
{
    var country = document.getElementById('country').value;
     
    if(country==''){
        document.getElementById('countryError').innerHTML="* Country is required";
        document.getElementById('countryError').style.color='red';
        document.getElementById('country').style.borderColor = "red";
        return false;
    }

    if(!country.match(/^[a-zA-Z]+[a-z A-Z]+$/g))
    {       
        document.getElementById('countryError').innerHTML="* Only Alphabates";
        document.getElementById('countryError').style.color='red';
        document.getElementById('country').style.borderColor = "red";
        return false;
    }
    
    else
    {
        document.getElementById('countryError').innerHTML="Good";
        document.getElementById('countryError').style.color='green';
        document.getElementById('country').style.borderColor = "green";
        return true;
    } 
}

//formvalidation voor de stad waarin ze wonen
function cityValidation()
{
    var city = document.getElementById('city').value;
     
    if(city=='')
    {
        document.getElementById('cityError').innerHTML="* City is required";
        document.getElementById('cityError').style.color='red';
        document.getElementById('city').style.borderColor = "red";
        return false;
    }

    if(!city.match(/^[a-zA-Z]+[a-z A-Z]+$/g))
    {
        document.getElementById('cityError').innerHTML="* Only Alphabates";
        document.getElementById('cityError').style.color='red';
        document.getElementById('city').style.borderColor = "red";
        return false;
    }
    
    else
    {
        document.getElementById('cityError').innerHTML="Good";
        document.getElementById('cityError').style.color='green';
        document.getElementById('city').style.borderColor = "green";
        return true;
    } 
}

//formvalidation voor de postcode
function postalValidation()
{
    var postal = document.getElementById('postal').value;
     
    if(postal==''){
        document.getElementById('postalError').innerHTML="* Postal code is required";
        document.getElementById('postalError').style.color='red';
        document.getElementById('postal').style.borderColor = "red";
        return false;
    }
    
    else
    {
        document.getElementById('postalError').innerHTML="Good";
        document.getElementById('postalError').style.color='green';
        document.getElementById('postal').style.borderColor = "green";
        return true;
    }
}

//formvalidation voor de straat
function streetValidation()
{
    var street = document.getElementById('street').value;
     
    if(street=='')
    {
        document.getElementById('streetError').innerHTML="* Street is required";
        document.getElementById('streetError').style.color='red';
        document.getElementById('street').style.borderColor = "red";
        return false;
    }

    if(!street.match(/^[a-zA-Z]+[a-z A-Z]+[0-9]+$/g))
    {
        document.getElementById('streetError').innerHTML="* Only Alphabates and numbers";
        document.getElementById('streetError').style.color='red';
        document.getElementById('street').style.borderColor = "red";
        return false;
    }
    
    else
    {
        document.getElementById('streetError').innerHTML="Good";
        document.getElementById('streetError').style.color='green';
        document.getElementById('street').style.borderColor = "green";
        return true
    }
}

//formvalidation voor de email
function emailValidation()
{
    var email = document.getElementById('email').value;  
    if(email=='')
    {
        document.getElementById('emailError').innerHTML="* Email is required";
        document.getElementById('emailError').style.color='red';
        document.getElementById('email').style.borderColor = "red";
        return false;
    }

    if(!email.match(/^[a-zA-Z0-9._]+@[a-zA-Z0-9]+\.(com|org|in|gov|nl|hetnet)$/))
    {
        document.getElementById('emailError').innerHTML="* Invalid Email";
        document.getElementById('emailError').style.color='red';
        document.getElementById('email').style.borderColor = "red";
        return false;
    }
    
    else
    {
        document.getElementById('emailError').innerHTML="Good";
        document.getElementById('emailError').style.color='green';
        document.getElementById('email').style.borderColor = "green";
        return true;
    }
}

//formvalidation voor mobiele numbers
function mobileValidation()
{
    var mobile = document.getElementById('mobile').value;
    
    if(!mobile.match(/^[1-9][0-9]{0,15}$/))
    {
        document.getElementById('mobileError').innerHTML="* Only 10 Digits Allowed" ; 
        document.getElementById('mobileError').style.color='red';
        document.getElementById('mobile').style.borderColor = "red";
        return false;
    }

    else 
    {
        document.getElementById('mobileError').innerHTML="Good" ; 
        document.getElementById('mobileError').style.color='green';
        document.getElementById('mobile').style.borderColor = "green";
        return true;
    }
}

function inlogPassValidation()
{
    var inlogPass = document.getElementById('inlogPassword').value;

    if(inlogPass=='')
    {
        document.getElementById('inlogPassError').innerHTML='* Password Cannot be empty';
        document.getElementById('inlogPassError').style.color='red';
        document.getElementById('inlogPassword').style.borderColor = "red";
        return false;
    }

    else
    {
        document.getElementById('inlogPassError').innerHTML='Good';
        document.getElementById('inlogPassError').style.color='green';
        document.getElementById('inlogPassword').style.borderColor = "green";
        return true;
    }
}

//formvalidation voor het wachtwoord op de sign-up pagina
function passValidation()
{
    var pass = document.getElementById('password').value;
     
    if(pass=='')
    {
        document.getElementById('passError').innerHTML='* Password Cannot be empty';
        document.getElementById('cpassword').disabled=true;
        document.getElementById('passError').style.color='red';
        document.getElementById('password').style.borderColor = "red";
        return false;
    }

    if(!pass.match(/[a-z]/g))
    {
        document.getElementById('passError').innerHTML='* LowerCase Character missing';
        document.getElementById('passError').style.color='red';
        document.getElementById('password').style.borderColor = "red";
        return false;
    }

    if(!pass.match(/[A-Z]/g))
    {
        document.getElementById('passError').innerHTML='* UpperCase Character missing';
        document.getElementById('passError').style.color='red';
        document.getElementById('password').style.borderColor = "red";
        return false;
    }

    if(!pass.match(/[0-9]/g))
    {
        document.getElementById('passError').innerHTML='* Numeric Character missing';
        document.getElementById('passError').style.color='red';
        document.getElementById('password').style.borderColor = "red";
        return false;
    }
    if(!pass.match(/[@+_.?]/g))
    {
        document.getElementById('passError').innerHTML='* password must include @+_.? (atleast one)';
        document.getElementById('passError').style.color='red';
        document.getElementById('password').style.borderColor = "red";
        return false;
    }
    
    else if(pass.length<8)
    {
        document.getElementById('passError').innerHTML='* password must be 8 character long';
        document.getElementById('passError').style.color='red';
        document.getElementById('password').style.borderColor = "red";
        return false;
    }

    else
    {
        document.getElementById('passError').innerHTML='Good';
        document.getElementById('passError').style.color='green';
        document.getElementById('cpassword').disabled=false;
        document.getElementById('password').style.borderColor = "green";
    }  
}

//formvalidation voor het confirmen van het wachtwoord
function passConfirm()
{
    var cpass= document.getElementById('cpassword').value;
    var pass= document.getElementById('password').value;
    
    if(cpass.localeCompare(pass)===0)
    {
        document.getElementById('confError').innerHTML='Password Matched';
        document.getElementById('confError').style.color='green'; 
        document.getElementById('cpassword').style.borderColor = "green"; 
    }

    else
    {
        document.getElementById('confError').innerHTML='* password Does not match';
        document.getElementById('confError').style.color='red';  
        document.getElementById('cpassword').style.borderColor = "green";
        return false;
    }
}

//formvalidation voor het checken van het ID
function idValidation()
{
    var name = document.getElementById('ID').value;
     
    if(name=='')
    {
        document.getElementById('IDError').innerHTML="* Reservation number is required";
        document.getElementById('IDError').style.color='red';
        document.getElementById('ID').style.borderColor = "red";
        return false;
    }

    if(!name.match(/^[1-9][0-9]{0,15}$/))
    {
        document.getElementById('IDError').innerHTML="* Only Numbers";
        document.getElementById('IDError').style.color='red';
        document.getElementById('ID').style.borderColor = "red";
        return false;
    }
    
    else
    {
        document.getElementById('IDError').innerHTML="Good";
        document.getElementById('IDError').style.color='green';
        document.getElementById('ID').style.borderColor = "green";
        return true;
    }
}

//formvalidation voor het checken van de kamernummer
function roomnumberValidation()
{
    var name = document.getElementById('roomnumber').value;

    if(name==''){
        document.getElementById('roomnumberError').innerHTML="* Roomnumber is required";
        document.getElementById('roomnumberError').style.color='red';
        document.getElementById('roomnumber').style.borderColor = "red";
        return false;
    }

    if(!name.match(/^[1-9][0-9]{0,15}$/))
    {
        document.getElementById('roomnumberError').innerHTML="* Only Numbers";
        document.getElementById('roomnumberError').style.color='red';
        document.getElementById('roomnumber').style.borderColor = "red";
        return false;
    }

    else
    {
        document.getElementById('roomnumberError').innerHTML="Good";
        document.getElementById('roomnumberError').style.color='green';
        document.getElementById('roomnumber').style.borderColor = "green";
        return true;
    }
}

//formvalidation voor de incheck datum
function checkinValidation()
{
    var GivenDate = document.getElementById('checkin').value;
    var GivenDate = document.getElementById("checkin").value;
    var ToDate = new Date();

    if(GivenDate==''){
        document.getElementById('checkinError').innerHTML="* check-in date is required";
        document.getElementById('checkinError').style.color='red';
        document.getElementById('checkin').style.borderColor = "red";
        return false;
    }

    if (new Date(GivenDate).getTime() <= ToDate.getTime()) {
        //alert("The Date must be Bigger or Equal to today date");
        document.getElementById('checkinError').innerHTML="* you cant have a check-in that has already passed";
        document.getElementById('checkinError').style.color='red';
        document.getElementById('checkin').style.borderColor = "red";
        return false;
    }

    else
    {
        document.getElementById('checkinError').innerHTML="Good";
        document.getElementById('checkinError').style.color='green';
        document.getElementById('checkin').style.borderColor = "green";
        return true;
    }
}

//formvalidation voor de uitcheckdatum
function checkoutValidation()
{
    var checkout = document.getElementById('checkout').value;
    var checkin = document.getElementById('checkin').value;

    if(checkout==''){
        document.getElementById('checkoutError').innerHTML="* check-out date is required";
        document.getElementById('checkoutError').style.color='red';
        document.getElementById('checkout').style.borderColor = "red";
        return false;
    }

    if(checkout.localeCompare(checkin)>0)
    {
        document.getElementById('checkoutError').innerHTML='Good';
        document.getElementById('checkoutError').style.color='green';  
        document.getElementById('checkout').style.borderColor = "green";
        return true;
    }
    else{
        document.getElementById('checkoutError').innerHTML='* Check-date must be later then check-in date';
        document.getElementById('checkoutError').style.color='red'; 
        document.getElementById('checkout').style.borderColor = "red";
        return false;
    }
}

//hier gebleven met border kleuren
//formvalidation voor het checken van de datum op de week overview pagina
function dateValidation()
{
    var name = document.getElementById('date').value;

    if(name==''){
        document.getElementById('dateError').innerHTML="* Date is required";
        document.getElementById('dateError').style.color='red';
        document.getElementById('date').style.borderColor = "red";
        return false;
    }

    else
    {
        document.getElementById('priceError').innerHTML="Good";
        document.getElementById('priceError').style.color='green';
        document.getElementById('date').style.borderColor = "green";
        return true;
    }
}

//formvalidation voor het checken of de prijs goed is
function priceValidation()
{
    var name = document.getElementById('price').value;

    if(name==''){
        document.getElementById('priceError').innerHTML="* Price is required";
        document.getElementById('priceError').style.color='red';
        document.getElementById('price').style.borderColor = "red";
        return false;
    }

    if(!name.match(/^[1-9][0-9]{0,15}$/))
    {
        document.getElementById('priceError').innerHTML="* Only Numbers";
        document.getElementById('priceError').style.color='red';
        document.getElementById('price').style.borderColor = "red";
        return false;
    }

    else
    {
        document.getElementById('priceError').innerHTML="Good";
        document.getElementById('priceError').style.color='green';
        document.getElementById('price').style.borderColor = "green";
        return true;
    }
}

function textValidation()
{
    var name = document.getElementById('text').value;

    if(name=='')
    {
        document.getElementById('textError').innerHTML="* Description is required";
        document.getElementById('textError').style.color='red';
        document.getElementById('tekst').style.borderColor = "red";
        return false;
    }

    else
    {
        document.getElementById('priceError').innerHTML="Good";
        document.getElementById('priceError').style.color='green';
        document.getElementById('tekst').style.borderColor = "green";
        return true;
    }
}

//formvalidation voor het kijken om de foto goed is
function imgValidation()
{
    var imgPath = document.getElementById('img').value;
    if(imgPath=='')
    {
        document.getElementById('ImgError').innerHTML='* Select the Image';
        document.getElementById('ImgError').style.color='red';  
        document.getElementById('img').style.borderColor = "red";
        return false;
    }

    else{
        var ext = imgPath.substring(imgPath.lastIndexOf('.')+1).toLowerCase();
        if(ext=='jpg'||ext=='jpeg')
        {   
            document.getElementById('ImgError').innerHTML='Good';
            document.getElementById('ImgError').style.color='green'; 
            document.getElementById('img').style.borderColor = "green"; 
            return true;
        }

        else
        {
            document.getElementById('ImgError').innerHTML='* Only Jpg or jpeg  image allowed';
            document.getElementById('ImgError').style.color='red';  
            document.getElementById('img').style.borderColor = "red";
            return false;
        }
    } 
}

//function voor het valideren van het form op de inlogpagina
/*function validateInlogFormUser()
{
    if(emailValidation()==false || inlogPassValidation()==false)
    {
        //document.getElementById('InlogUser').disabled=true;
        return false;
    }

    else
    {
        //document.getElementById('InlogUser').disabled=false;
        return true;
    }
}

/*function validateForm()
{ 
    if(nameValidation()==false || surnameValidation()==false || genderValidation()==false || birthdayValidation()==false || countryValidation()==false || cityValidation()==false || postalValidation()==false || streetValidation()==false || emailValidation()==false || mobileValidation()==false || inlogPassValidation()==false || passValidation()==false || passConfirm()==false || idValidation()==false || roomnumberValidation()==false || checkinValidation()==false || checkoutValidation()==false || dateValidation()==false || priceValidation()==false || textValidation()==false ||imgValidation()==false)
    {   
        //document.getElementById('button').disabled=true;
        return false;
    }

    else
    {
        //document.getElementById('button').disabled=false;
        return true;
    } 
}*/