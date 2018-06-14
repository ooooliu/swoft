<?php include ('header.php');?>

<div class="am-g tpl-g">
    <!-- 头部 -->
    <?php include ('c_header.php');?>
    <!-- 风格切换 -->
    <?php include('c_skiner.php');?>
    <!-- 侧边导航栏 -->
    <?php include('c_sidebar.php');?>

    <!-- 内容区域 -->
    <div class="tpl-content-wrapper">

        <div class="container-fluid am-cf">
            <div class="row">
                <div class="am-u-sm-12 am-u-md-12 am-u-lg-9">
                    <div class="page-header-heading"><span class="am-icon-home page-header-heading-icon"></span> 图表 <small>Amaze UI</small></div>
                    <p class="page-header-description">图表组件使用的是 <a href="http://echarts.baidu.com">百度图表echarts</a>。</p>
                </div>
                <div class="am-u-lg-3 tpl-index-settings-button">
                    <button type="button" class="page-header-button"><span class="am-icon-paint-brush"></span> 设置</button>
                </div>
            </div>

        </div>

        <div class="row-content am-cf">
            <div class="widget am-cf">
                <div class="widget-head am-cf">
                    <div class="widget-title am-fl">折线</div>
                    <div class="widget-function am-fr">
                        <a href="javascript:;" class="am-icon-cog"></a>
                    </div>
                </div>
                <div class="widget-body am-fr">
                    <div style="height: 400px" class="" id="tpl-echarts-A">

                    </div>
                </div>
            </div>


            <div class="widget am-cf">
                <div class="widget-head am-cf">
                    <div class="widget-title am-fl">雷达</div>
                    <div class="widget-function am-fr">
                        <a href="javascript:;" class="am-icon-cog"></a>
                    </div>
                </div>
                <div class="widget-body am-fr">
                    <div style="height: 400px" id="tpl-echarts-B">

                    </div>
                </div>
            </div>


            <div class="widget am-cf">
                <div class="widget-head am-cf">
                    <div class="widget-title am-fl">折线柱图</div>
                    <div class="widget-function am-fr">
                        <a href="javascript:;" class="am-icon-cog"></a>
                    </div>
                </div>
                <div class="widget-body am-fr">
                    <div style="height: 400px" id="tpl-echarts-C">

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?php include ('footer.php');?>