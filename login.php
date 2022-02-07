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
$sql="SELECT * FROM utenti WHERE username='$username' AND pass='$pwd'";
$query=mysqli_query($conn, $sql);
// if(!$query)
// {
    // printf("Error: %s\n", mysqli_error($conn));
    // exit();
// }
if(mysqli_fetch_array($query)!=null)
{
    echo "login riuscito";
    $_SESSION['username']=$username;
    $_SESSION['password']=$pwd;
    header("Location:logged.php");
}
    
else
    echo "email o password sbagliata";
?>