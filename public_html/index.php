<?php

require_once '../bootloader.php';

\App\App::run();
//ini_set('memory_limit', '-1');
//ini_set('max_execution_time', 3000);
//
//$studentjsondata = file_get_contents('/Users/home/Desktop/php projektai/public_html/monthly-2019.json');
//$data = json_decode($studentjsondata, true);
//
//$lenght=count($data);
//
//
//
//for($i=36000; $i<$lenght; $i++) {
//    $company = new \App\Company\Company($data[$i]);
//    \App\App::$company_repository->insert($company);
//}
//
//$sql=new \App\Company\Model();
//$sql->exportToCsv('labas', ['code'=>525089]);
