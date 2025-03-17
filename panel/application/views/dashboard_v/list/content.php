<div class="row"><div class="col-md-3 col-sm-6"><div class="widget stats-widget"><div class="widget-body clearfix"><div class="pull-left"><h3 class="widget-title text-primary"><span class="counter" style="font-size: 0.9em!important;"><?php
                            $query = $this->db->query('SELECT * FROM services');
                            echo $query->num_rows();
                            ?></span></h3><small class="text-color">Sunduğumuz Hizmet</small></div><span class="pull-right big-icon watermark"><i class="menu-icon zmdi zmdi-layers zmdi-hc-lg"></i></span></div><footer class="widget-footer bg-primary"><small></small> <span class="small-chart pull-right" data-plugin="sparkline" data-options="[4,3,5,2,1], { type: 'bar', barColor: '#ffffff', barWidth: 5, barSpacing: 2 }"><canvas width="33" height="16" style="display: inline-block; width: 33px; height: 16px; vertical-align: top;"></canvas></span></footer></div></div><div class="col-md-3 col-sm-6"><div class="widget stats-widget"><div class="widget-body clearfix"><div class="pull-left"><h3 class="widget-title text-danger"><span class="counter" data-plugin="counterUp"><?php
                            $query = $this->db->query('SELECT * FROM teams');
                            echo $query->num_rows();
                            ?></span></h3><small class="text-color">Toplam Personel</small></div><span class="pull-right big-icon watermark"><i class="fa fa-users"></i></span></div><footer class="widget-footer bg-danger"><small></small> <span class="small-chart pull-right" data-plugin="sparkline" data-options="[1,2,3,5,4], { type: 'bar', barColor: '#ffffff', barWidth: 5, barSpacing: 2 }"><canvas width="33" height="16" style="display: inline-block; width: 33px; height: 16px; vertical-align: top;"></canvas></span></footer></div></div><div class="col-md-3 col-sm-6"><div class="widget stats-widget"><div class="widget-body clearfix"><div class="pull-left"><h3 class="widget-title text-success"><span class="counter" ><?php
                            $query = $this->db->query('SELECT * FROM teklif');
                            echo $query->num_rows();
                            ?></span></h3><small class="text-color">Gelen Teklif</small></div><span class="pull-right big-icon watermark"><i class="fa fa-comments"></i></span></div><footer class="widget-footer bg-success"><small></small> <span class="small-chart pull-right" data-plugin="sparkline" data-options="[2,4,3,4,3], { type: 'bar', barColor: '#ffffff', barWidth: 5, barSpacing: 2 }"><canvas width="33" height="16" style="display: inline-block; width: 33px; height: 16px; vertical-align: top;"></canvas></span></footer></div></div><div class="col-md-3 col-sm-6"><div class="widget stats-widget"><div class="widget-body clearfix"><div class="pull-left"><h3 class="widget-title text-warning"><span class="counter" data-plugin="counterUp"><?php
                            $query = $this->db->query('SELECT * FROM iletisim');
                            echo $query->num_rows();
                            ?></span></h3><small class="text-color">Gelen Mesaj</small></div><span class="pull-right big-icon watermark"><i class="fa fa-comments"></i></span></div><footer class="widget-footer bg-warning"><small></small> <span class="small-chart pull-right" data-plugin="sparkline" data-options="[5,4,3,5,2],{ type: 'bar', barColor: '#ffffff', barWidth: 5, barSpacing: 2 }"><canvas width="33" height="16" style="display: inline-block; width: 33px; height: 16px; vertical-align: top;"></canvas></span></footer></div></div></div>

<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Teklif Listesi
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget p-lg">

            <?php if(empty($teklifs)) { ?>

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
                    <th class="w50">Tarih</th>
                    <th class="w300">İşlem</th>
                    </thead>
                    <tbody>

                    <?php foreach($teklifs as $item) { ?>

                        <tr>
                            <td class="w50 text-center">#<?php echo $item->id; ?></td>
                            <td  class="text-center"><?php echo $item->isim; ?></td>
                            <td  class="text-center"><?php echo $item->mail; ?></td>
                            <td  class="text-center"><?php echo $item->konu; ?></td>
                            <td  class="text-center"><?php echo $item->hizmet; ?></td>
                            <td  class="text-center"><?php echo date('d.m.Y', strtotime($item->tarih)) ?></td>
                            <td class="text-center w150">
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