//this is a javascript file for advanced filters
function moreChange(disval,genval,ageval,from,to){
    
     $("#Morphology").change(function(){
           var morp = $(this).val();
           $("#savereportform").hide("slow");
           $("#behaviorarea").html("<i class='fa fa-spinner fa-spin'></i>");
           $("#behaviorarea").load("includes/form_processor.php?page=behavior",{morp:morp},function(){
           
           });
        });
    $("#advfilters select").change(function(){
        processSelects(disval,genval,ageval,from,to);
});
}

function processSelects(disval,genval,ageval,from,to){
    var region =  $("#region").val();
    if(disval !== "District") {var district =  $("#district").val();}else{var district = "District" ;}
    if(genval !== "All Sex") {var gend = $("#sex").val();}else{var gend = "All Sex"; }
    if(ageval !== "All Ages") {var age = $("#age").val();}else{var age = "All Ages"; }
    if(from !== "" || to !== ""){var fromm = $("#from" ).val();var too =$( "#to" ).val()}else{var fromm = "";var too =""}
    
    
    $("#tablechat").unbind("click").click(function(){
                $("#chatmenus").find("div.btn").removeClass("btn-warning");
                $(this).addClass("btn-warning");
                    $("#statdata").html("<i class='fa fa-spinner fa-spin fa-4x'></i>");
                     $("#statdata").load("statistics/more.php?page=table",{reg:region,dist:district,gend:gend,age:age,from:$( "#from" ).val(),to:$( "#to" ).val(),diagno:$( "#Basis_Diagnosis" ).val(),topo:$( "#Topography" ).val(),morpho:$( "#Morphology" ).val(),stage:$( "#Stage" ).val(),treat:$( "#Treatment" ).val(),behav:$( "#Behevior" ).val()},function(){

                 });
                });

                $("#barchat").unbind("click").click(function(){
                $("#chatmenus").find("div.btn").removeClass("btn-warning");
                $(this).addClass("btn-warning");
                    $("#statdata").html("<i class='fa fa-spinner fa-spin fa-4x'></i>");
                    $("#statdata").load("statistics/more.php?page=bar",{reg:region,dist:district,gend:gend,age:age,from:$( "#from" ).val(),to:$( "#to" ).val(),diagno:$( "#Basis_Diagnosis" ).val(),topo:$( "#Topography" ).val(),morpho:$( "#Morphology" ).val(),stage:$( "#Stage" ).val(),treat:$( "#Treatment" ).val(),behav:$( "#Behevior" ).val()},function(){

                 });
                });

                $("#piechat").unbind("click").click(function(){
                $("#chatmenus").find("div.btn").removeClass("btn-warning");
                $(this).addClass("btn-warning");
                    $("#statdata").html("<i class='fa fa-spinner fa-spin fa-4x'></i>");
                    $("#statdata").load("statistics/more.php?page=pie",{reg:region,dist:district,gend:gend,age:age,from:$( "#from" ).val(),to:$( "#to" ).val(),diagno:$( "#Basis_Diagnosis" ).val(),topo:$( "#Topography" ).val(),morpho:$( "#Morphology" ).val(),stage:$( "#Stage" ).val(),treat:$( "#Treatment" ).val(),behav:$( "#Behevior" ).val()},function(){

                 });
                });

                $("#linechat").unbind("click").click(function(){
                $("#chatmenus").find("div.btn").removeClass("btn-warning");
                $(this).addClass("btn-warning");
                    $("#statdata").html("<i class='fa fa-spinner fa-spin fa-4x'></i>");
                     $("#statdata").load("statistics/more.php?page=line",{reg:region,dist:district,gend:gend,age:age,from:$( "#from" ).val(),to:$( "#to" ).val(),diagno:$( "#Basis_Diagnosis" ).val(),topo:$( "#Topography" ).val(),morpho:$( "#Morphology" ).val(),stage:$( "#Stage" ).val(),treat:$( "#Treatment" ).val(),behav:$( "#Behevior" ).val()},function(){

                 });
                });
            //trigger table chat by default
            $("#tablechat").trigger("click");

}


