@extends('adminlte::master')

@inject('layoutHelper', 'JeroenNoten\LaravelAdminLte\Helpers\LayoutHelper')
@inject('preloaderHelper', 'JeroenNoten\LaravelAdminLte\Helpers\PreloaderHelper')

@section('adminlte_css')
    @stack('css')

    <style tipe="text/css">
   /* .zoomP{
        /*aumento la anchura por 2 esgundos*/
       /* transition: width 1.1s, height 1.1s, transform 1.1s;
        -moz-transition: width 1.1s, height 1.1s, -moz-transfor 1.1s;
        -webkit-transition: width 1.1s, height 1.1s, -webkit-transform 1.1s;
        -o-transition: width 1.1s, height 1.1s, -o-transform 1.1s;
        border: 1px solid white;
        border-shadow: white 0px 5px 5px 0px;
    }
    .zoomP:hover{
        /*tranformamos el elemnto al pasar el mause arriba de este*/
      /*  transform: scale(1.05);--zoom

        -webkit-transform: scale(1.05); transform: scale(1.05)
    }*/
    .zoomP {
        background: white;
        border: 1px solid #ffebee; /* Borde rojo claro */
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(255, 0, 0, 0.1); /* Sombra rojiza */
        transition: all 0.3s ease; /* Animación suave */
    }

    .zoomP:hover {
        box-shadow: 0 5px 15px rgba(255, 50, 50, 0.2); /* Sombra roja más intensa */
        transform: translateY(-2px); /* Efecto de levitación */
    }
    </style>
    @yield('css')
@stop

@section('classes_body', $layoutHelper->makeBodyClasses())

@section('body_data', $layoutHelper->makeBodyData())

@section('body')
    <div class="wrapper">

        {{-- Preloader Animation (fullscreen mode) --}}
        @if($preloaderHelper->isPreloaderEnabled())
            @include('adminlte::partials.common.preloader')
        @endif

        {{-- Top Navbar --}}
        @if($layoutHelper->isLayoutTopnavEnabled())
            @include('adminlte::partials.navbar.navbar-layout-topnav')
        @else
            @include('adminlte::partials.navbar.navbar')
        @endif

        {{-- Left Main Sidebar --}}
        @if(!$layoutHelper->isLayoutTopnavEnabled())
            @include('adminlte::partials.sidebar.left-sidebar')
        @endif

        {{-- Content Wrapper --}}
        @empty($iFrameEnabled)
            @include('adminlte::partials.cwrapper.cwrapper-default')
        @else
            @include('adminlte::partials.cwrapper.cwrapper-iframe')
        @endempty

        {{-- Footer --}}
        @hasSection('footer')
            @include('adminlte::partials.footer.footer')
        @endif

        {{-- Right Control Sidebar --}}
        @if($layoutHelper->isRightSidebarEnabled())
            @include('adminlte::partials.sidebar.right-sidebar')
        @endif

    </div>
@stop

@section('adminlte_js')
    @stack('js')
    @yield('js')
    @if ( (($mensaje = Session::get('mensaje')) &&($icono = Session::get('icono'))))
    <script>
    Swal.fire({
  position: "top-end",
  icon: "{{$icono}}",
  title: "{{$mensaje}}",
  showConfirmButton:false,
  timer: 4000
});
</script>
@endif
@stop
