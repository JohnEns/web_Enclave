<?php
$pagina = basename(__FILE__);

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
    $functievang = mt_rand(2, $aantalpics);
    $plaatje = $plaatjesdump[$functievang];
    return $plaatje;
}

/* function:  generates thumbnail */

//function make_thumb($src, $dest, $desired_width) {
//    /* read the source image */
//    $source_image = imagecreatefromjpeg($src);
//    $width = imagesx($source_image);
//    $height = imagesy($source_image);
//    /* find the "desired height" of this thumbnail, relative to the desired width  */
//    $desired_height = floor($height * ($desired_width / $width));
//    /* create a new, "virtual" image */
//    $virtual_image = imagecreatetruecolor($desired_width, $desired_height);
//    /* copy source image at a resized size */
//    imagecopyresized($virtual_image, $source_image, 0, 0, 0, 0, $desired_width, $desired_height, $width, $height);
//    /* create the physical thumbnail image to its destination */
//    imagejpeg($virtual_image, $dest);
//}

function make_thumb($src, $dest, $desired_width) {

    /* read the source image */
    $source_image = imagecreatefromjpeg($src);
    $width = imagesx($source_image);
    $height = imagesy($source_image);

    /* find the "desired height" of this thumbnail, relative to the desired width  */
    $desired_height = floor($height * ($desired_width / $width));

    /* create a new, "virtual" image */
    $virtual_image = imagecreatetruecolor($desired_width, $desired_height);

    /* copy source image at a resized size */
    imagecopyresampled($virtual_image, $source_image, 0, 0, 0, 0, $desired_width, $desired_height, $width, $height);

    /* create the physical thumbnail image to its destination */
    imagejpeg($virtual_image, $dest);
}

/* function:  returns files from dir */

function get_files($images_dir, $exts = array('jpg')) {
    $files = array();
    if ($handle = opendir($images_dir)) {
        while (false !== ($file = readdir($handle))) {
            $extension = strtolower(get_file_extension($file));
            if ($extension && in_array($extension, $exts)) {
                $files[] = $file;
            }
        }
        closedir($handle);
    }
    return $files;
}

/* function:  returns a file's extension */

function get_file_extension($file_name) {
    return substr(strrchr($file_name, '.'), 1);
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
        <h1>Opdracht 24 - Fotoviewer</h1>
        <h2>Opgave</h2>   
        <p></p>
        <ol>
            <li>a) Laat	alle	foto’s	uit	de	map	met	foto’s	als	thumbnail zien.	Laat	de	
                map	.	en	..	niet	zien.</li>
            <li>b) Als	er	op	een	thumbnail wordt	geklikt, dan	wordt	de	foto	in	het	
                groot	vertoond	naast	of	onder	de	thumbnail. Tip:	stuur	de	naam	
                van	de	foto	mee	in	de	URL	bijvoorbeeld	
                fotoviewer.php?foto=bloem.jpg.</li>
            <li>c) Zorg	met	CSS	voor	een	mooie	opmaak	van	de	fotoviewer.</li>
        </ol>
        <h2>Uitwerking</h2>
        <div id="photoviewer">
            <?php
            /** settings * */
            $images_dir = '../img/pic-collection/';
            $thumbs_dir = '../img/pic-collection/thumbs/';
            $thumbs_width = 200;
            $images_per_row = 3;

            /** generate photo gallery * */
            $image_files = get_files($images_dir);
            if (count($image_files)) {
                $index = 0;
                foreach ($image_files as $index => $file) {
                    $index++;
                    $thumbnail_image = $thumbs_dir . $file;
                    if (!file_exists($thumbnail_image)) {
                        $extension = get_file_extension($thumbnail_image);
                        if ($extension) {
                            make_thumb($images_dir . $file, $thumbnail_image, $thumbs_width);
                        }
                    }
                    echo '<a href="', $images_dir . $file, '" class="photo-link smoothbox" rel="gallery"><img src="' . $thumbnail_image . '" /></a>';
                    if ($index % $images_per_row == 0) {
                        echo '<div class="clear"></div>';
                    }
                }
                echo '<div class="clear"></div>';
            } else {
                echo '<p>There are no images in this gallery.</p>';
            }
            ?>
        </div>    

        <?php
        include 'tempfend.php';

        