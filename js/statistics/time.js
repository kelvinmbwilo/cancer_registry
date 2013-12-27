function timeChange(disval,genval,ageval,from,to){
    var region =  $("#region").val();
    if(disval !== "District") {var district =  $("#district").val();}else{var district = "District" ;}
    if(genval !== "All Sex") {var gend = $("#sex").val();}else{var gend = "All Sex"; }
    if(ageval !== "All Ages") {var age = $("#age").val();}else{var age = "All Ages"; }
    
            $("#advfilters select").val("");
            $("#savereportform").hide("slow");
    moreChange(district,gend,age,$( "#from" ).val(),$( "#to" ).val());
          //if they are not empty do the math for statistics
            
                $("#tablechat").unbind("click").click(function(){
                $("#chatmenus").find("div.btn").removeClass("btn-warning");
                $(this).addClass("btn-warning");
                    $("#statdata").html("<i class='fa fa-spinner fa-spin fa-4x'></i>");
                    $("#statdata").load("statistics/time.php?page=table",{reg:region,dist:district,gend:gend,age:age,from:$( "#from" ).val(),to:$( "#to" ).val()},function(){

                 });
                });

                $("#barchat").unbind("click").click(function(){
                $("#chatmenus").find("div.btn").removeClass("btn-warning");
                $(this).addClass("btn-warning");
                    $("#statdata").html("<i class='fa fa-spinner fa-spin fa-4x'></i>");
                    $("#statdata").load("statistics/time.php?page=bar",{reg:region,dist:district,gend:gend,age:age,from:$( "#from" ).val(),to:$( "#to" ).val()},function(){

                 });
                });

                $("#piechat").unbind("click").click(function(){
                $("#chatmenus").find("div.btn").removeClass("btn-warning");
                $(this).addClass("btn-warning");
                    $("#statdata").html("<i class='fa fa-spinner fa-spin fa-4x'></i>");
                    $("#statdata").load("statistics/time.php?page=pie",{reg:region,dist:district,gend:gend,age:age,from:$( "#from" ).val(),to:$( "#to" ).val()},function(){

                 });
                });

                $("#linechat").unbind("click").click(function(){
                $("#chatmenus").find("div.btn").removeClass("btn-warning");
                $(this).addClass("btn-warning");
                    $("#statdata").html("<i class='fa fa-spinner fa-spin fa-4x'></i>");
                    $("#statdata").load("statistics/time.php?page=line",{reg:region,dist:district,gend:gend,age:age,from:$( "#from" ).val(),to:$( "#to" ).val()},function(){

                 });
                });
            //trigger table chat by default
            $("#tablechat").trigger("click");

           
          }
       

    