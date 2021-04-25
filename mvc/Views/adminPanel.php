<?php
require_once('..\Models\Db.php');

class Admin
{
     public function ShowMeComments()
     {
			$db = new Db;
			$table = 'comments';
			$columns = 'id,nickname,comment';
			$where = 'WHERE approved_by_admin = 0';
			$checkDb = $db->Read($table,$columns,$where);

			$res = $this->letsApproveSome($checkDb);

	 }

	 public function letsApproveSome($list)
	 {

	 //var_dump($list);die;
	 	 foreach($list as $value)
		 {
		 	 //var_dump($value);die;
			 $id = $value[0];
             $name = $value[1];
			 $comment  = $value[2];		
			 
			 $myCommentView.= "<form action=\"..\Controllers\ApproveComment.php\" id=\"myForm_".$id."\" method=\"post\">
                                <div>NAME: ".$name."</div> 
								<input type=\"hidden\" name=\"username\" value = ".$name.">
							    <div>COMMENT: ".$comment."</div>
								<input type=\"hidden\" name=\"comment\" value = ".$comment.">
								<div>ID: ".$id."</div>
								<input type=\"hidden\" name=\"id\" value = ".$id.">
							    <input type=\"submit\" value=\"Aprove Comment\">
							   </form>
							   <br>";

							   //$var_dump($myCommentView);die;
		 }

         $view = "
         <!DOCTYPE html>
         <html>
		 <body>
		 <div>
         ".$myCommentView."
         </div>
		 </body>
		 </html>";
		 
		 echo $view;
		 
	 }
}


?>