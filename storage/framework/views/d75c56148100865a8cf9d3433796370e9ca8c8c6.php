
<?php $__env->startSection('title', '首页'); ?>

<?php $__env->startSection('content'); ?>
    <div class="panel panel-default">
        <div class="panel-heading">提示</div>
        <div class="panel-body text-center">
            <h1>请先验证邮箱</h1>
            <a class="btn btn-primary" href="<?php echo e(route('root')); ?>">返回首页</a>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('home.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>