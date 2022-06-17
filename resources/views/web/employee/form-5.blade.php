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
                <input type="hidden" name="form_name" value="form-5">
                <div class="list-wrapper">
                    <div class="list-item">
                        <h1>General Informations:</h1>
                        <div class="row">
                            <div class="col-md-12 reference p-0 pb-3">
                                <span>Please list the name(s) if you know any employee(s) within MMC?</span>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" name="" class="form-control" placeholder="Full Name">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" name="" class="form-control" placeholder="Department Name">
                            </div>
                            <div class="form-group col-md-6 mt-3">
                                <input type="text" name="" class="form-control" placeholder="Full Name">
                            </div>
                            <div class="form-group col-md-6 mt-3">
                                <input type="text" name="" class="form-control" placeholder="Department Name">
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
                        <div class="row siblingss">
                            <div class="col-md-6">
                                <div class="sibling">
                                    <span>Any plans for higher education or career development?</span>
                                </div>
                            </div>
                            <div class="col-md-3 radioz">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="Yes" name="career" id="yes">
                                    <label class="form-check-label" for="yes">
                                    Yes
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="No" name="career" id="no">
                                    <label class="form-check-label" for="no">
                                    No
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="row siblingss">
                            <div class="col-md-6">
                                <div class="sibling">
                                    <span>Any political affiliation?</span>
                                </div>
                            </div>
                            <div class="col-md-3 radioz">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="Yes" name="affiliation" id="yes">
                                    <label class="form-check-label" for="yes">
                                    Yes
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="No" name="affiliation" id="no">
                                    <label class="form-check-label" for="no">
                                    No
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="row siblingss">
                            <div class="col-md-6">
                                <div class="sibling">
                                    <span>Any affiliation with NGOs?</span>
                                </div>
                            </div>
                            <div class="col-md-3 radioz">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="Yes" name="ngos" id="yes">
                                    <label class="form-check-label" for="yes">
                                    Yes
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="No" name="ngos" id="no">
                                    <label class="form-check-label" for="no">
                                    No
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="row siblingss">
                            <div class="col-md-6">
                                <div class="sibling">
                                    <span>Any membership (club, board, association etc…)?</span>
                                </div>
                            </div>
                            <div class="col-md-6 radioz">
                                <input type="text" name="" class="form-control">
                            </div>
                        </div>
                        <div class="row siblingss">
                            <div class="col-md-6">
                                <div class="sibling">
                                    <span>Who referred you for this job?</span>
                                </div>
                            </div>
                            <div class="col-md-6 radioz">
                                <input type="text" name="" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <span>I certify that the information provided in this forms of employment is complete and true to the best of my knowledge.</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row date-sig">
                                    <div class="col-md-6">
                                        <label for="">Date</label>
                                        <input type="date" name="" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Signature</label>
                                        <input type="text" name="" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6"></div>
                        </div>
                        <h1 class="doc-req">For internal use</h1>
                        <div class="row">
                            <div class="col-md-4 form-group">
                                <input type="text" name="" class="form-control" placeholder="Employee's Department">
                            </div>
                            <div class="col-md-4 form-group">
                                <input type="text" name="" class="form-control" placeholder="Designation">
                            </div>
                            <div class="col-md-4 form-group">
                                <input type="text" name="" class="form-control" placeholder="Date of Joining/Internal Transfer">
                            </div>
                        </div>
                        <h1 class="doc-req">Reviewed by (Line Manager/Supervisor)</h1>
                        <div class="row">
                            <div class="col-md-3 form-group">
                                <input type="text" name="" class="form-control" placeholder="Full Name">
                            </div>
                            <div class="col-md-3 form-group">
                                <input type="text" name="" class="form-control" placeholder="Designation">
                            </div>
                            <div class="col-md-3 form-group">
                                <input type="text" name="" class="form-control" placeholder="Dated">
                            </div>
                            <div class="col-md-3 form-group">
                                <input type="text" name="" class="form-control" placeholder="Signature">
                            </div>
                        </div>
                        <h1 class="doc-req">Approved by (Operation Manager):</h1>
                        <div class="row">
                            <div class="col-md-3 form-group">
                                <input type="text" name="" class="form-control" placeholder="Full Name">
                            </div>
                            <div class="col-md-3 form-group">
                                <input type="text" name="" class="form-control" placeholder="Designation">
                            </div>
                            <div class="col-md-3 form-group">
                                <input type="text" name="" class="form-control" placeholder="Dated">
                            </div>
                            <div class="col-md-3 form-group">
                                <input type="text" name="" class="form-control" placeholder="Signature">
                            </div>
                        </div>
                        <h1 class="doc-req">Approved by ( Business Head):</h1>
                        <div class="row">
                            <div class="col-md-3 form-group">
                                <input type="text" name="" class="form-control" placeholder="Full Name">
                            </div>
                            <div class="col-md-3 form-group">
                                <input type="text" name="" class="form-control" placeholder="Designation">
                            </div>
                            <div class="col-md-3 form-group">
                                <input type="text" name="" class="form-control" placeholder="Dated">
                            </div>
                            <div class="col-md-3 form-group">
                                <input type="text" name="" class="form-control" placeholder="Signature">
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
