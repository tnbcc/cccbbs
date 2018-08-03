<?php $__env->startSection('title', '用户登录'); ?>
<?php $__env->startSection('content'); ?>

<div class="six wide column mt150 mb100">
    <div class="ui stacked segment">
        <div class="content">
            <h2>账号登录</h2>
            <div class="ui divider"></div>
            <?php echo $__env->make('home.common.error', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <form class="ui form" role="form" method="POST" action="<?php echo e(route('login')); ?>">
                <?php echo e(csrf_field()); ?>

                <div class="field">
                    <div class="ui left icon input">
                        <i class="envelope icon"></i>
                        <input type="text" name="account" placeholder="邮箱/用户名/手机" value="<?php echo e(old('account')); ?>" required="">
                    </div>
                </div>
                <div class="field">
                    <div class="ui left icon action input ">
                        <i class="lock icon"></i>
                        <input type="password" name="password" placeholder="密码" value="" required="">

                        <a class="ui button basic light" href="<?php echo e(route('password.request')); ?>">
                            忘记密码？
                        </a>
                    </div>
                </div>
                <div class="field">
                    <div class="ui left icon input">
                        <i class="envelope icon"></i>
                        <input type="text" name="captcha" placeholder="请输入验证码" id="captcha" required="">
                        <img class="thumbnail captcha" src="<?php echo e(captcha_src('flat')); ?>" onclick="this.src='/captcha/flat?'+Math.random()" title="点击图片重新获取验证码">
                    </div>
                </div>
                <div class="field">
                    <div class="ui checkbox checked">
                        <input type="checkbox" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>
                        <label>记住密码</label>
                    </div>
                </div>
                <div class="ui buttons fluid">
                    <button class="ui blue button" type="submit"><i class="send icon"></i>登录</button>
                    <div class="or"></div>
                    <a class="ui button" href="<?php echo e(route('register')); ?>">注册</a>
                </div>
            </form>

            <div class="ui horizontal divider">Or</div>

            <a class="ui basic teal button fluid" href="#"><i class="icon github alternate"></i> Github 登录</a>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('home.auth.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>