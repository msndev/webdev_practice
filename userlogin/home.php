<?php
	
    if (isset($_POST['upload'])) {
			$file_name  = $_FILES['file']['name'];
			$file_type = $_FILES['file']['type'];
			$file_size = $_FILES['file']['size'];
			$file_tem_Loc = $_FILES['file']['tmp_name'];
			$file_store = "upload/".$file_name;
			$fileextension = (explode('.',$file_name));
			$fileextension = strtolower(end($fileextension));
			$uploadPath = "./upload/";
			$extensions = array("jpg");
			$name = $_POST['name'];
			$type = $_POST['type'];
			    if (! in_array($fileExtension,$extensions)) {
            $err =1;
        }

        else if ($file_size > 200000000) {
            $err=2;
        }

        else {
          $check=1;
          while($check==1)
          {
                $Postf=rand(1000,9999);
                $Que="Select ID from `permissions` where ID='$Postf'";
      					$result=mysqli_query($con,$Que);
                if(mysqli_num_rows($result)==0)
      					{
      						$check=0;
      					}
                else {
                  $check=1;
                }
          }
          $didUpload=move_uploaded_file($_FILES["myfile"]["tmp_name"], $uploadPath.$Postf.'.'.$fileExtension);
          if ($didUpload) {
              $err=0;
              $query="INSERT INTO `permissions` values($Postf,$type,'$name')";
              if(!mysqli_query($con,$query))
              {
                $err=4;
              }
              else {
                $err=0;
              }
                //echo "DONE";

            } else {
                $err=3;
            }
        }

        chdir('../Board/pages/technical/');
    }
    else {
      //echo "NOT THERE";
    }
    if(isset($_GET))
    {
      extract($_GET);
    }

			
			
?>
<html>
   <body>
      
      <form action="" method="POST" enctype="multipart/form-data">
         <input type="file" name="file" />
		 <input type="int" name="type" />
		 <input type="mediumtext" name="name" />
         <input type="submit" name = "upload" value = "upload image"/>
		 
      </form>
      
   </body>
</html>