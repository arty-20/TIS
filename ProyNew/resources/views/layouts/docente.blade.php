<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>T. I. S.</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">
    <link rel="stylesheet" href="{{asset('css/AdminLTE.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/docente.css')}}">
    <link rel="stylesheet" href="{{asset('css/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/_all-skins.min.css')}}">
    <link rel="apple-touch-icon" href="{{asset('img/apple-touch-icon.png')}}">
    <link rel="shortcut icon" href="{{asset('img/favicon.ico')}}">

  </head>
  <!-- class="bg-purple disabled color-palette -->
  <body class="hold-transition skin-blue sidebar-mini">
    
    <div class="wrapper">

      <header class="main-header" >
        <a href="{{url('docente')}}" class="logo" style="width: 280px;" >
          <span class="logo-mini"><b>Doc</b>t</span>
          <span class="logo-lg" style="width: 280px;"><b>Docente</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Navegación</span>
          </a>
            <ul class="nav navbar-nav navbar-right" style="margin-left: 280px;">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login <i class="fa fa-fw fa-sign-in"></i> </a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a >
                                    {{ Auth::user()->name }} <i class="fa fa-fw fa-user"></i><span class="caret"></span>
                                </a>
                                
                                <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                           <b> Logout<i class="fa fa-fw fa-sign-out"></i></b>
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                  
                            </li>
                        @endif
            </ul>

        </nav>
      </header>
<!-- style="width: 270px; -->
      <aside class="main-sidebar"  >
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar" style="width: 280px;">
          <!-- Sidebar user panel -->
                    
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header"></li>
            
             @yield('arbol')
         </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

    <!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" style="margin-left: 280px;">
        
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
               @yield('Mensaje')
              <div class="box">
                <div class="box-body">
                    <div class="row">
                      <div class="col-md-12">
                              <!--Contenido-->
                              @yield('contenido')
                              <!--Fin Contenido-->
                     </div>
                    </div>
                </div>
                
               </div><!-- /.row -->
            </div><!-- /.box-->
          </div>
         </section>

      </div><!-- /.content-wrapper -->
    </div>
      <!--Fin-Contenido-->
      
      
    <!-- jQuery 2.1.4 -->
    <script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>
   
    <!-- Bootstrap 3.3.5 -->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('js/app.min.js')}}"></script>
    
  </body>
</html>
