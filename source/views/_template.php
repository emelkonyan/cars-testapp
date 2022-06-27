<div id="mainmenu">
    <a href="/">Home</a> |
    
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
<?php include("{$this->view}.php");