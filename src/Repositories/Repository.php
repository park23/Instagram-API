<?php

namespace InstagramFollowers\Repositories;

/**
 * Class Repository
 * @package InstagramFollowers\Repositories
 */
class Repository {

    /**
     * @var $file_storage_dir string
     */
    protected $file_storage_dir;

    /**
     * Repository constructor.
     */
    public function __construct() {
        $this->file_storage_dir = __DIR__ . '../../loginSessions/';
    }

    /**
     * @return string
     */
    public function getFileStorageDir() {
        return $this->file_storage_dir;
    }

    /**
     * @param $folderName string
     * @param $fileName string
     *
     * @return string
     */
    public function getFileName($folderName, $fileName) {
        return $this->file_storage_dir . $folderName . '/' . $fileName;
    }

    /**
     * @param $name string
     * @return bool
     */
    public function openFolder($name) {
        $path = ($this->file_storage_dir . $name);

        if (file_exists($path) === false) {
            return mkdir($path, 0777, true);
        } else {
            return true;
        }

    }

    /**
     * @param $folder_name string
     * @param $filename string
     *
     * @return bool
     */
    public function file_exist($folder_name, $filename) {
        $path = realpath($this->file_storage_dir . $folder_name . '/' . $filename);

        return file_exists($path);
    }
}
