<?php
require_once('.\mvc\Controllers\Controller.php');
require_once('.\mvc\Controllers\ListCommentsCont.php');

//$index = Controller::createView('home');
//echo $index;die;

$controller = new Controller;
$fetch = $controller->fetchData('index');

$comments = new ListCommentsCont;
$listComments = $comments->fetchComments('comments');
//echo ($fetch);
?>

<?php include('.\mvc\Views\header.php'); ?>
<?php include('.\mvc\Views\css.php'); ?>
<?= $fetch ?>
<?= $listComments ?>
<?php include('.\mvc\Views\newComment.php'); ?>
<?php include('.\mvc\Views\admin.php'); ?>
<?php include('.\mvc\Views\footer.php'); ?>

