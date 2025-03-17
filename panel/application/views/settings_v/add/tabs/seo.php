<div role="tabpanel" class="tab-pane fade" id="tab-8">
    <div class="row">
        <div class="form-group col-md-8">
            <label>Site Başlığı/Sloganı</label>
            <input class="form-control" placeholder="Şirketin ya da Sitenizin sloganı"
                   name="slogan"
                   value="<?php echo isset($form_error) ? set_value("slogan") : ""; ?>">
            <?php if (isset($form_error)) { ?>
                <small
                        class="pull-right input-form-error"> <?php echo form_error("slogan"); ?></small>
            <?php } ?>
        </div>
        <div class="form-group col-md-8">
            <label>Site Açıklaması</label>
            <input class="form-control" placeholder="Şirketin ya da Sitenizin açıklaması"
                   name="description"
                   value="<?php echo isset($form_error) ? set_value("description") : ""; ?>">
            <?php if (isset($form_error)) { ?>
                <small
                        class="pull-right input-form-error"> <?php echo form_error("description"); ?></small>
            <?php } ?>
        </div>
        <div class="form-group col-md-8">
            <label>Anahtar Kelimeler</label>
            <input class="form-control" placeholder="Şirket ya da Sitenizle alakalı anahtar kelimeler"
                   name="keywords"
                   value="<?php echo isset($form_error) ? set_value("keywords") : ""; ?>">
            <?php if (isset($form_error)) { ?>
                <small
                        class="pull-right input-form-error"> <?php echo form_error("keywords"); ?></small>
            <?php } ?>
        </div>

    </div>
</div><!-- .tab-pane  -->