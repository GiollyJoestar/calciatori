<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
<body>
<h1>Lista dei giocatori</h1>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>NOME CALCIATORE</th>
            <th>COGNOME CALCIATORE</th>
            <th>ID SQUADRA</th>
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
$sql="SELECT * FROM test_calciatore";
$query=mysqli_query($conn,$sql);
while($row=mysqli_fetch_array($query))
{
echo "<tr>";
echo '<th scope="row">'; echo "$row[0]</th>";
echo "<td>$row[1]</td>";
echo "<td>$row[2]</td>";
echo "<td>$row[3]</td>";
echo "</tr>";
}
?>
    </tbody>
</table>
<h1>Lista delle squadre</h1>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>NOME SQUADRA</th>            
        </tr>
    </thead>
    <tbody>
<?php

$sql="SELECT * FROM squadre";
$query=mysqli_query($conn,$sql);
while($row=mysqli_fetch_array($query))
{
echo "<tr>";
echo '<th scope="row">'; echo "$row[0]</th>";
echo "<td>$row[1]</td>";
echo "</tr>";
}
?>
    </tbody>
</table>

</body>



</html>