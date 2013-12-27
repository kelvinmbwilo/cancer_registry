function ageChange(disval,genval){
    
    $("#age").change(function(){
        var region =  $("#region").val();
        if(disval !== "District") {var district =  $("#district").val();}else{var district = "District" ;}
        if(genval !== "All Sex") {var gend = $("#sex").val();}else{var gend = "All Sex"; }
        var age = $(this).val();
        moreChange(district,gend,age,"","");
        $("#savereportform").hide("slow");
            $("#advfilters select").val("");
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
                      timeChange(district,gend,age,$( "#from" ).val(),$( "#to" ).val());
                    }
                    }
                  });
            $("#tablechat").unbind("click").click(function(){
            $("#chatmenus").find("div.btn").removeClass("btn-warning");
            $(this).addClass("btn-warning");
                $("#statdata").html("<i class='fa fa-spinner fa-spin fa-4x'></i>");
                $("#statdata").load("statistics/age.php?page=table",{reg:region,dist:district,gend:gend,age:age},function(){
                
             });
            });
        
            $("#barchat").unbind("click").click(function(){
            $("#chatmenus").find("div.btn").removeClass("btn-warning");
            $(this).addClass("btn-warning");
                $("#statdata").html("<i class='fa fa-spinner fa-spin fa-4x'></i>");
                $("#statdata").load("statistics/age.php?page=bar",{reg:region,dist:district,gend:gend,age:age},function(){
                
             });
            });
        
            $("#piechat").unbind("click").click(function(){
            $("#chatmenus").find("div.btn").removeClass("btn-warning");
            $(this).addClass("btn-warning");
                $("#statdata").html("<i class='fa fa-spinner fa-spin fa-4x'></i>");
                $("#statdata").load("statistics/age.php?page=pie",{reg:region,dist:district,gend:gend,age:age},function(){
                
             });
            });
        
            $("#linechat").unbind("click").click(function(){
            $("#chatmenus").find("div.btn").removeClass("btn-warning");
            $(this).addClass("btn-warning");
                $("#statdata").html("<i class='fa fa-spinner fa-spin fa-4x'></i>");
                $("#statdata").load("statistics/age.php?page=line",{reg:region,dist:district,gend:gend,age:age},function(){
                
             });
            });
        //trigger table chat by default
        $("#tablechat").trigger("click");
    });
}


