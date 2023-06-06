<?php 
function checkFile($tmp_name,$vari_name)
{
    $valid_file_types = array("image/*" =>"*"); // declare correct file type
    $max_size = 40*1024*1024;   // declare available file size
    $error = false;

    // 1. Check file exists
    if (!isset($_FILES[$vari_name])){
        $error = true;
    }
    // 2. Check file is openable
    else{
        $info = finfo_open(FILEINFO_MIME_TYPE);
        if (!$info){
            $error = true;
        }
        // 3. Check file type is MIME type
        $mime = finfo_file($info,$tmp_name); // define MIME type to check
        if(!in_array($mime,array_keys($valid_file_types))){
            $error = true;
        }
        else{
            // 4. Check file size
            if (filesize($_FILES[$vari_name]['tmp_name']) > $max_size){
                $error = true;
            }
            finfo_close($info);
        }
    }
    return $error;

}