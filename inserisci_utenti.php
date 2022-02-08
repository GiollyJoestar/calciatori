<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'calciatori';
$id_squadra=1;
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn)
    die('Could not connect');
$username=strtolower($_POST['username']);
$pwd=md5($_POST['password']);
$permessi=intval($_POST['permessi']);
$sql="INSERT INTO utenti(id,username,password,permessi) VALUES (NULL,'$username','$pwd','$permessi')";
if(mysqli_query($conn,$sql))
{
    echo "utente aggiunto";
}
else
    {echo"Connect failed: \n". mysqli_error($conn);
    exit();}
// 0 è non loggato,1 è admin,2 è superadmin
?>