<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="<?php echo e(env('APP_NAME')); ?>">
    <meta name="keywords"
        content="admin template, <?php echo e(env('APP_NAME')); ?>, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="<?php echo e(asset('storage/logos/logo-icon.png')); ?>" type="image/x-icon">
    <link rel="shortcut icon" href="<?php echo e(asset('storage/logos/logo-icon.png')); ?>" type="image/x-icon">
    <title><?php echo e(env('APP_NAME')); ?></title>
    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600;700;800&amp;display=swap"
        rel="stylesheet">
    <?php echo $__env->make('layouts.authentication.css', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</head>

<body>
    <?php echo $__env->yieldContent('main_content'); ?>
    <?php echo $__env->make('layouts.authentication.scripts', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\ceprocal\resources\views/layouts/authentication/master.blade.php ENDPATH**/ ?>