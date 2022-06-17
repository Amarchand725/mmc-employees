@foreach($models as $key=>$model)
    @if($model->hasRole('Admin'))
        @continue;
    @endif
    <tr id="id-{{ $model->id }}">
        <td>{{  $models->firstItem()+$key }}.</td>
        <td>{{$model->name}}</td>
        <td>{{$model->last_name??'N/A'}}</td>
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
            @can('user-edit')
                <a href="{{ route('user.edit', $model->id)}}" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
            @endcan
            @can('user-delete')
                <a class="btn btn-danger btn-xs delete-btn" data-user-id="{{ $model->id }}"><i class="fa fa-trash"></i> Delete</a>
            @endcan
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
