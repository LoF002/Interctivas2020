<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Spartan:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <title>document </title>
    <link rel="stylesheet" href="./css/styleLogin.css">
</head>
<body>
    <div class="container">
        <div class="botton1">
            <div class="botton2">  
                <select name="opcion2" id="opcion2">
                    <option> Student</option>
                    <option> Administrator </option>
                  </select> 
                <div id="escoger"></div>  
                
             <button type="botton" class="btn" onclick="login()">Log In</button>
             <button type="botton" class="btn"onclick="registro()"> Check In</button> 
        </div>
        <div class="logo-phothon">
            <a href="./index.html">
                <img src="./images/logo.png" alt="logo" >
            </a>
      
    </div>
    

    <form id="login"class="input-group">
        <input type="" class="input-field" placeholder="    User or E-mail" required>
         <input type="password" class="input-field" placeholder="    Password" required>
          <input type="checkbox" class="check-box"> <span>Remember my password</span>
          <a href="./profile.html" class="submit-btn">Start</a>
          <!--<button type="submit" class="submit-btn"> Start</button>-->
          <a href="#"> Recover password</a><br>
          <a href="#">Don't have an account? Register now.</a>
    
        </form>

        <form id="registro"class="input-group">
        <input type="" class="input-field" placeholder="  Full name " required>
         <input type="" class="input-field" placeholder="   Username" required>
         <input type="" class="input-field" placeholder="    E-mail" required>
         <input type="password" class="input-field" placeholder="   Password" required>
          <button type="submit" class="submit-btn2"> Create account</button>
        
        </form>
    </div>

</div>

<script>

var a= document.getElementById("login");
var b= document.getElementById("registro");
var c= document.getElementById("escoger");

function login(){
a.style.left ="51px";
b.style.left="390px";
c.style.left="12px";

}

function registro(){
a.style.left ="-290px";
b.style.left="40px";
c.style.left="87px";

}

</script>

</body>
</html>