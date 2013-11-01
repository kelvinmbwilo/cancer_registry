/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function(){
    $("#patientmenu").click(function(){
       
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
             $("#submit1").hide();
             $("#submenus").html("");
             $("#maincontents").html("<img src='img/loading.gif' /> Loading form...");
             $("#maincontents").load("includes/forms.php?page=userRegistration",function(){
                 $("#Birth_Date").datepicker({
                    changeMonth: true,
                    changeYear: true,
                    dateFormat:"yy-mm-dd"
                });
                 $("#submit").click(function(){
                 var id =  $("#Patient_id").val();
                 $("#submit").hide("slow");
                 $("#maincontents").html("<img src='img/loading.gif' /> Submitting Patient Information Please Wait To Fill Tumor Information...");    
                 $.ajax({
                    type: "POST",
                    url: "includes/form_processor.php?page=patient_reg",
                    data: {
                        patient_id : $("#Patient_id").val(),
                        first_name : $("#First_Name").val(),
                        middle_name:$("#Middle_Name").val(),
                        last_name:$("#Last_Name").val(),
                        gender:$("#gender").val(),
                        date_of_birth:$("#Birth_Date").val(),
                        tribe:$("#tribe").val(),
                        occupation:$("#Occupation").val(),
                        country:$("#nationality").val(),
                        region:$("#region").val(),
                        district:$("#district").val(),
                        ward:$("#ward").val(),
                        village:$("#village").val(),
                        ten_cell_leder:$("#Cell_leader").val(),
                        patient_status:""
                    }, 
                    cache: false,

                    ////////////////////////////////////////////////////////////////
                    ///////////////////tumor Registration ///////////////////////////
                    ////////////////////////////////////////////////////////////////
                    success: function(){
                        $("#maincontents").html("<img src='img/loading.gif' />Patient Registered Successfull Loading Tumor Record form...");
                        $("#maincontents").load("includes/forms.php?page=Tumor",{id:id},function(){
                            $("#submit1").show("slow");  $("#submit").show("slow");
                            $("#Incidence_Date").datepicker({
                                changeMonth: true,
                                changeYear: true,
                                dateFormat:"yy-mm-dd"
                            });
                           
                           $("#submit1").click(function(){
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
                           
                            $("#submit").click(function(){
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
                                    $("#maincontents").html("<img src='img/loading.gif' />Tumor Record added Successfull Loading Examination form...");
                                    $("#maincontents").load("includes/forms.php?page=Examination",{id:id},function(){
                                        $("#submit1").click(function(){
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

