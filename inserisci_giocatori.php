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
$sql="INSERT INTO test_calciore(ID,nome_calc,cognome_calc,id_squadra) VALUES (NULL,'$nome','$cognome',NULL)";
if(mysqli_query($conn,$sql))
{
    echo "inserimento riuscito";
}
else{
    echo "failed";
}
?>