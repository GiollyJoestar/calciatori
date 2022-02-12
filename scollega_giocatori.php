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
$sql="UPDATE test_calciatore SET id_squadra=NULL WHERE nome_calc='$nome' AND cognome_calc='$cognome'";
session_start();
if(isset($_SESSION['permessi']))
{
    if($_SESSION['permessi']>1)
    {
        if(mysqli_query($conn,$sql))
        {
            echo "scollegato";
        }
        else
            echo mysqli_error($conn);
    }
    else
        echo "non disponi dei permessi necessari";
}
else
    echo "non disponi dei permessi necessari";
?>