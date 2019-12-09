<?php
/**
 * Created by PhpStorm.
 * User: babakfaghihian
 * Date: 12/7/2019 AD
 * Time: 22:31
 */

namespace App\Library\DataLoader\Csv;


use App\Library\DataLoader\DataLoaderInterface;

class CsvLoader implements DataLoaderInterface
{

    private $filePath;


    public function __construct($filePath)
    {
        $this->filePath = $filePath;
    }

    public function fetchAllData()
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
                        $j++;
                    }
                }
                $i++;

            }
            fclose($handle);
        }

        return $arrayResult;

    }

}
