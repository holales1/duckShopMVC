<div>
    <div class="divAboutUs">
        <?php
            if(isset($_SESSION['message'])){
                echo $_SESSION['message'];
                unset($_SESSION['message']);
            }
        ?>
        <link rel="stylesheet" type="text/css" href="public/css/style.css">
        <h3>About US</h3>
        <div>
            <?php
                $about_us = $this->aboutUs;
                $description=$about_us[0]['description'];
                if(isset($_SESSION['isAdmin']) && $_SESSION['isAdmin']==1  ){
                    echo "<form action=".constant('URL')."aboutUs/updateAboutUs id='updateAboutUs' method='post'>";
                    echo "<input type='text' id='description' name='description' value='$description'><br>";
                }else{ 
                    echo $about_us[0]['description']; 
                }

            ?>
        </div>
        <br>
        <h3>Address</h3>
        <div>
            <?php
            $Address=$about_us[0]['Address'];
            if(isset($_SESSION['isAdmin']) && $_SESSION['isAdmin']==1  ){
                echo "<input type='text' id='Address' name='Address' value='$Address'><br>";
            }else{ 
                echo $about_us[0]['Address']; 
            }
                
            ?>
        </div>
        <br>
        <h3>Phone number</h3>
        <div>
            <?php
                $phoneNumber=$about_us[0]['phoneNumber'];
                if(isset($_SESSION['isAdmin']) && $_SESSION['isAdmin']==1  ){
                    echo "<input type='text' id='phoneNumber' name='phoneNumber' value='$phoneNumber'><br>";
                    
                }else{ 
                    echo $about_us[0]['phoneNumber']; 
                }
            
            ?>
        </div>
        <br>
        <h3>Open hour</h3>
        <div>
            <?php
                $openHour=$about_us[0]['openHour'];
                if(isset($_SESSION['isAdmin']) && $_SESSION['isAdmin']==1  ){
                    echo "<textarea rows='4' cols='50' name='openHour' form='updateAboutUs'>$openHour</textarea><br>";
                }else{ 
                    echo $about_us[0]['openHour']; 
                }
            ?>
        </div>
        <div>
            <?php
            if(isset($_SESSION['isAdmin']) && $_SESSION['isAdmin']==1  ){?>
            <input type="submit" class="update" name="submit" value="Update information about company">
            <?php echo "</form>";?>
            <?php }?>
        </div>
    </div>
    <div class="imgShop" >
        <img src="<?php echo constant('URL')?>public/img/duckShop.jpg"></img>
    </div>
</div>