/* 
 * this script concers with chekking login values
 * validate username and password using ajax
 */
$(document).ready(function(){
    $("#loginbtn").click(function(){
        if( $("#loginForm").validationEngine('validate')){
            $("h3.headd").html("<i class='fa fa-spinner fa-spin fa-3x'></i> Please Wait...");
            $.post("includes/form_processor.php?page=login",{email:$("#email").val(),pass:$("#pass").val()},function(data){
                var err = '<div class="alert alert-danger alert-dismissable">';
                err += '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
                err += ' '+data;
                err += '</div>';
                if(data !== "success"){
                    //$("h3.headd").html(err);
                }
            });
        }
});

$(".navbar-nav li").click(function(){
        $(".navbar-nav li").removeClass("active");
        $(this).addClass("active");
});
});
