<section class="content-header">
	<h1>
		User Admin
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Data</a></li>
		<li class="active">User Admin</li>
	</ol>
</section>

<section class="content">
      <div class="row">
        <div class="col-xs-12">         
          <!-- /.box -->
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">List Data User</h3>	
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
					<th>Username</th>               
					<th>Nama</th>               					
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
            "url": "<?php echo site_url('web/user/ajax_list')?>",
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
    $('.modal-title').text('Tambah Data User'); // Set Title to Bootstrap modal title
}
 
function edit_users(id)
{
	showForm();
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
 
    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('web/user/ajax_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $('[name="id"]').val(data.id);
            $('[name="username"]').val(data.username);
            $('[name="nama"]').val(data.nama);            
            $('[name="password"]').val(data.password);      
			$('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Data User'); // Set title to Bootstrap modal title
 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}

function view_users(id)
{
	hideForm();
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
 
    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('web/user/ajax_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
 
            $('[name="id"]').val(data.id);
            $('[name="username"]').val(data.username);
            $('[name="nama"]').val(data.nama);            
            $('[name="password"]').val(data.password);            
			$('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('View Data User'); // Set title to Bootstrap modal title
 
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
        url = "<?php echo site_url('web/user/ajax_add')?>";
    } else {
        url = "<?php echo site_url('web/user/ajax_update')?>";
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
 
function delete_users(id)
{
    if(confirm('Anda yakin menghapus data ini?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('web/user/ajax_delete')?>/"+id,
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
	$("#form #username").attr('readonly',false);
	$("#form #nama").attr('readonly',false);
	$("#form #password").attr('readonly',false);  	
	$("#btnSave").removeClass('hidden'); 
	//$("#btnNew").addClass('hidden');           
	//$("#btnCancel").removeClass('hidden');                                                               
  }
  function hideForm(){	
	$("#form #id").attr('readonly',true); 
	$("#form #password").attr('readonly',true);
	$("#form #nama").attr('readonly',true);
	$("#form #username").attr('disabled',true);

	$("#btnSave").addClass('hidden'); 
	$("#btnNew").removeClass('hidden');           
	$("#btnCancel").addClass('hidden'); 
	$("#btnUpdate").addClass('hidden');                                                              
  } 
     	 
</script>
 
<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Person Form</h3>
            </div>
            <div class="modal-body form">
				<div class="row">
                <form id="form" action="#" class="form-horizontal col-md-12">
					<input name="id" type="hidden" value="" placeholder="id">
					<div class="col-md-12">
						<div class="form-group">
							<label class="col-sm-4 control-label">
								Username
							</label>
							<div class="col-sm-8">
								<input name="username" id="username" type="text" class="form-control input-sm" placeholder="Username" readonly="true">                            
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label">
								Nama 
							</label>
							<div class="col-sm-8">
								<input name="nama" id="nama" type="text" class="form-control input-sm" placeholder="Nama Lengkap" readonly="true">                            
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label">
								Password 
							</label>
							<div class="col-sm-8">
								<input name="password" id="password" type="password" class="form-control input-sm" placeholder="Password" readonly="true">                            
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