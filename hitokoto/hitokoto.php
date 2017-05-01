<?php
function hitokoto()
{
	mt_srand((double)microtime()*1000);
	// 在这里设置最大文件名
    $data  = dirname(__FILE__) . '/hito'.rand(0, 4).'.koto';
    $json  = file_get_contents($data);
	
    $array = json_decode($json, true);
    $count = count($array);
    if ($count != 0)
    {
        $hitokoto = $array[array_rand($array)];
        echo json_encode($hitokoto);
    }
    else
    {
        echo '';
    }

}

// function hitokoto_split()
// {
    // $data  = dirname(__FILE__) . '/hitokoto.json';
    // $json  = file_get_contents($data);
    // $array = json_decode($json, true);
    // $count = count($array);
	
	// $fnum = 0;
	// do{
		// $narr = array_slice($array, $fnum*100, 100);
		// $darr = [];
		// foreach($narr as $hito){
			// array_push($darr,array('hitokoto' => $hito['hitokoto'], 'source' => $hito['source']));
		// }

		// file_put_contents(dirname(__FILE__) . '/hito'.$fnum.'.koto', json_encode($darr,JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE));
		// unset($darr);
		
		// $count -= sizeof($narr);
		// ++$fnum;
	// }while($count > 0);
	
	// // 输出最大文件名
	// echo json_encode(array('hitokoto' => "Split to ".($fnum - 1)." Files", 'source' => ""));
// }

hitokoto();