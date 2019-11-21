<?php $__env->startSection('content'); ?>
	<div class='container'>
		<div class="row">
			<?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<div class="col-md-4">
					<div class="card" style="width: 18rem;">
						<div class="card-body">
							<h5 class="card-title"><?php echo e($key['nama']); ?></h5>
							<p class="card-text"><?php echo e($key['alamat']); ?></p>
						</div>
					</div>
				</div>
			$endforeach
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>