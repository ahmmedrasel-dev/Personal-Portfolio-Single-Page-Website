@extends('backend.master')
@section('project-active')
    active
    open
@endsection
@section('project-sub-active')
    active
@endsection
@section('content')
    <div class="page-inner" style="min-height:663px !important">
        <div class="page-title">
            <div class="page-breadcrumb">
                <ol class="breadcrumb">
                    <li><a href="{{ route('project.index') }}">Project</a></li>
                    <li class="active">Project Edit</li>
                </ol>
            </div>
        </div>
        <div id="main-wrapper">
            <div class="row">
                {{-- Category Add Form --}}
                <div class="col-md-12">
                    <div class="panel panel-white p-4">
                        <div class="panel-heading clearfix">
                            <h3 class="panel-title">Edit Experience</h3>
                        </div>
                        <div class="panel-body">
                            <form action="{{ route('project.update', $projects->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="from-row">
                                    <div class="form-group col-md-6">
                                        <label class="control-label">Select Category</label>
                                        <select name="category_id" id="category_id" class="form-control">
                                            <option value="">Select Category</option>
                                            @foreach ( $categories as  $category)
                                                <option @if ($category->id == $projects->category_id) selected @endif value="{{ $category->id }}">{{ $category->category_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="project_image">Choose Project Image File</label>
                                        <input type="file" class="form-control" name="project_image" id="project_image" onchange="preview_image()">
                                    </div>
                                </div>

                                <div class="from-row">
                                    <div class="form-group col-md-6">
                                        <label for="live_link">Live Website Link</label>
                                        <input type="text" class="form-control m-t-xxs" id="live_link" name="live_link" value="{{ $projects->live_link }}">
                                    </div>
                                </div>

                                <div class="from-row">
                                    <div class="form-group col-md-6">
                                        <label for="github_link">Github Project Link</label>
                                        <input type="text" class="form-control m-t-xxs" id="github_link" name="github_link" value="{{ $projects->github_link }}">
                                    </div>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-info">Update Project</button>
                                </div>
                            </form>
                        </div>

                        {{-- Error Message Dispaly --}}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div><!-- Main Wrapper -->
        <div class="page-footer">
            <p class="no-s">Made with <i class="fa fa-heart"></i> by rasel</p>
        </div>
    </div>
@endsection
