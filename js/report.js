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
        });
    });
});

