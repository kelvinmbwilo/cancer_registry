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
                            $("form").validationEngine(); 
                            $("#submitbtn").click(function(){
                                if($("#Password").val() !== $("#Repassword").val()){
                                    alert("two password do not match")
                                }else{
                                
                                var fname=$("#First_Name").val(),mname=$("#Middle_Name").val(),lname=$("#Last_Name").val(),sex=$("#gender").val();
                                var level =$("#role").val(),phone=$("#Phone_Number").val(),email = $("#Email").val(),pass = $("#Password").val();
                                $("#maincontents").html("<img src='img/loading.gif' /> Submitting User Information Please Wait...");    
                                $.ajax({
                                   type: "POST",
                                   url: "includes/form_processor.php?page=adduser",
                                   data: {
                                       first_name : fname,
                                       middle_name:mname,
                                       last_name:lname,
                                       gender:sex,
                                       email:email,
                                       phone:phone,
                                       level:level,
                                       pass:pass
                                   }, 
                                   cache: false,

                                   ////////////////////////////////////////////////////////////////
                                   ///////////////////tumor Registration ///////////////////////////
                                   ////////////////////////////////////////////////////////////////
                                   success: function(msg){
                                       $("#listuser").trigger("click");
                                   }
                                });   
                                }
                            });
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
                           $("#myTable").dataTable();
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
                           $("#submitbtn").click(function(){
                                var name=$("#Name").val();
                                $("#maincontents").html("<img src='img/loading.gif' /> Submitting User Information Please Wait...");    
                                $.ajax({
                                   type: "POST",
                                   url: "includes/form_processor.php?page=addocc",
                                   data: {
                                       name : name
                                   }, 
                                   cache: false,

                                   success: function(){
                                       $("#maincontents").html("Occupation Information Added Successfull");
                                        setTimeout(function()  {
                                             $("#addOccupation").trigger("click");
                                           }, 2000);
                                   }
                                });      
                            });
                        });
                    });
                
                $("#listOccupation").click(function(){
                        $("#maincontents").html("<img src='img/loading.gif' /> Loading form...");
                        $("#maincontents").load("includes/processes.php?page=list_Occupation",function(){
                           $("#myTable").dataTable();
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
