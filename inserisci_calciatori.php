<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'calciatori';
$id_squadra=1;
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn)
    die('Could not connect');
$nome=strtolower($_POST['nome']);
$cognome=strtolower($_POST['cognome']);
$squadra=strtolower($_POST['squadra']);
function get_id_squadra($query)
{
    
    while($row = mysqli_fetch_array($query))
    {
        $id=$row[0];
        break;
    }
    return $id;
}


$sql="INSERT INTO test_calciatore(id,nome_calc,cognome_calc,id_squadra) VALUES (NULL,'$nome','$cognome',NULL)";
$sql2="SELECT * FROM test_calciatore WHERE nome_calc='$nome' AND cognome_calc='$cognome'";
$sql_squadra="SELECT * FROM squadre WHERE squadra='$squadra'";
$query_squadra=mysqli_query($conn,$sql_squadra);
$query2=mysqli_query($conn,$sql2);
if(mysqli_fetch_array($query2)==NULL)
{
    if(mysqli_query($conn,$sql))
    echo "inserimento giocatere riuscito<br>";
else
    echo "failed<br>";
}
else 
    echo "giocatore già esistente<br>";

if(mysqli_fetch_array($query_squadra)==NULL)
{
    $inserisci_squadra="INSERT INTO squadre(id,squadra) VALUES (NULL,'$squadra')";
    if(mysqli_query($conn,$inserisci_squadra))
    {
        echo "squadra inserita<br>";
        
    }
    $get_idsquadra="SELECT * FROM squadre WHERE squadra='$squadra'";
    $query_idsquadra=mysqli_query($conn,$get_idsquadra);
    $id_squadra=get_id_squadra($query_idsquadra);
    $update_idsquadra="UPDATE test_calciatore SET id_squadra=$id_squadra WHERE nome_calc='$nome' AND cognome_calc='$cognome'";
    if(mysqli_query($conn,$update_idsquadra))
        echo "update riuscito<br>";
    else
        echo "failed<br>"; 

}
else
 {
    $get_idsquadra="SELECT * FROM squadre WHERE squadra='$squadra'";
    $query_idsquadra=mysqli_query($conn,$get_idsquadra);
    $id_squadra=get_id_squadra($query_idsquadra);
    $update_idsquadra="UPDATE test_calciatore SET id_squadra=$id_squadra WHERE nome_calc='$nome' AND cognome_calc='$cognome'";
    if(mysqli_query($conn,$update_idsquadra))
        echo "update riuscito2<br>";
    else
        echo "failed<br>"; 
 }

?>