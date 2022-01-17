<!DOCTYPE html>
<html>
  <body>
    <div id="main_div">
      <div id="form">
        <h2>Form inserimento calciatore</h2>

        <form action="query_add_calciatore.php" method="post">
          <label for="nome">Nome:</label><br/>
          <input type="text" placeholder="nome" name="nome"/><br/>

          <label for="cognome">Cognome:</label><br/>
          <input type="text" placeholder="cognome" name="cognome"/><br/>

          <label for="numero_maglia">Numero maglia:</label><br/>
          <input type="number" placeholder="numero_maglia" name="numero_maglia"/><br/>

          <label for="squadra">Squadra:</label><br />
          <input type="text" placeholder="squadra" name="squadra"/><br/>

          <input type="submit" value="Submit" />
        </form>
      </div>
      <div id="form">
        <h2>Form modifica squadra calciatore</h2>

        <form action="query_mod_calciatore.php" method="post">
          
          <p>Ricerca il giocatore da modificare:</p><br/>

          <label for="nome">Nome:</label><br/>
          <input type="text" placeholder="nome" name="nome"/><br/>

          <label for="cognome">Cognome:</label><br/>
          <input type="text" placeholder="cognome" name="cognome"/><br/><br/>

          <p>Inserisci la nuova squadra da assegnare:</p><br/>

          <label for="squadra">Squadra:</label><br/>
          <input type="squadra" placeholder="squadra" name="squadra"/><br/>

          <input type="submit" value="Submit" />
        </form>
      </div>
      <div id="form">
        <h2>Lista giocatori</h2>
        <?php
          function query_result($conn,$sql)
          {
             if ($query=mysqli_query($conn, $sql))
             {
                //echo $sql."<br>";
                //$query=mysqli_query($conn,$sql);
                return $query;
             }
             else
             {
                echo "Errore: " . $sql . ":_:" . mysqli_error($conn)."<br>";
             }
          }
          $sql = "SELECT * FROM tab_calciatore LEFT OUTER JOIN tab_squadra ON tab_calciatore.id_squadra = tab_squadra.id";
          $risultati = query_result($conn, $sql);

          echo '<table id="wow">';
          echo '<tr>
          <th class="header">ID</th>
          <th class="header">Nome</th>
          <th class="header">Cognome</th>
          <th class="header">Numero maglia</th>
          <th class="header">Squadra</th>
          </tr>';

          while ($riga = mysqli_fetch_array($risultati, MYSQLI_NUM))
          {
              echo '<tr>';
              echo '<td>' . $riga[0] . '</td>';
              echo '<td>' . $riga[1] . '</td>';
              echo '<td>' . $riga[2] . '</td>';
              echo '<td>' . $riga[3] . '</td>';
              echo '<td>' . $riga[4] . '</td>';
              echo '</tr>';
          }
          echo '</table>';
          mysqli_close($conn);
        ?>
        </form>
      </div>
    </div>
  </body>
</html>

<style>
  body {
  font-family: "andale mono", monospace;
  background-color: #ebe9e9;
  }

  #main_div {
    width: auto;
    height:auto;
    margin-left: auto;
    margin-right: auto;
  }

  #form {
    text-align: center;
    width: 100%;
    float: left;
  }

  label{
    text-align: right;
  }
</style>
