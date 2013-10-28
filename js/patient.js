/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function(){
    $("#patientmenu").click(function(){
       
        $("#sidebar").html("<img src='img/loading.gif' /> Loading Menu..");
        $("#sidebar").load("includes/menus.php?page=patient",function(){
            $("#sidebar ul li").click(function(){
                $("#sidebar ul li").removeClass("active");
                $(this).addClass("active");
             });
         
         ///////////////////////////////////////////////////////
         ////////////User Registration /////////////////////////
         ///////////////////////////////////////////////////////
         $("#registerpatient").click(function(){
             $("#submenus").html("");
             $("#maincontents").html("<img src='img/loading.gif' /> Loading form...");
             $("#maincontents").load("includes/forms.php?page=userRegistration",function(){
                 
             });
         });
     
         ///////////////////////////////////////////////////////
         ////////////Patient Diagnosis /////////////////////////
         ///////////////////////////////////////////////////////
         $("#patiDiagnosis").click(function(){
             $("#submenus").html("");
             $("#maincontents").html("<img src='img/loading.gif' /> Loading form...");
             $("#maincontents").load("includes/forms.php?page=patDiagnosis",function(){
                 $("#Date_Of_Incidence").datepicker({
                    changeMonth: true,
                    changeYear: true,
                    dateFormat:"yy-mm-dd"
                });
             });
         });
     
        ///////////////////////////////////////////////////////
         ////////////Patient examination //////////////////////
         ///////////////////////////////////////////////////////
         $("#patiexamination").click(function(){
             $("#submenus").html("");
             $("#maincontents").html("<img src='img/loading.gif' /> Loading form...");
             $("#maincontents").load("includes/forms.php?page=Examination",function(){
                 
             });
         });
     
        ///////////////////////////////////////////////////////
         ////////////Patient followup //////////////////////
         ///////////////////////////////////////////////////////
         $("#followup").click(function(){
             $("#submenus").html("");
             $("#maincontents").html("<img src='img/loading.gif' /> Loading form...");
             $("#maincontents").load("includes/forms.php?page=follow_up",function(){
                 
             });
         });
     
         ///////////////////////////////////////////////////////
         //////////////////////Encounter //////////////////////
         ///////////////////////////////////////////////////////
         $("#encounter").click(function(){
             $("#submenus").html("");
             $("#maincontents").html("<img src='img/loading.gif' /> Loading form...");
             
         });
         $("#registerpatient").trigger("click");
        });
      
    });

$("#patientmenu").trigger("click");
});

