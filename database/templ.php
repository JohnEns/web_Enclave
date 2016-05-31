<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" >
        <meta name="description" content="Game Gaming Gear" >
        <meta name="keywords" content="lorber, jakob, nieuwe openbaring, johannes, evangelie, stiermarken" />
        <?php
        echo "<title>" . $title . "</title>";
        include_once '../../includes/db_connect.php';
        include_once '../../includes/functions.php';
        sec_session_start();
        ?>
        <link href="../../css/styles.css" type="text/css" rel="stylesheet" />
        <link rel="icon" type="image/png" href="../../img/opmaak/licon-32.png" sizes="32x32" />
        <link rel="icon" type="image/png" href="../../img/opmaak/licon-16.png" sizes="16x16" />
        <script src="enclave.js" type="text/javascript"></script>
        <script type="text/JavaScript" src="js/sha512.js"></script> 
        <script type="text/JavaScript" src="js/forms.js"></script>
    </head>

    <?php
//Local db connection
//include("connect.php"); 
//Remote db connection
    include("../connect.php");
    ?>    

    <body>
        <div id="content-wrapper">
            <header>
                <nav id="main-navigation-data">
                    <h2 id="kop">Enclave - Database</h2>
                    <?php if (login_check($mysqli) == true) { ?>
                        <p id="login"><?php echo htmlentities($_SESSION['username']); ?><a href="../../includes/logout.php"> Uitloggen</a></p>
                    <?php } else { ?>
                        <p id="login"><a href="../../inlog.php">Inloggen</a></p> <?php } ?>

                    <ul id="headmenu">
                        <li><a href="../../index.php">Home</a></li>
                        <li><a href="../../reviews.php">Reviews</a></li>
                        <li><a href="../../videos.php">Videos</a></li>
                        <li><a href="../../nieuws.php">Nieuws</a></li>
                        <li><a href="dagtekst.php">Lorber Database</a></li>
                        <li><a href="../../about.php">Over ons</a></li>
                        <li><a href="../../font.php">Fontys</a></li>
                    </ul>
                </nav> 
            </header>

            <section id="main-content">
                <aside id="left-side-bar">

                    <ul id="side-bar">


                        <li>
                            <a href="dagtekst.php">DAGTEKST</a><br>
                            <a href="boeklijst.php">Boekenlijst</a><br>

                        </li>
                        <li><hr/></li>
                        <li><a href="../../index.php">Home</a></li>
                        <li><a href="../../reviews.php">Reviews</a></li>
                        <li><a href="../../videos.php">Videos</a></li>
                        <li><a href="../../nieuws.php">Nieuws</a></li>
                        <li><a href="dagtekst.php">Lorber Database</a></li>
                        <li><a href="../../about.php">Over ons</a></li>
                        <li><a href="../../font.php">Fontys</a></li>
                    </ul>
                </aside>



                <main>	
                    <button onclick="document.location.reload(true);">Ververs de pagina</button><br>
                    <h1>Werken van Jakob Lorber</h1>
