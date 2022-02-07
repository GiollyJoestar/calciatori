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
// 1 è utente non loggato perché se mettono una stringa a caso sui permessi almeno non si arrabbia
// 0 è super admin e 2 è admin nomrmale
?>