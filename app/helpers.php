<?php

function crawlScore($match_api_id){
	
	$url = "https://188bet.betstream.betgenius.com/betstream-view/188bet-flash-sc/eventDetailsPrioritised?eventId=".$match_api_id;
	$getData =file_get_contents($url);
	return json_decode($getData);
}






/*Function get score of the match*/

function getScrore($match_api_id){
	$scoreData = crawlScore($match_api_id);
	//		dd($scoreData[0]);
	$homeScore= 0;
	$awayScore=0;
	$start_time =date('Y-m-d H:i:s','0') ;
	try{
		$start_time =date('Y-m-d H:i:s',($scoreData[0]->event->startTime)/1000);
	}
	catch (Exception $e) {
		echo 'Caught exception: ',  $e->getMessage(), "<br>";
		var_dump($scoreData);
	}
	echo $start_time."<br>";
	try {
		$homeScore = count($scoreData[0]->statistics->home->goals);
		$awayScore = count($scoreData[0]->statistics->away->goals);
		// 		$start_time = $scoreData[0]->event->startTime;
		echo($scoreData[0]->event->description.'<br>: ');
		echo ($homeScore."-".$awayScore.'<br>');
	}
	catch (Exception $e) {
		// 		echo 'Caught exception: ',  $e->getMessage(), "<br>";
	}
	$match = \App\MatchInfo::where('match_api_id', '=', $match_api_id)->first();
	if (!$match) {
		$match = new \App\MatchInfo();
		$match->match_api_id = $match_api_id;
		$match->home_score = $homeScore;
		$match->away_score = $awayScore;
		echo "insert ".$start_time."<br>";
		$match->start_time = $start_time;
		$match->save();
	}
	else{
		$match->home_score = $homeScore;
		$match->away_score = $awayScore;
		// echo "update  ".$start_time."<br>";
		// $match->start_time = $start_time;
		$match->save();
	}
}

function crawlData() {
	
	$postdata = http_build_query(
						            array(
						                'IsFirstLoad' => 'true',
						                'VersionL' => '-1',
						                'VersionU' => '0',
						                'VersionS' => '-1',
						                'VersionF' => '-1',
						                'VersionH' => '1:0,2:0,3:0,4:0,7:0,9:0,13:0,21:0,23:0,26:0',
						                'VersionT' => '-1',
						                'IsEventMenu' => 'true',
						                'SportID' => '1',
						                'CompetitionID' => '-1',
						                 'reqUrl' => '/vi-vn/sports/all/in-play',
						                // 	'reqUrl' => '/vi-vn/sports/all/in-play?q=&country=VN&currency=VND&tzoff=-240&allowRacing=false&reg=Vietnam',
										// 	'reqUrl' =>'/vi-vn/sports/football/matches-by-date/today/full-time-asian-handicap-and-over-under',
						                'oIsInplayAll' => 'true',
						                // 	'oVersion' => '488710',
						                'oIsFirstLoad' => 'true',
						                'oSortBy' => '1',
						                // 	'oOddsType' => '1',
						                // 	'oPageNo' => '0'
						            )
						    );
	
	$opts = array('http' =>
						        array(
						            'method' => 'POST',
									// 	'proxy' => 'tcp://128.199.119.133:8080',
									'request_fulluri' => true,
						            'header' => 'Content-type: application/x-www-form-urlencoded; charset=UTF-8',
									'Accept'=>'*/*',
									'Accept-Encoding'=>'gzip, deflate, br',
									'Accept-Language'=>'vi-VN,vi;q=0.8,fr-FR;q=0.6,fr;q=0.4,en-US;q=0.2,en;q=0.2',
									'Connection'=>'keep-alive',
									// 	'Content-Length'=>379,
									'Host'=>'sb.188bet.com',
									'Origin'=>'https://sb.188bet.com',
						// 	'Referer'=>'https://sb.188bet.com/vi-vn/sports/all/in-play?q=&country=VN&currency=VND&tzoff=-240&allowRacing=false&reg=Vietnam',
						            'content' => $postdata,
						        )
						    );
	
	$context = stream_context_create($opts);
	
	$result = file_get_contents('http://sb.188live.net/vi-vn/Service/CentralService?GetData', false, $context);
	return $result;
}
?>
