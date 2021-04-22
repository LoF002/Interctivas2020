<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Newsletter</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <div class="container">
        <h1>Newsletter Registration</h1>
        <div class="row">
            <form action="newsletter.php" method="post"> 
                <div class="row">
                    <div class="col col-2">
                        <label for="">Email Address</label>
                    </div>
                    <div class="col col-2">
                        <input id="email" type="text" name="email">
                        <span id="info" class="error-message">This email address is registered</span>
                    </div>
                </div>

                <div class="row">
                    <div class="col col-2">
                        <label for="">Fullname</label>
                    </div>
                    <div class="col col-2">
                        <input type="text" name="fullname">
                    </div>
                </div>

                <div class="row">
                    <div class="col col-4">
                        <input type="submit" value="SUBMIT">
                    </div>
                </div>
                
            </form>
        </div>
    </div>
    <script src="./js/main.js"></script>
</body>
</html>