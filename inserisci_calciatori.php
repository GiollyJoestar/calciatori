<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'calciatori';
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn)
    die('Could not connect');
$nome=$_POST['nome'];
$cognome=$_POST['cognome'];
$squadra=$_POST['squadra'];
$sql="INSERT INTO calciatore(id,nome,cognome,squadra) VALUES (NULL,'$nome','$cognome','$squadra')";
// $sql_squadra="INSERT INTO squadre(id,nome_squadra) VALUES (NULL,'$squadra')";
// $sql_squadra="IF NOT EXISTS(SELECT * FROM squadre WHERE nome_squadra='$squadra') 
// BEGIN INSERT INTO squadre(id,nome_squadra) VALUES (NULL,'$squadra') END";
if(mysqli_query($conn, $sql) and mysqli_query($conn,$sql_squadra) )
    echo "inserimento riuscito";
else
    echo "inserimento fallito";

?>