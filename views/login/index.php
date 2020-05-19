<?php
if (isset($_SESSION['message']) && !empty($_SESSION['message'])) {echo "<p>" . $_SESSION['message'] . "</p>";} 
if(!isset($_SESSION['UserID'])){
    echo "<p>You are not log in</p>";
}?>
<link rel="stylesheet" type="text/css" href="public/css/style.css">
<h1>Please login</h1>
<form action="<?php echo constant('URL')?>login/loginUser/main/index" method="post">

<div class="container">
Email:
<input type="text" class="email" name="email" maxlength="30" value="" />
</div>
<div class="container">
Password:
<input type="password" name="pass" maxlength="30" value="" />
<br>
<br>
<input type="submit" class="login" name="submit" value="Login" />
</div>
</form>

<div class="container">
 
    

<form action="http://localhost/duckShopMVC/login/registerPage">
    <input type="submit" class="register" value="Register">
</form>
<!--<a href= "<?php echo constant('URL')?>login/registerPage">Register</a>
<br> -->

<form action="http://localhost/duckShopMVC/login/logout">
    <input type="submit" class="logout" value="Logout">
</form>
    
<!--<a href="<?php echo constant('URL')?>login/logout">Log out</a>
</div> -->
