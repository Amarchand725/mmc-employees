@extends('layouts.website.master')
@section('content')
<style>
    .form-control {
        height: auto;
    }
</style>
    <!-- form section -->
    <section class="mad-mind-form">
        <div class="container">
            <div class="row back-image"></div>
            @if (session('success'))
            <div class="callout callout-success"  style="background-color: #e165aa;height: AUTO;text-align: center;font-size: 20px;MARGIN: 0 auto;width: 100%;color: #e8e8e8;" >                    {{ session('success') }}
                </div>
            @endif
            <form action="{{ route('employee.store') }}" id="regform"  class="my-repeater" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                @csrf

                <input type="hidden" name="employee_id" value="{{ $employee_id }}">
                <input type="hidden" name="form_name" value="form-4">
                <div class="list-wrapper">
                    <div class="list-item">
                        <h1>Upload Documents</h1>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="">CNIC Front</label>
                                <div class="col-md-4 mb-3 mt-3">
                                    <img id="cnic_front_preview" src="{{ asset('public/assets/images/preview.png') }}" alt="Preview" style="height:100px; width:150px">
                                </div>
                                <input type="file" name="cnic_front" id="cnicfront" value="{{ old('cnic_front') }}" class="form-control" placeholder="CNIC Front">
                                <span style="color: red">{{ $errors->first('cnic_front') }}</span>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="">CNIC Back</label>
                                <div class="col-md-4 mb-3 mt-3">
                                    <img id="cnic_back_preview" src="{{ asset('public/assets/images/preview.png') }}" alt="Preview" style="height:100px; width:150px">
                                </div>
                                <input type="file" id="cnicback" name="cnic_back" value="{{ old('cnic_front') }}" class="form-control" placeholder="CNIC Front">
                                <span style="color: red">{{ $errors->first('cnic_front') }}</span>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="">Passport Size Photo</label>
                                <div class="col-md-4 mb-3 mt-3">
                                    <img id="passport_size_preview" src="{{ asset('public/assets/images/preview.png') }}" alt="Preview" style="height:100px; width:100px">
                                </div>
                                <input type="file" name="passport" id="passport" class="form-control">
                                <span style="color: red">{{ $errors->first('passport') }}</span>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Educational Documents</label>
                                <input type="file" name="educational_documents[]" multiple class="form-control">
                                <span style="color: red">{{ $errors->first('educational_documents') }}</span>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Additional Qualification / Training Certificates (if any)</label>
                                <input type="file" name="additional_documents[]" multiple class="form-control">
                                <span style="color: red">{{ $errors->first('additional_documents') }}</span>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="">NOC form previous employer(s) (Experience Certificates)</label>
                                <input type="file" id="experience_certificates" name="experience_certificates[]" multiple class="form-control">
                                <span style="color: red">{{ $errors->first('experience_certificates') }}</span>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="">Last Three month salary slips</label>
                                <input type="file" id="salary_slips" name="salary_slips[]" multiple class="form-control">
                                <span style="color: red">{{ $errors->first('salary_slips') }}</span>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="">An Updated Curriculum Vitae</label>
                                <input type="file" id="updated_cv" name="updated_cv" class="form-control">
                                <span style="color: red">{{ $errors->first('updated_cv') }}</span>
                            </div>
                        </div>
                        <div class="col-md-12 submit-btn">
                            <a href="{{ route('step-3.edit', $employee_id) }}" class="btn btn-success button_save">Previouse</a>
                            <button class="btn btn-success button_save" type="submit" style="cursor: pointer;" id="submit">Save & Next</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
@push('js')
    <script>
        cnicfront.onchange = evt => {
            const [file] = cnicfront.files
            if (file) {
                cnic_front_preview.src = URL.createObjectURL(file)
            }
        }

        cnicback.onchange = evt => {
            const [file] = cnicback.files
            if (file) {
                cnic_back_preview.src = URL.createObjectURL(file)
            }
        }
        passport.onchange = evt => {
            const [file] = passport.files
            if (file) {
                passport_size_preview.src = URL.createObjectURL(file)
            }
        }
    </script>
@endpush
