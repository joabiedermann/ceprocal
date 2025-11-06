<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/toastr.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/toastify.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.messages-scripts', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<?php $__env->startSection('main_content'); ?>
    <!-- loader starts-->
    <div class="loader-wrapper">
        <div class="loader">
            <div class="loader4"></div>
        </div>
    </div>
    <!-- loader ends-->
    <!-- login page start-->
    <div class="container-fluid p-0">
        <div class="row m-0">
            <div class="col-12 p-0">
                <div class="login-card login-dark">
                    <div>
                        <div> 
                            <a class="logo" href="<?php echo e(route('dashboard')); ?>">
                                <img class="img-fluid for-light" src="<?php echo e(asset('storage/logos/logo_dark.png')); ?>" alt="logo" width="400">
                                <img class="img-fluid for-dark" src="<?php echo e(asset('storage/logos/logo.png')); ?>" alt="logo" width="400">
                            </a>
                        </div>
                        <div class="login-main">
                            <form class="theme-form" method="POST" action="<?php echo e(route('login')); ?>" id="loginForm">
                                <?php echo csrf_field(); ?>
                                <h4>Iniciar Sesión </h4>
                                <p>Ingresa tus credenciales para acceder</p>
                                <div class="form-group">
                                    <label class="col-form-label">Correo Electrónico</label>
                                    <input id="email" type="email" class="form-control" name="email"
                                        value="<?php echo e(old('email')); ?>" placeholder="Ingrese su correo electrónico"> 
                                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  
                                        <span class="text-danger d-block" role="alert">
                                            <strong><?php echo e($message); ?></strong>
                                        </span> 
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                <div class="form-group">
                                    <label class="col-form-label">Contraseña </label>
                                    <div class="form-input position-relative">
                                        <input id="password" type="password" class="form-control" name="password"
                                            value="<?php echo e(old('password')); ?>" placeholder="Ingrese su contraseña">
                                        <div class="show-hide"> <span class="show"></span></div>
                                        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="text-danger d-block" role="alert">
                                                <strong><?php echo e($message); ?></strong> 
                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <div class="form-group re-captcha"></div>
                                <div class="form-group mb-0 text-end">
                                    <?php if(Route::has('password.request')): ?>
                                        <a class="checkbox1" href="<?php echo e(route('password.request')); ?>">Olvidaste tu contraseña?</a>
                                    <?php endif; ?>
                                    <div class="text-end mt-3">
                                        <button class="btn btn-primary btn-block w-100 spinner-btn" type="submit">Iniciar Sesión</button>
                                    </div>
                                </div>
                            </form> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(asset('custom/js/auth/login.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/bookmark/jquery.validate.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/custom-validation/validation.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/toastr.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/toastify/toastify.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.authentication.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\ceprocal\resources\views/auth/login.blade.php ENDPATH**/ ?>