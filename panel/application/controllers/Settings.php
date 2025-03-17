<?php

class Settings extends CI_Controller
{
    public $viewFolder = "";

    public function __construct()
    {

        parent::__construct();

        $this->viewFolder = "settings_v";

        $this->load->model("settings_model");

        if(!get_active_user()){
            redirect(base_url("login"));
        }

    }

    public function index(){

        $viewData = new stdClass();

        /** Tablodan Verilerin Getirilmesi.. */
        $item = $this->settings_model->get();

        if($item)
            $viewData->subViewFolder = "update";
        else
            $viewData->subViewFolder = "no_content";

        /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->item = $item;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function new_form(){

        $viewData = new stdClass();

        /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "add";

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

    }

    public function save(){


        $this->load->library("form_validation");

        // Kurallar yazilir..

        if($_FILES["logo"]["name"] == ""){

            $alert = array(
                "title" => "İşlem Başarısız",
                "text" => "Masaüstü Logo için lütfen bir görsel seçiniz",
                "type"  => "error"
            );

            // İşlemin Sonucunu Session'a yazma işlemi...
            $this->session->set_flashdata("alert", $alert);

            redirect(base_url("settings/new_form"));

            die();
        }
        if($_FILES["admin_logo"]["name"] == ""){

            $alert = array(
                "title" => "İşlem Başarısız",
                "text" => "Admin Logo için lütfen bir görsel seçiniz",
                "type"  => "error"
            );

            // İşlemin Sonucunu Session'a yazma işlemi...
            $this->session->set_flashdata("alert", $alert);

            redirect(base_url("settings/new_form"));

            die();
        }

        if($_FILES["mobile_logo"]["name"] == ""){

            $alert = array(
                "title" => "İşlem Başarısız",
                "text" => "Mobil Logo için lütfen bir görsel seçiniz",
                "type"  => "error"
            );

            // İşlemin Sonucunu Session'a yazma işlemi...
            $this->session->set_flashdata("alert", $alert);

            redirect(base_url("settings/new_form"));

            die();
        }

        if($_FILES["favicon"]["name"] == ""){

            $alert = array(
                "title" => "İşlem Başarısız",
                "text" => "Favicon için lütfen bir görsel seçiniz",
                "type"  => "error"
            );

            // İşlemin Sonucunu Session'a yazma işlemi...
            $this->session->set_flashdata("alert", $alert);

            redirect(base_url("settings/new_form"));

            die();
        }

        $this->form_validation->set_rules("company_name", "Şirket Adı", "required|trim");

        $this->form_validation->set_message(
            array(
                "required"     => "<b>{field}</b> alanı doldurulmalıdır",
                "valid_email"  => "Lütfen geçerli bir <b>{field}</b> giriniz"
            )
        );

        // Form Validation Calistirilir..
        $validate = $this->form_validation->run();

        if($validate){

            // Upload Süreci...

            $file_name = convertToSEO(pathinfo($_FILES["img_url"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["img_url"]["name"], PATHINFO_EXTENSION);
            $image_207x50 = upload_picture($_FILES["img_url"]["tmp_name"], "uploads/$this->viewFolder",1280,720, $file_name);

            $file_name1 = convertToSEO(pathinfo($_FILES["img_url"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["img_url"]["name"], PATHINFO_EXTENSION);
            $image_230x100 = upload_picture($_FILES["img_url"]["tmp_name"], "uploads/$this->viewFolder",1280,720, $file_name);

            $file_name2 = convertToSEO(pathinfo($_FILES["img_url"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["img_url"]["name"], PATHINFO_EXTENSION);
            $image_300x70 = upload_picture($_FILES["img_url"]["tmp_name"], "uploads/$this->viewFolder",1280,720, $file_name);

            $file_name3 = convertToSEO(pathinfo($_FILES["img_url"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["img_url"]["name"], PATHINFO_EXTENSION);
            $image_32x32 = upload_picture($_FILES["img_url"]["tmp_name"], "uploads/$this->viewFolder",32,32, $file_name);


            if($image_207x50 && $image_230x100 && $image_300x70 && $image_32x32){

                $insert = $this->settings_model->add(
                    array(
                        "company_name"  => $this->input->post("company_name"),
                        "slogan"      => $this->input->post("slogan"),
                        "sloganhak"      => $this->input->post("sloganhak"),
                        "baslikhak"      => $this->input->post("baslikhak"),
                        "phone_1"       => $this->input->post("phone_1"),
                        "phone_2"       => $this->input->post("phone_2"),
                        "fax_1"         => $this->input->post("fax_1"),
                        "fax_2"         => $this->input->post("fax_2"),
                        "address"       => $this->input->post("address"),
                        "about_us"      => $this->input->post("about_us"),
                        "mission"       => $this->input->post("mission"),
                        "vision"        => $this->input->post("vision"),
                        "email"         => $this->input->post("email"),
                        "facebook"      => $this->input->post("facebook"),
                        "youtube"      => $this->input->post("youtube"),
                        "google"      => $this->input->post("google"),
                        "description"      => $this->input->post("description"),
                        "keywords"      => $this->input->post("keywords"),
                        "twitter"       => $this->input->post("twitter"),
                        "instagram"     => $this->input->post("instagram"),
                        "linkedin"      => $this->input->post("linkedin"),
                        "android"      => $this->input->post("android"),
                        "ios"      => $this->input->post("ios"),
                        "logo"          => $file_name,
                        "admin_logo"    => $file_name1,
                        "mobile_logo"   => $file_name2,
                        "favicon"       => $file_name3,
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

            } else {

                $alert = array(
                    "title" => "İşlem Başarısız",
                    "text" => "Görsel yüklenirken bir problem oluştu",
                    "type"  => "error"
                );

                $this->session->set_flashdata("alert", $alert);

                redirect(base_url("settings/new_form"));

                die();

            }

            // İşlemin Sonucunu Session'a yazma işlemi...
            $this->session->set_flashdata("alert", $alert);

            redirect(base_url("settings"));

        } else {

            $viewData = new stdClass();

            /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "add";
            $viewData->form_error = true;

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }

    }

    public function update_form($id){

        $viewData = new stdClass();

        /** Tablodan Verilerin Getirilmesi.. */
        $item = $this->settings_model->get(
            array(
                "id"    => $id,
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

        $this->form_validation->set_rules("company_name", "Şirket Adı", "required|trim");
        $this->form_validation->set_rules("phone_1", "Telefon 1", "required|trim");
        $this->form_validation->set_rules("email", "E-posta Adresi", "required|trim|valid_email");


        $this->form_validation->set_message(
            array(
                "required"  => "<b>{field}</b> alanı doldurulmalıdır",
                "valid_email"  => "Lütfen geçerli bir <b>{field}</b> giriniz"
            )
        );

        // Form Validation Calistirilir..
        $validate = $this->form_validation->run();

        if($validate){


            $data = array(
                "company_name"  => $this->input->post("company_name"),
                "slogan"  => $this->input->post("slogan"),
                "sloganhak"      => $this->input->post("sloganhak"),
                "baslikhak"      => $this->input->post("baslikhak"),
                "phone_1"       => $this->input->post("phone_1"),
                "phone_2"       => $this->input->post("phone_2"),
                "fax_1"         => $this->input->post("fax_1"),
                "fax_2"         => $this->input->post("fax_2"),
                "address"       => $this->input->post("address"),
                "about_us"      => $this->input->post("about_us"),
                "mission"       => $this->input->post("mission"),
                "vision"        => $this->input->post("vision"),
                "email"         => $this->input->post("email"),
                "facebook"      => $this->input->post("facebook"),
                "youtube"      => $this->input->post("youtube"),
                "google"      => $this->input->post("google"),
                "description"      => $this->input->post("description"),
                "keywords"      => $this->input->post("keywords"),
                "android"      => $this->input->post("android"),
                "ios"      => $this->input->post("ios"),
                "twitter"       => $this->input->post("twitter"),
                "instagram"     => $this->input->post("instagram"),
                "linkedin"      => $this->input->post("linkedin"),
                "haritakodu"      => $this->input->post("haritakodu"),
                "haritaurl"      => $this->input->post("haritaurl"),
                "loaderyazi"      => $this->input->post("loaderyazi"),
                "tanitimvideo"      => $this->input->post("tanitimvideo"),
                "renk1"      => $this->input->post("renk1"),
                "renk2"      => $this->input->post("renk2"),
                "headerkod"      => $this->input->post("headerkod"),
                "footerkod"      => $this->input->post("footerkod"),
                "copy"      => $this->input->post("copy"),
                "updatedAt"     => date("Y-m-d H:i:s")
            );

            // Masaüstü Logosu için Upload Süreci...
            // Upload Süreci...
            if($_FILES["logo"]["name"] !== "") {

                $file_name = convertToSEO(pathinfo($_FILES["logo"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["logo"]["name"], PATHINFO_EXTENSION);

                $image_170x130 = upload_picture($_FILES["logo"]["tmp_name"], "uploads/$this->viewFolder",1280,720, $file_name);

                if($image_170x130){

                    $data = array(
                        "logo" => $file_name,
                    );

                } else {

                    $alert = array(
                        "title" => "İşlem Başarısız",
                        "text" => "Görsel yüklenirken bir problem oluştu",
                        "type" => "error"
                    );

                    $this->session->set_flashdata("alert", $alert);

                    redirect(base_url("brands/update_form/$id"));

                    die();

                }

            }

            // Admin Logosu için Upload Süreci...
            // Upload Süreci...
            if($_FILES["admin_logo"]["name"] !== "") {

                $file_name = convertToSEO(pathinfo($_FILES["admin_logo"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["admin_logo"]["name"], PATHINFO_EXTENSION);

                $image_170x1301 = upload_picture($_FILES["admin_logo"]["tmp_name"], "uploads/$this->viewFolder",1280,720, $file_name);

                if($image_170x1301){

                    $data = array(
                        "admin_logo" => $file_name,
                    );

                } else {

                    $alert = array(
                        "title" => "İşlem Başarısız",
                        "text" => "Görsel yüklenirken bir problem oluştu",
                        "type" => "error"
                    );

                    $this->session->set_flashdata("alert", $alert);

                    redirect(base_url("brands/update_form/$id"));

                    die();

                }

            }

            // Mobil Logosu için Upload Süreci...
            // Upload Süreci...
            if($_FILES["mobile_logo"]["name"] !== "") {

                $file_name = convertToSEO(pathinfo($_FILES["mobile_logo"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["mobile_logo"]["name"], PATHINFO_EXTENSION);

                $image_170x1302 = upload_picture($_FILES["mobile_logo"]["tmp_name"], "uploads/$this->viewFolder",1280,720, $file_name);

                if($image_170x1302){

                    $data = array(
                        "mobile_logo" => $file_name,
                    );

                } else {

                    $alert = array(
                        "title" => "İşlem Başarısız",
                        "text" => "Görsel yüklenirken bir problem oluştu",
                        "type" => "error"
                    );

                    $this->session->set_flashdata("alert", $alert);

                    redirect(base_url("brands/update_form/$id"));

                    die();

                }

            }

            // Favicon için Upload Süreci...
            // Upload Süreci...
            if($_FILES["favicon"]["name"] !== "") {

                $file_name = convertToSEO(pathinfo($_FILES["favicon"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["favicon"]["name"], PATHINFO_EXTENSION);

                $image_170x1303 = upload_picture($_FILES["favicon"]["tmp_name"], "uploads/$this->viewFolder",32,32, $file_name);

                if($image_170x1303){

                    $data = array(
                        "favicon" => $file_name,
                    );

                } else {

                    $alert = array(
                        "title" => "İşlem Başarısız",
                        "text" => "Görsel yüklenirken bir problem oluştu",
                        "type" => "error"
                    );

                    $this->session->set_flashdata("alert", $alert);

                    redirect(base_url("brands/update_form/$id"));

                    die();

                }

            }

            // Beyaz Logo için Upload Süreci...
            // Upload Süreci...
            if($_FILES["beyazlogo"]["name"] !== "") {

                $file_name = convertToSEO(pathinfo($_FILES["beyazlogo"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["beyazlogo"]["name"], PATHINFO_EXTENSION);

                $image_170x13044 = upload_picture($_FILES["beyazlogo"]["tmp_name"], "uploads/$this->viewFolder",1280,720, $file_name);

                if($image_170x13044){

                    $data = array(
                        "beyazlogo" => $file_name,
                    );

                } else {

                    $alert = array(
                        "title" => "İşlem Başarısız",
                        "text" => "Görsel yüklenirken bir problem oluştu",
                        "type" => "error"
                    );

                    $this->session->set_flashdata("alert", $alert);

                    redirect(base_url("brands/update_form/$id"));

                    die();

                }

            }

            // headerhakkimizda için Upload Süreci...
            // Upload Süreci...
            if($_FILES["headerhakkimizda"]["name"] !== "") {

                $file_name = convertToSEO(pathinfo($_FILES["headerhakkimizda"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["headerhakkimizda"]["name"], PATHINFO_EXTENSION);

                $image_1920x488 = upload_picture($_FILES["headerhakkimizda"]["tmp_name"], "uploads/$this->viewFolder",1920,488, $file_name);

                if($image_1920x488){

                    $data = array(
                        "headerhakkimizda" => $file_name,
                    );

                } else {

                    $alert = array(
                        "title" => "İşlem Başarısız",
                        "text" => "Görsel yüklenirken bir problem oluştu",
                        "type" => "error"
                    );

                    $this->session->set_flashdata("alert", $alert);

                    redirect(base_url("brands/update_form/$id"));

                    die();

                }

            }

            // headermusteri için Upload Süreci...
            // Upload Süreci...
            if($_FILES["headermusteri"]["name"] !== "") {

                $file_name = convertToSEO(pathinfo($_FILES["headermusteri"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["headermusteri"]["name"], PATHINFO_EXTENSION);

                $image_1920x488 = upload_picture($_FILES["headermusteri"]["tmp_name"], "uploads/$this->viewFolder",1920,488, $file_name);

                if($image_1920x488){

                    $data = array(
                        "headermusteri" => $file_name,
                    );

                } else {

                    $alert = array(
                        "title" => "İşlem Başarısız",
                        "text" => "Görsel yüklenirken bir problem oluştu",
                        "type" => "error"
                    );

                    $this->session->set_flashdata("alert", $alert);

                    redirect(base_url("brands/update_form/$id"));

                    die();

                }

            }

            // headerbolumici için Upload Süreci...
            // Upload Süreci...
            if($_FILES["headerbolumler"]["name"] !== "") {

                $file_name = convertToSEO(pathinfo($_FILES["headerbolumler"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["headerbolumler"]["name"], PATHINFO_EXTENSION);

                $image_1920x488 = upload_picture($_FILES["headerbolumler"]["tmp_name"], "uploads/$this->viewFolder",1920,488, $file_name);

                if($image_1920x488){

                    $data = array(
                        "headerbolumler" => $file_name,
                    );

                } else {

                    $alert = array(
                        "title" => "İşlem Başarısız",
                        "text" => "Görsel yüklenirken bir problem oluştu",
                        "type" => "error"
                    );

                    $this->session->set_flashdata("alert", $alert);

                    redirect(base_url("brands/update_form/$id"));

                    die();

                }

            }

            // headerbolumici için Upload Süreci...
            // Upload Süreci...
            if($_FILES["headerbolumici"]["name"] !== "") {

                $file_name = convertToSEO(pathinfo($_FILES["headerbolumici"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["headerbolumici"]["name"], PATHINFO_EXTENSION);

                $image_1920x488 = upload_picture($_FILES["headerbolumici"]["tmp_name"], "uploads/$this->viewFolder",1920,488, $file_name);

                if($image_1920x488){

                    $data = array(
                        "headerbolumici" => $file_name,
                    );

                } else {

                    $alert = array(
                        "title" => "İşlem Başarısız",
                        "text" => "Görsel yüklenirken bir problem oluştu",
                        "type" => "error"
                    );

                    $this->session->set_flashdata("alert", $alert);

                    redirect(base_url("brands/update_form/$id"));

                    die();

                }

            }

            // headerfoto için Upload Süreci...
            // Upload Süreci...
            if($_FILES["headerfoto"]["name"] !== "") {

                $file_name = convertToSEO(pathinfo($_FILES["headerfoto"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["headerfoto"]["name"], PATHINFO_EXTENSION);

                $image_1920x488 = upload_picture($_FILES["headerfoto"]["tmp_name"], "uploads/$this->viewFolder",1920,488, $file_name);

                if($image_1920x488){

                    $data = array(
                        "headerfoto" => $file_name,
                    );

                } else {

                    $alert = array(
                        "title" => "İşlem Başarısız",
                        "text" => "Görsel yüklenirken bir problem oluştu",
                        "type" => "error"
                    );

                    $this->session->set_flashdata("alert", $alert);

                    redirect(base_url("brands/update_form/$id"));

                    die();

                }

            }

            // headerfoto için Upload Süreci...
            // Upload Süreci...
            if($_FILES["headervideo"]["name"] !== "") {

                $file_name = convertToSEO(pathinfo($_FILES["headervideo"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["headervideo"]["name"], PATHINFO_EXTENSION);

                $image_1920x488 = upload_picture($_FILES["headervideo"]["tmp_name"], "uploads/$this->viewFolder",1920,488, $file_name);

                if($image_1920x488){

                    $data = array(
                        "headervideo" => $file_name,
                    );

                } else {

                    $alert = array(
                        "title" => "İşlem Başarısız",
                        "text" => "Görsel yüklenirken bir problem oluştu",
                        "type" => "error"
                    );

                    $this->session->set_flashdata("alert", $alert);

                    redirect(base_url("brands/update_form/$id"));

                    die();

                }

            }

            // headerdoktor için Upload Süreci...
            // Upload Süreci...
            if($_FILES["headerdoktor"]["name"] !== "") {

                $file_name = convertToSEO(pathinfo($_FILES["headerdoktor"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["headerdoktor"]["name"], PATHINFO_EXTENSION);

                $image_1920x488 = upload_picture($_FILES["headerdoktor"]["tmp_name"], "uploads/$this->viewFolder",1920,488, $file_name);

                if($image_1920x488){

                    $data = array(
                        "headerdoktor" => $file_name,
                    );

                } else {

                    $alert = array(
                        "title" => "İşlem Başarısız",
                        "text" => "Görsel yüklenirken bir problem oluştu",
                        "type" => "error"
                    );

                    $this->session->set_flashdata("alert", $alert);

                    redirect(base_url("brands/update_form/$id"));

                    die();

                }

            }

            // headerdoktorici için Upload Süreci...
            // Upload Süreci...
            if($_FILES["headerdoktorici"]["name"] !== "") {

                $file_name = convertToSEO(pathinfo($_FILES["headerdoktorici"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["headerdoktorici"]["name"], PATHINFO_EXTENSION);

                $image_1920x488 = upload_picture($_FILES["headerdoktorici"]["tmp_name"], "uploads/$this->viewFolder",1920,488, $file_name);

                if($image_1920x488){

                    $data = array(
                        "headerdoktorici" => $file_name,
                    );

                } else {

                    $alert = array(
                        "title" => "İşlem Başarısız",
                        "text" => "Görsel yüklenirken bir problem oluştu",
                        "type" => "error"
                    );

                    $this->session->set_flashdata("alert", $alert);

                    redirect(base_url("brands/update_form/$id"));

                    die();

                }

            }

            // headerblog için Upload Süreci...
            // Upload Süreci...
            if($_FILES["headerblog"]["name"] !== "") {

                $file_name = convertToSEO(pathinfo($_FILES["headerblog"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["headerblog"]["name"], PATHINFO_EXTENSION);

                $image_1920x488 = upload_picture($_FILES["headerblog"]["tmp_name"], "uploads/$this->viewFolder",1920,488, $file_name);

                if($image_1920x488){

                    $data = array(
                        "headerblog" => $file_name,
                    );

                } else {

                    $alert = array(
                        "title" => "İşlem Başarısız",
                        "text" => "Görsel yüklenirken bir problem oluştu",
                        "type" => "error"
                    );

                    $this->session->set_flashdata("alert", $alert);

                    redirect(base_url("brands/update_form/$id"));

                    die();

                }

            }

            // headerblogici için Upload Süreci...
            // Upload Süreci...
            if($_FILES["headerblogici"]["name"] !== "") {

                $file_name = convertToSEO(pathinfo($_FILES["headerblogici"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["headerblogici"]["name"], PATHINFO_EXTENSION);

                $image_1920x488 = upload_picture($_FILES["headerblogici"]["tmp_name"], "uploads/$this->viewFolder",1920,488, $file_name);

                if($image_1920x488){

                    $data = array(
                        "headerblogici" => $file_name,
                    );

                } else {

                    $alert = array(
                        "title" => "İşlem Başarısız",
                        "text" => "Görsel yüklenirken bir problem oluştu",
                        "type" => "error"
                    );

                    $this->session->set_flashdata("alert", $alert);

                    redirect(base_url("brands/update_form/$id"));

                    die();

                }

            }

            // headeriletisim için Upload Süreci...
            // Upload Süreci...
            if($_FILES["headeriletisim"]["name"] !== "") {

                $file_name = convertToSEO(pathinfo($_FILES["headeriletisim"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["headeriletisim"]["name"], PATHINFO_EXTENSION);

                $image_1920x488 = upload_picture($_FILES["headeriletisim"]["tmp_name"], "uploads/$this->viewFolder",1920,488, $file_name);

                if($image_1920x488){

                    $data = array(
                        "headeriletisim" => $file_name,
                    );

                } else {

                    $alert = array(
                        "title" => "İşlem Başarısız",
                        "text" => "Görsel yüklenirken bir problem oluştu",
                        "type" => "error"
                    );

                    $this->session->set_flashdata("alert", $alert);

                    redirect(base_url("brands/update_form/$id"));

                    die();

                }

            }

            // kurumsalfoto için Upload Süreci...
            // Upload Süreci...
            if($_FILES["kurumsalfoto"]["name"] !== "") {

                $file_name = convertToSEO(pathinfo($_FILES["kurumsalfoto"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["kurumsalfoto"]["name"], PATHINFO_EXTENSION);

                $image_748x804 = upload_picture($_FILES["kurumsalfoto"]["tmp_name"], "uploads/$this->viewFolder",748,804, $file_name);

                if($image_748x804){

                    $data = array(
                        "kurumsalfoto" => $file_name,
                    );

                } else {

                    $alert = array(
                        "title" => "İşlem Başarısız",
                        "text" => "Görsel yüklenirken bir problem oluştu",
                        "type" => "error"
                    );

                    $this->session->set_flashdata("alert", $alert);

                    redirect(base_url("brands/update_form/$id"));

                    die();

                }

            }

            // merakfoto için Upload Süreci...
            // Upload Süreci...
            if($_FILES["merakfoto"]["name"] !== "") {

                $file_name = convertToSEO(pathinfo($_FILES["merakfoto"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["merakfoto"]["name"], PATHINFO_EXTENSION);

                $image_946x938 = upload_picture($_FILES["merakfoto"]["tmp_name"], "uploads/$this->viewFolder",946,938, $file_name);

                if($image_946x938){

                    $data = array(
                        "merakfoto" => $file_name,
                    );

                } else {

                    $alert = array(
                        "title" => "İşlem Başarısız",
                        "text" => "Görsel yüklenirken bir problem oluştu",
                        "type" => "error"
                    );

                    $this->session->set_flashdata("alert", $alert);

                    redirect(base_url("brands/update_form/$id"));

                    die();

                }

            }

            // musteriyorumfoto için Upload Süreci...
            // Upload Süreci...
            if($_FILES["musteriyorumfoto"]["name"] !== "") {

                $file_name = convertToSEO(pathinfo($_FILES["musteriyorumfoto"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["musteriyorumfoto"]["name"], PATHINFO_EXTENSION);

                $image_974x845 = upload_picture($_FILES["musteriyorumfoto"]["tmp_name"], "uploads/$this->viewFolder",974,845, $file_name);

                if($image_974x845){

                    $data = array(
                        "musteriyorumfoto" => $file_name,
                    );

                } else {

                    $alert = array(
                        "title" => "İşlem Başarısız",
                        "text" => "Görsel yüklenirken bir problem oluştu",
                        "type" => "error"
                    );

                    $this->session->set_flashdata("alert", $alert);

                    redirect(base_url("brands/update_form/$id"));

                    die();

                }

            }


            $update = $this->settings_model->update(array("id" => $id), $data);

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
                    "text" => "Kayıt Güncelleme sırasında bir problem oluştu",
                    "type"  => "error"
                );
            }


            // Session Update İşlemi

            $settings = $this->settings_model->get();
            $this->session->set_userdata("settings", $settings);

            // İşlemin Sonucunu Session'a yazma işlemi...
            $this->session->set_flashdata("alert", $alert);

            redirect(base_url("settings"));

        } else {

            $viewData = new stdClass();

            /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "update";
            $viewData->form_error = true;

            /** Tablodan Verilerin Getirilmesi.. */
            $viewData->item = $this->settings_model->get(
                array(
                    "id"    => $id,
                )
            );

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }

    }


}
