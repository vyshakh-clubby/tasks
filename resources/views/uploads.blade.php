@extends('layouts.master')

@section('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/r/dt/dt-1.10.9/datatables.min.css"/>
@endsection



@section('contents')
    @csrf
    <div class="row">
        <!-- Form Control starts -->
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-header-text">Uploads</h5>
                    <div class="f-right">
                        <a href="" data-toggle="modal" data-target="#static-labels-Modal"><i class="icofont icofont-code-alt"></i></a>
                    </div>
                </div>

                <div class="card-block">
                    {!! Form::open(['url'=>'handleCsvUploads','class'=>'form-horizontal','enctype'=>'multipart/form-data', 'method'=>'POST', 'id'=>'uploadForm']) !!}
                        <div class="md-input-wrapper m-b-30">
                            <input type="file" name="file-import" class="md-form-control file">
                        </div>



                        <div class="md-input-wrapper">
                            {!! Form::text('template_id',null,['class'=>'template_id']) !!}
                            {!! Form::textarea('template',$templates['templates'],['class'=>'md-form-control md-static templates', 'rows'=>10, 'cols'=>4]) !!}
                            <label>Template </label>
                        </div>

                        <div class="md-group-add-on">
                            <button class="btn btn-outline-success import">Import & Save</button>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-header-text">Templates</h5>
                    <div class="f-right">
                        <a href="" data-toggle="modal" data-target="#static-labels-Modal"><i class="icofont icofont-code-alt"></i></a>
                    </div>
                </div>

                <div class="card-block">
                    <table id="template_list" class="display" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Sl.No</th>
                            <th>Template Name</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($templateList as $index=>$templates)
                                <tr>
                                    <td data-template="{{$templates['templates']}}" data-id = "{{$templates['id']}}">{{$index = $index+1}}</td>
                                    <td>{{$templates['template_name']}}</td>
                                </tr>

                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection


@section('scripts')
    <script type="text/javascript" src="https://cdn.datatables.net/r/dt/dt-1.10.9/datatables.min.js"></script>
    <script src="{{ URL::to('assets/js/uploads/uploads.js') }}"></script>

@endsection

