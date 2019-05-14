<?php
include('index.php');
include('connect.php');
$delete_id=$_GET['del'];
$delete_query="delete from posts where post_id='$delete_id'";
if(mysqli_query($con,$delete_query))
{
    echo"<script>alert('post has been Deleted')</script>";
   // echo "<script>window.open('index.php?deleted=A poat has been deleted..','_self')</script>";
    echo"<script>window.open('index.php?view=view','_self')</script>";
    }
?>