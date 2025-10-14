
<?php if(session('success')): ?>
    <input type="hidden" id="success" value="<?php echo e(session('success')); ?>">
<?php endif; ?>
<?php if(session('error')): ?>
    <input type="hidden" id="error" value="<?php echo e(session('error')); ?>">
<?php endif; ?>

<?php /**PATH C:\xampp\htdocs\ceprocal\resources\views/layouts/messages-scripts.blade.php ENDPATH**/ ?>