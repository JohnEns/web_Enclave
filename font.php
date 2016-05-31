<?php
$pagina = basename(__FILE__);
$title = "Enclave - Fontys";

include 'temp.php';
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
?>
<?php if(login_check($mysqli) == true) { ?>
<h1>Welkom <?php echo htmlentities($_SESSION['username']); ?>!</h1>


                    <article>
                        <div class="opdracht">
                            <h1> De wekelijkse opdrachten voor Fontys</h1>
                            <h2>Basis PHP Week 4</h2>
                            <ul>
                                <li><a href="fontys/opdr1.php">Opdracht 1 t/m 4</a></li>
                                <li><a href="fontys/opdr5a.php">Opdracht 5a</a></li>
                                <li><a href="fontys/opdr5b.php">Opdracht 5b</a></li>    
                                <li><a href="fontys/opdr6.php">Opdracht 6 en 7</a></li>
                                <li><a href="fontys/opdr8.php">Opdracht 8</a></li>    
                            </ul>
                            <hr />
                        </div>
                        <div class="opdracht">
                            <h2>Basis PHP Week 5</h2>
                            <ul>
                                <li><a href="fontys/opdr9.php">Opdracht 9 t/m 11</a></li>
                                <li><a href="fontys/opdr12.php">Opdracht 12</a></li>
                                <li><a href="fontys/opdr13.php">Opdracht 13</a></li>    
                                <li><a href="fontys/opdr14.php">Opdracht 14</a></li>

                            </ul>
                            <hr />
                        </div>
                    </article>
                    <article>
                        <div class="opdracht">
                            <h2>Basis PHP Week 6</h2>
                            <ul>
                                <li><a href="fontys/opdr15.php">Opdracht 15 en 16</a></li>
                                <li><a href="fontys/opdr15tr.php">Opdracht 15 Tristan</a></li> 
                                <li><a href="fontys/opdr17.php">Opdracht 17</a></li>
                                <li><a href="fontys/opdr18.php">Opdracht 18</a></li>
                                <li><a href="fontys/opdr19.php">Opdracht 19</a></li>
                                <li><a href="fontys/opdr20.php">Opdracht 20</a></li>
                                <li><a href="fontys/opdr20 - 2.php">Opdracht 20 - variatie</a></li>
                                <li><a href="fontys/testert.php">Testert</a></li>

                            </ul>
                            <hr />
                        </div>
                        <div class="opdracht">
                            <h2>Basis PHP Week 7</h2>
                            <ul>
                                  <li><a href="fontys/opdr21.php">Opdracht 21</a></li>
                                  <li><a href="fontys/opdr22.php">Opdracht 22</a></li>
                                  <li><a href="fontys/opdr23.php">Opdracht 23</a></li>
                                  <li><a href="fontys/opdr24.php">Opdracht 24</a></li>
                                  <li><a href="fontys/opdr25.php">Opdracht 25</a></li>
                                  
                            </ul>
                        </div>
                    </article>
                    <article>
                        <div class="opdracht">
                            <h2>Basis PHP Week 8</h2>
                             <ul>
                                  <li><a href="fontys/opdr26.php">Opdracht 26</a></li>
                                  <li><a href="doom.php">Spelletje</a></li>
                                  
                            </ul>
                        </div>
                    </article>
 <?php
} else {
    ?> <article class="itemprt"> <?php
    echo 'Je bent niet bevoegd om deze pagina te kunnen zien. Hiervoor moet je ingelogd zijn.</article>';
    
}
include 'tempend.php';
?>
