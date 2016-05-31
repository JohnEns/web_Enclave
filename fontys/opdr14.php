<?php
$pagina = basename(__FILE__);

/** De subfolder waarin de plaatjes staan in de folder "img"
 * 
 * Voor een volledige website is het leuk als deze variabele 
 * op afstand gewijzigd kan worden.
 * 
 * @global string $locatieplaatjes
 * @return type = string
 */
$locatieplaatjes = 'test';

/** Deze functie creeert een volledig pad
 * 
 * @param type $map
 * @return string
 */
function picmap($map) {
    $reeks = "../img/" . $map;
    return $reeks;
}

/** Deze functie haalt een random plaatje uit een bestand
 * 
 * @global string $locatieplaatjes
 * @return type= bestandsnaam incl extensie
 */
function rollo() {
    global $locatieplaatjes;
    $plaatjesdump = scandir(picmap($locatieplaatjes));
    $aantalpics = count($plaatjesdump) - 1;
    $functievang = mt_rand(0, $aantalpics);
    $plaatje = $plaatjesdump[$functievang];
    return $plaatje;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="description"
              content="Game Gaming Gear" />
        <meta name="keywords"
              content="gaming, game, opinion, pc, console, playstation, xbox" />
        <title>Enclave Gaming</title>
        <link href="../css/styles.css" type="text/css" rel="stylesheet" />

    </head>
    <body>
        <?php
        include 'tempf.html';
        ?>
        <h1>Opdracht 14 - Random plaatjes in random tabel</h1>
        <h2>Opgave</h2>   
        <p>Zorg	dat	je	meerdere	random	plaatjes	tegelijkertijd toont	in	een	tabel.
            Het	aantal	rijen	en	kolommen	in	de	tabel	moet	gemakkelijk	aan	te	
            passen	zijn. Tip:	maak	gebruik	van	variabelen	voor	het	aantal	rijen	en	
            kolommen.</p>
        <h2>Uitwerking</h2>
        <?php
        $kolom = mt_rand(1, 3);

        switch ($kolom) {
            case 1:
                echo"
            <table>
                <tr>
                    <th>Plaatje solo</th>
                </tr>";

                $randomrij = mt_rand(1, 10);
                for ($rij = 1; $rij < $randomrij; ++$rij) {
                    echo "<tr><td><img src='" . picmap($locatieplaatjes) . "/" . rollo() . "' class='small' alt='" . rollo() . "'></td></tr>";
                }
                echo "</table>";
                break;


            case 2:
                echo"
                <table>
                    <tr>
                        <th>Pic 1</th>
                        <th>Pic 2</th>
                    </tr>";
                $randomrij = mt_rand(1, 10);
                for ($rij = 1; $rij < $randomrij; $rij++) {
                    echo"<tr><td><img src='" . picmap($locatieplaatjes) . "/" . rollo() . "' class='small' alt='" . rollo() . "'></td>";
                    echo"<td><img src='" . picmap($locatieplaatjes) . "/" . rollo() . "' class='small' alt='" . rollo() . "'></td></tr>";
                }
                echo "</table>";
                break;

            case 3:
                echo"
                <table>
                    <tr>
                        <th>Pic 1</th>
                        <th>Pic 2</th>
                        <th>Pic 3</th>
                    </tr>";

                $randomrij = mt_rand(1, 10);
                for ($rij = 1; $rij < $randomrij; $rij++) {

                    echo"<tr><td><img src='" . picmap($locatieplaatjes) . "/" . rollo() . "' class='small' alt='" . rollo() . "'></td>";
                    echo"<td><img src='" . picmap($locatieplaatjes) . "/" . rollo() . "' class='small' alt='" . rollo() . "'></td>";
                    echo"<td><img src='" . picmap($locatieplaatjes) . "/" . rollo() . "' class='small' alt='" . rollo() . "'></td></tr>";
                }
                echo "</table>";
                break;

            default:
                echo "Er gaat iets mis!<br/>";
                break;
        }
        /**
          if ($kolom == 1) {
          echo"
          <table>
          <tr>
          <th>Plaatje solo</th>

          </tr>
          <tr>";

          $randomrij = mt_rand(1, 10);
          for ($rij = 1; $rij <= $randomrij; $rij++) {

          echo "<td><img src='" . picmap($locatieplaatjes) . "/" . rollo() . "' class='small' alt='" . rollo() . "'></td></tr>";
          }
          echo "</table>";

          } else if ($kolom == 2) {
          echo"
          <table>
          <tr>
          <th>Pic 1</th>
          <th>Pic 2</th>
          </tr>
          <tr>";
          $randomrij = mt_rand(1, 10);
          for ($rij = 1; $rij <= $randomrij; $rij++) {
          echo"<td><img src='" . picmap($locatieplaatjes) . "/" . rollo() . "' class='small' alt='" . rollo() . "'></td>";
          echo"<td><img src='" . picmap($locatieplaatjes) . "/" . rollo() . "' class='small' alt='" . rollo() . "'></td></tr>";
          }
          echo "</table>";

          } else if ($kolom == 3) {
          echo"
          <table>
          <tr>
          <th>Pic 1</th>
          <th>Pic 2</th>
          <th>Pic 3</th>
          </tr>
          <tr>";

          $randomrij = mt_rand(1, 10);
          for ($rij = 1; $rij <= $randomrij; $rij++) {

          echo"<td><img src='" . picmap($locatieplaatjes) . "/" . rollo() . "' class='small' alt='" . rollo() . "'></td>";
          echo"<td><img src='" . picmap($locatieplaatjes) . "/" . rollo() . "' class='small' alt='" . rollo() . "'></td>";
          echo"<td><img src='" . picmap($locatieplaatjes) . "/" . rollo() . "' class='small' alt='" . rollo() . "'></td></tr>";
          }
          echo "</table>";
          }
         */
        echo "<br>Tabel van Bel<br>";
        echo "aantal gegenereerde rijen is: " . $randomrij;

        include 'tempfend.php';

        