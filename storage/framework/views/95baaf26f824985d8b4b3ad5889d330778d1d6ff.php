<?php echo $__env->make('fullcalendar.modais.events', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div id='external-events-list'>
</div>
<div id='calendar' data-route-load-events="<?php echo e(action('EventController@loadEvents',[$classe,$idLigClasProf])); ?>" data-route-event-update="<?php echo e(route('routeEventUpdate')); ?>" data-route-event-store="<?php echo e(route('routeEventStore')); ?>" data-route-event-delete="<?php echo e(route('routeEventDelete')); ?>" data-route-fast-event-delete="<?php echo e(route('routeFastEventDelete')); ?>" data-route-fast-event-update="<?php echo e(route('routeFastEventUpdate')); ?>" data-route-fast-event-store="<?php echo e(route('routeFastEventStore')); ?>">
</div><?php /**PATH C:\Users\hb\Desktop\Ecole-formation\resources\views/layouts/calendrierClass.blade.php ENDPATH**/ ?>