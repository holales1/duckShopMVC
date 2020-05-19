<?php
    if(isset($_SESSION['message'])){
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
?>  

<link rel="stylesheet" type="text/css" href="<?php echo constant('URL')?>public/css/style.css">



<div class="container">

        
    <h1>Latest news</h1>
    
    <br>

    <?php
    if(isset($this->news)){

        $latestNews = $this->news;
        foreach($latestNews as $aNumber=> $value){
        ?>

        <div class="news">

            <h2>
                <a>  
                    <?php
                    
                    
                    $title=$latestNews[$aNumber]['title'];
                    if(isset($_SESSION['isAdmin']) && $_SESSION['isAdmin']==1  ){
                        
                        echo "<form action=".constant('URL')."news/updateNews id='updateNews' method='post'>";
                        echo "<input type='text' id='title' name='title' value='$title'><br>";
                        echo "<input type='hidden' id='NewsID' name='NewsID' value='{$latestNews[$aNumber]['NewsID']}'><br>";
                    }else{ 
                        echo $latestNews[$aNumber]['title']; 
                        
                    }

                    ?>
            
                </a>
                <hr>
            </h2>

            <p>
                <?php
                $description=$latestNews[$aNumber]['description'];
                if(isset($_SESSION['isAdmin']) && $_SESSION['isAdmin']==1  ){
                    echo "<input type='text' id='description' name='description' value='$description'><br>";
                }else{ 
                    echo $latestNews[$aNumber]['description']; 
                }
                
                ?>
            </p>
            <br>
            <?php
            if(isset($_SESSION['isAdmin']) && $_SESSION['isAdmin']==1  ){?>
            <input type="submit" class="submit" name="submit"  value="Update News">
            <?php echo "</form>";?>
            <?php }?>
        

                
        </div>
        <br>
        <br>

        <?php
        }
    }
    ?>

    <?php
        if(isset($_SESSION['isAdmin']) && $_SESSION['isAdmin']==1  ){?>
        <div class="wrapper">
            <form method="post" action="<?php echo constant('URL')?>news/addNewsPage">
                <input type="submit" class="submit" value="Add news" class="addBtn" />
            </form>
        </div>
    <?php }?>
</div>
        