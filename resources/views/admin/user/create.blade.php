@extends('layout.admins')

@section('title',$title)

@section('content')
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span>{{$title}}</span>
    </div>
    <div class="mws-panel-body no-padding">

		@if (count($errors) > 0)
		    <div class="mws-form-message error">
		    	错误信息是:
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li style='font-size:16px'>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif

    	<form class="mws-form" action="/admin/user" method='post' enctype='multipart/form-data'>
    		<div class="mws-form-inline">
    			<div class="mws-form-row">
    				<label class="mws-form-label">用户名</label>
    				<div class="mws-form-item">
    					<input type="text" name='name' class="small">
    				</div>
    			</div>

    			<div class="mws-form-row">
    				<label class="mws-form-label">密码</label>
    				<div class="mws-form-item">
    					<input type="password" name='password' class="small">
    				</div>
    			</div>

    			<div class="mws-form-row">
    				<label class="mws-form-label">确认密码</label>
    				<div class="mws-form-item">
    					<input type="password" name='repass' class="small">
    				</div>
    			</div>

    			<div class="mws-form-row">
    				<label class="mws-form-label">邮箱</label>
    				<div class="mws-form-item">
    					<input type="text" name='email' class="small">
    				</div>
    			</div>

    			<div class="mws-form-row">
    				<label class="mws-form-label">手机号</label>
    				<div class="mws-form-item">
    					<input type="text" name='phone' class="small">
    				</div>
    			</div>

				<div class="mws-form-row">
                	<label class="mws-form-label">头像</label>
                	<div class="mws-form-item">
                    	<div class="fileinput-holder" style="position: relative;">
	                    	<input type="file" name='profile' style="position: absolute; top: 0px; right: 0px; margin: 0px; cursor: pointer; font-size: 999px; opacity: 0; z-index: 999;"></span>
	                    </div>
                    </div>
                </div>


    			<div class="mws-form-row">
    				<label class="mws-form-label">状态</label>
    				<div class="mws-form-item clearfix">
    					<ul class="mws-form-list inline">
    						<li><label><input type="radio" name='status' value='1' checked> 开启</label></li>
    						<li><label><input type="radio" name='status' value='0' > 禁用</label></li>
    						
    					</ul>
    				</div>
    			</div>
    		</div>
    		<div class="mws-button-row">
    			{{csrf_field()}}

               
    			<input type="submit" value="添加" class="btn btn-primary">
    			
    			
    		</div>
    	</form>
    </div>    	
</div>
@stop

@section('js')
	<script>
		/*setTimeout(function(){

			$('.mws-form-message').hide();

		},3000)*/

		$('.mws-form-message').delay(3000).fadeOut(1200);
	</script>
@stop