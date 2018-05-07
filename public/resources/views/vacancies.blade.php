@extends('dashboard')
@section('content')
<div class="page-header">
  <div class="page-header-content">
    <div class="page-title">
      <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Daftar vacancies</span></h4>
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
      <li><i class="icon-menu position-left"></i> vacancies</li>
      <li class="active"><i class="icon-list"></i> Daftar vacancies</li>
    </ul>
  </div>
</div>

<div class="content">
  <!-- -->
  <form class="form-horizontal" method="post" id="formUploadData" name="formUploadData" action="send">    
    <div class="panel panel-flat border-top-primary">
      <div class="panel-heading">
        <h5 class="panel-title text-semibold" style="color:rgb(51, 150, 213);">Tambah  Promo</h5>
        <div class="heading-elements">
          <ul class="icons-list">            
            <li><a href="javascript:saveData()"><i class=" icon-database-check"></i> Simpan</a></li>
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
                <input type="text" id="vacName" class="form-control">
              </div>
            </div>            
          </div>

          <div class="form-group">
            <label class="col-lg-3 control-label text-semibold">Isi</label>
            <div class="col-lg-9">
              <div class="input-group">
               <textarea class="textarea" id="vacContent" placeholder="Enter text ..."></textarea>

              </div>
            </div>            
          </div>

          <div class="form-group">
            <label class="col-lg-3 control-label text-semibold">Tanggal</label>
            <div class="col-lg-6">
              <div class="input-group">
                <span class="input-group-addon"><i class="  icon-meter2"></i></span>
               <input type="text" id="vacDate" class="form-control pickadate" data-date-format="dd-mm-yyyy">
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
                 <select class="select" id="vacStatus">
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
      <h5 class="panel-title text-semibold" style="color:rgb(51, 150, 213);">Daftar vacancies</h5>
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
              if(isset($ctlVacan) && count($ctlVacan) > 0) {
                foreach ($ctlVacan as $aData) {
                  ?>
                  <script type="text/javascript">
                    var itm_<?php echo $aData->{"VAC_ID"}; ?> = {
                      VAC_ID : "<?php echo $aData->{'VAC_ID'}; ?>",
                      VAC_NAME : "<?php echo $aData->{'VAC_NAME'}; ?>",
                      VAC_CONTENT : "<?php echo $aData->{'VAC_CONTENT'}; ?>",
                      VAC_DATE :"<?php echo $aData->{'VAC_DATE'}; ?>",
                      VAC_STATUS :"<?php echo $aData->{'VAC_STATUS'}; ?>",
                      U_ID : "<?php echo $aData->{'U_ID'}; ?>"
                    };
                  </script>
                  <tr>
                    <td style="text-align:left" ><?php echo $aData->{"VAC_NAME"}; ?></td>
                    <td style="text-align:center" ><?php echo $aData->{"VAC_CONTENT"}; ?></td>
                    <td style="text-align:right" ><?php echo $aData->{"VAC_DATE"}; ?></td>
                    <td style="text-align:center" ><?php echo $aData->{"VAC_STATUS"}; ?></td>
                    <td style="text-align:center" ><?php echo $aData->{"U_ID"}; ?></td>
                    <td class="text-center" width="13%">
                      <div class='btn-group'>
                        <a href='#' class='label label-info dropdown-toggle' data-toggle='dropdown'>Action <span class='caret'></span></a>
                        <ul class='dropdown-menu dropdown-menu-right'>
                          <li><a href="javascript:editVacancies(itm_<?php echo $aData->{"VAC_ID"}; ?>)"><span class='fa fa-edit position-left'></span>Edit</a></li>
                          <li class='divider'>
                          <li><a href='javascript:deleteVacancies("<?php echo $aData->{"VAC_ID"}; ?>")'><span class='fa fa-remove position-left'></span> Delete</a></li>                        
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
                                    <input type="text" id="vacNameEdit" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="col-lg-2 control-label text-semibold">Isi</label>
                                <div class="col-lg-9">

                                    <textarea class="textarea" id="vacContentEdit" placeholder="Enter text ..."></textarea>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="col-lg-2 control-label text-semibold">Tanggal</label>
                                <div class="col-lg-5">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="icon-calendar"></i></span>
                                        <input type="text" id="vacDate" class="form-control pickadate" data-date-format="dd-mm-yyyy">
                                    </div>
                                </div>
                            </div>
                        </div>
                       <div class="col-lg-12">
                            <div class="form-group">
                                <label class="col-lg-2 control-label text-semibold">Status</label>
                                <div class="col-lg-5">
                                <div class="input-group">
                                    <select class="select" id="vacStatusEdit">
                                        <option>Y</option>
                                        <option>N</option>
                                    </select>
                                </div>
                              </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-warning btn-labeled btn-xs" data-dismiss="modal"><b><i class="icon-cross3"></i></b> Tutup </button>
                <button type="button" class="btn btn-primary btn-labeled btn-xs" onClick="putVacancies();" id="btnUpdateItem"  data-item-id=""><b><i class="icon-checkmark2"></i></b> Simpan </button>
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

        $('#vacContent').wysihtml5();
        $('#vacContentEdit').wysihtml5();

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
            var vacName = $("#vacName").val();
            var vacContent = $("#vacContent").val();
            var vacDate = $("#vacDate").val();
            var vacStatus = $("#vacStatus").val();

    if(vacName != "" && vacContent != "" && vacStatus != "" /*&& itmQty != ""*/) {
      //var parameters = {
      //  itmName : itmName,
      //  itmPrice : itmPrice,
      //  itmUnit : itmUnit,
      //  itmQty : itmQty
      //};
      var formData = new FormData();
     formData.append('vacName', vacName);
     formData.append('vacContent', vacContent);
     formData.append('vacDate', vacDate);
     formData.append('vacStatus', vacStatus);
     formData.append('_token', '{{ csrf_token() }}');
    createOverlay("Processing...");
      $.ajax({  
        type  : "POST",
        url   : "{{ url('vacancies/vacancies')}}",
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
                window.location = "{{ url('vacancies')}}";
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
                window.location = "{{ url('vacancies')}}";
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

  function editVacancies(promo) {
    $("#btnUpdateItem").attr("data-item-id", promo.VAC_ID);
    $("#vacNameEdit").val(promo.VAC_NAME);
    $("#vacContentEdit").data("wysihtml5").editor.setValue(promo.VAC_CONTENT);
    $("#vacDate").val(promo.VAC_DATE);
    $("#vacStatusEdit").val(promo.VAC_STATUS);
    $("#mdlEditItem").modal("show");
  }

  function putVacancies() {
    var itmId = $("#btnUpdateItem").attr("data-item-id");
    if(itmId == "") {
      toastr.error("Select item to edit");
    }
    else {
       var vacName = $('#vacNameEdit').val();
       var vacContent =  $("#vacContentEdit").val();
       var vacDate = $('#vacDate').val();
       var vacStatus = $("#vacStatusEdit").val();

      if(vacName != "" && vacContent != "" && vacStatus != "") {
        //var parameters = {
        //  itmId : itmId,
        //  itmName : itmName,
        //  itmPrice : itmPrice,
        //  itmUnit : itmUnit
        //};
        var formData = new FormData();
         formData.append('itmId', itmId);
         formData.append('vacName', vacName);
         formData.append('vacContent', vacContent);
         formData.append('vacDate', vacDate);
         formData.append('vacStatus', vacStatus);
         formData.append('_token', '{{ csrf_token() }}');

        createOverlay("Processing...");
        $.ajax({  
          type  : "POST",
          url   : "{{ url('vacancies/vacan')}}",
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
                  window.location =  "{{ url('vacancies')}}";
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
                  window.location = "{{ url('vacancies')}}";
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

  function deleteVacancies(itmId) {
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
        url   :  '{{ url('vacancies/vacancies') }}',
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
              window.location = "{{ url('vacancies') }}";
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