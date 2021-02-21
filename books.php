
<head>
<link rel="stylesheet" href="projecft.css">
<style>

body{
    padding: 0;
    margin: 0;
   
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;

}
   #content{
       width: 70%;
   position: absolute;
 left: 25%;
   top: 10%;
  
	float:left;
font-size: 14px;
line-height: 14px;
   
   }
   /* form{
   	width: 50%;
   	margin: 20px auto;
   }
   form div{
   	margin-top: 5px;
   } */
   #img_div{
       
      float: left;
     overflow: hidden;
       width: 160px;

     
   	
   margin: 10px;
   	border: 1px solid #cbcbcb;
       border-radius: 3px;
   
   }
   #img_div:after{
   	content: "";
   	display: block;
   	clear: both;
   }
  #img_div img{
   object-fit: cover;

   width:160px;
   height: 200px;
  
	   
   	 
	 
	   
   }
   div.gallery {
  margin: 5px;
  border: 1px solid #ccc;
  border-radius:5px;
  float: left;
  width: 180px;
}



div.desc {
  padding: 15px;
  text-align: center;
}
#content #show{
    display: none;
}
.footer  {
    position: absolute;
    bottom: 0;
    text-align: center;
    color: #fff;
    color: grey;
    width: 100%;
    margin-bottom:-250px;
   
}
​​​ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color:red;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover {
  background-color:grey;
}

.topnav {
  overflow: hidden;
  background-color: blue;
}

.topnav li {
  float: right;
  color: #f2f2f2;
  text-align: center;
  padding: 1px 13px;
  text-decoration: none;
  font-size: 15px;
}

.topnav li:hover {
  background-color: #ddd;
  color: black;
}

.topnav li.active {
  background-color: #4CAF50;
  color: white;
}
</style>
</head>

<?php
  // Create database connection
  $db = mysqli_connect("localhost", "root", "", "image_upload");

  // Initialize message variable
  $msg = "";

  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
  	// Get image name
  	$image = $_FILES['image']['name'];
  	// Get text
    $title = mysqli_real_escape_string($db, $_POST['title']);
    $author = mysqli_real_escape_string($db, $_POST['author']);
	  $prix = mysqli_real_escape_string($db, $_POST['prix']);
	  $published = mysqli_real_escape_string($db, $_POST['published']);
	  $quantité = mysqli_real_escape_string($db, $_POST['quantité']);

  	// image file directory
  	$target = "picture/".basename($image);

    $sql = "INSERT INTO imagess (image, title, author , prix, published, quantité ) VALUES ('$image','$title','$author','$prix','$published','$quantité')";
  	// execute query
  	mysqli_query($db, $sql);

  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}
  }
  $result = mysqli_query($db, "SELECT * FROM imagess");
?>
<!DOCTYPE html>
<html>
<head>
<title>books.php</title>

</head>
<body>
<div class="topnav">
  <ul>
       <li><a class="active" href="indox.php">Home</a></li>
      <li><a href="index.php">contact-us</a></li>
   </ul>
</div>
<div class="container">

<div id="content">
  <?php
    while ($row = mysqli_fetch_array($result)) {
      echo "<div id='img_div'>";
      	echo "<img src='picture/".$row['image']."' >";
		echo "<div id='showw' ";
		 echo"<p>"."title is: ".$row['title']."</p>";
        // echo "<p>"."author is : ".$row['author']."</p>";
        // echo "<p>"."prix : ".$row['prix']."</p>";
        // echo "<p>"."published in : ".$row['published']."</p>";
        // echo "<p>"."quantite : ".$row['quantité']."</p>";
		echo "</div>";
       
      echo "</div>";
    }
  ?>
  <!-- <form method="POST"  enctype="multipart/form-data">
  	<input type="hidden" name="size" value="1000000">
  	<div>
  	  <input type="file" name="image" id="borderimg">
  	</div>
  	<div class="gallery">
      <input
      	id="text" 
      	cols="40" 
      	rows="4" 
      	name="title" 
      	placeholder="title..."></input>
        <input type="text"name="author" placeholder="author">
        <input type="text"name="prix" placeholder="prix">
        <input type="text"name="published" placeholder="published">
        <input type="text"name="quantité" placeholder="quantité">
        
  	</div>
  	<div>
  		<button type="submit" name="upload">POST</button>
  	</div>
  </form> -->
 
</div>
<script>
var show=document.getElementById("showw");
var click=document.getElementById("img_div");
click.onclick=function(){
show.style.display="block";
if(click.onclick)
show("img_div");
}
var i;
for (i = 0; i < show; i++);
</script>
<div class="foter"><footer class="footer">
library @copyrights 2020/2021
</footer></div>
</body>
</html>


