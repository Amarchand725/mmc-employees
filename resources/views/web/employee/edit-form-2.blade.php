@extends('layouts.website.master')
@section('title', $page_title)
@section('content')
    <!-- form section -->
    <section class="mad-mind-form">
        <div class="container">
            <div class="row back-image"></div>
            @if (session('success'))
            <div class="callout callout-success"  style="background-color: #e165aa;height: AUTO;text-align: center;font-size: 20px;MARGIN: 0 auto;width: 100%;color: #e8e8e8;" >                    {{ session('success') }}
                </div>
            @endif
            <form action="{{ route('employee.update', $model->id) }}" id="regform"  class="my-repeater" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                @csrf

                {{ method_field('PATCH') }}

                <input type="hidden" name="employee_id" value="{{ $employee_id }}">
                <input type="hidden" name="form_name" value="form-2">
                <div class="list-wrapper">
                    <div class="list-item">
                        <h1>Emergency Contact Details</h1>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="">Name of Contact Person <span style="color: red">*</span></label>
                                <input type="text" name="name_of_contact_person" value="{{ isset($model->hasEmergencyContact)?$model->hasEmergencyContact->name_of_contact_person:'' }}" class="form-control" placeholder="Name of Contact Person">
                                <span style="color: red">{{ $errors->first('name_of_contact_person') }}</span>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Relationship <span style="color: red">*</span></label>
                                <select name="relationship" id="" class="form-control">
                                    <option value="" selected>Select relationship</option>
                                    <option value="father" {{ isset($model->hasEmergencyContact)?($model->hasEmergencyContact->relationship=='father'?'selected':''):'' }}>Father</option>
                                    <option value="brother" {{ isset($model->hasEmergencyContact)?($model->hasEmergencyContact->relationship=='brother'?'selected':''):'' }}>Brother</option>
                                    <option value="other" {{ isset($model->hasEmergencyContact)?($model->hasEmergencyContact->relationship=='other'?'selected':''):'' }}>Other</option>
                                </select>
                                <span style="color: red">{{ $errors->first('relationship') }}</span>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Residential Contact</label>
                                <input type="tel" name="residential_contact" value="{{ isset($model->hasEmergencyContact)?$model->hasEmergencyContact->residential_contact :'' }}" class="form-control" placeholder="Residential Contact">
                                <span style="color: red">{{ $errors->first('residential_contact') }}</span>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Mobile <span style="color: red">*</span></label>
                                <input type="tel" name="mobile" value="{{ isset($model->hasEmergencyContact)?$model->hasEmergencyContact->mobile :'' }}" class="form-control" placeholder="Mobile">
                                <span style="color: red">{{ $errors->first('mobile') }}</span>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="">Health Condition</label>
                                <textarea class="form-control" name="health_condition" id="exampleFormControlTextarea1" rows="3" placeholder="YOUR HEALTH CONDITION:(Please give brief details, if you are on a regular medicine or suffering from any health condition)?">{{ isset($model->hasEmergencyContact)?$model->hasEmergencyContact->health_condition :'' }}</textarea>
                                <span style="color: red">{{ $errors->first('health_condition') }}</span>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="">Health Condition</label>
                                <textarea class="form-control" name="hobbies" id="" rows="3" placeholder="Enter your hobbies">{{ isset($model->hasEmergencyContact)?$model->hasEmergencyContact->hobbies :'' }}</textarea>
                                <span style="color: red">{{ $errors->first('hobbies') }}</span>
                            </div>
                        </div>
                        <h1>Education</h1>
                        <div class="dynamic-repeater-two">
                            <div class="row children-detail1">
                                <div class="form-group col-md-3">
                                    <label for="">Education</label>
                                    <input type="text" name="education_names[]" class="form-control" placeholder="Particulars">
                                    <span style="color: red">{{ $errors->first('education_names') }}</span>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="">Passing Year</label>
                                    <input type="tel" name="education_years[]" class="form-control" placeholder="Year"> </div>
                                <div class="form-group col-md-2">
                                    <label for="">Institute</label>
                                    <input type="text" name="education_institutes[]" class="form-control" placeholder="Name of Institutions"> </div>
                                <div class="form-group col-md-3">
                                    <label for="">Division / Grade</label>
                                    <input type="text" name="education_grades[]" class="form-control" placeholder="Division / Grade">
                                </div>
                                <div class="form-group col-md-2">
                                    <button type="button" style="margin-top: 30px" class="btn btn-success custom-fields-two button_save"><i class="fa fa-plus"></i></button>
                                </div>
                            </div>
                        </div>

                        @if(!empty($model->haveEducations))
                            @foreach ($model->haveEducations as $education)
                                <div class="dynamic-repeater-two">
                                    <div class="row children-detail1">
                                        <div class="form-group col-md-3">
                                            <input type="text" name="education_names[]" class="form-control" value="{{ $education->particular }}" placeholder="Particulars">
                                            <span style="color: red">{{ $errors->first('education_names') }}</span>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <input type="tel" value="{{ $education->year }}" name="education_years[]" class="form-control" placeholder="Year"> </div>
                                        <div class="form-group col-md-2">
                                            <input type="text" value="{{ $education->name_of_institute }}" name="education_institutes[]" class="form-control" placeholder="Name of Institutions"> </div>
                                        <div class="form-group col-md-3">
                                            <input type="text" value="{{ $education->devision_or_grade }}" name="education_grades[]" class="form-control" placeholder="Division / Grade">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <button type="button" class="btn btn-danger remove-btn-two"><i class="fa fa-times"></i></button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                        <!-- Repeated row -->
                        <span id="dynamic-repeater-two"></span>
                        <!-- Repeated row -->
                        <h1>Other Qualification(if any)</h1>
                        <div class="dynamic-repeater">
                            <div class="row children-detail2">
                                <div class="form-group col-md-2">
                                    <label for="">Course Title</label>
                                    <input type="text" name="course_titles[]" class="form-control" placeholder="Course/Training Title"> </div>
                                <div class="form-group col-md-2">
                                    <label for="">Year</label>
                                    <input type="tel" name="course_years[]" class="form-control" placeholder="Year"> </div>
                                <div class="form-group col-md-2">
                                    <label for="">Institute Name</label>
                                    <input type="text" name="institute_names[]" class="form-control" placeholder="Name of Institutions"> </div>
                                <div class="form-group col-md-2">
                                    <label for="">Course Period</label>
                                    <input type="text" name="course_periods[]" class="form-control" placeholder="Course Period?">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="">Division / Grade</label>
                                    <input type="text" name="course_grades[]" class="form-control" placeholder="Division / Grade">
                                </div>
                                <div class="form-group col-md-2">
                                    <button type="button" style="margin-top:30px" class="btn btn-success custom-fields button_save"><i class="fa fa-plus"></i></button>
                                </div>
                            </div>
                        </div>

                        @if(!empty($model->haveOtherQualifications))
                            @foreach ($model->haveOtherQualifications as $qualification)
                                <div class="dynamic-repeater">
                                    <div class="row children-detail">
                                        <div class="form-group col-md-2">
                                            <input type="text" name="course_titles[]" value="{{ $qualification->course }}" class="form-control" placeholder="Course/Training Title">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <input type="tel" value="{{ $qualification->year }}" name="course_years[]" class="form-control" placeholder="Year">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <input type="text" value="{{ $qualification->name_of_institute }}"  name="institute_names[]" class="form-control" placeholder="Name of Institutions">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <input type="text" value="{{ $qualification->course_period }}" name="course_periods[]" class="form-control" placeholder="Course Period?">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <input type="text" value="{{ $qualification->grade_or_percentage }}" name="course_grades[]" class="form-control" placeholder="Division / Grade">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <button type="button" class="btn btn-danger remove-btn"><i class="fa fa-times"></i></button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif

                        <!-- Repeated row -->
                        <span id="dynamic-repeater"></span>
                        <!-- Repeated row -->

                        <h1>EMPLOYMENT HISTORY (Last 2-Employers)</h1>
                        <div class="row">
                            <div class="col-md-4 form-group">
                                <label for="">Company Name</label>
                                <input type="tel" value="{{ isset($model->haveEmployements[0])?$model->haveEmployements[0]->name_of_employer:'' }}" name="history_company_names[]" id="" class="form-control" placeholder="Name">
                            </div>
                            <div class="col-md-4 form-group">
                                <label for="">Company Address</label>
                                <input type="tel" value="{{ isset($model->haveEmployements[0])?$model->haveEmployements[0]->address:'' }}" name="history_company_addresses[]" id="" class="form-control" placeholder="Address">
                            </div>
                            <div class="col-md-4 form-group">
                                <label for="">Company Contact No</label>
                                <input type="text" value="{{ isset($model->haveEmployements[0])?$model->haveEmployements[0]->contact_person:'' }}" name="history_company_contacts[]" id="" class="form-control" placeholder="Contact No">
                            </div>
                            <div class="col-md-3" style="margin-top: 30px">
                                <label for="">Employment Period</label>
                            </div>
                            <div class="col-md-3 form-group">
                                <label for="">Employed From </label>
                                <input type="date" value="{{ isset($model->haveEmployements[0])?$model->haveEmployements[0]->employee_from:'' }}" name="history_company_employed_from[]" id="" class="form-control" placeholder="From">
                            </div>
                            <div class="col-md-3 form-group">
                                <label for="">Employed To </label>
                                <input type="date" value="{{ isset($model->haveEmployements[0])?$model->haveEmployements[0]->employee_to:'' }}" name="history_company_employed_to[]" id="" class="form-control" placeholder="To">
                            </div>
                            <div class="col-md-3 form-group">
                                <label for="">Designation </label>
                                <input type="text" value="{{ isset($model->haveEmployements[0])?$model->haveEmployements[0]->last_designation:'' }}" name="history_company_designations[]" id="" class="form-control" placeholder="Last Designation">
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="">Leaving Reason </label>
                                <textarea class="form-control" name="history_company_leaving_reasons[]" id="" rows="3" placeholder="Reason for leaving">{{ isset($model->haveEmployements[0])?$model->haveEmployements[0]->reason_for_leaving:'' }}</textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 form-group">
                                <label for="">Company Name</label>
                                <input type="tel" value="{{ isset($model->haveEmployements[1])?$model->haveEmployements[1]->name_of_employer:'' }}" name="history_company_names[]" id="" class="form-control" placeholder="Name">
                            </div>
                            <div class="col-md-4 form-group">
                                <label for="">Company Address</label>
                                <input type="tel" value="{{ isset($model->haveEmployements[1])?$model->haveEmployements[1]->address:'' }}" name="history_company_addresses[]" id="" class="form-control" placeholder="Address">
                            </div>
                            <div class="col-md-4 form-group">
                                <label for="">Company Contact No</label>
                                <input type="text" value="{{ isset($model->haveEmployements[1])?$model->haveEmployements[1]->contact_person:'' }}" name="history_company_contacts[]" id="" class="form-control" placeholder="Contact No">
                            </div>
                            <div class="col-md-3" style="margin-top: 30px">
                                <label for="">Employment Period</label>
                            </div>
                            <div class="col-md-3 form-group">
                                <label for="">Employed From </label>
                                <input type="date" value="{{ isset($model->haveEmployements[1])?$model->haveEmployements[1]->employee_from:'' }}" name="history_company_employed_from[]" id="" class="form-control" placeholder="From">
                            </div>
                            <div class="col-md-3 form-group">
                                <label for="">Employed To </label>
                                <input type="date" value="{{ isset($model->haveEmployements[1])?$model->haveEmployements[1]->employee_to:'' }}" name="history_company_employed_to[]" id="" class="form-control" placeholder="To">
                            </div>
                            <div class="col-md-3 form-group">
                                <label for="">Designation </label>
                                <input type="text" value="{{ isset($model->haveEmployements[1])?$model->haveEmployements[1]->last_designation:'' }}" name="history_company_designations[]" id="" class="form-control" placeholder="Last Designation">
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="">Leaving Reason </label>
                                <textarea class="form-control" name="history_company_leaving_reasons[]" id="" rows="3" placeholder="Reason for leaving">{{ isset($model->haveEmployements[1])?$model->haveEmployements[1]->reason_for_leaving:'' }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-12 submit-btn">
                            <button class="btn btn-success button_save" type="submit" style="cursor: pointer;" id="submit">Save & Next</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- form section -->
@endsection
@push('js')
    <script>
        $(document).on('click', ".custom-fields-two", function() {
        var html = '<div class="dynamic-repeater-two">'+
                    '<div class="row children-detail">'+
                        '<div class="form-group col-md-3">'+
                            '<input type="text" name="education_names[]" class="form-control" placeholder="Particulars"> '+
                        '</div>'+
                        '<div class="form-group col-md-2">'+
                            '<input type="tel" name="education_years[]" class="form-control" placeholder="Year"> '+
                        '</div>'+
                        '<div class="form-group col-md-2">'+
                            '<input type="text" name="education_institutes[]" class="form-control" placeholder="Name of Institutions"> '+
                        '</div>'+
                        '<div class="form-group col-md-3">'+
                            '<input type="text" name="education_grades[]" class="form-control" placeholder="Division / Grade"> '+
                        '</div>'+
                       '<div class="form-group col-md-2">'+
                            '<button type="button" class="btn btn-danger remove-btn-two"><i class="fa fa-times"></i></button>'+
                        '</div>'+
                    '</div>'+
                '</div>';
            $('#dynamic-repeater-two').append(html);
        });

        $(document).on('click', '.remove-btn-two',function(){
            $(this).parents('.dynamic-repeater-two').remove();
        });

        $(document).on('click', ".custom-fields", function() {
            var html = '<div class="dynamic-repeater">'+
                        '<div class="row children-detail">'+
                            '<div class="form-group col-md-2">'+
                                '<input type="text" name="course_titles[]" class="form-control" placeholder="Course/Training Title">'+
                            '</div>'+
                            '<div class="form-group col-md-2">'+
                                '<input type="tel" name="course_years[]" class="form-control" placeholder="Year">'+
                            '</div>'+
                            '<div class="form-group col-md-2">'+
                                '<input type="text" name="institute_names[]" class="form-control" placeholder="Name of Institutions">'+
                            '</div>'+
                            '<div class="form-group col-md-2">'+
                                '<input type="text" name="course_periods[]" class="form-control" placeholder="Course Period?">'+
                            '</div>'+
                            '<div class="form-group col-md-2">'+
                                '<input type="text" name="course_grades[]" class="form-control" placeholder="Division / Grade">'+
                            '</div>'+
                            '<div class="form-group col-md-2">'+
                                '<button type="button" class="btn btn-danger remove-btn"><i class="fa fa-times"></i></button>'+
                            '</div>'+
                        '</div>'+
                    '</div>';
            $('#dynamic-repeater').append(html);
        });

        $(document).on('click', '.remove-btn',function(){
            $(this).parents('.dynamic-repeater').remove();
        });
    </script>
@endpush
