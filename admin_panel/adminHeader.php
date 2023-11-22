<?php
   session_start();
   include_once "./config/dbconnect.php";

?>
 <!-- nav -->
 <nav  class="navbar navbar-expand-lg navbar-light px-5" style="background-color: #97CFCF;">
    
    <a class="navbar-brand ml-5" href="./index.php">
        <img src="./assets/images/thu2.jpg" width="100" height="100" alt="Swiss Collection">
        <h2 style="font-size: 20px; font-style: italic; color: #fff; display: flex; justify-content: center; align-items: center; padding-top:10px">Shop hoa Bapne</h2>
    </a>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0"></ul>
    
    <div class="user-cart">  
        <?php           
        if(isset($_SESSION['user_id'])){
          ?>
          <a href="" style="text-decoration:none;">
            <i class="fa fa-user mr-5" style="font-size:30px; color:#5C6898;" aria-hidden="true"></i>
         </a>
          <?php
        } else {
            ?>
            <a href="" style="text-decoration:none;">
                    <i class="fa fa-sign-in mr-5" style="font-size:30px; color:#5C6898;" aria-hidden="true"></i>
            </a>

            <?php
        } ?>
    </div>  
</nav>
