<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo $__env->yieldContent('title', 'LaraBBS'); ?> | Tiicle - 共享编程知识 </title>
    <meta name="author" content="Summer"/>
    <meta name="description"
          content="<?php echo $__env->yieldContent('description', 'Tiicle 是一个程序员分享编程知识和协作的平台。你可以在 Tiicle 上记录编程小贴士、编程小技巧或者编码日志。'); ?>"/>
    <meta name="keywords" content="编程,编码,编程学习,编程技巧,编程知识,php,javascript,laravel,java,vuejs "/>

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <?php echo $__env->yieldContent('css'); ?>

    <script>
        var Config = {
            'user_id': '<?php echo e(Auth::user() ? Auth::user() : 0); ?>',
        };
    </script>
</head>

<body class="<?php echo e(route_class()); ?>-page">
<div class="main container">

    <?php echo $__env->make('home.layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('flash::message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    
    <div class="ui centered grid container stackable" id="app">
        <?php echo $__env->yieldContent('content'); ?>
    </div>
    
    <div class="push"></div>

</div>
<!--反馈意见-->
<a class="circular ui icon button fixed feedback popover" data-content="建议与反馈 @Summer" data-position="left center"
   href="mailto:summer@yousails.com">
    <i class="icon talk outline"></i>
</a>
<!--end反馈意见-->
<?php echo $__env->make('home.layouts.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!-- Scripts -->
<script src="<?php echo e(asset('js/app.js')); ?>"></script>
<?php echo $__env->yieldContent('scripts'); ?>
<script>

    $('.message .close')
        .on('click', function () {
            $(this)
                .closest('.message-container')
                .transition('fade')
            ;
        })
    ;

</script>
</body>
</html>