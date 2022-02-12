<?php 
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'calciatori';
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn)
    die('Could not connect');
$squadra=strtolower($_POST['squadra']);
$sql="INSERT INTO squadre(id,squadra) VALUES (NULL,'$squadra')";
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