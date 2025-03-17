<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            <?php echo "<b>$item->isim</b> kaydını düzenliyorsunuz"; ?>
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form action="<?php echo base_url("aktif/update/$item->id"); ?>" method="post">

                    <div class="col-md-12">
                        <div class="col-md-8 form-group"  style="margin-left: -20px;">
                            <label>Başlık</label>
                            <input class="form-control" placeholder="Başlık" name="isim" value="<?php echo $item->isim; ?>">
                            <?php if(isset($form_error)){ ?>
                                <small class="pull-right input-form-error"> <?php echo form_error("isim"); ?></small>
                            <?php } ?>
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary btn-md btn-outline">Güncelle</button>
                    <a href="<?php echo base_url("aktif"); ?>" class="btn btn-md btn-danger btn-outline">İptal</a>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>