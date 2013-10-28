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
                    onClose: function( selectedDate ) {
                      $( "#to" ).datepicker( "option", "minDate", selectedDate );
                    }
                  });
                  $( "#to" ).datepicker({
                    changeMonth: true,
                    changeYear: true,
                    onClose: function( selectedDate ) {
                      $( "#from" ).datepicker( "option", "maxDate", selectedDate );
                    }
                  });
             });
         });
         
         $("#communityReport").trigger("click");
        });
    });
});

