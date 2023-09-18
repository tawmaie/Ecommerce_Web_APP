
<?php $__env->startSection('content'); ?>
<form action=" <?php echo e(route('register')); ?> " method="post" enctype="multipart/form-data">
    <fieldset>
      <div id="legend">
        <legend class="">Register</legend>
      </div>
      <div class="control-group">
        <!-- E-mail -->
        <label class="control-label" for="email">Name</label>
        <div class="controls">
          <input type="text" id="text" name="email" placeholder="" class="input-xlarge">
          <p class="help-block">Please provide your E-mail</p>
        </div>
      </div>

      <div class="control-group">
        <!-- E-mail -->
        <label class="control-label" for="email">E-mail</label>
        <div class="controls">
          <input type="text" id="email" name="email" placeholder="" class="input-xlarge">
          <p class="help-block">Please provide your E-mail</p>
        </div>
      </div>
   
      <div class="control-group">
        <!-- Password-->
        <label class="control-label" for="password">Password</label>
        <div class="controls">
          <input type="password" id="password" name="password" placeholder="" class="input-xlarge">
          <p class="help-block">Password should be at least 4 characters</p>
        </div>
      </div>
   
      <div class="control-group">
        <!-- Password -->
        <label class="control-label"  for="password_confirm">Password (Confirm)</label>
        <div class="controls">
          <input type="password" id="password_confirm" name="password_confirm" placeholder="" class="input-xlarge">
          <p class="help-block">Please confirm password</p>
        </div>
      </div>
   
      <div class="control-group">
        <!-- Button -->
        <div class="controls">
          <button type="submit" class="btn btn-success">Register</button>
        </div>
      </div>
    </fieldset>
  </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xxamp\htdocs\project\resources\views/User/register.blade.php ENDPATH**/ ?>