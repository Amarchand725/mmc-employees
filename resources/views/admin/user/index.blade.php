@extends('layouts.admin.app')
@section('title', $page_title)
@section('content')
<input type="hidden" id="page_url" value="{{ route('user.index') }}">
<section class="content-header">
    <div class="content-header-left">
        <h1>{{ $page_title }}</h1>
    </div>
    <div class="content-header-right">
        <a href="{{ route('user.create') }}" class="btn btn-primary btn-sm">Add New</a>
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
                                <th>Name</th>
                                <th>Email</th>
                                <th>Form Status</th>
                                <th>Sent</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="body">
                            @foreach($users as $key=>$user)
                                @if($user->hasRole('Admin'))
                                    @continue;
                                @endif
                                <tr id="id-{{ $user->id }}">
                                    <td>{{  $users->firstItem()+$key }}.</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        @if($user->form_status)
                                            <span class="label label-success"><i class="fa fa-check"></i> Completed</span>
                                        @else 
                                            @if($user->is_shared)
                                                <span class="label label-info"><i class="fa fa-spinner"></i> Processing</span>
                                            @else 
                                                <span class="label label-warning"><i class="fa fa-pause"></i> Awaiting</span>
                                            @endif
                                        @endif
                                    </td>
                                    <td><span class="badge badge-success">{{ $user->sent_times }}</span></td>
                                    <td>
                                        <a href="{{ route('user.edit', $user->id)}}" data-toggle="tooltip" data-placement="top" title="Edit User" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
                                        @if($user->form_status)
                                            <a href="{{ route('user.show', $user->id) }}" data-toggle="tooltip" data-placement="top" title="Show User Details" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> Show</a>
                                        @else 
                                            <button class="btn btn-info btn-xs share-link-btn" id="share-link-btn" data-toggle="tooltip" data-placement="top" title="Share form link" value="{{ $user->id }}"><i class="fa fa-share"></i> Share Link</button>
                                            <button class="btn btn-info btn-xs share-link-btn" id="loader-btn" style="display: none" data-toggle="tooltip" data-placement="top" title="Share form link" value="{{ $user->id }}"><img src="{{ asset('public/assets/images/loader.gif') }}" style="width: 20px" alt=""></button>
                                        @endif
                                        <button class="btn btn-danger btn-xs delete" data-toggle="tooltip" data-placement="top" title="Delete User" data-slug="{{ $user->id }}" data-del-url="{{ url('user', $user->id) }}"><i class="fa fa-trash"></i> Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="7">
                                    Displying {{$users->firstItem()}} to {{$users->lastItem()}} of {{$users->total()}} records
                                    <div class="d-flex justify-content-center">
                                        {!! $users->links('pagination::bootstrap-4') !!}
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
    <script>
        $(document).on('click', '.share-link-btn', function(){
            var user_id = $(this).val();
            
            Swal.fire({
                title: 'Are you sure?',
                text: "You want to share form link!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, share it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#share-link-btn').hide();
                    $('#loader-btn').show();

                    $.ajax({
                        type:'GET',
                        url:'{{ route("admin.share_link") }}',
                        data: {user_id: user_id},
                        success:function(response){
                            console.log(response);
                            $('#share-link-btn').hide();
                            $('#loader-btn').show();
                            if(response==1){
                                Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: 'You have shared form successfully',
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                                location.reload();
                            }else{
                                Swal.fire(
                                    'Sorry!',
                                    'Something went wrong.',
                                    'danger'
                                )
                            }
                        }
                    });
                }
            })
        });
    </script>
@endpush
