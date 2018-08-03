<script src="https://cdn.bootcss.com/jquery/2.1.0/jquery.min.js"></script>
<script src="https://static.geetest.com/static/tools/gt.js"></script>
<div id="<?php echo e($captchaid); ?>"></div>
<p id="wait-<?php echo e($captchaid); ?>" class="show">正在加载验证码...</p>
<?php  use Illuminate\Support\Facades\Config; ?>
<script>
    var geetest = function(url) {
        var handlerEmbed = function(captchaObj) {
            $("#<?php echo e($captchaid); ?>").closest('form').submit(function(e) {
                var validate = captchaObj.getValidate();
                if (!validate) {
                    alert('<?php echo e(Config::get('geetest.client_fail_alert')); ?>');
                    e.preventDefault();
                }
            });
            captchaObj.appendTo("#<?php echo e($captchaid); ?>");
            captchaObj.onReady(function() {
                $("#wait-<?php echo e($captchaid); ?>")[0].className = "hide";
            });
            if ('<?php echo e($product); ?>' == 'popup') {
                captchaObj.bindOn($('#<?php echo e($captchaid); ?>').closest('form').find(':submit'));
                captchaObj.appendTo("#<?php echo e($captchaid); ?>");
            }
        };
        $.ajax({
            url: url + "?t=" + (new Date()).getTime(),
            type: "get",
            dataType: "json",
            success: function(data) {
                initGeetest({
                    gt: data.gt,
                    challenge: data.challenge,
                    product: "<?php echo e($product?$product:Config::get('geetest.product', 'float')); ?>",
                    offline: !data.success,
                    new_captcha: data.new_captcha,
                    lang: '<?php echo e(Config::get('geetest.lang', 'zh-cn')); ?>',
                    http: '<?php echo e(Config::get('geetest.protocol', 'http')); ?>' + '://'
                }, handlerEmbed);
            }
        });
    };
    (function() {
        geetest('<?php echo e($url?$url:Config::get('geetest.url', 'geetest')); ?>');
    })();
</script>
<style>
    .hide {
        display: none;
    }
</style>
