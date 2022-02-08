<html>
    <head>
        <title>index</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body>
        <?php 
        session_start();
        if(!isset($_SESSION['username']))
        {
            echo '<div class=" p-5 "><form action="form_login.html"><button type="submit" class="btn btn-primary position-relative start-50 translate-middle">Login</button></form></div>';
        }
        else
        {
            echo '<div class=" p-5 "><form action="logout.php"><button type="submit" class="btn btn-primary position-relative start-50 translate-middle">Logout</button></form></div>';
        }
        ?>
        
    </body>
</html>