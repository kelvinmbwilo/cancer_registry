<?php
if(isset($_GET['page'])){
    
    //////////////////////////////////////////////////////////
    ///////////// Main Navigation For Patient ///////////////
    /////////////////////////////////////////////////////////
    if($_GET['page'] == "patient"){
        ?>
        <ul class="nav nav-tabs nav-stacked">
            <li class="active" id="registerpatient"><a href="#"><i class="fa fa-plus-circle fa-lg"></i> Registration <i class="fa fa-chevron-right pull-right"></i></a></li>
            <li><a href="#"><i class="fa fa-stethoscope fa-lg"></i> Diagnosis <i class="fa fa-chevron-right pull-right"></i></a></li>
            <li><a href="#"><i class="fa fa-medkit fa-lg"></i> Examination <i class="fa fa-chevron-right pull-right"></i></a></li>
            <li><a href="#"><i class="fa fa-link fa-lg"></i> Followup <i class="fa fa-chevron-right pull-right"></i></a></li>
            <li><a href="#"><i class="fa fa-th fa-lg"></i> Encounter <i class="fa fa-chevron-right pull-right"></i></a></li>
          </ul>
<?php
    }
    
    //////////////////////////////////////////////////////////
    ///////////// Main Navigation For setup ///////////////
    /////////////////////////////////////////////////////////
    if($_GET['page'] == "setup"){
        ?>
        <ul class="nav nav-tabs nav-stacked">
            <li class="active" id="usermanagement"><a href="#"><i class="fa fa-user fa-lg"></i> User Management <i class="fa fa-chevron-right pull-right"></i></a></li>
            <li><a href="#" id="managelocation"><i class="fa fa-location-arrow fa-lg"></i> Manage Location <i class="fa fa-chevron-right pull-right"></i></a></li>
            <li><a href="#" id="manageoccu"><i class="fa fa-home fa-lg"></i> Manage Occupation <i class="fa fa-chevron-right pull-right"></i></a></li>
            <li><a href="#" id="reportstype"><i class="fa fa-file-text fa-lg"></i> Report Type <i class="fa fa-chevron-right pull-right"></i></a></li>
          </ul>
<?php
    }
    
     //////////////////////////////////////////////////////////
    ///////////// Sub Navigation For setup ///////////////
    /////////////////////////////////////////////////////////
    if($_GET['page'] == "User_Management"){
        ?>
        <ul class="nav nav-tabs">
            <li class="active"><a href="#"><i class="fa fa-plus-circle fa-lg"></i> Add User</a></li>
            <li><a href="#"><i class="fa fa-plus-circle fa-lg"></i> List User</a></li>
            <li><a href="#"><i class="fa fa-search fa-lg"></i> Search User</a></li>
          </ul>
    <?php
    }
    
    if($_GET['page'] == "Manage_Location"){
        ?>
        <ul class="nav nav-tabs">
            <li class="active"><a href="#"><i class="fa fa-plus-circle fa-lg"></i> Add Location</a></li>
            <li><a href="#"><i class="fa fa-plus-circle fa-lg"></i> List Location</a></li>
            <li><a href="#"><i class="fa fa-search fa-lg"></i> Search Location</a></li>
          </ul>
    <?php
    }
    
    if($_GET['page'] == "Manage_Occupation"){
        ?>
        <ul class="nav nav-tabs">
            <li class="active"><a href="#"><i class="fa fa-plus-circle fa-lg"></i> Add Occupation</a></li>
            <li><a href="#"><i class="fa fa-plus-circle fa-lg"></i> List Occupation</a></li>
            <li><a href="#"><i class="fa fa-search fa-lg"></i> Search Occupation</a></li>
          </ul>
    <?php
    }
    
    if($_GET['page'] == "Report_Type"){
        ?>
        <ul class="nav nav-tabs">
            <li class="active"><a href="#"><i class="fa fa-plus-circle fa-lg"></i>Add Report Type</a></li>
            <li><a href="#"><i class="fa fa-plus-circle fa-lg"></i>List Report Type</a></li>
            <li><a href="#"><i class="fa fa-search fa-lg"></i>Search Report Type</a></li>
          </ul>
    <?php
    }
     //////////////////////////////////////////////////////////
    ///////////// Main Navigation For Report///////////////
    /////////////////////////////////////////////////////////
    if($_GET['page'] == "report"){
        ?>
        <ul class="nav nav-tabs nav-stacked">
            <li class="active"><a href="#"><i class="fa fa-group fa-lg"></i> View Community Report <i class="fa fa-chevron-right pull-right"></i></a></li>
            <li><a href="#"><i class="fa fa-file-text fa-lg"></i> View Normal Report <i class="fa fa-chevron-right pull-right"></i></a></li>
<!--            <li><a href="#"><i class="fa fa-home fa-lg"></i> Manage Occupation <i class="fa fa-chevron-right pull-right"></i></a></li>
            <li><a href="#"><i class="fa fa-file-text fa-lg"></i> Report Type <i class="fa fa-chevron-right pull-right"></i></a></li>-->
          </ul>
<?php
    }
}
?>
