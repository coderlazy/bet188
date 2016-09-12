@extends('layouts.master')
@section('content')
<div style="text-align: center">
    <h3>Các trận đang đấu</h3>
</div>
<table>
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
@endsection