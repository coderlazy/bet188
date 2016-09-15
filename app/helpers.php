<?php

function crawlData() {
    $postdata = http_build_query(
            array(
                'IsFirstLoad' => 'false',
                'VersionL' => '-1',
                'VersionU' => '0',
                'VersionS' => '-1',
                'VersionF' => '-1',
                'VersionH' => '1:0,2:0,3:0,4:0,7:0,9:0,13:0,21:0,23:0,26:0',
                'VersionT' => '-1',
                'IsEventMenu' => 'true',
                'SportID' => '1',
                'CompetitionID' => '-1',
                'reqUrl' => '/vi-vn/sports/all/in-play?q=&country=VN&currency=VND&tzoff=-240&allowRacing=false&reg=Vietnam',
				//'reqUrl' =>'/vi-vn/sports/football/matches-by-date/today/full-time-asian-handicap-and-over-under',
                'oIsInplayAll' => 'true',
                'oVersion' => '488710',
                'oIsFirstLoad' => 'true',
                'oSortBy' => '1',
                'oOddsType' => '1',
                'oPageNo' => '0'
            )
    );
    $postdata_inplay = http_build_query(
            array(
                'IsFirstLoad' => 'false',
                'VersionL' => '-1',
                'VersionU' => '0',
                'VersionS' => '-1',
                'VersionF' => '-1',
                'VersionH' => '1:0,2:0,3:0,4:0,7:0,9:0,13:0,21:0,23:0,26:0',
                'VersionT' => '-1',
                'IsEventMenu' => 'false',
                'SportID' => '1',
                'CompetitionID' => '-1',
                'reqUrl' => '/vi-vn/sports/all/in-play',
                'country'=>'VN',
                'currency'=>'VND',
                'tzoff'=>-240,
                'allowRacing'=>false,
                'reg'=>'Vietnam',
                'oIsInplayAll'=>false,
                'oVersion'=>'1,1716208|2,44174|19,3310|14,12815|16,8461',
                'oIsFirstLoad'=>false,
                'oSortBy'=>1,
                'oOddsType'=>0,
                'oPageNo'=>0,
            )
    );
    $opts = array('http' =>
        array(
            'method' => 'POST',
            'header' => 'Content-type: application/x-www-form-urlencoded; charset=UTF-8',
			'Accept'=>'*/*',
			'Accept-Encoding'=>'gzip, deflate, br',
			'Accept-Language'=>'vi-VN,vi;q=0.8,fr-FR;q=0.6,fr;q=0.4,en-US;q=0.2,en;q=0.2',
			'Connection'=>'keep-alive',
			'Content-Length':379,
			'Host'=>'sb.188bet.com',
			'Origin'=>'https://sb.188bet.com',
'Referer'=>'https://sb.188bet.com/vi-vn/sports/all/in-play?q=&country=VN&currency=VND&tzoff=-240&allowRacing=false&reg=Vietnam',
            'content' => $postdata,
        )
    );

    $context = stream_context_create($opts);

    $result = file_get_contents('http://sb.188live.net/vi-vn/Service/CentralService?GetData&ts=1472751244627', false, $context);
    return $result;
}
?>

