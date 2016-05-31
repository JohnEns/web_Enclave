<?php if(login_check($mysqli) == true) { ?>
<h1>Welkom <?php echo htmlentities($_SESSION['username']); ?>!</h1>





<?php
} else { 
        echo 'Je bent niet bevoegd om deze pagina te kunnen zien. Hiervoor moet je ingelogd zijn.';
}
