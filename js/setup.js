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
                    
                    $("#addUser").trigger("click");
                    
                    $("#searchuser").click(function(){
                        $("#maincontents").html("<img src='img/loading.gif' /> Loading form...");
                        $("#maincontents").load("includes/forms.php?page=SearchUser",function(){
                           $("#myTable").tablesorter();
                           $("#edit_user").click(function(){
                               $("#maincontents").html("<img src='img/loading.gif' /> Loading form...");
                               $("#maincontents").load("includes/forms.php?page=Edit_User",function(){
                            });
                        });
                    });
                 });
                  
                   $("#listuser").click(function(){
                        $("#maincontents").html("<img src='img/loading.gif' /> Loading form...");
                        $("#maincontents").load("includes/processes.php?page=list_user",function(){
                           $("#myTable").tablesorter();
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
                    $("#addLocation").click(function(){
                        $("#maincontents").html("<img src='img/loading.gif' /> Loading form...");
                        $("#maincontents").load("includes/forms.php?page=addLocation",function(){
                           
                        });
                    });
                
                $("#listLocation").click(function(){
                        $("#maincontents").html("<img src='img/loading.gif' /> Loading form...");
                        $("#maincontents").load("includes/processes.php?page=list_Location",function(){
                           $("#myTable").tablesorter();
                        });
                    });
                
                $("#searchlocation").click(function(){
                        $("#maincontents").html("<img src='img/loading.gif' /> Loading form...");
                        $("#maincontents").load("includes/forms.php?page=SearchLocation",function(){
                           $("#myTable").tablesorter();
                           $("#edit_user").click(function(){
                               $("#maincontents").html("<img src='img/loading.gif' /> Loading form...");
                               $("#maincontents").load("includes/forms.php?page=Edit_Location",function(){
                            });
                           });
                        });
                    });
                
                
                    $("#addLocation").trigger("click");
             });           
         });
    
         ///////////////////////////////////////////////////
        ////////////////////user Management////////////////
        ///////////////////////////////////////////////////
        $("#manageoccu").click(function(){
             $("#submenus").load("includes/menus.php?page=Manage_Occupation",function(){
                 activateLinks();
                  $("#addOccupation").click(function(){
                        $("#maincontents").html("<img src='img/loading.gif' /> Loading form...");
                        $("#maincontents").load("includes/forms.php?page=addOccupation",function(){
                           $("#myTable").tablesorter();
                        });
                    });
                
                $("#listOccupation").click(function(){
                        $("#maincontents").html("<img src='img/loading.gif' /> Loading form...");
                        $("#maincontents").load("includes/processes.php?page=list_Occupation",function(){
                           $("#myTable").tablesorter();
                        });
                    });
                
                
                 $("#searchOccupation").click(function(){
                        $("#maincontents").html("<img src='img/loading.gif' /> Loading form...");
                        $("#maincontents").load("includes/forms.php?page=SearchOccupation",function(){
                           $("#myTable").tablesorter();
                           $("#edit_user").click(function(){
                               $("#maincontents").html("<img src='img/loading.gif' /> Loading form...");
                               $("#maincontents").load("includes/forms.php?page=Edit_Occupation",function(){
                            });
                           });
                        });
                    });
                
                 $("#addOccupation").trigger("click");
             });           
        });
    
        ///////////////////////////////////////////////////
        ////////////////////user Management////////////////
        ///////////////////////////////////////////////////
        $("#reportstype").click(function(){
             $("#submenus").load("includes/menus.php?page=Report_Type",function(){
                 activateLinks();
                 $("#addReport").click(function(){
                        $("#maincontents").html("<img src='img/loading.gif' /> Loading form...");
                        $("#maincontents").load("includes/forms.php?page=addReport",function(){
                           $("#myTable").tablesorter();
                        });
                    });
                
                $("#listReport").click(function(){
                        $("#maincontents").html("<img src='img/loading.gif' /> Loading form...");
                        $("#maincontents").load("includes/processes.php?page=list_Report",function(){
                           $("#myTable").tablesorter();
                        });
                    });
                
                
                 $("#searchReport").click(function(){
                        $("#maincontents").html("<img src='img/loading.gif' /> Loading form...");
                        $("#maincontents").load("includes/forms.php?page=SearchReport",function(){
                           $("#myTable").tablesorter();
                           $("#edit_user").click(function(){
                               $("#maincontents").html("<img src='img/loading.gif' /> Loading form...");
                               $("#maincontents").load("includes/forms.php?page=Edit_Report",function(){
                            });
                           });
                        });
                    });
                
                 $("#addReport").trigger("click");
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
