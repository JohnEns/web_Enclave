<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="description"
              content="Game Gaming Gear" />
        <meta name="keywords"
              content="gaming, game, opinion, pc, console, playstation, xbox" />
        <title>Enclave Gaming</title>
        <link href="css/styles.css" type="text/css" rel="stylesheet" />

    </head>
    <body>
        <div id="content-wrapper">
            <header>
                <nav id="main-navigation">
                    <h2 id="kop">Enclave - Games, Gaming, Gear</h2>

                    <ul id="headmenu">

                        <li><a href="index.html">Home</a></li>
                        <li><a href="reviews.html">Reviews</a></li>
                        <li><a href="videos.html">Videos</a></li>
                        <li><a href="nieuws.html">Nieuws</a></li>
                        <li><a href="blog.html">Blog</a></li>
                        <li><a href="opdracht.php">Fontys</a></li>
                    </ul>
                </nav>
            </header>

            <section id="main-content">
                <aside id="left-side-bar">
                    <ul id="side-bar">
                        <li><a href="index.html">Home</a></li>
                        <li><a href="reviews.html">Reviews</a></li>
                        <li><a href="videos.html">Videos</a></li>
                        <li><a href="nieuws.html">Nieuws</a></li>
                        <li><a href="blog.html">Blog</a></li>

                    </ul>
                </aside>


                <main>
                    <p>
                        
                        <h1>Opdracht 1 - Hoi</h1><br/></html>
                        <?php
                        echo "Hello World<br>";
                        echo "<br>";
                        ?><html><h1>Opdracht 2 - Lerdorf</h1><br/></html><?php
                        
                        $makerPHP = "Rasmus Lerdorf is de maker van \"PHP\". Hij ontwikkelde deze \"server-side	scripttaal\" in 1994.<br>";

                        echo $makerPHP . "<br>";
                        echo "aantal tekens in deze zin: " . strlen($makerPHP) . "<br>";
                        echo "In hoofdletters wordt het: " . strtoupper($makerPHP) . "<br>";
                        echo "<br>";
                        ?><html><h1>Opdracht 3 - Temperatuur</h1><br/></html><?php
                        
                        $temperatuur = 4;

                        if ($temperatuur <= 0) {
                            echo " Het vriest!";
                        } else if ($temperatuur < -273.15) {
                            echo"Dat kan niet";
                        } else if ($temperatuur < 15 and $temperatuur > 0) {
                            echo"Beetje koud";
                        } else if ($temperatuur > 15) {
                            echo"Prima weer!";
                        } else if ($temperatuur > 30) {
                            echo"Heet!";
                        }

                        echo "<br>";

                        echo "<br>";
                        ?><html><h1>Opdracht 4 - De maanden</h1><br/></html><?php
                        
                        $maandnummer = "3";

                        switch ($maandnummer) {
                            case "1":
                                echo "januari";
                                break;
                            case "2":
                                echo "februari";
                                break;
                            case "3":
                                echo "maart";
                                break;
                            case "4":
                                echo "april";
                                break;
                            case "5":
                                echo "mei";
                                break;
                            case "6":
                                echo "juni";
                                break;
                            case "7":
                                echo "juli";
                                break;
                            case "8":
                                echo "augustus";
                                break;
                            case "9":
                                echo "september";
                                break;
                            case "10":
                                echo "oktober";
                                break;
                            case "11":
                                echo "november";
                                break;
                            case "12":
                                echo "december";
                                break;
                            default:
                                echo "je maand kan niet worden bepaald.";
                        } echo "<br>";

                        echo "<br>";
                        ?><html><h1>Opdracht 5a - Lettergrootte</h1><br/></html><?php
                        

//for ($x = 0; $x <= 10; $x++) {
//    echo "The number is: $x <br>";
//}


                        for ($fnt = 10; $fnt <= 100; $fnt++) {
                            echo "The font is: $fnt <br>";
                            ?><html><p style="font-size:<?php echo $fnt ?>px">Hello World</font><br/><p></html>

                        <?php
                        echo "<br>";
                    }
                    echo "<br>";
                    ?><html><h1>Inverse opdracht 5b - Lettergrootte</h1><br/></html><?php
                    


                    for ($fnt = 100; $fnt >= 10; $fnt--) {
                        echo "The font is: $fnt <br>";
                        ?>                        <html>

                            <p style="font-size:<?php echo $fnt ?>px">Hello World</font><br/><p></html>

                        <?php
                        echo "<br>";
                    }

                    ?><html><h1>Opdracht 6 - Tafel van 3</h1><br/></html><?php
                    
                    $zoup = 0;

                    while ($zoup <= 25) {
                        echo "De multiplier is: $zoup <br>";
                        echo "$zoup x 3 = ";
                        echo $zoup * 3;
                        echo "<br>";
                        $zoup++;
                        echo "<br>";
                    }

                    ?><html><h1>Opdracht 7 - Week Array</h1><br/></html><?php
                    
                    $dagen = array("zondag", "maandag", "dinsdag", "woensdag", "donderdag", "vrijdag", "zaterdag");
                    $dagnummer = 5;
                    echo "Het is vandaag $dagen[$dagnummer]<br>";
                    echo "<br>";

                    ?><html><h1>Opdracht 8 - Uitdaging</h1><br/></html><?php
                    
                    $uit['Mobo'] = 325;
                    $uit['Graka'] = 435.33;
                    $uit['Kast'] = 169.5;
                    $uit['Proc'] = 389.99;
                    $uit['RAM'] = 125;
                    $uit['SSD'] = 155.26;

                    foreach ($uit as $x => $x_value) {
                        echo "Product = " . $x . ", Prijs = " . $x_value;
                        echo "<br>";
                    }
                    echo "<br>";
                    echo "We gaan een stapje verder. <br>";
                    $totaal = 0;
                    foreach ($uit as $x => $x_value) {
                        $totaal = $totaal + $x_value;
                        echo "Totale prijs is $totaal";
                        echo "<br>";
                    }
                    echo "<br>";

                    $uit['PSX'] = 112;
                    asort($uit);
                    echo "Gesorteerd en aangevuld<br>";
                    foreach ($uit as $x => $x_value) {
                        echo "Product = " . $x . ", Prijs = " . $x_value;
                        echo "<br>";
                    }
                    echo "<br>";


//                    $items = 4;
//
//                    if ($items > 5) {
//                        echo" je korting is 10%!";
//                    } else {
//                        echo"je korting is 5%!";
//                    }
//                    
                    ?>
                    <html>
                        </p>

                </main>
            </section>
            <footer>
                <nav>
                    <ul id="footer-menu">
                        <li><a href="mailto:PoeHaoSan@gmail.com">Contact</a></li>
                        <li><a href="https://www.youtube.com/user/PoeHaoSan" target="_blank">YouTube</a></li>
                        <li><a href="https://twitter.com/PoeHao" target="_blank">Twitter</a></li>
                        <li><a href="https://www.facebook.com/Poe.Hao.San" target="_blank">Facebook</a></li>
                        <li><a href="http://frontpage.fok.nl/games" target="_blank">Fok-Games</a></li>

                    </ul>
                    <p>These links take you away</p>
                </nav>
                <div class="copyright-notice">&copy; 2015 PoeHao-San</div>
            </footer>
        </div>
    </body>
</html>