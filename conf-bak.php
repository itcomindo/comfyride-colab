<?php

function isDevMode()
{
    if ($_SERVER['REMOTE_ADDR'] == '127.0.0.1' || $_SERVER['REMOTE_ADDR'] == '::1') {
        function dbname()
        {
            $db_name_comfy = "wpthemeplug";
            return $db_name_comfy;
        }

        function dbuser()
        {
            $db_user_comfy = "root";
            return $db_user_comfy;
        }

        function dbpass()
        {
            $db_pass_comfy = "";
            return $db_pass_comfy;
        }
    } else {
        function dbname()
        {
            $db_name_comfy = "kenumy_carent";
            return $db_name_comfy;
        }

        function dbuser()
        {
            $db_user_comfy = "kenumy_carent";
            return $db_user_comfy;
        }

        function dbpass()
        {
            $db_pass_comfy = "2vP2IQqHxV4M";
            return $db_pass_comfy;
        }
    }
}







/**
 *=========================
 *NAME: comfyride_phone_number
 *=========================
 */

function _comfy_nomor_hp_primary()
{
    $conn = mysqli_connect("localhost", dbuser(), "", dbname());
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
    $conn = mysqli_connect("localhost", dbuser(), "", dbname());
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
