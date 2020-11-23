<!DOCTYPE html>
<html lang="pl" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Nasz sklep komputerowy</title>
    <link rel="stylesheet" type="text/css" href="styl8.css">
  </head>
  <body>

<!-- Połączenie z bazą -->
<?php
  $serwer = "localhost";
  $user = "root";
  $password ="";
  $baza = "sklep";

  $mysqli = new mysqli($serwer, $user, $password, $baza);
  //sprawdzenie połączenia:
  if ($mysqli -> connect_errno) {
    echo "Nie udało się połączyć z MySQL: ".$mysqli->connect_error;
    exit();
  }

  $sql = "SELECT id, nazwa, opis, cena FROM podzespoly WHERE cena < 1000";
  $wynik = $mysqli->query($sql);
?>


    <div class="menu">
      <a href="index.php">Główna</a>
      <a href="procesory.html">Procesory</a>
      <a href="ram.html">RAM</a>
      <a href="grafika.html">Grafika</a>
    </div>

    <div class="logo">
      <h2>Podzespoły komputerowe</h2>
    </div>

    <div class="glowny">
      <h1>Dzisiejsze promocje</h1>
      <table>
        <tr>
          <th>NUMER</th>
          <th>NAZWA PODZESPOŁU</th>
          <th>OPIS</th>
          <th>CENA</th>
        </tr>

        <?php
        if ($wynik->num_rows > 0){
          while ($rekord = $wynik->fetch_assoc()){
            echo "<tr>";
            echo "<td>".$rekord["id"]."</td>";
            echo "<td>".$rekord["nazwa"]."</td>";
            echo "<td>".$rekord["opis"]."</td>";
            echo "<td>".$rekord["cena"]."</td>";
            echo "</tr>";
          }

        } else {echo "brak wyników";}

        ?>
      </table>

    </div>

      <div class="stopka">
        <img src="scalak.jpg" alt="promocje na procesory">
      </div>

      <div class="stopka">
        <h4>Nasz  Sklep Komputerowy</h4>
        <p>Współpracujemy  z  hurtownią  <a href="http://www.edata.pl/">edata</a></p>
      </div>

      <div class="stopka">
        <p>zadzwoń: 601 602 603</p>
      </div>

      <div class="stopka">
        <p>Stronę wykonał: 123456781011</p>
      </div>
<?php $mysqli->close(); ?>
  </body>
</html>
