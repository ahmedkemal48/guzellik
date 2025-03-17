<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            <?php echo "<b>$item->title</b> kaydını düzenliyorsunuz"; ?>
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form action="<?php echo base_url("urun/update/$item->id"); ?>" method="post">

                    <div class="row">

                        <div class="form-group col-md-6">
                            <label>Ürün İsmi</label>
                            <input
                                class="form-control"
                                placeholder="Ürün Başlığı Giriniz..."
                                name="title"
                                value="<?php echo (isset($form_error)) ? set_value("title") : $item->title; ?>"
                            >
                            <?php if(isset($form_error)){ ?>
                                <small class="pull-right input-form-error"> <?php echo form_error("title"); ?></small>
                            <?php } ?>
                        </div>


                        <div class="form-group col-md-6">
                            <label>Kategori</label>

                            <select name="category_id" class="form-control">
                                <?php foreach($categories as $category) { ?>
                                    <?php $category_id = isset($form_error) ? set_value("category_id") : $item->category_id; ?>
                                    <option
                                        <?php echo ($category->id === $category_id) ? "selected" : ""; ?>
                                        value="<?php echo $category->id; ?>"><?php echo $category->title; ?></option>
                                <?php } ?>
                            </select>

                            <?php if(isset($form_error)){ ?>
                                <small class="pull-right input-form-error"> <?php echo form_error("category_id"); ?></small>
                            <?php } ?>
                        </div>

                    </div>


<div class="row">
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label>Ürün Kısa Açıklaması</label>
                                        <input
                                            class="form-control"
                                            placeholder="Ürün Kısa Açıklaması Giriniz..."
                                            name="client"
                                            value="<?php echo (isset($form_error)) ? set_value("client") : $item->client; ?>"
                                        >
                                        <?php if(isset($form_error)){ ?>
                                            <small class="pull-right input-form-error"> <?php echo form_error("client"); ?></small>
                                        <?php } ?>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Ürün Fiyatı</label>
                                        <input
                                            class="form-control"
                                            placeholder="Ürün Fiyatı Giriniz. Örn: 18,00"
                                            name="place"
                                            value="<?php echo (isset($form_error)) ? set_value("place") : $item->place; ?>"
                                        >
                                        <?php if(isset($form_error)){ ?>
                                            <small class="pull-right input-form-error"> <?php echo form_error("place"); ?></small>
                                        <?php } ?>
                                    </div>
                                </div>
</div>


                    <div class="form-group">
                        <label>Açıklama</label>
                        <textarea name="description" class="m-0" data-plugin="summernote" data-options="{height: 250}">
                            <?php echo (isset($form_error)) ? set_value("description") : $item->description; ?>
                        </textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-md btn-outline">Güncelle</button>
                    <a href="<?php echo base_url("urun"); ?>" class="btn btn-md btn-danger btn-outline">İptal</a>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>