<?php

header("Content-type: text/html; charset=utf-8");

error_reporting(E_ALL ^ E_NOTICE);// 显示除去 E_NOTICE 之外的所有错误信息
$uid = $_GET["uid"];

if ($uid != null) {
$file_contents = curl_get_https('https://api.bilibili.com/x/relation/stat?vmid=' . $uid);
$arr = json_decode($file_contents,true);
echo "UID：" . $arr['data']['mid'] . "</br>";
echo "关注数：" . $arr['data']['following'] . "</br>";
echo "粉丝数：" . $arr['data']['follower'];
}

function curl_get_https($url){
$curl = curl_init(); // 启动一个CURL会话
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);// TRUE 将curl_exec()获取的信息以字符串返回，而不是直接输出。
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); // 跳过证书检查
$tmpInfo = curl_exec($curl); // 返回api的json对象
curl_close($curl);
return $tmpInfo; // 返回json对象
}

?>
