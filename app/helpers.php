<?php

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
            'content' => $postdata,
            'Accept' => '*/*',
            'Accept-Encoding' => 'gzip, deflate, br',
            'Accept-Language' => 'vi-VN,vi;q=0.8,fr-FR;q=0.6,fr;q=0.4,en-US;q=0.2,en;q=0.2',
            'Connection' => 'keep-alive',
            'Content-Length' => 434,
            'Content-Type' => 'application/x-www-form-urlencoded; charset=UTF-8',
            'Cookie' => 'filterType=1h_1%2C-st_1; ASP.NET_SessionId=jsgitelfchvdxgzqukubv10g; sb188cash=186649354.20480.0000; CCDefaultMbPlay=eventId%3D1666364%26lsId%3D%26aTeamName%3DSydney%20United%2058%26hTeamName%3DBlacktown%20City%26sportId%3D1%26lang%3Dvi-vn%26vidoProvider%3Dp; CCDefaultTvPlay=eventId%3D1672613%26lsId%3D%26aTeamName%3DRonald%20Alexander%20%2F%20Melati%20Daeva%20Oktaviani%20(INA)%26hTeamName%3DTan%20Kian%20Meng%20%2F%20Lai%20Pei%20Jing%20(MAS)%26sportId%3D9%26lang%3Dvi-vn%26vidoProvider%3Dp; timeZone=420; mc=admin22; HighlightedSport=; _ga=GA1.3.983388187.1471536710; _ga=GA1.2.983388187.1471536710; CCDefaultBgPlay=eventId%3D1668900%26lsId%3D%26aTeamName%3DNorthern%20Redbacks%20SC%20(W)%26hTeamName%3DBalcatta%20SC%20(W)%26sportId%3D1%26lang%3Dvi-vn%26vidoProvider%3Dp; CCEnlargeStatus=false; CCCurrentMbPlay=eventId%3D1672613%26lsId%3D%26aTeamName%3DRonald%20Alexander%20%2F%20Melati%20Daeva%20Oktaviani%20(INA)%26hTeamName%3DTan%20Kian%20Meng%20%2F%20Lai%20Pei%20Jing%20(MAS)%26sportId%3D9%26lang%3Dvi-vn%26vidoProvider%3Di; settingProfile=OddsType=2&NoOfLinePerEvent=1&SortBy=1&AutoRefreshBetslip=True; fav3=',
            'Host' => 'sb.188bet.com',
            'Origin' => 'https://sb.188bet.com',
            'Referer' => 'https://sb.188bet.com/vi-vn/sports/all/in-play?q=0ca8cZKnC-SFrxYYAU89Dw..&country=VN&currency=VND&tzoff=420&allowRacing=false&reg=Vietnam',
            'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36',
            'X-Requested-With' => 'XMLHttpRequest'
        )
    );

    $context = stream_context_create($opts);

    $result = file_get_contents('http://sb.188live.net/vi-vn/Service/CentralService?GetData&ts=1472751244627', false, $context);
    return $result;
}
?>

