<?php
$pagina = basename(__FILE__);
$title = "Enclave - Spelletje";

include 'temp.php';
?>


<!--                    <object width="100" height="100">
                        <param name="game" value="game/bricks-squasher_v929228/arkanoid.swf">
                        <embed src="game/bricks-squasher_v929228/arkanoid.swf" width="500" height="400">

                        </embed>
                    </object>
                    <div class="gameplayer" data-sub="cdn" data-width="600" data-height="440" data-gid="576742227280294236"></div>
                    <script>
                        (function (d, s, id) {
                            var js, fjs = d.getElementsByTagName(s)[0];
                            if (d.getElementById(id))
                                return;
                            js = d.createElement(s);
                            js.id = id;
                            js.src = 'http://cdn.gameplayer.io/api/js/publisher.js';
                            fjs.parentNode.insertBefore(js, fjs);
                        }(document, 'script', 'gameplayer-publisher'));
                    </script>-->
                    <div class="gameplayer" data-sub="cdn" data-width="440" data-height="660" data-gid="576742227280295243"></div>
                    <p>Op een site als deze mag een spelletje niet ontbreken. Geniet!</p>
                    <script>
                        (function (d, s, id) {
                            var js, fjs = d.getElementsByTagName(s)[0];
                            if (d.getElementById(id))
                                return;
                            js = d.createElement(s);
                            js.id = id;
                            js.src = 'http://cdn.gameplayer.io/api/js/publisher.js';
                            fjs.parentNode.insertBefore(js, fjs);
                        }(document, 'script', 'gameplayer-publisher'));
                    </script>


<?php
include 'tempend.php';
?>
