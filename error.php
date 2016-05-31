<?php
$pagina = basename(__FILE__);
$title = "Enclave - Foutmelding";

$error = filter_input(INPUT_GET, 'err', $filter = FILTER_SANITIZE_STRING);

if (!$error) {
    $error = 'Aiaiaia! Er ging iets fout en ik heb geen flauw idee wat dat was. Sorry.';
}

include 'temp.html';
?>
<article class="item">
    <h1>Er is een probleem. Dit is geen grap.</h1>
    <p class="error"><?php echo $error; ?></p>  

</article>
<?php
include 'tempend.php';
?>
