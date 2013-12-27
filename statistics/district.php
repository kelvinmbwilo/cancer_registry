<?php
include_once '../includes/connection.php';
include '../Statistics.php';
include '../class/form.php';
if(isset($_GET['page'])){
     if($_GET['page'] == "table"){
        ?>
<table class="table table-bordered">
    <tr>
        <th rowspan="2">District</th><th colspan="3">Registrations</th><th colspan="3">Death</th>
    </tr>
    <tr>
        <th>Male</th><th>Female</th><th>Total</th><th>Male</th><th>Female</th><th>Total</th>
    </tr>
    <tr>
        <td><?php echo $_POST['dist']?></td>
        <td><?php echo countColumn("patient", "WHERE gender ='Male' AND district = '{$_POST['dist']}'")?></td>
        <td><?php echo countColumn("patient", "WHERE gender ='Female' AND district = '{$_POST['dist']}'")?></td>
        <td><?php echo countColumn("patient", "WHERE district = '{$_POST['dist']}'")?></td>
        
        <td><?php echo countColumn("folow_up", "WHERE status='Dead' AND patient_id IN (".createInArray("patient","WHERE gender ='Male'", "patient_id").")".  districtCondition()) ?></td>
        <td><?php echo countColumn("folow_up", "WHERE status='Dead' AND patient_id IN (".createInArray("patient","WHERE gender ='Female'", "patient_id").")".  districtCondition()) ?></td>
        <td><?php echo countColumn("folow_up", "WHERE status='Dead'".  districtCondition()) ?></td>
    </tr>
    
</table>

<?php
    }

    if($_GET['page'] == "line"){
         $year = date("Y");
         $jan =countColumn("patient","WHERE district = '{$_POST['dist']}' AND patient_status BETWEEN '".strtotime("{$year}-01-01")."' AND '".strtotime("{$year}-02-01")."'");
         $feb =countColumn("patient","WHERE district = '{$_POST['dist']}' AND patient_status BETWEEN '".strtotime("{$year}-02-01")."' AND '".strtotime("{$year}-03-01")."'");
         $mar =countColumn("patient","WHERE district = '{$_POST['dist']}' AND patient_status BETWEEN '".strtotime("{$year}-03-01")."' AND '".strtotime("{$year}-04-01")."'");
         $apr =countColumn("patient","WHERE district = '{$_POST['dist']}' AND patient_status BETWEEN '".strtotime("{$year}-04-01")."' AND '".strtotime("{$year}-05-01")."'");
         $may =countColumn("patient","WHERE district = '{$_POST['dist']}' AND patient_status BETWEEN '".strtotime("{$year}-05-01")."' AND '".strtotime("{$year}-06-01")."'");
         $jun =countColumn("patient","WHERE district = '{$_POST['dist']}' AND patient_status BETWEEN '".strtotime("{$year}-06-01")."' AND '".strtotime("{$year}-07-01")."'");
         $jul =countColumn("patient","WHERE district = '{$_POST['dist']}' AND patient_status BETWEEN '".strtotime("{$year}-07-01")."' AND '".strtotime("{$year}-08-01")."'");
         $aug =countColumn("patient","WHERE district = '{$_POST['dist']}' AND patient_status BETWEEN '".strtotime("{$year}-08-01")."' AND '".strtotime("{$year}-09-01")."'");
         $sep =countColumn("patient","WHERE district = '{$_POST['dist']}' AND patient_status BETWEEN '".strtotime("{$year}-09-01")."' AND '".strtotime("{$year}-10-01")."'");
         $oct =countColumn("patient","WHERE district = '{$_POST['dist']}' AND patient_status BETWEEN '".strtotime("{$year}-10-01")."' AND '".strtotime("{$year}-11-01")."'");
         $nov =countColumn("patient","WHERE district = '{$_POST['dist']}' AND patient_status BETWEEN '".strtotime("{$year}-11-01")."' AND '".strtotime("{$year}-12-01")."'");
         $dec =countColumn("patient","WHERE district = '{$_POST['dist']}' AND patient_status BETWEEN '".strtotime("{$year}-12-01")."' AND '".strtotime("{$year}-12-31")."'");
         
         $jan1 =countColumn("folow_up","WHERE status='Dead' AND last_contact  BETWEEN '{$year}-01-01' AND '{$year}-02-01' AND patient_id IN (".createInArray("patient","WHERE district = '{$_POST['dist']}'", "patient_id").")");
         $feb1 =countColumn("folow_up","WHERE status='Dead' AND last_contact  BETWEEN '{$year}-02-01' AND '{$year}-03-01' AND patient_id IN (".createInArray("patient","WHERE district = '{$_POST['dist']}'", "patient_id").")");
         $mar1 =countColumn("folow_up","WHERE status='Dead' AND last_contact  BETWEEN '{$year}-03-01' AND '{$year}-04-01' AND patient_id IN (".createInArray("patient","WHERE district = '{$_POST['dist']}'", "patient_id").")");
         $apr1 =countColumn("folow_up","WHERE status='Dead' AND last_contact  BETWEEN '{$year}-04-01' AND '{$year}-05-01' AND patient_id IN (".createInArray("patient","WHERE district = '{$_POST['dist']}'", "patient_id").")");
         $may1 =countColumn("folow_up","WHERE status='Dead' AND last_contact  BETWEEN '{$year}-05-01' AND '{$year}-06-01' AND patient_id IN (".createInArray("patient","WHERE district = '{$_POST['dist']}'", "patient_id").")");
         $jun1 =countColumn("folow_up","WHERE status='Dead' AND last_contact  BETWEEN '{$year}-06-01' AND '{$year}-07-01' AND patient_id IN (".createInArray("patient","WHERE district = '{$_POST['dist']}'", "patient_id").")");
         $jul1 =countColumn("folow_up","WHERE status='Dead' AND last_contact  BETWEEN '{$year}-07-01' AND '{$year}-08-01' AND patient_id IN (".createInArray("patient","WHERE district = '{$_POST['dist']}'", "patient_id").")");
         $aug1 =countColumn("folow_up","WHERE status='Dead' AND last_contact  BETWEEN '{$year}-08-01' AND '{$year}-09-01' AND patient_id IN (".createInArray("patient","WHERE district = '{$_POST['dist']}'", "patient_id").")");
         $sep1 =countColumn("folow_up","WHERE status='Dead' AND last_contact  BETWEEN '{$year}-09-01' AND '{$year}-10-01' AND patient_id IN (".createInArray("patient","WHERE district = '{$_POST['dist']}'", "patient_id").")");
         $oct1 =countColumn("folow_up","WHERE status='Dead' AND last_contact  BETWEEN '{$year}-10-01' AND '{$year}-11-01' AND patient_id IN (".createInArray("patient","WHERE district = '{$_POST['dist']}'", "patient_id").")");
         $nov1 =countColumn("folow_up","WHERE status='Dead' AND last_contact  BETWEEN '{$year}-11-01' AND '{$year}-12-01' AND patient_id IN (".createInArray("patient","WHERE district = '{$_POST['dist']}'", "patient_id").")");
         $dec1 =countColumn("folow_up","WHERE status='Dead' AND last_contact  BETWEEN '{$year}-12-01' AND '{$year}-12-31'". districtCondition());
        ?>
<script type="text/javascript">
$(function () {
        $('#container').highcharts({
            title: {
                text: '<?php echo $_POST['dist'] ?> Cancer Patient Registration Year <?php echo date("Y")?>',
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
                text: 'Total Patient Registred in <?php echo $_POST['dist'] ?>'
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
                data: [<?php echo countColumn("patient", "WHERE district = '{$_POST['dist']}' AND  gender ='Female'") ?>, <?php echo countColumn("folow_up", "WHERE status='Dead' ".genderCondition("Female") .districtCondition()); ?>]
            }, {
                name: 'Male',
                data: [<?php echo countColumn("patient", "WHERE district = '{$_POST['dist']}' AND  gender ='Male'") ?>, <?php echo countColumn("folow_up", "WHERE status='Dead' ".genderCondition("Male") . districtCondition()) ?>]
            }, {
                name: 'Total',
                data: [<?php echo countColumn("patient", "WHERE district = '{$_POST['dist']}'")?>, <?php echo countColumn("folow_up", "WHERE status='Dead' ". districtCondition()); ?>]
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
                text: 'Cancer Patient Registration In <?php echo $_POST['dist'] ?>'
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
                name: 'Patient Registration In <?php echo $_POST['dist'] ?> ',
                data: [
                    ['Female',<?php echo countColumn("patient", "WHERE district = '{$_POST['dist']}' AND  gender ='Female'") ?>],
                    ['Male',  <?php echo countColumn("patient", "WHERE district = '{$_POST['dist']}' AND  gender ='Male'") ?>]
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
                text: 'Cancer Patient Death In <?php echo $_POST['dist'] ?>'
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
                name: 'Patient Death In <?php echo $_POST['dist'] ?>',
                data: [
                    ['Female', <?php echo countColumn("folow_up", "WHERE status='Dead' ".  genderCondition("Female") . districtCondition()) ?>],
                    ['Male',   <?php echo countColumn("folow_up", "WHERE status='Dead' ".  genderCondition("Male").  districtCondition()) ?>]
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
