<?php
/**
 * Created by PhpStorm.
 * User: babakfaghihian
 * Date: 12/7/2019 AD
 * Time: 22:31
 */

namespace App\Library\Csv;


class CsvLoader
{

    private $filePath;


    public function __construct($filePath)
    {
        $this->filePath = $filePath;
    }

    public function fetchCsvData()
    {

        $headers = [];
        $arrayResult = array();
        $handle = fopen($this->filePath, "r");
        if (empty($handle) === false) {
            $i = 0;
            $j = 0;
            while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
                if ($i == 0) {
                    $headers = array_flip($data);
                } else {
                    foreach ($headers as $key => $value) {
                        $arrayResult[$j][$key] = $data[$value];
                    }
                }
                $i++;
                $j++;
            }
            fclose($handle);
        }

        var_dump($arrayResult);

        return $arrayResult;

    }

}
