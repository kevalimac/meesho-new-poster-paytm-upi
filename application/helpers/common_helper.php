<?php

function isMobileDevice()
{
    // if ($_SERVER['HTTP_HOST'] != 'localhost') {

    //     $userAgent = $_SERVER['HTTP_USER_AGENT'];
    //     $mobileKeywords = array('Android', 'iPhone', 'iPad', 'Windows Phone', 'BlackBerry', 'Opera Mini', 'Mobile');

    //     foreach ($mobileKeywords as $keyword) {
    //         if (stripos($userAgent, $keyword) !== false) {
    //             return true;
    //         }
    //     }
    //     // Request is not from a mobile device
    //     header("HTTP/1.1 403 Forbidden");
    //     // echo "Access Forbidden.";
    //     exit();
    // }
}


function load_error_page($title, $description)
{
    $ci = &get_instance();

    $data['title'] = $title;
    $data['description'] = $description;

    $data['page_title'] = $title . " - " . WEBSITE;
    $data['page_description'] = $description;
    $data['page_keyword'] = "";

    $ci->load->view("stripe/error", $data);
}

function decrypt_auth_url($code)
{
    @$code = str_replace(' ', '+', @$code);
    return decrypt_token(@$code);
}
function genrate_random_key($n)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';

    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    }

    return $randomString;
}

function encryptData($password)
{
    $ci = &get_instance();

    // LOAD CONFIG FILE OF PASSWORD
    $ci->load->config('manage_password', true);

    $keys = $ci->config->item('keys', 'manage_password');
    $another_key = $ci->config->item('another_key', 'manage_password');

    // CONVERT PASSWORD STRING TO ARRAY
    $pass_split = str_split($password);

    $password_array = array();

    foreach ($pass_split as $split_key => $split_value) {
        if (array_key_exists($split_value, $keys)) {

            $password_array[] = $keys[$split_value];
        } else {

            $password_array[] = $another_key;
        }
    }

    return md5(implode('', $password_array));
}

function decrypt_token($string)
{
    $ci = &get_instance();

    $decrypt_string = $ci->encryption->decrypt($string);

    if ($decrypt_string) {
        $arr = str_split($decrypt_string);

        $first_arr = cipher_conver($arr, 3, true);
        $second_arr = cipher_conver($first_arr, 2, true);
        $third_arr = cipher_conver($second_arr, 1, true);

        $token_data = implode("", $third_arr);
        return $token_data;
    } else {
        return false;
    }
}

function encrypt_token($string)
{
    $ci = &get_instance();

    $first_arr = str_split($string);

    // First step
    $first_arr = cipher_conver($first_arr, 1);
    // Second Stap
    $second_arr = cipher_conver($first_arr, 2);

    // Third Stap
    $third_arr = cipher_conver($second_arr, 3);

    $string = implode("", $third_arr);
    $final_string = $ci->encryption->encrypt($string);

    return $final_string;
}

function cipher_conver($string_arr, $step, $decrypt = false)
{
    $ci = &get_instance();

    $cipher = cipher_keys($step);
    $str_arr = array();

    if (!$decrypt) {

        foreach ($string_arr as $str) {
            $str = strval($str);

            if (array_search($str, $cipher) || is_integer(array_search($str, $cipher))) {

                $str_arr[] = array_search($str, $cipher);
            } else {

                $str_arr[] = $str;
            }
        }
    } else {

        foreach ($string_arr as $str) {

            $str = strval($str);
            if (@is_integer(@array_keys($cipher, $str)[0]) || @array_keys($cipher, $str)[0]) {
                $get_key = array_keys($cipher, $str)[0];
                $str_arr[] = $cipher[$cipher[$get_key]];
            } else {

                $str_arr[] = $str;
            }
        }
    }

    return $str_arr;
}

function cipher_keys($step)
{
    if ($step == 1) {
        $cipher = array(
            "^" => "m",
            '"' => "(",
            "@" => "+",
            "#" => "Z",
            ";" => "R",
            "9" => "S",
            "y" => "F",
            "d" => "W",
            "=" => "n",
            "." => "j",
            "X" => "a",
            "]" => "8",
            "r" => "I",
            "L" => "D",
            "(" => "3",
            "M" => ".",
            "3" => "x",
            "G" => "A",
            "C" => "9",
            "j" => "5",
            "b" => "E",
            "k" => "s",
            "w" => "b",
            "{" => "o",
            "%" => "&",
            "+" => "_",
            "i" => "G",
            "a" => "@",
            "t" => ",",
            "|" => "M",
            "Z" => "1",
            "[" => "'",
            "-" => "4",
            "!" => "$",
            "J" => "#",
            "5" => "l",
            "n" => "!",
            "g" => "q",
            "4" => "i",
            "B" => "|",
            "K" => "6",
            ">" => "}",
            "D" => "]",
            "c" => "^",
            "7" => "<",
            "2" => "H",
            "S" => "Q",
            ":" => "-",
            "~" => "P",
            "v" => "u",
            "s" => "z",
            "m" => "7",
            "e" => "J",
            "P" => "%",
            "V" => "d",
            "U" => "U",
            "Y" => "y",
            "I" => '"',
            "p" => "{",
            "z" => ";",
            "N" => "V",
            ")" => ">",
            "/" => "k",
            "h" => "~",
            "H" => "f",
            "f" => ")",
            "6" => "r",
            "W" => "v",
            "R" => "L",
            "_" => "2",
            "'" => "p",
            "x" => "c",
            "u" => ":",
            "E" => "B",
            "0" => "Y",
            "F" => "w",
            "&" => "[",
            "," => "O",
            "?" => "0",
            "1" => "=",
            "A" => "X",
            "*" => "g",
            "}" => "h",
            "T" => "t",
            "q" => "e",
            "$" => "?",
            "o" => "`",
            "8" => "/",
            "`" => "C",
            "l" => "K",
            "<" => "*",
            "O" => "T",
            "Q" => "N",
            " " => " ",
            "€" => "€",
        );
    } elseif ($step == 2) {
        $cipher = array(
            "o" => "3",
            "M" => "G",
            "$" => "d",
            "c" => "{",
            "s" => "#",
            "C" => "h",
            "B" => "Y",
            "h" => "0",
            "." => "K",
            "G" => "n",
            ">" => "_",
            "b" => "p",
            "[" => "-",
            "~" => "T",
            "Z" => "C",
            "m" => "5",
            ":" => "Q",
            "r" => "'",
            "!" => "?",
            "x" => "P",
            "+" => ";",
            "-" => "4",
            "O" => "A",
            "<" => "(",
            "P" => "2",
            "2" => "@",
            "z" => "S",
            "F" => "V",
            "3" => "X",
            "g" => "O",
            "U" => "+",
            "T" => "6",
            "7" => "x",
            "u" => "g",
            "J" => "e",
            "n" => "`",
            "1" => "i",
            "j" => "9",
            "w" => "Z",
            "N" => "7",
            "0" => "j",
            "8" => ",",
            "a" => "}",
            "X" => "F",
            "(" => "^",
            "I" => "J",
            "y" => "[",
            "/" => "&",
            "`" => "m",
            "&" => "U",
            "i" => "*",
            "H" => "w",
            "#" => "M",
            "4" => "D",
            "t" => ")",
            "R" => "o",
            "S" => ":",
            "," => "W",
            "5" => "r",
            "v" => "B",
            ";" => "]",
            "K" => "H",
            "f" => "E",
            "%" => "$",
            "q" => "b",
            "k" => "<",
            "6" => "l",
            "?" => "f",
            "A" => "!",
            "@" => "~",
            '"' => "1",
            "p" => "y",
            "E" => "s",
            "*" => "|",
            "L" => "8",
            "]" => ".",
            "'" => "N",
            "9" => "k",
            "W" => "a",
            "|" => "v",
            "D" => "q",
            ")" => "L",
            "l" => "z",
            "=" => "R",
            "}" => "u",
            "Q" => '"',
            "e" => "=",
            "Y" => "t",
            "{" => "%",
            "V" => "c",
            "^" => "/",
            "d" => "I",
            "_" => ">",
            " " => " ",
            "€" => "€",
        );
    } else {
        $cipher = array(
            "[" => "Y",
            ":" => "t",
            "5" => "b",
            "p" => "D",
            "N" => ":",
            "w" => "z",
            "b" => "V",
            "F" => "_",
            "t" => "N",
            "o" => "y",
            "I" => "5",
            "U" => "{",
            "M" => "h",
            "k" => "C",
            "|" => ">",
            '"' => "^",
            "*" => "6",
            "]" => "/",
            "(" => "B",
            "8" => "s",
            "S" => "$",
            "T" => "g",
            ")" => "?",
            "V" => "2",
            "O" => "I",
            "X" => "+",
            "#" => "K",
            "2" => "L",
            "~" => "R",
            "7" => "Q",
            "Q" => "F",
            "W" => "w",
            "x" => "e",
            "6" => "}",
            "$" => ",",
            "4" => "c",
            "_" => "d",
            "Y" => "-",
            "G" => "#",
            "0" => "|",
            "H" => "7",
            "9" => "G",
            "f" => "J",
            "y" => "~",
            "?" => "M",
            "-" => "q",
            "'" => "[",
            "c" => "`",
            "," => "S",
            "A" => "a",
            "n" => "k",
            "/" => "]",
            "L" => "A",
            "P" => "9",
            "a" => "8",
            "v" => ")",
            "z" => "r",
            "C" => "P",
            "D" => "0",
            "!" => "O",
            ";" => '"',
            "@" => "'",
            "K" => "W",
            "J" => "4",
            ">" => "u",
            "d" => "v",
            "1" => "Z",
            "R" => "%",
            "i" => "@",
            "{" => "3",
            's' => "p",
            "3" => "X",
            "l" => "!",
            "%" => "<",
            "E" => "m",
            "." => "f",
            "m" => "=",
            "+" => "x",
            "}" => "i",
            "q" => "1",
            "Z" => "o",
            "<" => "U",
            "r" => "n",
            "g" => "E",
            "`" => "(",
            "h" => 'T',
            "u" => "H",
            "B" => ".",
            "e" => "&",
            "j" => ";",
            "^" => "*",
            "=" => "l",
            "&" => "j",
            " " => " ",
            "€" => "€",
        );
    }
    return $cipher;
}

function time_elapsed_string($datetime, $full = false)
{
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}

function check_is_mobile()
{
    return is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "mobile"));
}

function set_message($type, $msg)
{
    $ci = &get_instance();
    $ci->session->set_flashdata($type, $msg);
    return true;
}

function get_message($type)
{
    $ci = &get_instance();
    return $ci->session->flashdata($type);
}

function is_logged()
{
    $ci = &get_instance();
    if ($ci->session->userdata('adminId') > 0) {
        return true;
    } else {
        return false;
    }
}
function checkLanguage()
{
    $CI = &get_instance();

    if (@$_GET['lan']) {
        $language = @$_GET['lan'];
        $CI->session->set_userdata("lan", $language);
    } else if (@$CI->session->userdata("lan")) {
        $language = @$CI->session->userdata("lan") ?? "en";
    } else {
        $language = 'en';
    }
    return  $language;
}

function error_404()
{
    $CI = &get_instance();
    $CI->output->set_status_header('404');

    $data['page_title'] = "Error 404";
    $data['page_name'] = "Error 404";
    $data['load_page'] = "custom_error/error_404";
    $CI->load->view("common_template/common", $data);
}

function clean_string($string)
{
    $string = str_replace(' ', '', $string); // Replaces all spaces with hyphens.
    $string = str_replace('-', '', $string); // Replaces all spaces with hyphens.

    return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}

function clean($string)
{
    $string = str_replace('-', '', $string); // Replaces all spaces with hyphens.
    $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
    return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}

function clean_slug($string)
{
    $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
    return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}

function clean_number($string)
{
    $string = str_replace('-', '', $string); // Replaces all spaces with hyphens.
    return $string;
}

function clean_value($number)
{
    return (float) str_replace(',', '', $number);
}

function check_all_headers()
{
    $CI = &get_instance();
    header('Accept: */*');
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization, Client-Service, Auth-Key, Token');
    header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH');
    $CI->model->check_auth_client(); // check  auth client
}

function get_ip()
{
    return $_SERVER['REMOTE_ADDR'];
}

function method($check_method)
{
    $request_method = $_SERVER['REQUEST_METHOD'];

    if ($request_method != $check_method) {

        $ci = &get_instance();
        $response['error'] = 1;
        $response['msg'] = 'Method Not Allowed';

        sendData(200, $response);
        return false;
    } else {

        if ($check_method == "POST") {
            if (!counts($_POST)) {
                $json = file_get_contents('php://input');
                $_POST = (array) json_decode($json);
            }
        }
        return true;
    }
}

function country_call_url($ip, $base_currency = "USD")
{
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'http://datingapps.yellowsparrowtechnologies.com/Android/IpDetail?ip=' . $ip . '&base_currency=' . $base_currency,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_SSL_VERIFYPEER => FALSE,
        CURLOPT_SSL_VERIFYHOST => FALSE
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    return $response;
}

function gameDistributionCurl($url = null)
{
    try {

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        //for debug only!
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        $resp = curl_exec($curl);
        curl_close($curl);
        return json_decode($resp, true);
    } catch (Exception $error) {
        return array();
    }
}

function url()
{
    return sprintf(
        "%s://%s%s",
        isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
        $_SERVER['SERVER_NAME'],
        $_SERVER['REQUEST_URI']
    );
}

function sendData($statusHeader, $response)
{
    $ci = &get_instance();
    $ci->output->set_status_header($statusHeader);
    header('Content-Type: application/json');
    echo json_encode(@$response);
}

function counts($arrayValue)
{
    return is_array($arrayValue) ? sizeof($arrayValue) : 0;
}

function pre($str)
{ //Print prev screen for array
    echo '<pre>';
    print_r($str);
    echo '</pre>';
}

function qry()
{ //print last executed query
    $CI = &get_instance();
    pre($CI->db->last_query());
}


function convert_to_webp($img_url, $image_name, $folder, $remove_image = true)
{
    if (str_contains($img_url, ".png") || str_contains($img_url, ".jpg") || str_contains($img_url, ".jpeg")) {
        $full_url = base_url($img_url);
        $jpg = @imagecreatefromjpeg($img_url);

        if (!$jpg) {    // If is an error then save locally and then convert 
            $jpg = @imagecreatefrompng($img_url);
            // $ext = pathinfo($full_url, PATHINFO_EXTENSION);
            // $binary = imagecreatefromstring(file_get_contents($full_url));
            // $temp_file_name = "upload/temp-img/" . $image_name . '.' . $ext;
            // imageJpeg($binary, $temp_file_name, 80);
            // $jpg = @imagecreatefromjpeg($temp_file_name);
        }
        $file_name = 'upload/' . $folder . '/' . $image_name . '.webp';
        if ($jpg) {
            $w = @imagesx($jpg);
            $h = @imagesy($jpg);
        } else {
            $image_data = @getimagesize($full_url);
            $w = @$image_data[0];
            $h = @$image_data[1];
        }

        if ($w > 0 && $h > 0 && $jpg) {
            $webp = @imagecreatetruecolor($w, $h);
            @imagecopy($webp, $jpg, 0, 0, 0, 0, $w, $h);
            @imagewebp($webp, $file_name, 100);
            @imagedestroy($jpg);
            @imagedestroy($webp);
            if (@$remove_image) {
                @unlink($img_url);
            }
            // @unlink(@$temp_file_name);
            return $file_name;
        } else {
            return $img_url;
        }
    } else {

        return $img_url;
    }
}

function uploadFile($uploadFile, $filetype, $folder, $fileName = '', $file_resize = "")
{
    $CI = &get_instance();

    $resultArr = array();

    $config['max_size'] = '10000000';

    if ($filetype == 'img')
        $config['allowed_types'] = 'gif|jpg|png|jpeg|webp|JPEG|JPG|PNG|GIF|WEBP';

    if ($filetype == 'All')
        $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|doc|docx|zip|xls';

    if ($filetype == 'csv')
        $config['allowed_types'] = 'csv';

    if ($filetype == 'swf')
        $config['allowed_types'] = 'swf';

    if ($filetype == 'mp3')
        $config['allowed_types'] = 'mp4|mp3|wma|wav|.ra|.ram|.rm|.mid|.ogg';

    if ($filetype == '*')
        $config['allowed_types'] = '*';


    if (strpos($folder, 'application/views') !== FALSE)
        $config['upload_path'] = './' . $folder . '/';
    else
        $config['upload_path'] = './upload/' . $folder . '/';

    if ($fileName != "") {
        $config['file_name'] = $fileName;
    }

    if (!is_dir($config['upload_path']))
        mkdir($config['upload_path'], '0755');

    $CI->load->library('upload', $config);
    $CI->upload->initialize($config);

    if (!$CI->upload->do_upload($uploadFile)) {
        $resultArr['success'] = false;
        $resultArr['error'] = $CI->upload->display_errors();
    } else {

        $resArr = $CI->upload->data();
        $resultArr['success'] = true;

        if (strpos($folder, 'application/views') !== FALSE) {

            $resultArr['path'] = $folder . "/" . $resArr['file_name'];
        } else {
            $resultArr['path'] = "upload/" . $folder . "/" . $resArr['file_name'];
        }
    }

    if (@str_contains($resultArr['path'], ".png") || @str_contains($resultArr['path'], ".jpg") || @str_contains($resultArr['path'], ".jpeg")) {

        if ($file_resize) {
            $data = $CI->upload->data();
            $config = [];
            $config['image_library'] = 'gd2';
            $config['source_image'] = "./upload/" . $folder . "/" . $data["file_name"];
            $config['create_thumb'] = FALSE;
            $config['maintain_ratio'] = TRUE;

            $img_data = getimagesize($resultArr['path']);
            $width = $img_data[0];
            $height = $img_data[1];

            if ($file_resize == "website_thumb_img") {
                if ($width >= 6000) {
                    $config['width'] =  round($width / 8);
                    $config['height'] = round($height / 8);
                } else if ($width >= 4000) {
                    $config['width'] =  round($width / 6);
                    $config['height'] = round($height / 6);
                } else if ($width >= 2200) {
                    $config['width'] =  round($width / 4);
                    $config['height'] = round($height / 4);
                } else if ($width >= 1800) {
                    $config['width'] =  round($width / 3);
                    $config['height'] = round($height / 3);
                } else if ($width >= 1200) {
                    $config['width'] = 722;
                    $config['height'] = 320;
                }
            } else if ($file_resize == "website_img") {
                if ($width >= 1200) {
                    $config['width'] =  round($width / 2);
                    $config['height'] = round($height / 2);
                }
            } else if ($file_resize == "article-img") {
                if ($width >= 6000) {
                    $config['width'] =  round($width / 5);
                    $config['height'] = round($height / 5);
                } else if ($width >= 4000) {
                    $config['width'] =  round($width / 4);
                    $config['height'] = round($height / 4);
                } else if ($width >= 2200) {
                    $config['width'] =  round($width / 3);
                    $config['height'] = round($height / 3);
                } else if ($width >= 1800) {
                    $config['width'] =  round($width / 2);
                    $config['height'] = round($height / 2);
                }
            } else if ($file_resize == "author") {
                $config['width'] = ($data['image_width'] > 250) ? 250 : $data['image_width'];
                $config['height'] = ($data['image_height'] > 250) ? 250 : $data['image_height'];
            } else if ($file_resize == "logo") {
                $config['width'] = ($data['image_width'] > 150) ? 150 : $data['image_width'];
                $config['height'] = ($data['image_height'] > 150) ? 150 : $data['image_height'];
            }
            // pre($config);
            $config['new_image'] = "./upload/" . $folder . "/" . $data["file_name"];
            $CI->load->library('image_lib', $config);

            if (!$CI->image_lib->resize()) {
                echo $CI->image_lib->display_errors();
            }
        }
    }

    return $resultArr;
}


function send_mail($to_email, $subject, $message, $mail_send_type = 'admin'): bool
{
    $ci = &get_instance();
    $ci->load->library('email');

    $ci->config->load('email', true);

    if ($mail_send_type == "influencer") {
        $email_config = $ci->config->item('influencer_email_config', 'email');
        $admin_email = $ci->config->item('influencer_email', 'email');
    } else {
        $email_config = $ci->config->item('email', 'email');
        $admin_email = $ci->config->item('admin_email', 'email');
    }

    $ci->email->initialize($email_config);
    $ci->email->clear(TRUE);
    $ci->email->from($admin_email, $ci->config->item('site_title', 'email'));
    $ci->email->to($to_email);
    $ci->email->subject($subject);
    $ci->email->message($message);

    try {
        if ($ci->email->send()) {
            return true;
        } else {
            log_message('error', 'Email sending failed: ' . $ci->email->print_debugger());
            return false;
        }
    } catch (Exception $e) {
        log_message('error', 'Email sending failed: ' . $e->getMessage());
        return false;
    }
}
