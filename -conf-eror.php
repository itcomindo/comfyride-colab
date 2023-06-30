<?php

function isDevMode()
{
    if ($_SERVER['REMOTE_ADDR'] == '127.0.0.1' || $_SERVER['REMOTE_ADDR'] == '::1') {
        function dbname()
        {
            $db_user_comfy = "root";
            $db_name_comfy = "wpthemeplug";
            $db_pass_comfy = "";
            $conn = mysqli_connect("localhost", $db_user_comfy, $db_pass_comfy, $db_name_comfy);
            return $conn;
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
    return $conn;
}


function dbname()
{
    $db_user_comfy = "root";
    $db_name_comfy = "wpthemeplug";
    $db_pass_comfy = "";
    // $conn = mysqli_connect("localhost", $db_user_comfy, $db_pass_comfy, $db_name_comfy);
    $conn = mysqli_connect("localhost", "root", "", "wpthemeplug");
    // $conn = "1234";
    return $conn;
}




/**
 *=========================
 *NAME: comfyride_phone_number
 *=========================
 */

function _comfy_nomor_hp_primary()
{
    // isDevMode();
    // $conn = mysqli_connect("localhost", dbuser(), "", dbname());
    $conn = mysqli_connect("localhost", "root", "", "wpthemeplug");

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
