<?php

class Zipper
{

    private $_files = array();
    private $_zip;

    public function __construct()
    {
        $this->_zip = new ZipArchive;
    }

    public function add($input)
    {
        if (is_array($input))
        {
            $this->_files = array_merge($this->_files, $input);
        } else
        {
            $this->_files[] = $input;
        }
        var_dump($this->_files);
    }

    public function store($location = null)
    {
        if (count($this->_files) && $location)
        {
            foreach ($this->_files as $index => $file)
            {
                if (!file_exists($file))
                {
                    unset($this->_files[$index]);
                }
            }
        }

        if ($this->_zip->open($location, file_exists($location) ? ZipArchive::OVERWRITE : ZipArchive::CREATE))
        {
            foreach ($this->_files as $filename)
            {
                $this->_zip->addFile($filename);
            }
            $this->_zip->close();
        }
        //echo '<pre>', print_r($this->_files), '</pre>';
    }

    private function checkExistingArchive($location = null)
    {
        return file_exists($location) ? ZipArchive::OVERWRITE : ZipArchive::CREATE;
    }

}
