
<?php $product=$this->product[0]; ?>
<form action='<?php echo constant('URL')?>main/registerProduct' id='updateProduct' method='post' enctype="multipart/form-data">
    <input type='hidden' id='ProductID' name='ProductID' value="<?php echo $product['ProductID']?>">
    <label for="fname">Description</label><br>
    <input required type='text' id='description' name='description' value="<?php echo $product['description']?>"><br>
    <label for="fname">Price</label><br>
    <input required type='number' id='price' name='price' value="<?php echo $product['price']?>"><br>
    <label for="fname">Image</label><br>
    <input required type="file" name="imgfile">
    <input type="submit" name="submit" value="Add new product">
</form>