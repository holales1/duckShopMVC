<?php
    if(isset($_SESSION['message'])){
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
?>

<form method="post" action="<?php echo constant('URL')?>contact/sendmail">
Email:<input type="text" name="email" required/><br/>
Subject:<input type="text" name="subject" required/><br/>
Message:<br/>
<textarea name="message" rows="15" cols="40" required>
</textarea><br/>
<input name="submit" type="submit" value="Submit"/>

</form>