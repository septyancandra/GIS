  <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
  
  <script src="http://maps.googleapis.com/maps/api/js"></script>
<script>

  var _zoom = 15; 
function initialize() {
  var propertiPeta = {
    center:new google.maps.LatLng(-6.99039,110.426251),
    zoom: _zoom,
    mapTypeId:google.maps.MapTypeId.ROADMAP
  };
  
  var peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta);



  // membuat Marker
    var locations = [
            <?php foreach ($query_maps as $row) { ?>
                {
                    lat: <?=$row->LATITUDE?>,
                    lng: <?=$row->LONGITUDE?>,
                    //latt: <?=$row->LAT_POI?>,
                    //lngg: <?=$row->LONG_POI?>,
                    title: "<?=$row->SITEID?>",
                    description: "<?=$row->SITENAME?>",
                    des: "<?=$row->BAND?>",
                    info: "<?=$row->TYPE_BAND?>",
                    poi: "<?=$row->POI_NAME?>",
                    /*lacc: "<?=$row->LAC?>",
                    ave: "<?=$row->Average_User_Number?>",
                    max_user: "<?=$row->Maximum_User_Number?>",
*/
                    
                },
            <?php } ?>
        ];    

          locations.forEach(function(loc) {
            var marker = new google.maps.Marker({
                position: loc,
                map: peta,
                title: loc.title
            });
            var infowindow = new google.maps.InfoWindow({
                content: "<div style=\"overflow:auto; width: 200px;\"><b style='font-size:15px'>" +
                        loc.title + "</b><br>" + "SITENAME : " + loc.description + "</b><br>" + "BAND : " + loc.des  + "</b><br>" + "TYPE_BAND : " + loc.info + "</b><br>" +"POI_NAME : " + loc.poi + "</div>"
            });
            google.maps.event.addListener(marker, 'click', function() {
                infowindow.open(peta, marker);
            });
        });


}
// event jendela di-load  
google.maps.event.addDomListener(window, 'load', initialize);
</script>
  

  <div id="googleMap" style="width:100%;height:600px;"></div>
  

    
    
                     <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAQLHdoWey-cwIO1xUeoVHndtVZyKT12NA&callback=initMap&v=3.31">
    </script>
    <br>
    <!-- <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true"></script> -->
    <section class="content-header">
    <h1><i class="fa fa-tasks"></i>&nbsp Productivity Daily 4G </h1>
</section>
<section class="content">
    <div class="nav-tabs-custom">
    <ul class="nav nav-tabs ">
      <li class="active"><a href="#SMG002" data-toggle="tab"><span id="span">SMG002</span></a></li>
      <li ><a href="#SMG038" data-toggle="tab"><span id="span">SMG038</span></a></li>
      <li ><a href="#SMG039" data-toggle="tab"><span id="span">SMG039</span></a></li>
      <li ><a href="#SMG041" data-toggle="tab"><span id="span">SMG041</span></a></li>
      <li ><a href="#SMG042" data-toggle="tab"><span id="span">SMG042</span></a></li>
      <li ><a href="#SMG054" data-toggle="tab"><span id="span">SMG054</span></a></li>
      <li ><a href="#SMG063" data-toggle="tab"><span id="span">SMG063</span></a></li>
      <li ><a href="#SMG066" data-toggle="tab"><span id="span">SMG066</span></a></li>
      <li ><a href="#SMG119" data-toggle="tab"><span id="span">SMG119</span></a></li>
      <li ><a href="#SMG134" data-toggle="tab"><span id="span">SMG134</span></a></li>
      <li ><a href="#SMG143" data-toggle="tab"><span id="span">SMG143</span></a></li>

    </ul>    
    <div class="tab-content">
      <div class="tab-pane active" id="SMG002"></div>
      <div class="tab-pane" id="SMG038"></div>
      <div class="tab-pane" id="SMG039"></div>
      <div class="tab-pane" id="SMG041"></div>
      <div class="tab-pane" id="SMG042"></div>
      <div class="tab-pane" id="SMG054"></div>
      <div class="tab-pane" id="SMG063"></div>
      <div class="tab-pane" id="SMG066"></div>
      <div class="tab-pane" id="SMG119"></div>
      <div class="tab-pane" id="SMG134"></div>
      <div class="tab-pane" id="SMG143"></div>
    </div>
  </div>
</section>

<script type="text/javascript">

Productivity_Growth('SMG002','#SMG002','<?php echo base_url("web/Dashboard/tabel/SMG002"); ?>','G');
Productivity_Growth('SMG038','#SMG038','<?php echo base_url("web/Dashboard/tabel/SMG038"); ?>','G');
Productivity_Growth('SMG039','#SMG039','<?php echo base_url("web/Dashboard/tabel/SMG039"); ?>','G');
Productivity_Growth('SMG041','#SMG041','<?php echo base_url("web/Dashboard/tabel/SMG041"); ?>','G');
Productivity_Growth('SMG042','#SMG042','<?php echo base_url("web/Dashboard/tabel/SMG042"); ?>','G');
Productivity_Growth('SMG054','#SMG054','<?php echo base_url("web/Dashboard/tabel/SMG054"); ?>','G');
Productivity_Growth('SMG063','#SMG063','<?php echo base_url("web/Dashboard/tabel/SMG063"); ?>','G');
Productivity_Growth('SMG066','#SMG066','<?php echo base_url("web/Dashboard/tabel/SMG066"); ?>','G');
Productivity_Growth('SMG119','#SMG119','<?php echo base_url("web/Dashboard/tabel/SMG119"); ?>','G');
Productivity_Growth('SMG134','#SMG134','<?php echo base_url("web/Dashboard/tabel/SMG134"); ?>','G');
Productivity_Growth('SMG143','#SMG143','<?php echo base_url("web/Dashboard/tabel/SMG143"); ?>','G');

function Productivity_Growth (_rtpo,id,source,text) {           
        $.ajax({
            url: source,
            type: "POST",
            data: {rtpo:_rtpo},  
            beforeSend: function (html) {
                $(id).html('Loading ...');                      
            },
            success:function(html) {                                                        
                $(id).html(html);                               
            }
        }); 
};



</script>