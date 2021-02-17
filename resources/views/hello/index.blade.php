<!doctype html>
<html lang="ja">
<head>
    <title>Index</title>
    <script>
    function doAction(){
        var id = document.querySelector('#id').value;
        var xhr = new XMLHttpRequest(); // 取得
        console.log(id);
        xhr.open('GET', '/hello/json/' + id, true);
        console.log(xhr);
        xhr.responseType = 'json';
        xhr.onload = function(e) {
            console.log(this);
            if (this.status == 200) {
                var result = this.response;
                console.log(this.response);
                // document.querySelector('#name').textContent = result.name;
                // document.querySelector('#mail').textContent = result.mail;
                document.querySelector('#age').textContent = result;
            }
        };
        xhr.send();
    }
    </script>
</head>
<body>
    <h1>Hello/Index</h1>
    <div>
        <input type="number" id="id" value="1">
        <button onclick="doAction();">Click</button>
    </div>
    <ul>
    <li id="name"></li>
    <li id="mail"></li>
    <li id="age"></li>
    </ul>
</body>


</html>
