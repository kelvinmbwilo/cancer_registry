/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function(){
    $("#patientmenu").click(function(){
        $("#submit").hide();$("#submit1").hide();
        $("#sidebar").html("<img src='img/loading.gif' /> Loading Menu..");
        $("#sidebar").load("includes/menus.php?page=patient",function(){
            $("#sidebar ul li").click(function(){
                $("#sidebar ul li").removeClass("active");
                $(this).addClass("active");
             });
         
         ///////////////////////////////////////////////////////
         ////////////User Registration /////////////////////////
         ///////////////////////////////////////////////////////
         $("#registerpatient").click(function(){
             $("#submenus").html("");
             $("#maincontents").html("<img src='img/loading.gif' /> Loading form...");
             $("#maincontents").load("includes/forms.php?page=userRegistration",function(){
                 $("#submit").show();
                 $("#Birth_Date").datepicker({
                    changeMonth: true,
                    changeYear: true,
                    dateFormat:"yy-mm-dd"
                });
                 $("#submit").click(function(){
                 var id =  $("#Patient_id").val(),fname=$("#First_Name").val(),mname=$("#Middle_Name").val(),lname=$("#Last_Name").val(),sex=$("#gender").val();
                 var dob =$("#Birth_Date").val(),tribe=$("#tribe").val(),Occupation = $("#Occupation").val(),country=$("#nationality").val(),region=$("#region").val();
                 var district = $("#district").val(),ward=$("#ward").val(),vill = $("#village").val(),ten =$("#Cell_leader").val();
                 $("#submit").hide("slow");
                 $("#maincontents").html("<img src='img/loading.gif' /> Submitting Patient Information Please Wait To Fill Tumor Information...");    
                 $.ajax({
                    type: "POST",
                    url: "includes/form_processor.php?page=patient_reg",
                    data: {
                        patient_id : id,
                        first_name : fname,
                        middle_name:mname,
                        last_name:lname,
                        gender:sex,
                        date_of_birth:dob,
                        tribe:tribe,
                        occupation:Occupation,
                        country:country,
                        region:region,
                        district:district,
                        ward:ward,
                        village:vill,
                        ten_cell_leder:ten,
                        patient_status:""
                    }, 
                    cache: false,

                    ////////////////////////////////////////////////////////////////
                    ///////////////////tumor Registration ///////////////////////////
                    ////////////////////////////////////////////////////////////////
                    success: function(msg){
                        alert(msg);
                        $("#maincontents").html("<img src='img/loading.gif' />Patient Registered Successfull Loading Tumor Record form...");
                        $("#maincontents").load("includes/forms.php?page=Tumor",{id:id},function(){
                            $("#submit1").show("slow");  $("#submit").show("slow");
                            $("#Incidence_Date").datepicker({
                                changeMonth: true,
                                changeYear: true,
                                dateFormat:"yy-mm-dd"
                            });
                           
                           $("#submit1").unbind("click").click(function(){
                            $("#submit").hide("slow");$("#submit1").hide("slow");
                            $("#maincontents").append("<span id='loader'><img src='img/loading.gif' /> Submitting Patient Information Please Wait To Add Another Tumor Record...</span>");    
                            $("form").hide();
                               $.ajax({
                               type: "POST",
                               url: "includes/form_processor.php?page=tumor_reg",
                               data: {
                                   patient_id : id,
                                   topograph : $("#Topography").val(),
                                   morphology:$("#Morphology").val(),
                                   behavior:$("#Behavior").val(),
                                   incidance_date:$("#Incidence_Date").val(),
                                   basis_diagnosis:$("#Basis_Diagnosis").val(),
                                   ICD_10:$("#ICD_10").val(),
                                   ICCC_code:$("#ICCC_code").val(),
                                   hosptal:$("#Hospital").val(),
                                   path_lab_no:$("#Path_lab_no").val(),
                                   unit:$("#Unit").val(),
                                   case_no:$("#Case_no").val()
                               }, 
                               cache: false,
                               success: function(){
                                    $("input, textarea, select").val("");
                                    $("#submit").show("slow");$("#submit1").show("slow");
                                    $("form").show("slow");
                                    $("#loader").remove();
                               }
                           
                            });     
                        });//end of adding tumor
                           
                            $("#submit").unbind("click").click(function(){
                            $("#submit").hide("slow");$("#submit1").hide("slow");
                            $("#maincontents").append("<span id='loader'><img src='img/loading.gif' /> Submitting Patient Information Please Wait To Add Examination Record...</span>");    
                            $.ajax({
                               type: "POST",
                               url: "includes/form_processor.php?page=tumor_reg",
                               data: {
                                   patient_id : id,
                                   topograph : $("#Topography").val(),
                                   morphology:$("#Morphology").val(),
                                   behavior:$("#Behavior").val(),
                                   incidance_date:$("#Incidence_Date").val(),
                                   basis_diagnosis:$("#Basis_Diagnosis").val(),
                                   ICD_10:$("#ICD_10").val(),
                                   ICCC_code:$("#ICCC_code").val(),
                                   hosptal:$("#Hospital").val(),
                                   path_lab_no:$("#Path_lab_no").val(),
                                   unit:$("#Unit").val(),
                                   case_no:$("#Case_no").val()
                               }, 
                               cache: false,

                               ////////////////////////////////////////////////////////////////
                               ///////////////////Diagnosis Registration ///////////////////////////
                               ////////////////////////////////////////////////////////////////
                               success: function(){
                                    $("#loader").remove();
                                    $("#maincontents").html("<img src='img/loading.gif' />Tumor Record added Successfull Loading Examination form...");
                                    $("#maincontents").load("includes/forms.php?page=Examination",{id:id},function(){
                                        $("#submit1").show("slow");  $("#submit").show("slow");
                                        $("#submit1").unbind("click").click(function(){
                                        $("#submit").hide("slow");$("#submit1").hide("slow");
                                        $("#maincontents").append("<span id='loader'><img src='img/loading.gif' /> Submitting Patient Information Please Wait To Add Another Tumor Record...</span>");    
                                        $("form").hide();
                                           $.ajax({
                                           type: "POST",
                                           url: "includes/form_processor.php?page=examination",
                                           data: {
                                               patient_id : id,
                                               biopsy_number : $("#Biops_Number").val(),
                                               collected_from:$("#Biops_collected").val(),
                                               details:$("#Examination_Details").val(),
                                               gis_details:$("#Behavior").val()
                                           }, 
                                           cache: false,
                                           success: function(){
                                                $("input, textarea, select").val("");
                                                $("#submit").show("slow");$("#submit1").show("slow");
                                                $("form").show("slow");
                                                $("#loader").remove();
                                           }

                                        });     
                                    });//end of adding examination
                                  });
                               }
                           
                            });     
                        });//end of adding tumor
                        });
                    }
                    });
                });//end of adding patient
             });
         });
     
         ///////////////////////////////////////////////////////
         ////////////Patient Diagnosis /////////////////////////
         ///////////////////////////////////////////////////////
         $("#patiDiagnosis").click(function(){
             $("#submenus").html("");
             $("#maincontents").html("<img src='img/loading.gif' /> Loading form...");
             $("#maincontents").load("includes/forms.php?page=patDiagnosis",function(){
                 $("#Date_Of_Incidence").datepicker({
                    changeMonth: true,
                    changeYear: true,
                    dateFormat:"yy-mm-dd"
                });
             });
         });
     
        ///////////////////////////////////////////////////////
         ////////////Patient examination //////////////////////
         ///////////////////////////////////////////////////////
         $("#patiexamination").click(function(){
             $("#submenus").html("");
             $("#maincontents").html("<img src='img/loading.gif' /> Loading form...");
             $("#maincontents").load("includes/forms.php?page=Examination",function(){
                 
             });
         });
     
        ///////////////////////////////////////////////////////
         ////////////Patient followup //////////////////////
         ///////////////////////////////////////////////////////
         $("#followup").click(function(){
             $("#submenus").html("");
             $("#maincontents").html("<img src='img/loading.gif' /> Loading form...");
             $("#maincontents").load("includes/forms.php?page=follow_up",function(){
                 
             });
         });
     
         ///////////////////////////////////////////////////////
         //////////////////////Encounter //////////////////////
         ///////////////////////////////////////////////////////
         $("#encounter").click(function(){
             $("#submenus").html("");
             $("#maincontents").html("<img src='img/loading.gif' /> Loading form...");
             
         });
         $("#registerpatient").trigger("click");
        });
      
    });

$("#patientmenu").trigger("click");
});

