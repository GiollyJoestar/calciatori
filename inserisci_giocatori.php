<?php 
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'calciatori';
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn)
    die('Could not connect');
$nome=strtolower($_POST['nome']);
$cognome=strtolower($_POST['cognome']);
$sql="INSERT INTO test_calciatore(ID,nome_calc,cognome_calc,id_squadra) VALUES (NULL,'$nome','$cognome',NULL)";
session_start();
if(isset($_SESSION['permessi']))
{
    if($_SESSION['permessi']>=1)
    {
        if(mysqli_query($conn,$sql))
        {
            echo "inserimento riuscito";
        }
        else{
            echo "failed";
            echo mysqli_error($conn);
        }
    }
    else
        echo "non disponi dei permessi necessari";
}
else
    echo "non disponi dei permessi necessari";
?>