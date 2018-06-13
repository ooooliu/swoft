<?php include ('header.php');?>

<div class="am-g tpl-g">
    <!-- 风格切换 -->
    <?php include ('skiner.php');?>

    <div class="tpl-login">
        <div class="tpl-login-content">
            <div class="tpl-login-title">注册用户
                <span class="tpl-login-content-info">
                    (创建一个新的用户)
                </span>
            </div>

            <form class="am-form tpl-form-line-form" id="user" data-am-validator>
                <div class="am-form-group">
                    <input type="text" class="tpl-form-input js-pattern-email" name="email" placeholder="邮箱" required/>
                </div>

                <div class="am-form-group">
                    <input type="text" class="tpl-form-input" name="user_name" placeholder="用户名(至少1个字符)" minlength="1" required>
                </div>

                <div class="am-form-group">
                    <input type="password" class="tpl-form-input" name="password" placeholder="请输入密码(至少3个字符)" minlength="3" required>
                </div>

                <div class="am-form-group">
                    <input type="password" class="tpl-form-input" name="confirm_password" placeholder="再次输入密码" minlength="3" required>
                </div>

                <div class="am-form-group tpl-login-remember-me">
                    <input id="remember-me" type="checkbox">
                    <label for="remember-me">
                        我已阅读并同意 <a href="javascript:;">《用户注册协议》</a>
                    </label>
                </div>

                <div class="am-form-group">

                    <button type="button" class="am-btn am-btn-primary  am-btn-block tpl-btn-bg-color-success  tpl-login-btn" id="submit_user">提交</button>

                </div>
            </form>
        </div>
    </div>
</div>
    <script src="assets/js/md5.js"></script>
    <script>
        $(function() {

            $('#submit_user').click(function () {

                if(!$('input[type=checkbox]').is(':checked')){
                    $.alert.msg('请先阅读用户注册协议');
                    return false;
                }

                /*if(!$('[data-am-validator]').validator('isFormValid')){
                    return false;
                }*/

                var password = $('input[name=password]').val();
                var confirm_password = $('input[name=confirm_password]').val();

                /*if(password != confirm_password){
                    $.alert.msg('两次输入的密码不一致');
                    return false;
                }*/

                $.post(
                    "/register?token=<?=$token?>",
                    {
                        email: $('input[name=email]').val(),
                        user_name: $('input[name=user_name]').val(),
                        user_password: md5(password),
                        confirm_password: md5(confirm_password)
                    },
                    function(data) {
                        $.alert.msg(data.msg);
                        if(data.status == 200){
                            setTimeout("home()", 1000);
                        }
                    });
            });
        })
        function home() {
            window.location.href="/?token=<?=$token?>";
        }
    </script>
<?php include ('footer.php');?>