<?php

class Db
{
	public $localLink;

	public function Connect($localLink)
	{	    
       if($localLink==='local')    
       {  
         $host = "localhost";
         $db = "citrus";
         $username = "marko";
         $password = "Kordiestra@1";
              
         $link = mysqli_connect($host, $username,$password,$db);
     
         return $link;
       }
    }

    public function Read($table,$column="*",$where="")
    {
        $readLink = $this->Connect('local');
        
        $readQ = "SELECT ".$column." FROM ".$table." ".$where."";
        //$readQ = "SELECT images_descriptions.image_title, images_descriptions.image_description,images.image_blob FROM ".$table." JOIN images ON images.id = images_descriptions.image_id ".$where."";
        //echo ($readQ);die;
        $res=array();
        $resReadQ = $readLink->query($readQ);
        while($readQrow = $resReadQ->fetch_row())
        {
           //$image = $readQrow['image_blob'];
           //$title = $readQrow['image_title'];
           //$desc  = $readQrow['image_description'];

           $res[] = $readQrow;
		}
        //var_dump($res);die;
        
        if($table === 'users' && $resReadQ->num_rows == 0) 
        {
             return "NO USER";   
		}
        elseif($table === 'users' && $resReadQ->num_rows == 1)
        {
             return "OK";   
		}
        else
        {
             return $res;
        }
	}

    public function Insert($table,$name,$comment,$ip_address)
    {
        $insertLink = $this->Connect('local');

        $insertQ = "INSERT INTO $table (nickname,comment,ip_address) VALUES ('".$name."','".$comment."','".$ip_address."')";
        //echo $insertQ;die;
        $resInsertQ = $insertLink->query($insertQ);
        if($resInsertQ) 
        {
             echo "Your comment has been sent. It will be reviewed by our admin team before it is posted.";
        }
        else
        {
             echo "There was a problem with saving this comment. Please contact our administrators at adminteam@citrus.com";  
		}
	}

    public function Update($table,$name,$comment,$id)
    {
         $updateLink = $this->Connect('local');
         $updateQ = "UPDATE $table SET approved_by_admin = 1 WHERE nickname = '".$name."' AND comment = '".$comment."' AND id = ".$id."";
         //echo $updateQ;die;

         $resupdateQ = $updateLink->query($updateQ);

	}
}


?>