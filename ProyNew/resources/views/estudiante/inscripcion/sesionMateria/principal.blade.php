<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>T. I. S.</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/inscripcion.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">
    <link rel="stylesheet" href="{{asset('css/AdminLTE.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/_all-skins.min.css')}}">
    <link rel="apple-touch-icon" href="{{asset('img/apple-touch-icon.png')}}">
    <link rel="shortcut icon" href="{{asset('img/favicon.ico')}}">
    
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">
        <a href="{{url('estudiante/inscripcion')}}" class="logo">
          <span class="logo-mini"><b>Es</b>t</span>
          <span class="logo-lg"><b>Estudiante</b></span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Navegación</span>
          </a>
            <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a >
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                
                            </li>
                        @endif
                    </ul>
          

        </nav>
      </header>
      <aside class="main-sidebar">
        <section class="sidebar">
          <ul class="sidebar-menu">
            <li class="header"></li>
            @foreach ($sesiones as $se)
            @if($se->ESTADO_GC == 1)
            <li class="treeview">
            <a href="#">
                <i class="fa fa-folder"></i>
                <span>{{$se->NOMBRE_SESION}}</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{URL::action('estudiante\SesionMateriaController@buscarPractica',
                array(
                  'idGrupo'     =>$se->ID_GRUPOLAB , 
                  'idEstudiante'=>$se->ID_ESTUDIANTE,
                  'idInc'       =>$se->ID_INSCRIPCION,
                  'idPracGrupo' =>$se->ID_PRAC_GRUPO))}}">
                <i class="fa fa-circle-o"></i>Practica Auxiliar</a></li>

                <li><a href="{{URL::action('estudiante\SesionMateriaController@buscarPortafolio',
                array(
                  'idGrupo'     =>$se->ID_GRUPOLAB , 
                  'idEstudiante'=>$se->ID_ESTUDIANTE,
                  'idInc'       =>$se->ID_INSCRIPCION,
                  'idPracGrupo' =>$se->ID_PRAC_GRUPO))}}">
                  <i class="fa fa-circle-o"></i>Portafolio</a>
                </li>
            </ul>
            </li>
            @endif
            @endforeach
          </ul>
        </section>
      </aside>
      <div class="content-wrapper">
        
        <!-- Main content -->
        <section class="content">
          
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Usuario Estudiante</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-12">
                            <!--Contenido-->
                            @yield('sesionMateria')
                            <!--Fin Contenido-->
                    </div>
                  </div>  
                </div>
                
                  	</div><!-- /.row -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <!--Fin-Contenido-->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
        </div>
       </footer>
 
      
    <!-- jQuery 2.1.4 -->
    <script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('js/app.min.js')}}"></script>
    
  </body>
  
</html>


       