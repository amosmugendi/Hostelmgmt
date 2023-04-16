<?php 
    //this includes the session_start() to resume the session on this page. It identifies the session that neds to be desroyed
    include_once'includes/session.php'
?>
<?php 
    session_destroy();
    header('Location: index.php');
    
?>