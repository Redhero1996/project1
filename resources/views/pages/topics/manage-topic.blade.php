@extends('main')
@section('title', '| ' . __('translate.manage_topic'))
@section('content')
	<div class="w-80 card mt-5 ml-2">
        <div class="card-body">
            <h3 class="text-center mt-3 manage">{{ __('translate.manage_topic') }}</h3>
            <!-- BEGIN PAGE CONTENT-->
            <div class="row">
                <div class="col-md-12">
                    @if(Session::has('success'))
                        <div class="portlet-title" id="message">
                            <div class="alert alert-success">
                                {!! Session::get('success') !!}
                            </div>
                        </div>
                    @endif
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th class="th-sm">#ID
                            <i class="fa fa-sort float-right" aria-hidden="true"></i>
                        </th>
                        <th class="th-sm">Tên 
                            <i class="fa fa-sort float-right" aria-hidden="true"></i>
                        </th>
                        <th class="th-sm">Trạng thái
                            <i class="fa fa-sort float-right" aria-hidden="true"></i>
                        </th>
                        <th class="th-sm">{{ __('translate.view') }}
                            <i class="fa fa-sort float-right" aria-hidden="true"></i>
                        </th>
                        <th class="th-sm"> {{ __('translate.edit') }}
                            <i class="fa fa-sort float-right" aria-hidden="true"></i>
                        </th>
                        <th class="th-sm">{{ __('translate.detele') }}
                            <i class="fa fa-sort float-right" aria-hidden="true"></i>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ( $topics as $key => $topic )
                            @if (Auth::user()->id == $topic->user_id)
                                @if ($topic->status == 2)
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        {{ __('Need to edit: Bạn có bài cần sửa lại cho phù hợp') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                           <span aria-hidden="true">&times;</span>
                                         </button>
                                    </div>
                                 @endif
                                @if ($topic->status == 3)                                       
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{ __('Close: Bạn có bài đã bị đóng') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div> 
                                @endif
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $topic->name }}</td>
                                    <td>{!! $topic->status == 1 ? '<span class="badge badge-primary">Publish</span>' : 
                                        ( $topic->status == 0 ? '<span class="badge badge-warning">Pending</span>' : 
                                        ( $topic->status == 2 ? '<span class="badge badge-default">Need to edit</span>' : 
                                        '<span class="badge badge-danger">Close</span>' )) !!}</td>
                                    <td><a class="show" href="{{ route('create-topics.show', [$topic->category->slug, $topic->slug, $topic->id]) }}">
                                        <i class="far fa-eye"></i> View
                                        </a>
                                    </td>
                                    @if ($topic->status == 1)
                                        <td class="status">
                                            <i class="fas fa-edit"></i> Edit
                                        </td>
                                        <td class="status">
                                            <i class="fas fa-trash"></i> Delete
                                        </td>
                                    @elseif ($topic->status == 3)
                                        <td class="status">
                                            <i class="fas fa-edit"></i> Edit
                                        </td>
                                        <td>
                                            <a class="delete" data-toggle="modal" href="#delete-{{$topic->id}}">
                                            <i class="fas fa-trash"></i> Delete
                                            </a>
                                            <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
                                            <div class="modal fade" id="delete-{{$topic->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header delete">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                            <h4 class="modal-title">Delete Confirmation</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <h5>Are you sure you want to delete this topic?</h5>
                                                        </div>
                                                        <div class="modal-footer">
                                                            {!! Form::open(['route' => ['create-topics.destroy', $topic->id], 'method' => 'DELETE']) !!}
                                                            <button type="submit" class="btn btn-danger mb-1">DELETE</button>
                                                            {!! Form::close() !!}
                                                            <button type="button" class="btn btn-light" data-dismiss="modal" >Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
                                        </td>
                                    @else
                                        <td><a class="edit" href="{{ route('create-topics.edit', $topic->id) }}">
                                            <i class="fas fa-edit"></i> Edit
                                            </a>
                                        </td>
                                        <td>
                                            <a class="delete" data-toggle="modal" href="#delete-{{$topic->id}}">
                                            <i class="fas fa-trash"></i> Delete
                                            </a>
                                            <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
                                            <div class="modal fade" id="delete-{{$topic->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header delete">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                            <h4 class="modal-title">Delete Confirmation</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <h5>Are you sure you want to delete this topic?</h5>
                                                        </div>
                                                        <div class="modal-footer">
                                                            {!! Form::open(['route' => ['create-topics.destroy', $topic->id], 'method' => 'DELETE']) !!}
                                                            <button type="submit" class="btn btn-danger mb-1">DELETE</button>
                                                            {!! Form::close() !!}
                                                            <button type="button" class="btn btn-light" data-dismiss="modal" >Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
                                        </td>
                                    @endif
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                    </table>
                <!-- END EXAMPLE TABLE PORTLET-->
                </div>
            </div>
            <!-- END PAGE CONTENT-->
        </div>
    </div>
@endsection
@section('scripts')
	<script type="text/javascript">
		$(document).ready(function() {
    		$("#message").fadeTo(2000, 500).slideUp(500, function(){
                $("#message").slideUp(500);
            });
		});
	</script>
@endsection
