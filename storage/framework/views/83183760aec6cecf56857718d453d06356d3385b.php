<?php $__env->startComponent('mail::message'); ?>
# Introduction

The body of your message.

<?php $__env->startComponent('mail::button', ['url' => '']); ?>
Button Text
<?php echo $__env->renderComponent(); ?>

Thanks,<br>
<?php echo e(config('app.name')); ?>

<?php echo $__env->renderComponent(); ?>
<?php /**PATH C:\Users\BADR\Desktop\FullCalendar-4.x-Laravel-6.x\resources\views/emails/contactForm.blade.php ENDPATH**/ ?>