@extends('layouts.admin.app')
@section('title', $page_title)
@section('content')
<section class="content-header">
	<div class="content-header-left">
		<h1>Add Mail Setting</h1>
	</div>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
            <form action="{{ route('mail_setting.store') }}" id="regform" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
				@csrf
				<div class="box box-info">
					<div class="box-body">
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Mailer <span style='color:red'>*</span></label>
							<div class="col-sm-9">
								<input type="text" autocomplete="off" class="form-control" name="mail_mailer" value="{{ old('mail_mailer') }}" placeholder="Enter mailer e.g smtp">
								<span style="color: red">{{ $errors->first('mail_mailer') }}</span>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Host <span style='color:red'>*</span></label>
							<div class="col-sm-9">
								<input type="text" autocomplete="off" class="form-control" name="mail_host" value="{{ old('mail_host') }}" placeholder="Enter mail_host e.g smtp.gmail.com">
								<span style="color: red">{{ $errors->first('mail_host') }}</span>
							</div>
						</div>
                        
                        <div class="form-group">
							<label for="" class="col-sm-2 control-label">Port <span style='color:red'>*</span></label>
							<div class="col-sm-9">
								<input type="text" autocomplete="off" class="form-control" name="mail_port" value="{{ old('mail_port') }}" placeholder="Enter mail_port e.g 587">
								<span style="color: red">{{ $errors->first('mail_port') }}</span>
							</div>
						</div>
                        
                        <div class="form-group">
							<label for="" class="col-sm-2 control-label">User Name <span style='color:red'>*</span></label>
							<div class="col-sm-9">
								<input type="text" autocomplete="off" class="form-control" name="mail_username" value="{{ old('mail_username') }}" placeholder="Enter mail_username abc@gmail.com">
								<span style="color: red">{{ $errors->first('mail_username') }}</span>
							</div>
						</div>
                        
                        <div class="form-group">
							<label for="" class="col-sm-2 control-label">Password <span style='color:red'>*</span></label>
							<div class="col-sm-9">
								<input type="text" autocomplete="off" class="form-control" name="mail_password" value="{{ old('mail_password') }}" placeholder="Enter mail_password">
								<span style="color: red">{{ $errors->first('mail_password') }}</span>
							</div>
						</div>
                        
                        <div class="form-group">
							<label for="" class="col-sm-2 control-label">Encryption <span style='color:red'>*</span></label>
							<div class="col-sm-9">
								<input type="text" autocomplete="off" class="form-control" name="mail_encryption" value="{{ old('mail_encryption') }}" placeholder="Enter mail_encryption e.g tls">
								<span style="color: red">{{ $errors->first('mail_encryption') }}</span>
							</div>
						</div>
                        
                        <div class="form-group">
							<label for="" class="col-sm-2 control-label">From Address </label>
							<div class="col-sm-9">
								<input type="text" autocomplete="off" class="form-control" name="mail_from_address" value="{{ old('mail_from_address') }}" placeholder="Enter mail_from_address">
								<span style="color: red">{{ $errors->first('mail_from_address') }}</span>
							</div>
						</div>
                        
                        <div class="form-group">
							<label for="" class="col-sm-2 control-label">From Name </label>
							<div class="col-sm-9">
								<input type="text" autocomplete="off" class="form-control" name="mail_from_name" value="{{ old('mail_from_name') }}" placeholder="Enter mail_from_name">
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
	$(document).ready(function() {
		if ($(".texteditor").length > 0) {
			tinymce.init({
				selector: "textarea.texteditor",
				theme: "modern",
				height: 150,
				plugins: [
					"advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
					"searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
					"save table contextmenu directionality emoticons template paste textcolor"
				],
				toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",

			});
		}

		$("#regform").validate({
			rules: {
				image: "required",
				name: "required"
			}
		});
	});
</script>
@endpush
