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
           $arr = array("tumor_id"=> $row['id']);
           $source = array_slice($_POST, 8, 4);
           $source1 = array_merge((array)$arr, (array)$source);
           form::addUser($source1, "source");
           
           foreach ($_POST['treat'] as $value) {
                $query = mysql_query("INSERT INTO treatment VALUES('','{$row['id']}','{$value}')");
            }
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
    
    if($_GET['page'] == 'editpatientinfo'){
        $patient = new patient($_POST['id'],"");
        $patient->editPatient();
    }
    
    if($_GET['page'] == 'editpatientinfo1'){
        form::editUser($_POST, "patient","id",$_POST['id']);
    }
    
    if($_GET['page'] == 'editexaminfo'){
       $exam = new examination($_POST['id']);
       $exam->editExam();
    }
    
    if($_GET['page'] == 'editexaminfo1'){
        form::editUser($_POST, "examination","biopsy_number",$_POST['biopsy_number']);
    }
    
    if($_GET['page'] == 'edittumorinfo'){
        $tumor = new tumor($_POST['id']);
        $tumor->editTumor();
    }
    
    if($_GET['page'] == 'edittumorinfo1'){
        $tumor = array_slice($_POST, 0, 8);
        form::editUser($tumor, "tumor","id",$_POST['id']);
        echo $_POST['id'];
        $tumor1 = array_slice($_POST, 8, 4);
        form::editUser($tumor1, "source","tumor_id",$_POST['id']);
    }
    
    if($_GET['page'] == 'adduser'){
        $arr = array("password"=>  sha1("1234"));
        $user1 = array_merge((array)$_POST, (array)$arr);
        form::addUser($user1, "user");
    }
    
    if($_GET['page'] == 'addocc'){
      form::addUser($_POST, "occupation");
    }
    
    if($_GET['page'] == "addfoloup"){
       $arr = array("filling_date"=> date("Y-m-d"));
        $follow = array_merge((array)$_POST, (array)$arr);
        form::addUser($follow, "folow_up");
    }

    if($_GET['page'] == "deletepat"){
        echo "DELETE FROM patient WHERE id='{$_POST['id']}'";
        $query = mysql_query("DELETE FROM patient WHERE id='{$_POST['id']}'") or die(mysql_error());
    }
}
?>
