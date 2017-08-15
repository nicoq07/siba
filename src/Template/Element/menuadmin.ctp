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
	<!--          SECCION ALUMNOS-->
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Alumnos <span class="caret"></span><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span></a>
	          <ul class="dropdown-menu forAnimate" role="menu">
	             <li><?= $this->Html->link(h('Alta'), ['controller' =>'alumnos', 'action' => 'add']) ?></li>
	             <li><?= $this->Html->link(h('Ver todos'), ['controller' =>'alumnos', 'action' => 'index']) ?></li>
	          	 <li><?= $this->Html->link(h('Cumpleños'), ['controller' =>'alumnos', 'action' => 'listadoCumple']) ?></li>
	          
	          </ul>
	        </li>    
	          <!--  FIN SECCION ALUMNOS-->
	          <!--          SECCION PROFESORES-->
	      <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Profesores <span class="caret"></span><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span></a>
	          <ul class="dropdown-menu forAnimate" role="menu">
	            <li><?= $this->Html->link(h('Alta'), ['controller' =>'profesores', 'action' => 'add']) ?></li>
	            <li><?= $this->Html->link(h('Ver todos'), ['controller' =>'profesores', 'action' => 'index']) ?></li>
	             <li><?= $this->Html->link(h('Planillas'), ['controller' =>'profesores', 'action' => 'planillas']) ?></li>
	          </ul>
	        </li>
	           <!--  FIN SECCION PROFESORES-->
	    <!--          SECCION CLASES-->
	      <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Cursos <span class="caret"></span><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-th-list"></span></a>
	          <ul class="dropdown-menu forAnimate" role="menu">
	             <li><?= $this->Html->link(h('Nueva clase'), ['controller' =>'clases', 'action' => 'add']) ?></li>
	             <li><?= $this->Html->link(h('Ver clases'), ['controller' =>'clases', 'action' => 'index']) ?></li>
	           	 <li class="divider"></li>
	           	<li><?= $this->Html->link(h('Nueva disciplina'), ['controller' =>'disciplinas', 'action' => 'add']) ?></li>
	             <li><?= $this->Html->link(h('Ver disciplinas'), ['controller' =>'disciplinas', 'action' => 'index']) ?></li>
	           	 <li class="divider"></li>
	           	 <li><?= $this->Html->link(h('Nuevo horario'), ['controller' =>'horarios', 'action' => 'add']) ?></li>
	           	 <li><?= $this->Html->link(h('Ver horarios'), ['controller' =>'horarios', 'action' => 'index']) ?></li>
	           	 <li class="divider"></li>
	           	 <li><?= $this->Html->link(h('Nuevo ciclo lectivo'), ['controller' =>'Ciclolectivo', 'action' => 'add']) ?></li>
	           	 <li><?= $this->Html->link(h('Ver ciclo lectivo'), ['controller' =>'Ciclolectivo', 'action' => 'index']) ?></li>
	           
	          </ul>
	        </li>
	           <!--  FIN SECCION CLASES-->
	              <!--          SECCION PAGOS-->
	      <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pagos <span class="caret"></span><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-usd"></span></a>
	          <ul class="dropdown-menu forAnimate" role="menu">
	            <li><?= $this->Html->link(h('Nuevo'), ['controller' =>'PagosAlumnos', 'action' => 'add']) ?></li>
	            <li><?= $this->Html->link(h('Informe'), ['controller' =>'PagosAlumnos', 'action' => 'index']) ?></li>
	           
	          </ul>
	        </li>
	           <!--  FIN SECCION PAGOS-->
	             <!--          SECCION SEGUIMIENTOS-->
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Seguimientos <span class="caret"></span><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-sort"></span></a>
	          <ul class="dropdown-menu forAnimate" role="menu">
	            <li><?= $this->Html->link(h('Ver seguimientos'), ['controller' =>'SeguimientosClasesAlumnos', 'action' => 'index']) ?></li>
	            <li><?= $this->Html->link(h('Informe'), ['controller' =>'SeguimientosClasesAlumnos', 'action' => 'informe']) ?></li>
	         	<li class="divider"></li>
	           	 <li><?= $this->Html->link(h('Nueva calificación'), ['controller' =>'calificaciones', 'action' => 'add']) ?></li>
	           	 <li><?= $this->Html->link(h('Ver calificaciones'), ['controller' =>'calificaciones', 'action' => 'index']) ?></li>
	          </ul>
	        </li>
	         <!--  FIN SECCION SEGUIMIENTOS-->
	      </ul>
	    </div>
	  </div>
	</nav>
</div>