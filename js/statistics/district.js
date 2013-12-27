function distictChange(region){
    $("#district").change(function(){
        $('#sex').val('');
        $("#age").val("");
        $("#savereportform").hide("slow");
            $("#advfilters select").val("");
        var dist = $(this).val();
        genderChange(dist);
        ageChange(dist,"All Sex");
        moreChange(dist,"All Sex","All Ages","","");
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
                      timeChange(dist,"All Sex","All Ages",$( "#from" ).val(),$( "#to" ).val());
                    }
                    }
                  });
        if(dist === "District"){
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
                $("#statdata").load("statistics/district.php?page=table",{dist:dist},function(){
            
                 });
            });
        
        $("#linechat").unbind("click").click(function(){
            $("#chatmenus").find("div.btn").removeClass("btn-warning");
            $(this).addClass("btn-warning");
                $("#statdata").html("<i class='fa fa-spinner fa-spin fa-4x'></i>");
                $("#statdata").load("statistics/district.php?page=line",{dist:dist},function(){
            
                 });
            });
        
        $("#barchat").unbind("click").click(function(){
            $("#chatmenus").find("div.btn").removeClass("btn-warning");
            $(this).addClass("btn-warning");
                $("#statdata").html("<i class='fa fa-spinner fa-spin fa-4x'></i>");
                $("#statdata").load("statistics/district.php?page=bar",{dist:dist},function(){
            
                 });
            });
        
        $("#piechat").unbind("click").click(function(){
            $("#chatmenus").find("div.btn").removeClass("btn-warning");
            $(this).addClass("btn-warning");
                $("#statdata").html("<i class='fa fa-spinner fa-spin fa-4x'></i>");
                $("#statdata").load("statistics/district.php?page=pie",{dist:dist},function(){
                
                 });
            });
        //trigger table chat by default
        $("#tablechat").trigger("click");
        }
    });
}

