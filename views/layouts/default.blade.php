<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Framework Domicilios</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="Fabian Altahona">
	<!--styles -->
  <?php
    $assets = Asset::container('container')->bundle('lara_admin');
  ?>
	<link href="{{ $assets->path('css/bootstrap.css') }}" rel="stylesheet">
	<link href="{{ $assets->path('css/bootstrap-responsive.css') }}" rel="stylesheet">
	<link href="{{ $assets->path('css/global.css') }}" rel="stylesheet">
  <link href="{{ $assets->path('css/facebox.css') }}" rel="stylesheet">
  <link href="{{ $assets->path('css/application.css') }}" rel="stylesheet">
  <!-- Soporte para IE6-8 de elementos HTML5 -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
      <![endif]-->
      <!-- favicon and touch icons -->
      <link rel="shortcut icon" href="public/img/ico/favicon.ico">
      <link rel="apple-touch-icon-precomposed" sizes="144x144" href="public/img/ico/apple-touch-icon-144-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="114x114" href="public/img/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="public/img/ico/apple-touch-icon-72-precomposed.png">
      <link rel="apple-touch-icon-precomposed" href="public/img/ico/apple-touch-icon-57-precomposed.png">
    </head>
    <body>
     <div class="row-fluid">

      <div id="wrapper">
       <div id="header"><h1 id="site_title">{{Config::get('laraAdmin.title')}}</h1><ul class="header-item" id="tabs">

        @foreach( Config::get('laraAdmin.models') as $model )
        <li id="{{$model}}" class="@if($title== $model )current@endif"><a href="/lara_admin/models/{{$model}}">{{$model}}</a></li>
        @endforeach
      </ul>

      <p class="header-item" id="utility_nav">
        <a href="/lara_admin/logout"> Logout</a>
      </p>
    </div>
      <div id="title_bar">
        <div id="titlebar_left">
         <h2 id="page_title">
          @if( isset($title) )
          {{ $title }}
          @endif
        </h2>
      </div>
      <div id="titlebar_right">
        <div class="action_items">
         @if( isset($title) )
         <span class="action_item">
          <a class="btn"   href="/lara_admin/models/{{  $title }}/new">
            New
            {{  $title }}
          </a>
        </span>
        @endif
      </div>

    </div>
  </div>

  {{$content}}

  <div id="footer">
    <p>Powered by <a href="http://www.drakarstudio.net">Drakar Studio</a> 1.0</p>
  </div>
</div>
</div>              


<div class="facebox hide" id="new_modal">
  <div class="modal-header">
   <button type="button" class="close" data-dismiss="modal">×</button>
   <h2 id="page_title">Nuevo Usuario</h2>
 </div>


</div>
<div class="modal-footer"></div>
</div>

</div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="{{ $assets->path('js/jquery-1.7.2.js') }}"></script>
    <script src="{{ $assets->path('js/bootstrap-transition.js') }}"></script>
    <script src="{{ $assets->path('js/bootstrap-alert.js') }}"></script>
    <script src="{{ $assets->path('js/bootstrap-modal.js') }}"></script>
    <script src="{{ $assets->path('js/bootstrap-dropdown.js') }}"></script>
    <script src="{{ $assets->path('js/bootstrap-scrollspy.js') }}"></script>
    <script src="{{ $assets->path('js/bootstrap-tab.js') }}"></script>
    <script src="{{ $assets->path('js/bootstrap-tooltip.js') }}"></script>
    <script src="{{ $assets->path('js/bootstrap-popover.js') }}"></script>
    <script src="{{ $assets->path('js/bootstrap-button.js') }}"></script>
    <script src="{{ $assets->path('js/bootstrap-collapse.js') }}"></script>
    <script src="{{ $assets->path('js/bootstrap-carousel.js') }}"></script>
    <script src="{{ $assets->path('js/facebox.js') }}"></script>
    <script src="{{ $assets->path('js/application.js') }}"></script>
  </body>
  </html>
