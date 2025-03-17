<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg" >
            <?php echo "<span style=\"color: #ff0054; font-weight: bold; text-decoration: underline\"><b>$item->ad_soyad</b></span> Personel kaydını düzenliyorsunuz"; ?>
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form action="<?php echo base_url("teams/update_form/$item->id"); ?>" method="post" enctype="multipart/form-data">

                    <div class="col-md-12">
                        <div class="col-md-6 form-group"  style="margin-left: -20px;">
                        <label>İsim Soyisim</label>
                        <input class="form-control" placeholder="Personelin ismi ve soyisimi giriniz..." name="ad_soyad" value="<?php echo $item->ad_soyad; ?>">
                        <?php if(isset($form_error)){ ?>
                            <small class="pull-right input-form-error"> <?php echo form_error("ad_soyad"); ?></small>
                        <?php } ?>
                         </div>
                        <div class="col-md-6 form-group">
                        <label>Personelin Pozisyonu</label>
                        <input class="form-control" placeholder="Personelin Pozisyonu" name="pozisyon" value="<?php echo $item->pozisyon; ?>">
                        <?php if(isset($form_error)){ ?>
                            <small class="pull-right input-form-error"> <?php echo form_error("pozisyon"); ?></small>
                        <?php } ?>
                         </div>
                    </div>

                    <div class="col-md-12">
                        <div class="col-md-4 form-group"  style="margin-left: -20px;">

                            <label>Facebook</label>
                            <input class="form-control" placeholder="Personelin Facebook Adresini Giriniz..." name="facebook" value="<?php echo $item->facebook; ?>">
                            <?php if(isset($form_error)){ ?>
                                <small class="pull-right input-form-error"> <?php echo form_error("facebook"); ?></small>
                            <?php } ?>
                        </div>
                        <div class="col-md-4 form-group">
                            <label>Youtube</label>
                            <input class="form-control" placeholder="Personelin Youtube Adresini Giriniz..." name="youtube" value="<?php echo $item->youtube; ?>">
                            <?php if(isset($form_error)){ ?>
                                <small class="pull-right input-form-error"> <?php echo form_error("youtube"); ?></small>
                            <?php } ?>
                        </div>
                        <div class="col-md-4 form-group">
                            <label>Pinterest</label>
                            <input class="form-control" placeholder="Personelin Pinterest Adresini Giriniz..." name="pinterest" value="<?php echo $item->pinterest; ?>">
                            <?php if(isset($form_error)){ ?>
                                <small class="pull-right input-form-error"> <?php echo form_error("pinterest"); ?></small>
                            <?php } ?>
                        </div>

                    </div>

                    <div class="col-md-12">
                        <div class="col-md-4 form-group"  style="margin-left: -20px;">

                            <label>Twitter</label>
                            <input class="form-control" placeholder="Personelin Twitter Adresini Giriniz..." name="twitter" value="<?php echo $item->twitter; ?>">
                            <?php if(isset($form_error)){ ?>
                                <small class="pull-right input-form-error"> <?php echo form_error("twitter"); ?></small>
                            <?php } ?>
                        </div>
                        <div class="col-md-4 form-group">
                            <label>İnstagram</label>
                            <input class="form-control" placeholder="Personelin İnstagram Adresini Giriniz..." name="instagram" value="<?php echo $item->instagram; ?>">
                            <?php if(isset($form_error)){ ?>
                                <small class="pull-right input-form-error"> <?php echo form_error("instagram"); ?></small>
                            <?php } ?>
                        </div>
                        <div class="col-md-4 form-group">
                            <label>Linkedin</label>
                            <input class="form-control" placeholder="Personelin Linkedin Adresini Giriniz..." name="linkedin" value="<?php echo $item->linkedin; ?>">
                            <?php if(isset($form_error)){ ?>
                                <small class="pull-right input-form-error"> <?php echo form_error("linkedin"); ?></small>
                            <?php } ?>
                        </div>

                    </div>
                    <div class="row">

                        <div class="col-md-1 image_upload_container">
                            <img src="<?php echo get_picture($viewFolder, $item->img_url, "349x388"); ?>" alt="" class="img-responsive">
                        </div>

                        <div class="col-md-9 form-group image_upload_container">
                            <label>Personel Resmi</label>
                            <input type="file" name="img_url" class="form-control">
                        </div>

                    </div>


                    <button type="submit" class="btn btn-primary btn-md btn-outline">Güncelle</button>
                    <a href="<?php echo base_url("teams"); ?>" class="btn btn-md btn-danger btn-outline">İptal</a>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>