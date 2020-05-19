<form action='<?php echo constant('URL')?>main/saveNewProductPage' id='updateProduct' method='post' enctype="multipart/form-data">
    <label for="fname">Description</label><br>
    <input type='text' id='description' name='description' required ><br>
    <label for="fname">Price</label><br>
    <input type='number' id='price' name='price' required ><br>
    <label for="fname">Image</label><br>
    <input type="file" name="imgfile" required >
    <br>
    <input type="submit" class="submit" name="submit" value="Add new product">
</form>