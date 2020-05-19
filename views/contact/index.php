<?php
    if(isset($_SESSION['message'])){
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
?>
<link rel="stylesheet" type="text/css" href="public/css/style.css">
<h1>How can we help you? </h1>

<form method="post" action="<?php echo constant('URL')?>contact/sendmail">
<div class="container">
<b><i> Email: </b></i>
<input type="text" class="email" name="email" placeholder="Type your email.." required/><br/>
</div>
<div class="container">
<b><i> Subject: </b></i>
<input type="text" class="subject" name="subject" placeholder="Add your subject.." required/><br/>
<b><i> Message: </b></i> <br/>
<textarea name="message" rows="15" cols="40" placeholder="Type here.." required>
</textarea><br/>
<input name="submit" class="submit" type="submit" value="Submit"/>

</form>
</div>