<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Çalışma Zamanı Ekle
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form action="<?php echo base_url("calisma/save"); ?>" method="post">

                    <div class="col-md-12">
                        <div class="col-md-6 form-group"  style="margin-left: -20px;">
                            <label>Günler</label>
                            <input class="form-control" placeholder="Günler" name="baslik">
                            <?php if(isset($form_error)){ ?>
                                <small class="pull-right input-form-error"> <?php echo form_error("baslik"); ?></small>
                            <?php } ?>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Saat Aralığı</label>
                            <input class="form-control" placeholder="Saat Aralığı" name="aciklama">
                            <?php if(isset($form_error)){ ?>
                                <small class="pull-right input-form-error"> <?php echo form_error("aciklama"); ?></small>
                            <?php } ?>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-md btn-outline">Kaydet</button>
                    <a href="<?php echo base_url("calisma"); ?>" class="btn btn-md btn-danger btn-outline">İptal</a>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>