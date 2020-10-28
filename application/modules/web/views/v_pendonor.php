<section class="content-header">
	<h1>
		SITE
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Data</a></li>
		<li class="active">SITE</li>
	</ol>
</section>

<section class="content">
      <div class="row">
        <div class="col-xs-12">         
          <!-- /.box -->
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data SITE</h3>	
				</br>
				<button class="btn btn-success" onclick="add_person()"><i class="glyphicon glyphicon-plus"></i> Tambah Data</button>
				<button class="btn btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Reload</button>			  
            </div>
            <!-- /.box-header -->
            <div class="box-body">
				
              <table id="table" class="table table-bordered table-striped">
                <thead>
				  <tr>
					<th>No</th>		
					<th>ID</th>					
					<th>SITEID</th>               
					<th>SITENAME</th>
					<th>Average_User</th>
					<th>Maximum_User</th>
					<th>Uplink</th>
					<th>Downlink</th>
					<th>Status Cell</th>                       
					<th>Action</th>                      
				  </tr>
				</thead>
                <tbody>                            
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
</section>

<script type="text/javascript">
 
var save_method; //for save method string
var table;
 
$(document).ready(function() {
 
    //datatables
    table = $('#table').DataTable({ 
 
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
 
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('web/pendonor/ajax_list')?>",
            "type": "POST"
        },
 
        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ -1 ], //last column
            "orderable": false, //set not orderable
        },
        ],
 
    });
 
    //datepicker   
		
	$('#tgl_lhr').datepicker({
		// defaultDate: new Date(),
		format: 'yyyy-mm-dd',
		autoclose: true,
		enableOnReadOnly: true,
		language: "id",
		todayHighlight: true,
		weekStart: 1
		//startDate: '-15Y'		
	}); 
 
});
 
 
 
function add_person()
{
    save_method = 'add';
	showForm();
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('Tambah SITE'); // Set Title to Bootstrap modal title
}
 
function edit_pendonor(id)
{
	showForm();
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
 
    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('web/pendonor/ajax_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

 			$('[name="id"]').val(data.id);
           $('[name="SITEID"]').val(data.SITEID);
            $('[name="SITENAME"]').val(data.SITENAME);
            $('[name="Average_User_Number"]').val(data.Average_User_Number);
            $('[name="Maximum_User_Number"]').val(data.Maximum_User_Number);
            $('[name="Uplink_Traffic_Volume_OK"]').val(data.Uplink_Traffic_Volume_OK);					
            $('[name="Downlink_Traffic_Volume_OK"]').val(data.Downlink_Traffic_Volume_OK);
            $('[name="aksi_average"]').val(data.aksi_average);
            $('[name="aksi_maximum"]').val(data.aksi_maximum);
            $('[name="aksi_uplink"]').val(data.aksi_uplink);
            $('[name="aksi_downlink"]').val(data.aksi_downlink);
            $('[name="kelayakan"]').val(data.status_kelayakan);
			$('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit SITE'); // Set title to Bootstrap modal title
 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}

function print_pendonor(id){
	url="http://localhost/dev_pm_old/services/views/print/CekKesehatan.php?action=status-donor&id="+id;
	var win = window.open(url, '_blank');
	win.focus();
}

function view_pendonor(id)
{
	hideForm();
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
 
    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('web/pendonor/ajax_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
			$('[name="id"]').val(data.id);
            $('[name="SITEID"]').val(data.SITEID);
            $('[name="SITENAME"]').val(data.SITENAME);
            $('[name="Average_User_Number"]').val(data.Average_User_Number);
            $('[name="Maximum_User_Number"]').val(data.Maximum_User_Number);
            $('[name="Uplink_Traffic_Volume_OK"]').val(data.Uplink_Traffic_Volume_OK);					
            $('[name="Downlink_Traffic_Volume_OK"]').val(data.Downlink_Traffic_Volume_OK);
            $('[name="aksi_average"]').val(data.aksi_average);
            $('[name="aksi_maximum"]').val(data.aksi_maximum);
            $('[name="aksi_uplink"]').val(data.aksi_uplink);
            $('[name="aksi_downlink"]').val(data.aksi_downlink);
            $('[name="kelayakan"]').val(data.status_kelayakan);
			$('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('View Edit'); // Set title to Bootstrap modal title
 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}
 
function reload_table()
{
    table.ajax.reload(null,false); //reload datatable ajax 
}
 
function save()
{
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
    var url;
 
    if(save_method == 'add') {
        url = "<?php echo site_url('web/pendonor/ajax_add')?>";
    } else {
        url = "<?php echo site_url('web/pendonor/ajax_update')?>";
    }
 
    // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#form').serialize(),
        dataType: "JSON",
        success: function(data)
        {
 
            if(data.status) //if success close modal and reload ajax table
            {
                $('#modal_form').modal('hide');
                reload_table();
            }
 
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 
 
 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error adding / update data');
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 
 
        }
    });
}
 
function delete_pendonor(id)
{
    if(confirm('Anda yakin menghapus data ini?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('web/pendonor/ajax_delete')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                //if success reload ajax table
                $('#modal_form').modal('hide');
                reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });
 
    }
}
 
 
//script form
function showForm(){
	$("#form #id").attr('readonly',false); 
	$("#form #SITEID").attr('readonly',false); 
	$("#form #SITENAME").attr('readonly',false);
	$("#form #Average_User_Number").attr('readonly',false);
	$("#form #Maximum_User_Number").attr('readonly',false);  
	$("#form #Uplink_Traffic_Volume_OK").attr('readonly',false);
	$("#form #Downlink_Traffic_Volume_OK").attr('readonly',false);  
	$("#form #aksi_average").attr('readonly',false);
	$("#form #aksi_maximum").attr('readonly',false);
	$("#form #aksi_uplink").attr('readonly',false);                                     
	$("#form select").attr('disabled',false);  


	$("#form #aksi_downlink").attr('readonly',false);

	$("#form #kelayakan").attr('readonly',false);

	$("#btnSave").removeClass('hidden'); 
	//$("#btnNew").addClass('hidden');           
	//$("#btnCancel").removeClass('hidden');                                                               
  }
  function hideForm(){	
  	$("#form #id").attr('readonly',true); 
	$("#form #SITEID").attr('readonly',true); 
	$("#form #SITENAME").attr('readonly',true);
	$("#form #Average_User_Number").attr('readonly',true);
	$("#form #Maximum_User_Number").attr('readonly',true);  
	$("#form #Uplink_Traffic_Volume_OK").attr('readonly',true);
	$("#form #Downlink_Traffic_Volume_OK").attr('readonly',true);  
	$("#form #aksi_average").attr('readonly',true);
	$("#form #aksi_maximum").attr('readonly',true);
	$("#form #aksi_uplink").attr('readonly',true);                                     
	$("#form select").attr('disabled',true);  


	$("#form #aksi_downlink").attr('readonly',true);
	
	$("#form #kelayakan").attr('readonly',true);

	$("#btnSave").addClass('hidden'); 
	$("#btnNew").removeClass('hidden');           
	$("#btnCancel").addClass('hidden'); 
	$("#btnUpdate").addClass('hidden');                                                              
  } 
  
   //tgl_lhr get tahun usia : 25 Tahun
	  $("#tgl_lhr").on('change keyup', function(){			
			var date = this.value;
			//var newdate = date.split("-").reverse().join("-");
			var age=getAge(date).split("-");
			var years=age[0];
			var months=age[1];
			$("#tahun").val(years);
			$("#bulan").val(months);
			if (parseInt(years) < 17) {
				$("#status_usia").val('Remaja');
			}else if(parseInt(years) >= 17 && parseInt(years) <= 60 ){
				$("#status_usia").val('Dewasa');
			}else{
				$("#status_usia").val('Lansia');
			}
	  });
	  
		function getAge(dateString) {
			var today = new Date();
			var DOB = new Date(dateString);
			var totalMonths = (today.getFullYear() - DOB.getFullYear()) * 12 + today.getMonth() - DOB.getMonth();
			totalMonths += today.getDay() < DOB.getDay() ? -1 : 0;
			var years = today.getFullYear() - DOB.getFullYear();
			if (DOB.getMonth() > today.getMonth())
				years = years - 1;
			else if (DOB.getMonth() === today.getMonth())
				if (DOB.getDate() > today.getDate())
					years = years - 1;

			var days;
			var months;

			if (DOB.getDate() > today.getDate()) {
				months = (totalMonths % 12);
				if (months == 0)
					months = 11;
				var x = today.getMonth();
				switch (x) {
					case 1:
					case 3:
					case 5:
					case 7:
					case 8:
					case 10:
					case 12: {
						var a = DOB.getDate() - today.getDate();
						days = 31 - a;
						break;
					}
					default: {
						var a = DOB.getDate() - today.getDate();
						days = 30 - a;
						break;
					}
				}

			}
			else {
				days = today.getDate() - DOB.getDate();
				if (DOB.getMonth() === today.getMonth())
					months = (totalMonths % 12);
				else
					months = (totalMonths % 12) + 1;
			}
			//var age = years + ' years ' + months + ' months ' + days + ' days';			
			var age = years + '-' + months;			
			return age;
		}
	  	 	  
	  //detail berat badan
	  $("#Average_User_Number").on('change keyup', function(){
			var sts = parseInt(this.value); 
			if(sts){			
				if (sts >= 20.91212267 ) {
					$("#aksi_average").val('Alfa');
					$("#kelayakan").val('Boleh');
				} else {
					$("#aksi_average").val('Omega');
					$("#kelayakan").val('Tidak Boleh');
				}
			} else {
				$("#aksi_average").val('');
				$("#kelayakan").val('');
			}
			
	  });
	  //detail sistolik
	  $("#Maximum_User_Number").on('change keyup', function(){
		  var sistolik = parseInt(this.value); 
			if (sistolik){
				if (sistolik >= 82.01850139) {
					$("#aksi_maximum").val('Lebih');
					$("#kelayakan").val('Boleh');
				}	
				else {					
					$("#aksi_maximum").val('Kurang');
					$("#kelayakan").val('Tidak Boleh');
				}
			} else {
				$("#aksi_maximum").val('');
				$("#kelayakan").val('');
			}		  		  
	  });
	  
	  //detail diastolik
	  $("#Uplink_Traffic_Volume_OK").on('change keyup', function(){
			var diastolik = parseInt(this.value);
			if (diastolik){
				if (diastolik >= 3708.264456) {
					$("#aksi_uplink").val('Yes');
					$("#kelayakan").val('Boleh');
				}else{
					$("#aksi_uplink").val('No');
					$("#kelayakan").val('Tidak Boleh');
				}				
			} else {
				$("#aksi_uplink").val('');
				$("#kelayakan").val('');
			}		  
	  });
	  $("#Downlink_Traffic_Volume_OK").on('change keyup', function(){
			var Downlink = parseInt(this.value);
			if (Downlink){
				if (Downlink >= 37191.82731) {
					$("#aksi_downlink").val('Red');
					$("#kelayakan").val('Boleh');
				}else{
					$("#aksi_downlink").val('Save');
					$("#kelayakan").val('Tidak Boleh');
				}		
			} else {
				$("#aksi_downlink").val('');
				$("#kelayakan").val('');
			}		  
	  });
	  //detail haemoglobin
	  $("#haemoglobin").on('change keyup', function(){
			var haemoglobin = parseInt(this.value); 
			if (haemoglobin){
				//kadar haemoglobin
				if (haemoglobin < 12.5) {
					$("#ket_haemoglobin").val('Rendah');
				}else if(haemoglobin >= 12.5 && haemoglobin <= 17 ){
					$("#ket_haemoglobin").val('Normal');
				}else{
					$("#ket_haemoglobin").val('Tinggi');
				}
				//status layak
				if (haemoglobin < 12.5) {
					$("#kelayakan").val('Tidak Boleh');
				}else if(haemoglobin >= 12.5 && haemoglobin <= 17 ){
					$("#kelayakan").val('Boleh');
				}else{
					$("#kelayakan").val('Tidak Boleh');
				}
			} else {
				$("#ket_haemoglobin").val('');
				$("#kelayakan").val('');
			}
	  });	 
</script>
 
<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Person Form</h3>
            </div>
            <div class="modal-body form">
				<div class="row">
                <form id="form" action="#" class="form-horizontal col-md-12">
					<input name="id" type="hidden" value="" placeholder="id">
					<div class="col-md-6">
						<div class="form-group">
							<label class="col-sm-3 control-label">
								SITEID
							</label>
							<div class="col-sm-4">
								<input name="SITEID" id="SITEID" type="text" class="form-control input-sm" placeholder="SITEID" readonly="true">                            
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">
								SITENAME 
							</label>
							<div class="col-sm-9">
								<input name="SITENAME" id="SITENAME" type="text" class="form-control input-sm" placeholder="SITENAME" readonly="true">                            
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label">
								Average_User 
							</label>
							<div class="col-sm-4">
								<input name="Average_User_Number" id="Average_User_Number" type="text" class="form-control input-sm" readonly="true">                           
							</div>
							<div class="col-sm-1">             
							</div>
							<div>
							<div class="col-sm-5">
								<input name="aksi_average" id="aksi_average" type="text" class="form-control input-sm" placeholder="keterangan Average" readonly="true">                            
							</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">
								Maximum_User
							</label>
							<div class="col-sm-4">
								<input name="Maximum_User_Number"  id="Maximum_User_Number" type="text" class="form-control input-sm" readonly="true">                           
							</div>
							<div class="col-sm-1">             
							</div>
							<div>
							<div class="col-sm-5">
								<input name="aksi_maximum" id="aksi_maximum" type="text" class="form-control input-sm" placeholder="keterangan Maximum_User" readonly="true">                            
							</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">
								Uplink_Traffic
							</label>
							<div class="col-sm-4">
								<input name="Uplink_Traffic_Volume_OK"  id="Uplink_Traffic_Volume_OK" type="text" class="form-control input-sm" readonly="true">                           
							</div>
							<div class="col-sm-1">                          
							</div>
							<div>
							<div class="col-sm-5">
								<input name="aksi_uplink" id="aksi_uplink" type="text" class="form-control input-sm" placeholder="keterangan Uplink" readonly="true">                            
							</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">
								Downlink_Traffic 
							</label>
							<div class="col-sm-4">
								<input name="Downlink_Traffic_Volume_OK"  id="Downlink_Traffic_Volume_OK" type="text" class="form-control input-sm" readonly="true">                           
							</div>
							<div class="col-sm-1">                       
							</div>
							<div>
								<div class="col-sm-5">
								<input name="aksi_downlink" id="aksi_downlink" type="text" class="form-control input-sm" placeholder="keterangan Downlink_Traffic" readonly="true">                            
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">
								Status Kelayakan
							</label>
							<div class="col-sm-5">
								<input name="kelayakan"  id="kelayakan" type="text" class="form-control input-sm" placeholder="keterangan SITE?" readonly="true">                            
							</div>
						</div> 					
				  </div>      
				  </form>
				</div>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->