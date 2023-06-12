<?php

$url = "https://www2.deepl.com/jsonrpc?method=LMT_handle_jobs";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$text = "这两个月着实吃了不少疫情的苦头";
$current_time_millis = round(microtime(true) * 1000);
$headers = array(
   "authority: www2.deepl.com",
   "accept: */*",
   "accept-language: vi-VN,vi;q=0.9,en-US;q=0.8,en;q=0.7,zh-CN;q=0.6,zh;q=0.5",
   "content-type: application/json",
   "dnt: 1",
   "origin: https://www.deepl.com",
   "referer: https://www.deepl.com/",
   "user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$data = '{"jsonrpc":"2.0","method": "LMT_handle_jobs","params":{"jobs":[{"kind":"default","sentences":[{"text":"'.$text.'","id":0,"prefix":""}],"raw_en_context_before":[],"raw_en_context_after":[],"preferred_num_beams":4}],"lang":{"preference":{"weight":{},"default":"default"},"source_lang_computed":"ZH","target_lang":"EN"},"priority":1,"commonJobParams":{"regionalVariant":"en-US","mode":"translate","browserType":1},"timestamp":'.$current_time_millis.'},"id":40890008}';

curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$resp = curl_exec($curl);
curl_close($curl);
$result = json_decode($resp, true)['result']['translations'][0]['beams'][0]['sentences'][0]['text'];
echo $result;

var_dump($resp)


// $result = json_decode($response, true)['result']['translations'][0]['beams'][0]['postprocessed_sentence'];

// echo $result;
?>
