<body>
    {!! $paginator->link() !!}

    <h1>Hello/Index</h1>
    <p>{{$msg}}</p>
    <ol>
    @foreach($data as $item)
    <li>{{$item->name}} [{{$item->mail}}, 
        {{$item->age}}]</li>
    @endforeach
    </ol>
    <hr>
</body>
