var team_name;
var team_title;
window.onload=function(){
	$("#team_name").attr("disabled","disabled");
	$("#team_title").attr("disabled","disabled");
	$("#upload").hide();
	$('#save').hide();
	$('#school-name').attr("disabled","disabled");
	$('#school-name').removeAttr("onclick");
	team_name = $("#team_name").attr('value');
	team_title = $("#team_title").attr('value');
	school_name = $("#school-name").attr('value');
}
var tag=1;

function display(){
	if(tag==1){
		$("#team_name").attr("disabled",false);
		$("#team_title").attr("disabled",false);
		$("#upload").show();
		$('#save').show();
		$("#school-name").attr("disabled",false);
		$('#school-name').attr("onclick","pop()");
		tag=0;
	}else{
		$("#team_name").attr("disabled","disabled");
		$("#team_title").attr("disabled","disabled");
		$("#team_name").val(team_name);
		$("#team_title").val(team_title);
		$("#upload").hide();
		$('#save').hide();
		$('#school-name').attr("disabled","disabled");
		$('#school-name').removeAttr("onclick");
		tag=1;
	}
	
}

function save(){
	team_name = $("#team_name").attr('value');
	team_title = $("#team_title").attr('value');
	school_name = $("#school-name").attr('value');
}