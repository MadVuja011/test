<?php

class ListCommentsView extends View
{
     public function listComms($viewComments)
     {
		 foreach($viewComments as $value)
		 {
		 	 //var_dump($value);die;
             $name = $value[0];
			 $comment  = $value[1];			 
			 $myCommentView.= "<div>
                                <h1>".$name."</h1>                              
							    <p>".$comment."</p>
					           </div>";
		 }

         $view = "
         <div class='row'>
         ".$myCommentView."
         </div>";

		 return "<h2>CUSTOMER COMMENTS AND QUESTIONS: </h2>".$view;
	 }
}

?>