<?php include ('header.php');?>

<div class="am-g tpl-g">
    <!-- 风格切换 -->
    <?php include ('skiner.php');?>

    <div class="tpl-login">
        <div class="tpl-login-content">
            <div class="tpl-login-title">注册用户</div>
            <span class="tpl-login-content-info">
                  创建一个新的用户
              </span>


            <form class="am-form tpl-form-line-form">
                <div class="am-form-group">
                    <input type="text" class="tpl-form-input" id="user-name" placeholder="邮箱">

                </div>

                <div class="am-form-group">
                    <input type="text" class="tpl-form-input" id="user-name" placeholder="用户名">
                </div>

                <div class="am-form-group">
                    <input type="password" class="tpl-form-input" id="user-name" placeholder="请输入密码">
                </div>

                <div class="am-form-group">
                    <input type="password" class="tpl-form-input" id="user-name" placeholder="再次输入密码">
                </div>

                <div class="am-form-group tpl-login-remember-me">
                    <input id="remember-me" type="checkbox">
                    <label for="remember-me">

                        我已阅读并同意 <a href="javascript:;">《用户注册协议》</a>
                    </label>
                </div>

                <div class="am-form-group">

                    <button type="button" class="am-btn am-btn-primary  am-btn-block tpl-btn-bg-color-success  tpl-login-btn">提交</button>

                </div>
            </form>
        </div>
    </div>
</div>

<?php include ('footer.php');?>