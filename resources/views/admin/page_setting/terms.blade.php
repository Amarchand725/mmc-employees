@extends('layouts.admin.app')
@section('title', $page_title)
@section('content')
<section class="content-header">
	<div class="content-header-left">
		<h1><strong>{{ $page_title }}</strong></h1>
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
						{{-- <div class="form-group">
							<label for="" class="col-sm-2 control-label">Admin Fee (%) </label>
							<div class="col-sm-9">
								<input type="text" class="form-control numeric" id="fee-percent" min="0" max="100" name="fee_percent" value="{!! isset($page_data['fee_percent'])?$page_data['fee_percent']:'' !!}" placeholder="Enter admin fee percent">
								<span id="error-fee-percent" style="color: red"></span>
							</div>
						</div> --}}
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Terms </label>
							<div class="col-sm-9">
								<textarea class="form-control texteditor" name="interview_terms" style="height:120px;" placeholder="Enter terms here">{!! isset($page_data['terms'])?$page_data['terms']:'' !!}</textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label"></label>
							<div class="col-sm-6">
								<button type="submit" class="btn btn-success pull-left" name="form_contact">Update</button>
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
	$('#fee-percent').keyup( function(){
		var value = parseInt($(this).val());
		if(value > 100 || value == 0){
			$(this).val('');
			$('#error-fee-percent').text('Invalid max 100%');
		}else{
			$('#error-fee-percent').text('');
		}
	});
	$(document).ready(function() {
		if ($(".texteditor").length > 0) {
			tinymce.init({
				selector: "textarea.texteditor",
				theme: "modern",
				height: 250,
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