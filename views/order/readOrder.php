

<link rel="stylesheet" type="text/css" href="public/css/style.css">
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
            $item_total = 0;		
            foreach ($this->orderProducts as $item){
                ?>
                <tr>
                    <td><strong><?php echo $item["description"]; ?></strong></td>
                    <td> <img src="<?php echo constant('URL')?>public/img/<?php echo $item["image"]; ?>"></td>
                    <td><?php echo $item["ProductID"]; ?></td>
                    <td><?php echo $item["quantity"]; ?></td>
                    <td><?php echo $item["price"]." DKK"; ?></td>
                </tr>
        <?php
                $item_total += ($item["price"]*$item["quantity"]); 
            }
                
        ?>

        <tr>
            <td colspan="5" align=right><strong>Total:</strong> <?php echo $item_total." DKK"; ?></td>
        </tr>
    </tbody>
</table>