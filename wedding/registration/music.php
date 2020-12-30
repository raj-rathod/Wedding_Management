<?php
   include('../action.php');
   if (!isset($_SESSION['name'])) {
       header('location:../index.php');
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Features Details</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="main">
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <form method="POST" id="signup-form" class="signup-form">
                        <h2 class="form-title">Music Details</h2>
                        <div class="form-group">
                            <input type="text" class="form-input" name="vname" id="name" placeholder="Venue Name"/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="price" id="email" placeholder="Price"/>
                        </div>
                         <div class="form-group">
                         <input type="text" class="form-input" name="desc" id="date" placeholder="Description "/>
                        </div>
                        <div class="form-group">
                        <input type="submit" name="music" id="submit" class="form-submit" value="Submit"/>
                        </div>
                    </form>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>