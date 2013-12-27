<?php 
include 'includes/connection.php';
function getageCondition($age){
    $time = $age*365*24*3600;
    $today = date("Y-m-d");
    $timerange = strtotime($today) - $time;
    $start  = date("Y",$timerange)."-01-01";
    $end = (date("Y",$timerange)+1)."-01-01";
    $condition = "AND birth_date BETWEEN '{$start}' AND '{$end}'";
    return $condition;
}

function availableYears(){
    $query = mysql_query("SELECT addDate FROM person");
    $datearr = array(date("Y"));
    $i = 0;
    while ($row = mysql_fetch_array($query)) {
        $dat = strtotime($row['addDate']);
        $dat1 = date("Y", $dat);
        if(!in_array($dat1, $datearr)){
        $datearr[$i] = $dat1;
        $i++;
        }
        
    }
    asort($datearr,SORT_NUMERIC);
    return $datearr;
}

function maxAge($condition){
    $query = mysql_query("SELECT * FROM patient $condition");
    $datearr = array();
    while ($row = mysql_fetch_array($query)) {
        $dat = strtotime($row['date_of_birth']);
        $dat1 = date("Y", $dat);
        $datearr[] = $dat1;
    }
    $len = count($datearr)-1;
    rsort($datearr,SORT_NUMERIC);
    $age  = date("Y")-$datearr[$len];
    return $age;
}

//counting functions to count number of rows given a certain condition
function countColumn($table ,$condition){
    $query = mysql_query("SELECT * FROM {$table} {$condition}") or die(mysql_error());
    return mysql_num_rows($query);
}

//counting number of rows that containing a certain matching word
function countMatchingWords($table ,$condition, $column,$word){
    $query = mysql_query("SELECT * FROM {$table} {$condition}");
    $count =0;
    while ($row = mysql_fetch_array($query)) {
        extract($row);
        if(eregi($word,$$column)){
            $count++;
        }
    }
    return $count;
}

function createInArray($table,$condition,$column){
    $query = mysql_query("SELECT {$column} FROM {$table} {$condition}") or die(mysql_error());
    $str = "";
    while ($row = mysql_fetch_array($query)) {
        extract($row);
        $str .= "'".$$column."',";
    }
    $str .="'finish'";
    return $str;
}

function regionalCondition(){
    return "AND patient_id IN (".createInArray("patient","WHERE region = '{$_POST['reg']}'", "patient_id").") ";
}

function districtCondition(){
    return "AND patient_id IN (".createInArray("patient","WHERE district = '{$_POST['dist']}'", "patient_id").") ";
}

function genderCondition($gender){
    if($gender == "All Sex"){
        return "";
    }else{
    return "AND patient_id IN (".createInArray("patient","WHERE gender ='{$gender}'", "patient_id").") ";
    }
    } 
 function districtRegionGender(){
     $gender = ($_POST['gend'] == "All Sex")?"":" AND gender ='{$_POST['gender']}' ";
     $district = ($_POST['dist'] == "District")?"":" AND district = '{$_POST['dist']}' ";
     $region = ($_POST['reg'] == "Region")?"":" AND region = '{$_POST['reg']}' ";
     $condition = $gender  .$region . $district;
     return $condition;
 }
 
 function districtRegionGenderdeath(){
     $gender = ($_POST['gend'] == "All Sex")?"":"AND patient_id IN (".createInArray("patient","WHERE gender ='{$gender}'", "patient_id").") ";
     $district = ($_POST['dist'] == "District")?"":" AND patient_id IN (".createInArray("patient","WHERE district = '{$_POST['dist']}'", "patient_id").") ";
     $region = ($_POST['reg'] == "Region")?"":" AND patient_id IN (".createInArray("patient","WHERE region = '{$_POST['reg']}'", "patient_id").") ";
     $condition = $gender  .$region . $district;
     return $condition;
 }
 
 function districtRegioncond(){
     //$gender = ($_POST['gend'] == "All Sex")?"":" AND gender ='{$_POST['gender']}' ";
     $district = ($_POST['dist'] == "District")?"":" AND district = '{$_POST['dist']}' ";
     $region = ($_POST['reg'] == "Region")?"":" AND region = '{$_POST['reg']}' ";
     $condition = $region . $district;
     return $condition;
 }
 
 
 
 function districtRegionDeathcond(){
     //$gender = ($_POST['gend'] == "All Sex")?"":" AND gender ='{$_POST['gender']}' ";
     $district = ($_POST['dist'] == "District")?"":" AND patient_id IN (".createInArray("patient","WHERE district = '{$_POST['dist']}'", "patient_id").") ";
     $region = ($_POST['reg'] == "Region")?"":" AND patient_id IN (".createInArray("patient","WHERE region = '{$_POST['reg']}'", "patient_id").") ";
     $condition = $region . $district;
     return $condition;
 }
 
 function timeCondition(){
     if($_POST['from'] == "" || $_POST['to'] == ""){
         return "";
     }  else {
         return " AND patient_status BETWEEN '".strtotime($_POST['from'])."' AND '".strtotime($_POST['to'])."' ";
     }
 
}

function timeDeathCondition(){
    if($_POST['from'] == "" || $_POST['to'] == ""){
         return "";
     }  else {
         return " AND last_contact  BETWEEN '{$_POST['from']}' AND '{$_POST['to']}' ";
     }
    
 
}

function moreCondition(){
    $diagno = ($_POST['diagno'] == "Basis Of Diagnosis")?"":" AND patient_id IN (".createInArray("tumor","WHERE basis_diagnosis = '{$_POST['diagno']}'", "patient_id").") ";
    $topo = ($_POST['topo'] == "Topography")?"":" AND patient_id IN (".createInArray("tumor","WHERE topograph = '{$_POST['topo']}'", "patient_id").")";
    $morpho = ($_POST['morpho'] == "Morphology")?"":" AND patient_id IN (".createInArray("tumor","WHERE morphology = '{$_POST['morpho']}'", "patient_id").") ";
    $stage = ($_POST['stage'] == "Stage")?"":" AND patient_id IN (".createInArray("tumor","WHERE ICD_10 = '{$_POST['stage']}'", "patient_id").")";
    $treat = ($_POST['treat'] == "Treatment")?"":" AND patient_id IN (".createInArray("tumor","WHERE id IN (".createInArray("treatment","WHERE treatment ='{$_POST['treat']}'", "tumor_id").")", "patient_id").") ";
    $behav = ($_POST['behav'] == "Behevior")?"":" AND patient_id IN (".createInArray("tumor","WHERE behavior = '{$_POST['behav']}'", "patient_id").") ";
    return $diagno.$topo.$morpho.$stage.$treat.$behav;
}

function moreConditionDeath(){
    
}
?>