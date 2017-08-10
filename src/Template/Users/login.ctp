<?= $this->assign('title', 'Ingreso'); ?>
<section id="login">
    <div class="container">
    	<div class="row">
    	    <div class="col-xs-12">
    	     <?= $this->Flash->render('auth') ?>
        	    <div class="form-wrap">
                <h1>Ingreso a SIBA </h1>
                    <?= $this->Form->create('login-form') ?>
                        <div class="form-group">
                        <?= $this->Form->input('nombre_usuario',['class' => 'form-control', 'placeholder' => 'Nombre de usuario',
                         'label' => false , 'require'])?>
<!--                             <label for="email" class="sr-only">Nombre de usuario</label> -->
<!--                             <input type="email" name="email" id="email" class="form-control" placeholder="nperez"> -->
                        </div>
                        <div class="form-group">
<!--                             <label for="key" class="sr-only">Password</label> -->
<!--                             <input type="password" name="key" id="key" class="form-control" placeholder="Password"> -->
                                <?= $this->Form->input('password',['name' => "password" , 'class' => 'form-control', 'placeholder' => 'Password',
                         'label' => false , 'require'])?>
                        </div>
                        <div class="checkbox">
                            <span class="character-checkbox" onclick="showPassword()"></span>
                            <span class="label">Mostrar password</span>
                        </div>
                        <input type="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Ingresar">
                    <?= $this->Form->end() ?>
                    <a href="javascript:;" class="forget" data-toggle="modal" data-target=".forget-modal">Te olvidaste la password?</a>
                    <hr>
        	    </div>
    		</div> <!-- /.col-xs-12 -->
    	</div> <!-- /.row -->
    </div> <!-- /.container -->
</section>

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
				<p>Tipea tu nombre de usuario</p>
				<input type="email" name="recovery-email" id="recovery-email" class="form-control" autocomplete="off">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				<button type="button" class="btn btn-custom">Recuperar</button>
			</div>
		</div> <!-- /.modal-content -->
	</div> <!-- /.modal-dialog -->
</div> <!-- /.modal -->

<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <p>© - 2017</p>
                <p>Powered by <strong><a href="http://www.facebook.com/nicoq07" target="_blank">Nicolas Quiroga</a></strong></p>
            </div>
        </div>
    </div>
</footer>