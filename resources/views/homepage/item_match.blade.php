<tr class="{{$class_html}}">
    <td rowspan="2" class="headtime">12h24</td>
    <td rowspan="2" colspan="2" class="headevent">{{$data->home .' VS '.$data->away}}</td>
</tr>
<tr class="{{$class_html}}">
    <td class="headHDP ">
        <div class="" style="width: 50%; float: left">
            <h5 class="{{$data->id}}-handicap-home" >{{$data->home_handicap}}</h5>
            <h5 class="{{$data->id}}-handicap-away">{{$data->away_handicap}}</h5>
        </div>
        <div class="" style="width: 50%; float: right; text-align: right">
            <h5 class="{{$data->id}}-ratio-home">{{$data->home_ratio}}</h5>
            <h5 class="{{$data->id}}-ratio-away" >{{$data->away_ratio}}</h5>
        </div>
    </td>
    <td class="headOU">

    </td>
    <td class="headHDP">

    </td>
    <td class="headOU">

    </td>
</tr>