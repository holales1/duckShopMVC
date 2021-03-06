<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" type="text/css" href="public/css/style.css">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div>
        <div>
            <?php
            if(isset($_SESSION['message'])){
                echo $_SESSION['message'];
                unset($_SESSION['message']);
            }
            ?>
        </div>

        <?php
        $offer=$this->product_of_the_day;
        if(!empty($offer)){  
        ?>
        <h6>
        <div class="productTitle">Daily special offer</div>
        </h6>
            <?php    
                $ProductID=$offer[0]["ProductID"];
                $product_of_day = $offer;
            ?>
            <div>
                <?php
                if(isset($_SESSION['isAdmin']) && $_SESSION['isAdmin']==1  ){
                ?>
                
                <form method="post" action="<?php echo constant('URL')?>main/updateProductDay">
                    <div class="product-image">
                        <img src="<?php echo constant('URL')?>public/img/<?php echo $product_of_day[0]["image"]; ?>">
                    </div>
                    <div>
                        <strong><?php echo $product_of_day[0]["description"]; ?></strong>
                    </div>
                    <div class="product-price">
                    <?php
                        $price=intval($product_of_day[0]["price"]);
                        $finalPrice=$price/100*(100-intval($product_of_day[0]["percentage"]));
                        echo $finalPrice.".00 DKK"; 
                        ?>
                    </div>
                    <div>
                        <input type="submit" class="update" value="Update" class="addBtn" />
                    </div>
                </form>
                <?php
                }else{
                ?>
                <form method="post" action="<?php echo constant('URL')?>shopCar/addItem/<?php echo $product_of_day[0]["ProductID"]; ?>">
                    <div class="product-image">
                        <img src="<?php echo constant('URL')?>public/img/<?php echo $product_of_day[0]["image"]; ?>">
                    </div>
                    <div>
                        <strong><?php echo $product_of_day[0]["description"]; ?></strong>
                    </div>
                    <div class="product-price">
                    <?php
                        $price=intval($product_of_day[0]["price"]);
                        $finalPrice=$price/100*(100-intval($product_of_day[0]["percentage"]));
                        echo $finalPrice.".00 DKK"; 
                        ?>
                    </div>
                    <div>
                        <input type="hidden" value="<?php echo $finalPrice.".00" ?>" name="price"/>
                        <input type="text" name="quantity" value="1" size="2" />
                        <input type="submit" class="add" value="Add to cart" class="addBtn" />
                    </div>
                </form>
                <?php
                }
                ?>
            </div>
            <?php
            }
            ?>

    <div class="floatDiv">

        <div class="productTitle">Products</div>
        <?php
            if(!isset($_SESSION['isAdmin']) || $_SESSION['isAdmin']==0  ){
                $product_array=$this->product_array;
                if (!empty($product_array)) { 
                    foreach($product_array as $aNumber=> $value){
                        if($product_of_day[0]["ProductID"]==$product_array[$aNumber]["ProductID"]){
                            $product_array[$aNumber]["price"]=$finalPrice;
                            $product_array[$aNumber]["price"]=$product_array[$aNumber]["price"].".00";
                        }
                    
        ?>
        <div class="product-item">
            <form method="post" action="<?php echo constant('URL')?>shopCar/addItem/<?php echo $product_array[$aNumber]["ProductID"]; ?>">
                <div class="product-image">
                    <img src="<?php echo constant('URL')?>public/img/<?php echo $product_array[$aNumber]["image"]; ?>">
                </div>
                <div>
                    <strong><?php echo $product_array[$aNumber]["description"]; ?></strong>
                </div>
                <div class="product-price"><?php echo $product_array[$aNumber]["price"]." DKK"; ?>
                </div>
                <div>
                    <input type="hidden" value="<?php echo $product_array[$aNumber]["price"]; ?>" name="price"/>
                    <input type="number" name="quantity" value="1" size="2" max="10"/>
                    <input type="submit" class="add" value="Add to cart" class="addBtn" />
                </div>
            </form>
        </div>
        <?php
                }
                }
        }else{
            $product_array=$this->product_array_admin;
            if (!empty($product_array)) { 
                foreach($product_array as $aNumber=> $value){
        ?>
        <div class="product-item">
            <form method="post" action="<?php echo constant('URL')?>main/updatePage/<?php echo $product_array[$aNumber]["ProductID"]; ?>">
                <div class="product-image">
                    <img src="<?php echo constant('URL')?>public/img/<?php echo $product_array[$aNumber]["image"]; ?>">
                </div>
                <div>
                    <strong><?php echo $product_array[$aNumber]["description"]; ?></strong>
                </div>
                <div class="product-price"><?php echo $product_array[$aNumber]["price"]." DKK"; ?>
                </div>
                <div>
                    <input type="hidden" value="<?php echo $product_array[$aNumber]["ProductID"]; ?>" id="productID"/>
                    <input type="submit" class="update" value="Update" class="addBtn" />
                </div>
            </form>
            <div>
                <form method="post" action="<?php echo constant('URL')?>main/addDeleteDuck">
                    <input type="hidden" value="<?php echo $product_array[$aNumber]["ProductID"]; ?>" id="productID" name="productID"/>
                    <?php
                        if($product_array[$aNumber]["isAvaliable"]=="0"){
                    ?>
                            <input type="submit" class="delete" value="Delete" class="addBtn" />
                    <?php
                        }else{
                    ?>
                            <input type="submit" class="submit" value="Add" class="addBtn" />
                    <?php
                        }
                    ?>
                </form>
            </div>
        </div>
        <?php
                }
            }
        ?>
        <div class="container">
            <form method="post" action="<?php echo constant('URL')?>main/newProductPage">
                <input type="submit" class="submit" value="Add new product" class="addBtn" />
            </form>
        </div>
        
        <?php
        }
        ?>
    </div>

        <div class="floatDiv">
            
            <?php
                if(!isset($_SESSION['isAdmin']) || $_SESSION['isAdmin']==0  ){
                    $product_array_cheap=$this->product_array_cheap;
                    ?>
                    <div class="productTitle">Cheaper products</div>
                    <?php
                    if (!empty($product_array_cheap)) { 
                        foreach($product_array_cheap as $aNumber=> $value){
                        
            ?>
            <div class="product-item">
                <form method="post" action="<?php echo constant('URL')?>shopCar/addItem/<?php echo $product_array_cheap[$aNumber]["ProductID"]; ?>">
                    <div class="product-image">
                        <img  src="<?php echo constant('URL')?>public/img/<?php echo $product_array_cheap[$aNumber]["image"]; ?>">
                    </div>
                    <div>
                        <strong><?php echo $product_array_cheap[$aNumber]["description"]; ?></strong>
                    </div>
                    <div class="product-price"><?php echo $product_array_cheap[$aNumber]["price"]." DKK"; ?>
                    </div>
                    <div>
                        <input type="hidden" value="<?php echo $product_array_cheap[$aNumber]["ProductID"]; ?>" id="productID"/>
                        <input type="number" name="quantity" value="1" size="2" max="10"/>
                        <input type="submit" class="add" value="Add to cart" class="addBtn" />
                    </div>
                </form>
            </div>
            <?php
                    }
                }
            }
            ?>
        </div>
    </div>


    

</body>
</html>
