<?php
include_once '../includes/connection.php';
function __autoload($class_name) {
    include_once '../class/'. $class_name . '.php';
}
if(isset($_GET['page'])){
    if($_GET['page'] == 'login'){
        $user = new user($_POST['email']);
        if(sha1($_POST['pass']) == $user->getPassword()){
            echo success;
        }  else {
            echo "Incorrect Username Or Password";
        }
        
        
    }
}
?>
