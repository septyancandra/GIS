
<section class="content-header">
    <h1><i class="fa fa-tasks"></i>&nbsp Productivity Daily</h1>
</section>


<section class="content">
    <div class="row"> 
 
        <div class="col-md-12">
            <div class="box box-default color-palette-box">

                <div class="box-header with-border">
                 Average User
                    <div class="box-tools pull-right">                                              
                        <button type="button" class="btn btn-box-tool" onclick="refresh_tpdod();" title="Refresh Data" >
                            <i class="fa fa-refresh"></i>
                        </button>                       
                    </div>
                </div>

                <div class="box-body">
                    <div id="trafficdod"></div>
                </div>

                <div class="box-footer">
                </div>

            </div>
        </div>
<div class="col-md-12">
            <div class="box box-default color-palette-box">

                <div class="box-header with-border">
                 Average Downlink
                    <div class="box-tools pull-right">                                              
                        <button type="button" class="btn btn-box-tool" onclick="refresh_vlrytd();" title="Refresh Data" >
                            <i class="fa fa-refresh"></i>
                        </button>                       
                    </div>
                </div>

                <div class="box-body">
                    <div id="vlrytd"></div>
                </div>

                <div class="box-footer">
                </div>

            </div>
        </div>
<div class="col-md-12">
            <div class="box box-default color-palette-box">

                <div class="box-header with-border">
                 Average Uplink
                    <div class="box-tools pull-right">                                              
                        <button type="button" class="btn btn-box-tool" onclick="refresh_vlrvspy();" title="Refresh Data" >
                            <i class="fa fa-refresh"></i>
                        </button>                       
                    </div>
                </div>

                <div class="box-body">
                    <div id="vlrpy"></div>
                </div>

                <div class="box-footer">
                </div>

            </div>
        </div>
</div>
</section>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script>


prod_daily();



function refresh_tpdod(){
    var _level = $("#level").val();   
    var _start = $("#start").val();
    linechart1('trafficdod','',_level,'KErl','<?php echo base_url('web/Dynamic_chart/query_regiondod'); ?>','','Erl');
}

function refresh_vlrytd(){
    var _level = $("#level").val();   
    var _start = $("#start").val();
    linechart3('vlrytd','',_level,'KErl','<?php echo base_url('web/Dynamic_chart/query_regionvlr '); ?>','','Erl');
}

function refresh_vlrvspy(){
    var _level = $("#level").val();   
    var _start = $("#start").val();
    linechart2('vlrpy','',_level,'KErl','<?php echo base_url('web/Dynamic_chart/query_vlrpy  '); ?>','','Erl');
}


function prod_daily(){          
    linechart1('trafficdod','','','KErl','<?php echo base_url('web/Dynamic_chart/query_regiondod'); ?>','','Erl');
    linechart3('vlrytd','','','KErl','<?php echo base_url('web/Dynamic_chart/query_regionvlr'); ?>','','Erl');
    linechart2('vlrpy','','','KErl','<?php echo base_url('web/Dynamic_chart/query_vlrpy'); ?>','','Erl');
    
}

function linechart1(_toID,_title,_subTitle,_yAxis,_source,_satuan) {
        var options = {
            colors: ["#add355", "#d36855","#7b55d3","#f7a35c", "#90ee7e","#ff0066", "#0000b3","#cccc00", "#DF5353", "#7798BF", "#aaeeee"],          
                chart: {
                        spacingTop: 20,
                        renderTo: _toID,
                        type: 'line',
                        
                        style: {
                                fontFamily: 'Source Sans Pro',
                                fontSize: '25px'
                        }           
                },
                       
                title: {
                        text: _title,
                        x: -20 //center
                },
                subtitle: {
                        text: _subTitle,
                        x: -20
                },
                credits: {
                        enabled: false
                },
                xAxis: {          
                        categories: [],
                        type: 'datetime',                   
                        labels: {
                            rotation: -90,
                            y:30,   
                            align: 'right', 
                            style: {
                                //width: '100px'
                            },
                            formatter: function() {                               
                                return (this.value);
                            }         
                        },
                        tickInterval: 10
                },
                tooltip: {
                    /* formatter: function () {
                        return 'The value for <b>' + this.x +
                            '</b> is <b>' + this.y + '</b>';
                    } */
                    formatter: function() {
                       let a = this.y ;
                       let b = 2;
                       if(0==a) {
                             return"0 MB";
                       }   
                       let c=1000;
                       let d=b||2;
                       let e = ["K","K","TB","PB","EB","ZB","YB"]
                       let f=Math.floor(Math.log(a)/Math.log(c));
                       return '<b>'+this.x+'<br/>' + this.series.name + ':'+parseFloat((a/Math.pow(c,f)).toFixed(d))+" "+e[f]+'</b>'
                    }
                },
                yAxis: [{ // Primary yAxis
                        labels:{
                            formatter: function() {
                               let a = this.value;
                               let b = 2;
                               if(0==a) {
                                     return"0 MB";
                               }   
                               let c=1000;
                               let d=b||2;
                               let e = ["K","K","TB","PB","EB","ZB","YB"]
                               let f=Math.floor(Math.log(a)/Math.log(c));
                               return parseFloat((a/Math.pow(c,f)).toFixed(d))+" "+e[f]
                            }   
                         },
                                    
                    }, { // Secondary yAxis
                        gridLineWidth: 0,

                        labels: {
                            formatter: function() {
                               let a = this.value;
                               let b = 2;
                               if(0==a) {
                                     return"0 MB";
                               }   
                               let c=1000;
                               let d=b||2;
                               let e = ["K","K","TB","PB","EB","ZB","YB"]
                               let f=Math.floor(Math.log(a)/Math.log(c));
                               return parseFloat((a/Math.pow(c,f)).toFixed(d))+" "+e[f]
                            }   
                        },
                        opposite: true
                    }
                ],
                 plotOptions: {
                    line: {
                            dataLabels: {
                                enabled: true
                            },
                            enableMouseTracking: false
                        }
                }, 
                    plotOptions: {
                        series: {
                                borderWidth: 0,
                                dataLabels: {
                                enabled: false,
                                //fontsize: 1
                            //  format: '{point.y:.1f}%'
                            style: {
                                    fontSize: '7px',
                                    fontFamily: 'Verdana, sans-serif'
                                    }
                                }
                            }
                    },   
                series: []
        }

        $.getJSON(_source,{toID:_toID}, function(json) {            
            var len = json.result.length
            for(i=0;i<len;i++){
                if(i===0){
                    options.xAxis.categories = json.result[i]['data'];
                }else{
                    j = i-1;
                    options.series[j] = json.result[i];
                }
            }            
            chart = new Highcharts.Chart(options);
            //console.log(json.meta.message);           
        }); 


    };

    function linechart2(_toID,_title,_subTitle,_yAxis,_source,_satuan) {
        var options = {
            colors: ["#00DDDD", "#BA55d3","#7cb5ec","#f7a35c", "#90ee7e","#ff0066", "#0000b3","#cccc00", "#DF5353", "#7798BF", "#aaeeee"],          
                chart: {
                        spacingTop: 20,
                        renderTo: _toID,
                        type: 'line',
                
                        style: {
                                fontFamily: 'Source Sans Pro',
                                fontSize: '15px'
                        }           
                },
                       
                title: {
                        text: _title,
                        x: -20 //center
                },
                subtitle: {
                        text: _subTitle,
                        x: -20
                },
                credits: {
                        enabled: false
                },
                xAxis: {          
                        categories: [],
                        type: 'datetime',                   
                        labels: {
                            rotation: -90,
                            y:30,   
                            align: 'right',
                            style: {
                                //width: '100px'
                            },
                            formatter: function() {                               
                                return (this.value);
                            }         
                        },
                        tickInterval: 10
                },
                tooltip: {
                    /* formatter: function () {
                        return 'The value for <b>' + this.x +
                            '</b> is <b>' + this.y + '</b>';
                    } */
                    formatter: function() {
                       let a = this.y ;
                       let b = 2;
                       if(0==a) {
                             return"0 MB";
                       }   
                       let c=1024;
                       let d=b||2;
                       let e = ["KB","MB","GB","PB","EB","ZB","YB"]
                       let f=Math.floor(Math.log(a)/Math.log(c));
                       return '<b>'+this.x+'<br/>' + this.series.name + ':'+parseFloat((a/Math.pow(c,f)).toFixed(d))+" "+e[f]+'</b>'
                    }
                },              
                yAxis: [{ // Primary yAxis
                        labels: {
                            formatter: function() {
                               let a = this.value;
                               let b = 0;
                               if(0==a) {
                                     return"0";
                               }   
                               let c=1024;
                               let d=b||2;
                               let e = ["KB","MB","TB","TB"]
                               let f=Math.floor(Math.log(a)/Math.log(c));
                               return parseFloat((a/Math.pow(c,f)).toFixed(d))+" "+e[f]
                            }
                        },
                        title: {
                            text: 'Values'
                        }                       
                    }, { // Secondary yAxis
                        gridLineWidth: 0,
                        title: {
                            text: 'Payload  ',
                            rotation: -90
                        },
                        labels: {
                            formatter: function() {
                               let a = this.value;
                               let b = 2;
                               if(0==a) {
                                     return"0 MB";
                               }   
                               let c=1024;
                               let d=b||2;
                               let e = ["MB","GB","TB","PB","EB","ZB","YB"]
                               let f=Math.floor(Math.log(a)/Math.log(c));
                               return parseFloat((a/Math.pow(c,f)).toFixed(d))+" "+e[f]
                            }
                        },
                        opposite: true
                    }
                ],
                
                 plotOptions: {
                    line: {
                            dataLabels: {
                                enabled: true
                            },
                            enableMouseTracking: false
                        }
                },
                    plotOptions: {
                        series: {
                                borderWidth: 0,
                                dataLabels: {
                                enabled: false,
                                //fontsize: 1
                            //  format: '{point.y:.1f}%'
                            style: {
                                    fontSize: '7px',
                                    fontFamily: 'Verdana, sans-serif'
                                    }
                                }
                            }
                    },   
                series: []
        }

        $.getJSON(_source,{toID:_toID}, function(json) {            
            var len = json.result.length
            for(i=0;i<len;i++){
                if(i===0){
                    options.xAxis.categories = json.result[i]['data'];
                }else{
                    j = i-1;
                    options.series[j] = json.result[i];
                }
            }            
            chart = new Highcharts.Chart(options);
            //console.log(json.meta.message);           
        }); 


    };

    function linechart3(_toID,_title,_subTitle,_yAxis,_source,_satuan) {
        var options = {
            colors: ["#dd0000", "#00dddd","#6fdd00","#f7a35c", "#90ee7e","#ff0066", "#0000b3","#cccc00", "#DF5353", "#7798BF", "#aaeeee"],          
                chart: {
                        spacingTop: 20,
                        renderTo: _toID,
                        type: 'line',
                
                        style: {
                                fontFamily: 'Source Sans Pro',
                                fontSize: '15px'
                        }           
                },
                       
                title: {
                        text: _title,
                        x: -20 //center
                },
                subtitle: {
                        text: _subTitle,
                        x: -20
                },
                credits: {
                        enabled: false
                },
                 xAxis: {          
                        categories: [],
                        type: 'datetime',                   
                        labels: {
                            rotation: -90,
                            y:30,   
                            align: 'right',
                            style: {
                                //width: '100px'
                            },
                            formatter: function() {                               
                                return (this.value);
                            }         
                        },
                        tickInterval: 10
                },
                tooltip: {
                    /* formatter: function () {
                        return 'The value for <b>' + this.x +
                            '</b> is <b>' + this.y + '</b>';
                    } */
                    formatter: function() {
                       let a = this.y ;
                       let b = 2;
                       if(0==a) {
                             return"0 MB";
                       }   
                       let c=1024;
                       let d=b||2;
                       let e = ["KB","MB","GB","PB","EB","ZB","YB"]
                       let f=Math.floor(Math.log(a)/Math.log(c));
                       return '<b>'+this.x+'<br/>' + this.series.name + ':'+parseFloat((a/Math.pow(c,f)).toFixed(d))+" "+e[f]+'</b>'
                    }
                },              
                yAxis: [{ // Primary yAxis
                        labels: {
                            formatter: function() {
                               let a = this.value;
                               let b = 0;
                               if(0==a) {
                                     return"0";
                               }   
                               let c=1024;
                               let d=b||0;
                               let e = ["MB","GB","TB","Milyar"]
                               let f=Math.floor(Math.log(a)/Math.log(c));
                               return parseFloat((a/Math.pow(c,f)).toFixed(d))+" "+e[f]
                            }   
                         },
                        title: {
                            text: 'Values'
                        }                       
                    }, { // Secondary yAxis
                        gridLineWidth: 0,
                        title: {
                            text: 'Delta ',
                            rotation: -90
                        },
                        labels: {
                            format: '{value}',
                        },
                        opposite: true
                    }
                ],
                
                 plotOptions: {
                    line: {
                            dataLabels: {
                                enabled: true
                            },
                            enableMouseTracking: false
                        }
                },
                    plotOptions: {
                        series: {
                                borderWidth: 0,
                                dataLabels: {
                                enabled: false,
                                //fontsize: 1
                            //  format: '{point.y:.1f}%'
                            style: {
                                    fontSize: '7px',
                                    fontFamily: 'Verdana, sans-serif'
                                    }
                                }
                            }
                    },   
                series: []
        }

        $.getJSON(_source,{toID:_toID}, function(json) {            
            var len = json.result.length
            for(i=0;i<len;i++){
                if(i===0){
                    options.xAxis.categories = json.result[i]['data'];
                }else{
                    j = i-1;
                    options.series[j] = json.result[i];
                }
            }            
            chart = new Highcharts.Chart(options);
            //console.log(json.meta.message);           
        }); 


    };


</script>
