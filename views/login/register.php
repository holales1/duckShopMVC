
<?php
if (!empty($message)) {echo "<p>" . $message . "</p>";}
?>

<h1>Create New User</h1>

<form action="<?php echo constant('URL')?>/login/registerUser" method="post">
<div class="container">
Email:
<input type="text" class="email" name="email" maxlength="30" value="" />
</div>
<div class="container">
Password:
<input type="password" name="pass" maxlength="30" value="" />
<br>
<br>
<input type="submit" class="login" name="submit" value="Create" />
</div>
</form>