<?php

class Urun extends CI_Controller
{
    public $viewFolder = "";

    public function __construct()
    {

        parent::__construct();

        $this->viewFolder = "urun_v";

        $this->load->model("urun_model");
        $this->load->model("urun_image_model");
        $this->load->model("urun_kategori_model");

        if(!get_active_user()){
            redirect(base_url("login"));
        }

    }

    public function index(){

        $viewData = new stdClass();

        /** Tablodan Verilerin Getirilmesi.. */
        $items = $this->urun_model->get_all(
            array(), "rank ASC"
        );

        /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "list";
        $viewData->items = $items;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function new_form(){

        $viewData = new stdClass();

        $viewData->categories = $this->urun_kategori_model->get_all(
            array(
                "isActive"  => 1
            )
        );

        /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "add";

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

    }

    public function save(){

        $this->load->library("form_validation");

        // Kurallar yazilir..
        $this->form_validation->set_rules("title", "Başlık", "required|trim");
        $this->form_validation->set_rules("category_id", "Kategori", "required|trim");
        $this->form_validation->set_rules("client", "Müşteri", "required|trim");

        $this->form_validation->set_message(
            array(
                "required"  => "<b>{field}</b> alanı doldurulmalıdır"
            )
        );

        $validate = $this->form_validation->run();

        if($validate){

            $insert = $this->urun_model->add(
                array(
                    "title"         => $this->input->post("title"),
                    "description"   => $this->input->post("description"),
                    "url"           => convertToSEO($this->input->post("title")),
                    "client"        => $this->input->post("client"),
                    "category_id"   => $this->input->post("category_id"),
                    "place"         => $this->input->post("place"),
                    "rank"          => 0,
                    "isActive"      => 1,
                    "createdAt"     => date("Y-m-d H:i:s")
                )
            );

            // TODO Alert sistemi eklenecek...
            if($insert){

                $alert = array(
                    "title" => "İşlem Başarılı",
                    "text" => "Kayıt başarılı bir şekilde eklendi",
                    "type"  => "success"
                );

            } else {

                $alert = array(
                    "title" => "İşlem Başarısız",
                    "text" => "Kayıt Ekleme sırasında bir problem oluştu",
                    "type"  => "error"
                );
            }

            // İşlemin Sonucunu Session'a yazma işlemi...
            $this->session->set_flashdata("alert", $alert);

            redirect(base_url("urun"));

        } else {

            $viewData = new stdClass();

            /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "add";
            $viewData->form_error = true;

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }

        // Başarılı ise
        // Kayit işlemi baslar
        // Başarısız ise
        // Hata ekranda gösterilir...

    }

    public function update_form($id){

        $viewData = new stdClass();

        /** Tablodan Verilerin Getirilmesi.. */
        $item = $this->urun_model->get(
            array(
                "id"    => $id,
            )
        );

        $viewData->categories = $this->urun_kategori_model->get_all(
            array(
                "isActive"  => 1
            )
        );

        /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "update";
        $viewData->item = $item;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);


    }

    public function update($id){

        $this->load->library("form_validation");

        // Kurallar yazilir..
        $this->form_validation->set_rules("title", "Başlık", "required|trim");
        $this->form_validation->set_rules("category_id", "Kategori", "required|trim");
        $this->form_validation->set_rules("client", "Müşteri", "required|trim");


        $this->form_validation->set_message(
            array(
                "required"  => "<b>{field}</b> alanı doldurulmalıdır"
            )
        );

        $validate = $this->form_validation->run();

        if($validate){

            $update = $this->urun_model->update(
                array(
                    "id"    => $id
                ),

                array(
                    "title"         => $this->input->post("title"),
                    "description"   => $this->input->post("description"),
                    "client"        => $this->input->post("client"),
                    "category_id"   => $this->input->post("category_id"),
                    "place"         => $this->input->post("place"),
                )
            );

            // TODO Alert sistemi eklenecek...
            if($update){

                $alert = array(
                    "title" => "İşlem Başarılı",
                    "text" => "Kayıt başarılı bir şekilde güncellendi",
                    "type"  => "success"
                );

            } else {

                $alert = array(
                    "title" => "İşlem Başarısız",
                    "text" => "Güncelleme sırasında bir problem oluştu",
                    "type"  => "error"
                );


            }

            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("urun"));

        } else {

            $viewData = new stdClass();

            /** Tablodan Verilerin Getirilmesi.. */
            $item = $this->urun_model->get(
                array(
                    "id"    => $id,
                )
            );

            /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "update";
            $viewData->form_error = true;
            $viewData->item = $item;
            $viewData->categories = $this->urun_kategori_model->get_all(
                array(
                    "isActive"  => 1
                )
            );

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }

        // Başarılı ise
        // Kayit işlemi baslar
        // Başarısız ise
        // Hata ekranda gösterilir...

    }

    public function delete($id){

        $delete = $this->urun_model->delete(
            array(
                "id"    => $id
            )
        );

        // TODO Alert Sistemi Eklenecek...
        if($delete){

            $alert = array(
                "title" => "İşlem Başarılı",
                "text" => "Kayıt başarılı bir şekilde silindi",
                "type"  => "success"
            );

        } else {

            $alert = array(
                "title" => "İşlem Başarısız",
                "text" => "Kayıt silme sırasında bir problem oluştu",
                "type"  => "error"
            );


        }

        $this->session->set_flashdata("alert", $alert);
        redirect(base_url("urun"));


    }

    public function imageDelete($id, $parent_id){

        $fileName = $this->urun_image_model->get(
            array(
                "id"    => $id
            )
        );

        $delete = $this->urun_image_model->delete(
            array(
                "id"    => $id
            )
        );


        // TODO Alert Sistemi Eklenecek...
        if($delete){

            unlink("uploads/{$this->viewFolder}/$fileName->img_url");

            redirect(base_url("urun/image_form/$parent_id"));
        } else {
            redirect(base_url("urun/image_form/$parent_id"));
        }

    }

    public function isActiveSetter($id){

        if($id){

            $isActive = ($this->input->post("data") === "true") ? 1 : 0;

            $this->urun_model->update(
                array(
                    "id"    => $id
                ),
                array(
                    "isActive"  => $isActive
                )
            );
        }
    }

    public function imageIsActiveSetter($id){

        if($id){

            $isActive = ($this->input->post("data") === "true") ? 1 : 0;

            $this->urun_image_model->update(
                array(
                    "id"    => $id
                ),
                array(
                    "isActive"  => $isActive
                )
            );
        }
    }

    public function isCoverSetter($id, $parent_id){

        if($id && $parent_id){

            $isCover = ($this->input->post("data") === "true") ? 1 : 0;

            // Kapak yapılmak istenen kayıt
            $this->urun_image_model->update(
                array(
                    "id"         => $id,
                    "portfolio_id" => $parent_id
                ),
                array(
                    "isCover"  => $isCover
                )
            );


            // Kapak yapılmayan diğer kayıtlar
            $this->urun_image_model->update(
                array(
                    "id !="      => $id,
                    "portfolio_id" => $parent_id
                ),
                array(
                    "isCover"  => 0
                )
            );

            $viewData = new stdClass();

            /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "image";

            $viewData->item_images = $this->urun_image_model->get_all(
                array(
                    "portfolio_id"    => $parent_id
                ), "rank ASC"
            );

            $render_html = $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/render_elements/image_list_v", $viewData, true);

            echo $render_html;

        }
    }

    public function rankSetter(){


        $data = $this->input->post("data");

        parse_str($data, $order);

        $items = $order["ord"];

        foreach ($items as $rank => $id){

            $this->urun_model->update(
                array(
                    "id"        => $id,
                    "rank !="   => $rank
                ),
                array(
                    "rank"      => $rank
                )
            );

        }

    }

    public function imageRankSetter(){


        $data = $this->input->post("data");

        parse_str($data, $order);

        $items = $order["ord"];

        foreach ($items as $rank => $id){

            $this->urun_image_model->update(
                array(
                    "id"        => $id,
                    "rank !="   => $rank
                ),
                array(
                    "rank"      => $rank
                )
            );

        }

    }

    public function image_form($id){

        $viewData = new stdClass();

        /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "image";

        $viewData->item = $this->urun_model->get(
            array(
                "id"    => $id
            )
        );

        $viewData->item_images = $this->urun_image_model->get_all(
            array(
                "portfolio_id"    => $id
            ), "rank ASC"
        );

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function image_upload($id){

        $file_name = convertToSEO(pathinfo($_FILES["file"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);

        $image_255x157  = upload_picture($_FILES["file"]["tmp_name"], "uploads/$this->viewFolder",255,157, $file_name);
        $image_276x171  = upload_picture($_FILES["file"]["tmp_name"], "uploads/$this->viewFolder",276,171, $file_name);
        $image_352x171  = upload_picture($_FILES["file"]["tmp_name"], "uploads/$this->viewFolder",352,171, $file_name);
        $image_1080x426 = upload_picture($_FILES["file"]["tmp_name"], "uploads/$this->viewFolder",1080,426, $file_name);

        if($image_255x157 && $image_276x171 && $image_352x171 && $image_1080x426){

            $this->urun_image_model->add(
                array(
                    "img_url"       => $file_name,
                    "rank"          => 0,
                    "isActive"      => 1,
                    "isCover"       => 0,
                    "createdAt"     => date("Y-m-d H:i:s"),
                    "portfolio_id"  => $id
                )
            );


        } else {
            echo "islem basarisiz";
        }

    }

    public function refresh_image_list($id){

        $viewData = new stdClass();

        /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "image";

        $viewData->item_images = $this->urun_image_model->get_all(
            array(
                "portfolio_id"    => $id
            )
        );

        $render_html = $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/render_elements/image_list_v", $viewData, true);

        echo $render_html;

    }

}
