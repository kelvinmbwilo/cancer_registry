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
    
    if($_GET['page'] == 'patient_reg'){
      form::addUser($_POST, "patient");
    }
    
    if($_GET['page'] == 'tumor_reg'){
       $output = array_slice($_POST, 0, 8);
       form::addUser($output, "tumor");
       $query = mysql_query("select * from tumor order by id desc limit 1");
       while ($row = mysql_fetch_array($query)) {
           echo $row['id'];
           $arr = array("tumor_id"=> $row['id']);
           $source = array_slice($_POST, 8, 4);
           $source1 = array_merge((array)$arr, (array)$source);
           form::addUser($source1, "source");
       }
    }
    
    if($_GET['page'] == 'examination'){
       form::addUser($_POST, "examination");
    }
    
    if($_GET['page'] == 'patientinfo'){
        $patient = new patient("",$_POST['id']);
        $patient->viewBasicInfo();
    }
    
    if($_GET['page'] == 'patientinfo1'){
        $patient = new patient($_POST['id'],"");
        $patient->viewBasicInfo();
    }
    
    if($_GET['page'] == 'adduser'){
        $arr = array("password"=>  sha1("1234"));
        $user1 = array_merge((array)$_POST, (array)$arr);
        form::addUser($user1, "user");
    }
    
    if($_GET['page'] == 'addocc'){
      form::addUser($_POST, "occupation");
    }
}
?>
