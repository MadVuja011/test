<?php
require_once('.\mvc\Models\Db.php');
require_once('.\mvc\Views\listComments.php');

class ListCommentsCont extends Controller
{
     public function fetchComments($param)
	{
		if($param === 'comments')
		{
			$db = new Db;
			$table = 'comments';
			$columns = 'nickname,comment';
			$where = 'WHERE approved_by_admin = 1 limit 10';
			$checkDb = $db->Read($table,$columns,$where);

			//var_dump($checkDb);die;
			
			$createView = $this->sendCommToList($checkDb);
			//var_dump($createView);die;

			return($createView);

		}
	}
	
	public function sendCommToList($param)
	{
	    $view = new ListCommentsView;
		$sendData = $view->listComms($param);

		return $sendData;
	}
}

?>