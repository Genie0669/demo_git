<!DOCTYPE html>
<html>
<head>
  <title>首頁</title>
</head>
<body>

  <p>新功能 1.1</p>
  <p>新版本 1.1</p>
  <p>新功能 2.1</p>
  <p>Master 1.1</p>
  <p>新版本 2.1</p>
  <p>新版本 2017/11/01</p>

  <a href="/create">新增</a><br /><hr><br />
  @foreach($datas as $data)
	姓名：{{ $data->name }}
	電話：{{ $data->phone }}
    <a href="/edit/{{ $data->id }}">修改</a>
    <a href="/destroy/{{ $data->id }}">刪除</a>
    <br /><br />
  @endforeach
</body>
</html>