<tr class="{{$class_html}}">
    <td rowspan="2" class="headtime">12h24</td>
    <td rowspan="2" colspan="2" class="headevent">{{$data->home .' VS '.$data->away}}</td>
</tr>
<tr class="{{$class_html}}">
    <td class="headHDP ">
        <div style="width: 50%; float: left">
            <h5>{{$home['handicap']}}</h5>
            <h5>{{$away['handicap']}}</h5>
        </div>
        <div style="width: 50%; float: right; text-align: right">
            <h5>{{$home['ratio']}}</h5>
            <h5>{{$away['ratio']}}</h5>
        </div>
    </td>
    <td class="headOU">

    </td>
    <td class="headHDP">

    </td>
    <td class="headOU">

    </td>
</tr>