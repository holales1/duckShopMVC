<?php
if (isset($_SESSION['message']) && !empty($_SESSION['message'])) {echo "<p>" . $_SESSION['message'] . "</p>";} 
if(!isset($_SESSION['UserID'])){
    echo "<p>You are not log in</p>";
}?>

<h2>Please login</h2>
<form action="<?php echo constant('URL')?>login/loginUser" method="post">
Email:
<input type="text" name="email" maxlength="30" value="" />
Password:
<input type="password" name="pass" maxlength="30" value="" />
<input type="submit" name="submit" value="Login" />
</form>
<a href="<?php echo constant('URL')?>login/registerPage">Register</a>
<a href="<?php echo constant('URL')?>login/logout">Log out</a>
