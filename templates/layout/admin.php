 <!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css(['estilos_admin']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <div class="container">
        <header class="app-header">
            <nav class="main-nav">
                <?= $this->Html->link(__('Inicio'), ['controller' => 'Viajes', 'action' => 'dashboard']) ?> |
                <?= $this->Form->postLink(__('Cerrar sesión'), ['controller' => 'Users', 'action' => 'logout'], ['confirm' => __('¿Salir de la sesión?')]) ?>
            </nav>
        </header>

        <div class="message">
            <?= $this->Flash->render() ?>
        </div>
        
        <?= $this->fetch('content') ?>
    </div>
</body>
</html>
