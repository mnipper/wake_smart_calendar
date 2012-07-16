<?php
include 'view/View.php';

$active = $_GET['active'];

$view = new View();
$view->header();
$view->sidebar($active);
if (strcmp($active, '') == 0)
    $view->herobox();
$view->displayEvents();
$view->footer();

?>
