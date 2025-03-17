<div role="tabpanel" class="tab-pane fade" id="tab-9">

    <div class="row">

        <div class="form-group col-md-8">
            <label>Android Uygulama Linki</label>
            <input class="form-control" placeholder="Android Uygulama Linki"
                   name="android"
                   value="<?php echo isset($form_error) ? set_value("android") : $item->android; ?>">
            <?php if (isset($form_error)) { ?>
                <small
                        class="pull-right input-form-error"> <?php echo form_error("android"); ?></small>
            <?php } ?>
        </div>
        <div class="form-group col-md-8">
            <label>IOS Uygulama Linki</label>
            <input class="form-control" placeholder="IOS Uygulama Linki"
                   name="ios"
                   value="<?php echo isset($form_error) ? set_value("ios") : $item->ios; ?>">
            <?php if (isset($form_error)) { ?>
                <small
                        class="pull-right input-form-error"> <?php echo form_error("ios"); ?></small>
            <?php } ?>
        </div>
    </div>

</div><!-- .tab-pane  -->