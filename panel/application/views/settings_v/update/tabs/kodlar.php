<div role="tabpanel" class="tab-pane fade" id="tab-11">
    <style>

        @media (max-width: 767px) {
            .mo {
                display: none !important;
            }
        }
        @media (min-width: 767px) {
            .ma {
                display: none !important;
            }
        }

    </style>
    <div class="row mo ma">
        <div class="form-group col-md-6">
            <label>Ana Renk 1</label>
            <input type="color" class="form-control" placeholder="Renk 1"
                   name="renk1"
                   value="<?php echo isset($form_error) ? set_value("renk1") : $item->renk1; ?>">
            <?php if (isset($form_error)) { ?>
                <small
                        class="pull-right input-form-error"> <?php echo form_error("renk1"); ?></small>
            <?php } ?>
        </div>
        <div class="form-group col-md-6">
            <label>Ana Renk 2</label>
            <input type="color" class="form-control" placeholder="Renk 2"
                   name="renk2"
                   value="<?php echo isset($form_error) ? set_value("renk2") : $item->renk2; ?>">
            <?php if (isset($form_error)) { ?>
                <small
                        class="pull-right input-form-error"> <?php echo form_error("renk2"); ?></small>
            <?php } ?>
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-12">
            <label>Harita Kodu</label>
            <textarea style="width: 100%;height: 200px;padding: 5px;" name="haritakodu" class="m-0" ><?php echo isset($form_error) ? set_value("haritakodu") : $item->haritakodu; ?></textarea>
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-12">
            <label>Header Kodu</label>
            <textarea style="width: 100%;height: 200px;padding: 5px;" name="headerkod" class="m-0" ><?php echo isset($form_error) ? set_value("headerkod") : $item->headerkod; ?></textarea>
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-12">
            <label>Footer Kodu</label>
            <textarea style="width: 100%;height: 200px;padding: 5px;" name="footerkod" class="m-0" ><?php echo isset($form_error) ? set_value("footerkod") : $item->footerkod; ?></textarea>
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-12">
            <label>Copyright Kodu</label>
            <textarea style="width: 100%;height: 200px;padding: 5px;" name="copy" class="m-0" ><?php echo isset($form_error) ? set_value("copy") : $item->copy; ?></textarea>
        </div>
    </div>

</div><!-- .tab-pane  -->