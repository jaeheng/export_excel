<?php
ob_start();
header("Content-type:application/vnd.ms-excel;");
header("Content-type:application/octet-stream;");
header("Content-Disposition:attachment;filename=test.xls");
header("Pragma: no-cache"); 
header("Expires: 0");
$d = '';
foreach ($_POST['data'] as $value) {
	$d .= $value;
}
echo iconv("UTF-8","GB2312",$d);
$data = ob_get_contents();
ob_end_clean();
$fp=fopen('./test.xls',"wb");
fwrite($fp,$data);
fclose($fp);
ob_flush();//每次执行前刷新缓存 
flush();
echo 'test.xls';