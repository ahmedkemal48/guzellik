<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            teklif Listesi
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget p-lg">

            <?php if(empty($items)) { ?>

                <div class="alert alert-info text-center">
                    <p>Burada herhangi bir veri bulunmamaktadır.</p>
                </div>

            <?php } else { ?>

                <table class="table table-hover table-striped table-bordered content-container">
                    <thead>
                        <th class="w50">#id</th>
                        <th class="w200">İsim Soyisim</th>
                        <th class="w50">E-Posta</th>
                        <th class="w200">Konu</th>
                        <th class="w300">Hizmet</th>
                        <th class="w50">teklif Tarihi</th>
                        <th class="w50">Durumu</th>
                        <th class="w300">İşlem</th>
                    </thead>
                    <tbody>

                        <?php foreach($items as $item) { ?>

                            <tr>
                                <td class="w50 text-center">#<?php echo $item->id; ?></td>
                                <td  class="text-center"><?php echo $item->isim; ?></td>
                                <td  class="text-center"><?php echo $item->mail; ?></td>
                                <td  class="text-center"><?php echo $item->konu; ?></td>
                                <td  class="text-center"><?php echo $item->hizmet; ?></td>
                                <td  class="text-center"><?php echo date('d.m.Y', strtotime($item->tarih)) ?></td>
                                <td  class="text-center w100">
                                    <input
                                        data-url="<?php echo base_url("teklif/isActiveSetter/$item->id"); ?>"
                                        class="isActive"
                                        type="checkbox"
                                        data-switchery
                                        data-color="#10c469"
                                        <?php echo ($item->durum) ? "checked" : ""; ?>
                                    />
                                </td>
                                <td class="text-center w150">
                                    <button
                                        data-url="<?php echo base_url("teklif/delete/$item->id"); ?>"
                                        class="btn btn-sm btn-danger btn-outline remove-btn">
                                        <i class="fa fa-trash"></i> Sil
                                    </button>
                                    <a href="<?php echo base_url("teklif/update_form/$item->id"); ?>" class="btn btn-sm btn-info btn-outline"><i class="fa fa-desktop"></i> Görüntüle</a>
                                </td>
                            </tr>

                        <?php } ?>

                    </tbody>

                </table>

            <?php } ?>

        </div><!-- .widget -->
    </div><!-- END column -->
</div>