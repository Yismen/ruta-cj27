<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
      <!-- Sidebar user panel -->
     @if (auth()->user())
       
        <div class="user-panel">
          <div class="pull-left image">
            <img src="{{ asset('assets/plugins/admin-lte/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            {{-- <p>{{ currentUser.name | uppercase }}</p> --}}
            {{ strtoupper(auth()->user()->name) }}
          </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
          <!-- <li class="header">LABELS</li> -->
          <li><a href="{{ url('/admin') }}"><i class="fa fa-circle-o text-aqua"></i> <span>Página Principal</span></a></li>
          <li class="header">NAVEGACION PRINCIPAL</li>
          <li class="active treeview">
            <a href="">
              <i class="fa fa-dashboard"></i> <span> Aplicaciones</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
              <li class="active"><a href="{{ route('admin.drivers.index') }}"><i class="fa fa-circle-o"></i> Choferes</a></li>
              <li class="active"><a href="{{ route('admin.contacts.index') }}"><i class="fa fa-circle-o"></i> Contactos</a></li>
              <li class="active"><a href="{{ route('admin.drivers.birthdays') }}"><i class="fa fa-circle-o"></i> Cumpleaños</a></li>
              <li class="active"><a href="{{ route('admin.todos.index') }}"><i class="fa fa-circle-o"></i> Tareas</a></li>
            </ul>
          </li>
          
          <li class="header">CONTROL DE SESION</li>
          <li><a href="{{ url('auth/logout') }}"><i class="fa fa-circle-o text-red"></i> <span>Salir de la Aplicación</span></a></li>
        </ul>
     @else
       {{-- false expr --}}
     @endif

      
  </section>
  <!-- /.sidebar -->
</aside>