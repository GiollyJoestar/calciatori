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
   $squadra = $_POST['squadra'];

   $sql = "SELECT nome FROM calciatori WHERE nome ='$nome' AND cognome='$cognome';" ;

   if (mysqli_query($conn, $sql)) 
   {
       $sql = "UPDATE calciatori SET squadra='$squadra' WHERE nome ='$nome' AND cognome='$cognome';" ;
       if (mysqli_query($conn, $sql))
       {
           echo "squadra modificata con successo!";
       }
       else
       {
           echo "errore " . $sql . ":-" . mysqli_error($conn);
       }
   }
   else 
   {
       echo "giocatore non trovato " . $sql . ":-" . mysqli_error($conn);
   }
   mysqli_close($conn);
?>