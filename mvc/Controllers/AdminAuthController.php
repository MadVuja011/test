<?php
require_once('..\Models\Db.php');
require_once('..\Views\adminPanel.php');

$username = $_POST['username'];
$password = $_POST['password'];
//$ip - for logging

class AdminAuth
{
	public $username;
	public $password;

	public function Authorize($username,$password)
	{
		$db = new Db;
		$table = 'users';
		$columns = 'username,password';
		$where = "WHERE role = 'admin' and username = '".$username."' and password = PASSWORD('".$password."')";
		$checkAdmin = $db->Read($table,$columns,$where);

		if($checkAdmin==='OK')
		{
		      $goAdmin = new Admin;   
			  $amAdmin = $goAdmin->ShowMeComments();
		}
	}


}

$admin = new AdminAuth;
$insertNewComment = $admin->Authorize($username,$password);


?>