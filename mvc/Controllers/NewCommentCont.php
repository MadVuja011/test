<?php
require_once('..\Models\Db.php');

$name = $_POST['name'];
$comment = $_POST['comment'];
$ip = $_SERVER['REMOTE_ADDR'];

//echo $ip;die;

class NewCommentCont
{
     public $name;
	 public $comment;
	 public $ip_address;

	 public function sendNewComment($name,$comment,$ip_address)
	 {
	        $db = new Db;
			$table = 'comments';
			$insertToDb = $db->Insert($table,$name,$comment,$ip_address);

			//var_dump($insertToDb);die;
			
			//$createView = $this->sendCommToList($checkDb);
			//var_dump($createView);die;

			return($insertToDb);
	 }

}

$new = new NewCommentCont;
$insertNewComment = $new->sendNewComment($name,$comment,$ip);

?>