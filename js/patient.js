/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function(){
    $("#patientmenu").click(function(){
       
        $("#sidebar").html("<i class='fa fa-spinner fa-spin fa-lg'></i> Loading Menu..");
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
             $("#maincontents").html("<i class='fa fa-spinner fa-spin fa-lg'></i> Loading form...");
             $("#maincontents").load("includes/forms.php?page=userRegistration",function(){
                 
             });
         });
     
         $("#registerpatient").trigger("click");
        });
      
    });

$("#patientmenu").trigger("click");
});

