<div class="col-lg-2 nopadding">
	<nav class="navbar navbar-default sidebar" role="navigation">
	    <div class="container-fluid">
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-sidebar-navbar-collapse-1">
	        <span class="sr-only">Menu</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>      
	    </div>
	    <div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
	      <ul class="nav navbar-nav">
	       <li class="dropdown">
	          
	        
	             <!--          SECCION SEGUIMIENTOS-->
	        </li>
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Alumnos <span class="caret"></span><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span></a>
	          <ul class="dropdown-menu forAnimate" role="menu">
	            <li><?= $this->Html->link(h('Ver'), ['controller' =>'Alumnos', 'action' => 'pIndex']) ?></li>
	          </ul>
	        </li>
	         <!--  FIN SECCION SEGUIMIENTOS-->
	               <!--          SECCION SEGUIMIENTOS-->
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Seguimientos <span class="caret"></span><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span></a>
	          <ul class="dropdown-menu forAnimate" role="menu">
	            <li><?= $this->Html->link(h('Ver seguimientos'), ['controller' =>'SeguimientosClasesAlumnos', 'action' => 'pIndex']) ?></li>
	          </ul>
	        </li>
	         <!--  FIN SECCION SEGUIMIENTOS-->
	      </ul>
	    </div>
	  </div>
	</nav>
</div>