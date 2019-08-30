<?php $__env->startSection('main-content'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <?php echo $__env->make('admin.layouts.pagehead', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      <ol class="breadcrumb">
            <li><a href="<?php echo e(route('admin.home')); ?>"><i class="fa fa-dashboard"></i> Home</a></li>            
            <li class="active">Add User</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add User</h3>
            </div>

            <?php echo $__env->make('includes.messages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="<?php echo e(route('user.store')); ?>" method="post" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>

              <div class="box-body">
              <div class="col-lg-offset-3 col-lg-6">
                <div class="form-group">
                  <label for="name">User Name</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="User Name" value="<?php echo e(old('name')); ?>">
                </div>

                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="text" class="form-control" id="email" name="email" placeholder="email" value="<?php echo e(old('email')); ?>">
                </div>

                <div class="form-group">
                  <label for="phone">Phone</label>
                  <input type="text" class="form-control" id="phone" name="phone" placeholder="phone" value="<?php echo e(old('phone')); ?>">
                </div>

                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="password" value="<?php echo e(old('password')); ?>">
                </div>

                <div class="form-group">
                  <label for="password_confirmation">Confirm Passowrd</label>
                  <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="confirm passowrd">
                </div>
                <div class="form-group">
                  <label for="profileImage">Profile image</label>
                  <input type="file" id="profileImage" name="profile_image">                  
                </div>  
                <div class="form-group">
                  <label for="confirm_passowrd">Status</label>
                  <div class="checkbox">
                    <label ><input type="checkbox" name="status" <?php if(old('status') == 1): ?>
                      checked
                    <?php endif; ?> value="1">Status</label>
                  </div>
                </div>

                <div class="form-group">
                <label>Assign Role</label>
                <div class="row">
                  <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <div class="col-lg-3">
                        <div class="checkbox">
                          <label ><input type="checkbox" name="role[]" value="<?php echo e($role->id); ?>"> <?php echo e($role->name); ?></label>
                        </div>
                      </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

              <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href='<?php echo e(route('user.index')); ?>' class="btn btn-warning">Back</a>
              </div>
                
              </div>
          
        </div>

            </form>
          </div>
          <!-- /.box -->

          
        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>