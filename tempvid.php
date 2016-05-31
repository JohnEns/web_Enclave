<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="description"
              content="Game Gaming Gear" />
        <meta name="keywords"
              content="gaming, game, opinion, pc, console, playstation, xbox" />
              <?php
              echo "<title>" . $title . "</title>";
              include_once 'includes/db_connect.php';
              include_once 'includes/functions.php';
              sec_session_start(); 
              ?>
        <link href="css/styles.css" type="text/css" rel="stylesheet" />
        <link rel="icon" type="image/png" href="img/opmaak/icon-32.png" sizes="32x32" />
        <link rel="icon" type="image/png" href="img/opmaak/icon-16.png" sizes="16x16" />
       
        <script type="text/JavaScript" src="js/sha512.js"></script> 
        <script type="text/JavaScript" src="js/forms.js"></script>
 

</head>
<body>
    <div id="content-wrapper">
        <header>
            <nav id="main-navigation">
                <h2 id="kop">Enclave - Games, Gaming, Gear</h2>
                
                <?php if (login_check($mysqli) == true) { ?>
                    <p id="login"><?php echo htmlentities($_SESSION['username']); ?><a href="includes/logout.php"> Uitloggen</a></p>
                <?php } else { ?>
                    <p id="login"><a href="inlog.php">Inloggen</a></p> <?php } ?>
                    
                <ul id="headmenu">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="reviews.php">Reviews</a></li>
                    <li><a href="videos.php">Videos</a></li>
                    <li><a href="nieuws.php">Nieuws</a></li>
                    <li><a href="database/lorber/dagtekst.php">Database</a></li>
                    <li><a href="about.php">Over ons</a></li>
                    <li><a href="font.php">Fontys</a></li>
                </ul>
            </nav> 
        </header>

        <section id="main-content">
            <aside id="left-side-bar">
                    <ul id="side-bar">
                        <li>Inhoud Video's</li>
                        <li>	<a href="#bastion">Bastion</a><br /></li>
                        <li>	<a href="#karma">Karmaflow in Concert</a><br /></li>
                        <li>	<a href="#grid">Grid</a><br /></li>
                        <li>	<a href="#puzq">Puzzle Quest 2</a><br /></li>
                        <li>	<a href="#boven">-Naar Boven-</a><br /></li>
                        <hr>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="inlog.php">Inloggen</a></li>
                        <li><a href="reviews.php">Reviews</a></li>
                        <li><a href="videos.php">Videos</a></li>
                        <li><a href="nieuws.php">Nieuws</a></li>
                        <li><a href="database/lorber/dagtekst.php">Database</a></li>
                        <li><a href="about.php">Over ons</a></li>

                        <li><a href="font.php">Fontys</a></li>
                    </ul>
                </aside>




            <main>	