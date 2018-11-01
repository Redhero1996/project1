@extends('master')

@section('title', 'All Topics')

@section('content')
    <div class="card">
        <div class="card-body">
            <h3 class="page-title">Manage Topics</h3>
            <!-- BEGIN PAGE CONTENT-->
            <div class="row">
                <div class="col-md-12">
                    @if(Session::has('success'))
                        <div class="portlet-title">
                            <div class="alert alert-success">
                                {!! Session::get('success') !!}
                            </div>
                        </div>
                    @endif
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div class="portlet box blue-hoki">
                        <div class="portlet-title">
                            <div class="caption mb-2">
                                <i class="fa fa-globe"></i>All topics
                            </div>
                            <div class="tools">
                            </div>
                        </div>
                        <div class="portlet-body">
                            <table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th class="th-sm">#ID
                                    <i class="fa fa-sort float-right" aria-hidden="true"></i>
                                </th>
                                <th class="th-sm">Name
                                    <i class="fa fa-sort float-right" aria-hidden="true"></i>
                                </th>
                                <th class="th-sm">Status
                                    <i class="fa fa-sort float-right" aria-hidden="true"></i>
                                </th>
                                <th class="th-sm">View
                                    <i class="fa fa-sort float-right" aria-hidden="true"></i>
                                </th>
                                <th class="th-sm">Edit
                                    <i class="fa fa-sort float-right" aria-hidden="true"></i>
                                </th>
                                <th class="th-sm">Delete
                                    <i class="fa fa-sort float-right" aria-hidden="true"></i>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach( $topics as $topic )
                                <tr>
                                    <td>{{ $topic->id }}</td>
                                    <td>{{ $topic->name }}</td>
                                    <td>{!! $topic->status == 1 ? '<span class="badge badge-primary">Publish</span>' : 
                                        ( $topic->status == 0 ? '<span class="badge badge-warning">Pending</span>' : 
                                        ( $topic->status == 2 ? '<span class="badge badge-default">Need to edit</span>' : 
                                        '<span class="badge badge-danger">Close</span>' )) !!}</td>
                                    <td><a class="show" href="{{ route('topics.show', $topic->slug) }}">
                                        <i class="far fa-eye"></i> View
                                        </a>
                                    </td>
                                    <td><a class="edit" href="{{ route('topics.edit', $topic->slug) }}">
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
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        <h4 class="modal-title">Delete Confirmation</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h5>Are you sure you want to delete this topic?</h5>
                                                    </div>
                                                    <div class="modal-footer">
                                                        {!! Form::open(['route' => ['topics.destroy', $topic->id], 'method' => 'DELETE']) !!}
                                                        <button type="submit" class="btn btn-danger mb-1">DELETE</button>
                                                        {!! Form::close() !!}
                                                        <button type="button" class="btn btn-light" data-dismiss="modal" >Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE PORTLET-->
                </div>
            </div>
            <!-- END PAGE CONTENT-->
        </div>
    </div>
@endsection