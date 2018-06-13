//添加alert扩展
$.extend({
    alert:{
        'msg':function (msg) {
            if(!$('#msg-alert').html()){
              var html = '<div class="am-modal am-modal-alert" tabindex="-1" id="msg-alert" style="display: none">\n' +
                  '        <div class="am-modal-dialog">\n' +
                  '            <div class="am-modal-bd" id="msg"></div>\n' +
                  '            <div class="am-modal-footer">\n' +
                  '                <span class="am-modal-btn">确定</span>\n' +
                  '            </div>\n' +
                  '        </div>\n' +
                  '    </div>';
              $('body').append(html);
            }
            $('#msg').text(msg);
            $('#msg-alert').modal('open');
        }
    },
    sleep:{
        'n':function (n) {
            var start = new Date().getTime();
            while(true)  if(new Date().getTime()-start > n) break;
        }
    }
});