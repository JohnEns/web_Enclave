<?php
$pagina = basename(__FILE__);
$title = "Lorber - Toevoegen Tekst";
include '../inc.php';
include '../templ.php';

?>

<?php
if (login_check($mysqli) == true) {
   $tst = rlck($mysqli);
   
           switch ($tst) {
            case 1:
                header("refresh:2;url=dagtekst.php");
                break;

            case 2:
                include '../templsy.php';
             break;

            default :
               header("refresh:2;url=dagtekst.php");
        }?>

<h2 style="text-align:center"> Toevoegen Tekst </h2>

<p>Welcome <?php echo htmlentities($_SESSION['username']); ?>!</p>

<?php
//echo'-->'.$_POST["mijnkeuze"];
/*
  $check = mysql_query("INSERT INTO Leerling(`Voornaam`, `Achternaam`, `Adres`,`ZelfRef`)
  VALUES ('".$_POST["vn"]."','".$_POST["an"]."','".$_POST["ad"]."','".$zr."')");
 */
$tekstc = htmlentities($_POST["tk"], ENT_QUOTES);
//echo $tekstc;

$test = 'test';

$check = mysqli_query($conl, "INSERT INTO tekst(`idboeken`, `Hstukvan`, `versbegin`, `Hstuktot`, `verseind`, `tekst`)
			VALUES ('" . $_POST["mijnkeuze"] . "','" . $_POST["hv"] . "','" . $_POST["vb"] . "','" . $_POST["ht"] . "','" . $_POST["ve"] . "','" . $tekstc  . "')");

//$check = mysqli_query($conl, "INSERT INTO tekst(`idboeken`, `Hstukvan`, `versbegin`, `Hstuktot`, `verseind`, `tekst`)
//			VALUES ('".$_POST["mijnkeuze"]."','".$_POST["hv"]."','".$_POST["vb"]."','".$_POST["ht"]."','".$_POST["ve"]."','". $_POST["tk"] ."')");
//
//$check = mysqli_query($conl, "INSERT INTO tekst(`idboeken`)
//			VALUES ('".$_POST["mijnkeuze"]."');


IF ($check) {
    echo "Tekst toegevoegd!" . "<br />";
} ELSE {
    echo "Ai! Sorry... Foutmelding:" . mysqli_error($conl);
}

$idgrab = $conl->insert_id;
echo 'idgrab is: ' . $idgrab;

$tekst = mysqli_query($conl, "SELECT    tekst.tekst AS tk, 
						tekst.Hstukvan AS hv, 
						tekst.Hstuktot AS ht,
                                                tekst.versbegin AS vb,
                                                tekst.verseind AS ve,
                                                boeken.boekennaam AS bk,
                                                boeken.schrijver AS sv
                                                
                                                FROM tekst,boeken
						WHERE tekst.idboeken = boeken.idboeken AND tekst.idtekst = $idgrab");

//        $keuze = $conl->query($tekst);

while ($select = mysqli_fetch_array($tekst)) {
    if ($select["hv"] = $select["ht"]) {
        echo '<hr><br>Uit het boek ' . $select["bk"] . ', hoofdstuk ' . $select["hv"] . ' vers ' . $select["vb"] . ' tot ' . $select["ve"] . ':<br>';
        echo '<br>' . $select["tk"] . '<br>';
    } else {
        echo '<hr><br>Uit het boek ' . $select["bk"] . ', hoofdstuk ' . $select["hv"] . ' vers ' . $select["vb"] . ' tot hoofdstuk ' . $select["ht"] . ' vers ' . $select["ve"] . ':<br>';
        echo '<br>' . $select["tk"] . '<br>';
    }
    if (isset($select["pc"])) {
        echo "<img src='../../img/lorber/boeken/" . $select["pc"] . "'  class='small' alt='" . $select["pc"] . "'>";
    }
}
/*

  WHILE ($leer = mysql_fetch_array($leerling))
  {
  echo

  }
 */
} else {
    ?> <article class="itemprt"> <?php
    echo 'Je bent niet bevoegd om deze pagina te kunnen zien. Hiervoor moet je ingelogd zijn.';
}
include '../templends.php';
?>
