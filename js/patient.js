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
             $("#submenus").html("");
             $("#maincontents").html("<img src='img/loading.gif' /> Loading form...");
             $("#maincontents").load("includes/forms.php?page=userRegistration",function(){
                 
                 $("#Birth_Date").datepicker({
                    changeMonth: true,
                    changeYear: true,
                    dateFormat:"yy-mm-dd"
                });
                 $("#submitbtn").click(function(){
                 var id =  $("#Patient_id").val(),fname=$("#First_Name").val(),mname=$("#Middle_Name").val(),lname=$("#Last_Name").val(),sex=$("#gender").val();
                 var dob =$("#Birth_Date").val(),tribe=$("#tribe").val(),Occupation = $("#Occupation").val(),country=$("#nationality").val(),region=$("#region").val();
                 var district = $("#district").val(),ward=$("#ward").val(),vill = $("#village").val(),ten =$("#Cell_leader").val(),phon=$("#phone_number").val();
                 
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
                        phone:phon,
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
                    success: function(){
                        $("#maincontents").html("<img src='img/loading.gif' />Patient Registered Successfull Loading Tumor Record form...");
                        $("#maincontents").load("includes/forms.php?page=Tumor",{id:id},function(){
                            
                            $("#Incidence_Date").datepicker({
                                changeMonth: true,
                                changeYear: true,
                                dateFormat:"yy-mm-dd"
                            });
                           
                           $("#submitbtn1").click(function(){
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
                           
                            $("#submitbtn").click(function(){
                            $("#maincontents").append("<span id='loader'><img src='img/loading.gif' /> Submitting Patient Information Please Wait ...</span>");    
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
                                        $("#submitbtn1").click(function(){
                                        $("#maincontents").append("<span id='loader'><img src='img/loading.gif' /> Submitting Patient Information Please Wait To Add Examination Record...</span>");    
                                        $("form").hide();
                                           $.ajax({
                                           type: "POST",
                                           url: "includes/form_processor.php?page=examination",
                                           data: {
                                               patient_id : id,
                                               biopsy_number : $("#Biops_Number").val(),
                                               collected_from:$("#Biops_collected").val(),
                                               details:$("#Examination_Details").val(),
                                               gis_details:$("#Treatment_Details").val()
                                           }, 
                                           cache: false,
                                           success: function(){
                                                $("input, textarea, select").val("");
                                                $("form").show("slow");
                                                $("#loader").remove();
                                           }

                                        });     
                                    });//end of adding examination
                                
                                $("#submitbtn").click(function(){
                                        $("#maincontents").append("<span id='loader'><img src='img/loading.gif' /> Submitting Patient Information Please Wait...</span>");    
                                        $("form").hide();
                                           $.ajax({
                                           type: "POST",
                                           url: "includes/form_processor.php?page=examination",
                                           data: {
                                               patient_id : id,
                                               biopsy_number : $("#Biops_Number").val(),
                                               collected_from:$("#Biops_collected").val(),
                                               details:$("#Examination_Details").val(),
                                               gis_details:$("#Treatment_Details").val()
                                           }, 
                                           cache: false,
                                           success: function(){
                                               $("#maincontents").load("includes/form_processor.php?page=patientinfo",{id:id},function(){
                                                   $("#loader").remove();
                                               });
                                                
                                                
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
         $("#listpat").click(function(){
             $("#submenus").html("");
             $("#maincontents").html("<img src='img/loading.gif' /> Loading Patient List Please Wait...");
             $("#maincontents").load("includes/processes.php?page=list_patient",function(){
                 $("#myTable").dataTable();
                 $(".moreinfo").click(function(){
                     var id1 = $(this).attr("id");
                     $("#maincontents").html("<img src='img/loading.gif' /> Loading Patient Information Please Wait...");
                     $("#maincontents").load("includes/form_processor.php?page=patientinfo1",{id:id1},function(){
                        $(".editbasic").click(function(){
                            $("#maincontents").html("<img src='img/loading.gif' /> Loading Patient Information Please Wait...");
                            $("#maincontents").load("includes/form_processor.php?page=editpatientinfo",{id:id1},function(){
                                
                                $("#Birth_Date").datepicker({
                                   changeMonth: true,
                                   changeYear: true,
                                   dateFormat:"yy-mm-dd"
                               });
                                $("#submitbtn").click(function(){
                                    var id =  $("#Patient_id").val(),fname=$("#First_Name").val(),mname=$("#Middle_Name").val(),lname=$("#Last_Name").val(),sex=$("#gender").val();
                                    var dob =$("#Birth_Date").val(),tribe=$("#tribe").val(),Occupation = $("#Occupation").val(),country=$("#nationality").val(),region=$("#region").val();
                                    var district = $("#district").val(),ward=$("#ward").val(),vill = $("#village").val(),ten =$("#Cell_leader").val(),phon=$("#phone_number").val();
                                    $("#maincontents").html("<img src='img/loading.gif' /> Submitting Patient Information Please Wait...");    
                                    $.ajax({
                                       type: "POST",
                                       url: "includes/form_processor.php?page=editpatientinfo1",
                                       data: {
                                           id:id1,
                                           first_name : fname,
                                           middle_name:mname,
                                           last_name:lname,
                                           gender:sex,
                                           phone:phon,
                                           date_of_birth:dob,
                                           occupation:Occupation,
                                           region:region,
                                           district:district,
                                           ward:ward,
                                           village:vill,
                                           ten_cell_leder:ten,
                                       }, 
                                       cache: false,

                                       ////////////////////////////////////////////////////////////////
                                       ///////////////////tumor Registration ///////////////////////////
                                       ////////////////////////////////////////////////////////////////
                                       success: function(msg){
                                          $("#listpat").trigger("click"); 
                                       }
                                    });
                                       
                                });
                            });
                        });//end of editing basic info
                       
                        $(".edittumor").click(function(){
                            var tid = $(this).attr("id");
                            $("#maincontents").html("<img src='img/loading.gif' /> Loading Patient Tumor Information Please Wait...");
                            $("#maincontents").load("includes/form_processor.php?page=edittumorinfo",{id:tid},function(){
                                $("#Incidence_Date").datepicker({
                                    changeMonth: true,
                                    changeYear: true,
                                    dateFormat:"yy-mm-dd"
                                });
                                $("#submitbtn").click(function(){
                                var topo = $("#Topography").val(),morp=$("#Morphology").val(),beh=$("#Behavior").val(),inc=$("#Incidence_Date").val(),base=$("#Basis_Diagnosis").val();
                                var icd=$("#ICD_10").val(),icc=$("#ICCC_code").val(),hosptal=$("#Hospital").val(),path_lab_no=$("#Path_lab_no").val(),unit=$("#Unit").val(),case_no=$("#Case_no").val();
                                $("#maincontents").html("<span id='loader'><img src='img/loading.gif' /> Submitting Patient tumor Information Please Wait ...</span>");    
                                $.ajax({
                                   type: "POST",
                                   url: "includes/form_processor.php?page=edittumorinfo1",
                                   data: {
                                       id:tid,
                                       topograph : topo,
                                       morphology:morp,
                                       behavior:beh,
                                       incidance_date:inc,
                                       basis_diagnosis:base,
                                       ICD_10:icd,
                                       ICCC_code:icc,
                                       hosptal:hosptal,
                                       path_lab_no:path_lab_no,
                                       unit:unit,
                                       case_no:case_no
                                   }, 
                                   cache: false,

                                   ////////////////////////////////////////////////////////////////
                                   ///////////////////Diagnosis Registration ///////////////////////////
                                   ////////////////////////////////////////////////////////////////
                                   success: function(msg){
                                      $("#listpat").trigger("click");
                                   }
                                });
                               });
                            })
                        });//end of editing tumor
                    
                        $(".editExam").click(function(){
                            var id1 = $(this).attr("id");
                            $("#maincontents").html("<img src='img/loading.gif' /> Loading Patient Information Please Wait...");
                            $("#maincontents").load("includes/form_processor.php?page=editexaminfo",{id:id1},function(){
                                $("#submitbtn").click(function(){
                                    var bio = $("#Biops_Number").val(), coll=$("#Biops_collected").val(), exam=$("#Examination_Details").val();
                                    var gis=$("#Treatment_Details").val(); 
                                    $("#maincontents").html("<span id='loader'><img src='img/loading.gif' /> Submitting Patient Information Please Wait To Add Examination Record...</span>");    
                                    $("form").hide();
                                       $.ajax({
                                       type: "POST",
                                       url: "includes/form_processor.php?page=editexaminfo1",
                                       data: {
                                           biopsy_number : bio,
                                           collected_from:coll,
                                           details:exam,
                                           gis_details:gis
                                       }, 
                                       cache: false,
                                       success: function(){
                                            $("#listpat").trigger("click");
                                       }

                                    });     
                                });//end of adding examination
                            });
                        });//endof editing examination
                    
                        $(".addtumorrec").click(function(){
                            var id1 = $(this).attr("id");
                            $("#maincontents").html("<img src='img/loading.gif' /> Loading Form To Add Tumor Record Please Wait...");
                            $("#maincontents").load("includes/forms.php?page=Tumor",{id:id1},function(){
                                 $("#Incidence_Date").datepicker({
                                    changeMonth: true,
                                    changeYear: true,
                                    dateFormat:"yy-mm-dd"
                                });
                                $("#submitbtn1").click(function(){
                                    var topo = $("#Topography").val(),morp=$("#Morphology").val(),beh=$("#Behavior").val(),inc=$("#Incidence_Date").val(),base=$("#Basis_Diagnosis").val();
                                    var icd=$("#ICD_10").val(),icc=$("#ICCC_code").val(),hosptal=$("#Hospital").val(),path_lab_no=$("#Path_lab_no").val(),unit=$("#Unit").val(),case_no=$("#Case_no").val();
                                    $("#submit").hide("slow");$("#submit1").hide("slow");
                                    $("#maincontents").append("<span id='loader'><img src='img/loading.gif' /> Submitting Patient Information Please Wait To Add Another Tumor Record...</span>");    
                                    $("form").hide();
                                       $.ajax({
                                       type: "POST",
                                       url: "includes/form_processor.php?page=tumor_reg",
                                       data: {
                                            patient_id : id1,
                                            topograph : topo,
                                            morphology:morp,
                                            behavior:beh,
                                            incidance_date:inc,
                                            basis_diagnosis:base,
                                            ICD_10:icd,
                                            ICCC_code:icc,
                                            hosptal:hosptal,
                                            path_lab_no:path_lab_no,
                                            unit:unit,
                                            case_no:case_no
                                       }, 
                                       cache: false,
                                       success: function(msg){
                                            $("input, textarea, select").val("");
                                            $("form").show("slow");
                                            $("#loader").remove();
                                       }

                                    });     
                                });//end of adding tumor

                                    $("#submitbtn").click(function(){
                                    var topo = $("#Topography").val(),morp=$("#Morphology").val(),beh=$("#Behavior").val(),inc=$("#Incidence_Date").val(),base=$("#Basis_Diagnosis").val();
                                    var icd=$("#ICD_10").val(),icc=$("#ICCC_code").val(),hosptal=$("#Hospital").val(),path_lab_no=$("#Path_lab_no").val(),unit=$("#Unit").val(),case_no=$("#Case_no").val();
                                    $("#submit").hide("slow");$("#submit1").hide("slow");
                                    $("#maincontents").append("<span id='loader'><img src='img/loading.gif' /> Submitting Patient Information Please Wait To Add Another Tumor Record...</span>");    
                                    $("form").hide();
                                       $.ajax({
                                       type: "POST",
                                       url: "includes/form_processor.php?page=tumor_reg",
                                       data: {
                                            patient_id : id1,
                                            topograph : topo,
                                            morphology:morp,
                                            behavior:beh,
                                            incidance_date:inc,
                                            basis_diagnosis:base,
                                            ICD_10:icd,
                                            ICCC_code:icc,
                                            hosptal:hosptal,
                                            path_lab_no:path_lab_no,
                                            unit:unit,
                                            case_no:case_no
                                       }, 
                                       cache: false,
                                       success: function(msg){
                                            $("#listpat").trigger("click");
                                       }
                                    });
                                    });//end of adding tumor
                            });
                        })//end of adding patient tumor record
                    
                        $(".addex").click(function(){
                            var id1=$(this).attr("id");
                            $("#maincontents").html("<img src='img/loading.gif' /> Loading Patient Information Please Wait...");
                            $("#maincontents").load("includes/forms.php?page=Examination",function(){
                                $("#submitbtn1").click(function(){
                                    var bio = $("#Biops_Number").val(), coll=$("#Biops_collected").val(), exam=$("#Examination_Details").val();
                                    var gis=$("#Treatment_Details").val(); 
                                    $("#maincontents").append("<span id='loader'><img src='img/loading.gif' /> Submitting Patient Information Please Wait To Add Examination Record...</span>");    
                                    $("form").hide();
                                       $.ajax({
                                       type: "POST",
                                       url: "includes/form_processor.php?page=examination",
                                       data: {
                                           patient_id : id1,
                                           biopsy_number : bio,
                                           collected_from:coll,
                                           details:exam,
                                           gis_details:gis
                                       }, 
                                       cache: false,
                                       success: function(){
                                            $("input, textarea, select").val("");
                                            $("form").show("slow");
                                            $("#loader").remove();
                                       }

                                    });     
                                    });//end of adding examination
                                
                                    $("#submitbtn").click(function(){
                                        var bio = $("#Biops_Number").val(), coll=$("#Biops_collected").val(), exam=$("#Examination_Details").val();
                                        var gis=$("#Treatment_Details").val(); 
                                        $("#maincontents").append("<span id='loader'><img src='img/loading.gif' /> Submitting Patient Information Please Wait...</span>");    
                                        $("form").hide();
                                           $.ajax({
                                           type: "POST",
                                           url: "includes/form_processor.php?page=examination",
                                           data: {
                                                patient_id : id1,
                                                biopsy_number : bio,
                                                collected_from:coll,
                                                details:exam,
                                                gis_details:gis
                                           }, 
                                           cache: false,
                                           success: function(){
                                              $("#listpat").trigger("click"); 
                                           } 
                                        });     
                                    });//end of adding examination
                            });
                        });
                     });
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

