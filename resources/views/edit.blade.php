<!DOCTYPE html>
<html>
<head>
  <title>修改資料</title>
</head>
<body>
    <form action="/update/{{ $data->id }}" method="post">
      姓名：<input type="text" name="name" value="{{ $data->name }}" />
      電話：<input type="text" name="phone" value="{{ $data->phone }}" />
      {{ csrf_field() }}
      <input type="submit" value="送出">
    <form>
</body>
</html>