<div id="mainmenu">
    <a href="/">Home</a> |
    <!-- Different menues for logged and non-logged users -->
    <?php 
        if(Session::get("logged_user")) {
    ?>
        <a href="/dashboard">Dashboard</a> |
        <a href="/logout">Log out</a> 
        
    <?php } else {?>
         
        <a href="/login">Login</a> | 
        <a href="/register">Register</a> 
    
    <?php } ?>
    
</div>
<!-- TODO: do not include the view - read it and return it -->
<?php include("{$this->view}.php");