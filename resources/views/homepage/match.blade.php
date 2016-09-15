@extends('layouts.app')
@section('content')
<div style="text-align: center">
    <h3>Các trận đang đấu</h3>
</div>
<div class="container" style="width:1170px !important" >
    <table class="col-md-12" >
        <thead>
            <tr>
                <td rowspan="2" class="headtime">Thời gian</td>
                <td rowspan="2" colspan="2" class="headevent">Trận Đấu</td>
                <td colspan="2"><div class="headFT">Cả trận đấu</div></td>
                <td colspan="2"><div class="headFH">Hiệp một</div></td>
            </tr>
            <tr>
                <td class="headHDP">Cược Chấp</td>
                <td class="headOU">Tài Xỉu</td>
                <td class="headHDP">Cược Chấp</td>
                <td class="headOU">Tài Xỉu</td>
            </tr>
        </thead>
        <tbody>
            {!!$html_odd_all_match!!}
        </tbody>
    </table>
</div>
@endsection
@section('js')
<script>
    $(document).ready(function () {
		var delay = 4000;
        setInterval(function () {
            $.getJSON("/all-match-inplay", function (data) {
                $.each(data, function (key, val) {
                    var class_match = '.' + val.id;
					if($(class_match + '-handicap-home').text() != val.home_handicap){
						$(class_match + '-handicap-home').text(val.home_handicap);
						$(class_match + '-handicap-home').addClass("change");
						setTimeout(function() {
						  $(class_match + '-handicap-home').removeClass("change");
						}, delay);
					}
                    if($(class_match + '-handicap-away').text() != val.away_handicap){
						$(class_match + '-handicap-away').text(val.away_handicap);
						$(class_match + '-handicap-away').addClass("change");
						setTimeout(function() {
						  $(class_match + '-handicap-away').removeClass("change");
						}, delay);
					}
					if($(class_match + '-handicap-home').text() != val.home_handicap){
						$(class_match + '-ratio-home').text(val.home_ratio);
						$(class_match + '-ratio-home').addClass("change");
						setTimeout(function() {
						  $(class_match + '-ratio-home').removeClass("change");
						}, delay);
					}
					if($(class_match + '-ratio-away').text() != val.away_ratio){
						$(class_match + '-ratio-away').text(val.away_ratio);
						$(class_match + '-ratio-away').addClass("change");
						setTimeout(function() {
						  $(class_match + '-ratio-away').removeClass("change");
						}, delay);
					}
                });
            });
        }, 3000);
         setInterval(function () {
             $.getJSON("/crawl-data-inplay", function (data) {
            });
        }, 5000);
    })
</script>
@endsection