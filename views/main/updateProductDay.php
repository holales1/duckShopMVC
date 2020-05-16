<table style="width:100%">
  <tr>
    <th>Day</th>
    <th>Percentage</th>
    <th>ProductID</th>
  </tr>
  
  <?php
        $daysOfWeek=$this->productArrayDay;
        $allProducts=$this->allProducts;
        if (!empty($daysOfWeek)) { 
            foreach($daysOfWeek as $aNumber=> $value){
    ?>
    <tr>
        <form action="<?php echo constant('URL')?>main/updateProductDaySave" method="post">
          <td><input type="text" id="dayOfWeek" name="dayOfWeek" readonly="readonly" value="<?php echo $daysOfWeek[$aNumber]["dayOfWeek"]; ?>"></td>
          <td><input type="text" id="percentage" name="percentage" value="<?php echo $daysOfWeek[$aNumber]["percentage"]; ?>"></td>
          <!-- <td><input type="text" id="ProductID" name="ProductID" value="<?php echo $daysOfWeek[$aNumber]["ProductID"]; ?>"></td> -->
          <td><select id="ProductID" name="ProductID">
            <?php
            foreach($allProducts as $aaNumber=> $value){
                if($daysOfWeek[$aNumber]["ProductID"]==$allProducts[$aaNumber]["ProductID"]){
            ?>
                    <option selected value="<?php echo $allProducts[$aaNumber]["ProductID"]; ?>"><?php echo $allProducts[$aaNumber]["description"]; ?></option>
            
            <?php
                }else{
                    ?>
                    <option value="<?php echo $allProducts[$aaNumber]["ProductID"]; ?>"><?php echo $allProducts[$aaNumber]["description"]; ?></option>

                    <?php
                }
            }
            ?>
          </td>
          <td><input type="submit" name="submit" value="Submit"></td>
        </form>
    </tr>
    <?php }}?>
  
  
</table>