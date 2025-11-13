<div class="login-page">
	<div class="login-box">
		<h2>Iniciar sesión</h2>

		<?= $this->Flash->render() ?>

		<?= $this->Form->create(null, ['class' => 'form-login']) ?>
			<?= $this->Form->control('username', ['label' => 'Usuario', 'required' => true, 'class' => 'input']) ?>
			<?= $this->Form->control('password', ['label' => 'Contraseña', 'required' => true, 'class' => 'input']) ?>
			<div class="form-actions">
				<?= $this->Form->submit('Entrar', ['class' => 'btn-primary']) ?>
			</div>
		<?= $this->Form->end() ?>
	</div>
</div>