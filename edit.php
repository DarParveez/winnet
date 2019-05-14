<html>
<?php include("head.php"); ?>
<body>
<?php
//include('index.php');
include('connect.php');
include('maincode.php');


$edit_id = @$_GET['edit'];

$query="select * from posts where post_id='$edit_id'";

$run=mysqli_query($con,$query);

while($row=mysqli_fetch_array($run))
 {

     $edit_id1=$row['post_id'];
     $title=$row['post_title'];
     $date=$row['post_date'];
     $author=$row['post_author'];
     $image=$row['post_image'];
     $content=$row['post_content'];
?>
<?php include("head.php"); ?>
<form method="post" action="edit.php?edit_form=<?php echo  $edit_id1;?>" enctype="multipart/form-data">
<table align="center" border="10" width ="800">
     <tr>  
          <td align="center" colspan="5" bgcolor=#3983ad>
		  <h1>Editing post</h1>	 </td> 
	 </tr>
      <tr>  
          <td> post Title: </td> 
		  <td> <input type ="text" name ="title" value="<?php echo $title;?>"</td>
	 </tr>	
	 <tr>  
          <td> post Auther: </td> 
		  <td> <input type ="text" name ="author"value="<?php echo $author;?>"</td>
	 </tr>
     <tr>  
          <td> post Image: </td> 
		  <td> <input type ="file" name ="image"</td>
          <img src="images/<?php echo $image;?>" width="60" height="60">
	 </tr>	 
	  <tr>  
          <td> post Content: </td> 
		  <td> <textarea  name ="content" cols="74" rows="7" ><?php echo $content;?></textarea></td>
	   <tr>  
          <td align="center " colspan="5"><input type="submit" name="update" value ="Update Now" 
		  ></td>
	 </tr>	 
	 
	 </tr>	   
<?php } ?>
		  </table>
          </form>
          </body>
          </html>

<?php
if(isset($_POST['update']))
{
    $update_id=$_GET['edit_form'];
    $post_title=$_POST['title'];
    $post_date=date('y-m-d');
    $post_author=$_POST['author'];
    $post_content=$_POST['content'];
    $post_image=$_FILES['image']['name'];
    $post_image_type=$_FILES['image']['type'];
    $post_image_size=$_FILES['image']['size'];
    $post_image_tmp=$_FILES['image']['tmp_name'];
    move_uploaded_file($post_image_tmp,"images/$post_image");
    $update_query= "update posts set post_title='$post_title',post_date='$post_date',post_author='$post_author',post_image='$post_image',post_content='$post_content' where post_id='$update_id'";
    if(mysqli_query($con,$update_query))
    {
        echo"<script>alert('post has been updated')</script>";
        echo"<script>window.open('index.php?view=view','_self')</script>";
    }
}
?>
