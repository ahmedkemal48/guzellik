<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Yeni Personel Ekle
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form action="<?php echo base_url("teams/save"); ?>" method="post" enctype="multipart/form-data">

                    <div class="col-md-12">
                        <div class="col-md-6 form-group"  style="margin-left: -20px;">
                            <label>İsim Soyisim</label>
                            <input class="form-control" placeholder="Personel ismi ve soyisimi giriniz..." name="ad_soyad">
                            <?php if(isset($form_error)){ ?>
                                <small class="pull-right input-form-error"> <?php echo form_error("ad_soyad"); ?></small>
                            <?php } ?>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Personelin Pozisyonu</label>
                            <input class="form-control" placeholder="Personelin Pozisyonu" name="pozisyon">
                            <?php if(isset($form_error)){ ?>
                                <small class="pull-right input-form-error"> <?php echo form_error("pozisyon"); ?></small>
                            <?php } ?>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="col-md-4 form-group"  style="margin-left: -20px;">
                            <label>Facebook</label>
                            <input class="form-control" placeholder="Personelin Facebook Adresini Giriniz..." name="facebook">
                            <?php if(isset($form_error)){ ?>
                                <small class="pull-right input-form-error"> <?php echo form_error("facebook"); ?></small>
                            <?php } ?>
                        </div>
                        <div class="col-md-4 form-group">
                            <label>Youtube</label>
                            <input class="form-control" placeholder="Personelin Youtube Adresini Giriniz..." name="youtube">
                            <?php if(isset($form_error)){ ?>
                                <small class="pull-right input-form-error"> <?php echo form_error("youtube"); ?></small>
                            <?php } ?>
                        </div>

                        <div class="col-md-4 form-group">
                            <label>Pinterest</label>
                            <input class="form-control" placeholder="Personelin Pinterest Adresini Giriniz..." name="pinterest">
                            <?php if(isset($form_error)){ ?>
                                <small class="pull-right input-form-error"> <?php echo form_error("pinterest"); ?></small>
                            <?php } ?>
                        </div>

                    </div>

                    <div class="col-md-12">
                        <div class="col-md-4 form-group"  style="margin-left: -20px;">
                            <label>Twitter</label>
                            <input class="form-control" placeholder="Personelin Twitter Adresini Giriniz..." name="twitter">
                            <?php if(isset($form_error)){ ?>
                                <small class="pull-right input-form-error"> <?php echo form_error("twitter"); ?></small>
                            <?php } ?>
                        </div>
                        <div class="col-md-4 form-group">
                            <label>İnstagram</label>
                            <input class="form-control" placeholder="Personelin İnstagram Adresini Giriniz..." name="instagram">
                            <?php if(isset($form_error)){ ?>
                                <small class="pull-right input-form-error"> <?php echo form_error("instagram"); ?></small>
                            <?php } ?>
                        </div>

                        <div class="col-md-4 form-group">
                            <label>Linkedin</label>
                            <input class="form-control" placeholder="Personelin Linkedin Adresini Giriniz..." name="linkedin">
                            <?php if(isset($form_error)){ ?>
                                <small class="pull-right input-form-error"> <?php echo form_error("linkedin"); ?></small>
                            <?php } ?>
                        </div>

                    </div>
                    
                    <div class="form-group image_upload_container">
                        <label>Personel Resmi</label>
                        <input type="file" name="img_url" class="form-control">
                    </div>


                    <button type="submit" class="btn btn-primary btn-md btn-outline">Kaydet</button>
                    <a href="<?php echo base_url("teams"); ?>" class="btn btn-md btn-danger btn-outline">İptal</a>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>