<html>
     <head>
	   <title>welcome to CMS winternet</title>
	   
	   <!--   .........css links  .....            -->
	   
	   
	   <link rel = "stylesheet" href="style.css">
	   
	   
	 </head>
      

<body>


<form method="post" action="insert.php" enctype="multipart/form-data">
<table align="center" border="10" width ="800">
     <tr>  
          <td align="center" colspan="5" bgcolor=#3983ad>
		  <h1>Insert new post</h1>	 </td> 
	 </tr>
      <tr>  
          <td> post Title: </td> 
		  <td> <input type ="text" name ="title"</td>
	 </tr>	
	 <tr>  
          <td> post Auther: </td> 
		  <td> <input type ="text" name ="author"</td>
	 </tr>
     <tr>  
          <td> post Image: </td> 
		  <td> <input type ="file" name ="image"</td>
	 </tr>	 
	  <tr>  
          <td> post Content: </td> 
		  <td> <textarea  name ="content" cols="74" rows="7"
		   ></textarea></td>
	   <tr>  
          <td align="center " colspan="5"><input type="submit" name="submit" value ="Publish Now" 
		  ></td>
	 </tr>	 

	 </tr>	   
		  
	 </tr>

</body>
</html>
<?php
include'connect.php';
if(isset($_POST['submit'])){
	$title= $_POST['title'];
	$author= $_POST['author'];
	$content=$_POST['content'];
	$image_name=$_FILES['image']['name'];
	$image_type=$_FILES['image']['type'];
	$image_size=$_FILES['image']['size'];
	$image_tmp=$_FILES['image']['tmp_name'];
	$date= date("d-m-y");
	
	
	
	 if($title ==''  or $content=='' or $author=='')
	 {
		echo"<script> alert('any feild is empty')</script>";
		exit();
	}
	   if($image_type=="image/jpeg" or $image_type=="image/png" or image_type=="image/gif" or $image_type=="image/jpg")
	   {
		if($image_size<=100000)
		{
		move_uploaded_file($image_tmp,"images/$image_name");
		}
		else
		{
		echo "<script>alert ('image is larger,only 100kb is allowed')</scrript>";
	        }
}
     else{
	      echo"<script>alert('image type is invalid')</script>";
         }
     //$query="INSERT INTO posts(`post_title`,`post_auther`, `post_image`,`post_content`, `post_date`) VALUES ('$title','$auther','$image','$content','$date')";
	 $query="INSERT INTO `posts`(`post_title`, `post_date`, `post_author`, `post_image`, `post_content`) VALUES ('$title','$date','$author','$image_name','$content')";
	 if(mysqli_query($con,$query))
	      {
		   echo"<script>alert('post has been inserted')</script>";
			 echo"<script>window.open('index.php?view=view','_self')</script>";
	       }
}
	
       
  
?>
	 