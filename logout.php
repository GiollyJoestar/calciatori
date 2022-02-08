<html>
    <head>
        <title>Logout</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body>
        <?php 
        session_start();
        session_destroy();
        ?>
        <div class="p-5">
            <form action="index.php">
                <button type="submit" class="btn btn-primary position-relative start-50 translate-middle">Torna alla pagina principale</button>
            </form>
        </div>
    </body>
</html>