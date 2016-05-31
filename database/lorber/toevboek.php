<?php
$pagina = basename(__FILE__);
$title = "Lorber - Toevoegen Boek";
include '../inc.php';
include '../templ.php';

?>

<?php
$template_security_url = "../templsc.php";
$template_sysop_url = "../templsy.php";
$login_redirect_url = "dagtekst.php";

if (login_check($mysqli) == true) {
   $tst = rlck($mysqli);
   
           switch ($tst) {
            case 1:
                include $template_security_url;
                break;

            case 2:
                include $template_sysop_url;
             break;

            default :
               header("refresh:1;url=" + $login_redirect_url);
        }?>
<h2 style="text-align:center"> Toevoegen Boek </h2>

<p>Welcome <?php echo htmlentities($_SESSION['username']); ?>!</p>

<?php
//***************************************************************************************************************

//    if (isset($_FILES["bkpic"])) {
if (empty($_FILES['bkpic']['name'])) {
    // No file was selected for upload, your (re)action goes here

         echo 'geen plaatje toegevoegd op de sexy manier<br>' ;
 
         foreach($_FILES as $file){
  echo 'inhoud superglobal files: ' .$file['name']; 
}

} else {
    
$target_dir = "../../img/lorber/boeken/";
$target_file = $target_dir . basename($_FILES["bkpic"]["name"]);
echo "-". $target_file . "-";
$uploadOk = 1;
$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["bkpic"]["tmp_name"]);
    if ($check !== false) {
        echo "<br>File is an image - " . $check["mime"] . ".<br>";
        $uploadOk = 1;
    } else {
        echo "<br>File is not an image.<br>";
        $uploadOk = 0;
    }
}

// Check if file already exists
if (file_exists($target_file)) {
    echo "<br>Sorry, file already exists.<br>";
    $uploadOk = 0;
}

// Check file size
if ($_FILES["bkpic"]["size"] > 500000) {
    echo "<br>Sorry, your file is too large.<br>";
    $uploadOk = 0;
}

// Allow certain file formats
if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
    echo "<br>Sorry, only JPG, JPEG, PNG & GIF files are allowed.<br>";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "<br>Sorry, your file was not uploaded.<br>";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["bkpic"]["tmp_name"], $target_file)) {
        echo "<br>The file " . basename($_FILES["bkpic"]["name"]) . " has been uploaded.<br>";
    } else {
        echo "<br>Sorry, there was an error uploading your file.<br>";
    }
//Display pic
    if ($uploadOk = 1) {
        $namepic = basename($_FILES["bkpic"]["name"]);
//   $namepic ="uploadpics/" . basename( $_FILES["bkpic"]["name"]);

//        echo "<br><img src=" . $target_dir . $namepic . " class='medium' alt='" . $namepic . "' />";
        echo "<img src='../../img/lorber/boeken/" . $namepic . "'  class='small' alt='" . $namepic . "'>";

        echo '<br>namepic is : ' . $namepic . '<br>';
        
        IF ($_POST["pc"]==0){
            $_POST["pc"]= $namepic ;
} else {
        $_POST["pc"]= "lorber small.jpg" ;
        echo '<br>geen plaatje toegevoegd op de sexy manier<br>';
        
    }
}}}

//khkrkuerheiurherklnherkhireukfhnirhwiurrw***************************************************************************

$chck = mysqli_query($conl, "INSERT INTO boeken(`boekennaam`, `boekpic`, `boekeninfo`, `verschijndata`, `schrijver`, `ISBN`, `ISBN-10`)
			VALUES ('" . $_POST["bn"] . "','" . $_POST["pc"] . "','" . $_POST["in"] . "','" . $_POST["dt"] . "','" . $_POST["sv"] . "','" . $_POST["is"] . "','" . $_POST["ib"] . "')");



IF ($chck) {
    echo "Boek toegevoegd!" . "<br />";
    $idgrab = $conl->insert_id;
} ELSE {
    echo "Ai! Sorry... Foutmelding:" . mysql_error();
}

$Boeken = mysqli_query($conl, "SELECT * FROM boeken");


echo " Boekenlijst";
echo "<table border='2'>
<tr>
<th>id</th>
 <th>Boekennaam</th>
 <th>Boekeninfo</th>
 <th>Schrijver</th>
 <th width='250px'>Plaatje</th>
 </tr>";

WHILE ($boek = mysqli_fetch_array($Boeken)) {
    echo '<tr><td>' . $boek['idboeken'] . '</td>

  <td>' . $boek["boekennaam"] . '</td> 
  <td>' . $boek["boekeninfo"] . '</td>
  <td>' . $boek["schrijver"] . '</td> 
  <td>' . "<img src='../../img/lorber/boeken/" . $boek["boekpic"] . "'  class='small' alt='" . $boek["boekpic"] . "'>" . '</td></tr> ';
}

echo "</table>";
} else {
    ?> <article class="itemprt"> <?php
    echo 'Je bent niet bevoegd om deze pagina te kunnen zien. Hiervoor moet je ingelogd zijn.';
}
include '../templends.php';
?>
<!--
<td><img src="'"../../img/lorber/boeken/" . $boek["boekpic"] . "'  class='small' alt='" . $boek["boekpic"] . "'>"'</td> 