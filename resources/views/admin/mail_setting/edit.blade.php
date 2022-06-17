@extends('layouts.admin.app')
@section('title', $page_title)
@section('content')
<section class="content-header">
	<div class="content-header-left">
		<h1>{{ $page_title }}</h1>
	</div>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
            <form action="{{ route('mail_setting.update', $mail_setting->id) }}" id="regform" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
				@csrf
				{{ method_field('PATCH') }}

				<div class="box box-info">
					<div class="box-body">
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Mailer <span style='color:red'>*</span></label>
							<div class="col-sm-9">
								<input type="text" autocomplete="off" class="form-control" name="mail_mailer" value="{{ $mail_setting->mail_mailer }}" placeholder="Enter mailer e.g smtp">
								<span style="color: red">{{ $errors->first('mail_mailer') }}</span>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Host <span style='color:red'>*</span></label>
							<div class="col-sm-9">
								<input type="text" autocomplete="off" class="form-control" name="mail_host" value="{{ $mail_setting->mail_host }}" placeholder="Enter mail_host e.g smtp.gmail.com">
								<span style="color: red">{{ $errors->first('mail_host') }}</span>
							</div>
						</div>
                        
                        <div class="form-group">
							<label for="" class="col-sm-2 control-label">Port <span style='color:red'>*</span></label>
							<div class="col-sm-9">
								<input type="text" autocomplete="off" class="form-control" name="mail_port" value="{{ $mail_setting->mail_port }}" placeholder="Enter mail_port e.g 587">
								<span style="color: red">{{ $errors->first('mail_port') }}</span>
							</div>
						</div>
                        
                        <div class="form-group">
							<label for="" class="col-sm-2 control-label">User Name <span style='color:red'>*</span></label>
							<div class="col-sm-9">
								<input type="text" autocomplete="off" class="form-control" name="mail_username" value="{{ $mail_setting->mail_username }}" placeholder="Enter mail_username e.g abc@gmail.com">
								<span style="color: red">{{ $errors->first('mail_username') }}</span>
							</div>
						</div>
                        
                        <div class="form-group">
							<label for="" class="col-sm-2 control-label">Password <span style='color:red'>*</span></label>
							<div class="col-sm-9">
								<input type="text" autocomplete="off" class="form-control" name="mail_password" value="{{ $mail_setting->mail_password }}" placeholder="Enter mail_password">
								<span style="color: red">{{ $errors->first('mail_password') }}</span>
							</div>
						</div>
                        
                        <div class="form-group">
							<label for="" class="col-sm-2 control-label">Encryption <span style='color:red'>*</span></label>
							<div class="col-sm-9">
								<input type="text" autocomplete="off" class="form-control" name="mail_encryption" value="{{ $mail_setting->mail_encryption }}" placeholder="Enter mail_encryption e.g tls">
								<span style="color: red">{{ $errors->first('mail_encryption') }}</span>
							</div>
						</div>
                        
                        <div class="form-group">
							<label for="" class="col-sm-2 control-label">From Address </label>
							<div class="col-sm-9">
								<input type="text" autocomplete="off" class="form-control" name="mail_from_address" value="{{ $mail_setting->mail_from_address }}" placeholder="Enter mail_from_address">
								<span style="color: red">{{ $errors->first('mail_from_address') }}</span>
							</div>
						</div>
                        
                        <div class="form-group">
							<label for="" class="col-sm-2 control-label">From Name </label>
							<div class="col-sm-9">
								<input type="text" autocomplete="off" class="form-control" name="mail_from_name" value="{{ $mail_setting->mail_from_name }}" placeholder="Enter mail_from_name">
								<span style="color: red">{{ $errors->first('mail_from_name') }}</span>
							</div>
						</div>
                        
						<div class="form-group">
							<label for="" class="col-sm-2 control-label"></label>
							<div class="col-sm-6">
								<button type="submit" class="btn btn-success pull-left">Save</button>
							</div>
						</div>
					</div>
				</div>  
			</form>
		</div>
	</div>
</section>
@endsection
@push('js')
<script>
</script>
@endpush