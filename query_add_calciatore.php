<?php
   $servername='localhost';
   $username='gino';
   $password='';
   $dbname = "my_gino";


   function query_result($conn,$sql)
   {
      if ($query=mysqli_query($conn, $sql))
      {
         echo $sql."<br>";
         //$query=mysqli_query($conn,$sql);
         return $query;
      }
      else
      {
         echo "Errore: " . $sql . ":-" . mysqli_error($conn)."<br>";
      }
   }

   $conn=mysqli_connect($servername,$username,$password,"$dbname");


   if(!$conn)
   {
      die('Could not Connect MySql Server:' . mysqli_error($conn));
   }

   $nome = $_POST['nome'];
   $cognome = $_POST['cognome'];
   $numero_maglia = $_POST['numero_maglia'];
   $squadra = $_POST['squadra'];


   
   // controlla se la squadra inserita è presente
   $sql="SELECT * FROM tab_squadra WHERE nome_squadra='$squadra'"; 
   $risultato=mysqli_fetch_assoc(query_result($conn, $sql));
   // se la squadra è presente prende l'id
   if ($risultato['nome_squadra']==$squadra)
   {
      echo $risultato['id']."<br>";
      $squadra_id=$risultato['id'];
   }
   else
   {
      // se la squadra NON è presente la inserisce
      $sql="INSERT INTO tab_squadra VALUES (NULL, '$squadra')";
      query_result($conn, $sql);
      // prende l'id
      $sql="SELECT * FROM tab_squadra WHERE nome_squadra='$squadra'";
      $risultato=mysqli_fetch_assoc(query_result($conn, $sql));
      if ($risultato['nome_squadra']==$squadra)
      {
         echo $risultato['id']."<br>";
         $squadra_id=$risultato['id'];
      }
   }

   $sql = "UPDATE tab_calciatore SET id_squadra='$squadra_id' WHERE nome='$nome' AND cognome='$cognome';" ;
   query_result($conn, $sql);
   
   mysqli_close($conn);
   echo "finito";
?>