<?php
function isDevMode()
{
    if ($_SERVER['REMOTE_ADDR'] == '127.0.0.1' || $_SERVER['REMOTE_ADDR'] == '::1') {
        // running in localhost
        $devMode = true;
        return $devMode;
    } else {
        $devMode = false;
        return $devMode;
    }
}


function connect_to_db()
{
    if (isDevMode()) {
        // ini running di localhost
        $conn = mysqli_connect("localhost", "root", "", "wpthemeplug");
        return $conn;
    } else {
        // ini running di server live
        $conn = mysqli_connect("localhost", "budihar_comfy", "2vP2IQqHxV4M", "budihar_comfy");
        return $conn;
    }
}

function datacust()
{
    $comfy = [];
    $conn = connect_to_db();

    $options = [
        '_comfy_nomor_hp_primary' => 'phone',
        '_comfy_alamat' => 'alamat',
        '_comfy_kota' => 'kota',
        // kodepos
        '_comfy_kode_pos' => 'kodepos',
        // email
        '_comfy_email' => 'email',
        // provinsi
        '_comfy_provinsi' => 'provinsi',
        // telepon kantor
        '_comfy_nomor_telepon_kantor' => 'telepon_kantor',
        // whatsapp
        '_comfy_whatsapp' => 'whatsapp',
        // facebook
        '_comfy_facebook' => 'facebook',
        // instagram
        '_comfy_instagram' => 'instagram',
        // twitter
        '_comfy_twitter' => 'twitter',
        // youtube
        '_comfy_youtube' => 'youtube',
        // linkedin
        '_comfy_linkedin' => 'linkedin',
        // tiktok
        '_comfy_tiktok' => 'tiktok',
        // playstore link
        '_comfy_playstore_link' => 'playstore_link',
        // appstore link
        '_comfy_appstore_link' => 'appstore_link',
    ];

    foreach ($options as $optionName => $key) {
        $sql = "SELECT option_value FROM wp_options WHERE option_name = '$optionName'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $comfy[$key] = $row['option_value'];
    }

    return $comfy;
}

function link_cta($tipe = 'whatsapp')
{
    if ($tipe == 'whatsapp') {

        $datacust = datacust();
        $phone = $datacust['phone'];
        // replace first character with 62
        $phone = substr_replace($phone, '62', 0, 1);
        // replace - with empty string
        $phone = str_replace('-', '', $phone);
        // whatsapp link
        $whatsapp = "//api.whatsapp.com/send?phone=$phone";
        return $whatsapp;
    } elseif ($tipe == 'phone') {
        $datacust = datacust();
        $phone = $datacust['phone'];
        // replace first character with 62
        $phone = substr_replace($phone, '62', 0, 1);
        // replace - with empty string
        $phone = str_replace('-', '', $phone);
        // whatsapp link
        $whatsapp = "tel:+$phone";
        return $whatsapp;
    }
}



/**
 *=========================
 *NAME: comfyride_phone_number
 *=========================
 */

function _comfy_nomor_hp_primary()
{
    // $conn = mysqli_connect("localhost", "root", "", "wpthemeplug");
    $conn = connect_to_db();
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    } else {
        // echo "Connected successfully";
    }
    // nomor hp primary
    $sql = "SELECT option_value FROM wp_options WHERE option_name = '_comfy_nomor_hp_primary'";
    // create variable $result to get value from variable $conn and variable $sql
    $result = mysqli_query($conn, $sql);
    // create variable $row to get value from variable $result
    $row = mysqli_fetch_assoc($result);
    // create variable $phone to get value from variable $row

    if (isDevMode()) {
        $phone = "081234567890";
    } else {
        $phone = $row['option_value'];
    }

    return $phone;
}
/**
 *=========================
 *NAME: _comfy_alamat
 *=========================
 */
function _comfy_alamat()
{
    $conn = connect_to_db();
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    } else {
        // echo "Connected successfully";
    }
    // alamat
    $sql = "SELECT option_value FROM wp_options WHERE option_name = '_comfy_alamat'";
    // create variable $result to get value from variable $conn and variable $sql
    $result = mysqli_query($conn, $sql);
    // create variable $row to get value from variable $result
    $row = mysqli_fetch_assoc($result);
    // create variable $alamat to get value from variable $row
    $alamat = $row['option_value'];
    return $alamat;
}
