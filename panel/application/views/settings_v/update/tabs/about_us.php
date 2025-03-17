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

<div role="tabpanel" class="tab-pane fade" id="tab-2">
    <div class="row">
        <div class="form-group col-md-4">
            <label>Slogan</label>
            <input class="form-control" placeholder="Hakkımızda Slogan Gelecek"
                   name="sloganhak"
                   value="<?php echo isset($form_error) ? set_value("sloganhak") : $item->sloganhak; ?>">
        </div>
        <div class="form-group col-md-4">
            <label>Alt Başlık</label>
            <input class="form-control" placeholder="Hakkımızda Alt Başlık Gelecek"
                   name="baslikhak"
                   value="<?php echo isset($form_error) ? set_value("baslikhak") : $item->baslikhak; ?>">
        </div>
        <div class="form-group col-md-4">
            <label>Tanıtım Videosu</label>
            <input class="form-control" placeholder="örn : https://youtu.be/lM02vNMRRB0"
                   name="tanitimvideo"
                   value="<?php echo isset($form_error) ? set_value("tanitimvideo") : $item->tanitimvideo; ?>">
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-12">
            <label>Hakkımızda</label>
            <textarea name="about_us" class="m-0" data-plugin="summernote" data-options="{height: 250}">
                                        <?php echo isset($form_error) ? set_value("about_us") : $item->about_us; ?>
                                    </textarea>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-4">
            <img
                    src="<?php echo get_picture($viewFolder, $item->kurumsalfoto, "748x804"); ?>"
                    alt="<?php echo $item->kurumsalfoto; ?>"
                    class="img-responsive"
                    style="margin: 0px auto"
            >
        </div>
        <div class="form-group col-md-6">
            <label>Kurumsal Görsel</label>
            <input type="file" name="kurumsalfoto" class="form-control">
        </div>
    </div>
    <br> <br> <br>
    <div class="row">
        <div class="col-md-4">
            <img
                    src="<?php echo get_picture($viewFolder, $item->merakfoto, "946x938"); ?>"
                    alt="<?php echo $item->merakfoto; ?>"
                    class="img-responsive"
                    style="margin: 0px auto"
            >
        </div>
        <div class="form-group col-md-6">
            <label>Tanıtım Video Görseli</label>
            <input type="file" name="merakfoto" class="form-control">
        </div>
    </div>
</div><!-- .tab-pane  -->