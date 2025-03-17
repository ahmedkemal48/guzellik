<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Yeni Paket Ekle
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form action="<?php echo base_url("brands/save"); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Başlık</label>
                        <input class="form-control" placeholder="Başlık" name="title">
                        <?php if(isset($form_error)){ ?>
                            <small class="pull-right input-form-error"> <?php echo form_error("title"); ?></small>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label>Zaman Dilimi</label>
                        <input class="form-control" placeholder="Zaman Dilimi" name="zaman">
                        <?php if(isset($form_error)){ ?>
                            <small class="pull-right input-form-error"> <?php echo form_error("zaman"); ?></small>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label>Paket Fiyatı</label>
                        <input class="form-control" placeholder="Paket Fiyatı" name="fiyat">
                        <?php if(isset($form_error)){ ?>
                            <small class="pull-right input-form-error"> <?php echo form_error("fiyat"); ?></small>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label>Buton Yazısı</label>
                        <input class="form-control" placeholder="Buton Yazısı" name="butonismi">
                        <?php if(isset($form_error)){ ?>
                            <small class="pull-right input-form-error"> <?php echo form_error("butonismi"); ?></small>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label>Buton Linki</label>
                        <input class="form-control" placeholder="Buton Linki" name="butonlinki">
                        <?php if(isset($form_error)){ ?>
                            <small class="pull-right input-form-error"> <?php echo form_error("butonlinki"); ?></small>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label>Açıklama</label>
                        <textarea name="aciklama" class="m-0" data-plugin="summernote" data-options="{height: 250}"></textarea>
                    </div>

                    <div class="form-group image_upload_container">
                        <label>Görsel Seçiniz</label>
                        <input type="file" name="img_url" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-primary btn-md btn-outline">Kaydet</button>
                    <a href="<?php echo base_url("brands"); ?>" class="btn btn-md btn-danger btn-outline">İptal</a>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>