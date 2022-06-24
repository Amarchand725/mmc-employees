@extends('layouts.website.master')
@section('title', $page_title)
@section('content')
    <!-- form section -->
    <section class="mad-mind-form">
        <div class="container">
            <div class="row back-image"></div>
            <form action="{{ route('employee.update', $model->id) }}" id="regform"  class="my-repeater" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                @csrf
                
                {{ method_field('PATCH') }}

                <input type="hidden" name="employee_id" value="{{ $employee_id }}">
                <input type="hidden" name="form_name" value="form-1">
                <div class="list-wrapper">
                    <div class="list-item">
                        <h1 class="text-center">EMPLOYEE’S DETAILS (Strictly Confidential)</h1>
                        <h1>Personal Details</h1>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="">Full Name <span style="color: red">*</span></label>
                                <input type="text" name="full_name" value="{{ $model->full_name }}" class="form-control" placeholder="Full Name *">
                                <span style="color: red">{{ $errors->first('full_name') }}</span>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Father Name <span style="color: red">*</span></label>
                                <input type="text" name="father_name" value="{{ $model->father_name  }}" class="form-control" placeholder="Father name *">
                                <span style="color: red">{{ $errors->first('father_name') }}</span>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Date of birth <span style="color: red">*</span></label>
                                <input type="date" name="dob" value="{{ $model->dob  }}" class="form-control" placeholder="Date of Birth *">
                                <span style="color: red">{{ $errors->first('dob') }}</span>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Place of birth</label>
                                <input type="text" name="place_of_birth" value="{{ $model->place_of_birth  }}" class="form-control" placeholder="Place of Birth">
                                <span style="color: red">{{ $errors->first('place_of_birth') }}</span>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">CNIC No <span style="color: red">*</span></label>
                                <input type="text" name="cnic" value="{{ $model->cnic }}" class="form-control" placeholder="CNIC No *">
                                <span style="color: red">{{ $errors->first('cnic') }}</span>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">CNIC Expire Date <span style="color: red">*</span></label>
                                <input type="date" name="cnic_expiry" value="{{ $model->cnic_expiry }}" class="form-control" placeholder="Cnic Date of Expiry *">
                                <span style="color: red">{{ $errors->first('cnic_expiry') }}</span>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="">Blood Group</label>
                                <input type="text" name="blood_group" value="{{ $model->blood_group }}" class="form-control" placeholder="Blood Group">
                                <span style="color: red">{{ $errors->first('blood_group') }}</span>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="">Religion <span style="color: red">*</span></label>
                                <input type="text" name="religion" value="{{ $model->religion }}" class="form-control" placeholder="Religion *">
                                <span style="color: red">{{ $errors->first('religion') }}</span>
                            </div>
                            <div class="form-group col-md-4">
                                <div class="form-check" style="margin-top: 35px">
                                    @if($model->marital_status==0)
                                        <input class="form-check-input" type="radio" name="marital_status" id="unmarried" value="0" checked>
                                    @else
                                        <input class="form-check-input" type="radio" name="marital_status" id="unmarried" value="0">
                                    @endif
                                    <label class="form-check-label" for="unmarried">
                                    Unmarried
                                    </label>
                                    <span class="ml-5">
                                        @if($model->marital_status==1)
                                            <input class="form-check-input" type="radio" name="marital_status" id="married" value="1" checked>
                                        @else
                                            <input class="form-check-input" type="radio" name="marital_status" id="married" value="1">
                                        @endif
                                        <label class="form-check-label" for="married">
                                        Married
                                        </label>
                                    </span>
                                 </div>
                            </div>
                        </div>

                        @if($model->marital_status==1)
                            <span id="marital-details">
                                <h1>Spouse Detail</h1>
                                <div class="row">
                                    <div class="col-md-3 form-group">
                                        <input type="text" name="spouse_name" value="{{ isset($model->hasSpouse)?$model->hasSpouse->spouse_name:'' }}" id="" class="form-control" placeholder="Spouse Name">
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <select name="spouse_gender" class="form-control" id="">
                                            <option value="male" {{ isset($model->hasSpouse)?($model->hasSpouse->spouse_gender=='male'?'selected':''):'' }}>Male</option>
                                            <option value="female" {{ isset($model->hasSpouse)?($model->hasSpouse->spouse_gender=='female'?'selected':''):'' }}>Femal</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <input type="date" name="spouse_dob" value="{{ isset($model->hasSpouse)?$model->hasSpouse->spouse_dob:'' }}" id="" class="form-control" placeholder="Date of Birth">
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <input type="text" name="spouse_cnic_no" value="{{ isset($model->hasSpouse)?$model->hasSpouse->spouse_cnic_no:'' }}" id="" class="form-control" placeholder="CNIC No">
                                    </div>
                                </div>

                                <h1>Children Detail</h1>
                                <div class="dynamic-repeater-three">
                                    <div class="row children-detail">
                                        <div class="form-group col-md-3">
                                            <label for="">Name</label>
                                            <input type="text" name="child_names[]" class="form-control" placeholder="Name">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="">Gender</label>
                                            <select name="child_genders[]" id="" class="form-control">
                                                <option value="male" selected>Male</option>
                                                <option value="female">Female</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="">Date of birth</label>
                                            <input type="date" name="child_dobs[]" class="form-control" placeholder="Date of Birth">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="">CNIC No.</label>
                                            <input type="text" name="child_cnic_nos[]" class="form-control" placeholder="Cnic No">
                                        </div>
                                        <div class="col-2 ">
                                            <button type="button" class="btn btn-success custom-fields-three" style="margin-top: 32px !important"><i class="fa fa-plus"></i></button>
                                        </div>
                                    </div>
                                    @if(isset($model->haveChildren) && sizeof($model->haveChildren)>0)
                                        @foreach ($model->haveChildren as $child)
                                            <div class="dynamic-repeater-three">
                                                <div class="row children-detail">
                                                    <div class="form-group col-md-3">
                                                        <label for="">Name</label>
                                                        <input type="text" name="child_names[]" class="form-control" placeholder="Name">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="">Gender</label>
                                                        <select name="child_genders[]" id="" class="form-control">
                                                            <option value="male" {{ $child->gender=='male'?'selected':'' }}>Male</option>
                                                            <option value="female" {{ $child->gender=='female'?'selected':'' }}>Female</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="">Date of birth</label>
                                                        <input type="date" name="child_dobs[]" value="{{ $child->dob }}" class="form-control" placeholder="Date of Birth">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="">CNIC No.</label>
                                                        <input type="text" name="child_cnic_nos[]" value="{{ $child->cnic }}" class="form-control" placeholder="Cnic No">
                                                    </div>
                                                    <div class="col-2 ">
                                                        <button type="button" class="btn btn-success custom-fields-three" style="margin-top: 32px !important"><i class="fa fa-plus"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </span>
                        @endif

                        <span id="spouse-details"></span>
                        <span id="child-details"></span>

                        <!-- Repeated row -->
                        <span id="dynamic-repeater-three"></span>
                        <!-- Repeated row -->
                        <h1>Extended Family Members</h1>
                        <div class="row siblingss">
                            <div class="col-md-6">
                                <div class="sibling">
                                    <span>Father</span>
                                </div>
                            </div>
                            <div class="col-md-6 radioz">
                                <div class="form-check">
                                    @if($model->hasExtandFamily->father==1)
                                        <input class="form-check-input" type="radio" value="1"  name="father" id="father-yes" checked>
                                    @else
                                        <input class="form-check-input" type="radio" value="1"  name="father" id="father-yes">
                                    @endif
                                    <label class="form-check-label" for="father-yes">
                                    Yes
                                    </label>
                                </div>
                                <div class="form-check">
                                    @if($model->hasExtandFamily->father==0)
                                        <input class="form-check-input" type="radio" value="0" name="father" id="father-no" checked>
                                    @else
                                        <input class="form-check-input" type="radio" value="0" name="father" id="father-no">
                                    @endif
                                    <label class="form-check-label" for="father-no">
                                    No
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row siblingss">
                            <div class="col-md-6">
                                <div class="sibling">
                                    <span>Mother</span>
                                </div>
                            </div>
                            <div class="col-md-6 radioz">
                                <div class="form-check">
                                    @if($model->hasExtandFamily->mother==1)
                                        <input class="form-check-input" type="radio" value="1" name="mother" id="mother-yes" checked>
                                    @else
                                        <input class="form-check-input" type="radio" value="1" name="mother" id="mother-yes">
                                    @endif

                                    <label class="form-check-label" for="mother-yes">
                                    Yes
                                    </label>
                                </div>
                                <div class="form-check">
                                    @if($model->hasExtandFamily->mother==0)
                                        <input class="form-check-input" type="radio" value="0" name="mother" id="mother-no" checked>
                                    @else
                                        <input class="form-check-input" type="radio" value="0" name="mother" id="mother-no">
                                    @endif
                                    <label class="form-check-label" for="mother-no">
                                    No
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row siblingss">
                            <div class="col-md-6">
                                <div class="sibling">
                                    <span>Brother</span>
                                </div>
                            </div>
                            <div class="col-md-6 radioz">
                                <div class="form-check">
                                    @if($model->hasExtandFamily->brother==1)
                                        <input class="form-check-input" type="radio" value="1" name="brother" id="brother-yes" checked>
                                    @else
                                        <input class="form-check-input" type="radio" value="1" name="brother" id="brother-yes">
                                    @endif
                                    <label class="form-check-label" for="brother-yes">
                                    Yes
                                    </label>
                                </div>
                                <div class="form-check">
                                    @if($model->hasExtandFamily->brother==0)
                                        <input class="form-check-input" type="radio" value="0" name="brother" id="brother-no" checked>
                                    @else
                                        <input class="form-check-input" type="radio" value="0" name="brother" id="brother-no">
                                    @endif
                                    <label class="form-check-label" for="brother-no">
                                    No
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row siblingss">
                            <div class="col-md-6">
                                <div class="sibling">
                                    <span>Sister</span>
                                </div>
                            </div>
                            <div class="col-md-6 radioz">
                                <div class="form-check">
                                    @if($model->hasExtandFamily->sister==1)
                                        <input class="form-check-input" type="radio" value="1" name="sister" id="sister-yes" checked>
                                    @else
                                        <input class="form-check-input" type="radio" value="1" name="sister" id="sister-yes">
                                    @endif
                                    <label class="form-check-label" for="sister-yes">
                                    Yes
                                    </label>
                                </div>
                                <div class="form-check">
                                    @if($model->hasExtandFamily->sister==0)
                                        <input class="form-check-input" type="radio" value="0" name="sister" id="sister-no" checked>
                                    @else
                                        <input class="form-check-input" type="radio" value="0" name="sister" id="sister-no">
                                    @endif
                                    <label class="form-check-label" for="sister-no">
                                    No
                                    </label>
                                </div>
                            </div>
                        </div>
                        <h1>Contact Details</h1>
                        <div class="row">
                            <div class="col-md-4 form-group">
                                <input type="tel" name="home_ptcl_no" value="{{ $model->hasContactDetails->home_ptcl_no }}" id="" class="form-control" placeholder="HOME(PTCL) No">
                            </div>
                            <div class="col-md-4 form-group">
                                <input type="tel" name="personal_mobile_no" value="{{ $model->hasContactDetails->personal_mobile_no }}" id="" class="form-control" placeholder="Personal Mobile No *">
                                <span style="color: red">{{ $errors->first('personal_mobile_no') }}</span>
                            </div>
                            <div class="col-md-4 form-group">
                                <input type="email" name="personal_email" id="" value="{{ $model->hasContactDetails->personal_email }}" class="form-control" placeholder="Personal Email">
                                <span style="color: red">{{ $errors->first('personal_email') }}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <h1 class="">Residential Address:</h2>
                            </div>
                            <div class="col-md-6">
                                <h1 class="">Complete address</h2>
                            </div>
                        </div>
                        <h4>Current</h4>
                        @foreach ($model->haveResidentialAddresses as $address)
                            @if($address->type=='current')
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <input type="hidden" name="types[]" value="current">
                                            <div class="col-md-4 form-group">
                                                <input type="text" name="living_sinces[]" id="" value="{{ $address->living_since }}" placeholder="Living since how Long?" class="form-control">
                                                <span style="color: red">{{ $errors->first('living_sinces') }}</span>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <input type="text" name="nearest_landmarks[]" id="" value="{{ $address->nearest_landmark }}" placeholder="Nearest landmark?" class="form-control">
                                                <span style="color: red">{{ $errors->first('nearest_landmarks') }}</span>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <input type="text" name="property_types[]" id="" value="{{ $address->peroperty_type }}" placeholder="Own/Rental/ Other (Pls. specify)?" class="form-control">
                                                <span style="color: red">{{ $errors->first('property_types') }}</span>
                                            </div>
                                        </div>
                                        <span class="danger">
                                            (IF any changes in the residence or contact number, please notify to the company immediately)!
                                        </span>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <textarea class="form-control" name="completed_addresses[]" style="height:100px;"  placeholder="Complete Address">{{ $address->complete_address }}</textarea>
                                            <span style="color: red">{{ $errors->first('completed_addresses') }}</span>
                                        </div>
                                    </div>
                                </div>
                            @else 
                                <div class="d-flex align-items-center justify-content-between">
                                    <h4 style="margin: 0;">Permanent</h4>
                                    <span class="danger">
                                        (if different from current address)!
                                    </span>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <input type="hidden" name="types[]" value="permanent">
                                            <div class="col-md-4 form-group">
                                                <input type="text" name="living_sinces[]" id="" value="{{ $address->living_since }}" placeholder="Living since how Long?" class="form-control">
                                                <span style="color: red">{{ $errors->first('living_sinces') }}</span>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <input type="text" name="nearest_landmarks[]" id="" value="{{ $address->nearest_landmark }}" placeholder="Nearest landmark?" class="form-control">
                                                <span style="color: red">{{ $errors->first('nearest_landmarks') }}</span>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <input type="text" name="property_types[]" id="" value="{{ $address->peroperty_type }}" placeholder="Own/Rental/ Other (Pls. specify)?" class="form-control">
                                                <span style="color: red">{{ $errors->first('property_types') }}</span>
                                            </div>
                                        </div>
                                        <span class="danger">
                                            (IF any changes in the residence or contact number, please notify to the company immediately)!
                                        </span>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <textarea class="form-control" name="completed_addresses[]" style="height:100px;"  placeholder="Complete Address">{{ $address->complete_address }}</textarea>
                                            <span style="color: red">{{ $errors->first('completed_addresses') }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach

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
        $("input[name=marital_status]").click(function () {
            $('#marital-details').html('');
            if($(this).prop("checked")) {
                var val = $(this).val();
                if(val==1){
                    var html = '<h1>Spouse Detail</h1>'+
                                    '<div class="row">'+
                                        '<div class="col-md-3 form-group">'+
                                            '<input type="text" name="spouse_name" value="" id="" class="form-control" placeholder="Spouse Name">'+
                                        '</div>'+
                                        '<div class="col-md-3 form-group">'+
                                            '<select name="spouse_gender" class="form-control">'+
                                                '<option value="male" selected>Male</option>'+
                                                '<option value="female">Female</option>'+
                                            '</select>'+
                                        '</div>'+
                                        '<div class="col-md-3 form-group">'+
                                            '<input type="date" name="spouse_dob" value="" id="" class="form-control" placeholder="Date of Birth">'+
                                        '</div>'+
                                        '<div class="col-md-3 form-group">'+
                                            '<input type="text" name="spouse_cnic_no" value="" id="" class="form-control" placeholder="CNIC No">'+
                                        '</div>'+
                                    '</div>';
                        $('#spouse-details').html(html);

                    var html = '<h1>Children Detail</h1>'+
                                '<div class="dynamic-repeater-three">'+
                                    '<div class="row children-detail">'+
                                        '<div class="form-group col-md-3">'+
                                            '<label for="">Name</label>'+
                                            '<input type="text" name="child_names[]" class="form-control" placeholder="Name">'+
                                        '</div>'+
                                        '<div class="form-group col-md-2">'+
                                            '<label for="">Gender</label>'+
                                            '<select name="child_genders[]" id="" class="form-control">'+
                                                '<option value="male" selected>Male</option>'+
                                                '<option value="female">Female</option>'+
                                            '</select>'+
                                        '</div>'+
                                        '<div class="form-group col-md-2">'+
                                            '<label for="">Date of birth</label>'+
                                            '<input type="date" name="child_dobs[]" class="form-control" placeholder="Date of Birth">'+
                                        '</div>'+
                                        '<div class="form-group col-md-3">'+
                                            '<label for="">CNIC No.</label>'+
                                            '<input type="text" name="child_cnic_nos[]" class="form-control" placeholder="Cnic No">'+
                                        '</div>'+
                                        '<div class="col-2 ">'+
                                            '<button type="button" class="btn btn-success custom-fields-three button_save" style="margin-top: 32px !important"><i class="fa fa-plus"></i></button>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>';
                    $('#child-details').html(html);
                }else{
                    $('#spouse-details').html('');
                    $('#child-details').html('');
                }
            }
        });


        $(document).on('click', ".custom-fields-three", function() {
        var html = '<div class="dynamic-repeater-three">'+
                    '<div class="row children-detail">'+
                        '<div class="form-group col-md-3">'+
                            '<input type="text" name="child_names[]" class="form-control" placeholder="Name"> '+
                        '</div>'+
                        '<div class="form-group col-md-2">'+
                            '<select name="child_genders[]" id="" class="form-control">'+
                                '<option value="male" selected>Male</option>'+
                                '<option value="female">Female</option>'+
                            '</select>'+
                        '</div>'+
                        '<div class="form-group col-md-2">'+
                            '<input type="date" name="child_dobs[]" class="form-control" placeholder="Date of Birth"> '+
                        '</div>'+
                        '<div class="form-group col-md-3">'+
                            '<input type="text" name="child_cnic_nos[]" class="form-control" placeholder="Cnic No"> '+
                        '</div>'+
                        '<div class="col-2 ">'+
                            '<button type="button" class="btn btn-danger remove-btn-two"><i class="fa fa-trash" aria-hidden="true"></i></button>'+
                        '</div>'+
                    '</div>'+
                '</div>';
            $('#dynamic-repeater-three').append(html);
        });
    </script>
@endpush

