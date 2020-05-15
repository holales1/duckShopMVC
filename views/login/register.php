<h2>Create New User</h2>

<form action="<?php echo constant('URL')?>login/registerUser" method="post">
Email:
<input type="text" name="email" maxlength="30" value="" />
Password:
<input type="password" name="pass" maxlength="30" value="" />
<input type="submit" name="submit" value="Create" />
</form>