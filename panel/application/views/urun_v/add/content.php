<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Yeni Ürün Ekle
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form action="<?php echo base_url("urun/save"); ?>" method="post">

                    <div class="row">

                        <div class="form-group col-md-7">
                            <label>Ürün İsmi</label>
                            <input class="form-control" placeholder="Ürün Başlığı Giriniz..." name="title">
                            <?php if(isset($form_error)){ ?>
                                <small class="pull-right input-form-error"> <?php echo form_error("title"); ?></small>
                            <?php } ?>
                        </div>


                        <div class="form-group col-md-5">
                            <label>Kategori</label>
                            <select name="category_id" class="form-control">
                                <?php foreach($categories as $category) { ?>
                                    <option value="<?php echo $category->id; ?>"><?php echo $category->title; ?></option>
                                <?php } ?>
                            </select>
                            <?php if(isset($form_error)){ ?>
                                <small class="pull-right input-form-error"> <?php echo form_error("client"); ?></small>
                            <?php } ?>
                        </div>

                    </div>

<div class="row">

                         <div class="form-group col-md-9">
                                        <label>Ürün Kısa Açıklaması</label>
                                        <input class="form-control" placeholder="Ürün Kısa Açıklaması Giriniz..." name="client">
                                        <?php if(isset($form_error)){ ?>
                                            <small class="pull-right input-form-error"> <?php echo form_error("client"); ?></small>
                                        <?php } ?>

                                </div>

                        <div class="form-group col-md-3">
                                        <label>Ürün Fiyatı</label>
                                        <input class="form-control" placeholder="Ürün Fiyatı Giriniz. Örn: 18,00" name="place">
                                        <?php if(isset($form_error)){ ?>
                                            <small class="pull-right input-form-error"> <?php echo form_error("place"); ?></small>
                                        <?php } ?>

                                </div>

</div>
                    <div class="form-group">
                        <label>Açıklama</label>
                        <textarea name="description" class="m-0" data-plugin="summernote" data-options="{height: 250}"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-md btn-outline">Kaydet</button>
                    <a href="<?php echo base_url("urun"); ?>" class="btn btn-md btn-danger btn-outline">İptal</a>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>