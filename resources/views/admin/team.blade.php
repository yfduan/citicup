<p>@extends('admin.home')
	@section('rightcontent')
	<script type="text/javascript">
	function delconfirm(){
		if(confirm( '确认删除？ ')==false){
			return false;
		}
		return true;
	}
	</script>
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
		<div class="contrainer-fluid">
			<div class="row-fluid xgxdiv">
				<h4 class="xgxtitle">所有团队</h4>
			</div>
	<div class="row-fluid">
		<table class="table table-hover table-striped ">
			<thead>
			<tr class="row">
				<th class="col-xs-1">序号</th>
				<th class="col-xs-3">团队名称</th>
				<th class="col-xs-3">学校</th>
				<th class="col-xs-3">参赛题目</th>
				<th class="col-xs-2">操作</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($teams as $k=>$team)
			<tr class="row">
				<td class="col-xs-1">
					{{ $k+1 }}
				</td>
				<td class="col-xs-3">
					@if(!empty($team->name))
					{{ $team->name }}
					@else
					未填写
					@endif
				</td>
				<td class="col-xs-3">
					@if($team->univ)
					{{ $team->univ->name }}
					@else
					未填写
					@endif
				</td>
				<td class="col-xs-3">
					@if(!empty($team->title))
					{{ $team->title }}
					@else
					未填写
					@endif
				</td>
				<td class="col-xs-2">
					<a href="{{ URL('/admin/team/'.$team->id) }}" class="btn btn-success"><i class="glyphicon glyphicon-edit"></i></a>
					<form action="{{ URL('/admin/team/'.$team->id) }}" method="POST" style="display: inline;" onsubmit="return(delconfirm())">
						<input name="_method" type="hidden" value="DELETE">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<button type="submit" class="btn btn-danger del"><i class="glyphicon glyphicon-trash"></i></button>
					</form>
				</td>
		</tr>
		@endforeach
	</tbody>
	</table>
</div>
		</div>
	@endsection