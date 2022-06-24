@extends('layouts.website.master')
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
                <input type="hidden" name="form_name" value="form-3">
                <div class="list-wrapper">
                    <div class="list-item">
                        <h1>References</h1>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="">Full Name</label>
                                <input type="text" name="full_names[]" value="{{ isset($model->haveRefereces)?$model->haveRefereces[0]->full_name:'' }}" class="form-control" placeholder="Full Name">
                                <span style="color: red">{{ $errors->first('full_name') }}</span>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="">Relationship</label>
                                <input type="text" name="relationships[]" value="{{ isset($model->haveRefereces)?$model->haveRefereces[0]->relationship:'' }}" class="form-control" placeholder="Relationship">
                                <span style="color: red">{{ $errors->first('full_name') }}</span>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="">Company Name</label>
                                <input type="text" name="company_names[]" value="{{ isset($model->haveRefereces)?$model->haveRefereces[0]->company_name:'' }}" class="form-control" placeholder="Company Name">
                                <span style="color: red">{{ $errors->first('company_name') }}</span>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Designation</label>
                                <input type="text" name="designations[]" value="{{ isset($model->haveRefereces)?$model->haveRefereces[0]->designation:'' }}" class="form-control" placeholder="Designation">
                                <span style="color: red">{{ $errors->first('designation') }}</span>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Contact No</label>
                                <input type="tel" name="contact_nos[]" value="{{ isset($model->haveRefereces)?$model->haveRefereces[0]->contact_no:'' }}" class="form-control" placeholder="Contact No">
                                <span style="color: red">{{ $errors->first('contact_no') }}</span>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="">Address</label>
                                <textarea class="form-control" name="addresses[]" id="" rows="3" placeholder="Address">{{ isset($model->haveRefereces)?$model->haveRefereces[0]->address:'' }}</textarea>
                                <span style="color: red">{{ $errors->first('address') }}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="">Full Name</label>
                                <input type="text" name="full_names[]" value="{{ isset($model->haveRefereces)?$model->haveRefereces[1]->full_name:'' }}" class="form-control" placeholder="Full Name">
                                <span style="color: red">{{ $errors->first('full_name') }}</span>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="">Relationship</label>
                                <input type="text" name="relationships[]" value="{{ isset($model->haveRefereces)?$model->haveRefereces[1]->relationship:'' }}" class="form-control" placeholder="Relationship">
                                <span style="color: red">{{ $errors->first('full_name') }}</span>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="">Company Name</label>
                                <input type="text" name="company_names[]" value="{{ isset($model->haveRefereces)?$model->haveRefereces[1]->company_name:'' }}" class="form-control" placeholder="Company Name">
                                <span style="color: red">{{ $errors->first('company_name') }}</span>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Designation</label>
                                <input type="text" name="designations[]" value="{{ isset($model->haveRefereces)?$model->haveRefereces[1]->designation:'' }}" class="form-control" placeholder="Designation">
                                <span style="color: red">{{ $errors->first('designation') }}</span>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Contact No</label>
                                <input type="tel" name="contact_nos[]" value="{{ isset($model->haveRefereces)?$model->haveRefereces[1]->contact_no:'' }}" class="form-control" placeholder="Contact No">
                                <span style="color: red">{{ $errors->first('contact_no') }}</span>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="">Address</label>
                                <textarea class="form-control" name="addresses[]" id="" rows="3" placeholder="Address">{{ isset($model->haveRefereces)?$model->haveRefereces[1]->address:'' }}</textarea>
                                <span style="color: red">{{ $errors->first('address') }}</span>
                            </div>
                        </div>
                        <h1 class="doc-req">Documents Required:</h1>
                        <div class="row">
                            <ul class="doc-details">
                                <li>Valid CNIC</li>
                                <li>Copy of Educational Credentials</li>
                                <li>Additional Qualification / Training Certificate (if any)</li>
                                <li>2-Passport size photographs (less than one-year old)</li>
                                <li>NOC from previous employer(s)  (Experience Certificates)</li>
                                <li>An Updated Curriculum vitae.</li>
                                <li>Last Three-month salary slip</li>
                            </ul>
                        </div>
                        <div class="col-md-12 submit-btn">
                            <button class="btn btn-success button_save" type="submit" style="cursor: pointer;" id="submit">Save & Next</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
