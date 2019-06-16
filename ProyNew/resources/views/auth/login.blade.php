<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>KOVERLOAD | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">
  <!-- Ionicons -->
<!--   <link rel="stylesheet" href="{{asset('css/ionicons.min.css')}}">
 -->  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/AdminLTE.min.css')}}">
  <link rel="stylesheet" href="{{asset('dist/css/AdminLTE.css')}}">
  
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('plugins/iCheck/square/blue.css')}}">
<link rel="apple-touch-icon" href="{{asset('img/apple-touch-icon.png')}}">
    <link rel="shortcut icon" href="{{asset('img/favicon.ico')}}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

 
</head>
<body class="hold-transition login-page">

<div class="container">
    <div class="login-box">
        <div class="login-logo">
            <a><b>Koverload</b>KO</a>
        </div>
    <!-- <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div> -->



                <div class="login-box-body">
                    <p class="login-box-msg">Ingresar datos para iniciar sesión</p>

                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
<!--                             <label for="email" class="col-md-4 control-label">E-Mail </label>
 -->
                           <!--  <div class="col-md-6"> -->
                                <input id="email" type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}" required autofocus>
                                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
<!--                                 <span class="fas fa-envelope"></span> 
 -->                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            <!-- </div> -->
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <!-- <label for="password" class="col-md-4 control-label">Contraseña</label> -->

                            <!-- <div class="col-md-6"> -->
                                <input id="password" type="password" class="form-control" placeholder="Contraseña" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            <!-- </div> -->
                        </div>

                       
                        <div class="form-group">
                            <div class="col-xs-4" align="right">
                                <button type="submit" class="btn btn-primary">
                                    Entrar
                                </button>

                            </div>
                            <a href="{{ asset('estudiante/registro/create') }}" class="text-center">Registrarse</a>
                        </div>
                    </form>
                </div>



          <!--   </div>
        </div> -->
    </div>
</div>

<script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('js/app.min.js')}}"></script>
    <!-- iCheck -->
<script src="{{asset('plugins/iCheck/icheck.min.js')}}"></script>
    

</body>
</html>
