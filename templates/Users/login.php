<div class="login-page">
    <div class="login-box">
        <h2>Iniciar sesión</h2>
        
        <?= $this->Flash->render() ?>

        <?= $this->Form->create(null, ['class' => 'form-login']) ?>
            
            <?= $this->Form->control('username', [
                'label' => 'Usuario', 
                'required' => true, 
                'class' => 'input',
                'placeholder' => 'Introduce tu usuario'
            ]) ?>
            
            <?= $this->Form->control('password', [
                'label' => 'Contraseña', 
                'required' => true, 
                'class' => 'input',
                'placeholder' => 'Introduce tu contraseña'
            ]) ?>
            
            <div class="form-actions">
                <?= $this->Form->submit('Entrar', ['class' => 'btn-primary']) ?>
            </div>
            
        <?= $this->Form->end() ?>
        
        <p style="text-align:center; margin-top:15px;">
            <small>¿No tienes cuenta? <a href="/users/add">Regístrate como Cliente</a></small>
        </p>
    </div>
</div>