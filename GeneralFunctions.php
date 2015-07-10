<?php

require_once ('phpInclude/dbconnection.php');

class GeneralFunctions {
	public static function getAllRecipes() {
			global $conn;
			$sql = "select recipes.id as rid, recipes.*,recipe_type.id as rtid, recipe_type.title as rt_title, recipe_type.image as rt_image
			from recipes left join recipe_type on recipe_type.id=recipes.recipe_type_id";
			$sth=$conn->prepare($sql);
			
			try{$sth->execute();}catch(Exception $e){
			/*echo $e->getMessage();*/
			}
			$result=$sth->fetchAll(PDO::FETCH_ASSOC);
			
			foreach($result as $key=>$value){
				if($value['title']){
					$data[]=array('recipe_id'=>$value['rid'],
						'title'=>$value['title'],
						'recipe_image'=>$value['image']?BASE_PATH."timthumb.php?src=uploads/".$value['image']:"",
						"prep_time"=>$value['prep_time']?$value['prep_time']:"",
						"cook_time"=>$value['cook_time']?$value['cook_time']:"",
						'dificulty_level'=>$value['diff_level']?$value['diff_level']:"",
						'serves'=>$value['serves']?$value['serves']:"",
						'spicy'=>$value['spicy']?$value['spicy']:"",
						'video_url'=>$value['video_url'],
						'method'=>$value['method_html']?$value['method_html']:"",
						'recipe_type'=>$value['rt_title']?$value['rt_title']:"",
						'recipe_type_image'=>$value['rt_image']?BASE_PATH."timthumb.php?src=uploads/".$value['rt_image']:""
						);
				}
			}
			
			return $data;
		}

	public static function getAllIngredients(){
			global $conn;
			$sql = "select recipes.id as rid,recipes.title as recipe_title, recipes.*,recipe_type.id as rtid, recipe_type.title as rt_title, recipe_type.image as rt_image,ingredients.title as i_title,aisles.title as a_title,ingredient_type.title as it_title,ingredient_type.image as it_image from recipes left join recipe_type on recipe_type.id=recipes.recipe_type_id left join ingredients on ingredients.recipe_id=recipes.id left join aisles on aisles.id=ingredients.aisle_id left join ingredient_type on ingredient_type.id=ingredients.ingredient_type_id";
			$sth=$conn->prepare($sql);
			
			try{$sth->execute();}catch(Exception $e){
			/*echo $e->getMessage();*/
			}
			$result=$sth->fetchAll(PDO::FETCH_ASSOC);
			
			foreach($result as $key=>$value){
				if(empty($final[$value['rid']])){
					$final[$value['rid']]=array('recipe_id'=>$value['rid'],
						'title'=>$value['recipe_title'],
						'recipe_image'=>$value['image']?BASE_PATH."timthumb.php?src=uploads/".$value['image']:"",
						"prep_time"=>$value['prep_time']?$value['prep_time']:"",
						"cook_time"=>$value['cook_time']?$value['cook_time']:"",
						'dificulty_level'=>$value['diff_level']?$value['diff_level']:"",
						'serves'=>$value['serves']?$value['serves']:"",
						'spicy'=>$value['spicy']?$value['spicy']:"",
						'video_url'=>$value['video_url'],
						'method'=>$value['method_html']?$value['method_html']:"",
						'ingredient_title'=>$value['title']?$value['title']:"",
						'recipe_type'=>$value['rt_title']?$value['rt_title']:"",
						'recipe_type_image'=>$value['rt_image']?BASE_PATH."timthumb.php?src=uploads/".$value['rt_image']:"",
						'ingredients'=>array()
						);
						}
						
					$final[$value['rid']]['ingredients'][]=array("title"=>$value['i_title']?$value['i_title']:"",
						"aisle_title"=>$value['a_title']?$value['a_title']:"",
						"ingredient_type_title"=>$value['it_title']?$value['it_title']:"",
						"ingredient_type_image"=>$value['it_image']?BASE_PATH."timthumb.php?src=uploads/".$value['it_image']:""
						);
						}
			
				$data=array();
		foreach($final as $key=>$value){
			$data[]=$value;
	}
			return $data;
		}
		
		
	public static function getRecipeDetails($r,$u){
	
			global $conn;
			if($u){
			$sql = "select * from recipe_views where recipe_id=:recipe_id and user_id=:user_id";
			$sth=$conn->prepare($sql);
			$sth->bindValue("recipe_id",$r);
			$sth->bindValue("user_id",$u);
			try{$sth->execute();}catch(Exception $e){
			/*echo $e->getMessage();*/
			}
			$res=$sth->fetchAll(PDO::FETCH_ASSOC);	
			
			if(!count($res)){
			$sql="insert into recipe_views values(DEFAULT,:user_id,:recipe_id,1)";
			$sth=$conn->prepare($sql);
			$sth->bindValue("recipe_id",$r);
			$sth->bindValue("user_id",$u);
			try{$sth->execute();}catch(Exception $e){
			/* echo $e->getMessage();*/
			}
			}
			}
			$sql = "select recipes.id as rid,recipes.title as recipe_title, recipes.*,(select count(recipe_views.id) from recipe_views where recipe_views.recipe_id=recipes.id) as views ,recipe_type.id as rtid, recipe_type.title as rt_title, recipe_type.image as rt_image,ingredients.id as ing_id,ingredients.title as i_title,aisles.title as a_title,ingredient_type.title as it_title,ingredient_type.image as it_image,(select count(favorites.id) from favorites where favorites.recipe_id=recipes.id and favorites.user_id=:user_id) as fcount from recipes left join recipe_type on recipe_type.id=recipes.recipe_type_id left join ingredients on ingredients.recipe_id=recipes.id left join aisles on aisles.id=ingredients.aisle_id left join ingredient_type on ingredient_type.id=ingredients.ingredient_type_id where recipes.id=:recipe_id";
			$sth=$conn->prepare($sql);
			$sth->bindValue("recipe_id",$r);
			$sth->bindValue("user_id",$u);
			try{$sth->execute();}catch(Exception $e){
			/* echo $e->getMessage();*/ 
			}
			$result=$sth->fetchAll(PDO::FETCH_ASSOC);
			
			foreach($result as $key=>$value){
				if(empty($final[$value['rid']])){
					$final[$value['rid']]=array('recipe_id'=>$value['rid'],
						'title'=>$value['recipe_title'],
						'recipe_image'=>$value['image']?BASE_PATH."timthumb.php?src=uploads/".$value['image']:"",
						"prep_time"=>$value['prep_time']?$value['prep_time']:"",
						"cook_time"=>$value['cook_time']?$value['cook_time']:"",
						'dificulty_level'=>$value['diff_level']?$value['diff_level']:"",
						'serves'=>$value['serves']?$value['serves']:"",
						'is_favorite'=>$value['fcount']?$value['fcount']:0,
						'spicy'=>$value['spicy']?$value['spicy']:"",
						'video_url'=>$value['video_url'],
						'method'=>$value['method_html']?$value['method_html']:"",
						'ingredient_title'=>$value['title']?$value['title']:"",
						'recipe_type'=>$value['rt_title']?$value['rt_title']:"",
						'recipe_type_image'=>$value['rt_image']?BASE_PATH."timthumb.php?src=uploads/".$value['rt_image']:"",
						'views'=>$value['views'],
						'ingredients'=>array()
						);
						}
						
						
					$final[$value['rid']]['ingredients'][]=array("title"=>$value['i_title']?$value['i_title']:"",
						"aisle_title"=>$value['a_title']?$value['a_title']:"",
						"ingredient_type_title"=>$value['it_title']?$value['it_title']:"",
						"ingredient_type_image"=>$value['it_image']?BASE_PATH."timthumb.php?src=uploads/".$value['it_image']:""
						);
						}
			
					$data=array();
					foreach($final as $key=>$value){
					$data=$value;
					}
					return $data;
		}
		
	public static function getRecipeByKey($k,$u,$startIndex,$limit) {
	
			global $conn;
			
			$sql = "select recipes.id as rid,recipes.title as recipe_title, recipes.*,(select count(recipe_views.id) from recipe_views where recipe_views.recipe_id=recipes.id) as views ,recipe_type.id as rtid, recipe_type.title as rt_title, recipe_type.image as rt_image,ingredients.title as i_title,aisles.title as a_title,ingredient_type.title as it_title,ingredient_type.image as it_image,(select count(favorites.id) from favorites where favorites.recipe_id=recipes.id and favorites.user_id=:user_id) as fcount from recipes left join recipe_type on recipe_type.id=recipes.recipe_type_id left join ingredients on ingredients.recipe_id=recipes.id left join aisles on aisles.id=ingredients.aisle_id left join ingredient_type on ingredient_type.id=ingredients.ingredient_type_id where recipes.title like '%{$k}%' group by rid limit $startIndex,$limit";
			$sth=$conn->prepare($sql);
			$sth->bindValue("user_id",$u);
			try{$sth->execute();}catch(Exception $e){
			/* echo $e->getMessage();*/
			 }
			$result=$sth->fetchAll(PDO::FETCH_ASSOC);
			//print_r($result);die;
			foreach($result as $key=>$value){
				//if(empty($final[$value['rid']])){
					$final[$value['rid']]=array('recipe_id'=>$value['rid'],
						'title'=>$value['recipe_title'],
						'recipe_image'=>$value['image']?BASE_PATH."timthumb.php?src=uploads/".$value['image']:"",
						"prep_time"=>$value['prep_time']?$value['prep_time']:"",
						"cook_time"=>$value['cook_time']?$value['cook_time']:"",
						'dificulty_level'=>$value['diff_level']?$value['diff_level']:"",
						'serves'=>$value['serves']?$value['serves']:"",
						'is_favorite'=>$value['fcount']?$value['fcount']:0,
						'spicy'=>$value['spicy']?$value['spicy']:"",
						'video_url'=>$value['video_url'],
						'method'=>$value['method_html']?$value['method_html']:"",
						'ingredient_title'=>$value['title']?$value['title']:"",
						'recipe_type'=>$value['rt_title']?$value['rt_title']:"",
						'recipe_type_image'=>$value['rt_image']?BASE_PATH."timthumb.php?src=uploads/".$value['rt_image']:"",
						'views'=>$value['views']
						);
						//}
						
					
						}
					
					$data=array();
					if($final){
					foreach($final as $key=>$value){
					$data[]=$value;
					}
					}
					
					return $data;
		}	
		
		
		public static function gettotalRecordsKey($k,$u) {
	
			global $conn;
			
			$sql = "select count(temp.rid) as c from (select recipes.id as rid,recipes.title as recipe_title, recipes.*,(select count(recipe_views.id) from recipe_views where recipe_views.recipe_id=recipes.id) as views ,recipe_type.id as rtid, recipe_type.title as rt_title, recipe_type.image as rt_image,(select count(favorites.id) from favorites where favorites.recipe_id=recipes.id and favorites.user_id=:user_id) as fcount from recipes left join recipe_type on recipe_type.id=recipes.recipe_type_id where recipes.title like '%{$k}%' group by rid) as temp";
			$sth=$conn->prepare($sql);
			$sth->bindValue("user_id",$u);
			try{$sth->execute();}catch(Exception $e){
			
			 }
			$result=$sth->fetchAll(PDO::FETCH_ASSOC);
			$data=$result[0]['c'];			
			return $data;
		}	
		
	public static function getAllRecipesTypes() {
			global $conn;
			$sql="select * from recipe_type";
			$sth=$conn->prepare($sql);
			
			try{$sth->execute();}catch(Exception $e){
			/* echo $e->getMessage();*/
			 }
			$result=$sth->fetchAll(PDO::FETCH_ASSOC);
				foreach($result as $key=>$value){
				if($value['title']){
					$data[]=array('id'=>$value['id'],
						'title'=>$value['title'],
						'image'=>$value['image']?BASE_PATH."timthumb.php?src=uploads/".$value['image']:"",
						"created_on"=>$value['created_on']?$value['created_on']:""
						);
				}
			}
			return $data;
		}
	
	public static function getAllIngredientsTypes() {
			global $conn;
			$sql="select * from ingredient_type where generic=0";
			$sth=$conn->prepare($sql);
			
			try{$sth->execute();}catch(Exception $e){
			/*echo $e->getMessage();*/
			}
			$result=$sth->fetchAll(PDO::FETCH_ASSOC);
				foreach($result as $key=>$value){
				if($value['title']){
					$data[]=array('id'=>$value['id'],
						'title'=>$value['title'],
						'image'=>$value['image']?BASE_PATH."timthumb.php?src=uploads/".$value['image']:"",
						"created_on"=>$value['created_on']?$value['created_on']:""
						);
				}
			}
			return $data;
		}
			
		public static function getfeatured() {
			global $conn;
			$sql="select * from recipes where is_featured=1";
			$sth=$conn->prepare($sql);
			
			try{$sth->execute();}catch(Exception $e){
			/*echo $e->getMessage();*/
			}
			$result=$sth->fetchAll(PDO::FETCH_ASSOC);
				foreach($result as $key=>$value){
				if($value['title']){
					$data[]=array('id'=>$value['id'],
						'title'=>$value['title'],
						'image'=>$value['image']?BASE_PATH."timthumb.php?src=uploads/".$value['image']:""
						);
				}
			}
			return $data;
		}
		
	public static function getReadyTime() {
			global $conn;
			$sql="select group_concat(DISTINCT `cook_time`+`prep_time` separator ',') as time from recipes";
			$sth=$conn->prepare($sql);
			
			try{$sth->execute();}catch(Exception $e){
			/* echo $e->getMessage();*/
			}
			$data=$sth->fetchAll(PDO::FETCH_ASSOC);
			$temp = explode(',',$data[0]['time']);
			return $temp;
		}
	
	public static function getRecipe($i,$r,$p,$u,$startIndex,$limit) {
		global $conn;
				
		if($i && $r){
		$where="where ingredient_type_id ={$i} and recipe_type_id={$r}";		
		}
		elseif($i){
		$where="where ingredient_type_id ={$i}";		
		}
		elseif($r){
		$where="where recipe_type_id={$r}";		
		}
		else{
		$where="where 1";		
		}
		
		if($p>75){
		$w="and (cook_time+prep_time)>=75";
		}
		elseif(isset($p) && $p<=75 && $p!=0){
		$w="and (cook_time+prep_time)<={$p}";
		}
		elseif($p==0){
		$w="and 1";
		}
		else{
		$w="and 1";
		}
	
$sql="select recipes.id as rid,recipes.title as recipe_title, recipes.image, recipes.prep_time, recipes.cook_time, recipes.diff_level, recipes.serves, recipes.spicy,recipes.video_url,ingredients.title,ingredients.recipe_id,recipe_type.title as rt_title, recipe_type.image as rt_image,(select count(favorites.id) from favorites where favorites.recipe_id=recipes.id and favorites.user_id=:user_id) as fcount from recipes left join ingredients on ingredients.recipe_id=recipes.id left join recipe_type on recipe_type.id=recipes.recipe_type_id $where $w group by rid limit $startIndex,$limit";

			$sth=$conn->prepare($sql);
			//if($r) $sth->bindValue("recipe_type_id",$r);
			$sth->bindValue('user_id',$u);
			//if($i) $sth->bindValue("ingredient_type_id",$i);
			//if($p) $sth->bindValue('cook_time',$p);
			//echo $sql.'<br>';
			try{$sth->execute();}catch(Exception $e){
			 //echo $e->getMessage();
			}
			$result=$sth->fetchAll(PDO::FETCH_ASSOC);
			foreach($result as $key=>$value){
				if($value['recipe_title']){
					$data[]=array('recipe_id'=>$value['rid'],
						'title'=>$value['recipe_title'],
						'recipe_image'=>$value['image']?BASE_PATH."timthumb.php?src=uploads/".$value['image']:"",
						"prep_time"=>$value['prep_time']?$value['prep_time']:"",
						"cook_time"=>$value['cook_time']?$value['cook_time']:"",
						'dificulty_level'=>$value['diff_level']?$value['diff_level']:"",
						'serves'=>$value['serves']?$value['serves']:"",
						'spicy'=>$value['spicy']?$value['spicy']:"",
						'is_favorite'=>$value['fcount']?$value['fcount']:0,
						'video_url'=>$value['video_url'],
						'method'=>$value['method_html']?$value['method_html']:"",
						'ingredient_title'=>$value['title']?$value['title']:"",
						'recipe_type'=>$value['rt_title']?$value['rt_title']:"",
						'recipe_type_image'=>$value['rt_image']?BASE_PATH."timthumb.php?src=uploads/".$value['rt_image']:""
						);
				}
			}
			return $data;
		}
		
		public static function gettotalRecordsSearch($i,$r,$p,$u){
	
			global $conn;
						
		if($i && $r){
		$w="where recipe_type_id={$r} and ingredient_type_id ={$i} ";		
		}
		elseif($i){
		$w="where ingredient_type_id ={$i}";		
		}
		elseif($r){
		$w="where recipe_type_id={$r}";		
		}
		
		else{
		$w="where 1";		
		}
		
		
		if($p>75){
		$w1="and (cook_time+prep_time)>=75";
		}
		elseif(isset($p) && $p<=75 && $p!=0){
		$w1="and (cook_time+prep_time)<={$p}";
		}
		elseif($p==0){
		$w1="and 1";
		}
		else{
		$w1="and 1";
		}
		
			$sql="select count(temp.rid) as c from (select recipes.id as rid,recipes.title as recipe_title, recipes.image, recipes.prep_time, recipes.cook_time, recipes.diff_level, recipes.serves, recipes.spicy,recipes.video_url,ingredients.title,ingredients.recipe_id,recipe_type.title as rt_title, recipe_type.image as rt_image,(select count(favorites.id) from favorites where favorites.recipe_id=recipes.id and favorites.user_id=:user_id) as fcount from recipes left join ingredients on ingredients.recipe_id=recipes.id left join recipe_type on recipe_type.id=recipes.recipe_type_id $w $w1  group by rid ) as temp";
			
			$sth=$conn->prepare($sql);
			//$sth->bindValue("recipe_type_id",$r);
			$sth->bindValue('user_id',$u);
			//$sth->bindValue("ingredient_type_id",$i);
			//echo $sql;die;
			try{$sth->execute();}catch(Exception $e){
			/* echo $e->getMessage();*/ 
			}
			$result=$sth->fetchAll(PDO::FETCH_ASSOC);
			$data=$result[0]['c'];			
			return $data;
		}	

	public static function getAllFavorites($user_id) {
			global $conn;
			
			$sql="select recipes.id as rid, recipes.*,recipe_type.id as rtid, recipe_type.title as rt_title, recipe_type.image as rt_image,ingredients.title as i_title,aisles.title as a_title,ingredient_type.title as it_title,ingredient_type.image as it_image,(select count(recipe_views.id) from recipe_views where recipe_views.recipe_id=recipes.id) as views
			from recipes left join favorites on favorites.recipe_id=recipes.id left join recipe_type on recipe_type.id=recipes.recipe_type_id left join ingredients on ingredients.recipe_id=recipes.id left join aisles on aisles.id=ingredients.aisle_id left join ingredient_type on ingredient_type.id=ingredients.ingredient_type_id where favorites.user_id=:user_id";
			
			$sth=$conn->prepare($sql);
			$sth->bindValue("user_id",$user_id);
			
			try{$sth->execute();}catch(Exception $e){
			echo $e->getMessage();
			}
			$res=$sth->fetchAll(PDO::FETCH_ASSOC);
			
			foreach($res as $key=>$value){
				if(empty($final[$value['rid']])){
					$final[$value['rid']]=array('recipe_id'=>$value['rid'],
						'title'=>$value['title'],
						'recipe_image'=>$value['image']?BASE_PATH."timthumb.php?src=uploads/".$value['image']:"",
						"prep_time"=>$value['prep_time']?$value['prep_time']:"",
						"cook_time"=>$value['cook_time']?$value['cook_time']:"",
						'dificulty_level'=>$value['diff_level']?$value['diff_level']:"",
						'serves'=>$value['serves']?$value['serves']:"",
						'spicy'=>$value['spicy']?$value['spicy']:"",
						'video_url'=>$value['video_url'],
						'method'=>$value['method_html']?$value['method_html']:"",
						'recipe_type'=>$value['rt_title']?$value['rt_title']:"",
						'recipe_type_image'=>$value['rt_image']?BASE_PATH."timthumb.php?src=uploads/".$value['rt_image']:"",
						'views'=>$value['views']?$value['views']:0,
						'ingredients'=>array()
						);
				}
			

			   $final[$value['rid']]['ingredients'][]=array("title"=>$value['i_title']?$value['i_title']:"",
            "aisle_title"=>$value['a_title']?$value['a_title']:"",
            "ingredient_type_title"=>$value['it_title']?$value['it_title']:"",
            "ingredient_type_image"=>$value['it_image']?BASE_PATH."timthumb.php?src=uploads/".$value['it_image']:""
            );
            }
   
          $data=array();
          foreach($final as $key=>$value){
          $data[]=$value;
          }   
			return $data;
		}
		
	public static function getuserid($token) {
			global $conn;
			$sql="select id from users where token=:token";
			$sth=$conn->prepare($sql);
			$sth->bindValue("token",$token);
			
			try{$sth->execute();}catch(Exception $e){
			/*echo $e->getMessage();*/
			}
			$data=$sth->fetchAll(PDO::FETCH_ASSOC);
			return $data;
		}
		
	public static function fbsignin($uid,$email){
		global $conn;
	
	$sql="select users.id as uid,users.*, recipes.id as rid, recipes.*,recipe_type.id as rtid, recipe_type.title as rt_title, recipe_type.image as rt_image
	 from users left join favorites on favorites.user_id=users.id left join recipes on recipes.id=favorites.recipe_id left join recipe_type on recipe_type.id=recipes.recipe_type_id where (users.googleid=:googleid or users.fbid=:fbid) and users.email=:email";
	
	 
	$sth=$conn->prepare($sql);
	$sth->bindValue("fbid",$uid);
	$sth->bindValue("googleid",$uid);
	$sth->bindValue('email',$email);
	try{$sth->execute();}
	catch(Exception $e){
	//echo $e->getMessage();
	}
	$result=$sth->fetchAll(PDO::FETCH_ASSOC);
	
	
	if(count($result)){
	
		//$success="1";
		//$msg="Login successful";
	
		$code=md5($username.rand(1,9999999));
		
		$sth=$conn->prepare("update users set token=:token where email=:email and(fbid=:fbid or googleid=:googleid)");
		
		$sth->bindValue('email',$email);
		$sth->bindValue('token',$code);
		$sth->bindValue("fbid",$uid);
		$sth->bindValue("googleid",$uid);
		$count=0;
		try{$count=$sth->execute();}
		catch(Exception $e){}
		
		//get profile
			$data=array(
				"user_id"=>$result[0]['uid'],
				"fbid"=>$result[0]['fbid']?$result[0]['fbid']:"",
				"googleid"=>$result[0]['googleid']?$result[0]['googleid']:"",
				"name"=>$result[0]['name'],
				"email"=>$result[0]['email'],
				"access_token"=>$code
				
			);
			}
			return $data;
		}

        
	}
	?>