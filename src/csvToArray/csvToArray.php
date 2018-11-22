<?php
namespace Frankphper\Csv\csvToArray;
class csvToArray
{
    protected $csvFile;
    protected $data = [];

    public function __construct($file) {
        $this->csvFile = $file;
    }

    public function csvData()
    {
        $handle = fopen($this->csvFile, "r");
        if($handle === false) {
	    return false;
        }
        while(feof($handle) === false) {
            yield fgetcsv($handle);
        }
        fclose($handle);
    }
    
    public function csvToArray()
    {
        foreach($this->csvData($this->csvFile) as $row) {
            array_push($this->data, $row);
        }
        return $this->data;
    }
}
