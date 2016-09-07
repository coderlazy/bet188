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
                'IsEventMenu' => 'false',
                'SportID' => '1',
                'CompetitionID' => '-1',
                'reqUrl' => '/vi-vn/sports/football/matches-by-date/today/full-time-asian-handicap-and-over-under',
                'oIsInplayAll' => 'true',
                'oVersion' => '488710',
                'oIsFirstLoad' => 'true',
                'oSortBy' => '1',
                'oOddsType' => '0',
                'oPageNo' => '0'
            )
    );

    $opts = array('http' =>
        array(
            'method' => 'POST',
            'header' => 'Content-type: application/x-www-form-urlencoded; charset=UTF-8',
            'content' => $postdata
        )
    );

    $context = stream_context_create($opts);

    $result = file_get_contents('http://sb.188live.net/vi-vn/Service/CentralService?GetData&ts=1472751244627', false, $context);
    return $result;
}
?>

