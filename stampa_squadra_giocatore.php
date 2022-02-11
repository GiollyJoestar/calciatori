<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <title>stampa giocatori per squadra</title>
    </head>
<body>
    

<h1>Lista dei giocatori</h1>
<table class="table">
    <thead>
        <tr>
            <th>NOME CALCIATORE</th>
            <th>COGNOME CALCIATORE</th>
            <th>NOME SQUADRA</th>
        </tr>
    </thead>
    <tbody>
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
$sql="SELECT calc.nome_calc,calc.cognome_calc,squadre.squadra FROM test_calciatore calc JOIN squadre ON squadre.id=calc.id_squadra WHERE calc.nome_calc='$nome' AND calc.cognome_calc='$cognome'";
$query=mysqli_query($conn,$sql);
while($row=mysqli_fetch_array($query))
{
echo "<tr>";
echo "<td>$row[0]</td>";
echo "<td>$row[1]</td>";
echo "<td>$row[2]</td>";
echo "</tr>";
}
?>
    </tbody>
    </table>
    </body>
</html>