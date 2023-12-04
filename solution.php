<?php
$filename = 'input.txt';
$handle = fopen($filename, 'rb');
$contents = fread($handle, filesize($filename));
fclose($handle);

$search = [
    'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine'
];
$replace = [
    'o1e', 't2o', 't3e', 'f4r', 'f5e', 's6x', 's7n', 'e8t', 'n9e'
];
$array_contents =  str_replace($search, $replace, $contents);
$array_contents = preg_split('[\n]', $array_contents);

sumDigits($array_contents);

function sumDigits($array_contents){
    $sum = 0;
    foreach ($array_contents as $key => $item) {
        preg_match_all('[\d]', $item, $numbers);
        $numbers = $numbers[0];
        //echo json_encode($numbers);
        if (count($numbers) == 1) {
            $result_number = $numbers[0] . $numbers[0];
        } else {
            $result_number = $numbers[0] . end($numbers);
        }
        //echo $result_number . PHP_EOL;
        $sum += intval($result_number);
    }
    echo 'result is >>> ' . $sum;
}