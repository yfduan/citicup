$(function () {
    //$('#mail').modal('hide');
    $("#checkAll").change(function() {
        if ($("#checkAll").is(":checked")) {
            $("[name = chkItem]:checkbox").prop("checked", true);
        }else{
            $("[name = chkItem]:checkbox").prop("checked", false);
        }
    });

    $(".ctb").bind("click",function(){
        var tag = $(this).parent(".row").find("input").val();
        //alert(tag);
        $("#tag").val(tag);
        $("#show").submit();
    });
});

function checkchange(){
    var checked=true;
    $("[name = chkItem]:checkbox").each(function () {
        if (!$(this).is(":checked")) {
            checked=false;
        }
    });
    if(checked){
        $("#checkAll").prop("checked", true);
    }else{
        $("#checkAll").prop("checked", false);
    }
}



function getChecked(){
    var result = new Array();
        $("[name = chkItem]:checkbox").each(function () {
            if ($(this).is(":checked")) {
                result.push($(this).attr("value"));
            }
        });

    return result.join(",");
}

function empcheck(){
    if(getChecked()==""){
        alert("未选择任何邮件。");
        return false;
    }
    if($("#method").val()=="DELETE"){
        if(confirm( '确认删除？ ')==false){
            return false;
        }
        return true;
    }
    return true;
}

function delmail(){
    
    $("#op").attr("action", "/mail/del");
    $("#method").val("DELETE");
    $("#op_tag").val(getChecked());
    $("#op").submit();
    
}

function setread(){
    $("#op").attr("action", "/mail/upd");
    $("#method").val("PUT");
    $("#op_tag").val(getChecked());
    $("#op").submit();
}

//发送方删除
function dels(){
    $("#op_tag").val(getChecked());
}