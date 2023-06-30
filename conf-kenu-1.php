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
        $conn = mysqli_connect("localhost", "kenumy_carent", "2vP2IQqHxV4M", "kenumy_carent");
        return $conn;
    }
}

function datacust()
{

    $arrEmpty = [];

    $p = [];

    $conn = connect_to_db();

    // nomor hp primary
    $sqlPhone = "SELECT option_value FROM wp_options WHERE option_name = '_comfy_nomor_hp_primary'";
    // create variable $result to get value from variable $conn and variable $sql
    $resultPhone = mysqli_query($conn, $sqlPhone);
    // create variable $row to get value from variable $result
    $rowPhone = mysqli_fetch_assoc($resultPhone);
    // create variable $phone to get value from variable $row
    $phone = $rowPhone['option_value'];



    // alamat
    $sqlAlamat = "SELECT option_value FROM wp_options WHERE option_name = '_comfy_alamat'";
    // create variable $result to get value from variable $conn and variable $sql
    $resultAlamat = mysqli_query($conn, $sqlAlamat);
    // create variable $row to get value from variable $result
    $rowAlamat = mysqli_fetch_assoc($resultAlamat);
    // create variable $alamat to get value from variable $row
    $alamat = $rowAlamat['option_value'];


    $arrEmpty['phone'] = $phone;
    $arrEmpty['alamat'] = $alamat;

    foreach ($arrEmpty as $value) {
        return $p[] = $value;
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
