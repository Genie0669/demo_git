{!! Form::open(['route' => 'forgetpassword.process', 'method' => 'post']) !!}
{!! Form::email('email',null , ['id' => 'email']) !!}
{!! Form::submit('忘記密碼') !!}
{!! Form::close() !!}