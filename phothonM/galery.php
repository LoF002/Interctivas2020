<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Spartan:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <title>document </title>
    <link rel="stylesheet" href="./css/styleGalery.css">
</head>
<body>
    <div class="container">
        <header>
            <nav class="top-bar">
                <a href="./index.php">
                    <img class="logo" src="./images/logo.png" alt="logo">
                </a>
                <span class="mob-menu fas fa-bars" onclick="openMobileMenu()"></span>
                <ul class="top-nav">
                    <span class="mob-close far fa-times-circle" onclick="closeMobileMenu()"></span>
                    <li class="top-nav-item"><a class="top-nav-link" href="./index.php">Home</a></li>
    
                    <li class="top-nav-item">
                        <div class="search-item">
                            <input class="input-search" type="text" placeholder="Search">
                            <a class="icon-search" href="#"><i class="fas fa-search"></i></a>
                        </div>
                    </li>
                </ul>
            </nav>
        </header>
        <div class="marco">
    
            <h6>Gallery</h6>
    <ul class="galeria">
        <li><a href="#image1"><img src="./images/paisaje2.jpg" alt="img1"></a></li>
        <li><a href="#image2"><img src="./images/paisaje3.jpg" alt="img2"></a></li>
        <li><a href="#image3"><img src="./images/paisaje4.jpg" alt="img3"></a></li>
        
    </ul>

    
    <div class="siguiente" id="image3">
        <h3>Third Work</h3>
        <div class="imagenes">
            <a href="#image2"><</a>
            <a href="#image4"><img src="./images/paisaje4.jpg"></a>
            <a href="#image4">></a>
        </div>
        <a class="cerrar" href="">Close</a>
            <h1> Photo details</h1><br>
            <h2> •Author's name</h2><br>
            <h4> •Name of Work</h4><br>
            <h5> •Year of creation</h5><br>
    </div>

    <div class="siguiente" id="image2">
        <h3>Second Work</h3>
        <div class="imagenes">
            <a href="#image1"><</a>
            <a href="#image3"><img src="./images/paisaje3.jpg"></a>
            <a href="#image3">></a>
        </div>
        <a class="cerrar" href="">Close</a>
            <h1> Photo details</h1><br>
            <h2> •Author's name</h2><br>
            <h4> •Name of Work</h4><br>
            <h5> •Year of creation</h5><br>
    </div>
    
  

    <div class="siguiente" id="image1">
        <h3> First Work</h3>
        <div class="imagenes">
            <a href="#image4"></a>
            <a href="#image2"><img src="./images/paisaje2.jpg"></a>
            <a href="#image2">></a>
        </div>
        <a class="cerrar" href="">Close</a>
            <h1> Photo details</h1><br>
            <h2> •Author's name</h2><br>
            <h4> •Name of Work</h4><br>
            <h5> •Year of creation</h5><br>
    </div>
    

    
        
       
        
        





</div>

<script src="./js/main.js"></script>

</body>
</html>