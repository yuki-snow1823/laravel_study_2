<body>
    <h1>Hello/Index</h1>
    <p>{{$msg}}</p>
    <ol>
    @foreach($data as $item)
    {{-- <li>{{$item->name}} [{{$item->mail}}, 
        {{$item->age}}]</li> --}}
        {{ $item->Name }}
    @endforeach
    </ol>
    <hr>
</body>
