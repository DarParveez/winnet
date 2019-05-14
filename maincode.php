<?php
if(isset($_GET['insert']))
{

 include('insert.php');
}
?>
 <?php if(isset($_GET['view'])){?>
<table width="999" align="center" border="3">
<tr>
<td align="center"  colspan="9" bgcolor="orange">
<h1>view All posts</h1> </td>
</tr>
<tr>
<th>post no:</th>
<th>post title:</th>
<th>post date:</th>
<th>post auther:</th>
<th>post image:</th>
<th>post content:</th>
<th>Edit:</th>
<th>Delete:</th>
</tr>
<?php
include('connect.php');
$i=1;
 if(isset($_GET['view'])){
    $query="SELECT * FROM posts order by 1 ASC";
 $run=mysqli_query($con,$query);
 while($row=mysqli_fetch_array($run))
 {
     $id=$row['post_id'];
     $title=$row['post_title'];
     $date=$row['post_date'];
     $author=$row['post_author'];
     $image=$row['post_image'];
     $content=$row['post_content'];
?>
<tr align="center">
<td><?php echo $i++?></td>
<td><?php echo $title ?></td>
<td><?php echo $date ?></td>
<td><?php echo $author ?></td>
<td><img src="images/<?php echo $image ?>"width="50" height="50"></td>
<td><?php echo $content ?></td>
<td><a href="edit.php?edit=<?php echo $id;?>">Edit</a></td>
<td><a href="delete.php?del=<?php echo $id;?>">Delete</a></td>

</tr>
<?php }}} ?>
 </table>