@extends('dashboard')
@section('content')
<div class="page-header">
  <div class="page-header-content">
    <div class="page-title">
      <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Daftar Event</span></h4>
    </div>
    <!--
    <div class="heading-elements">
      <div class="heading-btn-group">
        <a href="#" class="btn btn-link btn-float has-text"><i class="icon-bars-alt text-primary"></i><span>Statistics</span></a>
        <a href="#" class="btn btn-link btn-float has-text"><i class="icon-calculator text-primary"></i> <span>Invoices</span></a>
        <a href="#" class="btn btn-link btn-float has-text"><i class="icon-calendar5 text-primary"></i> <span>Schedule</span></a>
      </div>
    </div>
    //-->
  </div>

  <div class="breadcrumb-line">
    <ul class="breadcrumb">
      <li><a href="<?php echo asset_url(); ?>"><i class="icon-home2 position-left"></i> Home</a></li>
      <li><i class="icon-menu position-left"></i> Event</li>
      <li class="active"><i class="icon-list"></i> Daftar Event</li>
    </ul>
  </div>
</div>

<div class="content">
  <!-- -->
  <form class="form-horizontal" method="post" id="formUploadData" name="formUploadData" action="send">    
    <div class="panel panel-flat border-top-primary">
      <div class="panel-heading">
        <h5 class="panel-title text-semibold" style="color:rgb(51, 150, 213);">Tambah  Acara</h5>
        <div class="heading-elements">
          <ul class="icons-list">            
            <li><a href="javascript:saveData()"><i class=" icon-database-check"></i> Simpan Acara</a></li>
          </ul>
        </div>
      </div>

      <div class="panel-body">
        <div class="col-lg-12">
          <div class="form-group">
            <label class="col-lg-3 control-label text-semibold">Judul</label>
            <div class="col-lg-8">
              <div class="input-group">
                <span class="input-group-addon"><i class="icon-vcard"></i></span>
                <input type="text" id="evtName" class="form-control">
              </div>
            </div>            
          </div>

          <div class="form-group">
            <label class="col-lg-3 control-label text-semibold">Isi</label>
            <div class="col-lg-9">
              <div class="input-group">
               <textarea class="textarea" id="evtIsi" placeholder="Enter text ..."></textarea>

              </div>
            </div>            
          </div>

          <div class="form-group">
            <label class="col-lg-3 control-label text-semibold">Tanggal</label>
            <div class="col-lg-6">
              <div class="input-group">
                <span class="input-group-addon"><i class="  icon-meter2"></i></span>
               <input type="text" id="evtTanggal" class="form-control pickadate" data-date-format="dd-mm-yyyy">
             </div>
            </div>                        
          </div>

          <!--div class="form-group">
            <label class="col-lg-3 control-label text-semibold">Initial Qty</label>
            <div class="col-lg-6">
              <div class="input-group">
                <span class="input-group-addon"><i class="  icon-server"></i></span>
                <input type="text" id="itmQty" class="form-control numeric-input-no-sign" placeholder="Initial quantity...">
              </div>
            </div>                        
          </div-->

              <div class="form-group">
                <label class="col-lg-3 control-label text-semibold">Status</label>
                <div class="col-lg-6 input-group">
                 <select class="select" id="evtStatus">
                  <option>--Pilihan--</option>
                  <option>Y</option>
                  <option>N</option>
                 </select>
                </div>
              </div>

          <!--div class="form-group">
            <label class="col-lg-4 control-label text-semibold">&nbsp;</label>            
            <div class="col-lg-8">
              <button type="button" class="btn bg-green btn-block" onClick="saveData()">Save Order/Project <i class="fa fa-check position-right"></i></button>
            </div>            
          </div-->
        </div>
      </div>
    </div>
  </form>   

  <div class="panel panel-flat border-top-primary">
    <div class="panel-heading">
      <h5 class="panel-title text-semibold" style="color:rgb(51, 150, 213);">Daftar Event</h5>
      <div class="heading-elements">
        <ul class="icons-list">            
          <!--li><a href="#"><i class="  icon-file-excel"></i> Download Excel Data</a></li-->
          <!--li><button type="button" class="btn btn-primary btn-labeled btn-xs"><b><i class="icon-database-check"></i></b> Save Order/Project</button></li-->
          <!--li><a data-action="collapse"></a></li-->
          <!--li><a data-action="reload"></a></li-->
          <!--li><a data-action="close"></a></li-->
        </ul>
      </div>
    </div>
    <div class="panel-body">
      <!--div class="row">
        <div class="col-lg-3">          
          <select class="form-control" id="ordPeriode">
          </select>
        </div>
        <div class="col-lg-8">&nbsp;</div>
      </div-->          
      <div class="row">
        <div class="col-lg-12">
          <table class="table datatable-basic">
            <thead>
              <tr>
                <th style="text-align:center" width="25%">Judul</th>
                <th style="text-align:center" width="13%">Isi</th>
                <th style="text-align:center" width="15%">Tanggal</th>
                <th style="text-align:center" width="13%">Status</th>
                <th style="text-align:center" width="13%">User</th>
                <th class="text-center" width="13%">&nbsp;</th>
              </tr>
            </thead>
            <tbody>
              <?php
              if(isset($ctlEvents) && count($ctlEvents) > 0) {
                foreach ($ctlEvents as $aData) {
                  ?>
                  <script type="text/javascript">
                    var itm_<?php echo $aData->{"EVT_ID"}; ?> = {
                      EVT_ID : "<?php echo $aData->{'EVT_ID'}; ?>",
                      EVT_TITLE : "<?php echo $aData->{'EVT_TITLE'}; ?>",
                      EVT_CONTENT : "<?php echo $aData->{'EVT_CONTENT'}; ?>",
                      EVT_DATE :"<?php echo $aData->{'EVT_DATE'}; ?>",
                      EVT_STATUS :"<?php echo $aData->{'EVT_STATUS'}; ?>",
                      U_ID : "<?php echo $aData->{'U_ID'}; ?>"
                    };
                  </script>
                  <tr>
                    <td style="text-align:left" ><?php echo $aData->{"EVT_TITLE"}; ?></td>
                    <td style="text-align:center" ><?php echo $aData->{"EVT_CONTENT"}; ?></td>
                    <td style="text-align:right" ><?php echo $aData->{"EVT_DATE"}; ?></td>
                    <td style="text-align:center" ><?php echo $aData->{"EVT_STATUS"}; ?></td>
                    <td style="text-align:center" ><?php echo $aData->{"U_ID"}; ?></td>
                    <td class="text-center" width="13%">
                      <div class='btn-group'>
                        <a href='#' class='label label-info dropdown-toggle' data-toggle='dropdown'>Action <span class='caret'></span></a>
                        <ul class='dropdown-menu dropdown-menu-right'>
                          <li><a href="javascript:editEvents(itm_<?php echo $aData->{"EVT_ID"}; ?>)"><span class='fa fa-edit position-left'></span>Edit</a></li>
                          <li class='divider'>
                          <li><a href='javascript:deleteEvents("<?php echo $aData->{"EVT_ID"}; ?>")'><span class='fa fa-remove position-left'></span> Delete</a></li>                        
                        </ul>
                      </div>
                    </td> 
                  </tr>
                  <?php
                }
              }
              ?>            
            </tbody>
          </table>
        </div>
      </div>        
    </div>
  </div>
</div>  

<div class="footer text-muted"></div>

<!-- modal -->
<div id="mdlEditItem" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h6 class="modal-title"><i class="icon-plus3"></i> &nbsp; Edit Acara</h6>
            </div>

            <div class="modal-body">
                <form class="form-horizontal" method="post" action="">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="col-lg-2 control-label text-semibold">Judul</label>
                            <div class="col-lg-5">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="icon-pencil"></i></span>
                                    <input type="text" id="evtNameEdit" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="col-lg-2 control-label text-semibold">Isi</label>
                                <div class="col-lg-9">

                                    <textarea class="textarea" id="evtIsiEdit" placeholder="Enter text ..."></textarea>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="col-lg-2 control-label text-semibold">Tanggal</label>
                                <div class="col-lg-5">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="icon-calendar"></i></span>
                                        <input type="text" id="evtTanggalEdit" class="form-control pickadate" data-date-format="dd-mm-yyyy">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label class="col-lg-2 control-label text-semibold">Status</label>
                                <div class="input-group">
                                    <select class="select" id="evtStatusEdit">
                                        <option>Y</option>
                                        <option>N</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-warning btn-labeled btn-xs" data-dismiss="modal"><b><i class="icon-cross3"></i></b> Tutup </button>
                <button type="button" class="btn btn-primary btn-labeled btn-xs" onClick="putEvents();" id="btnUpdateItem"  data-item-id=""><b><i class="icon-checkmark2"></i></b> Simpan </button>
            </div>
        </div>
    </div>
</div>
<!-- Theme JS files -->
<script type="text/javascript">
  // Select with search
  $('.select').select2();
  //$('.select').select2({
  //  minimumResultsForSearch: "-1"
  //});
</script>
<script type="text/javascript">
        $('.pickadate').pickadate({
            format: 'dd-mm-yyyy',
            formatSubmit: 'yyyy-mm-dd'
        });

        $('#evtIsi').wysihtml5();
        $('#evtIsiEdit').wysihtml5();

</script>

<script type="text/javascript">
  var gSelectedId = "";

  $(function() {
    // Table setup
    // ------------------------------
    // Setting datatable defaults
    $.extend( $.fn.dataTable.defaults, {
        autoWidth: false,        
        /*
        columnDefs: [{ 
            orderable: false,
            width: '80px',
            targets: [ 3 ]
        }],*/
        dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
        language: {
            search: '<span>Search &nbsp;</span> _INPUT_',
            lengthMenu: '<span>Show &nbsp;</span> _MENU_',
            paginate: { 'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;' }
        },
        drawCallback: function () {
            $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
        },
        preDrawCallback: function() {
            $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
        }
    });

    // Datatable with saving state
    $('.datatable-basic').DataTable({
        stateSave: true,
        "order": [[ 0, "desc" ]]
    });

    // External table additions
    // ------------------------------
    // Add placeholder to the datatable filter option
    $('.dataTables_filter input[type=search]').attr('placeholder','Keyword...');

    // Enable Select2 select for the length option
    $('.dataTables_length select').select2({
        minimumResultsForSearch: "-1"
    }); 

    //$(".datepicker").datepicker({ 
    //  dateFormat: 'dd-mm-yy' 
    //});

    //$('.pickatime-hidden').pickatime({
    //  formatSubmit: 'HH:i',
    //  hiddenName: true
    //});   

    //$('#mdlAddNote').on('shown.bs.modal', function() {
    //  $("#note").focus();
    //})
  });

  function saveData() {
            var evtName = $("#evtName").val();
            var evtIsi = $("#evtIsi").val();
            var evtTanggal = $("#evtTanggal").val();
            var evtStatus = $("#evtStatus").val();

    if(evtName != "" && evtIsi != "" && evtStatus != "" /*&& itmQty != ""*/) {
      //var parameters = {
      //  itmName : itmName,
      //  itmPrice : itmPrice,
      //  itmUnit : itmUnit,
      //  itmQty : itmQty
      //};
      var formData = new FormData();
     formData.append('evtName', evtName);
     formData.append('evtIsi', evtIsi);
     formData.append('evtTanggal', evtTanggal);
     formData.append('evtStatus', evtStatus);
     formData.append('_token', '{{ csrf_token() }}');
    createOverlay("Processing...");
      $.ajax({  
        type  : "POST",
        url   : "{{ url('events/events')}}",
        dataType: 'json',  // what to expect back from the PHP script, if anything
        cache: false,
        contentType: false,
        processData: false,
        data : formData,
        success : function(data) { 
          gOverlay.hide();
          //var data = JSON.parse(result);

          if(data["STATUS"] == "SUCCESS") {            
            toastr.success(data["MESSAGE"]);
            //swal({
            //  title: "SUKSES",
            //  text: data["MESSAGE"],
            //  type: "success",
            //  showCancelButton: false,
            //  confirmButtonColor: "#DD6B55",
            //  confirmButtonText: "OK",
            //  closeOnConfirm: false,
            //  html: true
            //},
            //function(){
              setTimeout(function(){ 
                window.location = "{{ url('events')}}";
              }, 300);              
            //});
          }
          else {
            //sweetAlert("Pesan Kesalahan", data["MESSAGE"], "error");
            toastr.error(data["MESSAGE"]);
            //swal({
            //  title: "ERROR",
            //  text: data["MESSAGE"],
            //  type: "error",
            //  showCancelButton: false,
            //  confirmButtonColor: "#DD6B55",
            //  confirmButtonText: "OK",
            //  closeOnConfirm: true,
            //  html: true
            //},
            //function(){
              setTimeout(function(){ 
                window.location = "{{ url('events')}}";
              }, 500);              
            //});
          }
        },
        error : function(error) {   
          gOverlay.hide();
          alert("Network/server error\r\n" + error);
        }
      });
    }
  }

  function editEvents(events) {
    $("#btnUpdateItem").attr("data-item-id", events.EVT_ID);
    $("#evtNameEdit").val(events.EVT_TITLE);
    $("#evtIsiEdit").data("wysihtml5").editor.setValue(events.EVT_CONTENT);
    $("#evtTanggalEdit").val(events.EVT_DATE);
    $("#evtStatusEdit").val(events.EVT_STATUS);
    $("#mdlEditItem").modal("show");
  }

  function putEvents() {
    var itmId = $("#btnUpdateItem").attr("data-item-id");
    if(itmId == "") {
      toastr.error("Select item to edit");
    }
    else {
       var evtName = $('#evtNameEdit').val();
       var evtIsi =  $("#evtIsiEdit").val();
       var evtTanggal = $('#evtTanggalEdit').val();
       var evtStatus = $("#evtStatusEdit").val();

      if(evtName != "" && evtIsi != "" && evtStatus != "") {
        //var parameters = {
        //  itmId : itmId,
        //  itmName : itmName,
        //  itmPrice : itmPrice,
        //  itmUnit : itmUnit
        //};
        var formData = new FormData();
         formData.append('itmId', itmId);
         formData.append('evtName', evtName);
         formData.append('evtIsi', evtIsi);
         formData.append('evtTanggal', evtTanggal);
         formData.append('evtStatus', evtStatus);
         formData.append('_token', '{{ csrf_token() }}');

        createOverlay("Processing...");
        $.ajax({  
          type  : "POST",
          url   : "{{ url('events/event')}}",
          dataType: 'json',  // what to expect back from the PHP script, if anything
          cache: false,
          contentType: false,
          processData: false,
          data : formData,
          success : function(data) { 
            gOverlay.hide();
            //var data = JSON.parse(result);

            if(data["STATUS"] == "SUCCESS") {            
              toastr.success(data["MESSAGE"]);
              //swal({
              //  title: "SUKSES",
              //  text: data["MESSAGE"],
              //  type: "success",
              //  showCancelButton: false,
              //  confirmButtonColor: "#DD6B55",
              //  confirmButtonText: "OK",
              //  closeOnConfirm: false,
              //  html: true
              //},
              //function(){
                setTimeout(function(){ 
                  window.location =  "{{ url('events')}}";
                }, 300);              
              //});
            }
            else {
              //sweetAlert("Pesan Kesalahan", data["MESSAGE"], "error");
              toastr.error(data["MESSAGE"]);
              //swal({
              //  title: "ERROR",
              //  text: data["MESSAGE"],
              //  type: "error",
              //  showCancelButton: false,
              //  confirmButtonColor: "#DD6B55",
              //  confirmButtonText: "OK",
              //  closeOnConfirm: true,
              //  html: true
              //},
              //function(){
                setTimeout(function(){ 
                  window.location = "{{ url('events')}}";
                }, 500);              
              //});
            }
          },
          error : function(error) {   
            gOverlay.hide();
            alert("Network/server error\r\n" + error);
          }
        });
      }
    }
  }

  function deleteEvents(itmId) {
    swal({
      title: "Confirmation",
      text: "Delete this item ?",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: "Yes",
      closeOnConfirm: true,
      html: true
    },
    function(){ 
      createOverlay("Processing...");
      $.ajax({  
        type  : "DELETE",
        url   :  '{{ url('events/events') }}',
        data  :  {
                "_token": "{{ csrf_token() }}",
                "id": itmId
                },
        success : function(result) { 
          gOverlay.hide();
          var data = JSON.parse(result);

          if(data["STATUS"] == "SUCCESS") {            
            toastr.success(data["MESSAGE"]);
            setTimeout(function(){ 
              window.location = "{{ url('events') }}";
            }, 500);              
          }
          else {
            toastr.error(data["MESSAGE"]);            
          }
        },
        error : function(error) {   
          gOverlay.hide();
          alert("Network/server error\r\n" + error);
        }
      });
    });
  }
</script>
@endsection