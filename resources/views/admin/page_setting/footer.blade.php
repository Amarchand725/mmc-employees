@extends('layouts.admin.app')
@section('title', $page_title)
@section('content')
<section class="content-header">
	<div class="content-header-left">
		<h1>{{ $page_title }}</strong></h1>
	</div>
	<div class="content-header-right">
		<a href="{{ route('page.index') }}" class="btn btn-primary btn-sm">View All</a>
	</div>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			@if (session('message'))
				<div class="callout callout-success">
					{{ session('message') }}
				</div>
			@endif
			<form action="{{ route('page_setting.store') }}" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
				@csrf

				<input type="hidden" name="parent_slug" id="" value="{{ $model->slug }}">
				<div class="box box-info">
					<div class="box-body">
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Email </label>
							<div class="col-sm-9">
								<input type="email" name="footer_email" class="form-control" value="{{ isset($page_data['footer_email'])?$page_data['footer_email']:'' }}" placeholder="Enter email address">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Copy Rights </label>
							<div class="col-sm-9">
								<input type="text" name="footer_copy_right" class="form-control" value="{{ isset($page_data['footer_copy_right'])?$page_data['footer_copy_right']:'' }}" placeholder="Enter copy rights">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Phone </label>
							<div class="col-sm-9">
								<input type="text" name="footer_phone" class="form-control" value="{{ isset($page_data['footer_phone'])?$page_data['footer_phone']:'' }}" placeholder="Enter phone no">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Twitter Link </label>
							<div class="col-sm-9">
								<input type="text" name="footer_twitter" class="form-control" value="{{ isset($page_data['footer_twitter'])?$page_data['footer_twitter']:'' }}" placeholder="Enter social link">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Facebook Link </label>
							<div class="col-sm-9">
								<input type="text" name="footer_facebook" class="form-control" value="{{ isset($page_data['footer_facebook'])?$page_data['footer_facebook']:'' }}" placeholder="Enter social link">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Youtube Link </label>
							<div class="col-sm-9">
								<input type="text" name="footer_youtube" class="form-control" value="{{ isset($page_data['footer_youtube'])?$page_data['footer_youtube']:'' }}" placeholder="Enter youtube link">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Instagram Link </label>
							<div class="col-sm-9">
								<input type="text" name="footer_instagram" class="form-control" value="{{ isset($page_data['footer_instagram'])?$page_data['footer_instagram']:'' }}" placeholder="Enter social link">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Skype Link </label>
							<div class="col-sm-9">
								<input type="text" name="footer_skype" class="form-control" value="{{ isset($page_data['footer_skype'])?$page_data['footer_skype']:'' }}" placeholder="Enter social link">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Linkedin Link </label>
							<div class="col-sm-9">
								<input type="text" name="footer_linkedin" class="form-control" value="{{ isset($page_data['footer_linkedin'])?$page_data['footer_linkedin']:'' }}" placeholder="Enter social link">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Address </label>
							<div class="col-sm-9">
								<textarea name="footer_address" id="" class="form-control" placeholder="Enter address">{{ isset($page_data['footer_address'])?$page_data['footer_address']:'' }}</textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Description </label>
							<div class="col-sm-9">
								<textarea name="footer_description" id="" class="form-control texteditor" placeholder="Enter description">{{ isset($page_data['footer_description'])?$page_data['footer_description']:'' }}</textarea>
							</div>
						</div>
						
						<div class="form-group">
							<label for="" class="col-sm-2 control-label"></label>
							<div class="col-sm-6">
								<button type="submit" class="btn btn-success pull-left" name="form_blog">Save</button>
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
	});
</script>
@endpush