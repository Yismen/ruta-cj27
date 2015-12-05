<div class="wrapper">

      @include('layouts.partials.head_navbar')

      
      <!-- Left side column. contains the logo and sidebar -->
      @include('layouts.partials.left-navbar')

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">  
      @include('layouts.partials.messages')     
       @yield('content')
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b><a href="mailto:yismen.jorge@gmail.com" target="_new">Yismen Jorge</a></b> Contact Me!
        </div>
        <strong>Copyright &copy; {{ date("Y") }} <a href="">Ruta CJ27</a>.</strong> All rights reserved.
      </footer>

    </div><!-- ./wrapper -->