@extends('layouts.app', [
    'title' => __('Assignment Management'),
    'parentSection' => 'laravel',
    'elementName' => 'assignment-management'
])

@section('content')
    @component('layouts.headers.auth')
        @component('layouts.headers.breadcrumbs')
            @slot('title')
                {{ __('Assignments') }}
            @endslot

            <li class="breadcrumb-item"><a href="{{ route('assignment.index') }}">{{ __('Assignment Management') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('Show') }}</li>
        @endcomponent
    @endcomponent

    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Assignments') }}</h3>
                                <p class="text-sm mb-0">
									{{ __('This is an example of assignment management. This is a minimal setup in order to get started fast.') }}
								</p>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('assignment.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 mt-2">
                        @include('alerts.success')
                        @include('alerts.errors')
                    </div>

                    <div class="table-responsive py-4">
                        <table class="table align-items-center table-flush"  id="datatable-basic">
                            <tbody>
								<tr>
									<th>Assigned to classes</th>
									<td>
                                        <ul>
                                            @foreach ($assignment->hasAssignedClasses as $class)
                                                <li>{{ $class->hasStudyClass->name }}</li>
                                            @endforeach
                                        </ul>
                                    </td>
								</tr>
                                <tr>
									<th>File Name</th>
									<td>{{ $assignment->name }}</td>
								</tr>
								<tr>
									<th>Description</th>
									<td>{{ $assignment->description }}</td>
								</tr>
								<tr>
									<th>File</th>
									<td>
										<img src="{{ asset('public/admin/assets/assignments') }}/{{ $assignment->file }}" width="200px" alt="">
									</td>
								</tr>
								<tr>
									<th>Uploaded By</th>
									<td>{{ isset($assignment->hasCreatedBy)?$assignment->hasCreatedBy->name:'N/A' }}</td>
								</tr>
								<tr>
									<th>Created at</th>
									<td>{{ date('d, M-Y H:i A', strtotime($assignment->created_at)) }}</td>
								</tr>
								<tr>
									<th>Status</th>
									<td>
										@if($assignment->status)
											<span class="badge badge-success">Active</span>
										@else
											<span class="badge badge-danger">In-Active</span>
										@endif
									</td>
								</tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('public/admin/assets') }}/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('public/admin/assets') }}/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('public/admin/assets') }}/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css">
@endpush

@push('js')
    <script src="{{ asset('public/admin/assets') }}/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('public/admin/assets') }}/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('public/admin/assets') }}/vendor/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('public/admin/assets') }}/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="{{ asset('public/admin/assets') }}/vendor/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ asset('public/admin/assets') }}/vendor/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="{{ asset('public/admin/assets') }}/vendor/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="{{ asset('public/admin/assets') }}/vendor/datatables.net-select/js/dataTables.select.min.js"></script>
@endpush
