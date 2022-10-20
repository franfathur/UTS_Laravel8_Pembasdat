<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">


    <?php echo \Livewire\Livewire::styles(); ?>

</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-primary shadow-sm">
            <div class="container-fluid">

                <a class="navbar-brand" href="<?php echo e(url('/home')); ?>">
                    TOKO ALAT TULIS
                </a>
                <?php if(auth()->guard()->check()): ?>
                <a class="navbar-brand" href="<?php echo e(url('/home')); ?>">
                    Home
                </a>
                <a class="navbar-brand" href="<?php echo e(url('/products')); ?>">
                    Products
                </a>
                <a class="navbar-brand" href="<?php echo e(url('/cart')); ?>">
                    Pembayaran
                </a>
                <?php endif; ?>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="<?php echo e(__('Toggle navigation')); ?>">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <?php if(auth()->guard()->guest()): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
                        </li>
                        <?php if(Route::has('register')): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a>
                        </li>
                        <?php endif; ?>
                        <?php else: ?>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <?php echo e(Auth::user()->name); ?>

                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('auth.logout', [])->html();
} elseif ($_instance->childHasBeenRendered('1Feqx40')) {
    $componentId = $_instance->getRenderedChildComponentId('1Feqx40');
    $componentTag = $_instance->getRenderedChildComponentTagName('1Feqx40');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('1Feqx40');
} else {
    $response = \Livewire\Livewire::mount('auth.logout', []);
    $html = $response->html();
    $_instance->logRenderedChild('1Feqx40', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                            </div>
                        </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <?php echo $__env->yieldContent('content'); ?>
            <div class="container-fluid">
                <?php echo e(isset($slot) ? $slot : null); ?>

            </div>
        </main>
    </div>

    <?php echo \Livewire\Livewire::scripts(); ?>

    <script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js"
        data-turbolinks-eval="false"></script>
    <?php echo $__env->yieldPushContent('script-custom'); ?>
</body>

</html><?php /**PATH B:\Fatur File\xampp\htdocs\cartmaster\cartmaster\resources\views/layouts/app.blade.php ENDPATH**/ ?>