@extends('dashboard')
@section('content')
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-grid6 position-left"></i> Kategori</h4>
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
                <li><a href="<?php echo asset_url(); ?>"><i class="icon-home2 position-left"></i> Beranda</a></li>
                <li class="active"><i class="icon-vcard"></i> Kategori</li>

            </ul>
            <!--
            <ul class="breadcrumb-elements">
              <li><a href="#"><i class="icon-comment-discussion position-left"></i> Support</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="icon-gear position-left"></i>
                  Settings
                  <span class="caret"></span>
                </a>

                <ul class="dropdown-menu dropdown-menu-right">
                  <li><a href="#"><i class="icon-user-lock"></i> Account security</a></li>
                  <li><a href="#"><i class="icon-statistics"></i> Analytics</a></li>
                  <li><a href="#"><i class="icon-accessibility"></i> Accessibility</a></li>
                  <li class="divider"></li>
                  <li><a href="#"><i class="icon-gear"></i> All settings</a></li>
                </ul>
              </li>
            </ul>
            //-->
        </div>
    </div>

    <div class="content">
        <div class="panel panel-flat border-top-primary">
            <div class="panel-heading">
                <h5 class="panel-title text-semibold" style="color:rgb(51, 150, 213);">Tambah Kategori</h5>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <!--li><button type="button" class="btn btn-primary btn-labeled btn-xs"><b><i class="icon-database-check"></i></b> Save Order/Project</button></li-->
                        <li><a href="javascript:saveData()"><i class=" icon-database-check"></i> Simpan</a></li>
                        <li><a data-action="collapse"></a></li>
                    </ul>
                </div>
            </div>

            <div class="panel-body">
                <form class="form-horizontal" method="post" id="formContact" name="formContact" action="">


                    <div class="form-group">
                        <label class="col-lg-2 control-label text-semibold">Nama</label>
                        <div class="col-lg-5">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="icon-vcard"></i></span>
                                <input type="text" id="ctNameNew" class="form-control">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="panel panel-flat border-top-primary">
            <div class="panel-heading">
                <h5 class="panel-title text-semibold" style="color:rgb(51, 150, 213);">Daftar Kategori</h5>
            </div>
            <div class="panel-body">
                <table class="table datatable-basic">
                    <thead>
                    <tr>
                        <!-- <th style="text-align:center" width="10%">ID#</th> -->
                        <th style="text-align:center" >&nbsp;</th>
                        <th>Nama</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if(isset($ctlCategory) && count($ctlCategory) > 0) {
                    foreach ($ctlCategory as $aData) {
                    ?>
                    <tr>
                        <td style="text-align:center">
                            <a href="javascript:editData('<?php echo $aData->{"CATEG_ID"}; ?>')"><button type="button" class="btn btn-primary btn-icon btn-xs"><i class="icon-pencil7"></i></button></a>
                            <a href="javascript:deleteData('<?php echo $aData->{"CATEG_ID"}; ?>')"><button type="button" class="btn btn-danger btn-icon btn-xs"><i class="icon-cross2"></i></button></a>
                        <!-- <div class="btn-group">
                    <button type="button" class="btn btn-primary btn-icon dropdown-toggle" data-toggle="dropdown">
                      <i class="icon-menu7"></i> &nbsp;<span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-right">
                      <li><a href="javascript:editData('<!--?php echo $aData->{"CATEG_ID"}; ?>')"><i class="fa fa-edit"></i> Edit</a></li>
                      <li><a href="javascript:deleteData('<!--?php echo $aData->{"CATEG_ID"}; ?>')"><i class="fa fa-remove"></i> Delete</a></li>
                    </ul>
                  </div> -->
                        </td>
                        <td>
                            <div id="divNama_<?php echo $aData->{"CATEG_ID"}; ?>_Label" style="display:block"><span class="clickable" data-id="<?php echo $aData->{"CATEG_ID"}; ?>"><?php echo $aData->{"CATEG_NAME"}; ?></span></div>
                            <div id="divNama_<?php echo $aData->{"CATEG_ID"}; ?>_Edit" style="display:none"><input type="text" class="form-control editable-form" id="kNama_<?php echo $aData->{"CATEG_ID"} ?>" name="kNama_<?php echo $aData->{"CATEG_ID"}; ?>" placeholder="Contact name..." value="<?php echo $aData->{"CATEG_NAME"}; ?>" data-id="<?php echo $aData->{"CATEG_ID"}; ?>"></div>
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

        <div class="footer text-muted"></div>
    </div>

    <script type="text/javascript">
        // Select with search
        $('.select').select2();
    </script>



    <script type="text/javascript">
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
                    search: '<span>Cari &nbsp;</span> _INPUT_',
                    lengthMenu: '<span>Tampil &nbsp;</span> _MENU_',
                    paginate: { 'first': 'Awal', 'last': 'Akhir', 'next': '&rarr;', 'previous': '&larr;' }
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
                "order": [[ 0, "desc" ]],
                scrollY:        "300px",
                scrollX:        true,
                scrollCollapse: true,
                paging:         true,
                fixedColumns:   {
                    leftColumns: 1,
                    rightColumns: 1
                }
            });

            // External table additions
            // ------------------------------
            // Add placeholder to the datatable filter option
            $('.dataTables_filter input[type=search]').attr('placeholder','Kata kunci...');

            // Enable Select2 select for the length option
            $('.dataTables_length select').select2({
                minimumResultsForSearch: "-1"
            });
        });

        $(".first-input").focus();

        $('.editable-form').keyup(function(e) {
            var slug = $(this).attr('data-id');
            // console.log("slug : " + slug);

            if(e.keyCode == 27) { // escape key maps to keycode `27`
                disableEdit('divNama', slug);
                /*disableEdit('divPhone', slug);
                disableEdit('divEmail', slug);
                disableEdit('divTipe', slug);
                disableEdit('divAddress', slug);
                disableEdit('divCompanyName', slug);
                disableEdit('divCompanyAddress', slug);
                disableEdit('divCompanyEmail', slug);
                disableEdit('divCompanyPhone', slug);
                disableEdit('divCompanyCity', slug);*/
            }
            if(e.keyCode == 13) {
                updateData(slug);
                disableEdit('divNama', slug);
                /*disableEdit('divPhone', slug);
                disableEdit('divEmail', slug);
                disableEdit('divTipe', slug);
                disableEdit('divAddress', slug);
                disableEdit('divCompanyName', slug);
                disableEdit('divCompanyAddress', slug);
                disableEdit('divCompanyEmail', slug);
                disableEdit('divCompanyPhone', slug);
                disableEdit('divCompanyCity', slug);*/
            }
        });

        var saveData = function() {
           // var ctType = $("#ctTypeNew").val();
            var ctName = $("#ctNameNew").val();
            /*var ctPhone = $("#ctPhoneNew").val();
            var ctEmail = $("#ctEmailNew").val();
            var ctAddress = $("#ctAddressNew").val();
            var companyName = $("#companyNameNew").val();
            var companyAddress = $("#companyAddressNew").val();
            var companyEmail = $("#companyEmailNew").val();
            var companyPhone = $("#companyPhoneNew").val();
            var companyCity = $("#companyCityNew").val();*/

            if(ctName != "") {
                createOverlay("Proses...");
                $.ajax({
                    type  : "POST",
                    url   : "<?php echo asset_url(); ?>/category/category/category",
                    data   : {
                        "_token": "{{ csrf_token() }}",
                        "ctName": ctName
                    },
                    success : function(result) {
                        gOverlay.hide();
                        var data = JSON.parse(result);

                        if(data["STATUS"] == "SUCCESS") {
                            toastr.success(data["MESSAGE"]);
                            setTimeout(function(){
                                window.location = "<?php echo asset_url(); ?>/category/category";
                            }, 300);
                        }
                        else {
                            //sweetAlert("Pesan Kesalahan", data["MESSAGE"], "error");
                            toastr.error(data["MESSAGE"]);
                        }
                    },
                    error : function(error) {
                        gOverlay.hide();
                        alert("Network/server error\r\n" + error);
                    }
                });
            }
        }

        var editData = function(slug){
            enableEdit('divNama', slug);
            /*enableEdit('divPhone', slug);
            enableEdit('divEmail', slug);
            enableEdit('divTipe', slug);
            enableEdit('divAddress', slug);
            enableEdit('divCompanyName', slug);
            enableEdit('divCompanyAddress', slug);
            enableEdit('divCompanyEmail', slug);
            enableEdit('divCompanyPhone', slug);
            enableEdit('divCompanyCity', slug);*/
        }

        var enableEdit = function(aDiv, slug) {
            $("#"+aDiv + "_" +  slug + "_Label").css("display", "none");
            $("#"+aDiv + "_" +  slug + "_Edit").css("display", "block");
        }

        var disableEdit = function(aDiv, slug) {
            $("#"+aDiv + "_" +  slug + "_Label").css("display", "block");
            $("#"+aDiv + "_" +  slug + "_Edit").css("display", "none");
        }

        var deleteData = function(slug){
            //console.log(slug)
            swal({
                    title: "Hapus Kontak ?",
                    text: "Hapus data kontak ini ?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Ya",
                    cancelButtonText : "Batal",
                    closeOnConfirm: true
                },
                function(){
                    createOverlay("Proses...");
                    $.ajax({

                        type: "DELETE",
                        url: "<?php echo asset_url(); ?>/category/category/category",
                        data:
                            {
                                "_token": "{{ csrf_token() }}",
                                "id": slug
                            },
                        success : function(result) {
                            gOverlay.hide();
                            var data = JSON.parse(result);

                            if(data["STATUS"] == "SUCCESS") {
                                toastr.success(data["MESSAGE"]);
                                setTimeout(function(){
                                    window.location = "<?php echo asset_url(); ?>/category/category";
                                }, 300);
                            }
                            else {
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
                                    window.location = "<?php echo asset_url(); ?>/category/category";
                                }, 500);
                                //});
                            }
                        },
                        error : function(error) {
                            gOverlay.hide();
                            alert("Network/server error\r\n" + error);
                        }
                    });
                });
        }

        var updateData = function(slug){
            var ctName = $("#kNama_" + slug).val();
           /* var ctPhone = $("#kPonsel_" + slug).val();
            var ctEmail = $("#kEmail_" + slug).val();
            var ctType = $("#kTipe_" + slug).val();
            var ctAddress = $("#kAddress_" + slug).val();
            var companyName = $("#kCompanyName_" + slug).val();
            var companyAddress = $("#kCompanyAddress_" + slug).val();
            var companyEmail = $("#kCompanyEmail_" + slug).val();
            var companyPhone = $("#kCompanyPhone_" + slug).val();
            var companyCity = $("#kCompanyCity_" + slug).val();*/

            $("#divNama_" + slug + "_Label").html(ctName);
          /*  $("#divPhone_" + slug + "_Label").html(ctPhone);
            $("#divEmail_" + slug + "_Label").html(ctEmail);
            $("#divTipe_" + slug + "_Label").html(ctType);
            $("#divAddress_" + slug + "_Label").html(ctAddress);
            $("#divCompanyName_" + slug + "_Label").html(companyName);
            $("#divCompanyAddress_" + slug + "_Label").html(companyAddress);
            $("#divCompanyEmail_" + slug + "_Label").html(companyEmail);
            $("#divCompanyPhone_" + slug + "_Label").html(companyPhone);
            $("#divCompanyCity_" + slug + "_Label").html(companyCity);*/

            createOverlay("Proses...");
            $.ajax({
                type  : "PUT",
                url   : "<?php echo asset_url(); ?>/category/category/category",
                data   : {
                    "_token": "{{ csrf_token() }}",
                    "ctId" : slug,
                    "ctName": ctName
                },
                success : function(result) {
                    gOverlay.hide();
                    var data = JSON.parse(result);

                    if(data["STATUS"] == "SUCCESS") {
                        toastr.success(data["MESSAGE"]);
                        setTimeout(function(){
                            window.location = "<?php echo asset_url(); ?>/category/category";
                        }, 300);
                    }
                    else {
                        //sweetAlert("Pesan Kesalahan", data["MESSAGE"], "error");
                        toastr.error(data["MESSAGE"]);
                    }
                },
                error : function(error) {
                    gOverlay.hide();
                    alert("Network/server error\r\n" + error);
                }
            });
        }
    </script>
@endsection