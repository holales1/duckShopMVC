<form action='<?php echo constant('URL')?>news/addNewsPage' id='addNewsPage' method='post' enctype="multipart/form-data">
    <label for="fname">title</label><br>
    <input type='text' id='title' name='title' required ><br>
    <label for="fname">description</label><br>
    <input type='number' id='description' name='description' required ><br>
    
    <input type="submit" class="submit" name="submit" value="Add News">
</form>