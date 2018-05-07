@extends('dashboard')
@section('content')
<!-- Account settings -->
<div class="panel panel-flat">
	<div class="panel-heading">
		<h6 class="panel-title">Profil</h6>
		<div class="heading-elements">
			<ul class="icons-list">
        		<li><a data-action="collapse"></a></li>
        		<li><a data-action="reload"></a></li>
        		<li><a data-action="close"></a></li>
        	</ul>
    	</div>
	</div>

	<div class="panel-body">
		<div class="col-lg-3">
			@if(isset($ctlProfile->U_AVATAR_PATH) && $ctlProfile->U_AVATAR_PATH != '-')
				<div class="col-lg-12">
					<img src="{{ url('/') }}/uploads/images/profile/{{ $ctlProfile->U_AVATAR_PATH }}" width="100%"><br><br>
				</div>
			@endif
			<div class="col-lg-12">
				<form>
					<div class="form-group">
						<div class="col-lg-12">
							<input type="file" class="file-input" data-show-preview="false" data-show-upload="false" id="imageAvatar" placeholder="File berkas...">
							<span class="help-block">Ukuran file max. 2 MB</span>
						</div> 
						<div class="col-lg-12" style="margin-left:-7px;">
							<button type="button" class="btn bg-info-400 btn-labeled btn-labeled-right" onclick="uploadAvatar()"><b><i class="icon-upload"></i></b> Unggah</button>
						</div>
						<div class="clearfix"></div> 					
					</div>
				</form>
			</div>
		</div>
		<div class="col-lg-8">
			<form action="#" class="form-horizontal">
				<div class="form-group">
					<label class="col-lg-3 control-label">Username</label>
					<div class="col-lg-9">
						<input type="text" class="form-control" value="{{ $ctlProfile->U_ID }}" readonly="readonly">
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-3 control-label">Nama Lengkap</label>
					<div class="col-lg-9">
						<input type="text" class="form-control" value="{{ $ctlProfile->U_NAME }}" id="namaLengkap">
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-3 control-label">Password Lama</label>
					<div class="col-lg-9">
						<input type="text" class="form-control" value="" id="passwordLama">
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-3 control-label">Password Baru</label>
					<div class="col-lg-9">
						<input type="text" class="form-control" value="" id="passwordBaru">
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-3 control-label">Password Baru</label>
					<div class="col-lg-9">
						<input type="text" class="form-control" value="" id="passwordBaru2">
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-3 control-label">Nomor Ponsel</label>
					<div class="col-lg-9">
						<input type="text" class="form-control" value="{{ $ctlProfile->U_PHONE }}" id="nomorPonsel">
					</div>
				</div>
				
			
				<div class="text-center">
					<button type="button" class="btn btn-primary" onclick="saveData()">Simpan Perubahan <i class="icon-arrow-right14 position-right"></i></button>
				</div>
			</form>
		</div>
		<div class="col-lg-1">&nbsp;</div>
	</div>
</div>
<!-- /account settings -->

<script type="text/javascript">
	function saveData() {
		var id = '{{ Session::get('SESSION_USER_ID') }}';
		var namaLengkap = $('#namaLengkap').val();
		var passwordLama = $('#passwordLama').val();
		var passwordBaru = $('#passwordBaru').val();
		var passwordBaru2 = $('#passwordBaru2').val();
		var nomorPonsel = $('#nomorPonsel').val();
		var facebookID = $('#facebookID').val();
		var googleID = $('#googleID').val();

    createOverlay("Processing...");
    $.ajax({  
      type  : "POST",
      url   : "{{ url('/') }}/backend/profile/update",
      data  : {
      	"_token": "{{ csrf_token() }}",
      	'id' : id,
				'namaLengkap' : namaLengkap,
				'passwordLama' : passwordLama,
				'passwordBaru' : passwordBaru,
				'passwordBaru2' : passwordBaru2,
				'nomorPonsel' : nomorPonsel,
				'facebookID' : facebookID,
				'googleID' : googleID
      },
      success : function(result) { 
        gOverlay.hide();
        var data = JSON.parse(result);

        if(data["STATUS"] == "SUCCESS") {            
          toastr.success(data["MESSAGE"]);
          setTimeout(function(){ 
            window.location = "{{ url('/') }}/backend/profile";
          }, 3000);              
        }
        else {
          toastr.error(data["MESSAGE"]);
            setTimeout(function(){ 
              window.location = "{{ url('/') }}/backend/profile";
            }, 3000);
        }
      },
      error : function(error) {   
        gOverlay.hide();
        alert("Network/server error\r\n" + error);
      }
    });
	}


	function uploadAvatar() {
    var imageAvatar = $("#imageAvatar").prop('files')[0];
    
    var form_data = new FormData();
    // Attach file
    form_data.append('imageAvatar', imageAvatar); 
    form_data.append('_token', '{{ csrf_token() }}');
    
    if(imageAvatar != "") {
      createOverlay("Proses...");
      $.ajax({
        url: '<?php echo asset_url(); ?>/profile/avatar', // point to server-side PHP script 
        dataType: 'json',  // what to expect back from the PHP script, if anything
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,                         
        type: 'post',
        success: function(data){
          gOverlay.hide();
          //var data = JSON.parse(result);
          //console.log(result);

          if(data["STATUS"] == "SUCCESS") {            
            toastr.success(data["MESSAGE"]);
            setTimeout(function(){ 
	            window.location = "<?php echo asset_url(); ?>/profile";
	          }, 500);              
          }else {
          	toastr.error(data["MESSAGE"]);
          }
        },
        error: function() {
          gOverlay.hide();
          alert("Network/server error");
        }
      });
    }
	}
</script>
@endsection