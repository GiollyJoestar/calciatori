<html>
    <head>
        <title>index</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body>
        <div class="p-4">
            <form action="form_stampa_per_squadra.html">
                <button type="submit" class="btn btn-primary position-relative start-50 translate-middle">Stampa per squadra</button>
            </form>
        </div>
        <div class="p-2">
            <form action="form_stampa_squadra_giocatore.html">
                <button type="submit" class="btn btn-primary position-relative start-50 translate-middle">Stampa squadra di un giocatore</button>
            </form>
        </div>
        <?php 
        session_start();
        if(!isset($_SESSION['username']))
        {
            echo '<div class=" p-2 "><form action="form_login.html"><button type="submit" class="btn btn-primary position-relative start-50 translate-middle">Login</button></form></div>';
        }
        else
        {
            echo '<div class=" p-2 "><form action="logout.php"><button type="submit" class="btn btn-primary position-relative start-50 translate-middle">Logout</button></form></div>';
            if($_SESSION['permessi']>0)
            {
                echo '<div class=" p-2 "><form action="inserisci_giocatori.html"><button type="submit" class="btn btn-primary position-relative start-50 translate-middle">Inserisci giocatori</button></form></div>';
                echo '<div class=" p-2 "><form action="inserisci_squadre.html"><button type="submit" class="btn btn-primary position-relative start-50 translate-middle">Inserisci squadre</button></form></div>';
            }           
        }      
        ?>       
    </body>
</html>