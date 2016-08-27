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
            <div class="match-logo">

            </div>
            <div class="team">
                <div>Arsenal</div>
                <div>Watford</div>
            </div>
            <div class="odds">
                <table>
                    <tr>
                        <th class="odds-chap-title">Cược chấp</th>
                        <th> </th>
                        <th class="odds-ou-title">O/U</th>
                    </tr>
                    <tr>
                        <td class="odds-chap" value="0.90">
                            +0.5<br>
                            0.90
                        </td>
                        <td style="width: 10px" ></td>
                        <td class="odds-ou" value="-0.83">
                            O 4/4.5<br>
                            -0.83
                        </td>
                    </tr>
                    <tr style="height: 15px;" ></tr>
                    <tr>
                        <td class="odds-chap" value="-0.98">
                            -0.5<br>
                            -0.98
                        </td>
                        <td style="width: 10px" ></td>
                        <td class="odds-ou" value="0.73">
                            U 4/4.5<br>
                            0.73
                        </td>
                    </tr>
                </table>
                <button style="margin-top: 10px" >Các kèo khác</button>
            </div>
        </div>
        <div class="col-md-4"  style="text-align: center ">
            <div class="ticket" >VÉ CƯỢC</div>
            <input class="tien-dat" type="number" >
            <input class="tien-thang" type="number" >
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