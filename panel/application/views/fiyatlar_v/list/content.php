<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Fiyat Listesi
            <a href="<?php echo base_url("fiyatlar/new_form"); ?>" class="btn btn-outline btn-primary btn-xs pull-right"> <i class="fa fa-plus"></i> Yeni Ekle</a>
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget p-lg">

            <?php if(empty($items)) { ?>

                <div class="alert alert-info text-center">
                    <p>Burada herhangi bir veri bulunmamaktadır. Eklemek için lütfen <a href="<?php echo base_url("fiyatlar/new_form"); ?>">tıklayınız</a></p>
                </div>

            <?php } else { ?>

                <table class="table table-hover table-striped table-bordered content-container">
                    <thead>
                        <th class="w50">#id</th>
                        <th class="w50">Ürün İsmi</th>
                        <th class="w200">Açıklama</th>
                        <th class="w50">Fiyat</th>
                        <th class="w50">Durumu</th>
                        <th class="w50">İşlem</th>
                    </thead>
                    <tbody>

                        <?php foreach($items as $item) { ?>

                            <tr>
                                <td class="w50 text-center">#<?php echo $item->id; ?></td>
                                <td  class="text-center"><?php echo $item->baslik; ?></td>
                                <td  class="text-center w150"><?php echo $item->aciklama; ?></td>
                                <td  class="text-center"><?php echo $item->fiyat; ?> TL</td>
                                <td  class="text-center">
                                    <input
                                        data-url="<?php echo base_url("fiyatlar/isActiveSetter/$item->id"); ?>"
                                        class="isActive"
                                        type="checkbox"
                                        data-switchery
                                        data-color="#10c469"
                                        <?php echo ($item->isActive) ? "checked" : ""; ?>
                                    />
                                </td>
                                <td class="text-center w150">
                                    <button
                                        data-url="<?php echo base_url("fiyatlar/delete/$item->id"); ?>"
                                        class="btn btn-sm btn-danger btn-outline remove-btn">
                                        <i class="fa fa-trash"></i> Sil
                                    </button>
                                    <a href="<?php echo base_url("fiyatlar/update_form/$item->id"); ?>" class="btn btn-sm btn-info btn-outline"><i class="fa fa-pencil-square-o"></i> Düzenle</a>
                                </td>
                            </tr>

                        <?php } ?>

                    </tbody>

                </table>

            <?php } ?>

        </div><!-- .widget -->
    </div><!-- END column -->
</div>