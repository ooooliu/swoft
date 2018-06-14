<?php include ('header.php');?>
<link rel="stylesheet" href="assets/css/fullcalendar.min.css" />
<link rel="stylesheet" href="assets/css/fullcalendar.print.css" media='print' />

<div class="am-g tpl-g">
    <!-- 头部 -->
    <?php include ('c_header.php');?>
    <!-- 风格切换 -->
    <?php include('c_skiner.php');?>
    <!-- 侧边导航栏 -->
    <?php include('c_sidebar.php');?>


    <!-- 内容区域 -->
    <div class="tpl-content-wrapper">


        <div class="row-content am-cf">
            <div class="tpl-calendar-box">
                <div id="calendar"></div>
            </div>






        </div>
    </div>
</div>

<div class="am-modal am-modal-no-btn" id="calendar-edit-box">
    <div class="am-modal-dialog tpl-model-dialog">
        <div class="am-modal-hd">
            <a href="javascript: void(0)" class="am-close edit-box-close am-close-spin" data-am-modal-close>&times;</a>
        </div>
        <div class="am-modal-bd tpl-am-model-bd am-cf">

            <form class="am-form tpl-form-border-form">
                <div class="am-form-group am-u-sm-12">
                    <label for="user-name" class="am-u-sm-12 am-form-label am-text-left">标题 <span class="tpl-form-line-small-title">Title</span></label>
                    <div class="am-u-sm-12">
                        <input type="text" class="tpl-form-input am-margin-top-xs calendar-edit-box-title" id="user-name" placeholder="" disabled>
                    </div>
                </div>







            </form>

        </div>
    </div>
</div>

<script src="assets/js/moment.js"></script>
<script src="assets/js/fullcalendar.min.js"></script>
<script>
    $(document).ready(function() {
        var editBox = $('#calendar-edit-box');

        $('.edit-box-close').on('click', function() {
            $('#calendar').fullCalendar('unselect');
        })
        $('#calendar').fullCalendar({

            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },

            monthNames: ["一月", "二月", "三月", "四月", "五月", "六月", "七月", "八月", "九月", "十月", "十一月", "十二月"],
            monthNamesShort: ["一月", "二月", "三月", "四月", "五月", "六月", "七月", "八月", "九月", "十月", "十一月", "十二月"],
            dayNames: ["星期日", "星期一", "星期二", "星期三", "星期四", "星期五", "星期六"],
            dayNamesShort: ["星期日", "星期一", "星期二", "星期三", "星期四", "星期五", "星期六"],
            today: ["今天"],
            firstDay: 1,
            buttonText: {
                today: '本月',
                month: '月',
                week: '周',
                day: '日',
                prev: '上一月',
                next: '下一月'
            },
            defaultDate: '2016-09-12',
            lang: 'zh-cn',
            navLinks: true, // can click day/week names to navigate views
            selectable: true,
            selectHelper: true,
            select: function(start, end) {
                var title = prompt('填写你的记录的:');
                var eventData;
                if (title) {
                    eventData = {
                        title: title,
                        start: start,
                        end: end
                    };
                    $('#calendar').fullCalendar('renderEvent', eventData, true); // stick? = true
                }
                $('#calendar').fullCalendar('unselect');



            },
            editable: true,
            eventLimit: true, // allow "more" link when too many events
            eventClick: function(event, jsEvent, view) {

                // event.source.events[0].title = '222223333'
                // 修改数据
                // 标题
                $('.calendar-edit-box-title').val(event.title)



                //  弹出框
                editBox.modal();





            },
            events: [{
                id: 1,
                title: '给她抱抱 叫她包包 喂她吃饱 给她买包',
                start: '2016-09-01',
                end: '2016-09-10'
            }, {
                id: 2,
                title: '给她抱抱',
                start: '2016-09-07',
                end: '2016-09-10'
            }, {
                id: 3,
                title: '叫她包包',
                start: '2016-09-09',
                end: '2016-09-10'
            }, {
                id: 4,
                title: '喂她吃饱',
                start: '2016-09-16',
                end: '2016-09-10'
            }, {
                id: 5,
                title: '喂她吃饱',
                start: '2016-09-11',
                end: '2016-09-13'
            }, {
                id: 6,
                title: '喂她吃饱',
                start: '2016-09-12',
                end: '2016-09-12'
            }, {
                id: 7,
                title: '喂她吃饱',
                start: '2016-09-12',
                end: '2016-09-12'
            }, {
                id: 8,
                title: '喂她吃饱',
                start: '2016-09-12',
                end: '2016-09-12'
            }, {
                id: 9,
                title: '喂她吃饱',
                start: '2016-09-12',
                end: '2016-09-12'
            }, {
                id: 10,
                title: '喂她吃饱',
                start: '2016-09-12',
                end: '2016-09-12'
            }, {
                id: 11,
                title: 'Birthday Party',
                start: '2016-09-13',
                end: '2016-09-12'
            }, {
                id: 12,
                title: 'Click for Google',
                start: '2016-09-28',
                end: '2016-09-12'
            }]
        });

    });
</script>

<?php include ('footer.php');?>