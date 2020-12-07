
<div class="modal fade" id="modalCalendar" tabindex="-1" role="dialog" aria-labelledby="titleModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="titleModal">Título do modal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="message"></div>

                <form id="formEvent">
                    <?php echo csrf_field(); ?>
                <?php if(Session::has('idAdmin')): ?>
                    <div class="form-group row" id="activation">
                    <label for="title" class="col-sm-4 col-form-label">Activation demande </label>
                        <div class="col-sm-8">
                            <input type="hidden" name="prof" id="prof" value="<?php echo e($prof->id); ?>">
                             <select name="etat" id="etat" class="form-control">
                                 <option value="" readonly>Choisir</option>
                                 <option value="1">Activer</option>
                                 <option value="0">Désactiver</option>
                             </select>
                        </div>
                    </div>
                <?php endif; ?>
                    <div class="form-group row">
                        <label for="title" class="col-sm-4 col-form-label">Nom événement </label>
                        <div class="col-sm-8">
                            <input type="text" name="title" class="form-control" id="title">
                            <input type="hidden" name="id">
                            <input type="hidden" value="<?php echo e($idLigClasProf); ?>" name="class" id="class">
                        </div>
                    </div>
                    
                    
                    <div class="form-group row">
                        <label for="title" class="col-sm-4 col-form-label">Type cours  </label>
                        <div class="col-sm-8">
                            <select name="type" id="type" class="form-control">
                             <option   disabled selected>Choisir type</option>
                               <option value="document">Document</option>
                               <option   value="en ligne">En ligne</option>
                            </select>
                            
                            
                        </div>
                    </div>
                    <div class="form-group row" style="display:none" id="cours">
                        <label for="title" class="col-sm-4 col-form-label">Cours</label>
                        <div class="col-sm-8">
                            <select name="cours" id="cour"  class="form-control">
                             <option   disabled selected>Choisir cours</option>
                               <?php $__currentLoopData = $cours; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                               <option   value="<?php echo e($c->id); ?>"><?php echo e($c->nomCour); ?></option>
                               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            
                        </div>
                    </div>

                    <div class="form-group row" style="display:none" id="salles">
                        <label for="title" class="col-sm-4 col-form-label">Salle en ligne</label>
                        <div class="col-sm-8">
                            <select name="salle" id="salle" class="form-control">
                             <option   disabled selected>Choisir salle</option>
                               <?php $__currentLoopData = $lives; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $l): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                               <option   value="<?php echo e($l->id); ?>"><?php echo e($l->nomSalle); ?></option>
                               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="start" class="col-sm-4 col-form-label">Date debut</label>
                        <div class="col-sm-8">
                            <input type="text" name="start" class="form-control date-time" id="start">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="end" class="col-sm-4 col-form-label">Date fin</label>
                        <div class="col-sm-8">
                            <input type="text" name="end" class="form-control date-time" id="end">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="description" class="col-sm-4 col-form-label">Description</label>
                        <div class="col-sm-8">
                            <textarea name="description" id="description" cols="40" rows="4"></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <button type="button" class="btn btn-danger deleteEvent">Supprimer</button>
                <button type="button" class="btn btn-primary saveEvent">Ajouter</button>
            </div>
        </div>
    </div>
</div>

<?php /**PATH C:\Users\BADR\Desktop\FullCalendar-4.x-Laravel-6.x\resources\views/fullcalendar/modais/events.blade.php ENDPATH**/ ?>