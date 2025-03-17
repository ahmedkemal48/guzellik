<?php $user = get_active_user(); ?>

<aside id="menubar" class="menubar light" >
    <div class="app-user">
        <div class="media">
            <div class="media-left">
                <div class="avatar avatar-md avatar-circle" style="margin-top: 20px;">
                    <a href="javascript:void(0)">
                        <img class="img-responsive"
                             src="<?php echo base_url("assets"); ?>/assets/images/221.jpg"
                             alt="<?php echo convertToSEO($user->full_name); ?>"/>
                    </a>
                </div><!-- .avatar -->
            </div>
            <div class="media-body">
                <div class="foldable">
                    <h5 style="margin-top: 27px;"><a href="javascript:void(0)" class="username"><?php echo $user->full_name; ?></a></h5>
                    <ul>
                        <li class="dropdown">
                            <a href="javascript:void(0)" class="dropdown-toggle usertitle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <small>İşlemler</small>
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu animated flipInY">
                                <li>
                                    <a class="text-color" href="<?php echo base_url(); ?>">
                                        <span class="m-r-xs"><i class="fa fa-home"></i></span>
                                        <span>Anasayfa</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="text-color" href="<?php echo base_url("users/update_form/$user->id"); ?>">
                                        <span class="m-r-xs"><i class="fa fa-user"></i></span>
                                        <span>Profilim</span>
                                    </a>
                                </li>
                                <li role="separator" class="divider"></li>
                                <li>
                                    <a class="text-color" href="<?php echo base_url("logout"); ?>">
                                        <span class="m-r-xs"><i class="fa fa-power-off"></i></span>
                                        <span>Çıkış</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div><!-- .media-body -->
        </div><!-- .media -->
    </div><!-- .app-user -->

    <div class="menubar-scroll">
        <div class="menubar-scroll-inner">
            <ul class="app-menu">


                <?php if(isAllowedViewModule("dashboard")) { ?>
                    <li>
                        <a href="<?php echo base_url(""); ?>">
                            <i class="menu-icon zmdi zmdi-view-dashboard zmdi-hc-lg"></i>
                            <span class="menu-text">Anasayfa</span>
                        </a>
                    </li>
                <?php } ?>

                <?php if(isAllowedViewModule("settings")) { ?>
                    <li>
                        <a href="<?php echo base_url("settings"); ?>">
                            <i class="menu-icon zmdi zmdi-settings zmdi-hc-lg"></i>
                            <span class="menu-text">Site Ayarları</span>
                        </a>
                    </li>
                <?php } ?>

                <?php if(isAllowedViewModule("aktif") && isAllowedViewModule("baslik")) { ?>

                    <li class="has-submenu">
                        <a href="javascript:void(0)" class="submenu-toggle">
                            <i class="menu-icon zmdi zmdi-settings zmdi-hc-lg"></i>
                            <span class="menu-text">Ek Ayarlar</span>
                            <i class="menu-caret zmdi zmdi-hc-sm zmdi-chevron-right"></i>
                        </a>
                        <ul class="submenu">
                            <li>
                                <a href="<?php echo base_url("aktif"); ?>">
                                    <span class="menu-text">Aktif/Pasif Ayarı</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url("baslik"); ?>">
                                    <span class="menu-text">Başlık/Alt Başlık Ayarı</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                <?php } ?>



                <?php if(isAllowedViewModule("emailsettings")) { ?>

                    <li>
                        <a href="<?php echo base_url("emailsettings"); ?>">
                            <i class="menu-icon zmdi zmdi-email zmdi-hc-lg"></i>
                            <span class="menu-text">E-posta Ayarları</span>
                        </a>
                    </li>

                <?php } ?>



                <?php if(isAllowedViewModule("contact")) { ?>

                    <li>
                        <a href="<?php echo base_url("contact"); ?>">
                            <i class="menu-icon zmdi zmdi-email zmdi-hc-lg"></i>
                            <span class="menu-text">İletişim Mesajları</span>
                        </a>
                    </li>

                <?php } ?>

                <?php if(isAllowedViewModule("teklif")) { ?>

                    <li>
                        <a href="<?php echo base_url("teklif"); ?>">
                            <i class="menu-icon zmdi zmdi-email zmdi-hc-lg"></i>
                            <span class="menu-text">Teklifler</span>
                        </a>
                    </li>

                <?php } ?>

                <?php if(isAllowedViewModule("mesaj")) { ?>

                    <li>
                        <a href="<?php echo base_url("mesaj"); ?>">
                            <i class="menu-icon zmdi zmdi-email zmdi-hc-lg"></i>
                            <span class="menu-text">Müşteri Yorumları</span>
                        </a>
                    </li>

                <?php } ?>


                <?php if(isAllowedViewModule("nedenbiz")) { ?>

                    <li>
                        <a href="<?php echo base_url("nedenbiz"); ?>">
                            <i class="menu-icon fa fa-database zmdi-hc-lg"></i>
                            <span class="menu-text">Neden Biz</span>
                        </a>
                    </li>

                <?php } ?>


                <?php if(isAllowedViewModule("yorum")) { ?>

                    <li>
                        <a href="<?php echo base_url("yorum"); ?>">
                            <i class="menu-icon fa fa-comments zmdi-hc-lg"></i>
                            <span class="menu-text">Müşteri Yorumları</span>
                        </a>
                    </li>

                <?php } ?>

                <?php if(isAllowedViewModule("fiyatlar")) { ?>

                    <li>
                        <a href="<?php echo base_url("fiyatlar"); ?>">
                            <i class="menu-icon fa fa-database zmdi-hc-lg"></i>
                            <span class="menu-text">Fiyat Listesi</span>
                        </a>
                    </li>

                <?php } ?>


                <?php if(isAllowedViewModule("sikcasorulan")) { ?>

                    <li>
                        <a href="<?php echo base_url("sikcasorulan"); ?>">
                            <i class="menu-icon fa fa-database zmdi-hc-lg"></i>
                            <span class="menu-text">Sıkça Sorulanlar</span>
                        </a>
                    </li>

                <?php } ?>


                <?php if(isAllowedViewModule("teams")) { ?>

                    <li>
                        <a href="<?php echo base_url("teams"); ?>">
                            <i class="menu-icon fa fa-users zmdi-hc-lg"></i>
                            <span class="menu-text">Ekibimiz</span>
                        </a>
                    </li>

                <?php } ?>


                <?php if(isAllowedViewModule("degisim")) { ?>

                    <li>
                        <a href="<?php echo base_url("degisim"); ?>">
                            <i class="menu-icon fa fa-database zmdi-hc-lg"></i>
                            <span class="menu-text">Değişimler</span>
                        </a>
                    </li>

                <?php } ?>


                <?php if(isAllowedViewModule("sayilar")) { ?>

                    <li>
                        <a href="<?php echo base_url("sayilar"); ?>">
                            <i class="menu-icon fa fa-database zmdi-hc-lg"></i>
                            <span class="menu-text">Sayılarla Biz</span>
                        </a>
                    </li>

                <?php } ?>

                <?php if(isAllowedViewModule("galleries")) { ?>

                    <li>
                        <a href="<?php echo base_url("galleries"); ?>">
                            <i class="menu-icon zmdi zmdi-apps zmdi-hc-lg"></i>
                            <span class="menu-text">Galeri İşlemleri</span>
                        </a>
                    </li>

                <?php } ?>



                <?php if(isAllowedViewModule("slides")) { ?>

                    <li>
                        <a href="<?php echo base_url("slides"); ?>">
                            <i class="menu-icon zmdi zmdi-layers zmdi-hc-lg"></i>
                            <span class="menu-text">Slider Yönetimi</span>
                        </a>
                    </li>

                <?php } ?>

                <?php if(isAllowedViewModule("urun") && isAllowedViewModule("urun_kategori")) { ?>

                    <li class="has-submenu">
                        <a href="javascript:void(0)" class="submenu-toggle">
                            <i class="menu-icon zmdi zmdi-view-dashboard zmdi-hc-lg"></i>
                            <span class="menu-text">Ürün İşlemleri</span>
                            <i class="menu-caret zmdi zmdi-hc-sm zmdi-chevron-right"></i>
                        </a>
                        <ul class="submenu">
                            <li>
                                <a href="<?php echo base_url("urun_kategori"); ?>">
                                    <span class="menu-text">Ürün Kategorileri</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url("urun"); ?>">
                                    <span class="menu-text">Ürünler</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                <?php } ?>


                <?php if(isAllowedViewModule("portfolio") && isAllowedViewModule("portfolio_categories")) { ?>

                    <li class="has-submenu">
                        <a href="javascript:void(0)" class="submenu-toggle">
                            <i class="menu-icon fa fa-asterisk"></i>
                            <span class="menu-text">Portfolyo İşlemleri</span>
                            <i class="menu-caret zmdi zmdi-hc-sm zmdi-chevron-right"></i>
                        </a>
                        <ul class="submenu">
                            <li>
                                <a href="<?php echo base_url("portfolio_categories"); ?>">
                                    <span class="menu-text">Portfolyo Kategorileri</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url("portfolio"); ?>">
                                    <span class="menu-text">Portfolyo</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                <?php } ?>


                <?php if(isAllowedViewModule("nedenbiz")) { ?>

                    <li>
                        <a href="<?php echo base_url("nedenbiz"); ?>">
                            <i class="menu-icon fa fa-database zmdi-hc-lg"></i>
                            <span class="menu-text">Neden Biz</span>
                        </a>
                    </li>

                <?php } ?>

                <?php if(isAllowedViewModule("brands")) { ?>

                    <li>
                        <a href="<?php echo base_url("brands"); ?>">
                            <i class="menu-icon fa fa-database zmdi-hc-lg"></i>
                            <span class="menu-text">Paketler</span>
                        </a>
                    </li>

                <?php } ?>


                <?php if(isAllowedViewModule("services")) { ?>

                    <li>
                        <a href="<?php echo base_url("services"); ?>">
                            <i class="menu-icon fa fa-cutlery"></i>
                            <span class="menu-text">Hizmetlerimiz</span>
                        </a>
                    </li>

                <?php } ?>


                <?php if(isAllowedViewModule("news")) { ?>

                    <li>
                        <a href="<?php echo base_url("news"); ?>">
                            <i class="menu-icon fa fa-newspaper-o"></i>
                            <span class="menu-text">Haberler</span>
                        </a>
                    </li>

                <?php } ?>





                <?php if(isAllowedViewModule("user_roles")) { ?>

                    <li>
                        <a href="<?php echo base_url("user_roles"); ?>">
                            <i class="menu-icon fa fa-eye"></i>
                            <span class="menu-text">Kullanıcı Rolü</span>
                        </a>
                    </li>

                <?php } ?>


                <?php if(isAllowedViewModule("users")) { ?>

                    <li>
                        <a href="<?php echo base_url("users"); ?>">
                            <i class="menu-icon fa fa-user-secret"></i>
                            <span class="menu-text">Kullanıcılar</span>
                        </a>
                    </li>

                <?php } ?>


                <?php if(isAllowedViewModule("members")) { ?>

                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-users"></i>
                            <span class="menu-text">Aboneler</span>
                        </a>
                    </li>

                <?php } ?>





            </ul><!-- .app-menu -->
        </div><!-- .menubar-scroll-inner -->
    </div><!-- .menubar-scroll -->
</aside>