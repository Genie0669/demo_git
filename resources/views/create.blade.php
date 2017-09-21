<!DOCTYPE html>
<html>
<head>
  <title>新增資料</title>
</head>
<body>
    <form action="/store" method="post">
      姓名：<input type="text" name="name" />
      電話：<input type="text" name="phone" />
      {{ csrf_field() }}
      <input type="submit" value="送出">
    <form>
</body>
</html>