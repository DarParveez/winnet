<html>
     <head>
	   <title>welcome to CMS winternet</title>   
	   <link rel = "stylesheet" href="style.css">
	 </head>
      

<body>
<?php
include'connect.php';
$query="SELECT * FROM posts order by 1 DESC";
$run=mysqli_query($con,$query);
while($row=mysqli_fetch_array($run))
{
    $title=$row['post_title'];
    $date=$row['post_date'];
    $author=$row['post_author'];
    $image=$row['post_image'];
    $content=substr($row['post_content'],0,300);

?>
<h2><?php echo $title;?>
<h2><?php echo $date;?>
<h2><?php echo $author;?>
<h2><?php echo $image;?>
<?php echo "<img src=images/".$row['post_image']; echo " "; ?>
<p align="center"><?php echo $content;?></p>
<?php }?>

</body>
</html>

	 