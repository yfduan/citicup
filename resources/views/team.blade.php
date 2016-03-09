<p>@extends('home')
	@section('rightcontent')
	<script src="/js/s.js"></script>
	<script src="/js/jquery.form.js"></script>
	<script src="/js/team.js"></script>
	<script src="/js/jquery-ui.min.js"></script>
	<script src="/js/search.js"></script>
	<link rel="stylesheet" href="/css/team.css" type="text/css" />
	<link rel="stylesheet" href="/css/report.css" type="text/css" />
	<link href="{{ asset('/css/search.css') }}" rel="stylesheet">
	<div class="container-fluid">
		<div class="modal" id="upload_modal">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" onclick="hideupload()" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
						<h4 class="modal-title">上传Logo</h4>
					</div>
					<div class="modal-body">
						<form id='myupload' action='/team/logo' method='post' enctype='multipart/form-data' onsubmit='check()'>
							<div class="btni">
								<span>选择图片</span>
								
								<input id="fileupload" type="file" name="pic" accept=".jpg,.png">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
							</form>
						</div>
						<div class="progress">
							<span class="bar"></span><span class="percent">0%</span >
						</div>
						<div class="files">
							请选择jpg,png类型图片。
						</div>
					</div>
					<div class="modal-footer">
						
					</div>
				</div>
			</div>
		</div>
	</div>

	@if (count($errors) > 0)
	<div class="row-fluid">
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	</div>
	@endif
	<div class="row-fluid">
		团队信息 <a href="#" onclick="display()">修改</a>
	</div>
	<div class="row">

		<div class="col-xs-3">
			<div class="logo">
				<img src="" id="logo">

			<div class="logobtn">
				<button class="btn btn-success" id="btn_upload" type="button">上传Logo</button>
			</div>
		</div>
		</div>
		<form action="{{ URL('/team/1') }}" method="post" name="formchange" class="form-horizontal">
			<div class="col-md-9">
				<div class="form-group">
					<label class="col-md-3 control-label">团队名称</label>
					<div class="col-md-9">
						<input type="text" class="form-control" name="team_name" id="team_name" value="{{ $team->name }}" required="required" onblur="if(this.value.replace(/^ +| +$/g,'')=='')alert('不能为空!')" maxlength="20"/ placeholder="不超过20个字符">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label">所属高校</label>
					<div class="col-md-9">
						<input type="text" name="school" id="school-name" value="{{$univ->name}}" class="form-control school">

					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label">参赛题目</label>
					<div class="col-md-9">
						<input type="text" class="form-control" name="team_title" id="team_title" value="{{ $team->title }}" maxlength="30"/ placeholder="不超过30个字符">
					</div>
				</div>
	
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<input name="_method" type="hidden" value="PUT">
				<div class="form-group">
					<div class="col-md-9 col-md-offset-3">
						<input class="btn btn-success" type="submit" id="save" value="保存" onclick="save()">
						<input class="btn btn-danger" type="button" id="cancel" value="取消" onClick="display()">
					</div>
				</div>

			</form>
		</div>
	</div>
	<div class="row-fluid">
		成员信息 <a href="{{url('/team/add')}}">添加</a>
	</div>
	<div class="row-fluid">
		<table class="table table-striped">
			<tr class="row">
				<th class="col-xs-3">姓名</th>
				<th class="col-xs-3">学校</th>
				<th class="col-xs-2">学院</th>
				<th class="col-xs-2">类别</th>
				<th class="col-xs-2">操作</th>
			</tr>
			@foreach ($members as $member)
			<tr class="row">
				<td class="col-xs-3">
					{{ $member->name }}
				</td>
				<td class="col-xs-3">
					{{ $member->univ->name }}
				</td>
				<td class="col-xs-2">
					{{ $member->college }}
				</td>
				<td class="col-xs-2">
					@if ($member->leader)
					队长
				</td>
				<td class="col-xs-2"></td>
				@else
				队员
			</td>
			<td class="col-xs-2">
				<a href="{{ URL('member/'.$member->id.'/edit') }}" class="btn btn-success">改</a>
				<form action="{{ URL('member/'.$member->id) }}" method="POST" style="display: inline;" onsubmit="return(delconfirm())">
					<input name="_method" type="hidden" value="DELETE">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<button type="submit" class="btn btn-danger del">删</button>
				</form>
			</td>
			@endif
		</tr>
		@endforeach
		@foreach ($teachers as $teacher)
		<tr class="row">
			<td class="col-xs-1">
				{{ $teacher->name }}
			</td>
			<td class="col-xs-2">
				{{ $teacher->univ->name }}
			</td>
			<td class="col-xs-2">
				{{ $teacher->college }}
			</td>
			<td class="col-xs-1">
				指导老师
			</td>
			<td class="col-xs-1">
				<a href="{{ URL('teacher/'.$teacher->id.'/edit') }}" class="btn btn-success">改</a>
				<form action="{{ URL('teacher/'.$teacher->id) }}" method="POST" style="display: inline;" onsubmit="return(delcheck())" class="form">
					<input type="hidden" id="teacher_count" value="{{$teachers->count()}}">
					<input name="_method" type="hidden" value="DELETE">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<button class="btn btn-danger del" type="submit">删</button>
				</form>
			</td>
		</tr>
		@endforeach
	</table>
</div>
	<div class="row-fluid">
	<div class="alert alert-info">
		<ul>
			<li>每支参赛队伍要求至少3名参赛成员。为了确保竞争实力，建议跨IT和金融等相关专业组队。</li>
			<li>队长信息暂不支持修改。</li>
			<li>参赛队伍队伍可根据需要邀请1-2名指导老师，但每支队伍至多不能超过2位指导老师。</li>
			<li>参赛题目可稍后填写，但不应晚于项目报告截止日期。</li>
			<li>团队组建将于2016年6月30日0时0分截止。</li>
		</ul>
	</div>
</div>
</div>
@endsection
</p>