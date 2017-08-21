<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$description = 'Iba Escuela ' .date("Y");
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $description?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css(['bootstrap.min', 'base.css', 'font-awesome.min', 'login' ,'menulateral' , 'varios']) ?>
    <?= $this->Html->css('cake.css') ?>
    <?= $this->Html->script(['jquery-3.1.1.min','bootstrap','varios' ]) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
 <?php if (!empty($current_user)) : ?>
    <nav class="top-bar expanded" data-topbar role="navigation">
     
     	<div class="col-lg-2 nopadding title-area">
	        <ul class="">
	            <li class="name">
	                <h1><a href=""><?= $this->fetch('title') ?></a></h1>
	            </li>
	         </ul>
         </div>
         <div  class="col-lg-2 col-lg-offset-8" >
        
				<ul class="nav navbar-nav navbar-right">
					<li>
						<a style="color: white; background-color:#01545B;" href="#" class="dropdown-toggle" data-toggle="dropdown"><?php if (!empty($current_user)) : print $current_user['nombre'] ; endif;?> <b class="caret"></b></a>
	                        <ul class="dropdown-menu forAnimate">
								<li><a href="javascript:;" class="forget" data-toggle="modal" data-target=".forget-modal">Cambiar password</a>
								</li>							
	                            <li><?= $this->Html->link(h('Salir'), ['controller' =>'Users', 'action' => 'logout']) ?></li>
							</ul>
					</li>
			</ul>
        <?php endif;?>
    <form class="form-horizontal" role="form">
		   <div class="modal fade forget-modal" tabindex="-1" role="dialog" aria-labelledby="myForgetModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-sm">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">
							<span aria-hidden="true">×</span>
							<span class="sr-only">Close</span>
						</button>
						<h4 class="modal-title">Recuperar contraseña</h4>
					</div>
					<div class="modal-body">
						<p>Tipea tu dni</p>
						<input type="email" name="recovery-email" id="recovery-email" class="form-control" autocomplete="off">
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
						<button type="submit" class="btn btn-custom">Recuperar</button>
					</div>
				</div> <!-- /.modal-content -->
			</div> <!-- /.modal-dialog -->
		</div> <!-- /.modal -->
        </form>
 </div>
         
         
    </nav>
    <?= $this->Flash->render() ?>
    <div class ="flex-container" >
     	<div class="col-lg-12 nopadding">
     	<?php if (!empty($current_user) && $current_user['rol_id'] === ADMINISTRADOR) : ?>
          	<?= $this->element('menuadmin') ?>
         <?php elseif (!empty($current_user) && $current_user['rol_id'] === PROFESOR) : ?>
         	<?= $this->element('menuprofesor') ?>
         <?php endif; ?>
            <?= $this->fetch('content') ?>
        </div>
    </div>
    <footer>
    </footer>
</body>
</html>
