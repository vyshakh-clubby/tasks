@extends('layouts.master')

@section('styles')

@endsection


@section('contents')
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
                            {!! Form::textarea('template',$templates['templates'],['class'=>'md-form-control md-static', 'rows'=>10, 'cols'=>4]) !!}
                            <label>Template </label>
                        </div>

                        <div class="md-group-add-on">
                            <button class="btn btn-outline-success import">Import & Save</button>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>

    </div>
@endsection


@section('scripts')
   {{-- <script src="{{ URL::to('assets/js/uploads/uploads.js') }}"></script>--}}
@endsection

