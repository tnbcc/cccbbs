<nav class="ui main borderless menu top stackable">
    <div class="ui container">
        <a href="<?php echo e(url('/')); ?>" class="header item">
            Tiicle
            <div class="ui left pointing orange basic label" style="font-weight: normal;"> 记录让编码更高效</div>
        </a>

        <!-- Left Side Of Navbar -->
        <a class="item" href="#">话题</a>
        <a class="item " href="#">分享</a>
        <a class="item " href="#">教程</a>
        <a class="item " href="">问答</a>
        <a class="item" href="">公告</a>

        <div class="ui fluid category search item">
            <div class="ui icon input">
                <input class="prompt" type="text" placeholder="" autocomplete="off">
                <i class="search icon"></i>
            </div>
            <div class="results"></div>
        </div>
        <a href="#" class="item top-nav-hint">
            <div class="duke-pulse about-us hide" style="display: none;"></div>
            <i class="icon idea"></i>
            如何高效地记录？
        </a>
        <div class=" right menu stackable">
            <!-- Authentication Links -->
            <?php if(auth()->guard()->guest()): ?>
                <div class="item">
                    <a class="ui basic button" href="<?php echo e(route('login')); ?>"><i class="icon user "></i> 登录 </a>
                </div>
            <?php else: ?>
                <a class="ui item" href="#">
                    <i class="plus icon"></i>
                </a>
                <a class="item" href="#">
                    <span class="ui basic circular label notification badge-<?php echo e(Auth::user()->notification_count > 0 ? 'hint' : ''); ?>">
                       <?php echo e(Auth::user()->notification_count); ?>

                    </span>
                </a>
                <div class="ui simple dropdown item stackable nav-user-item" tabindex="0">
                    <img class="ui avatar image" src="<?php echo e(Auth::user()->avatar); ?>">&nbsp;
                    <?php echo e(Auth::user()->name); ?><i class="dropdown icon"></i>
                    <div class="ui menu stackable" tabindex="-1">
                        <a href="#" class="item"><i class="icon user"></i>个人中心</a>

                        <a href="#" class="item"><i class="icon cogs"></i>编辑资料</a>

                        <a href="javascript:void(0)" class="item" id="login-out">
                            <i class="icon sign out"></i>退出
                        </a>

                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                            <?php echo e(csrf_field()); ?>

                        </form>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</nav>