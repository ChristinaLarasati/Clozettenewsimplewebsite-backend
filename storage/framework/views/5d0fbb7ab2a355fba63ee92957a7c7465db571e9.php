<?php $__env->startSection('main-content'); ?>
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
	  <!-- Content Header (Page header) -->
	  <section class="content-header">
	    <h1>
	      Edit Category	      
	    </h1>
	    <ol class="breadcrumb">
	      <li><a href="<?php echo e(route('admin.home')); ?>"><i class="fa fa-dashboard"></i> Home</a></li>	     
	      <li class="active">Edit Category</li>
	    </ol>
	  </section>

	  <!-- Main content -->
	  <section class="content">
	    <div class="row">
	      <div class="col-md-12">
	        <!-- general form elements -->
	        <div class="box box-primary">
	          <?php echo $__env->make('includes.messages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>      
	          <!-- /.box-header -->
	          <!-- form start -->
	          <form role="form" action="<?php echo e(route('category.update',$category->id)); ?>" method="post">
	          <?php echo e(csrf_field()); ?>

	          <?php echo e(method_field('PUT')); ?>

	            <div class="box-body">
	            <div class="col-lg-offset-3 col-lg-6">
	              <div class="form-group">
	                <label for="name">Title</label>
	                <input type="text" class="form-control" id="name" name="name" placeholder="Category Title" value="<?php echo e($category->name); ?>">
	              </div>

	              <div class="form-group">
	                <label for="slug">Slug</label>
	                <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug" value="<?php echo e($category->slug); ?>">
	              </div>

	            <div class="form-group">
	              <button type="submit" class="btn btn-primary">Submit</button>
	              <a href='<?php echo e(route('category.index')); ?>' class="btn btn-warning">Back</a>
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