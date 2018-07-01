<?php
   include_once '../lib/BmobObject.class.php';

    $backValue=$_POST["trans_data"];
    $objectid=$_POST['itemid'];
    $state;
    $number;

    $method = "POST";
    // 请求示例 url
    $url = "http://api01.bitspaceman.com:8000/nlp/sentiment/bitspaceman?apikey=U7ZdDNPQuXwGizLCOIqnES5KMdtyyHXKap23mk4oJK4SFOqKFCHok8dBgL1XYdFA";
    $post_data = http_build_query(array( "industry"=>"restaurant","text"=>$backValue));
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_FAILONERROR, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $post_data);
    curl_setopt($curl, CURLOPT_HEADER, false);
    curl_setopt($curl, CURLOPT_ENCODING, "gzip");
    $content = json_decode(curl_exec($curl),true);
    $positive = $content["sentimentDist"][0]['prob'];
    $negative = $content["sentimentDist"][1]['prob'];
    $number = $positive-$negative;

    if($number > 0.5)
    {
        $state ='积极';
    }elseif (0.1 < $number && $number < 0.5) {
        $state ='平静';
    }
    else {
        $state='沮丧';
    }

    $bmobObj = new BmobObject("sanhangqs");
    $res=$bmobObj->update($objectid, array("type"=>$state));
 ?>
