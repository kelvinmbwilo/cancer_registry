/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function(){
    $("#setupmenu").click(function(){
        
        
       $("#sidebar").html("<img src='img/loading.gif' /> Loading Menu..");
       $("#sidebar").load("includes/menus.php?page=setup",function(){
           $("#sidebar ul li").click(function(){
                $("#sidebar ul li").removeClass("active");
                $(this).addClass("active");
             });
            ///////////////////////////////////////////////////
            ////////////////////user Management////////////////
            ///////////////////////////////////////////////////
            $("#usermanagement").click(function(){
                 $("#submenus").load("includes/menus.php?page=User_Management",function(){
                    activateLinks();
                    $("#addUser").click(function(){
                        $("#maincontents").html("<img src='img/loading.gif' /> Loading form...");
                        $("#maincontents").load("includes/forms.php?page=addUser",function(){
                 
                        });
                    });
                
                    $("#searchuser").click(function(){
                        $("#maincontents").html("<img src='img/loading.gif' /> Loading form...");
                        $("#maincontents").load("includes/forms.php?page=SearchUser",function(){
                 
                        });
                    });
                 });           
            });
          
          $("#usermanagement").trigger("click");
        
        ///////////////////////////////////////////////////
        ////////////////////user Management////////////////
        ///////////////////////////////////////////////////
        $("#managelocation").click(function(){
             $("#submenus").load("includes/menus.php?page=Manage_Location",function(){
                    activateLinks();
             });           
         });
    
         ///////////////////////////////////////////////////
        ////////////////////user Management////////////////
        ///////////////////////////////////////////////////
        $("#manageoccu").click(function(){
             $("#submenus").load("includes/menus.php?page=Manage_Occupation",function(){
                 activateLinks();
             });           
        });
    
        ///////////////////////////////////////////////////
        ////////////////////user Management////////////////
        ///////////////////////////////////////////////////
        $("#reportstype").click(function(){
             $("#submenus").load("includes/menus.php?page=Report_Type",function(){
                 activateLinks();
             });           
        });
    
        });
    });
});

function activateLinks(){
   $("#submenus ul li").click(function(){
        $("#submenus ul li").removeClass("active");
        $(this).addClass("active");
     });
}
