<section class="content-header">
	<h1>
		Laporan Mining Data
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Laporan</a></li>
		<li class="active">Mining Data</li>
	</ol>
</section>

<section class="content">
	<div class="row">
        <div class="col-md-12">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">Mining 1</a></li>
              <li><a href="#tab_2" data-toggle="tab">Mining 2</a></li>
              <li><a href="#tab_3" data-toggle="tab">Mining 3</a></li>                          
              <li><a href="#tab_4" data-toggle="tab">Mining 4</a></li>                          
              <li><a href="#tab_5" data-toggle="tab">Tree</a></li>    
             <!--  <li><a href="#tab_6" data-toggle="tab">Coba</a></li> -->                          
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
					<table class="table table-bordered">
						<thead>
							<tr style="text-align: center; background-color: #ecf0f2;">
								<th colspan="2" style="text-align: center; background-color: #ecf0f2;">Jenis</th>
								<th style="text-align: center;">Kasus</th>
								<th style="text-align: center;">Tidak Boleh</th>
								<th style="text-align: center;">Boleh</th>
								<th style="text-align: center;">Entropy</th>
								<th style="text-align: center;">Gain</th>
								<th style="text-align: center;">Split Info</th>
								<th style="text-align: center;">Gain Ratio</th>                     
							</tr>
						</thead>
					<tbody id="result-data-1">
					</tbody>
				  </table>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
					<table class="table table-bordered">
						<thead>
							<tr style="text-align: center; background-color: #ecf0f2;">
								<th colspan="2" style="text-align: center; background-color: #ecf0f2;">Jenis</th>
								<th style="text-align: center;">Kasus</th>
								<th style="text-align: center;">Tidak Boleh</th>
								<th style="text-align: center;">Boleh</th>
								<th style="text-align: center;">Entropy</th>
								<th style="text-align: center;">Gain</th>
								<th style="text-align: center;">Split Info</th>
								<th style="text-align: center;">Gain Ratio</th>                     
							</tr>
						</thead>
					<tbody id="result-data-2">
					</tbody>
				  </table>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_3">
					<table class="table table-bordered">
						<thead>
							<tr style="text-align: center; background-color: #ecf0f2;">
								<th colspan="2" style="text-align: center; background-color: #ecf0f2;">Jenis</th>
								<th style="text-align: center;">Kasus</th>
								<th style="text-align: center;">Tidak Boleh</th>
								<th style="text-align: center;">Boleh</th>
								<th style="text-align: center;">Entropy</th>
								<th style="text-align: center;">Gain</th>
								<th style="text-align: center;">Split Info</th>
								<th style="text-align: center;">Gain Ratio</th>                     
							</tr>
						</thead>
					<tbody id="result-data-3">
					</tbody>
				  </table>
              </div>
			  <div class="tab-pane" id="tab_4">
					<table class="table table-bordered">
						<thead>
							<tr style="text-align: center; background-color: #ecf0f2;">
								<th colspan="2" style="text-align: center; background-color: #ecf0f2;">Jenis</th>
								<th style="text-align: center;">Kasus</th>
								<th style="text-align: center;">Tidak Boleh</th>
								<th style="text-align: center;">Boleh</th>
								<th style="text-align: center;">Entropy</th>
								<th style="text-align: center;">Gain</th>
								<th style="text-align: center;">Split Info</th>
								<th style="text-align: center;">Gain Ratio</th>                     
							</tr>
						</thead>
					<tbody id="result-data-4">
					</tbody>
				  </table>
              </div>
			  <div class="tab-pane" id="tab_5">
				<center>
					<img src="<?php echo base_url();?>/assets/image/tree_spk.png" width="50%" height="50%">
				</center>
			 
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
        </div>
        <!-- /.col -->       
        <!-- /.col -->
      </div>   
      <!-- /.row -->
</section>

<script type="text/javascript">
	$(document).ready(function() {   				
		meaning1("#result-data-1","<?php echo base_url('web/mining/first'); ?>");		
	});
	function meaning1(_id,_url){
		$.ajax({
		  type: "GET",     
		  url : _url,     
		  data: "action=mining2&kempat=mining1",
		  beforeSend:function(){
		  },
		  success:function(msg){	
				//console.log(msg);
				var myarr = msg.split("|");			
				$(_id).html(myarr[0]);				
				meaning2("#result-data-2","<?php echo base_url('web/mining/second/'); ?>"+myarr[1],myarr[1]);
		  },
		  error:function(xhr, Status, err){
			alert('Gagal');
		  }
		}); 
	}
	
	function meaning2(_id,_url,_gain){
		$.ajax({
		  type: "GET",     
		  url : _url,     
		  data: "action=mining2&kempat=mining2",
		  beforeSend:function(){
		  },
		  success:function(msg){	
				//console.log(msg);
				var myarr = msg.split("|");			
				$(_id).html(myarr[0]);				
				meaning3("#result-data-3","<?php echo base_url('web/mining/third/'); ?>"+myarr[1],_gain,myarr[1]);			
		  },
		  error:function(xhr, Status, err){
			alert('Gagal');
		  }
		}); 
	}
	
	function meaning3(_id,_url,_gain,_ketiga){
		$.ajax({
		  type: "GET",     
		  url : _url,     
		  data: "action="+_gain+"&kempat=mining3",
		  beforeSend:function(){
		  },
		  success:function(msg){	
				//console.log(msg);
				var myarr = msg.split("|");			
				$(_id).html(myarr[0]);								
				meaning4("#result-data-4","<?php echo base_url('web/mining/fourth/'); ?>"+myarr[1],_gain,_ketiga);
		  },
		  error:function(xhr, Status, err){
			alert('Gagal');
		  }
		}); 
	}
	
	function meaning4(_id,_url,_gain,_kempat){
		$.ajax({
		  type: "GET",     
		  url : _url,     
		  data: "action="+_gain+"&kempat="+_kempat,
		  beforeSend:function(){
		  },
		  success:function(msg){	
				//console.log(msg);
				var myarr = msg.split("|");			
				$(_id).html(myarr[0]);												
		  },
		  error:function(xhr, Status, err){
			alert('Gagal');
		  }
		}); 
	}	
	
</script>