$(function () {
    $("<option value='8'>比赛承诺书</option>").appendTo($("#upload_type"));
	$("<option value='1'>商业计划书</option>").appendTo($("#upload_type"));
	$("<option value='2'>需求文档</option>").appendTo($("#upload_type"));
	$("<option value='3'>测试文档</option>").appendTo($("#upload_type"));
    $("<option value='4'>用户手册</option>").appendTo($("#upload_type"));
    $("<option value='5'>源代码</option>").appendTo($("#upload_type"));
    $("<option value='6'>项目花絮</option>").appendTo($("#upload_type"));
    $("#title").attr("disabled","disabled");
    $('#save').hide();
    $('#cancel').hide();
    $('.tips').hide();
    var bar = $('.bar');
    var percent = $('.percent');
    var progress = $(".progress");
    var files = $(".files");
    var btn = $(".btni span");
    var freq = $('#freq').val();
    var state = $('#state');
    var fileupload = $('#fileupload');
    if(freq==0){
        $('.btni').hide();
        $('#freqinfo').html("今日提交次数达到上限，请明日再试。");
    }
    if(freq==-1){
        $('#freqinfo').html("");
    }
    files.bind('DOMNodeInserted', function(e) { 
        var content = $(e.target).text();
        var len = (content.toString()).length;
        //if(len>500){
        //    files.html("请刷新页面重试");
        //}
    }); 
    fileupload.change(function(){
        $("#myupload").ajaxSubmit({
            dataType:  'json',
            beforeSend: function() {
                progress.show();
                var percentVal = '0%';
                bar.width(percentVal);
                percent.html(percentVal);
                files.html("");
                btn.html("上传中...");
                fileupload.attr("disabled","disabled");
            },
            uploadProgress: function(event, position, total, percentComplete) {
                var percentVal = percentComplete + '%';
                bar.width(percentVal);
                percent.html(percentVal);
            },
            success: function(data) {
                files.html("<b>上传成功："+data.name+"("+data.size+"KB)</b>");
                state.html("当前项目报告状态： "+data.time+" 已提交"+data.type+"类型文件");
                var freq = $('#freq').val();
                if(freq==-1){
                    $('#freqinfo').html("");
                }else{
                    freq -=1;
                    $('#freq').val(freq);
                    $('#freqinfo').html("今日剩余上传次数："+freq);
                }
                if(freq==0){
                    $('.btni').hide();
                    $('#freqinfo').html("今日提交次数达到上限，请明日再试。");
                }
                
                fileupload.removeAttr("disabled");
                btn.html("添加附件");
            },
            error:function(xhr){
                fileupload.removeAttr("disabled");
                btn.html("上传失败");
                bar.width('0');
                files.html(xhr.responseText);
            }
        });
    });
});
var tag=1;
function display(){
    if(tag==1){
        $("#title").attr("disabled",false);
        $('#save').show();
        $('#cancel').show();
        $('.tips').show();
        tag=0;
    }else{
        $("#title").attr("disabled","disabled");
        $('#save').hide();
        $('#cancel').hide();
        $('.tips').hide();
        tag=1;
    }
}
function delconfirm(){
    if(confirm( '确认删除？ ')==false){
        return false;
    }
    return true;
}
    //弹出窗口
	function pop(){
		$('#upload_modal').modal('show');

	}
	//隐藏窗口
	function hide()
	{
		window.location.reload();
		//$('#choose-box-wrapper').css("display","none");

	}
