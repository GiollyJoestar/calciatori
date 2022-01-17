<?php
   $servername='localhost';
   $username='gino';
   $password='';
   $dbname = "my_gino";


   $conn=mysqli_connect($servername,$username,$password,"$dbname");


   if(!$conn)
   {
      die('Could not Connect MySql Server:' . mysqli_error($conn));
   }

   print_r($_POST);

   $nome = $_POST['nome'];
   $cognome = $_POST['cognome'];
   $data = $_POST['data'];
   $numero_maglia = $_POST['numero_maglia'];
   $squadra = $_POST['squadra'];

   // $nu = mysqli_real_escape_string($nu);
   // $pwd = mysqli_real_escape_string($pwd);

   $sql = "INSERT INTO calciatori  VALUES (NULL, '$nome','$cognome','$data','$numero_maglia','$squadra')";

   echo $sql;
   echo "<br>";

   if (mysqli_query($conn, $sql)) {
      echo "Aggiunto nuovo giocatore";
   } 
   else 
   {
      echo "Errore: " . $sql . ":-" . mysqli_error($conn);
   }

   mysqli_close($conn);
?>