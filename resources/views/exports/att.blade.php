<table>
    <thead>
        <tr>
            <th>Nama</th>
            <th>Tanggal</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td></td>
            @foreach($labels as $label)
                <td>{{$label}}</td>
            @endforeach
        </tr>
        @foreach($charts as $key => $chart)
            <tr>
                <td>{{$chart['label']}}</td>
                @foreach($chart['data'] as $char)
                    <td>{{count($char) > 0 ? \Carbon\Carbon::parse($char[0]->created_at)->format('H:i') . ' ~ ' : ''}} {{count($char) > 1 ? \Carbon\Carbon::parse($char[1]->created_at)->format('H:i') : ''}}</td>
                @endforeach
            </tr>
         @endforeach
    </tbody>
</table>
