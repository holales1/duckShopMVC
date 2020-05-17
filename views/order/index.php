<div >
    <div class="column">
        <form method="post" action="<?php echo constant('URL')?>order" >
            <select id="users" name="users">
                <?php
                    $allUsers=$this->users_array;
                    foreach($allUsers as $aaNumber=> $value){
                    ?>
                        <option selected value="<?php echo $allUsers[$aaNumber]["UserID"]; ?>"><?php echo $allUsers[$aaNumber]["email"]; ?></option>
                    <?php
                    }
                    ?>
            </select>
            <input type="submit" name="submit" value="Submit">
        </form>
    </div>
    <div class="column">
        <table style="width:100%">
            <tr>
                <th>Order ID</th>
                <th>Date</th> 
            </tr>
            <?php
            if(isset($this->orders_array)){      
                $allOrders=$this->orders_array;;
                foreach($allOrders as $aNumber=> $value){
                ?>
                    <form method="post" action="<?php echo constant('URL')?>order/readOrder/<?php echo $allOrders[$aNumber]["OrderID"];?>" >
                        <tr>
                            <td><?php echo $allOrders[$aNumber]["OrderID"]; ?></td>
                            <td><?php echo $allOrders[$aNumber]["orderDate"]; ?></td>
                            <td><input type="submit" name="submit" value="Read order"></td>
                        </tr>
                    </form>
                <?php
                }
            }else{
                echo "This user has no orders";
            }
            ?>
        </table>
    </div>
</div>