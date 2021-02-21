<!DOCTYPE html>
<html lang="en">
<head>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@600&display=swap" rel="stylesheet">
   
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="project.css">
  
</head>
<body>
  
<div class="navbar">
  <ul>
  <li><a class="active" href="index.php">contact-us</a></li>
  <li><a href="books.php">Books</a></li>
  <p   left: 5% ;> lebrery</p>
</ul>
<div class="text">
<p>read <br><span class="more">more</span> <span class="books"> books</span></p>

</div>

<div class="background">
 
  <form action=""method="post">
    <input type="text" name="search" id="" placeholder="search your books"require>
    <input type="submit" name="submit"placegolder="search">
  </form>
   
   </div>
   <footer class="footer">
library @copyrights 2020/2021
</footer>
   
 
 
  


<?php

$con = new PDO("mysql:host=localhost;dbname=image_upload",'root','');

if (isset($_POST["submit"])) {
	    $str = $_POST["search"];
	    $sth = $con->prepare("SELECT * FROM `imagess` WHERE title = '$str'");

 	$sth->setFetchMode(PDO:: FETCH_OBJ);
	$sth -> execute();

	if($row = $sth->fetch())
	{
		?>
		<br><br><br>
		<table>
		<div class="container">

<div id="content">
<?php echo "<div id='img_div'>"; ?>
 <?php echo "<img src='picture/".$row->image."'";?>
 <?php echo "<div id='showw' "; ?>
				<P><?php echo $row->title; ?></P>
				<p><?php echo $row->author;?></P>
        <p><?php echo $row->prix;?></P>
        <?php  echo "</div>";?>
        <?php  echo "</div>";?>
        
       
		
<?php 
	}
		
		
		else{
      echo "<h1>title  Does not exist</h1>;";
      
		}
}

?>

<!-- <body>
<div class="container">

<div id="content"> -->
  <?php
    // while ($row = mysqli_fetch_array($result)) {
    //   echo "<div id='img_div'>";
    //   	echo "<img src='picture/".$row['image']."' >";
		// echo "<div id='showw' ";
		//  echo"<p>"."title is: ".$row['title']."</p>";
        // echo "<p>"."author is : ".$row['author']."</p>";
        // echo "<p>"."prix : ".$row['prix']."</p>";
        // echo "<p>"."published in : ".$row['published']."</p>";
        // echo "<p>"."quantite : ".$row['quantité']."</p>";
		// echo "</div>";
       
    //   echo "</div>";
  //   }
  // ?>


    