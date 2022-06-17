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
			
			<div class="box box-info">
				<div class="box-body">
					<h3 class="sec_title">Home Section</h3>
					<form action="{{ route('page_setting.store') }}" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
						@csrf
						<input type="hidden" name="parent_slug" id="" value="{{ $model->slug }}">
						
						@if(isset($page_data['home_background_image']))
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Existing Image</label>
								<div class="col-sm-6" style="padding-top:6px;">
									<img src="{{ asset('/public/admin/assets/images/page/'.$page_data['home_background_image']) }}" class="existing-photo" style="height:180px;">
								</div>
							</div>
						@endif
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Background Image </label>
							<div class="col-sm-6">
								<input type="file" name="home_background_image" class="form-control">
							</div>
						</div>
						
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Show on Home? </label>
							<div class="col-sm-2">
								<select name="home_section" class="form-control select2 select2-accessible" style="width:auto;" tabindex="-1" aria-hidden="true">
									<option value="1" {{ (isset($page_data['home_section'])?($page_data['home_section']==1?'selected':''):'') }}>Show</option>
									<option value="0" {{ (isset($page_data['home_section'])?($page_data['home_section']==0?'selected':''):'') }}>Hide</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label"></label>
							<div class="col-sm-6">
								<button type="submit" class="btn btn-success pull-left" name="form_home_blog">Submit</button>
							</div>
						</div>
					</form>

					<h3 class="sec_title">Testimonial Section</h3>
					<form action="{{ route('page_setting.store') }}" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
						@csrf
						<input type="hidden" name="parent_slug" id="" value="{{ $model->slug }}">
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Title </label>
							<div class="col-sm-6">
								<input type="text" name="home_testimonial_title" class="form-control" value="{{ isset($page_data['home_testimonial_title'])?$page_data['home_testimonial_title']:'' }}" placeholder="Enter title">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">SubTitle </label>
							<div class="col-sm-6">
								<input type="text" name="home_testimonial_subtitle" class="form-control" value="{{ isset($page_data['home_testimonial_subtitle'])?$page_data['home_testimonial_subtitle']:'' }}" placeholder="Enter sub title">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Show on Home? </label>
							<div class="col-sm-2">
								<select name="home_testimonial_status" class="form-control select2 select2-accessible" style="width:auto;" tabindex="-1" aria-hidden="true">
									<option value="1" {{ (isset($page_data['home_testimonial_status'])?($page_data['home_testimonial_status']==1?'selected':''):'') }}>Show</option>
									<option value="0" {{ (isset($page_data['home_testimonial_status'])?($page_data['home_testimonial_status']==0?'selected':''):'') }}>Hide</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label"></label>
							<div class="col-sm-6">
								<button type="submit" class="btn btn-success pull-left" name="form_home_blog">Submit</button>
							</div>
						</div>
					</form>

					<h3 class="sec_title">Contact Section</h3>
					<form action="{{ route('page_setting.store') }}" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
						@csrf
						<input type="hidden" name="parent_slug" id="" value="{{ $model->slug }}">
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Title </label>
							<div class="col-sm-6">
								<input type="text" name="home_contact_title" class="form-control" value="{{ isset($page_data['home_contact_title'])?$page_data['home_contact_title']:'' }}" placeholder="Enter title">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Description </label>
							<div class="col-sm-6">
								<textarea type="text" name="home_contact_description" class="form-control editor_short" placeholder="Enter description">{{ isset($page_data['home_contact_description'])?$page_data['home_contact_description']:'' }}</textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Show on Home? </label>
							<div class="col-sm-2">
								<select name="home_contact_status" class="form-control select2 select2-accessible" style="width:auto;" tabindex="-1" aria-hidden="true">
									<option value="1" {{ (isset($page_data['home_contact_status'])?($page_data['home_contact_status']==1?'selected':''):'') }}>Show</option>
									<option value="0" {{ (isset($page_data['home_contact_status'])?($page_data['home_contact_status']==0?'selected':''):'') }}>Hide</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label"></label>
							<div class="col-sm-6">
								<button type="submit" class="btn btn-success pull-left" name="form_home_blog">Submit</button>
							</div>
						</div>
					</form>

					<h3 class="sec_title">Sign Up Section</h3>
					<form action="{{ route('page_setting.store') }}" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
						@csrf
						<input type="hidden" name="parent_slug" id="" value="{{ $model->slug }}">
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Title </label>
							<div class="col-sm-6">
								<input type="text" name="home_signup_title" class="form-control" value="{{ isset($page_data['home_signup_title'])?$page_data['home_signup_title']:'' }}" placeholder="Enter sign up title">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Description </label>
							<div class="col-sm-6">
								<textarea name="home_signup_description" id="" class="form-control" placeholder="Enter sign up description">{{ isset($page_data['home_signup_description'])?$page_data['home_signup_description']:'' }}</textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Show on Home? </label>
							<div class="col-sm-2">
								<select name="home_signup_status" class="form-control select2 select2-accessible" style="width:auto;" tabindex="-1" aria-hidden="true">
									<option value="1" {{ (isset($page_data['home_signup_status'])?($page_data['home_signup_status']==1?'selected':''):'') }}>Show</option>
									<option value="0" {{ (isset($page_data['home_signup_status'])?($page_data['home_signup_status']==0?'selected':''):'') }}>Hide</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label"></label>
							<div class="col-sm-6">
								<button type="submit" class="btn btn-success pull-left" name="form_home_blog">Submit</button>
							</div>
						</div>
					</form>

					<h3 class="sec_title">Pricing Section</h3>
					<form action="{{ route('page_setting.store') }}" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
						@csrf
						<input type="hidden" name="parent_slug" id="" value="{{ $model->slug }}">
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Title </label>
							<div class="col-sm-6">
								<input type="text" name="home_pricing_title" class="form-control" value="{{ isset($page_data['home_pricing_title'])?$page_data['home_pricing_title']:'' }}" placeholder="Enter title">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Description </label>
							<div class="col-sm-6">
								<textarea name="home_pricing_description" id="" class="form-control" placeholder="Enter description">{{ isset($page_data['home_pricing_description'])?$page_data['home_pricing_description']:'' }}</textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Show on Home? </label>
							<div class="col-sm-2">
								<select name="home_pricing_status" class="form-control select2 select2-accessible" style="width:auto;" tabindex="-1" aria-hidden="true">
									<option value="1" {{ (isset($page_data['home_pricing_status'])?($page_data['home_pricing_status']==1?'selected':''):'') }}>Show</option>
									<option value="0" {{ (isset($page_data['home_pricing_status'])?($page_data['home_pricing_status']==0?'selected':''):'') }}>Hide</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label"></label>
							<div class="col-sm-6">
								<button type="submit" class="btn btn-success pull-left" name="form_home_blog">Submit</button>
							</div>
						</div>
					</form>
					
					<h3 class="sec_title">Team Section</h3>
					<form action="{{ route('page_setting.store') }}" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
						@csrf
						<input type="hidden" name="parent_slug" id="" value="{{ $model->slug }}">
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Title </label>
							<div class="col-sm-6">
								<input type="text" name="home_team_title" class="form-control" value="{{ isset($page_data['home_team_title'])?$page_data['home_team_title']:'' }}" placeholder="Enter title">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Description </label>
							<div class="col-sm-6">
								<textarea name="home_team_description" id="" class="form-control" placeholder="Enter description">{{ isset($page_data['home_team_description'])?$page_data['home_team_description']:'' }}</textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Show on Home? </label>
							<div class="col-sm-2">
								<select name="home_team_status" class="form-control select2 select2-accessible" style="width:auto;" tabindex="-1" aria-hidden="true">
									<option value="1" {{ (isset($page_data['home_team_status'])?($page_data['home_team_status']==1?'selected':''):'') }}>Show</option>
									<option value="0" {{ (isset($page_data['home_team_status'])?($page_data['home_team_status']==0?'selected':''):'') }}>Hide</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label"></label>
							<div class="col-sm-6">
								<button type="submit" class="btn btn-success pull-left" name="form_home_blog">Submit</button>
							</div>
						</div>
					</form>

					<h3 class="sec_title">Counter Section</h3>
					<form action="{{ route('page_setting.store') }}" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
						@csrf
						<input type="hidden" name="parent_slug" id="" value="{{ $model->slug }}">
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Points </label>
							<div class="col-sm-6">
								<input type="text" name="home_counter_points_label" class="form-control" value="{{ isset($page_data['home_counter_points_label'])?$page_data['home_counter_points_label']:'' }}" placeholder="Enter points label">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Points Counter </label>
							<div class="col-sm-6">
								<input type="number" name="home_counter_points_counter" class="form-control" value="{{ isset($page_data['home_counter_points_counter'])?$page_data['home_counter_points_counter']:'' }}" placeholder="Enter points counter">
							</div>
						</div>

						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Members </label>
							<div class="col-sm-6">
								<input type="text" name="home_counter_members_label" class="form-control" value="{{ isset($page_data['home_counter_members_label'])?$page_data['home_counter_members_label']:'' }}" placeholder="Enter members label">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Members Counter </label>
							<div class="col-sm-6">
								<input type="number" name="home_counter_members_counter" class="form-control" value="{{ isset($page_data['home_counter_members_counter'])?$page_data['home_counter_members_counter']:'' }}" placeholder="Enter points counter">
							</div>
						</div>

						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Clients </label>
							<div class="col-sm-6">
								<input type="text" name="home_counter_clients_label" class="form-control" value="{{ isset($page_data['home_counter_clients_label'])?$page_data['home_counter_clients_label']:'' }}" placeholder="Enter clients label">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Clients Counter </label>
							<div class="col-sm-6">
								<input type="number" name="home_counter_clients_counter" class="form-control" value="{{ isset($page_data['home_counter_clients_counter'])?$page_data['home_counter_clients_counter']:'' }}" placeholder="Enter happy clients counter">
							</div>
						</div>

						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Projects </label>
							<div class="col-sm-6">
								<input type="text" name="home_counter_projects_label" class="form-control" value="{{ isset($page_data['home_counter_projects_label'])?$page_data['home_counter_projects_label']:'' }}" placeholder="Enter complete projects label">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Completed Projects Counter </label>
							<div class="col-sm-6">
								<input type="number" name="home_counter_projects_counter" class="form-control" value="{{ isset($page_data['home_counter_projects_counter'])?$page_data['home_counter_projects_counter']:'' }}" placeholder="Enter complete projects counter">
							</div>
						</div>

						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Show on Home? </label>
							<div class="col-sm-2">
								<select name="home_team_status" class="form-control select2 select2-accessible" style="width:auto;" tabindex="-1" aria-hidden="true">
									<option value="1" {{ (isset($page_data['home_team_status'])?($page_data['home_team_status']==1?'selected':''):'') }}>Show</option>
									<option value="0" {{ (isset($page_data['home_team_status'])?($page_data['home_team_status']==0?'selected':''):'') }}>Hide</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label"></label>
							<div class="col-sm-6">
								<button type="submit" class="btn btn-success pull-left" name="form_home_blog">Submit</button>
							</div>
						</div>
					</form>
				</div>
			</div>
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
				title: "required"
			}
		});
	});
</script>
@endpush