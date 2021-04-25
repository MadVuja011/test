<?php
require_once('..\Models\Db.php');
//echo "USAO";var_dump($_POST);die;

$name = $_POST["username"];
$comment = $_POST["comment"];
$id = $_POST["id"];

//echo "".$name." - ".$comment." - ".$id."";

class ApproveComment
{
	public $name;
	public $comment;
	public $id;

	public function ApproveCommentDb($name,$comment,$id)
	{
			$db = new Db;
			$table = 'comments';
			$updateDb = $db->Update($table,$name,$comment,$id);


	}
}

$approveComment = new ApproveComment;
$approve = $approveComment->ApproveCommentDb($name,$comment,$id);


?>