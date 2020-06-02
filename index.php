<!doctype html>
<html lang="en">
  <head>
        <title>Landing Page</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!--CSS Style Sheet-->
        <link rel="stylesheet" href="CSS/style.css">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <!--Scripts-->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        <script src="JS/script.js"></script>
        <script src="JS/animation.js" ></script>        
    </head>
    <body>

        <section id="form-container" class="container row">
            <section id="form-text"  class="col">
                <h3>Landing Page</h3>
                <p> This is an example of a Landing Page that returns to the user an e-mail and register him in a MySQL database to future operations.</p>

                <?php 
                    if(isset($_GET["success"]) && $_GET["success"] == 1) 
                    {
                        include 'Templates/success.html';    
                    }
                    else if(isset($_GET["success"]) && $_GET["success"] == 0)
                    {
                        include 'Templates/fail.html'; 
                    }
                ?>
            </section>
           
            <form id="form-area" method="POST" action="APP/app.php" onsubmit="return verifyForm(this); >
                <label>
                    <h5>Name</h5>
                    <input type="text" name="name" class="form-input">
                </label>

                <br>

                <label>
                    <h5>E-mail</h5>
                    <input type="text" name="email" class="form-input">
                </label>

                <br>

                <label>
                    <h5>Telephone</h5>
                    <input type="text" name="telephone" class="form-input">
                </label>
                
                <br>
                
                <input type="submit" class="button-submit" value="Submit">
            </form>
        </section>

        
        
    </body>
</html>