<?php 
require_once "../admin/checkFile.php";

class Uploader
{
    private $file_name;
    private $file_path;
    private $destination;
    private $key_value;

    public function __construct($key)
    {
        $this->key_value = $key;
        $this->file_name = $_FILES[$key]['name'];
        $this->file_path = $_FILES[$key]['tmp_name'];
    }
    public function save_in($folder)
    {
        $this->destination = $folder;
    }

    public function save()
    {
        $tmp_name = $_FILES[$this->key_value]['tmp_name'];
        $vari_name = $_FILES[$this->key_value];
        $invalid = checkFile($tmp_name,$vari_name);

        $writableFolder = is_writable($this->destination);
        $uploadedSite = "$this->destination/$this->file_name";

        if (!$invalid and $writableFolder)
        {
            $result = move_uploaded_file($this->file_path,$uploadedSite);
        }
        else{
            $result = false;
        }
        return $result;

    }
}