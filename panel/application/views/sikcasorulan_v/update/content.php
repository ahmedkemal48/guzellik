<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            <?php echo "<b>$item->baslik</b> kaydını düzenliyorsunuz"; ?>
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form action="<?php echo base_url("sikcasorulan/update/$item->id"); ?>" method="post">

                    <div class="col-md-12">
                        <div class="col-md-4 form-group"  style="margin-left: -20px;">
                            <label>Başlık</label>
                            <input class="form-control" placeholder="Başlık" name="baslik" value="<?php echo $item->baslik; ?>">
                            <?php if(isset($form_error)){ ?>
                                <small class="pull-right input-form-error"> <?php echo form_error("baslik"); ?></small>
                            <?php } ?>
                        </div>
                        <div class="col-md-4 form-group" >
                            <label>İkon</label>
                            <input class="form-control" placeholder="İkon" name="no" value="<?php echo $item->no; ?>">
                            <?php if(isset($form_error)){ ?>
                                <small class="pull-right input-form-error"> <?php echo form_error("no"); ?></small>
                            <?php } ?>
                        </div>
                        <div class="col-md-4 form-group">
                            <label>İkon Renk</label>
                            <input class="form-control" placeholder="İkon Renk" name="renk" value="<?php echo $item->renk; ?>">
                            <?php if(isset($form_error)){ ?>
                                <small class="pull-right input-form-error"> <?php echo form_error("renk"); ?></small>
                            <?php } ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Açıklama</label>
                        <textarea name="aciklama" class="m-0" data-plugin="summernote" data-options="{height: 250}"><?php echo $item->aciklama; ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-md btn-outline">Güncelle</button>
                    <a href="<?php echo base_url("sikcasorulan"); ?>" class="btn btn-md btn-danger btn-outline">İptal</a>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>