<?php
            if(isset($_SESSION['message'])){
                echo $_SESSION['message'];
                unset($_SESSION['message']);
            }
        ?>  

    <link rel="stylesheet" type="text/css" href="public/css/style.css">

</head>
    <body>

        <div class="container">

               
                 <h1>Latest news</h1>
          
                 <br>

             <div class="news">

            <h2>
            <a>  
                 <?php
                
                $latestNews = $this->news;
                $title=$latestNews[1]['title'];
                if(isset($_SESSION['isAdmin']) && $_SESSION['isAdmin']==1  ){
                    
                    echo "<form action=".constant('URL')."news/updateNews id='updateNews' method='post'>";
                    echo "<input type='text' id='title' name='title' value='$title'><br>";
                }else{ 
                    echo $latestNews[1]['title']; 
                    
                }

                 ?>
           
            </a>
            <hr>
            </h2>

            <p>
                 <?php
                 $description=$latestNews[1]['description'];
                if(isset($_SESSION['isAdmin']) && $_SESSION['isAdmin']==1  ){
                     echo "<input type='text' id='description' name='description' value='$description'><br>";
                }else{ 
                     echo $latestNews[1]['description']; 
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


       <div class="news">
       <h2>
            <a>  
                 <?php
                
                $latestNews = $this->news;
                $title=$latestNews[0]['title'];
                if(isset($_SESSION['isAdmin']) && $_SESSION['isAdmin']==1  ){
                    
                    echo "<form action=".constant('URL')."news/updateNews id='updateNews' method='post'>";
                    echo "<input type='text' id='title' name='title' value='$title'><br>";
                }else{ 
                    echo $latestNews[0]['title']; 
                    
                }

                 ?>
           
            </a>
            <hr>
            </h2>

            <p>
                 <?php
                 $description=$latestNews[0]['description'];
                if(isset($_SESSION['isAdmin']) && $_SESSION['isAdmin']==1  ){
                     echo "<input type='text' id='description' name='description' value='$description'><br>";
                }else{ 
                     echo $latestNews[0]['description']; 
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
       
        </div>
        <br>
        <?php
          if(isset($_SESSION['isAdmin']) && $_SESSION['isAdmin']==1  ){?>
            <div class="wrapper">
            <form method="post" action="<?php echo constant('URL')?>news/addNewsPage">
                <input type="submit" class="submit" value="Add news" class="addBtn" />
            </form>
        </div>
          <?php }?>
     

     </body>
    
</html>