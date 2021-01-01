<head>
    <meta charset="utf-8">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    {!! $data->links() !!}
{{ $data->links( "pagination::bootstrap-4") }}

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
