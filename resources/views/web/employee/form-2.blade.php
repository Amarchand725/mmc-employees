@extends('layouts.website.master')
@section('content')
    <!-- form section -->
    <section class="mad-mind-form">
        <div class="container">
            <div class="row back-image"></div>
            @if (session('success'))
            <div class="callout callout-success"  style="background-color:#df69a2;height: 50px;text-align: center;font-size:30px;" >
                    {{ session('success') }}
                </div>
            @endif
            <form action="{{ route('employee.store') }}" id="regform"  class="my-repeater" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                @csrf

                <input type="hidden" name="employee_id" value="{{ $employee_id }}">
                <input type="hidden" name="form_name" value="form-2">
                <div class="list-wrapper">
                    <div class="list-item">
                        <h1>Emergency Contact Details</h1>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="">Name of Contact Person <span style="color: red">*</span></label>
                                <input type="text" name="name_of_contact_person" value="{{ old('name_of_contact_person') }}" class="form-control" placeholder="Name of Contact Person">
                                <span style="color: red">{{ $errors->first('name_of_contact_person') }}</span>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Relationship <span style="color: red">*</span></label>
                                <select name="relationship" id="" class="form-control">
                                    <option value="" selected>Select relationship</option>
                                    <option value="father" {{ old('relationship')=='father'?'selected':'' }}>Father</option>
                                    <option value="brother" {{ old('relationship')=='brother'?'selected':'' }}>Brother</option>
                                    <option value="other" {{ old('relationship')=='other'?'selected':'' }}>Other</option>
                                </select>
                                <span style="color: red">{{ $errors->first('relationship') }}</span>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Residential Contact</label>
                                <input type="tel" name="residential_contact" value="{{ old('residential_contact') }}" class="form-control" placeholder="Residential Contact">
                                <span style="color: red">{{ $errors->first('residential_contact') }}</span>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Mobile <span style="color: red">*</span></label>
                                <input type="tel" name="mobile" value="{{ old('mobile') }}" class="form-control" placeholder="Mobile">
                                <span style="color: red">{{ $errors->first('mobile') }}</span>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="">Health Condition</label>
                                <textarea class="form-control" name="health_condition" id="exampleFormControlTextarea1" rows="3" placeholder="YOUR HEALTH CONDITION:(Please give brief details, if you are on a regular medicine or suffering from any health condition)?">{{ old('health_condition') }}</textarea>
                                <span style="color: red">{{ $errors->first('health_condition') }}</span>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="">Health Condition</label>
                                <textarea class="form-control" name="hobbies" id="" rows="3" placeholder="Enter your hobbies">{{ old('hobbies') }}</textarea>
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
                                    <button type="button" style="margin-top: 30px" class="btn btn-success custom-fields-two"><i class="fa fa-plus"></i></button>
                                </div>
                            </div>
                        </div>
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
                                    <button type="button" style="margin-top:30px" class="btn btn-success custom-fields"><i class="fa fa-plus"></i></button>
                                </div>
                            </div>
                        </div>
                        <!-- Repeated row -->
                        <span id="dynamic-repeater"></span>
                        <!-- Repeated row -->

                        <h1>EMPLOYMENT HISTORY (Last 2-Employers)</h1>
                        <div class="row">
                            <div class="col-md-4 form-group">
                                <label for="">Company Name</label>
                                <input type="tel" name="history_company_names[]" id="" class="form-control" placeholder="Name">
                            </div>
                            <div class="col-md-4 form-group">
                                <label for="">Company Address</label>
                                <input type="tel" name="history_company_addresses[]" id="" class="form-control" placeholder="Address">
                            </div>
                            <div class="col-md-4 form-group">
                                <label for="">Company Contact No</label>
                                <input type="email" name="history_company_contacts[]" id="" class="form-control" placeholder="Contact No">
                            </div>
                            <div class="col-md-3" style="margin-top: 30px">
                                <label for="">Employment Period</label>
                            </div>
                            <div class="col-md-3 form-group">
                                <label for="">Employed From </label>
                                <input type="date" name="history_company_employed_from[]" id="" class="form-control" placeholder="From">
                            </div>
                            <div class="col-md-3 form-group">
                                <label for="">Employed To </label>
                                <input type="date" name="history_company_employed_to[]" id="" class="form-control" placeholder="To">
                            </div>
                            <div class="col-md-3 form-group">
                                <label for="">Designation </label>
                                <input type="text" name="history_company_designations[]" id="" class="form-control" placeholder="Last Designation">
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="">Leaving Reason </label>
                                <textarea class="form-control" name="history_company_leaving_reasons[]" id="" rows="3" placeholder="Reason for leaving"></textarea>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-md-4 form-group">
                                <label for="">Company Name</label>
                                <input type="tel" name="history_company_names[]" id="" class="form-control" placeholder="Name">
                            </div>
                            <div class="col-md-4 form-group">
                                <label for="">Company Address</label>
                                <input type="tel" name="history_company_addresses[]" id="" class="form-control" placeholder="Address">
                            </div>
                            <div class="col-md-4 form-group">
                                <label for="">Company Contact No</label>
                                <input type="email" name="history_company_contacts[]" id="" class="form-control" placeholder="Contact No">
                            </div>
                            <div class="col-md-3" style="margin-top: 30px">
                                <label for="">Employment Period</label>
                            </div>
                            <div class="col-md-3 form-group">
                                <label for="">Employed From </label>
                                <input type="date" name="history_company_employed_from[]" id="" class="form-control" placeholder="From">
                            </div>
                            <div class="col-md-3 form-group">
                                <label for="">Employed To </label>
                                <input type="date" name="history_company_employed_to[]" id="" class="form-control" placeholder="To">
                            </div>
                            <div class="col-md-3 form-group">
                                <label for="">Designation </label>
                                <input type="text" name="history_company_designations[]" id="" class="form-control" placeholder="Last Designation">
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="">Leaving Reason </label>
                                <textarea class="form-control" name="history_company_leaving_reasons[]" id="" rows="3" placeholder="Reason for leaving"></textarea>
                            </div>
                            <div class="col-md-12 submit-btn">
                                <button class="btn btn-success" type="submit" style="cursor: pointer" id="submit">Submit</button>
                            </div>
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
                            '<button type="button" class="btn btn-danger remove-btn-two"><i class="fa fa-trash"></i></button>'+
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
                                '<button type="button" class="btn btn-danger remove-btn"><i class="fa fa-trash"></i></button>'+
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
