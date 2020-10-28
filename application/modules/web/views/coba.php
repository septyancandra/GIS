<!-- page script -->
<script>
  var _mainevent='INNAGARUDA';
  var _idmap = "map";
  var _zoom = 8.75;  
  var _lat=-7.3000;
  var _lng=109.500;  
  var markersArray = []; 
  var markers = {};    
  var center = null;
    var map = null;
    var currentPopup;
  var bounds = new google.maps.LatLngBounds();
  var markerGroups = {
    "PPTH": [],    //Poi Payload & Traffic High
    "PPH": [],    //Poi Payload High
    "PTH": [],    //Poi Traffic High
    "PNO": []    //Poi Normal
  };
  
  function initMap(_idmap,_zoom,_lat,_lng) {
    mapProp = {
      center: new google.maps.LatLng(_lat,_lng),
      zoom: _zoom,
      //disableDefaultUI: true,
      mapTypeId: google.maps.MapTypeId.TERRAIN
    };
      
    map = new google.maps.Map(document.getElementById(_idmap), mapProp); 
    var legend = document.getElementById('legend');
    var headbtn    = document.getElementById('headbtn');
    map.controls[google.maps.ControlPosition.TOP_CENTER].push(headbtn);
    map.controls[google.maps.ControlPosition.LEFT_TOP].push(legend);
    var trafficLayer = new google.maps.TrafficLayer();    
    trafficLayer.setMap(map);   
    list_site(null);
    conggest();
  };  
  
  function list_site(_event){
    var url = '<?php echo base_url('web/dashboard/list_site'); ?>';        
    clearOverlays();
    $.getJSON(url, function(data) {
      $.each(data, function(i, dapot) {
          
        var iconku ={url: '<?php echo base_url(); ?>assets/image/tower.png', 
        scaledSize: new google.maps.Size(15, 15)} ;
        var _obah= false;
          
        
        var gm = google.maps,
          centerPt = new gm.LatLng(dapot.LATITUDE, dapot.LONGITUDE),
          markersite = new gm.Marker({
            draggable: _obah,
            position: centerPt,
            map: map,
            icon: iconku 
          });                  
        //kipas(dapot.LATITUDE, dapot.LONGITUDE,dapot.SITEID);
        
        var infoWindow = new google.maps.InfoWindow({
          content: name
        });
        
        markersite.addListener('click', function() {
          infoWindow.setContent('<b>'+dapot.SITEID+':'+dapot.SITENAME+'</b>');                    
          infoWindow.open(map, markersite);
          if (dapot.ALARM=="YES"){
            modal_list(dapot.SITEID,dapot.SITENAME);
          }  
        });
                
        markersite.addListener(markersite, 'closeclick', function () {                    
          infoWindow.close(map, markersite);            
        });            
        markersArray.push(markersite);
      });
      });
  }
  
  function rej(){
    clearOverlays();
    legend('#isilegend','<?php echo base_url('map/conggest/legend3g'); ?>');
    toastr.info('Proses Load data Rej & Power 3G');
    var ipsqa = 'http://10.6.101.36/sqa/reportsqa/dist/img/';
    var iconoMarca = "/dist/img/red.gif";           
    var icons = {
          A: {            
            name:'50-70',             
            type:'3G_green',
            icon: {url:ipsqa + 'green.png',scaledSize: new google.maps.Size(25, 25)}            
          },
          B: {
            name:'>90',                        
            type:'3G_red',
            icon: {url:ipsqa + 'red.png',scaledSize: new google.maps.Size(25, 25)}
          },
          C: {
            name:'70-90',                        
            type:'3G_yellow',
            icon: {url:ipsqa + 'yellow.png',scaledSize: new google.maps.Size(25, 25)}
          }
          
          };
    $.getJSON('<?php echo base_url('map/conggest/map_cong_hsdpa'); ?>', function(json) {
      if (json.meta.status==200){
        for (var i = 0, length = json.result.length; i < length; i++) { 
          var data = json.result[i];
 
addMarker(icons,data.SITEID,data.LAT, data.LONGI,data.CC,'<b>Data Update = '+data.JAM+'</b><br/><b>Sitename = '+data.SITEID+' _ '+data.SITE+'</b><br/><b>BSC = '+data.RNC+'</b><br/><b>REJPOWER = '+data.REJPOWER+'</b><br/><b>REJCE = '+data.REJCE+'</b><br/><b>REJCODE = '+data.REJCODE+'</b><br/><b>REJIUB = '+data.REJIUB+'</b><br/>Cell High Power>95% = '+data.notsafe+'.%<br/>');    
        }
        toastr.success('Load Data Rej & Power 3G success');
      } else{        
        toastr.warning(json.meta.message);
      }
    });
  }
  
  function br(){
    clearOverlays();
    legend('#isilegend','<?php echo base_url('map/conggest/legend2g'); ?>');
    toastr.info('Proses Load Data Blocking Rate 2G');
    var ipsqa = 'http://10.6.101.36/sqa/reportsqa_new/dist/img/picture_util/';
    var iconoMarca = "/dist/img/red.gif";           
    var icons = {
          A: {            
            name:'TCH BLOCKING RATE 0.1% - 1%',             
            type:'2G_yellow',
            icon: {url:ipsqa + 'yellow_util_.png',scaledSize: new google.maps.Size(25, 25)}            
          },
          B: {
            name:'TCH BLOCKING RATE 1% - 2.5%',                        
            type:'2G_orange',
            icon: {url:ipsqa + 'orange_util.png',scaledSize: new google.maps.Size(25, 25)}
          },
          C: {
            name:'TCH BLOCKING RATE > 2.5%',                        
            type:'2G_red',
            icon: {url:ipsqa + 'red_util.png',scaledSize: new google.maps.Size(25, 25)}
          }
          
          };
    $.getJSON('<?php echo base_url('map/conggest/map_blocking_edge'); ?>', function(json) {
      console.log(json.result); 
      if (json.meta.status==200){
        for (var i = 0, length = json.result.length; i < length; i++) { 
          var data = json.result[i];
          addMarker(icons,data.SITEID,data.lat, data.longt,data.CC,'<b>Data Update = '+data.jam+'</b><br/><b>Sitename = '+data.SITEID+' _ '+data.SITENAME+'</b><br/><b>Blocking Rate '+data.TODAY+' %</b><br/>');      
        }
        toastr.success('Load Data Blocking Rate 2G Success');
      } else{
        toastr.warning('Tidak Ada Data Blocking Rate 2G');
      }
     
    });
  }    
  
  function poi(){
    clearOverlays();
    legend('#isilegend','<?php echo base_url('map/poi/legend_poi'); ?>');
    var ipsqa = 'http://10.6.101.36/sqa/reportsqa_new/dist/img/poi/';
    var iconoMarca = "/dist/img/red.gif";           
    var icons = {
          A: {            
            name:'Tertingi Payload & Traffic', 
            //icon: iconBase + 'yellow-dot.png'
            type:'PPTH',
            icon: {url:ipsqa + 'purple.png',scaledSize: new google.maps.Size(25, 25)}            
          },
          B: {
            name:'Tertingi Payload',            
            //icon: ipsqa + 'orange.png'
            type:'PPH',
            icon: {url:ipsqa + 'orange.png',scaledSize: new google.maps.Size(25, 25)}
          },
          C: {
            name:'Tertingi Traffic',            
            //icon: ipsqa + 'red.png'
            type:'PTH',
            icon: {url:ipsqa + 'red.png',scaledSize: new google.maps.Size(25, 25)}
          },
          D: {
            name:'Standart POI',            
            //icon: ipsqa + 'blue.png'
            type:'PNO',
            icon: {url:ipsqa + 'blue.png',scaledSize: new google.maps.Size(25, 25)}
          },
          
          };
    
    $.getJSON('<?php echo  base_url('map/poi/list_poi');?>', function(json) {
      toastr.info('Proses Load Map POI');
      if (json.meta.status==200){
        for (var i = 0, length = json.result.length; i < length; i++) { 
          var data = json.result[i];        
          addMarker(icons,data.poi,data.lon, data.lat, data.CC,'Update: 00:00:00 - '+data.JAM+'</br><b>POI NAME = '+data.poi+' </b></br>Payload:'+data.pay+' Gbyte </br>Growth Payload: '+data.growthpay+' %</br>Traffic:'+data.trf+' erlang</br> Growth Traffic: '+data.growthtrf+' %');
        }
        toastr.success('Load Map POI Success');
      } else {
 
toastr.warning('Tidak Ada Data POI yang sesuai');
      }
    });
    
  }
  
  function alarm(){
    clearOverlays();
    legend('#isilegend','<?php echo base_url('map/utilall/alarm_legend'); ?>');
    var ipsqa = 'http://10.5.98.204/assets/image/alarm/';    
    var icons = {
          A: {            
            name:'PLATINUM', 
            //icon: iconBase + 'yellow-dot.png'
            type:'PLATINUM',
            icon: {url:ipsqa + 'p_green.png',scaledSize: new google.maps.Size(25, 25)}            
          },
          B: {
            name:'GOLD',            
            //icon: ipsqa + 'orange.png'
            type:'GOLD',
            icon: {url:ipsqa + 'g_green.png',scaledSize: new google.maps.Size(25, 25)}
          },
          C: {
            name:'SILVER',            
            //icon: ipsqa + 'red.png'
            type:'SILVER',
            icon: {url:ipsqa + 's_green.png',scaledSize: new google.maps.Size(25, 25)}
          },
          D: {
            name:'BRONZE',            
            //icon: ipsqa + 'blue.png'
            type:'BRONZE',
            icon: {url:ipsqa + 'b_green.png',scaledSize: new google.maps.Size(25, 25)}
          },
          E: {            
            name:'PLATINUM', 
            //icon: iconBase + 'yellow-dot.png'
            type:'PLATINUM',
            icon: {url:ipsqa + 'p_red.png',scaledSize: new google.maps.Size(25, 25)}            
          },
          F: {
            name:'GOLD',            
            //icon: ipsqa + 'orange.png'
            type:'GOLD',
            icon: {url:ipsqa + 'g_red.png',scaledSize: new google.maps.Size(25, 25)}
          },
          G: {
            name:'SILVER',            
            //icon: ipsqa + 'red.png'
            type:'SILVER',
            icon: {url:ipsqa + 's_red.png',scaledSize: new google.maps.Size(25, 25)}
          },
          H: {
            name:'BRONZE',            
            //icon: ipsqa + 'blue.png'
            type:'BRONZE',
            icon: {url:ipsqa + 'b_red.png',scaledSize: new google.maps.Size(25, 25)}
          },
          
          };
    
    $.getJSON('<?php echo  base_url('map/utilall/api_alarm');?>', function(json) {
      toastr.info('Proses Load Map ALARM');
      if (json.meta.status==200){
        for (var i = 0, length = json.result.length; i < length; i++) { 
          var data = json.result[i];        
          //addMarker(icons,data.poi,data.lon, data.lat, data.CC,'Update: 00:00:00 - '+data.JAM+'</br><b>POI NAME = '+data.poi+' </b></br>Payload:'+data.pay+' Gbyte </br>Growth Payload: '+data.growthpay+' %</br>Traffic:'+data.trf+' erlang</br> Growth Traffic: '+data.growthtrf+' %');
          addMarker(icons,data.SITEID,data.LATITUDE,data.LONGITUDE, data.ICON,'SITEID: '+data.SITEID+'</br> SITENAME: '+data.SITENAME+'</br>CLASS:'+data.CLASS_BASELINE);
          //console.log(data.SITEID);
        }
        toastr.success('Load Map ALARM Success');
      } else {
        toastr.warning('Tidak Ada Data ALARM yang sesuai');
      }
    });
    
  }
  
  function conggest(){  
    clearOverlays();
    legend('#isilegend','<?php echo base_url('map/conggest/legend'); ?>');
    toastr.info('Proses Loading data Rb Util LTE');
    var ipsqa = '<?php echo base_url('assets/image/rbutil'); ?>/';      
    var icons = {
      <?php for ($x = 0; $x <= 20; $x++) { ?>
      'redcircle<?php echo $x; ?>'    :  { icon: {url:ipsqa + 'redcircle<?php echo $x; ?>.png',scaledSize: new google.maps.Size(15,15)},type:'red'},
      'orangecircle<?php echo $x; ?>'    :  { icon: {url:ipsqa + 'orangecircle<?php echo $x; ?>.png',scaledSize: new google.maps.Size(15,15)},type:'orange'}, 
      'yellowcircle<?php echo $x; ?>'    :   { icon: {url:ipsqa + 'yellowcircle<?php echo $x; ?>.png',scaledSize: new google.maps.Size(15,15)},type:'yellow'},       
      'greencircle<?php echo $x; ?>'    :   { icon: {url:ipsqa + 'greencircle<?php echo $x; ?>.png',scaledSize: new google.maps.Size(10,10)},type:'green'},
 
google.maps.event.addListener(marker, "click", function() {
       if (currentPopup != null) {
       currentPopup.close();
       currentPopup = null;
       }
       popup.open(map, marker);
       currentPopup = popup;
       //tabel(_poiname);
     });
     google.maps.event.addListener(popup, "closeclick", function() {
       //map.panTo(center);
       currentPopup = null;
       });
    markersArray.push(marker);
    }
  
  function toggleGroup(type) {    
    for (var i = 0; i < markerGroups[type].length; i++) {
      var marker = markerGroups[type][i];
      if (!marker.getVisible()) {
        marker.setVisible(true);
      } else {
        marker.setVisible(false);
      }
    }
  }
  
  function clearOverlays() {
    if (markersArray) {
      for (i in markersArray) {
        markersArray[i].setMap(null);
      }
    }
  }

  $(document).ready(function(){  
    initMap(_idmap,_zoom,_lat,_lng);          
  });

 
'redstar<?php echo $x; ?>'      :  { icon: {url:ipsqa + 'redstar<?php echo $x; ?>.png',scaledSize: new google.maps.Size(15,15)},type:'red'},
      'orangestar<?php echo $x; ?>'    :  { icon: {url:ipsqa + 'orangestar<?php echo $x; ?>.png',scaledSize: new google.maps.Size(15,15)},type:'orange'}, 
      'yellowstar<?php echo $x; ?>'    :   { icon: {url:ipsqa + 'yellowstar<?php echo $x; ?>.png',scaledSize: new google.maps.Size(15,15)},type:'yellow'}, 
      'greenstar<?php echo $x; ?>'    :   { icon: {url:ipsqa + 'greenstar<?php echo $x; ?>.png',scaledSize: new google.maps.Size(10,10)},type:'green'}, 
            
      'redtriangle<?php echo $x; ?>'    :  { icon: {url:ipsqa + 'redtriangle<?php echo $x; ?>.png',scaledSize: new google.maps.Size(15,15)},type:'red'},
      'orangetriangle<?php echo $x; ?>'  :  { icon: {url:ipsqa + 'orangetriangle<?php echo $x; ?>.png',scaledSize: new google.maps.Size(15,15)},type:'orange'}, 
      'yellowtriangle<?php echo $x; ?>'  :   { icon: {url:ipsqa + 'yellowtriangle<?php echo $x; ?>.png',scaledSize: new google.maps.Size(15,15)},type:'yellow'}, 
      'greentriangle<?php echo $x; ?>'  :   { icon: {url:ipsqa + 'greentriangle<?php echo $x; ?>.png',scaledSize: new google.maps.Size(10,10)},type:'green'}, 
      
      'redsquare<?php echo $x; ?>'  :  { icon: {url:ipsqa + 'redsquare<?php echo $x; ?>.png',scaledSize: new google.maps.Size(15,15)},type:'red'},
      'orangesquare<?php echo $x; ?>'  :  { icon: {url:ipsqa + 'orangesquare<?php echo $x; ?>.png',scaledSize: new google.maps.Size(15,15)},type:'orange'}, 
      'yellowsquare<?php echo $x; ?>'  :   { icon: {url:ipsqa + 'yellowsquare<?php echo $x; ?>.png',scaledSize: new google.maps.Size(15,15)},type:'yellow'},       
      'greensquare<?php echo $x; ?>'  :   { icon: {url:ipsqa + 'greensquare<?php echo $x; ?>.png',scaledSize: new google.maps.Size(10,10)},type:'green'},       

      'redlove<?php echo $x; ?>'    :  { icon: {url:ipsqa + 'redlove<?php echo $x; ?>.png',scaledSize: new google.maps.Size(15,15)},type:'red'},
      'orangelove<?php echo $x; ?>'  :  { icon: {url:ipsqa + 'orangelove<?php echo $x; ?>.png',scaledSize: new google.maps.Size(15,15)},type:'orange'}, 
      'yellowlove<?php echo $x; ?>'  :   { icon: {url:ipsqa + 'yellowlove<?php echo $x; ?>.png',scaledSize: new google.maps.Size(15,15)},type:'yellow'},       
      'greenlove<?php echo $x; ?>'  :   { icon: {url:ipsqa + 'greenlove<?php echo $x; ?>.png',scaledSize: new google.maps.Size(10,10)},type:'green'},       
      <?php               
        } 
      ?>
      
    }
    
    $.getJSON('<?php echo base_url('map/conggest/rb_util'); ?>', function(json) {      
      if (json.meta.status==200){
        for (var i = 0, length = json.result.length; i < length; i++) {
          var data = json.result[i];
          //addMarker(icons,_poiname,lat, lng, tooltip, info)
          addMarker(icons,data.site_name,data.lat, data.longt, data.isilegend,'<b>Data Update = '+data.jam+'</b><br/><b>Sitename = '+data.site_id+' _ '+data.site_name+' ('+data.freq+')'+  
          '<br/>Band : '+data.band+'</b></br><b>RB Util = '+data.rbutil+' %</b><b>RB Num = '+data.rb+' </b><b>User Num = '+data.userlte+' <br/>Payload Hourly = '+data.payload+' Mbyte<br/>Payload Peruser = '+data.payloaduser+' Mbyte<br/> Total Cell High Util= '+data.ttl+'</b>');      
        }
        toastr.success('load rb util succes');
      } else {
        toastr.warning('Tidak Ada Data Rb Util 4G yang sesuai kriteria');
      }
    });
  
  
  function addMarker(icons,_poiname,lat, lng, tooltip, info) {
     var pt = new google.maps.LatLng(lat, lng);
     bounds.extend(pt);     
      //console.log(_poiname);
     var marker = new google.maps.Marker({
       position: pt,
       icon: icons[tooltip].icon,
       map: map
     });
     var type=icons[tooltip].type;
     
    if (!markerGroups[type]) markerGroups[type] = [];
    markerGroups[type].push(marker);
     
     var popup = new google.maps.InfoWindow({
       content: info,
       maxWidth: 300
     });