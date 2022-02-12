<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'calciatori';
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn)
    die('Could not connect');
$nome=strtolower($_POST['nome']);
$cognome=strtolower($_POST['cognome']);
$squadra=strtolower($_POST['squadra']);
$id_squadra=NULL;
$sql_id="SELECT id FROM squadre WHERE squadra='$squadra'";
$query=mysqli_query($conn,$sql_id);
session_start();
if(isset($_SESSION['permessi']))
{
    if($_SESSION['permessi']>1)
    {   
        if($row = mysqli_fetch_array($query))
            {
                $id_squadra=$row[0];
                $sql="UPDATE test_calciatore SET id_squadra=$id_squadra WHERE nome_calc='$nome' AND cognome_calc='$cognome'";
                if(mysqli_query($conn,$sql))
                {
                    echo "collegato";
                }
                else
                echo mysqli_error($conn);
            }
        else
        {
            echo "qualcosa è andato storto :-(";
        }
    }
    else
        echo "non disponi dei permessi necessari";
}
else
    echo "non disponi dei permessi necessari";
?>