<?php
include_once '../includes/connection.php';
include '../Statistics.php';
include '../class/form.php';
if(isset($_GET['page'])){
    if($_GET['page'] == "district"){
        $reg = ($_POST['reg'] == "Region")?"all":$_POST['reg'];
        echo form::districtDropdown($reg, "");
    }
    
     if($_GET['page'] == "savereport"){
       $arr = array("date_created"=> date("Y-m-d"));
       $source1 = array_merge((array)$_POST, (array)$arr);
       form::addUser($source1, "reports");
    }
    
    
    if($_GET['page'] == "total_table"){
        ?>
<h3>Cancer Patient Registration</h3>
<table class="table table-bordered">
    <tr>
        <th></th><th colspan="3">Registrations</th><th colspan="3">Death</th>
    </tr>
    <tr>
        <th></th><th>Male</th><th>Female</th><th>Total</th><th>Male</th><th>Female</th><th>Total</th>
    </tr>
    <tr>
        <td></td>
        <td><?php echo countColumn("patient", "WHERE gender ='Male'")?></td>
        <td><?php echo countColumn("patient", "WHERE gender ='Female'")?></td>
        <td><?php echo countColumn("patient", "")?></td>
        
        <td><?php echo countColumn("folow_up", "WHERE status='Dead' AND patient_id IN (".createInArray("patient","WHERE gender ='Male'", "patient_id").")") ?></td>
        <td><?php echo countColumn("folow_up", "WHERE status='Dead' AND patient_id IN (".createInArray("patient","WHERE gender ='Female'", "patient_id").")") ?></td>
        <td><?php echo countColumn("folow_up", "WHERE status='Dead'") ?></td>
    </tr>
</table>

<?php
    }
    
    if($_GET['page'] == "total_line"){
         $year = date("Y");
         $jan =countColumn("patient","WHERE patient_status BETWEEN '".strtotime("{$year}-01-01")."' AND '".strtotime("{$year}-02-01")."'");
         $feb =countColumn("patient","WHERE patient_status BETWEEN '".strtotime("{$year}-02-01")."' AND '".strtotime("{$year}-03-01")."'");
         $mar =countColumn("patient","WHERE patient_status BETWEEN '".strtotime("{$year}-03-01")."' AND '".strtotime("{$year}-04-01")."'");
         $apr =countColumn("patient","WHERE patient_status BETWEEN '".strtotime("{$year}-04-01")."' AND '".strtotime("{$year}-05-01")."'");
         $may =countColumn("patient","WHERE patient_status BETWEEN '".strtotime("{$year}-05-01")."' AND '".strtotime("{$year}-06-01")."'");
         $jun =countColumn("patient","WHERE patient_status BETWEEN '".strtotime("{$year}-06-01")."' AND '".strtotime("{$year}-07-01")."'");
         $jul =countColumn("patient","WHERE patient_status BETWEEN '".strtotime("{$year}-07-01")."' AND '".strtotime("{$year}-08-01")."'");
         $aug =countColumn("patient","WHERE patient_status BETWEEN '".strtotime("{$year}-08-01")."' AND '".strtotime("{$year}-09-01")."'");
         $sep =countColumn("patient","WHERE patient_status BETWEEN '".strtotime("{$year}-09-01")."' AND '".strtotime("{$year}-10-01")."'");
         $oct =countColumn("patient","WHERE patient_status BETWEEN '".strtotime("{$year}-10-01")."' AND '".strtotime("{$year}-11-01")."'");
         $nov =countColumn("patient","WHERE patient_status BETWEEN '".strtotime("{$year}-11-01")."' AND '".strtotime("{$year}-12-01")."'");
         $dec =countColumn("patient","WHERE patient_status BETWEEN '".strtotime("{$year}-12-01")."' AND '".strtotime("{$year}-12-31")."'");
         
         $jan1 =countColumn("folow_up","WHERE status='Dead' AND last_contact  BETWEEN '{$year}-01-01' AND '{$year}-02-01'");
         $feb1 =countColumn("folow_up","WHERE status='Dead' AND last_contact  BETWEEN '{$year}-02-01' AND '{$year}-03-01'");
         $mar1 =countColumn("folow_up","WHERE status='Dead' AND last_contact  BETWEEN '{$year}-03-01' AND '{$year}-04-01'");
         $apr1 =countColumn("folow_up","WHERE status='Dead' AND last_contact  BETWEEN '{$year}-04-01' AND '{$year}-05-01'");
         $may1 =countColumn("folow_up","WHERE status='Dead' AND last_contact  BETWEEN '{$year}-05-01' AND '{$year}-06-01'");
         $jun1 =countColumn("folow_up","WHERE status='Dead' AND last_contact  BETWEEN '{$year}-06-01' AND '{$year}-07-01'");
         $jul1 =countColumn("folow_up","WHERE status='Dead' AND last_contact  BETWEEN '{$year}-07-01' AND '{$year}-08-01'");
         $aug1 =countColumn("folow_up","WHERE status='Dead' AND last_contact  BETWEEN '{$year}-08-01' AND '{$year}-09-01'");
         $sep1 =countColumn("folow_up","WHERE status='Dead' AND last_contact  BETWEEN '{$year}-09-01' AND '{$year}-10-01'");
         $oct1 =countColumn("folow_up","WHERE status='Dead' AND last_contact  BETWEEN '{$year}-10-01' AND '{$year}-11-01'");
         $nov1 =countColumn("folow_up","WHERE status='Dead' AND last_contact  BETWEEN '{$year}-11-01' AND '{$year}-12-01'");
         $dec1 =countColumn("folow_up","WHERE status='Dead' AND last_contact  BETWEEN '{$year}-12-01' AND '{$year}-12-31'");
        ?>
<script type="text/javascript">
$(function () {
        $('#container').highcharts({
            title: {
                text: 'Cancer Patient Registration Year <?php echo date("Y")?>',
                x: -20 //center
            },
            xAxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                    'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
            },
            yAxis: {
                title: {
                    text: 'Number Of Patient'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: {
                valueSuffix: 'patient'
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle',
                borderWidth: 0
            },
            series: [{
                name: 'Registration',
                data: [<?php echo "$jan,$feb,$mar,$apr,$may,$jun,$jul,$aug,$sep,$oct,$nov,$dec" ?>]
            }, {
                name: 'Death',
                data: [<?php echo "$jan1,$feb1,$mar1,$apr1,$may1,$jun1,$jul1,$aug1,$sep1,$oct1,$nov1,$dec1" ?>]
            }]
        });
    });
    

		</script>
                 <div id="container" style="width:90%; height:400px;"></div>
<?php
    }
    
    if($_GET['page'] == "total_bar"){
         ?>
                 <script>
                 $('#container').highcharts({
            chart: {
                type: 'bar'
            },
            title: {
                text: 'Total Patient Registred'
            },
            xAxis: {
                categories: ['Registrations', 'Death'],
                title: {
                    text: null
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Number of Patient',
                    align: 'high'
                },
                labels: {
                    overflow: 'justify'
                }
            },
            tooltip: {
                valueSuffix: ' Patients'
            },
            plotOptions: {
                bar: {
                    dataLabels: {
                        enabled: true
                    }
                }
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'top',
                x: -40,
                y: 100,
                floating: true,
                borderWidth: 1,
                backgroundColor: '#FFFFFF',
                shadow: true
            },
            credits: {
                enabled: false
            },
            series: [{
                name: 'Female',
                data: [<?php echo countColumn("patient", "WHERE gender ='Female'") ?>, <?php echo countColumn("folow_up", "WHERE status='Dead' AND patient_id IN (".createInArray("patient","WHERE gender ='Female'", "patient_id").")") ?>]
            }, {
                name: 'Male',
                data: [<?php echo countColumn("patient", "WHERE gender ='Male'") ?>, <?php echo countColumn("folow_up", "WHERE status='Dead' AND patient_id IN (".createInArray("patient","WHERE gender ='Male'", "patient_id").")") ?>]
            }, {
                name: 'Total',
                data: [<?php echo countColumn("patient", "")?>, <?php echo countColumn("folow_up", "WHERE status='Dead'") ?>]
            }]
        });
                 </script>
<div id="container" style="width:90%; height:400px;"></div>
<?php
    }
    
    if($_GET['page'] == "total_pie"){
        ?>
<script type="text/javascript">
$(function () {
    var chart;
    
    $(document).ready(function () {
    	
    	// Build the chart
        $('#container').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false
            },
            title: {
                text: 'Cancer Patient Registration'
            },
            tooltip: {
        	    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
            series: [{
                type: 'pie',
                name: 'Patient Registration',
                data: [
                    ['Female',<?php echo countColumn("patient", "WHERE gender ='Female'") ?>],
                    ['Male',  <?php echo countColumn("patient", "WHERE gender ='Male'") ?>]
                ]
            }]
        });
    });
    
    $('#container1').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false
            },
            title: {
                text: 'Cancer Patient Death'
            },
            tooltip: {
        	    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
            series: [{
                type: 'pie',
                name: 'Patient Death',
                data: [
                    ['Female', <?php echo countColumn("folow_up", "WHERE status='Dead' AND patient_id IN (".createInArray("patient","WHERE gender ='Female'", "patient_id").")") ?>],
                    ['Male',   <?php echo countColumn("folow_up", "WHERE status='Dead' AND patient_id IN (".createInArray("patient","WHERE gender ='Male'", "patient_id").")") ?>]
                ]
            }]
        });
});
		</script>
<div id="container" style="width:45%; height:400px;" class="pull-left"></div>
<div id="container1" style="width:45%; height:400px;" class="pull-right"></div>
<?php
    }
   
    if($_GET['page'] == "table"){
        ?>
<table class="table table-bordered">
    <tr>
        <th rowspan="2">Region</th><th colspan="3">Registrations</th><th colspan="3">Death</th>
    </tr>
    <tr>
        <th>Male</th><th>Female</th><th>Total</th><th>Male</th><th>Female</th><th>Total</th>
    </tr>
    <tr>
        <td><?php echo $_POST['reg']?></td>
        <td><?php echo countColumn("patient", "WHERE gender ='Male' AND region = '{$_POST['reg']}'")?></td>
        <td><?php echo countColumn("patient", "WHERE gender ='Female' AND region = '{$_POST['reg']}'")?></td>
        <td><?php echo countColumn("patient", "WHERE region = '{$_POST['reg']}'")?></td>
        
        <td><?php echo countColumn("folow_up", "WHERE status='Dead' AND patient_id IN (".createInArray("patient","WHERE gender ='Male'", "patient_id").")". regionalCondition()) ?></td>
        <td><?php echo countColumn("folow_up", "WHERE status='Dead' AND patient_id IN (".createInArray("patient","WHERE gender ='Female'", "patient_id").")". regionalCondition()) ?></td>
        <td><?php echo countColumn("folow_up", "WHERE status='Dead'". regionalCondition()) ?></td>
        
    </tr>
</table>

<?php
    }

    if($_GET['page'] == "line"){
         $year = date("Y");
         $jan =countColumn("patient","WHERE region = '{$_POST['reg']}' AND patient_status BETWEEN '".strtotime("{$year}-01-01")."' AND '".strtotime("{$year}-02-01")."'");
         $feb =countColumn("patient","WHERE region = '{$_POST['reg']}' AND patient_status BETWEEN '".strtotime("{$year}-02-01")."' AND '".strtotime("{$year}-03-01")."'");
         $mar =countColumn("patient","WHERE region = '{$_POST['reg']}' AND patient_status BETWEEN '".strtotime("{$year}-03-01")."' AND '".strtotime("{$year}-04-01")."'");
         $apr =countColumn("patient","WHERE region = '{$_POST['reg']}' AND patient_status BETWEEN '".strtotime("{$year}-04-01")."' AND '".strtotime("{$year}-05-01")."'");
         $may =countColumn("patient","WHERE region = '{$_POST['reg']}' AND patient_status BETWEEN '".strtotime("{$year}-05-01")."' AND '".strtotime("{$year}-06-01")."'");
         $jun =countColumn("patient","WHERE region = '{$_POST['reg']}' AND patient_status BETWEEN '".strtotime("{$year}-06-01")."' AND '".strtotime("{$year}-07-01")."'");
         $jul =countColumn("patient","WHERE region = '{$_POST['reg']}' AND patient_status BETWEEN '".strtotime("{$year}-07-01")."' AND '".strtotime("{$year}-08-01")."'");
         $aug =countColumn("patient","WHERE region = '{$_POST['reg']}' AND patient_status BETWEEN '".strtotime("{$year}-08-01")."' AND '".strtotime("{$year}-09-01")."'");
         $sep =countColumn("patient","WHERE region = '{$_POST['reg']}' AND patient_status BETWEEN '".strtotime("{$year}-09-01")."' AND '".strtotime("{$year}-10-01")."'");
         $oct =countColumn("patient","WHERE region = '{$_POST['reg']}' AND patient_status BETWEEN '".strtotime("{$year}-10-01")."' AND '".strtotime("{$year}-11-01")."'");
         $nov =countColumn("patient","WHERE region = '{$_POST['reg']}' AND patient_status BETWEEN '".strtotime("{$year}-11-01")."' AND '".strtotime("{$year}-12-01")."'");
         $dec =countColumn("patient","WHERE region = '{$_POST['reg']}' AND patient_status BETWEEN '".strtotime("{$year}-12-01")."' AND '".strtotime("{$year}-12-31")."'");
         
         $jan1 =countColumn("folow_up","WHERE status='Dead' AND last_contact  BETWEEN '{$year}-01-01' AND '{$year}-02-01' AND patient_id IN (".createInArray("patient","WHERE region = '{$_POST['reg']}'", "patient_id").")");
         $feb1 =countColumn("folow_up","WHERE status='Dead' AND last_contact  BETWEEN '{$year}-02-01' AND '{$year}-03-01' AND patient_id IN (".createInArray("patient","WHERE region = '{$_POST['reg']}'", "patient_id").")");
         $mar1 =countColumn("folow_up","WHERE status='Dead' AND last_contact  BETWEEN '{$year}-03-01' AND '{$year}-04-01' AND patient_id IN (".createInArray("patient","WHERE region = '{$_POST['reg']}'", "patient_id").")");
         $apr1 =countColumn("folow_up","WHERE status='Dead' AND last_contact  BETWEEN '{$year}-04-01' AND '{$year}-05-01' AND patient_id IN (".createInArray("patient","WHERE region = '{$_POST['reg']}'", "patient_id").")");
         $may1 =countColumn("folow_up","WHERE status='Dead' AND last_contact  BETWEEN '{$year}-05-01' AND '{$year}-06-01' AND patient_id IN (".createInArray("patient","WHERE region = '{$_POST['reg']}'", "patient_id").")");
         $jun1 =countColumn("folow_up","WHERE status='Dead' AND last_contact  BETWEEN '{$year}-06-01' AND '{$year}-07-01' AND patient_id IN (".createInArray("patient","WHERE region = '{$_POST['reg']}'", "patient_id").")");
         $jul1 =countColumn("folow_up","WHERE status='Dead' AND last_contact  BETWEEN '{$year}-07-01' AND '{$year}-08-01' AND patient_id IN (".createInArray("patient","WHERE region = '{$_POST['reg']}'", "patient_id").")");
         $aug1 =countColumn("folow_up","WHERE status='Dead' AND last_contact  BETWEEN '{$year}-08-01' AND '{$year}-09-01' AND patient_id IN (".createInArray("patient","WHERE region = '{$_POST['reg']}'", "patient_id").")");
         $sep1 =countColumn("folow_up","WHERE status='Dead' AND last_contact  BETWEEN '{$year}-09-01' AND '{$year}-10-01' AND patient_id IN (".createInArray("patient","WHERE region = '{$_POST['reg']}'", "patient_id").")");
         $oct1 =countColumn("folow_up","WHERE status='Dead' AND last_contact  BETWEEN '{$year}-10-01' AND '{$year}-11-01' AND patient_id IN (".createInArray("patient","WHERE region = '{$_POST['reg']}'", "patient_id").")");
         $nov1 =countColumn("folow_up","WHERE status='Dead' AND last_contact  BETWEEN '{$year}-11-01' AND '{$year}-12-01' AND patient_id IN (".createInArray("patient","WHERE region = '{$_POST['reg']}'", "patient_id").")");
         $dec1 =countColumn("folow_up","WHERE status='Dead' AND last_contact  BETWEEN '{$year}-12-01' AND '{$year}-12-31' AND patient_id IN (".createInArray("patient","WHERE region = '{$_POST['reg']}'", "patient_id").")");
        ?>
<script type="text/javascript">
$(function () {
        $('#container').highcharts({
            title: {
                text: '<?php echo $_POST['reg'] ?> Cancer Patient Registration Year <?php echo date("Y")?>',
                x: -20 //center
            },
            xAxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                    'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
            },
            yAxis: {
                title: {
                    text: 'Number Of Patient'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: {
                valueSuffix: 'patient'
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle',
                borderWidth: 0
            },
            series: [{
                name: 'Registration',
                data: [<?php echo "$jan,$feb,$mar,$apr,$may,$jun,$jul,$aug,$sep,$oct,$nov,$dec" ?>]
            }, {
                name: 'Death',
                data: [<?php echo "$jan1,$feb1,$mar1,$apr1,$may1,$jun1,$jul1,$aug1,$sep1,$oct1,$nov1,$dec1" ?>]
            }]
        });
    });
    

		</script>
                 <div id="container" style="width:90%; height:400px;"></div>
<?php
    }
    
    if($_GET['page'] == "bar"){
         ?>
                 <script>
                 $('#container').highcharts({
            chart: {
                type: 'bar'
            },
            title: {
                text: 'Total Patient Registred in <?php echo $_POST['reg'] ?>'
            },
            xAxis: {
                categories: ['Registrations', 'Death'],
                title: {
                    text: null
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Number of Patient',
                    align: 'high'
                },
                labels: {
                    overflow: 'justify'
                }
            },
            tooltip: {
                valueSuffix: ' Patients'
            },
            plotOptions: {
                bar: {
                    dataLabels: {
                        enabled: true
                    }
                }
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'top',
                x: -40,
                y: 100,
                floating: true,
                borderWidth: 1,
                backgroundColor: '#FFFFFF',
                shadow: true
            },
            credits: {
                enabled: false
            },
            series: [{
                name: 'Female',
                data: [<?php echo countColumn("patient", "WHERE region = '{$_POST['reg']}' AND  gender ='Female'") ?>, <?php echo countColumn("folow_up", "WHERE status='Dead' ".genderCondition('Female') .regionalCondition()); ?>]
            }, {
                name: 'Male',
                data: [<?php echo countColumn("patient", "WHERE region = '{$_POST['reg']}' AND  gender ='Male'") ?>, <?php echo countColumn("folow_up", "WHERE status='Dead' ".genderCondition('Male') . regionalCondition()) ?>]
            }, {
                name: 'Total',
                data: [<?php echo countColumn("patient", "WHERE region = '{$_POST['reg']}'")?>, <?php echo countColumn("folow_up", "WHERE status='Dead' ".  regionalCondition()); ?>]
            }]
        });
                 </script>
<div id="container" style="width:90%; height:400px;"></div>
<?php
    }
    
    if($_GET['page'] == "pie"){
        ?>
<script type="text/javascript">
$(function () {
    var chart;
    
    $(document).ready(function () {
    	
    	// Build the chart
        $('#container').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false
            },
            title: {
                text: 'Cancer Patient Registration In <?php echo $_POST['reg'] ?>'
            },
            
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
            series: [{
                type: 'pie',
                name: 'Patient Registration In <?php echo $_POST['reg'] ?> ',
                data: [
                    ['Female',<?php echo countColumn("patient", "WHERE region = '{$_POST['reg']}' AND  gender ='Female'") ?>],
                    ['Male',  <?php echo countColumn("patient", "WHERE region = '{$_POST['reg']}' AND  gender ='Male'") ?>]
                ]
            }]
        });
    });
    
    $('#container1').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false
            },
            title: {
                text: 'Cancer Patient Death In <?php echo $_POST['reg'] ?>'
            },
            
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
            series: [{
                type: 'pie',
                name: 'Patient Death In <?php echo $_POST['reg'] ?>',
                data: [
                    ['Female', <?php echo countColumn("folow_up", "WHERE status='Dead' ".  genderCondition() . regionalCondition()) ?>],
                    ['Male',   <?php echo countColumn("folow_up", "WHERE status='Dead' ".  genderCondition().  regionalCondition()) ?>]
                ]
            }]
        });
});
		</script>
<div id="container" style="width:45%; height:400px;" class="pull-left"></div>
<div id="container1" style="width:45%; height:400px;" class="pull-right"></div>
<?php
    }
   
}
?>
