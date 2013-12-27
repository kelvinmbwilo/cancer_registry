function regionchange(){
    $("#region").change(function(){
        var regi = $(this).val();
        $("#districtarea").html("<i class='fa fa-spinner fa-spin'></i>");
        $("#districtarea").load("statistics/region.php?page=district",{reg:regi},function(){
            distictChange(regi);
            $('#sex').val('');
            $("#age").val("");
            $("#savereportform").hide("slow");
            $("#advfilters select").val("");
            genderChange("District");
            ageChange("District","All Sex");
            moreChange("District","All Sex","All Ages","","");
            $( "#from" ).datepicker( "destroy" ).val('');
            $( "#to" ).datepicker( "destroy" ).val('');
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
                      timeChange("District","All Sex","All Ages",$( "#from" ).val(),$( "#to" ).val());
                    }
                    }
                  });
         });
        if(regi === "Region"){
//            in case of all Regions
            $("#tablechat").unbind("click").click(function(){
            $("#chatmenus").find("div.btn").removeClass("btn-warning");
            $(this).addClass("btn-warning");
                $("#statdata").html("<i class='fa fa-spinner fa-spin fa-4x'></i>");
                $("#statdata").load("statistics/region.php?page=total_table",function(){
                
             });
            });
        //line chat
            $("#linechat").unbind("click").click(function(){
            $("#chatmenus").find("div.btn").removeClass("btn-warning");
            $(this).addClass("btn-warning");
                $("#statdata").html("<i class='fa fa-spinner fa-spin fa-4x'></i>");
                $("#statdata").load("statistics/region.php?page=total_line",function(){
                
             });
            });
        
        //bar chat
            $("#barchat").unbind("click").click(function(){
            $("#chatmenus").find("div.btn").removeClass("btn-warning");
            $(this).addClass("btn-warning");
                $("#statdata").html("<i class='fa fa-spinner fa-spin fa-4x'></i>");
                $("#statdata").load("statistics/region.php?page=total_bar",function(){
                
             });
            });
        
        //pie chat
            $("#piechat").unbind("click").click(function(){
            $("#chatmenus").find("div.btn").removeClass("btn-warning");
            $(this).addClass("btn-warning");
                $("#statdata").html("<i class='fa fa-spinner fa-spin fa-4x'></i>");
                $("#statdata").load("statistics/region.php?page=total_pie",function(){
                
             });
            });
        //trigger table chat by default
        $("#tablechat").trigger("click");
        }else{
        //in case of other region
        $("#tablechat").unbind("click").click(function(){
            $("#chatmenus").find("div.btn").removeClass("btn-warning");
            $(this).addClass("btn-warning");
                $("#statdata").html("<i class='fa fa-spinner fa-spin fa-4x'></i>");
                $("#statdata").load("statistics/region.php?page=table",{reg:regi},function(){
            
                 });
            });
        
        $("#linechat").unbind("click").click(function(){
            $("#chatmenus").find("div.btn").removeClass("btn-warning");
            $(this).addClass("btn-warning");
                $("#statdata").html("<i class='fa fa-spinner fa-spin fa-4x'></i>");
                $("#statdata").load("statistics/region.php?page=line",{reg:regi},function(){
            
                 });
            });
        
        $("#barchat").unbind("click").click(function(){
            $("#chatmenus").find("div.btn").removeClass("btn-warning");
            $(this).addClass("btn-warning");
                $("#statdata").html("<i class='fa fa-spinner fa-spin fa-4x'></i>");
                $("#statdata").load("statistics/region.php?page=bar",{reg:regi},function(){
            
                 });
            });
        
        $("#piechat").unbind("click").click(function(){
            $("#chatmenus").find("div.btn").removeClass("btn-warning");
            $(this).addClass("btn-warning");
                $("#statdata").html("<i class='fa fa-spinner fa-spin fa-4x'></i>");
                $("#statdata").load("statistics/region.php?page=pie",{reg:regi},function(){
                
                 });
            });
        //trigger table chat by default
        $("#tablechat").trigger("click");
        }
        
    });
}

