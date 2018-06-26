<?php include ('header.php');?>

<div class="am-g tpl-g">
    <!-- 风格切换 -->
    <?php include('c_skiner.php');?>

    <div class="tpl-login">
        <div class="tpl-login-content">
            <div class="tpl-login-logo">

            </div>

            <form class="am-form tpl-form-line-form">
                <div class="am-form-group">
                    <input type="text" class="tpl-form-input" name="email" placeholder="请输入邮箱">

                </div>

                <div class="am-form-group">
                    <input type="password" class="tpl-form-input" name="password" placeholder="请输入密码">

                </div>
                <div class="am-form-group tpl-login-remember-me">
                    <input id="remember-me" type="checkbox" checked="checked" >
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
<script src="assets/js/md5.js"></script>
<script src="assets/js/cookie.js"></script>
<script>
    $(function () {
        $('#user_submit').click(function () {
            submit();
        });
        //回车事件
        $(this).keyup(function(event){
            if(event.keyCode ==13){
                submit();
            }
        });

        var login_email = getCookie('login-email');
        var login_password = getCookie('login-password');

        if(login_email && login_password){
            $('input[name=email]').val(login_email);
            $('input[name=password]').val(login_password);
        }
    })
    function submit() {
        var email = $('input[name=email]').val();
        var password = $('input[name=password]').val();

        //记住密码
        if($('#remember-me').is(':checked')){
            setCookie('login-email', email, 1);
            setCookie('login-password', password, 1);
        }else{
            delCookie('login-email');
            delCookie('login-password');
        }

        $.post(
            "/login",
            {
                email: email,
                password: md5(password)
            },
            function(data) {
                if(data.status == 200){
                    window.location.href='/';
                }else{
                    $.alert.msg(data.msg);
                }
            });
    }
</script>
<?php include ('footer.php');?>