<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Lorber
 *
 * @author poehao
 */
class Lorber {

    private $luck;

    public function RandomID() {
        global $db;
        $sql = new SqlBuilder("tekst");
        $sql->select("idtekst");
//        $sql->where('IDTEKST=', 1);
//        $sql->insert("id", 1);        
//        $sql->insert("name", "Lorber");

        $idSQL = $db->exec($sql->toString());

        while ($idCollectie = mysqli_fetch_array($idSQL)) {
            $savedArray[] = $idCollectie [0];
        }

        $luck = $savedArray[array_rand($savedArray)];
//        return $luck;
        return $this->GetText($luck);
    }

    public function GetText($idText) {
        global $db;
        $select = $db->getRow("SELECT    tekst.tekst AS tk, 
                                                tekst.idtekst AS id,
						tekst.Hstukvan AS hv, 
						tekst.Hstuktot AS ht,
                                                tekst.versbegin AS vb,
                                                tekst.verseind AS ve,
                                                boeken.boekennaam AS bk,
                                                boeken.schrijver AS sv,
                                                boeken.boekpic AS pc                                                
                                                FROM tekst
                                                INNER JOIN boeken ON tekst.idtekst = $idText AND tekst.idboeken = boeken.idboeken");


//            $teksthtml = htmlentities($select["tk"]);
//            $printtekst = htmlentities($select["tk"], ENT_SUBSTITUTE, 'UTF-8');
        $printtekst = htmlentities(utf8_decode($select["tk"]));

        if ($select["hv"] == $select["ht"]) {
            echo '<hr><br>Uit het boek ' . $select["bk"] . ', hoofdstuk ' . $select["hv"] . ' vers ' . $select["vb"] . ' tot ' . $select["ve"] . ':<br>';
            echo '<br>' . $printtekst . '<br>';
        } else {
            echo '<hr><br>Uit het boek ' . $select["bk"] . ', hoofdstuk ' . $select["hv"] . ' vers ' . $select["vb"] . ' tot hoofdstuk ' . $select["ht"] . ' vers ' . $select["ve"] . ':<br>';
            echo '<br>' . $printtekst . '<br>';
        }

        if (!empty($select["pc"])) {
            echo "<img src='../../img/lorber/boeken/" . $select["pc"] . "'  class='small' alt='" . $select["pc"] . "'>";
        } else {
            echo "<img src='../../img/lorber/lorber small.jpg' class='small' alt='placeholder'><br><br>";
        }
//            echo 'dit is de id nu    ' . $select['id'];

        $tagused = $db->exec("SELECT teksttag.idtags FROM teksttag WHERE teksttag.idtekst = '" . $select['id'] . "' ");
        if ($tagused->num_rows === 0) {
            echo '<br>Er zijn nog geen tags gelinkt';
        } else {
            echo '<br>dit zijn de tags <br>';
            while ($taglink = mysqli_fetch_array($tagused)) {
//    echo 'dit zijn de tags ' . $taglink["idtags"];
                $tagnames = $db->exec("SELECT tags.tag FROM tags WHERE tags.idtags = '" . $taglink['idtags'] . "' ");

                if ($tagnaam = mysqli_fetch_array($tagnames)) {
                    echo '<b>-' . $tagnaam["tag"] . ' </b>';
                }
            }
        }
    }

    public function LinkTag($PassedID, $PickedTag, $NrChoice) {
        global $db;

        echo 'Picked ID :' . $PickedTag . "<br>";
        IF ($PickedTag == 0) {
            echo '<br> Geen tag gekoppeld op tag ' . $NrChoice . '<br>';
        } else {

            $contrtag = $db->exec("INSERT INTO teksttag(`idtekst`, `idtags`)
			VALUES ('" . $PassedID . "','" . $PickedTag . "')");

            IF ($contrtag) {
                echo "Tag " . $NrChoice . " is gekoppeld aan de tekst!" . "<br />";
            } ELSE {
                echo "Oeps.... Fout bij Tag " . $NrChoice . ": " . mysqli_error();
            }
        }
    }

    public function AddTag($PassedID, $AddedTag, $NrChoice, $Link) {
        include '../connect.php';

        $mycheck = strlen($AddedTag) > 0;
        echo '<br>dit is mijn check ' . $NrChoice . ':' . $mycheck;
        IF ($mycheck === FALSE) {
            echo '<br> Geen nieuwe tag toegevoegd op tag ' . $NrChoice . '<br>';
        } else {
            $addtag1 = mysqli_query($conl, "INSERT INTO tags(`tag`)
			VALUES ('" . $AddedTag . "')");

            IF ($addtag1) {
                echo "<br>Nieuwe tag " . $NrChoice . " is toegevoegd!" . "<br />";

                if ($Link === "1") {
                    $LatestTagID = $conl->insert_id;

                    echo 'passed ID :' . $PassedID . "<br>";
                    echo 'added ID :' . $AddedTag . "<br>";
                    echo 'link :' . $Link . "<br>";

                    $this->LinkTag($PassedID, $LatestTagID, $NrChoice);
                }
            } ELSE {
                echo "<br>Oeps.... Fout bij Nieuwe tag " . $NrChoice . ": " . mysqli_error();
            }
        }
    }

    public function AdTag($AddedTag, $NrChoice) {
        include '../connect.php';

        $mycheck = $AddedTag ? : 0;
        echo '<br>dit is mijn check ' . $NrChoice . ':' . $mycheck;
        IF ($mycheck === 0) {
            echo '<br> Geen nieuwe tag toegevoegd op tag ' . $NrChoice . '<br>';
        } else {
            $addtag1 = mysqli_query($conl, "INSERT INTO tags(`tag`)
			VALUES ('" . $AddedTag . "')");

            IF ($addtag1) {
                echo "<br>Nieuwe tag " . $NrChoice . " is toegevoegd!" . "<br />";
            } ELSE {
                echo "<br>Oeps.... Fout bij Nieuwe tag " . $NrChoice . ": " . mysqli_error();
            }
        }
    }

//    public function testert($param) {
//        $luck = $param * 5;
//        return $luck;
//      }
//    
//    public static $teststatic;
//    public function RoleCheck() {
//        
//    }
//
//    public function GenerateText() {
//                $idSQL = mysqli_query($conl, "SELECT tekst.idtekst AS id FROM tekst");
//        while ($idCollectie = mysqli_fetch_array($idSQL)) {
//            $savedArray[] = $idCollectie [0];
//        }
//
//        $luck = $savedArray[array_rand($savedArray)];
//
//
//    public function __construct($id) {
//        
//    }
//
//    private $bookContent = "";
//
//    public function GetSynopsis() {
//        
//    }
//
//    public static function GetDailyText() {
// }
}

class John {

    public function RoleCheck() {
// Instantie van class aanmaken
        $lorber = new Lorber(5);
        $lorber2 = new Lorber(6);
        $john = new John();

        $lorber->GetDailyText();


// Functies uit class instances aanroepen
        $lorber->GetSynopsis();
        $lorber2->GetSynopsis();
        $john->RoleCheck();



// Een static function (=geen instantie aka voor alle class instanties gelijk)
//        Lorber::GetDailyText();
//<input type="checkbox" id="checkbox1"><label forid="checkbox1">Tag 1</label>
    }

}
