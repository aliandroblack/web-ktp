@extends('dashboard')
@section('content')
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-grid6 position-left"></i> Berita</h4>
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
                <li class="active"><i class="icon-vcard"></i> News</li>
                <li></li>
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
                <h5 class="panel-title text-semibold" style="color:rgb(51, 150, 213);">Tambah Berita</h5>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <!--li><button type="button" class="btn btn-primary btn-labeled btn-xs"><b><i class="icon-database-check"></i></b> Save Order/Project</button></li-->
                        <li><a href="javascript:saveData()"><i class=" icon-database-check"></i> Simpan</a></li>
                        <li><a data-action="collapse"></a></li>
                    </ul>
                </div>
            </div>

            <div class="panel-body">
                <form class="form-horizontal" method="post" id="formNews" name="formNews" action="">


                    <div class="form-group">
                        <label class="col-lg-2 control-label text-semibold">Judul</label>
                        <div class="col-lg-5">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="icon-vcard"></i></span>
                                <input type="text" id="ctHeadline" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label text-semibold">Kategori</label>
                        <div class="col-lg-5">
                            {{--<div class="input-group">--}}
                                {{--<span class="input-group-addon"><i class=" icon-file-check"></i></span>--}}
                                <select class="select" id="ctRefCateg">
                                    <option>--Pilihan--</option>
                                    <?php
                                        if(isset($ctlRefCateg) && count($ctlRefCateg) > 0) {
                                            foreach ($ctlRefCateg as $aData) {
                                            ?>
                                            <option value="<?php echo $aData->{"CATEG_ID"}; ?>"><?php echo $aData->{"CATEG_NAME"}; ?></option>
                                            <?php
                                            }
                                        }
                                    ?>
                                </select>
                            {{--</div>--}}
                        </div>
                    </div>
                    <br />
                    <div class="form-group">
                    <label class="col-lg-2 control-label text-semibold">Isi</label>
                    <div class="panel panel-flat col-lg-7">



                            <div class="summernote" style="display: none;">


                            </div><div class="note-editor"><div class="note-dropzone">
                                <div class="note-dropzone-message"></div></div>
                            <div class="note-dialog">
                                <div class="note-image-dialog modal" aria-hidden="false">
                                    <div class="modal-dialog"><div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" aria-hidden="true" tabindex="-1">×</button>
                                                <h6 class="modal-title">Insert Image</h6>
                                            </div><form class="note-modal-form">
                                                <div class="modal-body">
                                                    <div class="form-group row-fluid note-group-select-from-files">
                                                        <label>Select from files</label>
                                                        <div class="uploader bg-blue">
                                                            <input class="note-image-input" type="file" name="files" accept="image/*" multiple="multiple">
                                                            <span class="filename" style="user-select: none;">No file selected</span>
                                                            <span class="action" style="user-select: none;"><i class="icon-googleplus5"></i></span>
                                                        </div>
                                                    </div><div class="form-group row-fluid">
                                                        <label>Image URL</label>
                                                        <input class="note-image-url form-control span12" type="text">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button href="#" class="btn btn-primary note-image-btn disabled" disabled="">
                                                        Insert Image</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="note-link-dialog modal" aria-hidden="false">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" aria-hidden="true" tabindex="-1">
                                                    ×</button><h6 class="modal-title">Insert Link</h6>
                                            </div>
                                            <form class="note-modal-form"><div class="modal-body">
                                                    <div class="form-group row-fluid">
                                                        <label>Text to display</label><input class="note-link-text form-control span12" type="text"></div><div class="form-group row-fluid"><label>To what URL should this link go?</label><input class="note-link-url form-control span12" type="text"></div><div class="checkbox"><label><div class="checker"><span class="checked"><input type="checkbox" checked=""></span></div> Open in new window</label></div></div><div class="modal-footer"><button href="#" class="btn btn-primary note-link-btn disabled" disabled="">Insert Link</button></div></form></div></div></div><div class="note-help-dialog modal" aria-hidden="false"><div class="modal-dialog"><div class="modal-content"><form class="note-modal-form"><div class="modal-body"><a class="modal-close pull-right" aria-hidden="true" tabindex="-1">Close</a><div class="title">Keyboard shortcuts</div><div class="note-shortcut-row row"><div class="note-shortcut note-shortcut-col col-sm-6 col-xs-12"><div class="note-shortcut-row row"><div class="note-shortcut-col col-xs-6 note-shortcut-title col-xs-offset-6">Action</div></div><div class="note-shortcut-row row"><div class="note-shortcut-col col-xs-6 note-shortcut-key">Ctrl + Z</div><div class="note-shortcut-col col-xs-6 note-shortcut-name">Undo</div></div><div class="note-shortcut-row row"><div class="note-shortcut-col col-xs-6 note-shortcut-key">Ctrl + Shift + Z</div><div class="note-shortcut-col col-xs-6 note-shortcut-name">Redo</div></div><div class="note-shortcut-row row"><div class="note-shortcut-col col-xs-6 note-shortcut-key">Ctrl + ]</div><div class="note-shortcut-col col-xs-6 note-shortcut-name">Indent</div></div><div class="note-shortcut-row row"><div class="note-shortcut-col col-xs-6 note-shortcut-key">Ctrl + [</div><div class="note-shortcut-col col-xs-6 note-shortcut-name">undefined</div></div><div class="note-shortcut-row row"><div class="note-shortcut-col col-xs-6 note-shortcut-key">Ctrl + ENTER</div><div class="note-shortcut-col col-xs-6 note-shortcut-name">Insert Horizontal Rule</div></div></div><div class="note-shortcut note-shortcut-col col-sm-6 col-xs-12"><div class="note-shortcut-row row"><div class="note-shortcut-col col-xs-6 note-shortcut-title col-xs-offset-6">Text formatting</div></div><div class="note-shortcut-row row"><div class="note-shortcut-col col-xs-6 note-shortcut-key">Ctrl + B</div><div class="note-shortcut-col col-xs-6 note-shortcut-name">Bold</div></div><div class="note-shortcut-row row"><div class="note-shortcut-col col-xs-6 note-shortcut-key">Ctrl + I</div><div class="note-shortcut-col col-xs-6 note-shortcut-name">Italic</div></div><div class="note-shortcut-row row"><div class="note-shortcut-col col-xs-6 note-shortcut-key">Ctrl + U</div><div class="note-shortcut-col col-xs-6 note-shortcut-name">Underline</div></div><div class="note-shortcut-row row"><div class="note-shortcut-col col-xs-6 note-shortcut-key">Ctrl + Shift + S</div><div class="note-shortcut-col col-xs-6 note-shortcut-name">undefined</div></div><div class="note-shortcut-row row"><div class="note-shortcut-col col-xs-6 note-shortcut-key">Ctrl + \</div><div class="note-shortcut-col col-xs-6 note-shortcut-name">Remove Font Style</div></div></div></div><div class="note-shortcut-row row"><div class="note-shortcut note-shortcut-col col-sm-6 col-xs-12"><div class="note-shortcut-row row"><div class="note-shortcut-col col-xs-6 note-shortcut-title col-xs-offset-6">Document Style</div></div><div class="note-shortcut-row row"><div class="note-shortcut-col col-xs-6 note-shortcut-key">Ctrl + NUM0</div><div class="note-shortcut-col col-xs-6 note-shortcut-name">Normal</div></div><div class="note-shortcut-row row"><div class="note-shortcut-col col-xs-6 note-shortcut-key">Ctrl + NUM1</div><div class="note-shortcut-col col-xs-6 note-shortcut-name">Header 1</div></div><div class="note-shortcut-row row"><div class="note-shortcut-col col-xs-6 note-shortcut-key">Ctrl + NUM2</div><div class="note-shortcut-col col-xs-6 note-shortcut-name">Header 2</div></div><div class="note-shortcut-row row"><div class="note-shortcut-col col-xs-6 note-shortcut-key">Ctrl + NUM3</div><div class="note-shortcut-col col-xs-6 note-shortcut-name">Header 3</div></div><div class="note-shortcut-row row"><div class="note-shortcut-col col-xs-6 note-shortcut-key">Ctrl + NUM4</div><div class="note-shortcut-col col-xs-6 note-shortcut-name">Header 4</div></div><div class="note-shortcut-row row"><div class="note-shortcut-col col-xs-6 note-shortcut-key">Ctrl + NUM5</div><div class="note-shortcut-col col-xs-6 note-shortcut-name">Header 5</div></div><div class="note-shortcut-row row"><div class="note-shortcut-col col-xs-6 note-shortcut-key">Ctrl + NUM6</div><div class="note-shortcut-col col-xs-6 note-shortcut-name">Header 6</div></div></div><div class="note-shortcut note-shortcut-col col-sm-6 col-xs-12"><div class="note-shortcut-row row"><div class="note-shortcut-col col-xs-6 note-shortcut-title col-xs-offset-6">Paragraph formatting</div></div><div class="note-shortcut-row row"><div class="note-shortcut-col col-xs-6 note-shortcut-key">Ctrl + Shift + L</div><div class="note-shortcut-col col-xs-6 note-shortcut-name">Align left</div></div><div class="note-shortcut-row row"><div class="note-shortcut-col col-xs-6 note-shortcut-key">Ctrl + Shift + E</div><div class="note-shortcut-col col-xs-6 note-shortcut-name">Align center</div></div><div class="note-shortcut-row row"><div class="note-shortcut-col col-xs-6 note-shortcut-key">Ctrl + Shift + R</div><div class="note-shortcut-col col-xs-6 note-shortcut-name">Align right</div></div><div class="note-shortcut-row row"><div class="note-shortcut-col col-xs-6 note-shortcut-key">Ctrl + Shift + J</div><div class="note-shortcut-col col-xs-6 note-shortcut-name">Justify full</div></div><div class="note-shortcut-row row"><div class="note-shortcut-col col-xs-6 note-shortcut-key">Ctrl + Shift + NUM7</div><div class="note-shortcut-col col-xs-6 note-shortcut-name">Ordered list</div></div><div class="note-shortcut-row row"><div class="note-shortcut-col col-xs-6 note-shortcut-key">Ctrl + Shift + NUM8</div><div class="note-shortcut-col col-xs-6 note-shortcut-name">Unordered list</div></div></div></div><p class="text-center"><a href="//hackerwins.github.io/summernote/" target="_blank">Summernote 0.6.0</a> · <a href="//github.com/HackerWins/summernote" target="_blank">Project</a> · <a href="//github.com/HackerWins/summernote/issues" target="_blank">Issues</a></p></div></form></div></div></div></div><div class="note-handle"><div class="note-control-selection"><div class="note-control-selection-bg"></div><div class="note-control-holder note-control-nw"></div><div class="note-control-holder note-control-ne"></div><div class="note-control-holder note-control-sw"></div><div class="note-control-sizing note-control-se"></div><div class="note-control-selection-info"></div></div></div><div class="note-popover"><div class="note-link-popover popover bottom in" style="display: none;"><div class="arrow"></div><div class="popover-content"><a href="http://www.google.com" target="_blank">www.google.com</a>&nbsp;&nbsp;<div class="note-insert btn-group"><button type="button" class="btn btn-default btn-icon" title="" data-event="showLinkDialog" data-hide="true" tabindex="-1" data-original-title="Edit (CTRL+K)"><i class="icon-pencil3"></i></button><button type="button" class="btn btn-default btn-icon" title="" data-event="unlink" tabindex="-1" data-original-title="Unlink"><i class="icon-link2"></i></button></div></div></div><div class="note-image-popover popover bottom in" style="display: none;"><div class="arrow"></div><div class="popover-content"><div class="btn-group"><button type="button" class="btn btn-default btn-icon" title="" data-event="resize" data-value="1" tabindex="-1" data-original-title="Resize Full"><span class="note-fontsize-10">100%</span></button><button type="button" class="btn btn-default btn-icon" title="" data-event="resize" data-value="0.5" tabindex="-1" data-original-title="Resize Half"><span class="note-fontsize-10">50%</span></button><button type="button" class="btn btn-default btn-icon" title="" data-event="resize" data-value="0.25" tabindex="-1" data-original-title="Resize Quarter"><span class="note-fontsize-10">25%</span></button></div><div class="btn-group"><button type="button" class="btn btn-default btn-icon" title="" data-event="floatMe" data-value="left" tabindex="-1" data-original-title="Float Left"><i class="icon-paragraph-left3"></i></button><button type="button" class="btn btn-default btn-icon" title="" data-event="floatMe" data-value="right" tabindex="-1" data-original-title="Float Right"><i class="icon-paragraph-right3"></i></button><button type="button" class="btn btn-default btn-icon" title="" data-event="floatMe" data-value="none" tabindex="-1" data-original-title="Float None"><i class="icon-paragraph-justify3"></i></button></div><div class="btn-group"><button type="button" class="btn btn-default btn-icon" title="" data-event="imageShape" data-value="img-rounded" tabindex="-1" data-original-title="Shape: Rounded"><i class="icon-radio-unchecked"></i></button><button type="button" class="btn btn-default btn-icon" title="" data-event="imageShape" data-value="img-circle" tabindex="-1" data-original-title="Shape: Circle"><i class="icon-radio-checked"></i></button><button type="button" class="btn btn-default btn-icon" title="" data-event="imageShape" data-value="img-thumbnail" tabindex="-1" data-original-title="Shape: Thumbnail"><i class="icon-image2"></i></button><button type="button" class="btn btn-default btn-icon" title="" data-event="imageShape" tabindex="-1" data-original-title="Shape: None"><i class="icon-cancel-circle2"></i></button></div><div class="btn-group"><button type="button" class="btn btn-default btn-icon" title="" data-event="removeMedia" data-value="none" tabindex="-1" data-original-title="Remove Image"><i class="icon-cross2"></i></button></div></div></div></div><div class="note-toolbar btn-toolbar"><div class="note-style btn-group"><button type="button" class="btn btn-default btn-icon dropdown-toggle" data-toggle="dropdown" title="" tabindex="-1" data-original-title="Style"><i class="icon-magic-wand"></i> <span class="caret"></span></button><ul class="dropdown-menu"><li><a data-event="formatBlock" href="#" data-value="p">Normal</a></li><li><a data-event="formatBlock" href="#" data-value="blockquote"><blockquote>Quote</blockquote></a></li><li><a data-event="formatBlock" href="#" data-value="pre">Code</a></li><li><a data-event="formatBlock" href="#" data-value="h1"><h1>Header 1</h1></a></li><li><a data-event="formatBlock" href="#" data-value="h2"><h2>Header 2</h2></a></li><li><a data-event="formatBlock" href="#" data-value="h3"><h3>Header 3</h3></a></li><li><a data-event="formatBlock" href="#" data-value="h4"><h4>Header 4</h4></a></li><li><a data-event="formatBlock" href="#" data-value="h5"><h5>Header 5</h5></a></li><li><a data-event="formatBlock" href="#" data-value="h6"><h6>Header 6</h6></a></li></ul></div><div class="note-font btn-group"><button type="button" class="btn btn-default btn-icon" title="" data-event="bold" tabindex="-1" data-original-title="Bold (CTRL+B)"><i class="icon-bold2"></i></button><button type="button" class="btn btn-default btn-icon" title="" data-event="italic" tabindex="-1" data-original-title="Italic (CTRL+I)"><i class="icon-italic2"></i></button><button type="button" class="btn btn-default btn-icon" title="" data-event="underline" tabindex="-1" data-original-title="Underline (CTRL+U)"><i class="icon-underline2"></i></button><button type="button" class="btn btn-default btn-icon" title="" data-event="removeFormat" tabindex="-1" data-original-title="Remove Font Style (CTRL+\)"><i class="icon-font"></i></button></div><div class="note-fontname btn-group"><button type="button" class="btn btn-default btn-icon dropdown-toggle" data-toggle="dropdown" title="" tabindex="-1" data-original-title="Font Family"><span class="note-current-fontname">Helvetica Neue</span> <span class="caret"></span></button><ul class="dropdown-menu"><li><a data-event="fontName" href="#" data-value="Arial"><i class="icon-check"></i> Arial</a></li><li><a data-event="fontName" href="#" data-value="Arial Black"><i class="icon-check"></i> Arial Black</a></li><li><a data-event="fontName" href="#" data-value="Comic Sans MS"><i class="icon-check"></i> Comic Sans MS</a></li><li><a data-event="fontName" href="#" data-value="Courier New"><i class="icon-check"></i> Courier New</a></li><li><a data-event="fontName" href="#" data-value="Impact"><i class="icon-check"></i> Impact</a></li><li><a data-event="fontName" href="#" data-value="Tahoma"><i class="icon-check"></i> Tahoma</a></li><li><a data-event="fontName" href="#" data-value="Times New Roman"><i class="icon-check"></i> Times New Roman</a></li><li><a data-event="fontName" href="#" data-value="Verdana"><i class="icon-check"></i> Verdana</a></li></ul></div><div class="note-color btn-group"><button type="button" class="btn btn-default btn-icon note-recent-color" title="" data-event="color" data-value="{&quot;backColor&quot;:&quot;yellow&quot;}" tabindex="-1" data-original-title="Recent Color"><i class="icon-text-color" style="color:black;background-color:yellow;"></i></button><button type="button" class="btn btn-default btn-icon dropdown-toggle" data-toggle="dropdown" title="" tabindex="-1" data-original-title="More Color"> <span class="caret"></span></button><ul class="dropdown-menu"><li><div class="btn-group"><div class="note-palette-title">Background Color</div><div class="note-color-reset" data-event="backColor" data-value="inherit" title="Transparent">Set transparent</div><div class="note-color-palette" data-target-event="backColor"><div class="note-color-row"><button type="button" class="note-color-btn" style="background-color:#000000;" data-event="backColor" data-value="#000000" title="" data-toggle="button" tabindex="-1" data-original-title="#000000"></button><button type="button" class="note-color-btn" style="background-color:#424242;" data-event="backColor" data-value="#424242" title="" data-toggle="button" tabindex="-1" data-original-title="#424242"></button><button type="button" class="note-color-btn" style="background-color:#636363;" data-event="backColor" data-value="#636363" title="" data-toggle="button" tabindex="-1" data-original-title="#636363"></button><button type="button" class="note-color-btn" style="background-color:#9C9C94;" data-event="backColor" data-value="#9C9C94" title="" data-toggle="button" tabindex="-1" data-original-title="#9C9C94"></button><button type="button" class="note-color-btn" style="background-color:#CEC6CE;" data-event="backColor" data-value="#CEC6CE" title="" data-toggle="button" tabindex="-1" data-original-title="#CEC6CE"></button><button type="button" class="note-color-btn" style="background-color:#EFEFEF;" data-event="backColor" data-value="#EFEFEF" title="" data-toggle="button" tabindex="-1" data-original-title="#EFEFEF"></button><button type="button" class="note-color-btn" style="background-color:#F7F7F7;" data-event="backColor" data-value="#F7F7F7" title="" data-toggle="button" tabindex="-1" data-original-title="#F7F7F7"></button><button type="button" class="note-color-btn" style="background-color:#FFFFFF;" data-event="backColor" data-value="#FFFFFF" title="" data-toggle="button" tabindex="-1" data-original-title="#FFFFFF"></button></div><div class="note-color-row"><button type="button" class="note-color-btn" style="background-color:#FF0000;" data-event="backColor" data-value="#FF0000" title="" data-toggle="button" tabindex="-1" data-original-title="#FF0000"></button><button type="button" class="note-color-btn" style="background-color:#FF9C00;" data-event="backColor" data-value="#FF9C00" title="" data-toggle="button" tabindex="-1" data-original-title="#FF9C00"></button><button type="button" class="note-color-btn" style="background-color:#FFFF00;" data-event="backColor" data-value="#FFFF00" title="" data-toggle="button" tabindex="-1" data-original-title="#FFFF00"></button><button type="button" class="note-color-btn" style="background-color:#00FF00;" data-event="backColor" data-value="#00FF00" title="" data-toggle="button" tabindex="-1" data-original-title="#00FF00"></button><button type="button" class="note-color-btn" style="background-color:#00FFFF;" data-event="backColor" data-value="#00FFFF" title="" data-toggle="button" tabindex="-1" data-original-title="#00FFFF"></button><button type="button" class="note-color-btn" style="background-color:#0000FF;" data-event="backColor" data-value="#0000FF" title="" data-toggle="button" tabindex="-1" data-original-title="#0000FF"></button><button type="button" class="note-color-btn" style="background-color:#9C00FF;" data-event="backColor" data-value="#9C00FF" title="" data-toggle="button" tabindex="-1" data-original-title="#9C00FF"></button><button type="button" class="note-color-btn" style="background-color:#FF00FF;" data-event="backColor" data-value="#FF00FF" title="" data-toggle="button" tabindex="-1" data-original-title="#FF00FF"></button></div><div class="note-color-row"><button type="button" class="note-color-btn" style="background-color:#F7C6CE;" data-event="backColor" data-value="#F7C6CE" title="" data-toggle="button" tabindex="-1" data-original-title="#F7C6CE"></button><button type="button" class="note-color-btn" style="background-color:#FFE7CE;" data-event="backColor" data-value="#FFE7CE" title="" data-toggle="button" tabindex="-1" data-original-title="#FFE7CE"></button><button type="button" class="note-color-btn" style="background-color:#FFEFC6;" data-event="backColor" data-value="#FFEFC6" title="" data-toggle="button" tabindex="-1" data-original-title="#FFEFC6"></button><button type="button" class="note-color-btn" style="background-color:#D6EFD6;" data-event="backColor" data-value="#D6EFD6" title="" data-toggle="button" tabindex="-1" data-original-title="#D6EFD6"></button><button type="button" class="note-color-btn" style="background-color:#CEDEE7;" data-event="backColor" data-value="#CEDEE7" title="" data-toggle="button" tabindex="-1" data-original-title="#CEDEE7"></button><button type="button" class="note-color-btn" style="background-color:#CEE7F7;" data-event="backColor" data-value="#CEE7F7" title="" data-toggle="button" tabindex="-1" data-original-title="#CEE7F7"></button><button type="button" class="note-color-btn" style="background-color:#D6D6E7;" data-event="backColor" data-value="#D6D6E7" title="" data-toggle="button" tabindex="-1" data-original-title="#D6D6E7"></button><button type="button" class="note-color-btn" style="background-color:#E7D6DE;" data-event="backColor" data-value="#E7D6DE" title="" data-toggle="button" tabindex="-1" data-original-title="#E7D6DE"></button></div><div class="note-color-row"><button type="button" class="note-color-btn" style="background-color:#E79C9C;" data-event="backColor" data-value="#E79C9C" title="" data-toggle="button" tabindex="-1" data-original-title="#E79C9C"></button><button type="button" class="note-color-btn" style="background-color:#FFC69C;" data-event="backColor" data-value="#FFC69C" title="" data-toggle="button" tabindex="-1" data-original-title="#FFC69C"></button><button type="button" class="note-color-btn" style="background-color:#FFE79C;" data-event="backColor" data-value="#FFE79C" title="" data-toggle="button" tabindex="-1" data-original-title="#FFE79C"></button><button type="button" class="note-color-btn" style="background-color:#B5D6A5;" data-event="backColor" data-value="#B5D6A5" title="" data-toggle="button" tabindex="-1" data-original-title="#B5D6A5"></button><button type="button" class="note-color-btn" style="background-color:#A5C6CE;" data-event="backColor" data-value="#A5C6CE" title="" data-toggle="button" tabindex="-1" data-original-title="#A5C6CE"></button><button type="button" class="note-color-btn" style="background-color:#9CC6EF;" data-event="backColor" data-value="#9CC6EF" title="" data-toggle="button" tabindex="-1" data-original-title="#9CC6EF"></button><button type="button" class="note-color-btn" style="background-color:#B5A5D6;" data-event="backColor" data-value="#B5A5D6" title="" data-toggle="button" tabindex="-1" data-original-title="#B5A5D6"></button><button type="button" class="note-color-btn" style="background-color:#D6A5BD;" data-event="backColor" data-value="#D6A5BD" title="" data-toggle="button" tabindex="-1" data-original-title="#D6A5BD"></button></div><div class="note-color-row"><button type="button" class="note-color-btn" style="background-color:#E76363;" data-event="backColor" data-value="#E76363" title="" data-toggle="button" tabindex="-1" data-original-title="#E76363"></button><button type="button" class="note-color-btn" style="background-color:#F7AD6B;" data-event="backColor" data-value="#F7AD6B" title="" data-toggle="button" tabindex="-1" data-original-title="#F7AD6B"></button><button type="button" class="note-color-btn" style="background-color:#FFD663;" data-event="backColor" data-value="#FFD663" title="" data-toggle="button" tabindex="-1" data-original-title="#FFD663"></button><button type="button" class="note-color-btn" style="background-color:#94BD7B;" data-event="backColor" data-value="#94BD7B" title="" data-toggle="button" tabindex="-1" data-original-title="#94BD7B"></button><button type="button" class="note-color-btn" style="background-color:#73A5AD;" data-event="backColor" data-value="#73A5AD" title="" data-toggle="button" tabindex="-1" data-original-title="#73A5AD"></button><button type="button" class="note-color-btn" style="background-color:#6BADDE;" data-event="backColor" data-value="#6BADDE" title="" data-toggle="button" tabindex="-1" data-original-title="#6BADDE"></button><button type="button" class="note-color-btn" style="background-color:#8C7BC6;" data-event="backColor" data-value="#8C7BC6" title="" data-toggle="button" tabindex="-1" data-original-title="#8C7BC6"></button><button type="button" class="note-color-btn" style="background-color:#C67BA5;" data-event="backColor" data-value="#C67BA5" title="" data-toggle="button" tabindex="-1" data-original-title="#C67BA5"></button></div><div class="note-color-row"><button type="button" class="note-color-btn" style="background-color:#CE0000;" data-event="backColor" data-value="#CE0000" title="" data-toggle="button" tabindex="-1" data-original-title="#CE0000"></button><button type="button" class="note-color-btn" style="background-color:#E79439;" data-event="backColor" data-value="#E79439" title="" data-toggle="button" tabindex="-1" data-original-title="#E79439"></button><button type="button" class="note-color-btn" style="background-color:#EFC631;" data-event="backColor" data-value="#EFC631" title="" data-toggle="button" tabindex="-1" data-original-title="#EFC631"></button><button type="button" class="note-color-btn" style="background-color:#6BA54A;" data-event="backColor" data-value="#6BA54A" title="" data-toggle="button" tabindex="-1" data-original-title="#6BA54A"></button><button type="button" class="note-color-btn" style="background-color:#4A7B8C;" data-event="backColor" data-value="#4A7B8C" title="" data-toggle="button" tabindex="-1" data-original-title="#4A7B8C"></button><button type="button" class="note-color-btn" style="background-color:#3984C6;" data-event="backColor" data-value="#3984C6" title="" data-toggle="button" tabindex="-1" data-original-title="#3984C6"></button><button type="button" class="note-color-btn" style="background-color:#634AA5;" data-event="backColor" data-value="#634AA5" title="" data-toggle="button" tabindex="-1" data-original-title="#634AA5"></button><button type="button" class="note-color-btn" style="background-color:#A54A7B;" data-event="backColor" data-value="#A54A7B" title="" data-toggle="button" tabindex="-1" data-original-title="#A54A7B"></button></div><div class="note-color-row"><button type="button" class="note-color-btn" style="background-color:#9C0000;" data-event="backColor" data-value="#9C0000" title="" data-toggle="button" tabindex="-1" data-original-title="#9C0000"></button><button type="button" class="note-color-btn" style="background-color:#B56308;" data-event="backColor" data-value="#B56308" title="" data-toggle="button" tabindex="-1" data-original-title="#B56308"></button><button type="button" class="note-color-btn" style="background-color:#BD9400;" data-event="backColor" data-value="#BD9400" title="" data-toggle="button" tabindex="-1" data-original-title="#BD9400"></button><button type="button" class="note-color-btn" style="background-color:#397B21;" data-event="backColor" data-value="#397B21" title="" data-toggle="button" tabindex="-1" data-original-title="#397B21"></button><button type="button" class="note-color-btn" style="background-color:#104A5A;" data-event="backColor" data-value="#104A5A" title="" data-toggle="button" tabindex="-1" data-original-title="#104A5A"></button><button type="button" class="note-color-btn" style="background-color:#085294;" data-event="backColor" data-value="#085294" title="" data-toggle="button" tabindex="-1" data-original-title="#085294"></button><button type="button" class="note-color-btn" style="background-color:#311873;" data-event="backColor" data-value="#311873" title="" data-toggle="button" tabindex="-1" data-original-title="#311873"></button><button type="button" class="note-color-btn" style="background-color:#731842;" data-event="backColor" data-value="#731842" title="" data-toggle="button" tabindex="-1" data-original-title="#731842"></button></div><div class="note-color-row"><button type="button" class="note-color-btn" style="background-color:#630000;" data-event="backColor" data-value="#630000" title="" data-toggle="button" tabindex="-1" data-original-title="#630000"></button><button type="button" class="note-color-btn" style="background-color:#7B3900;" data-event="backColor" data-value="#7B3900" title="" data-toggle="button" tabindex="-1" data-original-title="#7B3900"></button><button type="button" class="note-color-btn" style="background-color:#846300;" data-event="backColor" data-value="#846300" title="" data-toggle="button" tabindex="-1" data-original-title="#846300"></button><button type="button" class="note-color-btn" style="background-color:#295218;" data-event="backColor" data-value="#295218" title="" data-toggle="button" tabindex="-1" data-original-title="#295218"></button><button type="button" class="note-color-btn" style="background-color:#083139;" data-event="backColor" data-value="#083139" title="" data-toggle="button" tabindex="-1" data-original-title="#083139"></button><button type="button" class="note-color-btn" style="background-color:#003163;" data-event="backColor" data-value="#003163" title="" data-toggle="button" tabindex="-1" data-original-title="#003163"></button><button type="button" class="note-color-btn" style="background-color:#21104A;" data-event="backColor" data-value="#21104A" title="" data-toggle="button" tabindex="-1" data-original-title="#21104A"></button><button type="button" class="note-color-btn" style="background-color:#4A1031;" data-event="backColor" data-value="#4A1031" title="" data-toggle="button" tabindex="-1" data-original-title="#4A1031"></button></div></div></div><div class="btn-group"><div class="note-palette-title">Foreground Color</div><div class="note-color-reset" data-event="foreColor" data-value="inherit" title="Reset">Reset to default</div><div class="note-color-palette" data-target-event="foreColor"><div class="note-color-row"><button type="button" class="note-color-btn" style="background-color:#000000;" data-event="foreColor" data-value="#000000" title="" data-toggle="button" tabindex="-1" data-original-title="#000000"></button><button type="button" class="note-color-btn" style="background-color:#424242;" data-event="foreColor" data-value="#424242" title="" data-toggle="button" tabindex="-1" data-original-title="#424242"></button><button type="button" class="note-color-btn" style="background-color:#636363;" data-event="foreColor" data-value="#636363" title="" data-toggle="button" tabindex="-1" data-original-title="#636363"></button><button type="button" class="note-color-btn" style="background-color:#9C9C94;" data-event="foreColor" data-value="#9C9C94" title="" data-toggle="button" tabindex="-1" data-original-title="#9C9C94"></button><button type="button" class="note-color-btn" style="background-color:#CEC6CE;" data-event="foreColor" data-value="#CEC6CE" title="" data-toggle="button" tabindex="-1" data-original-title="#CEC6CE"></button><button type="button" class="note-color-btn" style="background-color:#EFEFEF;" data-event="foreColor" data-value="#EFEFEF" title="" data-toggle="button" tabindex="-1" data-original-title="#EFEFEF"></button><button type="button" class="note-color-btn" style="background-color:#F7F7F7;" data-event="foreColor" data-value="#F7F7F7" title="" data-toggle="button" tabindex="-1" data-original-title="#F7F7F7"></button><button type="button" class="note-color-btn" style="background-color:#FFFFFF;" data-event="foreColor" data-value="#FFFFFF" title="" data-toggle="button" tabindex="-1" data-original-title="#FFFFFF"></button></div><div class="note-color-row"><button type="button" class="note-color-btn" style="background-color:#FF0000;" data-event="foreColor" data-value="#FF0000" title="" data-toggle="button" tabindex="-1" data-original-title="#FF0000"></button><button type="button" class="note-color-btn" style="background-color:#FF9C00;" data-event="foreColor" data-value="#FF9C00" title="" data-toggle="button" tabindex="-1" data-original-title="#FF9C00"></button><button type="button" class="note-color-btn" style="background-color:#FFFF00;" data-event="foreColor" data-value="#FFFF00" title="" data-toggle="button" tabindex="-1" data-original-title="#FFFF00"></button><button type="button" class="note-color-btn" style="background-color:#00FF00;" data-event="foreColor" data-value="#00FF00" title="" data-toggle="button" tabindex="-1" data-original-title="#00FF00"></button><button type="button" class="note-color-btn" style="background-color:#00FFFF;" data-event="foreColor" data-value="#00FFFF" title="" data-toggle="button" tabindex="-1" data-original-title="#00FFFF"></button><button type="button" class="note-color-btn" style="background-color:#0000FF;" data-event="foreColor" data-value="#0000FF" title="" data-toggle="button" tabindex="-1" data-original-title="#0000FF"></button><button type="button" class="note-color-btn" style="background-color:#9C00FF;" data-event="foreColor" data-value="#9C00FF" title="" data-toggle="button" tabindex="-1" data-original-title="#9C00FF"></button><button type="button" class="note-color-btn" style="background-color:#FF00FF;" data-event="foreColor" data-value="#FF00FF" title="" data-toggle="button" tabindex="-1" data-original-title="#FF00FF"></button></div><div class="note-color-row"><button type="button" class="note-color-btn" style="background-color:#F7C6CE;" data-event="foreColor" data-value="#F7C6CE" title="" data-toggle="button" tabindex="-1" data-original-title="#F7C6CE"></button><button type="button" class="note-color-btn" style="background-color:#FFE7CE;" data-event="foreColor" data-value="#FFE7CE" title="" data-toggle="button" tabindex="-1" data-original-title="#FFE7CE"></button><button type="button" class="note-color-btn" style="background-color:#FFEFC6;" data-event="foreColor" data-value="#FFEFC6" title="" data-toggle="button" tabindex="-1" data-original-title="#FFEFC6"></button><button type="button" class="note-color-btn" style="background-color:#D6EFD6;" data-event="foreColor" data-value="#D6EFD6" title="" data-toggle="button" tabindex="-1" data-original-title="#D6EFD6"></button><button type="button" class="note-color-btn" style="background-color:#CEDEE7;" data-event="foreColor" data-value="#CEDEE7" title="" data-toggle="button" tabindex="-1" data-original-title="#CEDEE7"></button><button type="button" class="note-color-btn" style="background-color:#CEE7F7;" data-event="foreColor" data-value="#CEE7F7" title="" data-toggle="button" tabindex="-1" data-original-title="#CEE7F7"></button><button type="button" class="note-color-btn" style="background-color:#D6D6E7;" data-event="foreColor" data-value="#D6D6E7" title="" data-toggle="button" tabindex="-1" data-original-title="#D6D6E7"></button><button type="button" class="note-color-btn" style="background-color:#E7D6DE;" data-event="foreColor" data-value="#E7D6DE" title="" data-toggle="button" tabindex="-1" data-original-title="#E7D6DE"></button></div><div class="note-color-row"><button type="button" class="note-color-btn" style="background-color:#E79C9C;" data-event="foreColor" data-value="#E79C9C" title="" data-toggle="button" tabindex="-1" data-original-title="#E79C9C"></button><button type="button" class="note-color-btn" style="background-color:#FFC69C;" data-event="foreColor" data-value="#FFC69C" title="" data-toggle="button" tabindex="-1" data-original-title="#FFC69C"></button><button type="button" class="note-color-btn" style="background-color:#FFE79C;" data-event="foreColor" data-value="#FFE79C" title="" data-toggle="button" tabindex="-1" data-original-title="#FFE79C"></button><button type="button" class="note-color-btn" style="background-color:#B5D6A5;" data-event="foreColor" data-value="#B5D6A5" title="" data-toggle="button" tabindex="-1" data-original-title="#B5D6A5"></button><button type="button" class="note-color-btn" style="background-color:#A5C6CE;" data-event="foreColor" data-value="#A5C6CE" title="" data-toggle="button" tabindex="-1" data-original-title="#A5C6CE"></button><button type="button" class="note-color-btn" style="background-color:#9CC6EF;" data-event="foreColor" data-value="#9CC6EF" title="" data-toggle="button" tabindex="-1" data-original-title="#9CC6EF"></button><button type="button" class="note-color-btn" style="background-color:#B5A5D6;" data-event="foreColor" data-value="#B5A5D6" title="" data-toggle="button" tabindex="-1" data-original-title="#B5A5D6"></button><button type="button" class="note-color-btn" style="background-color:#D6A5BD;" data-event="foreColor" data-value="#D6A5BD" title="" data-toggle="button" tabindex="-1" data-original-title="#D6A5BD"></button></div><div class="note-color-row"><button type="button" class="note-color-btn" style="background-color:#E76363;" data-event="foreColor" data-value="#E76363" title="" data-toggle="button" tabindex="-1" data-original-title="#E76363"></button><button type="button" class="note-color-btn" style="background-color:#F7AD6B;" data-event="foreColor" data-value="#F7AD6B" title="" data-toggle="button" tabindex="-1" data-original-title="#F7AD6B"></button><button type="button" class="note-color-btn" style="background-color:#FFD663;" data-event="foreColor" data-value="#FFD663" title="" data-toggle="button" tabindex="-1" data-original-title="#FFD663"></button><button type="button" class="note-color-btn" style="background-color:#94BD7B;" data-event="foreColor" data-value="#94BD7B" title="" data-toggle="button" tabindex="-1" data-original-title="#94BD7B"></button><button type="button" class="note-color-btn" style="background-color:#73A5AD;" data-event="foreColor" data-value="#73A5AD" title="" data-toggle="button" tabindex="-1" data-original-title="#73A5AD"></button><button type="button" class="note-color-btn" style="background-color:#6BADDE;" data-event="foreColor" data-value="#6BADDE" title="" data-toggle="button" tabindex="-1" data-original-title="#6BADDE"></button><button type="button" class="note-color-btn" style="background-color:#8C7BC6;" data-event="foreColor" data-value="#8C7BC6" title="" data-toggle="button" tabindex="-1" data-original-title="#8C7BC6"></button><button type="button" class="note-color-btn" style="background-color:#C67BA5;" data-event="foreColor" data-value="#C67BA5" title="" data-toggle="button" tabindex="-1" data-original-title="#C67BA5"></button></div><div class="note-color-row"><button type="button" class="note-color-btn" style="background-color:#CE0000;" data-event="foreColor" data-value="#CE0000" title="" data-toggle="button" tabindex="-1" data-original-title="#CE0000"></button><button type="button" class="note-color-btn" style="background-color:#E79439;" data-event="foreColor" data-value="#E79439" title="" data-toggle="button" tabindex="-1" data-original-title="#E79439"></button><button type="button" class="note-color-btn" style="background-color:#EFC631;" data-event="foreColor" data-value="#EFC631" title="" data-toggle="button" tabindex="-1" data-original-title="#EFC631"></button><button type="button" class="note-color-btn" style="background-color:#6BA54A;" data-event="foreColor" data-value="#6BA54A" title="" data-toggle="button" tabindex="-1" data-original-title="#6BA54A"></button><button type="button" class="note-color-btn" style="background-color:#4A7B8C;" data-event="foreColor" data-value="#4A7B8C" title="" data-toggle="button" tabindex="-1" data-original-title="#4A7B8C"></button><button type="button" class="note-color-btn" style="background-color:#3984C6;" data-event="foreColor" data-value="#3984C6" title="" data-toggle="button" tabindex="-1" data-original-title="#3984C6"></button><button type="button" class="note-color-btn" style="background-color:#634AA5;" data-event="foreColor" data-value="#634AA5" title="" data-toggle="button" tabindex="-1" data-original-title="#634AA5"></button><button type="button" class="note-color-btn" style="background-color:#A54A7B;" data-event="foreColor" data-value="#A54A7B" title="" data-toggle="button" tabindex="-1" data-original-title="#A54A7B"></button></div><div class="note-color-row"><button type="button" class="note-color-btn" style="background-color:#9C0000;" data-event="foreColor" data-value="#9C0000" title="" data-toggle="button" tabindex="-1" data-original-title="#9C0000"></button><button type="button" class="note-color-btn" style="background-color:#B56308;" data-event="foreColor" data-value="#B56308" title="" data-toggle="button" tabindex="-1" data-original-title="#B56308"></button><button type="button" class="note-color-btn" style="background-color:#BD9400;" data-event="foreColor" data-value="#BD9400" title="" data-toggle="button" tabindex="-1" data-original-title="#BD9400"></button><button type="button" class="note-color-btn" style="background-color:#397B21;" data-event="foreColor" data-value="#397B21" title="" data-toggle="button" tabindex="-1" data-original-title="#397B21"></button><button type="button" class="note-color-btn" style="background-color:#104A5A;" data-event="foreColor" data-value="#104A5A" title="" data-toggle="button" tabindex="-1" data-original-title="#104A5A"></button><button type="button" class="note-color-btn" style="background-color:#085294;" data-event="foreColor" data-value="#085294" title="" data-toggle="button" tabindex="-1" data-original-title="#085294"></button><button type="button" class="note-color-btn" style="background-color:#311873;" data-event="foreColor" data-value="#311873" title="" data-toggle="button" tabindex="-1" data-original-title="#311873"></button><button type="button" class="note-color-btn" style="background-color:#731842;" data-event="foreColor" data-value="#731842" title="" data-toggle="button" tabindex="-1" data-original-title="#731842"></button></div><div class="note-color-row"><button type="button" class="note-color-btn" style="background-color:#630000;" data-event="foreColor" data-value="#630000" title="" data-toggle="button" tabindex="-1" data-original-title="#630000"></button><button type="button" class="note-color-btn" style="background-color:#7B3900;" data-event="foreColor" data-value="#7B3900" title="" data-toggle="button" tabindex="-1" data-original-title="#7B3900"></button><button type="button" class="note-color-btn" style="background-color:#846300;" data-event="foreColor" data-value="#846300" title="" data-toggle="button" tabindex="-1" data-original-title="#846300"></button><button type="button" class="note-color-btn" style="background-color:#295218;" data-event="foreColor" data-value="#295218" title="" data-toggle="button" tabindex="-1" data-original-title="#295218"></button><button type="button" class="note-color-btn" style="background-color:#083139;" data-event="foreColor" data-value="#083139" title="" data-toggle="button" tabindex="-1" data-original-title="#083139"></button><button type="button" class="note-color-btn" style="background-color:#003163;" data-event="foreColor" data-value="#003163" title="" data-toggle="button" tabindex="-1" data-original-title="#003163"></button><button type="button" class="note-color-btn" style="background-color:#21104A;" data-event="foreColor" data-value="#21104A" title="" data-toggle="button" tabindex="-1" data-original-title="#21104A"></button><button type="button" class="note-color-btn" style="background-color:#4A1031;" data-event="foreColor" data-value="#4A1031" title="" data-toggle="button" tabindex="-1" data-original-title="#4A1031"></button></div></div></div></li></ul></div><div class="note-para btn-group"><button type="button" class="btn btn-default btn-icon" title="" data-event="insertUnorderedList" tabindex="-1" data-original-title="Unordered list (CTRL+SHIFT+NUM7)"><i class="icon-list"></i></button><button type="button" class="btn btn-default btn-icon" title="" data-event="insertOrderedList" tabindex="-1" data-original-title="Ordered list (CTRL+SHIFT+NUM8)"><i class="icon-list-numbered"></i></button><button type="button" class="btn btn-default btn-icon dropdown-toggle" data-toggle="dropdown" title="" tabindex="-1" data-original-title="Paragraph"><i class="icon-paragraph-left3"></i> <span class="caret"></span></button><div class="dropdown-menu"><div class="note-align btn-group"><button type="button" class="btn btn-default btn-icon" title="" data-event="justifyLeft" tabindex="-1" data-original-title="Align left (CTRL+SHIFT+L)"><i class="icon-paragraph-left3"></i></button><button type="button" class="btn btn-default btn-icon" title="" data-event="justifyCenter" tabindex="-1" data-original-title="Align center (CTRL+SHIFT+E)"><i class="icon-paragraph-center3"></i></button><button type="button" class="btn btn-default btn-icon" title="" data-event="justifyRight" tabindex="-1" data-original-title="Align right (CTRL+SHIFT+R)"><i class="icon-paragraph-right3"></i></button><button type="button" class="btn btn-default btn-icon" title="" data-event="justifyFull" tabindex="-1" data-original-title="Justify full (CTRL+SHIFT+J)"><i class="icon-paragraph-justify3"></i></button></div><div class="note-list btn-group"><button type="button" class="btn btn-default btn-icon" title="" data-event="indent" tabindex="-1" data-original-title="Indent (CTRL+])"><i class="icon-indent-increase2"></i></button><button type="button" class="btn btn-default btn-icon" title="" data-event="outdent" tabindex="-1" data-original-title="Outdent (CTRL+[)"><i class="icon-indent-decrease2"></i></button></div></div></div><div class="note-height btn-group"><button type="button" class="btn btn-default btn-icon dropdown-toggle" data-toggle="dropdown" title="" tabindex="-1" data-original-title="Line Height"><i class="icon-text-height"></i> <span class="caret"></span></button><ul class="dropdown-menu"><li><a data-event="lineHeight" href="#" data-value="1"><i class="icon-check"></i> 1.0</a></li><li><a data-event="lineHeight" href="#" data-value="1.2"><i class="icon-check"></i> 1.2</a></li><li><a data-event="lineHeight" href="#" data-value="1.4"><i class="icon-check"></i> 1.4</a></li><li><a data-event="lineHeight" href="#" data-value="1.5"><i class="icon-check"></i> 1.5</a></li><li><a data-event="lineHeight" href="#" data-value="1.6"><i class="icon-check"></i> 1.6</a></li><li><a data-event="lineHeight" href="#" data-value="1.8"><i class="icon-check"></i> 1.8</a></li><li><a data-event="lineHeight" href="#" data-value="2"><i class="icon-check"></i> 2.0</a></li><li><a data-event="lineHeight" href="#" data-value="3"><i class="icon-check"></i> 3.0</a></li></ul></div><div class="note-table btn-group"><button type="button" class="btn btn-default btn-icon dropdown-toggle" data-toggle="dropdown" title="" tabindex="-1" data-original-title="Table"><i class="icon-table2"></i> <span class="caret"></span></button><ul class="note-table dropdown-menu"><div class="note-dimension-picker"><div class="note-dimension-picker-mousecatcher" data-event="insertTable" data-value="1x1" style="width: 10em; height: 10em;"></div><div class="note-dimension-picker-highlighted"></div><div class="note-dimension-picker-unhighlighted"></div></div><div class="note-dimension-display"> 1 x 1 </div></ul></div><div class="note-insert btn-group"><button type="button" class="btn btn-default btn-icon" title="" data-event="showLinkDialog" data-hide="true" tabindex="-1" data-original-title="Link (CTRL+K)"><i class="icon-link"></i></button><button type="button" class="btn btn-default btn-icon" title="" data-event="showImageDialog" data-hide="true" tabindex="-1" data-original-title="Picture"><i class="icon-image2"></i></button><button type="button" class="btn btn-default btn-icon" title="" data-event="insertHorizontalRule" tabindex="-1" data-original-title="Insert Horizontal Rule (CTRL+ENTER)"><i class="icon-minus2"></i></button></div><div class="note-view btn-group"><button type="button" class="btn btn-default btn-icon" title="" data-event="fullscreen" tabindex="-1" data-original-title="Full Screen"><i class="icon-screen-full"></i></button><button type="button" class="btn btn-default btn-icon" title="" data-event="codeview" tabindex="-1" data-original-title="Code View"><i class="icon-embed"></i></button></div><div class="note-help btn-group"><button type="button" class="btn btn-default btn-icon" title="" data-event="showHelpDialog" data-hide="true" tabindex="-1" data-original-title="Help"><i class="icon-help"></i></button></div></div><textarea class="note-codable" id="note-codable"></textarea><div class="note-editable" contenteditable="true">



                                </div></div>

                    </div>
                    </div>
<br/ ><br/ >
                    <div class="form-group">
                        <label class="col-lg-2 control-label text-semibold">Foto</label>
                        <div class="col-lg-3 input-group">
                            <img src="" width="100px" height="100px" id="itmImgDisplay">
                            <br>
                            <input type="file" class="file-input" data-show-preview="false" data-show-upload="false" id="itmImgEdit" placeholder="Image File...">
                        </div>
                    </div>
                   <div class="form-group">
                        <label class="col-lg-2 control-label text-semibold">Status</label>
                        <div class="col-lg-5">
                           <!-- <div class="input-group">
                                <span class="input-group-addon"><i class=" icon-file-check"></i></span>-->
                                <select class="select" id="ctStatus">
                                    <option>--Pilihan--</option>
                                    <option>Y</option>
                                    <option>N</option>
                                </select>
                           <!-- </div>-->
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="panel panel-flat border-top-primary">
            <div class="panel-heading">
                <h5 class="panel-title text-semibold" style="color:rgb(51, 150, 213);">Data Berita</h5>
            </div>
            <div class="panel-body">
                <table class="table datatable-basic">
                    <thead>
                    <tr>
                        <!-- <th style="text-align:center" width="10%">ID#</th> -->
                        <th style="text-align:center" >&nbsp;</th>
                        <th>No</th>
                        <th>Kategori</th>
                        <th>Judul</th>
                        <th>Isi</th>
                        <th>Tanggal</th>
                        <th>Image</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if(isset($ctlNews) && count($ctlContacts) > 0) {
                    foreach ($ctlContacts as $aData) {
                    ?>
                    <tr>
                        <td style="text-align:center">
                            <a href="javascript:editData('<?php echo $aData->{"C_ID"}; ?>')"><button type="button" class="btn btn-primary btn-icon btn-xs"><i class="icon-pencil7"></i></button></a>
                            <a href="javascript:deleteData('<?php echo $aData->{"C_ID"}; ?>')"><button type="button" class="btn btn-danger btn-icon btn-xs"><i class="icon-cross2"></i></button></a>
                        <!-- <div class="btn-group">
                    <button type="button" class="btn btn-primary btn-icon dropdown-toggle" data-toggle="dropdown">
                      <i class="icon-menu7"></i> &nbsp;<span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-right">
                      <li><a href="javascript:editData('<?php echo $aData->{"C_ID"}; ?>')"><i class="fa fa-edit"></i> Edit</a></li>
                      <li><a href="javascript:deleteData('<?php echo $aData->{"C_ID"}; ?>')"><i class="fa fa-remove"></i> Delete</a></li>
                    </ul>
                  </div> -->
                        </td>
                        <td>
                            <div id="divNama_<?php echo $aData->{"C_ID"}; ?>_Label" style="display:block"><span class="clickable" data-id="<?php echo $aData->{"C_ID"}; ?>"><?php echo $aData->{"C_NAME"}; ?></span></div>
                            <div id="divNama_<?php echo $aData->{"C_ID"}; ?>_Edit" style="display:none"><input type="text" class="form-control editable-form" id="kNama_<?php echo $aData->{"C_ID"} ?>" name="kNama_<?php echo $aData->{"C_ID"}; ?>" placeholder="Contact name..." value="<?php echo $aData->{"C_NAME"}; ?>" data-id="<?php echo $aData->{"C_ID"}; ?>"></div>
                        </td>
                        <td>
                            <div id="divPhone_<?php echo $aData->{"C_ID"}; ?>_Label" style="display:block"><span class="clickable" data-id="<?php echo $aData->{"C_ID"}; ?>"><?php echo $aData->{"C_PHONE"}; ?></span></div>
                            <div id="divPhone_<?php echo $aData->{"C_ID"}; ?>_Edit" style="display:none"><input type="text" class="form-control editable-form" id="kPonsel_<?php echo $aData->{"C_ID"}; ?>" name="kPonsel_<?php echo $aData->{"C_ID"}; ?>" placeholder="Contact phone..." value="<?php echo $aData->{"C_PHONE"}; ?>" data-id="<?php echo $aData->{"C_ID"}; ?>"></div>
                        </td>
                        <td>
                            <div id="divEmail_<?php echo $aData->{"C_ID"}; ?>_Label" style="display:block"><span class="clickable" data-id="<?php echo $aData->{"C_ID"}; ?>"><?php echo $aData->{"C_EMAIL"}; ?></span></div>
                            <div id="divEmail_<?php echo $aData->{"C_ID"}; ?>_Edit" style="display:none"><input type="text" class="form-control editable-form" id="kEmail_<?php echo $aData->{"C_ID"}; ?>" name="kEmail_<?php echo $aData->{"C_ID"}; ?>" placeholder="Contact email..." value="<?php echo $aData->{"C_EMAIL"}; ?>" data-id="<?php echo $aData->{"C_ID"}; ?>"></div>
                        </td>
                        <td>
                            <div id="divTipe_<?php echo $aData->{"C_ID"}; ?>_Label" style="display:block"><span class="clickable" data-id="<?php echo $aData->{"C_ID"}; ?>"><?php echo getReferenceInfo("CONTACT_TYPE",$aData->{"C_TYPE"}); ?></span></div>
                            <div id="divTipe_<?php echo $aData->{"C_ID"}; ?>_Edit" style="display:none">
                                <select class="select" id="kTipe_<?php echo $aData->{"C_ID"}; ?>">
                                    <?php
                                    if(isset($ctlRefCateg) && count($ctlRefCateg) > 0) {
                                    foreach ($ctlRefCateg as $aRef) {
                                    ?>
                                    <option value="<?php echo $aRef->{"CATEG_ID"}; ?>" <?php echo ($aRef->{"CATEG_NAME"} == $aData->{"NEWS_CATEG_ID"} ? "selected" : ""); ?>><?php echo $aRef->{"CATEG_NAME"}; ?></option>
                                    <?php
                                    }
                                    }
                                    ?>
                                </select>
                            </div>
                        </td>
                        <td>
                            <div id="divAddress_<?php echo $aData->{"C_ID"}; ?>_Label" style="display:block"><span class="clickable" data-id="<?php echo $aData->{"C_ID"}; ?>"><?php echo $aData->{"C_ADDRESS"}; ?></span></div>
                            <div id="divAddress_<?php echo $aData->{"C_ID"}; ?>_Edit" style="display:none"><input type="text" class="form-control editable-form" id="kAddress_<?php echo $aData->{"C_ID"}; ?>" name="kAddress_<?php echo $aData->{"C_ID"}; ?>" placeholder="Contact address..." value="<?php echo $aData->{"C_ADDRESS"}; ?>" data-id="<?php echo $aData->{"C_ID"}; ?>"></div>
                        </td>
                        <td>
                            <div id="divCompanyName_<?php echo $aData->{"C_ID"}; ?>_Label" style="display:block"><span class="clickable" data-id="<?php echo $aData->{"C_ID"}; ?>"><?php echo $aData->{"C_COMPANY_NAME"}; ?></span></div>
                            <div id="divCompanyName_<?php echo $aData->{"C_ID"}; ?>_Edit" style="display:none"><input type="text" class="form-control editable-form" id="kCompanyName_<?php echo $aData->{"C_ID"}; ?>" name="kCompanyName_<?php echo $aData->{"C_ID"}; ?>" placeholder="Company name..." value="<?php echo $aData->{"C_COMPANY_NAME"}; ?>" data-id="<?php echo $aData->{"C_ID"}; ?>"></div>
                        </td>
                        <td>
                            <div id="divCompanyAddress_<?php echo $aData->{"C_ID"}; ?>_Label" style="display:block"><span class="clickable" data-id="<?php echo $aData->{"C_ID"}; ?>"><?php echo $aData->{"C_COMPANY_ADDRESS"}; ?></span></div>
                            <div id="divCompanyAddress_<?php echo $aData->{"C_ID"}; ?>_Edit" style="display:none"><input type="text" class="form-control editable-form" id="kCompanyAddress_<?php echo $aData->{"C_ID"}; ?>" name="kCompanyAddress_<?php echo $aData->{"C_ID"}; ?>" placeholder="Company address..." value="<?php echo $aData->{"C_COMPANY_ADDRESS"}; ?>" data-id="<?php echo $aData->{"C_ID"}; ?>"></div>
                        </td>
                        <td>
                            <div id="divCompanyEmail_<?php echo $aData->{"C_ID"}; ?>_Label" style="display:block"><span class="clickable" data-id="<?php echo $aData->{"C_ID"}; ?>"><?php echo $aData->{"C_COMPANY_EMAIL"}; ?></span></div>
                            <div id="divCompanyEmail_<?php echo $aData->{"C_ID"}; ?>_Edit" style="display:none"><input type="text" class="form-control editable-form" id="kCompanyEmail_<?php echo $aData->{"C_ID"}; ?>" name="kCompanyEmail_<?php echo $aData->{"C_ID"}; ?>" placeholder="Company email..." value="<?php echo $aData->{"C_COMPANY_EMAIL"}; ?>" data-id="<?php echo $aData->{"C_ID"}; ?>"></div>
                        </td>
                        <td>
                            <div id="divCompanyPhone_<?php echo $aData->{"C_ID"}; ?>_Label" style="display:block"><span class="clickable" data-id="<?php echo $aData->{"C_ID"}; ?>"><?php echo $aData->{"C_COMPANY_PHONE"}; ?></span></div>
                            <div id="divCompanyPhone_<?php echo $aData->{"C_ID"}; ?>_Edit" style="display:none"><input type="text" class="form-control editable-form" id="kCompanyPhone_<?php echo $aData->{"C_ID"}; ?>" name="kCompanyPhone_<?php echo $aData->{"C_ID"}; ?>" placeholder="Company phone..." value="<?php echo $aData->{"C_COMPANY_PHONE"}; ?>" data-id="<?php echo $aData->{"C_ID"}; ?>"></div>
                        </td>
                        <td>
                            <div id="divCompanyCity_<?php echo $aData->{"C_ID"}; ?>_Label" style="display:block"><span class="clickable" data-id="<?php echo $aData->{"C_ID"}; ?>"><?php echo $aData->{"C_COMPANY_CITY"}; ?></span></div>
                            <div id="divCompanyCity_<?php echo $aData->{"C_ID"}; ?>_Edit" style="display:none"><input type="text" class="form-control editable-form" id="kCompanyCity_<?php echo $aData->{"C_ID"}; ?>" name="kCompanyCity_<?php echo $aData->{"C_ID"}; ?>" placeholder="Company city..." value="<?php echo $aData->{"C_COMPANY_CITY"}; ?>" data-id="<?php echo $aData->{"C_ID"}; ?>"></div>
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
                disableEdit('divPhone', slug);
                disableEdit('divEmail', slug);
                disableEdit('divTipe', slug);
                disableEdit('divAddress', slug);
                disableEdit('divCompanyName', slug);
                disableEdit('divCompanyAddress', slug);
                disableEdit('divCompanyEmail', slug);
                disableEdit('divCompanyPhone', slug);
                disableEdit('divCompanyCity', slug);
            }
            if(e.keyCode == 13) {
                updateData(slug);
                disableEdit('divNama', slug);
                disableEdit('divPhone', slug);
                disableEdit('divEmail', slug);
                disableEdit('divTipe', slug);
                disableEdit('divAddress', slug);
                disableEdit('divCompanyName', slug);
                disableEdit('divCompanyAddress', slug);
                disableEdit('divCompanyEmail', slug);
                disableEdit('divCompanyPhone', slug);
                disableEdit('divCompanyCity', slug);
            }
        });

        var saveData = function() {
            var ctType = $("#ctTypeNew").val();
            var ctName = $("#ctNameNew").val();
            var ctPhone = $("#ctPhoneNew").val();
            var ctEmail = $("#ctEmailNew").val();
            var ctAddress = $("#ctAddressNew").val();
            var companyName = $("#companyNameNew").val();
            var companyAddress = $("#companyAddressNew").val();
            var companyEmail = $("#companyEmailNew").val();
            var companyPhone = $("#companyPhoneNew").val();
            var companyCity = $("#companyCityNew").val();

            if(ctType != "" && ctName != "") {
                createOverlay("Proses...");
                $.ajax({
                    type  : "POST",
                    url   : "<?php echo asset_url(); ?>/contacts",
                    // data  : "ctType=" + encodeURI(ctType) + "&ctName=" + encodeURI(ctName) + "&ctEmail=" + encodeURI(ctEmail) + "&ctPhone=" + encodeURI(ctPhone),
                    data   : {
                        ctType: ctType,
                        ctName: ctName,
                        ctPhone: ctPhone,
                        ctEmail: ctEmail,
                        ctAddress: ctAddress,
                        companyName: companyName,
                        companyAddress: companyAddress,
                        companyEmail: companyEmail,
                        companyPhone: companyPhone,
                        companyCity: companyCity
                    },
                    success : function(result) {
                        gOverlay.hide();
                        var data = JSON.parse(result);

                        if(data["STATUS"] == "SUCCESS") {
                            toastr.success(data["MESSAGE"]);
                            setTimeout(function(){
                                window.location = "<?php echo asset_url(); ?>/contacts";
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
            enableEdit('divPhone', slug);
            enableEdit('divEmail', slug);
            enableEdit('divTipe', slug);
            enableEdit('divAddress', slug);
            enableEdit('divCompanyName', slug);
            enableEdit('divCompanyAddress', slug);
            enableEdit('divCompanyEmail', slug);
            enableEdit('divCompanyPhone', slug);
            enableEdit('divCompanyCity', slug);
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
                        type  : "DELETE",
                        url   : "<?php echo asset_url(); ?>/contacts",
                        data  : "id=" + slug,
                        success : function(result) {
                            gOverlay.hide();
                            var data = JSON.parse(result);

                            if(data["STATUS"] == "SUCCESS") {
                                toastr.success(data["MESSAGE"]);
                                setTimeout(function(){
                                    window.location = "<?php echo asset_url(); ?>/contacts";
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
                                    window.location = "<?php echo asset_url(); ?>/contacts";
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
            var ctPhone = $("#kPonsel_" + slug).val();
            var ctEmail = $("#kEmail_" + slug).val();
            var ctType = $("#kTipe_" + slug).val();
            var ctAddress = $("#kAddress_" + slug).val();
            var companyName = $("#kCompanyName_" + slug).val();
            var companyAddress = $("#kCompanyAddress_" + slug).val();
            var companyEmail = $("#kCompanyEmail_" + slug).val();
            var companyPhone = $("#kCompanyPhone_" + slug).val();
            var companyCity = $("#kCompanyCity_" + slug).val();

            $("#divNama_" + slug + "_Label").html(ctName);
            $("#divPhone_" + slug + "_Label").html(ctPhone);
            $("#divEmail_" + slug + "_Label").html(ctEmail);
            $("#divTipe_" + slug + "_Label").html(ctType);
            $("#divAddress_" + slug + "_Label").html(ctAddress);
            $("#divCompanyName_" + slug + "_Label").html(companyName);
            $("#divCompanyAddress_" + slug + "_Label").html(companyAddress);
            $("#divCompanyEmail_" + slug + "_Label").html(companyEmail);
            $("#divCompanyPhone_" + slug + "_Label").html(companyPhone);
            $("#divCompanyCity_" + slug + "_Label").html(companyCity);

            createOverlay("Proses...");
            $.ajax({
                type  : "PUT",
                url   : "<?php echo asset_url(); ?>/contacts",
                data  : {
                    ctId : slug,
                    ctName: ctName,
                    ctPhone: ctPhone,
                    ctEmail: ctEmail,
                    ctType: ctType,
                    ctAddress: ctAddress,
                    companyName: companyName,
                    companyAddress: companyAddress,
                    companyEmail: companyEmail,
                    companyPhone: companyPhone,
                    companyCity: companyCity
                },
                success : function(result) {
                    gOverlay.hide();
                    var data = JSON.parse(result);

                    if(data["STATUS"] == "SUCCESS") {
                        toastr.success(data["MESSAGE"]);
                        setTimeout(function(){
                            window.location = "<?php echo asset_url(); ?>/contacts";
                        }, 500);
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
                        //  closeOnConfirm: false,
                        //  html: true
                        //},
                        //function(){
                        setTimeout(function(){
                            window.location = "<?php echo asset_url(); ?>/contacts";
                        }, 500);
                        //});
                    }
                    //window.location = "<?php echo asset_url(); ?>/contacts";
                },
                error : function(error) {
                    gOverlay.hide();
                    alert("Network/server error\r\n" + error);
                }
            });
        }
    </script>
@endsection