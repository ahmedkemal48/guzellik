<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            <?php echo "<b>$item->baslik</b> kaydını düzenliyorsunuz"; ?>
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form action="<?php echo base_url("calisma/update/$item->id"); ?>" method="post">

                    <div class="col-md-12">
                        <div class="col-md-8 form-group"  style="margin-left: -20px;">
                            <label>Günler</label>
                            <input class="form-control" placeholder="Günler" name="baslik" value="<?php echo $item->baslik; ?>">
                            <?php if(isset($form_error)){ ?>
                                <small class="pull-right input-form-error"> <?php echo form_error("baslik"); ?></small>
                            <?php } ?>
                        </div>
                        <div class="col-md-4 form-group"  style="margin-left: -20px;">
                            <label>Saat Aralığı</label>
                            <input class="form-control" placeholder="Saat Aralığı" name="aciklama" value="<?php echo $item->aciklama; ?>">
                            <?php if(isset($form_error)){ ?>
                                <small class="pull-right input-form-error"> <?php echo form_error("aciklama"); ?></small>
                            <?php } ?>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-md btn-outline">Güncelle</button>
                    <a href="<?php echo base_url("calisma"); ?>" class="btn btn-md btn-danger btn-outline">İptal</a>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>