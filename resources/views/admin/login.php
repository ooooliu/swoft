<?php include ('header.php');?>

<div class="am-g tpl-g">
    <!-- 风格切换 -->
    <?php include ('skiner.php');?>

    <div class="tpl-login">
        <div class="tpl-login-content">
            <div class="tpl-login-logo">

            </div>

            <form class="am-form tpl-form-line-form">
                <div class="am-form-group">
                    <input type="text" class="tpl-form-input" name="user_name" placeholder="请输入账号">

                </div>

                <div class="am-form-group">
                    <input type="password" class="tpl-form-input" name="user_password" placeholder="请输入密码">

                </div>
                <div class="am-form-group tpl-login-remember-me">
                    <input id="remember-me" type="checkbox">
                    <label for="remember-me">

                        记住密码
                    </label>

                </div>

                <div class="am-form-group">

                    <button type="button" class="am-btn am-btn-primary  am-btn-block tpl-btn-bg-color-success  tpl-login-btn" id="user_submit">提交</button>

                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(function () {
        $('#user_submit').click(function () {
            $.post(
                "/login",
                {
                    user_name: $('input[name=user_name]').val(),
                    user_password: $('input[name=user_password]').val()
                },
                function(data) {
                    if(data.status == 200){
                        window.location.href='/?token='+data.token;
                    }else{
                        $.alert.msg(data.msg);
                    }
                });
        });
    })
</script>
<?php include ('footer.php');?>