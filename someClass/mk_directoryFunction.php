<?php


$url = '../accets/files/mani/1';
$newUrl =  mkdirectory($url);
file_put_contents($newUrl . 'mani.txt', 'Hello World' . $newUrl);

$url = '../accets/files/ali/2';
$newUrl =  mkdirectory($url);
file_put_contents($newUrl . 'mani.txt', 'Hello World' . $newUrl);

$url = '../accets/mani/ali/2/2';
$newUrl =  mkdirectory($url);
file_put_contents($newUrl . 'mani.txt', 'Hello World' . $newUrl);




function mkdirectory($url)
{
    $urlArray = explode('/', $url);
    $newUrl = '';
    foreach ($urlArray as $u) {
        $newUrl .= $u . '/';
        if ($u == '..') {
            continue;
        }
        if (!is_dir($newUrl)) {
            mkdir($newUrl);
        }
    }
    return $newUrl;
}
