<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Yeni Hizmet Ekle
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form action="<?php echo base_url("services/save"); ?>" method="post" enctype="multipart/form-data">
                    <div class="col-md-6 form-group"  style="margin-left: -9px;">
                        <label>Başlık</label>
                        <input class="form-control" placeholder="Başlık" name="title">
                        <?php if(isset($form_error)){ ?>
                            <small class="pull-right input-form-error"> <?php echo form_error("title"); ?></small>
                        <?php } ?>
                    </div>
                    <div class="col-md-3 form-group">
                        <label>İkon</label>
                        <input class="form-control" placeholder="İkon" name="ikon">
                        <?php if(isset($form_error)){ ?>
                            <small class="pull-right input-form-error"> <?php echo form_error("ikon"); ?></small>
                        <?php } ?>
                    </div>
                    <div class="col-md-3 form-group">
                        <label>İkon Renk</label>
                        <input class="form-control" placeholder="İkon Renk" name="renk">
                        <?php if(isset($form_error)){ ?>
                            <small class="pull-right input-form-error"> <?php echo form_error("renk"); ?></small>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label>Açıklama</label>
                        <textarea name="description" class="m-0" data-plugin="summernote" data-options="{height: 250}"></textarea>
                    </div>
                    <div class="form-group image_upload_container">
                        <label>Başlık Resmi</label>
                        <input type="file" name="img_url" class="form-control">
                    </div>


                    <button type="submit" class="btn btn-primary btn-md btn-outline">Kaydet</button>
                    <a href="<?php echo base_url("services"); ?>" class="btn btn-md btn-danger btn-outline">İptal</a>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>