function genderChange(val){
    
    $("#sex").change(function(){
        $("#age").val("");
        $("#savereportform").hide("slow");
            $("#advfilters select").val("");
        var region =  $("#region").val();
        if(val !== "District") {var district =  $("#district").val();}else{var district = "District" ;}
        var gend = $(this).val();
        ageChange(district,gend);
        moreChange(district,gend,"All Ages","","");
        $( "#from" ).datepicker( "destroy" );
            $( "#to" ).datepicker( "destroy" );
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
                      timeChange(district,gend,"All Ages",$( "#from" ).val(),$( "#to" ).val());
                    }
                    }
                  });
        if(gend !== "All Sex"){
            $("#tablechat").unbind("click").click(function(){
            $("#chatmenus").find("div.btn").removeClass("btn-warning");
            $(this).addClass("btn-warning");
                $("#statdata").html("<i class='fa fa-spinner fa-spin fa-4x'></i>");
                $("#statdata").load("statistics/gender.php?page=total_table",{reg:region,dist:district,gend:gend},function(){
                
             });
            });
        
            $("#barchat").unbind("click").click(function(){
            $("#chatmenus").find("div.btn").removeClass("btn-warning");
            $(this).addClass("btn-warning");
                $("#statdata").html("<i class='fa fa-spinner fa-spin fa-4x'></i>");
                $("#statdata").load("statistics/gender.php?page=total_bar",{reg:region,dist:district,gend:gend},function(){
                
             });
            });
        
            $("#linechat").unbind("click").click(function(){
            $("#chatmenus").find("div.btn").removeClass("btn-warning");
            $(this).addClass("btn-warning");
                $("#statdata").html("<i class='fa fa-spinner fa-spin fa-4x'></i>");
                $("#statdata").load("statistics/gender.php?page=total_line",{reg:region,dist:district,gend:gend},function(){
                
             });
            });
        
             $("#piechat").unbind("click").click(function(){
            $("#chatmenus").find("div.btn").removeClass("btn-warning");
            $(this).addClass("btn-warning");
                $("#statdata").html("<i class='fa fa-spinner fa-spin fa-4x'></i>");
                $("#statdata").load("statistics/gender.php?page=total_pie",{reg:region,dist:district,gend:gend},function(){
                
             });
            });
        
          $("#tablechat").trigger("click");
        
        }else{
        
        }
    });
}


