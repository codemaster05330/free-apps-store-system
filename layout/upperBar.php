<div id="upperBar">    
<?php

if(isset($_GET['logout']))
{
    logout();
    header("location:./");
    exit();
}

if(!isset($Dir))
{
    $Dir="./";
}
include_once( $Dir.'includes/login.functions.php');

?>



</div>

<!-- upper navigation bar-->
<nav class="navbar m-navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="row">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                   <?php  echo '<a href="'.$Dir.'/index.php" class="navbar-brand">Free Apps Store</a>';?>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        
                         
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <?php
//include_once('./includes/login.functions.php');

if(isSignedIn())
{
    echo '<li class="dropdown">';
    echo '<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                   '.$_SESSION['firstName'].'<span class="caret"></span>
                                </a>';
    echo '<ul class="dropdown-menu">';
    //echo 'wellcome '. $_SESSION['firstName'];

    echo '<li> <a href="'.$Dir.'user/index.php" id="hrefBtn">Profile</a> </li>';
    if($_SESSION['userLevel']==0)
    {
        echo '<li><a href="'.$Dir.'admin/index.php" id="hrefBtn">Admin Dashboard</a></li>';
    }
    elseif($_SESSION['userLevel']==1)
    {
        echo '<li><a href="'.$Dir.'developer/index.php" id="hrefBtn">Developer Dashboard</a></li>';
    }
    echo '<li><a href="?logout" id="hrefBtn">logout</a></li>';
    echo '</ul></li>';
}
else
{
    echo '<li><a href="./signup.php">Register</a></li>
                        <li><a href="./login.php">Login</a></li>';
}
?>
                       
                         
                        
                         

                            
                                

                                
                                    
                                    
                                
                       
                        
                        
                    </ul>
                </div>
                </div>
            </div>
        </nav>