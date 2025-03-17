<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            <?php echo "<b>$item->isim</b> kaydını düzenliyorsunuz"; ?>
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form action="<?php echo base_url("mesaj/update/$item->id"); ?>" method="post">

                    <div class="form-group">
                        <label>Adı & Soyadı</label>
                        <input disabled=" disabled " class="form-control" placeholder="Adı & Soyadı" name="isim" value="<?php echo isset($form_error) ? set_value("isim") : $item->isim; ?>">
                        <?php if(isset($form_error)){ ?>
                            <small class="pull-right input-form-error"> <?php echo form_error("isim"); ?></small>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label>E-Posta Adresi</label>
                        <input disabled=" disabled " class="form-control" placeholder="Mail" name="mail" value="<?php echo isset($form_error) ? set_value("mail") : $item->mail; ?>">
                        <?php if(isset($form_error)){ ?>
                            <small class="pull-right input-form-error"> <?php echo form_error("mail"); ?></small>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label>Mesaj İçeriği</label>
                        <textarea disabled=" disabled " class="form-control" placeholder="Mesaj" name="mesaj"><?php echo isset($form_error) ? set_value("mesaj") : $item->mesaj; ?></textarea>
                        <?php if(isset($form_error)){ ?>
                            <small class="pull-right input-form-error"> <?php echo form_error("mesaj"); ?></small>
                        <?php } ?>
                    </div>

                    <hr>
                    <div class="form-group">
                        <label>İp Adresi</label>
                        <input disabled=" disabled " class="form-control" placeholder="İp Adres" name="ip" value="<?php echo isset($form_error) ? set_value("ip") : $item->ip; ?>">
                        <?php if(isset($form_error)){ ?>
                            <small class="pull-right input-form-error"> <?php echo form_error("ip"); ?></small>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label>Mesaj Tarihi</label>
                        <input disabled=" disabled " class="form-control" placeholder="Mesaj Tarihi" name="tarih" value="<?php echo isset($form_error) ? set_value("tarih") : $item->tarih; ?>">
                        <?php if(isset($form_error)){ ?>
                            <small class="pull-right input-form-error"> <?php echo form_error("tarih"); ?></small>
                        <?php } ?>
                    </div>


                    <a href="<?php echo base_url("mesaj"); ?>" class="btn btn-md btn-danger btn-outline">İptal</a>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>