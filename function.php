<?php

function t1($path)
{
    if (file_exists($path) == true) {
        return 1;
    } else {
        return 0;
    }
}

function t2($path)
{
    if (file_exists($path) == true) {
        return filesize($path);
    } else {
        return 0;
    }
}

function t3($path)
{
    if (is_dir($path) == true) {
        return 'dir';
    } else {
        return 'file';
    }
}

function t4($path)
{
    $arrTemp = explode("/", $path);

    $arrTemp = $arrTemp[count($arrTemp) - 1];
    $arrTemp = explode('.', $arrTemp);
    return $arrTemp;
}

function t5($path)
{
    $opened = fopen($path, 'r');
    $content = fread($opened, filesize($path));
    fclose($opened);
    return $content;
}

function t6($path, $str)
{
    $opened = fopen($path, 'w+');
    fwrite($opened, $str);
    fclose($opened);

}

function t7($path, $str)
{
    $opened = fopen($path, 'a');
    fwrite($opened, $str . "\n");
    fclose($opened);
}

function t8($path)
{
    $size = 0;
    $scaned = scandir($path);
    $file = array_diff($scaned, ['..', '.']);
    foreach ($file as $item) {
        $size .= filesize($path . '/' . $item);
    }
    return $size;

    // $size = 0;

    // if ($handle = opendir($path)) {
    //     while (false !== ($entry = readdir($handle))) {
    //         if ($entry !== '.' && $entry !== '..') {
    //             $size = filesize($path . '/' . $entry) / 1024;
    //         }
    //     }
    // }

    // return round($size, 2) . ' мб';

}

function t9($path)
{

    $data = [];

    if ($handle = opendir($path)) {
        while (false !== ($entry = readdir($handle))) {
            if ($entry !== '.' && $entry !== '..') {
                $temp = [];
                $t = explode('.', $entry);
                $temp[0] = $entry;
                $temp[1] = $t[1];
                $temp[2] = filesize($path . '/' . $entry);
                $data[] = $temp;
            }
        }
    }
    var_dump($data);
    // return $arr;
}

function t10($path)
{
    if (is_file($path) == true) {
        return 0;
    } else {
        $file = fopen($path, 'w');
        fwrite($file, 42);
        fclose($file);
        return 1;
    }
}
