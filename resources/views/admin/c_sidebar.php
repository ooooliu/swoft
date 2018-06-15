<!-- 侧边导航栏 -->
<div class="left-sidebar">
    <!-- 用户信息 -->
    <div class="tpl-sidebar-user-panel">
        <div class="tpl-user-panel-slide-toggleable">
            <div class="tpl-user-panel-profile-picture">
                <img src="assets/img/user08.png" alt="">
            </div>
            <span class="user-panel-logged-in-text">
              <i class="am-icon-circle-o am-text-success tpl-user-panel-status-icon"></i>
              Lyn000
          </span>
            <a href="javascript:;" class="tpl-user-panel-action-link"> <span class="am-icon-pencil"></span> 账号设置</a>
        </div>
    </div>

    <!-- 菜单 -->
    <ul class="sidebar-nav">
        <li class="sidebar-nav-heading">Components <span class="sidebar-nav-heading-info"> 附加组件</span></li>
        <li class="sidebar-nav-link">
            <a href="/" a-class="index">
                <i class="am-icon-home sidebar-nav-link-logo"></i> 首页
            </a>
        </li>
        <li class="sidebar-nav-link">
            <a href="/tables" a-class="tables">
                <i class="am-icon-table sidebar-nav-link-logo"></i> 表格
            </a>
        </li>
        <li class="sidebar-nav-link">
            <a href="/calendar" a-class="calendar">
                <i class="am-icon-calendar sidebar-nav-link-logo"></i> 日历
            </a>
        </li>
        <li class="sidebar-nav-link">
            <a href="/form" a-class="form">
                <i class="am-icon-wpforms sidebar-nav-link-logo"></i> 表单

            </a>
        </li>
        <li class="sidebar-nav-link">
            <a href="/chart" a-class="chart">
                <i class="am-icon-bar-chart sidebar-nav-link-logo"></i> 图表

            </a>
        </li>

        <li class="sidebar-nav-heading">Page<span class="sidebar-nav-heading-info"> 常用页面</span></li>
        <li class="sidebar-nav-link">
            <a href="javascript:;" class="sidebar-nav-sub-title">
                <i class="am-icon-table sidebar-nav-link-logo"></i> 数据列表
                <span class="am-icon-chevron-down am-fr am-margin-right-sm sidebar-nav-sub-ico"></span>
            </a>
            <ul class="sidebar-nav sidebar-nav-sub">
                <li class="sidebar-nav-link">
                    <a href="/table_list" a-class="table_list">
                        <span class="am-icon-angle-right sidebar-nav-link-logo"></span> 文字列表
                    </a>
                </li>

                <li class="sidebar-nav-link">
                    <a href="/table_img" a-class="table_img">
                        <span class="am-icon-angle-right sidebar-nav-link-logo"></span> 图文列表
                    </a>
                </li>
            </ul>
        </li>
        <li class="sidebar-nav-link">
            <a href="/register" a-class="register">
                <i class="am-icon-clone sidebar-nav-link-logo"></i> 注册
                <span class="am-badge am-badge-secondary sidebar-nav-link-logo-ico am-round am-fr am-margin-right-sm">6</span>
            </a>
        </li>
        <li class="sidebar-nav-link">
            <a href="/error" a-class="error">
                <i class="am-icon-tv sidebar-nav-link-logo"></i> 404错误
            </a>
        </li>

    </ul>
    <script>
        $(function () {
            var uri = GetUrlRelativePath();
            if(uri != ''){
                $('a[a-class='+uri+']').addClass('active')
            }else{
                $('a[a-class=index]').addClass('active')
            }
        })
        //侧边栏样式控制
        function GetUrlRelativePath()
        {
            var url = document.location.toString();
            var arrUrl = url.split("//");

            var start = arrUrl[1].indexOf("/") + 1;
            //stop省略，截取从start开始到结尾的所有字符
            var relUrl = arrUrl[1].substring(start);

            if(relUrl.indexOf("?") != -1){
                relUrl = relUrl.split("?")[0];
            }
            return relUrl;
        }
    </script>
</div>