/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function(){
    $("#reportmenu").click(function(){
       
       $("#sidebar").html("<img src='img/loading.gif' /> Loading Menu..");
       $("#sidebar").load("includes/menus.php?page=report",function(){
            $("#sidebar ul li").click(function(){
                $("#sidebar ul li").removeClass("active");
                $(this).addClass("active");
             }); 
         
         $("#communityReport").click(function(){
             $("#submenus").html("");
             $("#maincontents").html("<img src='img/loading.gif' /> Loading form...");
             $("#maincontents").load("includes/processes.php?page=View_report",function(){
                 $( "#from" ).datepicker({
                    changeMonth: true,
                    changeYear: true,
                    dateFormat:"yy-mm-dd",
                    yearRange: "1900:2017",
                    onClose: function( selectedDate ) {
                      $( "#to" ).datepicker( "option", "minDate", selectedDate );
                    }
                  });
                  $( "#to" ).datepicker({
                    changeMonth: true,
                    changeYear: true,
                    dateFormat:"yy-mm-dd",
                    yearRange: "1900:2017",
                    onClose: function( selectedDate ) {
                      $( "#from" ).datepicker( "option", "maxDate", selectedDate );
                      if( $( "#from" ).val() === "" || $( "#to" ).val() === ""){
             
                    }else{
                      timeChange("","","",$( "#from" ).val(),$( "#to" ).val());
                    }
                    }
                  });
              $('#age').val('');
              $('#sex').val('');
             regionchange();
             distictChange();
             genderChange();
             ageChange();
             moreChange("","","","","");
              //showing and hiding advanced filters
              $("#advfilters").hide();
              $(".tog").click(function(){
                  $("#advfilters").show("slow");
                });
            $("#tablechat").unbind("click").click(function(){
            $("#chatmenus").find("div.btn").removeClass("btn-warning");
            $(this).addClass("btn-warning");
                $("#statdata").html("<i class='fa fa-spinner fa-spin fa-4x'></i>");
                $("#statdata").load("statistics/region.php?page=total_table",function(){
                
             });
            });
        
           $("#linechat").unbind("click").click(function(){
            $("#chatmenus").find("div.btn").removeClass("btn-warning");
            $(this).addClass("btn-warning");
                $("#statdata").html("<i class='fa fa-spinner fa-spin fa-4x'></i>");
                $("#statdata").load("statistics/region.php?page=total_line",function(){
                
             });
            });
        
            $("#barchat").unbind("click").click(function(){
            $("#chatmenus").find("div.btn").removeClass("btn-warning");
            $(this).addClass("btn-warning");
                $("#statdata").html("<i class='fa fa-spinner fa-spin fa-4x'></i>");
                $("#statdata").load("statistics/region.php?page=total_bar",function(){
                
             });
            });
        
            $("#piechat").unbind("click").click(function(){
            $("#chatmenus").find("div.btn").removeClass("btn-warning");
            $(this).addClass("btn-warning");
                $("#statdata").html("<i class='fa fa-spinner fa-spin fa-4x'></i>");
                $("#statdata").load("statistics/region.php?page=total_pie",function(){
                
             });
            });
        //trigger table chat by default
        $("#barchat").trigger("click");
           
           //processing saving of report
           
           $("#savereportform").hide();
           $("#savereport").click(function(){
              $("#savereportform").show("slow");
              $("#savereport1").click(function(){
                  
                  if($("#reporttitle").val() === ""){
                      
                  }else{
                  var btn = $(this);
                  $(this).html("<i class='fa fa-spinner fa-spin fa-2x'></i> Saving");
                  $("#dumb").load("statistics/region.php?page=savereport",{
                        name:$("#reporttitle").val(),
                        region:$("#region").val(),
                        district:$("#district").val(),
                        sex:$("#sex").val(),
                        age:$("#age").val(),
                        fromm:$("#from").val(),
                        too:$("#to").val(),
                        basis:$( "#Basis_Diagnosis" ).val(),
                        topograph:$( "#Topography" ).val(),
                        morphology:$( "#Morphology" ).val(),
                        stage:$( "#Stage" ).val(),
                        treat:$( "#Treatment" ).val(),
                        behavior:$( "#Behevior" ).val(),
                  },function(data){
                  btn.html("<i class='fa fa-spinner fa-save'></i> Save");
                $("#savereportform").hide("slow");
             });
                  
                  }
              });
           });
             });
         
         
         });
         
         
         $("#savedrep").click(function(){
             $("#submenus").html("");
             $("#maincontents").html("<img src='img/loading.gif' /> Loading form...");
             $("#maincontents").load("includes/processes.php?page=savedreport",function(){
             });
         });
         $("#communityReport").trigger("click");
        });
    });
});

