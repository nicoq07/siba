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
    <nav class="top-bar expanded" data-topbar role="navigation">
       <?php if (!empty($current_user)) : ?>
        <ul class="title-area col-lg-2">
            <li class="name">
                <h1><a href=""><?= $this->fetch('title') ?></a></h1>
            </li>
         </ul>
		<ul class="nav navbar-nav right" style="margin-right: 50px!important;">
				<li>
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php if (!empty($current_user)) : print $current_user['nombre'] ; endif;?> <b class="caret"></b></a>
	                        <ul class="dropdown-menu">
	                            <li><?= $this->Html->link(h('Perfil'), ['controller' =>'Users', 'action' => 'view']) ?></li>
	                            <li><?= $this->Html->link(h('Salir'), ['controller' =>'Users', 'action' => 'logout']) ?></li>
							</ul>
				</li>
		</ul>
        <?php endif;?>
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
