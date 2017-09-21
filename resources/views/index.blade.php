<!DOCTYPE html>
<html>
<head>
  <title>首頁</title>
</head>
<body>
  <a href="/create">首頁</a><br />
  @foreach($datas as $data)
	姓名：{{ $data->name }}
	電話：{{ $data->phone }}
    <a href="/edit/{{ $data->id }}">修改</a>
    <a href="/destroy/{{ $data->id }}">刪除</a>
    <br />
  @endforeach
</body>
</html>