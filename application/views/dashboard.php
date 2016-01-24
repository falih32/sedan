<?php 
$role = $this->session->userdata('id_role'); 
$level = $this->session->userdata('id_level');
$barang=0;
$jasa=0;
$konsultan=0;
$chart = json_decode($chart);
$chart = $chart!=null?$chart->data:array();
$chartdata = json_encode($chart);
foreach($totalpengadaan as $rowtot) {
    if($rowtot->jenis==0) { $barang=$rowtot->total; } 
    else if($rowtot->jenis==1) { $jasa=$rowtot->total; }    
    else if($rowtot->jenis==2) { $konsultan=$rowtot->total; } 
}

?>
<div class="container-fluid">
    <h1>Dashboard</h1><hr>
    
   <div class="col-sm-12"><h3>Data Pengadaaan Tahun <?php echo $this->session->userdata('tahun');?></h3></div>
        <div class="col-sm-4">
            <div class="panel panel-default">
                <div class="panel-heading panelNotif">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-cubes fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?php echo $barang;?></div>
                            <div>Pengadaan Barang</div>
                        </div>
                    </div>
                </div>
<!--                <a data-toggle="modal" data-target="#collapseSurat2" href="#collapseSurat2" aria-expanded="false" aria-controls="">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>-->
            </div>
        </div>
        <div class="col-sm-4">
            <div class="panel panel-yellow">
                <div class="panel-heading panelNotif">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-truck fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?php echo $jasa;?></div>
                            <div>Pengadaan Jasa</div>
                        </div>
                    </div>
                </div>
<!--                <a data-toggle="modal" data-target="#collapseSurat1" href="#collapseSurat1" aria-expanded="false" aria-controls="">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>-->
            </div>
        </div>
        <div class="col-sm-4">
            <div class="panel panel-green">
                <div class="panel-heading panelNotif">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-male fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?php echo $konsultan;?></div>
                            <div>Pengadaan Konsultan</div>
                        </div>
                    </div>
                </div>
<!--                <a data-toggle="modal" data-target="#collapseSurat3" href="#collapseSurat3" aria-expanded="false" aria-controls="">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>-->
            </div>
        </div>    
</div>
    
    
    
    
    
    <!-- Grafik Total Pengadaan -->
    <div class="row-fluid">
    	<div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-6"><i class="fa fa-line-chart"></i> Grafik Total Pengadaan</div>
                    <div class="col-md-6 div_filter_chart">
                        
                    </div>
                </div>
            </div>
            <div class="panel-body text-center">
            	<div class="col-md-12"><h3>Grafik Total Pengadaan</h3></div>
            	<div class="col-md-12" id="conchart2" style="height:400px;">  
                </div>
                <div class="col-md-12" id="chart2-legend"></div>
            </div>
        </div>
    </div>
    
    
    <div class="row-fluid">
    	<div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-6"><i class="fa fa-table"></i> Tabel Data Pengadaaan Tahun <?php echo $this->session->userdata('tahun');?> </div>
                    
                </div>
            </div>
                <table id="" class="table table-responsive table-hover">
                    <thead>
                        <th>Jenis Pengadaan </th>
                        <th>Total</th>
                    </thead>
                    <tbody id="tabel-stat-dispo-body">
                          
                        <tr class="top-dept" style=""> 
                            <td>Barang</td>
                            <td><?php echo $barang; ?></td>
                        </tr>
                        <tr class="top-dept" style=""> 
                            <td>Jasa</td>
                            <td><?php echo $jasa; ?></td>
                        </tr>
                        <tr class="top-dept" style=""> 
                            <td>Konsultan</td>
                            <td><?php echo $konsultan; ?></td>
                        </tr>
    
                      
                    </tbody>
                </table>
        </div>
    </div>
    
</div>
    
<script type="application/javascript">
    
$(document).ready(function() {
    
    // --------------- Chart2 ---------------
    var chart2 = AmCharts.makeChart("conchart2", {
        "theme": "light",
        "type": "serial",
        "dataProvider": <?php echo $chartdata ?>,
        "valueAxes": [{
            "stackType": "none",
            "unit": "",
            "position": "left",
            "title": "Jumlah",
        }],
        "startDuration": 1,
        "graphs": [
        {
            "balloonText": "Total Pengadaan Barang [[category]]: <b>[[value]]</b>",
            "fillAlphas": 0.9,
            "lineAlpha": 0.2,
            "lineColor": "#E76363",
            "title": "Total Pengadaan Barang ",
            "type": "column",
            "valueField": "barang"
        }, 
        
        {
            "balloonText": "Total Pengadaan Jasa [[category]]: <b>[[value]]</b>",
            "fillAlphas": 0.9,
            "lineAlpha": 0.2,
            "lineColor": "#634AA5",
            "title": "Total Pengadaan Jasa ",
            "type": "column",
            "valueField": "jasa"
        },
        
        {
            "balloonText": "Total Pengadaan Konsultan [[category]]: <b>[[value]]</b>",
            "fillAlphas": 0.9,
            "lineAlpha": 0.2,
            "lineColor": "#6BA54A",
            "title": "Total Pengadaan Konsultan ",
            "type": "column",
            "valueField": "konsultan"
        }
        
        ],
        "plotAreaFillAlphas": 0.1,
        "depth3D": 60,
        "angle": 30,
        "categoryField": "bulan",
        "categoryAxis": {
            "gridPosition": "start",
            "title": "Bulan"
        },
        "legend":{
            "useGraphSettings": true
        },
        "export": {
            "enabled": true
         }
    });
   
});     


</script>
