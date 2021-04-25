<?php
require_once('.\mvc\Models\Db.php');
require_once('.\mvc\Views\view.php');

Class Controller
{
	
	public function fetchData($param)
	{
		if($param === 'index')
		{
			$db = new Db;
			$table = 'images_descriptions';
			$columns = 'image_title,image_description,image_blob';
			$where = 'JOIN images ON images.id = images_descriptions.image_id';
			$checkDb = $db->Read($table,$columns,$where);
			//var_dump($checkDb);die;
			
			$createView = $this->sendDataToView($checkDb);
			//var_dump($createView);die;

			return($createView);

		}
	}

	public function sendDataToView($param)
	{
	    $view = new View;
		$sendData = $view->createView($param);

		return $sendData;
	}
}

?>