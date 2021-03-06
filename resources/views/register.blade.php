@extends('reg')
	@section('head')
	<script src="/js/register.js"></script>
	@endsection
@section('title')创建团队
@endsection
@section('content')
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/reg/register') }}" onsubmit="return(check())">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label">邮箱</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}" required="required" placeholder="请输入常用邮箱">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">密码</label>
							<div class="col-md-6">
								<input type="password" class="form-control pwdd" name="password" id="pwd" required="required"  placeholder="请输入6-16位数字、字母或常用符号">
								<span id="pwd_info"></span>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">密码确认</label>
							<div class="col-md-6">
								<input type="password" class="form-control pwdd" name="password_confirmation" id="pwd_c" required="required"  placeholder="请再次输入密码">
							</div>
							<span id="pwd_c_info"></span>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									注册
								</button>
							</div>
						</div>
						<div class="alert alert-info">
							<ul>
								<li>每个团队只需注册一个账号。</li>
								<li>请由队长进行团队注册操作。</li>
							</ul>
						</div>
					</form>

	@endsection
