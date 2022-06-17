@extends('layouts.admin.app')
@section('title', $page_title)
@section('content')
<input type="hidden" id="page_url" value="{{ route('employee.index') }}">
<section class="content-header">
    <div class="content-header-left">
        <h1>All Employees</h1>
    </div>
    <div class="content-header-right">
        <a href="{{ route('employee.create') }}" class="btn btn-primary btn-sm">Add New Employee</a>
    </div>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            @if (session('success'))
                <div class="callout callout-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="box box-info">
                <div class="box-body">
                    <div class="row">
                        <div class="col-sm-1">Search:</div>
                        <div class="d-flex col-sm-6">
                            <input type="text" id="search" class="form-control" placeholder="Search">
                        </div>
                        <div class="d-flex col-sm-5">
                            <select name="" id="status" class="form-control status" style="margin-bottom:5px">
                                <option value="All" selected>Search by status</option>
                                <option value="1">Active</option>
                                <option value="2">In-Active</option>
                            </select>
                        </div>
                    </div>
                    <table id="" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Full Name</th>
                                <th>Father Name</th>
                                <th>Phone</th>
                                <th>E-mail</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="body">
                            @foreach($models as $key=>$model)
                                <tr id="id-{{ $model->id }}">
                                    <td>{{  $models->firstItem()+$key }}.</td>
                                    <td>{{$model->full_name}}</td>
                                    <td>{{$model->father_name??'N/A'}}</td>
                                    <td>{{$model->phone??'N/A'}}</td>
                                    <td>{{$model->email}}</td>
                                    <td>
										@if($model->status)
											<span class="badge badge-success">Active</span>
										@else
											<span class="badge badge-danger">In-Active</span>
										@endif
									</td>
                                    <td>
                                        <a href="{{ route('user.edit', $model->id)}}" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
                                        <button class="btn btn-danger btn-xs delete" data-slug="{{ $model->id }}" data-del-url="{{ route('employee.destroy', $model->id) }}"><i class="fa fa-trash"></i> Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="7">
                                    Displying {{$models->firstItem()}} to {{$models->lastItem()}} of {{$models->total()}} records
                                    <div class="d-flex justify-content-center">
                                        {!! $models->links('pagination::bootstrap-4') !!}
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</section>
@endsection

@push('js')
@endpush
