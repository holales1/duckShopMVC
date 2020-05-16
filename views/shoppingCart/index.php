<div id="shopping-cart">
    <div class="heading">Shopping Cart <a id="emptyBtn" href="<?php echo constant('URL')?>shopCar/removeAllItem">Empty Cart</a></div>
    <?php
    //Reset total cost to do recalc
    if(isset($_SESSION["cart_item"])){
        $item_total = 0;
    ?>	
    <table cellpadding="10" cellspacing="1">
        <tbody>
            <tr>
                <th><strong>Name  </strong></th>
                <th><strong>Image  </strong></th>
                <th><strong>Code  </strong></th>
                <th><strong>Quantity  </strong></th>
                <th><strong>Price  </strong></th>
                <th><strong>Action  </strong></th>
            </tr>	
            <?php		
                foreach ($_SESSION["cart_item"] as $item){
                    ?>
                        <form method="post" action="<?php echo constant('URL')?>shopCar/removeItem/<?php echo $item["ProductID"]; ?>">
                            <tr>
                            <td><strong><?php echo $item["description"]; ?></strong></td>
                            <td> <img src="<?php echo constant('URL')?>public/img/<?php echo $item["image"]; ?>"></td>
                            <td><?php echo $item["ProductID"]; ?></td>
                            <td><?php echo $item["quantity"]; ?></td>
                            <td><?php echo $item["price"]." DKK"; ?></td>
                            <td><input type="submit" value="Remove Item" class="addBtn" /></td>
                            </tr>
                        </form>
                            <?php
                    $item_total += ($item["price"]*$item["quantity"]);
                    
                    }
                    
                    ?>

            <tr>
                <td colspan="5" align=right><strong>Total:</strong> <?php echo $item_total." DKK"; ?></td>
            </tr>
        </tbody>
    </table>
    <?php
        }
    ?>
</div>
<div>
    <?php
        if(isset($_SESSION["cart_item"]) && isset($_SESSION['isAdmin'])){
            if($_SESSION['isAdmin']==0){
    ?>
    <form method="post" action="addOrder.php">
    
        <input type="submit" value="Order Product" class="addBtn">
    </form>
    <?php
            }
        }
    ?>
</div>