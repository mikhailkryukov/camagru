<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>

<!DOCTYPE html>
<html>
<head>
<style>
.head1 { grid-area: header; }
.main2 { grid-area: main; }
.right3 { grid-area: right; }
.footer4 { grid-area: footer; }
.logout5 { grid-area: logout; }

.grid-container {
  display: grid;
  grid-template-areas:
    'header header header header header logout'
    'main main main main main right'
    'footer footer footer footer footer footer';
  grid-gap: 3px;
  background-color: #eaa31e;
  padding: 3px;
}

.grid-container > div {
  background-color: rgba(255, 255, 255, 0.8);
  text-align: center;
  padding: 20px 0;
  font-size: 30px;
}

#container {
    margin: 0px auto;
    width: 500px;
    height: 375px;
    border: 1px #999 solid;
}
#videoElement {
    width: 500px;
    height: 375px;
    background-color: #666;
}
<link rel="stylesheet" type="text/css" media="screen" href="style.css">
</style>
</head>
<body>

<div class="grid-container">
  <div class="head1"  style="color: green;"><b>CAMAGRU</b></div>
  <div class="main2">
  <div id="container"><video autoplay="true" id="videoElement"></video></div>
  </div>
  <div class="logout5">
  <a href="index.php?logout='1'" style="color: red; font-size: 20px">Sign out</a>
  </div> 
  <div class="right3">Right</div>
  <div class="footer4" style="color: blue; font-size: 20px;">by mkryukov at 42.org @2019</div>
</div>


<script>
var video = document.querySelector("#videoElement");
 
if (navigator.mediaDevices.getUserMedia) {       
    navigator.mediaDevices.getUserMedia({video: true})
  .then(function(stream) {
    video.srcObject = stream;
  })
  .catch(function(err0r) {
    console.log("Something went wrong!");
  });
}
</script>

</body>
</html>

