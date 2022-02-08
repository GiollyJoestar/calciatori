<?php
session_start();
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'calciatori';
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn)
    die('Could not connect');
$username=$_POST['username'];
$pwd=md5($_POST['password']);
$sql="SELECT * FROM utenti WHERE username='$username' AND password='$pwd'";
$query=mysqli_query($conn, $sql);
 if(!$query)
 {
     printf("Error: %s\n", mysqli_error($conn));
     exit();
 }
if(mysqli_fetch_array($query)!=null)
{
    while ($row = mysqli_fetch_array($query))
    {
        $permessi=$row[3];
    }
    echo "login riuscito";
    $_SESSION['username']=$username;
    $_SESSION['password']=$pwd;
    $_SESSION['permessi']=intval($permessi);
    header("Location:index.php");
}
    
else
    echo "email o password sbagliata";
?>