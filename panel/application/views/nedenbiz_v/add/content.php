<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Neden Biz Ekle
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form action="<?php echo base_url("nedenbiz/save"); ?>" method="post">

                    <div class="col-md-12">
                        <div class="col-md-5 form-group"  style="margin-left: -20px;">
                            <label>Başlık</label>
                            <input class="form-control" placeholder="Başlık" name="baslik">
                            <?php if(isset($form_error)){ ?>
                                <small class="pull-right input-form-error"> <?php echo form_error("baslik"); ?></small>
                            <?php } ?>
                        </div>
                        <div class="col-md-5 form-group">
                            <label>Link</label>
                            <input class="form-control" placeholder="Link Giriniz" name="aciklama">
                            <?php if(isset($form_error)){ ?>
                                <small class="pull-right input-form-error"> <?php echo form_error("aciklama"); ?></small>
                            <?php } ?>
                        </div>
                        <div class="col-md-2 form-group">
                            <label>İkon Kodu</label>
                            <input class="form-control" placeholder="İkon Kodu" name="no">
                            <?php if(isset($form_error)){ ?>
                                <small class="pull-right input-form-error"> <?php echo form_error("no"); ?></small>
                            <?php } ?>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-md btn-outline">Kaydet</button>
                    <a href="<?php echo base_url("nedenbiz"); ?>" class="btn btn-md btn-danger btn-outline">İptal</a>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>