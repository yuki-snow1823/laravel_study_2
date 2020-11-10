<body>
    <h1>Hello/Index</h1>
    <p>{!! $msg !!}</p>
    <ul>
    @foreach($data as $item)
    <li>{{ $item }}</li>
    @endforeach
    </ul>
    <p><a href="/hello/other">download</a></p>

</body>

<style>
th { background-color:red; padding:10px; }
td { background-color:#eee; padding:20px; }
</style>
