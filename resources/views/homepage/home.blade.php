@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Các trận đang diễn ra</div>
            </div>
        </div>
        <div class="col-md-8 match">
            <div class="team">
                <div>{{$team1}}</div>
                <div>{{$team2}}</div>
            </div>
            <div class="odds">
                <h3>Kèo Châu Âu</h3>
                <table>
                    <tr>
                        <td class="odds-chap" value="{{$odd_1x2[1]}}">
                            {{$odd_1x2[1]}}
                        </td>
                        <td style="width: 10px" ></td>
                        <td class="odds-ou" value="{{$odd_1x2[3]}}">
                            {{$odd_1x2[3]}}
                        </td>
                        <td class="odds-ou" value="{{$odd_1x2[5]}}">
                            {{$odd_1x2[5]}}
                        </td>
                    </tr>
                </table>
                 <h3>Cược chấp</h3>
                <table>
                    <tr>
                        <td class="odds-chap" value="{{$cuoc_chap[5]}}">
                            {{$cuoc_chap[1] .' | '.$cuoc_chap[5]}}
                        </td>
                        <td style="width: 10px" ></td>
                        <td class="odds-ou" value="{{$cuoc_chap[7]}}">
                            {{$cuoc_chap[1] .' | '.$cuoc_chap[7]}}
                        </td>
                        <td class="odds-ou" value="{{$cuoc_chap[5]}}">
                            {{$cuoc_chap[1] .' | '.$cuoc_chap[3]}}
                        </td>
                    </tr>
                </table>
                <button style="margin-top: 10px" >Các kèo khác</button>
            </div>
        </div>
        <div class="col-md-4"  style="text-align: center ">
            <div class="ticket" >VÉ CƯỢC</div>
            <input class="tien-dat" type="number" placeholder="vd: 10000 VND" >
            <input class="tien-thang" type="number" placeholder="vd: 10000 VND" >
            <input class="dat-cuoc" value="đặt cược" type="submit" >
            <div class="message" >

            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    var odd = 0;
    var coin = 10000000;
    $('.coin').text(coin);
    var actived = '';
    $('.odds-chap').click(function () {
        odd = $(this).attr('value');
        $(actived).css('background-color', '#fff');
        actived = this;
        if ($(this).css('background-color') == '#fe9200') {
            $(this).css('background-color', '#fff');
        } else {
            $(this).css('background-color', '#fe9200');
        }
    });
    $('.odds-ou').click(function () {
        odd = $(this).attr('value');
        $(actived).css('background-color', '#fff');
        actived = this;
        if ($(this).css('background-color') == '#fe9200') {
            $(this).css('background-color', '#fff');
        } else {
            $(this).css('background-color', '#fe9200');
        }
    });
    $(".tien-dat").keyup(function () {
        if($(this).val() < coin){
            $('.tien-thang').val($(this).val() * odd);
        }else{
            $(".message").text("Sô tiền đặt cược phải nhỏ hơn số tiền đang có");
        }
    });
    $(".dat-cuoc").click(function () {
        coin -= $(".tien-dat").val();
        $('.coin').text(coin);
        $(".message").text("Bạn đã đặt: " + $(".tien-dat").val() + " VND");
    });
</script>
@endsection