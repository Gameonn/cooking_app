<?php session_start();
error_reporting(0);
include '../phpInclude/dbconnection.php';
if(isset($_SESSION['id']))
 { 
if($_SESSION['id'])
{
$action=$_REQUEST['action'];
$id=$_REQUEST['id'];

switch ($action) 
{
  
case "add_recipe":

                 function randomFileNameGenerator($prefix)
                {
                  $r=substr(str_replace(".","",uniqid($prefix,true)),0,20);
                 if(file_exists("../uploads/$r")) randomFileNameGenerator($prefix);
                else return $r;
                }
 
               if(isset($_REQUEST['title'])&&isset($_FILES['image'])&&isset($_REQUEST['prep_time'])&&isset($_REQUEST['cook_time'])&&isset($_REQUEST['diff_level'])&&isset($_REQUEST['serves'])&&isset($_REQUEST['spicy'])&&isset($_REQUEST['video_url'])&&isset($_REQUEST['method_html'])&&isset($_REQUEST['recipe_type']))
                 { 
                      $title=$_REQUEST['title'];
                      $image=$_FILES['image'];
                      $prep_time=$_REQUEST['prep_time'];
                      $cook_time=$_REQUEST['cook_time'];
                      $diff_level=$_REQUEST['diff_level'];
                      $serves=$_REQUEST['serves'];
                      $spicy=$_REQUEST['spicy'];
                      $video_url=$_REQUEST['video_url'];
                      $method_html=$_REQUEST['method_html'];
                      $recipe_type=$_REQUEST['recipe_type'];
                 }

                   $target_dir = "../uploads/";
                   $target_file = $target_dir . basename($_FILES["image"]["name"]);
                   $uploadOk = 1;
                   $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
                    // Check if image file is a actual image or fake image
                    if(isset($_POST["submit"])) {
                     $check = getimagesize($_FILES["image"]["tmp_name"]);
                    if($check !== false) {
                    // echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                    } else {
                    //echo "File is not an image.";
                    $uploadOk = 0;
                    }
                 }

  
                 // Check if $uploadOk is set to 0 by an error
                 if ($uploadOk == 0) {
                 //echo "Sorry, your file was not uploaded.";
                 // if everything is ok, try to upload file
                 } else {
                 $randomFileName=randomFileNameGenerator("Img_").".".end(explode(".",$image['name']));
                 if(@move_uploaded_file($image['tmp_name'], "../uploads/$randomFileName")){
                  $success="1";
                 $url=$randomFileName;
                }
                 }

                 $sql="SELECT title FROM recipes where title=:title";
               $stmt=$conn->prepare($sql);
               $stmt->bindValue('title',$title);
               $stmt->execute();
               $check=$stmt->fetchAll(PDO::FETCH_ASSOC);
              //print_r($result);

              if($check)
              {
              echo "<script>alert('Recipe already exists');
              window.location.href='add_recipes.php';</script>";
              }                    
              else 
              {

              if(!empty($_REQUEST['title'])&&!empty($_FILES['image'])&&!empty($_REQUEST['prep_time'])&&!empty($_REQUEST['cook_time'])&&!empty($_REQUEST['diff_level'])&&!empty($_REQUEST['serves'])&&!empty($_REQUEST['method_html'])&&!empty($_REQUEST['recipe_type']))
               {
  
                $sql="INSERT into recipes values(DEFAULT,:title,:image,now(),:prep_time,:cook_time,:diff_level,:serves,:spicy,:video_url,:method_html,:recipe_type,0)";
                 $stmt=$conn->prepare($sql);
                $stmt->bindValue(':title',$title);
                $stmt->bindValue(':image',$url);
                $stmt->bindValue(':prep_time',$prep_time);
                $stmt->bindValue(':cook_time',$cook_time);
                $stmt->bindValue(':diff_level',$diff_level);
                $stmt->bindValue(':serves',$serves);
                $stmt->bindValue(':spicy',$spicy);
                $stmt->bindValue(':video_url',$video_url);
                $stmt->bindValue(':method_html',$method_html);
                $stmt->bindValue(':recipe_type',$recipe_type);

               try{
                  $stmt->execute();
                }
     
                catch(Exception $e){
                    echo $e->getMessage();
                 }
              }
         header("location:add_recipes.php");
       }
break;
  

case "recipe_type":

               function randomFileNameGenerator($prefix)
               {
                  $r=substr(str_replace(".","",uniqid($prefix,true)),0,20);
                 if(file_exists("../uploads/$r")) randomFileNameGenerator($prefix);
                else return $r;
                }
 
               if(isset($_REQUEST['title'])&&isset($_FILES['image']))
                 { 
                      $title=$_REQUEST['title'];
                      $image=$_FILES['image'];
                 }
                 
                 $target_dir = "../uploads/";
                   $target_file = $target_dir . basename($_FILES["image"]["name"]);
                   $uploadOk = 1;
                   $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
                    // Check if image file is a actual image or fake image
                    if(isset($_POST["submit"])) {
                     $check = getimagesize($_FILES["image"]["tmp_name"]);
                    if($check !== false) {
                    // echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                    } else {
                    //echo "File is not an image.";
                    $uploadOk = 0;
                    }
                 }

               
                 // Check if $uploadOk is set to 0 by an error
                 if ($uploadOk == 0) {
                 //echo "Sorry, your file was not uploaded.";
                 // if everything is ok, try to upload file
                 } else {
                 $randomFileName=randomFileNameGenerator("Img_").".".end(explode(".",$image['name']));
                 if(@move_uploaded_file($image['tmp_name'], "../uploads/$randomFileName")){
                  $success="1";
                 $url=$randomFileName;
                }
                 }

                 $sql="SELECT title FROM recipe_type where title=:title";
               $stmt=$conn->prepare($sql);
               $stmt->bindValue('title',$title);
               $stmt->execute();
               $check=$stmt->fetchAll(PDO::FETCH_ASSOC);
              //print_r($result);

              if($check)
              {
              echo "<script>alert('Recipe Type already exists');
              window.location.href='add_recipe_type.php';</script>";
              }                    
              else 
              {
                 
                  if(!empty($_REQUEST['title'])&&!empty($_FILES['image']))
                  {

                    $sql="INSERT into recipe_type values(DEFAULT,:title,:image,now())";
                 $stmt=$conn->prepare($sql);
                $stmt->bindValue(':title',$title);
                $stmt->bindValue(':image',$url);
                  }
                 
                  try{
                  $stmt->execute();
                }
     
                catch(Exception $e){
                    echo $e->getMessage();
                 }
              
          header("location:add_recipe_type.php");
    }
    break;

case "ingredients":
                 
                  if(isset($_REQUEST['title'])&&isset($_REQUEST['aisle_id'])&&isset($_REQUEST['recipe_id'])&&isset($_REQUEST['ingredient_id']))
                 { 
                      $title=$_REQUEST['title'];
                      $aisle_id=$_REQUEST['aisle_id'];
                      $recipe_id=$_REQUEST['recipe_id'];
                      $ingredient_id=$_REQUEST['ingredient_id'];
                      
                 }


              $sql="SELECT title,recipe_id FROM ingredients where title=:title And recipe_id=:recipe_id";
               $stmt=$conn->prepare($sql);
               $stmt->bindValue('title',$title);
               $stmt->bindValue('recipe_id',$recipe_id);
               $stmt->execute();
               $check=$stmt->fetchAll(PDO::FETCH_ASSOC);
              //print_r($result);

              if($check)
              {
              echo "<script>alert('Ingredient already exists');
              window.location.href='add_ingredients.php';</script>";
              }                    
              else 
              {
              if(!empty($_REQUEST['title'])&&!empty($_REQUEST['aisle_id'])&&!empty($_REQUEST['recipe_id'])&&!empty($_REQUEST['ingredient_id']))
                  {

                    $sql="INSERT into ingredients values(DEFAULT,:title,:aisle_id,:recipe_id,:ingredient_id)";
                 $stmt=$conn->prepare($sql);
                $stmt->bindValue(':title',$title);
                $stmt->bindValue(':aisle_id',$aisle_id);
                $stmt->bindValue(':recipe_id',$recipe_id);
                $stmt->bindValue(':ingredient_id',$ingredient_id);

                  }
                 
                  try{
                  $stmt->execute();
                }
     
                catch(Exception $e){
                    echo $e->getMessage();
                 }
         header("location:add_ingredients.php");
   }
   break;

case "add_ingre_to_recipe":
                    
                    $action=$_REQUEST['action'];
                    $optval=$_REQUEST['optval'];
                    $add_to_ingre=$_REQUEST['add_to_ingre'];
						
						//print_r($optval);
						//print_r($add_to_ingre);die;
                      //print_r($_REQUEST);
                 // if(isset($_REQUEST['title'])&&isset($_REQUEST['aisle_id'])&&isset($_REQUEST['recipe_id'])&&isset($_REQUEST['ingredient_id']))
               //  { 
               //       $title=$_REQUEST['title'];
               //       $aisle_id=$_REQUEST['aisle_id'];
               //       $recipe_id=$_REQUEST['recipe_id'];
               //       $ingredient_id=$_REQUEST['ingredient_id'];
                      
              //   }
			  if(isset($_REQUEST['optval']) && isset($_REQUEST['add_to_ingre'])){
				foreach($add_to_ingre as $key => $value){
					$sql="SELECT title,aisle_id,ingredient_type_id FROM ingredients where id=:id";
					$stmt=$conn->prepare($sql);
					$stmt->bindValue('id',$value);
					$stmt->execute();
					$check[]=$stmt->fetchAll(PDO::FETCH_ASSOC);
				}
					
				if(!empty($check)){
					foreach($check as $key => $value){
						foreach($value as $key => $val){
							$sql="INSERT into ingredients values(DEFAULT,:title,:aisle_id,:recipe_id,:ingredient_type_id)";
							$stmt=$conn->prepare($sql);
							$stmt->bindValue(':title',$val['title']);
							$stmt->bindValue(':aisle_id',$val['aisle_id']);
							$stmt->bindValue(':recipe_id',$optval);
							$stmt->bindValue(':ingredient_type_id',$val['ingredient_type_id']);
							try{
								$stmt->execute();
							}
							catch(Exception $e){
								echo $e->getMessage();
							}
						}
					}
				}
			}
			else {
					echo "<script>alert('Choose ingredients');
					window.location.href='list_ingredients.php';</script>";
				}
         header("location:list_ingredients.php");
   
   break;


case "ingredient_type":

                  function randomFileNameGenerator($prefix)
               {
                  $r=substr(str_replace(".","",uniqid($prefix,true)),0,20);
                 if(file_exists("../uploads/$r")) randomFileNameGenerator($prefix);
                else return $r;
                }

               if(isset($_REQUEST['title'])&&isset($_REQUEST['ing_class'])&&isset($_FILES['image']))
                 { 
                      $title=$_REQUEST['title'];
                      $class=$_REQUEST['ing_class'];
                      $image=$_FILES['image'];
                      
                 }
                 
                 $target_dir = "../uploads/";
                   $target_file = $target_dir . basename($_FILES["image"]["name"]);
                   $uploadOk = 1;
                   $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
                    // Check if image file is a actual image or fake image
                    if(isset($_POST["submit"])) {
                     $check = getimagesize($_FILES["image"]["tmp_name"]);
                    if($check !== false) {
                    // echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                    } else {
                    //echo "File is not an image.";
                    $uploadOk = 0;
                    }
                 }

               
                 // Check if $uploadOk is set to 0 by an error
                 if ($uploadOk == 0) {
                 //echo "Sorry, your file was not uploaded.";
                 // if everything is ok, try to upload file
                 } else {
                 $randomFileName=randomFileNameGenerator("Img_").".".end(explode(".",$image['name']));
                 if(@move_uploaded_file($image['tmp_name'], "../uploads/$randomFileName")){
                  $success="1";
                 $url=$randomFileName;
                }
                 }
                   
                  $sql="SELECT title FROM ingredient_type where title=:title";
               $stmt=$conn->prepare($sql);
               $stmt->bindValue('title',$title);
               $stmt->execute();
               $check=$stmt->fetchAll(PDO::FETCH_ASSOC);
              //print_r($result);

              if($check)
              {
              echo "<script>alert('Ingredient type already exists');
              window.location.href='add_ingredient_type.php';</script>";
              }
              else{
                  if(!empty($_REQUEST['title'])&&!empty($_REQUEST['ing_class'])&&!empty($_FILES['image']))
                  {

                $sql="INSERT into ingredient_type values(DEFAULT,:title,:image,:class,now())";
                $stmt=$conn->prepare($sql);
                $stmt->bindValue(':title',$title);
                $stmt->bindValue(':image',$url);
                $stmt->bindValue(':class',$class);
                  }
                 
                  try{
                  $stmt->execute();
                }
     
                catch(Exception $e){
                    echo $e->getMessage();
                 }
              header("location:list_ingredient_type.php");
          }
    break;

case "aisle":
               
             if(isset($_REQUEST['title']))
                 { 
                      $title=$_REQUEST['title'];
                  }    
                
               $sql="SELECT title FROM aisles where title=:title";
               $stmt=$conn->prepare($sql);
               $stmt->bindValue('title',$title);
               $stmt->execute();
               $check=$stmt->fetchAll(PDO::FETCH_ASSOC);

              if($check)
              {
              echo "<script>alert('Aisle name already exists');
              window.location.href='list_aisle.php';</script>";
              }
             else
             {
             if(!empty($_REQUEST['title']))
                  {

                    $sql="INSERT into aisles values(DEFAULT,:title)";
                 $stmt=$conn->prepare($sql);
                $stmt->bindValue(':title',$title);
                 }
                 
                  try{
                  $stmt->execute();
                }
     
                catch(Exception $e){
                    echo $e->getMessage();
                 }
            header("location:list_aisle.php");  
          }
    break;

case "edit_aisle":   
      
          if(isset($_REQUEST['title']))
                 { 
                      $title=$_REQUEST['title'];
                  }    

               $sql="SELECT title FROM aisles where title=:title";
               $stmt=$conn->prepare($sql);
               $stmt->bindValue('title',$title);
               $stmt->execute();
               $check=$stmt->fetchAll(PDO::FETCH_ASSOC);
              if($check)
              {
              echo "<script>alert('Aisle name already exists');
              window.location.href='list_aisle.php';</script>";
              }
             else
             {

             if(!empty($_REQUEST['title']))
                 {

                $sql="UPDATE aisles SET title=:title WHERE id=:id";
                $stmt=$conn->prepare($sql);
                $stmt->bindValue(':title',$title);
                $stmt->bindValue(':id',$id);

                }
                 
                  try{
                  $stmt->execute();
                }
     
                catch(Exception $e){
                    echo $e->getMessage();
                 }
            header("location:list_aisle.php");  
          }
 
             
break ;

case "delete_aisle":   
      
          if(isset($_REQUEST['id']))
                 { 
                      $id=$_REQUEST['id'];
                     $sql="DELETE FROM `aisles` WHERE id=:id";
                     $stmt=$conn->prepare($sql);
                     $stmt->bindValue(':id',$id);
                     try{
                      $stmt->execute();
                       
                     }
                     catch(PDOException $e){
                      echo $e->getMessage();
                     }
                  } 
header("location:list_aisle.php");
break ;

case "edit_recipe_details":   

            function randomFileNameGenerator($prefix)
                {
                  $r=substr(str_replace(".","",uniqid($prefix,true)),0,20);
                 if(file_exists("../uploads/$r")) randomFileNameGenerator($prefix);
                else return $r;
                }

          if(isset($_REQUEST['id']))
                 { 
                      $id=$_REQUEST['id'];
                      $recipe_name=$_REQUEST['recipe_name'];
                      $prep_time=$_REQUEST['prep_time'];
                      $cook_time=$_REQUEST['cook_time'];
                      $serves=$_REQUEST['serves'];
                      $spicy=$_REQUEST['spicy'];
                      $diff_level=$_REQUEST['diff_level'];
                      $video_val=$_REQUEST['video_val'];
                      $method_val=$_REQUEST['method_val']; 
                      $image=$_FILES['image'];
					            $featured=$_REQUEST['featured'];
                      $recipe_type=$_REQUEST['optval'];
                  }    

                     $randomFileName=randomFileNameGenerator("Img_").".".end(explode(".",$image['name']));
                      if(@move_uploaded_file($image['tmp_name'], "../uploads/$randomFileName")){
                        $success="1";
                        $url=$randomFileName;
                      }
        
       
        if($url){
					$sql="UPDATE `recipes` SET `title`=:title,`image`=:image,`created_on`=now(),`prep_time`=:prep_time,`cook_time`=:cook_time,
					`diff_level`=:diff_level,`serves`=:serves,`spicy`=:spicy,`video_url`= :video_val,`method_html`= :method_val, `is_featured`= :featured WHERE id=:id";
					$stmt=$conn->prepare($sql);
					$stmt->bindValue(':image',$url);
					}
					else{ 
					$sql="UPDATE `recipes` SET `title`=:title,`created_on`=now(),`prep_time`=:prep_time,`cook_time`=:cook_time,
					`diff_level`=:diff_level,`serves`=:serves,`spicy`=:spicy,`video_url`= :video_val,`method_html`= :method_val, `is_featured`= :featured, `recipe_type_id`=:recipe_type WHERE id=:id";
					$stmt=$conn->prepare($sql);
            }
                
                $stmt->bindValue(':title',$recipe_name);
                $stmt->bindValue(':prep_time',$prep_time);
                $stmt->bindValue(':cook_time',$cook_time);
                $stmt->bindValue(':diff_level',$diff_level);
                $stmt->bindValue(':serves',$serves);
                $stmt->bindValue(':spicy',$spicy);
                $stmt->bindValue(':video_val',$video_val);
                $stmt->bindValue(':method_val',$method_val);
                $stmt->bindValue(':featured',$featured);
                $stmt->bindValue(':id',$id);
                $stmt->bindValue(':recipe_type',$recipe_type);
                try{
                  $stmt->execute();
                }
                catch(Exception $e){
                    echo $e->getMessage();
                 }
            header("location:list_recipes.php");               
break ;

case "edit_ingre_details":

                    if(isset($_REQUEST['id']))
                    { 
                    $id=$_REQUEST['id'];
                    $ingre_title=$_REQUEST['ingre_title'];
                    $ingre_id=$_REQUEST['ingre_id'];
                    } 

                    foreach ($ingre_id as $key => $value) {

                    $sql="UPDATE `ingredients` SET `title`=:title WHERE `id`={$ingre_id[$key]} ";
                    $stmt=$conn->prepare($sql);
                    $stmt->bindValue(':title',$ingre_title[$key]);

                    try{ $stmt->execute(); }
                    catch(Exception $e){
                        echo $e->getMessage();   }
                                      }
                                  header("location:list_recipes.php"); 
  break;

case "delete_ingre_details":

                    if(isset($_REQUEST['id']))
                      { 
                      $id=$_REQUEST['id'];
                      $ingre_id=$_REQUEST['ingre_id'];
                      $dlt_ingre=$_REQUEST['dlt_ingre'];
                      
                      }
                      //print_r($_REQUEST); die;
                    foreach ($dlt_ingre as $row) {
                      $sql="DELETE FROM `ingredients` WHERE id=:id";
                      $stmt=$conn->prepare($sql);
			                $stmt->bindValue("id",$row);
                    try{  $stmt->execute();       }
                    catch(PDOException $e){     
                      echo $e->getMessage();  }
                    } 
                    header("location:list_recipes.php");
break ;

case "delete_ingredient_type":

                    if(isset($_REQUEST['id']))
                 { 
                      $id=$_REQUEST['id'];
                     $sql="DELETE FROM ingredient_type WHERE id=:id";
                     $stmt=$conn->prepare($sql);
                     $stmt->bindValue(':id',$id);
                     try{
                      $stmt->execute();
                       
                     }
                     catch(PDOException $e){
                      echo $e->getMessage();
                     }
                  } 
                  header("location:list_ingredient_type.php");
break;

case "delete_recipe_type":

                    if(isset($_REQUEST['id']))
                 { 
                      $id=$_REQUEST['id'];

                     $sql="DELETE FROM recipe_type WHERE id=:id";
                     $stmt=$conn->prepare($sql);
                     $stmt->bindValue(':id',$id);
                     try{
                      $stmt->execute();
                       
                     }
                     catch(PDOException $e){
                      echo $e->getMessage();
                     }
                  } 
                  header("location:list_recipe_types.php");
break;

case "delete_recipe":
                   
                    if(isset($_REQUEST['id']))
                 { 
                      $id=$_REQUEST['id'];
                      $sql="DELETE FROM recipes WHERE id=:id";
                     $stmt=$conn->prepare($sql);
                     $stmt->bindValue(':id',$id);
                     try{
                      $stmt->execute();
                       
                     }
                     catch(PDOException $e){
                      //echo $e->getMessage();
                     }
                  } 
                  header("location:list_recipes.php");
break; 

case "edit_aisle_ingre":

                    if(isset($_REQUEST['id']))
                    { 
                    $id=$_REQUEST['id'];
                    $aisle_id=$_REQUEST['aisle_name'];
                    $ingre_type_id=$_REQUEST['ing_type'];
                    } 

                    $sql="UPDATE `ingredients` SET `aisle_id`=:aisle_id , `ingredient_type_id`=:ingre_type_id WHERE id=:id";
                    $stmt=$conn->prepare($sql);
                    $stmt->bindValue(':id',$id);
                    $stmt->bindValue(':aisle_id',$aisle_id);
                    $stmt->bindValue(':ingre_type_id',$ingre_type_id);

                    try{ $stmt->execute(); }
                    catch(Exception $e){
                        echo $e->getMessage();   }
                                      
                    header("location:list_ingredients.php"); 
  break;   

case "edit_ingre_type":
                   
                    function randomFileNameGenerator($prefix)
                      {
                        $r=substr(str_replace(".","",uniqid($prefix,true)),0,20);
                       if(file_exists("../uploads/$r")) randomFileNameGenerator($prefix);
                      else return $r;
                      }

                    if(isset($_REQUEST['id']))
                    { 
                    $id=$_REQUEST['id'];
                    $ingredient_type=$_REQUEST['ingredient_type_name'];
                    $image=$_FILES['image'];
                    
                    } 

                    $randomFileName=randomFileNameGenerator("Img_").".".end(explode(".",$image['name']));
                      if(@move_uploaded_file($image['tmp_name'], "../uploads/$randomFileName")){
                        $success="1";
                        $url=$randomFileName;
                      }

                    if($url){
                    $sql="UPDATE `ingredient_type` SET `title`=:ingredient_type , `image`=:url WHERE id=:id";
                    $stmt=$conn->prepare($sql);
                    $stmt->bindValue(':url',$url);
                      }
                    else{
                      $sql="UPDATE `ingredient_type` SET `title`=:ingredient_type WHERE id=:id";
                      $stmt=$conn->prepare($sql);
                    }
                    
                    $stmt->bindValue(':id',$id);
                    $stmt->bindValue(':ingredient_type',$ingredient_type);
                    

                    try{ $stmt->execute(); }
                    catch(Exception $e){
                        //echo $e->getMessage();   
                    }
                                      
                    header("location:list_ingredient_type.php"); 
  break;   


case "edit_recipe_type":
                   
                    function randomFileNameGenerator($prefix)
                      {
                        $r=substr(str_replace(".","",uniqid($prefix,true)),0,20);
                       if(file_exists("../uploads/$r")) randomFileNameGenerator($prefix);
                      else return $r;
                      }

                    if(isset($_REQUEST['id']))
                    { 
                    $id=$_REQUEST['id'];
                    $recipe_type=$_REQUEST['recipe_type_name'];
                    $image=$_FILES['image'];
                    
                    } 

                    $randomFileName=randomFileNameGenerator("Img_").".".end(explode(".",$image['name']));
                      if(@move_uploaded_file($image['tmp_name'], "../uploads/$randomFileName")){
                        $success="1";
                        $url=$randomFileName;
                      }

                    if($url){
                    $sql="UPDATE `recipe_type` SET `title`=:recipe_type , `image`=:url WHERE id=:id";
                    $stmt=$conn->prepare($sql);
                    $stmt->bindValue(':url',$url);
                      }
                    else{
                      $sql="UPDATE `recipe_type` SET `title`=:recipe_type WHERE id=:id";
                      $stmt=$conn->prepare($sql);
                    }
                    
                    $stmt->bindValue(':id',$id);
                    $stmt->bindValue(':recipe_type',$recipe_type);
                    

                    try{ $stmt->execute(); }
                    catch(Exception $e){
                        //echo $e->getMessage();   
                    }
                                      
                    header("location:list_recipe_types.php"); 
  break;     


}

}}
else
{
	header("location:index.php");
}
?>