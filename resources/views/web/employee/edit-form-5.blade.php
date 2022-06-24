@extends('layouts.website.master')
@section('title', $page_title)
@section('content')
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
                <input type="hidden" name="form_name" value="form-5">
                <div class="list-wrapper">
                    <div class="list-item">
                        <h1>General Informations:</h1>
                        <div class="row">
                            <div class="col-md-12 reference p-0 pb-3">
                                <span>Please list the name(s) if you know any employee(s) within MMC?</span>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Full Name</label>
                                <input type="text" name="names[]" value="{{ isset($model->haveGeneralInformation)?$model->haveGeneralInformation[0]->full_name:'' }}" class="form-control" placeholder="Full Name">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Designation</label>
                                <input type="text" value="{{ isset($model->haveGeneralInformation)?$model->haveGeneralInformation[0]->designation:'' }}" name="designations[]" class="form-control" placeholder="Department Name">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Full Name</label>
                                <input type="text" name="names[]" value="{{ isset($model->haveGeneralInformation)?$model->haveGeneralInformation[1]->full_name:'' }}" class="form-control" placeholder="Full Name">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Designation</label>
                                <input type="text" value="{{ isset($model->haveGeneralInformation)?$model->haveGeneralInformation[1]->designation:'' }}" name="designations[]" class="form-control" placeholder="Department Name">
                            </div>
                        </div>
                        <div class="row siblingss">
                            <div class="col-md-6">
                                <div class="sibling">
                                    <h3 class="text-center">Please Tick</h3>
                                </div>
                            </div>
                            <div class="col-md-3 radioz">
                                <h3>Yes</h3>
                                <h3>No</h3>
                            </div>
                            <div class="col-md-3">
                                <h3>If yes (details)</h3>
                            </div>
                        </div>

                        @foreach ($tick_questions as $question)
                            <div class="row siblingss">
                                <div class="col-md-6">
                                    <div class="sibling">
                                        <span>{{ $question->question }}</span>
                                    </div>
                                </div>
                                @if($question->is_yes_no)
                                    <div class="col-md-3 radioz">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" value="1" name="answers[{{ $question->id }}]" id="yes{{ $question->id }}">
                                            <label class="form-check-label" for="yes{{ $question->id }}">
                                            Yes
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" value="0" name="answers[{{ $question->id }}]" id="no{{ $question->id }}">
                                            <label class="form-check-label" for="no{{ $question->id }}">
                                            No
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <input type="text" name="answers_details[{{ $question->id }}]" class="form-control" placeholder="Enter details if yes">
                                    </div>
                                    <div class="col-sm-12 offset-6">
                                        <span style="color: red; margin-left:40px">{{ $errors->first('answers') }}</span>
                                    </div>
                                @else
                                    <div class="col-md-6 radioz">
                                        <input type="text" name="answers_details[{{ $question->id }}]" class="form-control" placeholder="Enter details">
                                        <span style="color: red; margin-left:40px">{{ $errors->first('answers_details') }}</span>
                                    </div>
                                @endif
                            </div>
                        @endforeach

                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <span>I certify that the information provided in this forms of employment is complete and true to the best of my knowledge.</span>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row date-sig">
                                    <div class="col-md-5">
                                        <label for=""> <b>Date</b></label>
                                        <h2>______________</h2>
                                    </div>
                                    <div class="col-md-2"></div>
                                    <div class="col-md-5">
                                        <label for=""><b>Signature</b></label>
                                        <h2>______________</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6"></div>
                        </div>
                        <br>
                        <div class="col-md-12 submit-btn">
                            <a href="{{ route('step-4.edit', $employee_id) }}" class="btn btn-success button_save">Previouse</a>
                            <button class="btn btn-success button_save" type="submit" style="cursor: pointer" id="submit">Save</button>
                        </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
