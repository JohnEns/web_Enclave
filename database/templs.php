<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Game Gaming Gear" />
        <meta name="keywords" content="lorber, jakob, nieuwe openbaring, johannes, evangelie, stiermarken" />
        <title>Werken van Lorber</title>
        <link href="../../css/styles.css" type="text/css" rel="stylesheet" />
        <link rel="icon" type="image/png" href="../../img/opmaak/licon-32.png" sizes="32x32" />
        <link rel="icon" type="image/png" href="../../img/opmaak/licon-16.png" sizes="16x16" />
        <script src="enclave.js" type="text/javascript"></script>
        <script type="text/JavaScript" src="js/sha512.js"></script> 
        <script type="text/JavaScript" src="js/forms.js"></script>
    </head>
    
<?php 
//Local db connection
include("../connect.php");

//Athena db connection
//include("../connect.php");

//Connect with login database
include("../../includes/db_connect.php"); 
include("../../includes/functions.php"); 



?>    
    
    <body>
        <div id="content-wrapper">
            <header>
                <nav id="main-navigation-data">
                    <h2 id="kop">Enclave - Games, Gaming, Gear</h2>

                    <ul id="headmenu">
                        <li><a href="../../index.php">Home</a></li>
                        <li><a href="../../reviews.php">Reviews</a></li>
                        <li><a href="../../videos.php">Videos</a></li>
                        <li><a href="../../nieuws.php">Nieuws</a></li>
                        <li><a href="../../blog.php">Blog</a></li>
                        <li><a href="../../about.php">Over ons</a></li>
                        <li><a href="../../font.php">Fontys</a></li>
                    </ul>
                </nav> 
            </header>

            <section id="main-content">
                <aside id="left-side-bar">

                    <ul id="side-bar">


                        <li><a href="index.php">Home Lorber</a><br>
                            <a href="dagtekst.php">DAGTEKST</a><br>
                            <a href="zoek.php">Zoeken</a><br>
                            <a href="toetekst.php">Tekst toevoegen</a><br>
                            <a href="toeboek.php">Boek toevoegen</a><br>
                            <a href="boeklijst.php">Boekenlijst</a><br>
                            <a href="taglijst.php">Taglijst</a><br>
                            <!--                            <a href="toeinstr.php">Instructeur toevoegen</a><br>
                                                        <a href="toemen.php">Mentor toevoegen</a><br>
                                                        <a href="bekijkleer.php">Leerlingen Overzicht</a><br>
                                                        <a href="leskaart.php">Les toevoegen</a><br>
                            -->
                        </li>
                        <li><hr/></li>
                        <li><a href="../../index.php">Home</a></li>
                        <li><a href="../../reviews.php">Reviews</a></li>
                        <li><a href="../../videos.php">Videos</a></li>
                        <li><a href="../../nieuws.php">Nieuws</a></li>
                        <li><a href="../../blog.php">Blog</a></li>
                        <li><a href="../../about.php">Over ons</a></li>
                        <li><a href="../../font.php">Fontys</a></li>
                    </ul>
                </aside>



                <main>	
                    <button onclick="document.location.reload(true);">Ververs de pagina</button><br>
                    <h1>Werken van Jakob Lorber</h1>
                    
                    
<?php
sec_session_start(); 


