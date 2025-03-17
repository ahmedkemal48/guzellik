<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Aktif/Pasif Modül Ekle
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form action="<?php echo base_url("aktif/save"); ?>" method="post">

                    <div class="col-md-12">
                        <div class="col-md-8 form-group"  style="margin-left: -20px;">
                            <label>Başlık</label>
                            <input class="form-control" placeholder="Başlık" name="isim">
                            <?php if(isset($form_error)){ ?>
                                <small class="pull-right input-form-error"> <?php echo form_error("isim"); ?></small>
                            <?php } ?>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-md btn-outline">Kaydet</button>
                    <a href="<?php echo base_url("aktif"); ?>" class="btn btn-md btn-danger btn-outline">İptal</a>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>