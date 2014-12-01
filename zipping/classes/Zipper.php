<?php

class Zipper
{

    private $_files = array();
    private $_zip;

    const DEBUG = true;

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
    }

    public function store($location = null)
    {
        $this->cleanUnexistingFiles();
        if (!count($this->_files))
        {
            throw new Exception('Zip archive can not be empty. Add some files');
        }
        if (!$location)
        {
            throw new Exception('Location of zip archive must be set');
        }

        if ($this->_zip->open($location, file_exists($location) ? ZipArchive::OVERWRITE : ZipArchive::CREATE))
        {
            foreach ($this->_files as $filename)
            {
                if (self::DEBUG)
                {
                    echo 'Adding file: ' . $filename . '<br>';
                }
                $this->_zip->addFile($filename);
            }
            if (self::DEBUG)
            {
                echo 'Archive file: ' . $location . ' has been created<br>';
            }
            $this->_zip->close();
        }
    }

    private function cleanUnexistingFiles()
    {
        foreach ($this->_files as $index => $file)
        {
            if (!file_exists($file))
            {
                if (self::DEBUG)
                {
                    echo 'Removing unexisting file: ' . $file . '<br>';
                }
                unset($this->_files[$index]);
            }
        }
    }

}
