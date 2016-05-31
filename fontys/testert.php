<?php
$pagina = basename(__FILE__);

function __autoload($class) {
    include_once $class . ".php";
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
        <h1>Opdracht - </h1>
        <h2>Opgave</h2>   
        <p></p>
        <ol>
            <li></li>
            <li></li>
        </ol>
        <h2>Uitwerking</h2>
<?php
$model = new Model();
$controller = new Controller($model);
$view = new View($controller, $model);

if (isset($_GET['action']) && !empty($_GET['action']))
{
$controller = $controller->$_GET['action']();
}

echo $view->output();

include 'tempfend.php';

