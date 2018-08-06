

<?php $__env->startSection('title', $user->name . ' 的个人中心'); ?>

<?php $__env->startSection('content'); ?>
    <!--左部分-->
    <div class="four wide column ">
        <div class="ui stackable cards">
            <div class="ui card">
                <div class="image">
                    <img src="<?php echo e($user->avatar); ?>">
                </div>
                <div class="content">
                    <div class="header">
                        <?php echo e($user->name); ?>

                    </div>

                    <p class="meta">
                            <i class="non binary transgender icon"></i><?php echo e(\App\Models\User::$sexMap["$user->gender"]); ?>

                    </p>

                    <?php if($user->github_name): ?>
                        <p class="meta">
                            <a href="<?php echo e($user->github_url); ?>" target="_blank">
                                <i class="icon github alternate grey"></i>
                                <?php echo e($user->github_name); ?>

                            </a>
                        </p>
                    <?php endif; ?>

                    <div class="description"></div>
                </div>

                <?php if($user->remark): ?>
                    <div class="extra content">
                        <i class="marker icon"></i><?php echo e($user->remark); ?>

                    </div>
                <?php endif; ?>

                <div class="extra content">
                    <user-followers-button user="<?php echo e($user->id); ?>"></user-followers-button>
                </div>
            </div>
        </div>
    </div>
    <!--右部分-->
    
    <div class="twelve wide column">
        <div class="ui stacked segment">
            <div class="ui teal ribbon label"><i class="trophy icon"></i>贡献 <?php echo e($user->contribution_count); ?></div>
            <div class="content extra-padding">
                <div class="ui attached tabular menu stackable">
                    <a class="item " data-tab="first" href="<?php echo e(route('users.show', $user->id)); ?>"><i class="icon list layout"></i>话题</a>
                    <a class="item " href=""><i class="icon comments"></i>回复</a>
                    
                    
                    
                </div>

            </div>
        </div>
    </div>
    <!--end右部分-->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('home.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>