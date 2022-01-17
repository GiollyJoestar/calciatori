<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'calciatori';
$id_squadra=1;
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn)
    die('Could not connect');
$nome=$_POST['nome'];
$cognome=$_POST['cognome'];
$squadra=$_POST['squadra'];
$sql="INSERT INTO test_calciatore(id,nome_calc,cognome_calc,id_squadra) VALUES (NULL,'$nome','$cognome',NULL)";
$sql_squadra="SELECT * FROM squadre WHERE squadra='$squadra'";
$query_squadra=mysqli_query($conn,$sql_squadra);
if(mysqli_query($conn,$sql))
    echo "inserimento giocatere riuscito<br>";
else
    echo "failed<br>";

if(mysqli_fetch_array($query_squadra)==NULL)
{
    $inserisci_squadra="INSERT INTO squadre(id,squadra) VALUES (NULL,'$squadra')";
    if(mysqli_query($conn,$inserisci_squadra))
    {
        echo "squadra inserita<br>";
        
    }
    $get_idsquadra="SELECT * FROM squadre WHERE squadra='$squadra'";
    $query_idsquadra=mysqli_query($conn,$get_idsquadra);
    while($row = mysqli_fetch_array($query_idsquadra))
    {
        $id_squadra=$row[0];
        break;
    }
    echo "$id_squadra<br>";
    $update_idsquadra="UPDATE test_calciatore SET id_squadra=$id_squadra WHERE nome_calc='$nome' AND cognome_calc='$cognome'";
    if(mysqli_query($conn,$update_idsquadra))
        echo "update riuscito<br>";
    else
        echo "failed<br>"; 

}
// $sql_squadra="INSERT INTO squadre(id,nome_squadra) VALUES (NULL,'$squadra')";
// $sql_squadra="IF NOT EXISTS(SELECT * FROM squadre WHERE nome_squadra='$squadra') 
// BEGIN INSERT INTO squadre(id,nome_squadra) VALUES (NULL,'$squadra') END";
// if(mysqli_query($conn,$sql_squadra) )
//     echo "inserimento riuscito<br>";
// else
//     echo "inserimento fallito<br>";
?>