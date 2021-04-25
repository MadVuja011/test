<?php

class View
{
	public $viewDetails;

	public function createView($viewDetails)
	{
	     //echo "STIGAO U VIEW\n";
		 //var_dump($viewDetails);die;

		 foreach($viewDetails as $value)
		 {
		 	 //var_dump($value);die;
             $title = $value[0];
			 $desc  = $value[1];
			 $image = $value[2];
			 //var_dump($image);die;
			 $myView.= "<div class=\"column\">
                             <h1>".$title."</h1>
                               <img src=\"data:image/png;base64, ".$image."\"/>
							   <p>".$desc."</p>
					    </div>";
		 }

         $view = "
         <div class='row'>
         ".$myView."
         </div>";

		 return "<body>".$view."";

	}
}

?>