<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <link rel="icon" href="{{asset('img/favicon.ico')}}">

  <title>AdminLTE 3 | DistFavorer18</title>

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">

<div id="app">

<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Sitio Web</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3" method="POST" action="
        @if(isset($page) && $page == 'Usuarios')
            {{route('users.search')}}
        @elseif(isset($page) && $page == 'Productos')
            {{route('products.search')}}
        @elseif(isset($page) && $page == 'Categorias')
            {{route('categories.search')}}
        @elseif(isset($page) && $page == 'Marcas')
            {{route('brands.search')}}
        @else
            {{route('products.search')}}
        @endif
    ">
    @csrf
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Buscar" aria-label="Search" name="search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button"><i
            class="fas fa-th-large"></i></a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="{{route('home')}}" class="brand-link">
            <img src="{{asset('img/FA.png')}}" height="30px" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
               style="opacity: .8">
          <span class="brand-text font-weight-light">DistFavorer18</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{Auth::user()->avatar}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{Auth::user()->name}}</a>
            </div>
          </div>

          <!-- Sidebar Menu -->
          <menu-component inline-template>

            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class
                       with font-awesome or any other icon font library -->

                    <li class="nav-item">
                        <a href="{{route('home')}}" class="nav-link @if(!isset($page)) active @endif">
                            <i class="nav-icon fas fa-home"></i>
                            <p>
                            Home
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                            <a href="{{route('users.index')}}" class="nav-link @if(isset($page) && $page == 'Usuarios') active @endif">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                            Users
                            <span class="right badge badge-danger" v-text="countUsers"></span>
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('products.index')}}" class="nav-link @if(isset($page) && $page == 'Productos') active @endif">
                            <i class="nav-icon fas fa-shopping-basket"></i>
                            <p>
                            Productos
                            <span class="right badge badge-danger" v-text="countProducts"></span>
                            </p>
                        </a>
                    </li>

                  <li class="nav-item">
                    <a href="{{route('categories.index')}}" class="nav-link @if(isset($page) && $page == 'Categorias') active @endif">
                      <i class="nav-icon fas fa-tags"></i>
                      <p>
                        Categorias
                        <span class="right badge badge-danger" v-text="countCategories"></span>
                      </p>
                    </a>
                  </li>

                  <li class="nav-item">

                    <a href="{{route('brands.index')}}" class="nav-link @if(isset($page) && $page == 'Marcas') active @endif">
                      <i class="nav-icon fas fa-trademark"></i>
                      <p>
                        Marcas
                        <span class="right badge badge-danger" v-text="countBrands"></span>
                      </p>
                    </a>

                  </li>

                </ul>
              </nav>

          </menu-component>
          <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
      </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
              @isset($page)
                <h1 class="m-0 text-dark">{{$page}}</h1>
              @else
                <h1 class="m-0 text-dark">Página de inicio</h1>
              @endisset
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Inicio</a></li>
                @isset($page)
                    <li class="breadcrumb-item active">{{$page}}</li>
                @endisset
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <main>
        @yield('content')
    </main>
    <!-- Main content -->

  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->

    <div class="pa-2">
        <a class="nav-link" href="{{ route('users.show', ['user' => Auth::user()]) }}">
            {{ __('Mi perfil') }}
        </a>
        <a class="nav-link" href="{{ route('logout') }}"
           onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
            {{ __('Cerrar sesion') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Cliente: Distribuidora Favorer 2018, C.A.
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; {{date('Y')}} <a href="https://adminlte.io">AdminLTE.io & Chawaramo SD</a>.</strong> Todos los derechos reservados.
  </footer>
</div>
<!-- ./wrapper -->
</div>

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}""></script>

</body>
</html>
