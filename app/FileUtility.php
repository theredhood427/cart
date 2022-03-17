<?php

class FileUtility
{
    public static function openCSV($csv_file)
    {
        $file = fopen($csv_file, 'r');
        $data = [];
        $headers = [];
        $index = 0;
        while($row = fgetcsv($file)) {
            if ($index == 0) {
                $headers = $row;
                $index++;
                continue;
            }

            $csv_data = [];
            for ($i = 0; $i < count($row); $i++) {
                $csv_data[$headers[$i]] = $row[$i];
            }
            array_push($data, $csv_data);
            $index++;
        }
        return $data;
    }

    public static function writeToFile($target_file, $data)
    {
        return;
    }
}