

<!DOCTYPE html>
<html lang="es">
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&family=Oxanium:wght@600;700&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <?= $this->Html->css(['estilos']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <header class="nv-gradient sticky-top shadow-sm py-2">
        <div class="container d-flex align-items-center justify-content-between">
            <a class="brand-mark" href="<?= $this->Url->build('/') ?>">
                <i class="fa-solid fa-bolt-lightning"></i>
                <span>Movilidad Eléctrica Cereza</span>
            </a>

            <nav class="d-none d-md-flex align-items-center">
                <?= $this->Html->link('Inicio', '/', ['class' => 'nav-link']) ?>
                <?= $this->Html->link('Catálogo', ['controller' => 'Vehiculos', 'action' => 'index'], ['class' => 'nav-link']) ?>
                <?= $this->Html->link('Sucursales', ['controller' => 'Lotes', 'action' => 'index'], ['class' => 'nav-link']) ?>
            </nav>

            <div class="d-none d-md-flex gap-2 align-items-center">
                <?= $this->Html->link(
                    '<i class="fa-solid fa-user me-2"></i>Login',
                    ['controller' => 'Users', 'action' => 'login'],
                    ['class' => 'btn btn-ghost btn-pill', 'escapeTitle' => false]
                ) ?>
                
                <?= $this->Html->link(
                    'Registrarse',
                    ['controller' => 'Users', 'action' => 'add'],
                    ['class' => 'btn btn-accent btn-pill shadow-sm']
                ) ?>
            </div>

            <button class="btn btn-light d-md-none border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileMenu">
                <i class="fa fa-bars fa-lg"></i>
            </button>
        </div>
    </header>

    <div class="offcanvas offcanvas-end" tabindex="-1" id="mobileMenu">
        <div class="offcanvas-header border-bottom">
            <h5 class="offcanvas-title brand-mark">Menú</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body d-flex flex-column gap-3 p-4">
            <?= $this->Html->link('Inicio', '/', ['class' => 'nav-link text-dark fs-5']) ?>
            <?= $this->Html->link('Ver Catálogo', ['controller' => 'Vehiculos', 'action' => 'index'], ['class' => 'nav-link text-dark fs-5']) ?>
            <?= $this->Html->link('Sucursales', ['controller' => 'Lotes', 'action' => 'index'], ['class' => 'nav-link text-dark fs-5']) ?>
            
            <hr class="my-3">
            
            <?= $this->Html->link('Iniciar Sesión', ['controller' => 'Users', 'action' => 'login'], ['class' => 'btn btn-ghost btn-pill w-100 justify-content-center']) ?>
            <?= $this->Html->link('Crear Cuenta', ['controller' => 'Users', 'action' => 'add'], ['class' => 'btn btn-accent btn-pill w-100 justify-content-center']) ?>
        </div>
    </div>

    <div class="container mt-3">
        <?= $this->Flash->render() ?>
    </div>

    <main class="flex-grow-1">
        <?= $this->fetch('content') ?>
    </main>

    <footer>
        <div class="container text-center">
            <div class="mb-3 brand-mark justify-content-center opacity-50" style="font-size: 1rem;">
                <i class="fa-solid fa-bolt-lightning"></i> Movilidad Eléctrica Cereza
            </div>
            <p class="mb-2">© <?= date('Y') ?> Movilidad Eléctrica Cereza S.A. Todos los derechos reservados.</p>
            <div class="small">
                <a href="#" class="mx-2">Política de Privacidad</a> &bull; 
                <a href="#" class="mx-2">Términos de Uso</a>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
