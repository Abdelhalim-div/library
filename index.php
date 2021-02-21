<head>
<style>
  
  .style{
    width:50%;
    height:70%;
    position: relative;
        left: 300px;
  }
input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

textarea[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=email], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

button[type=submit] {
  width: 20%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

button[type=submit]:hover {
  background-color: #45a049;
}

div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
.footer {
    position: absolute;
    bottom: 0;
    text-align: center;
    color: #fff;
    color: black;
    width: 100%;
}
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
 
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 1px 16px;
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
  font-size: 17px;
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

if(isset($_POST['save'])){
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

require_once'mail.php';
$mail->setFrom($email, $name);
$mail->addAddress('fantasiband20@gmail.com');
// $mail->addCC('fantasiband20@gmail.com')  ;     // hada gha bach nsifto messag bzzaf  dlmrat
$mail->Subject = $subject ;
$mail->Body    = $message;
$mail->send();
header ("location:indox.php");
}

?>
<div class="topnav">
  <ul>
       <li><a class="active" href="indox.php">Home</a></li>
      <li><a href="books.php">books</a></li>
   </ul>
</div>
<div class=style>
<form method="POST">
<label for="name"></label>
<input type="text"name="name"placeholder="your_name"><br></br>

<label for="email"></label>
<input type="email"name="email"placeholder="your_email"><br></br>

<label for="subject"></label>
<input type="text"name="subject"placeholder="subject"><br></br>

<p>your message</p>
<textarea type="text" name="message" cols="5" ></textarea>

<button type="submit" name="save">send</button>

</form>
</div>

<footer class="footer">
library @copyrights 2020/2021
</footer>