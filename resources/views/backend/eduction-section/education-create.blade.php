@extends('backend.master')
@section('education-active')
    active
    open
@endsection
@section('education-sub-active')
    active
@endsection
@section('content')
    <div class="page-inner" style="min-height:663px !important">
        <div class="page-title">
            <div class="page-breadcrumb">
                <ol class="breadcrumb">
                    <li><a href="{{ route('education.index') }}">Education</a></li>
                    <li class="active">Education Create</li>
                </ol>
            </div>
        </div>
        <div id="main-wrapper">
            <div class="row">
                {{-- Category Add Form --}}
                <div class="col-md-12">
                    <div class="panel panel-white p-4">
                        <div class="panel-heading clearfix">
                            <h3 class="panel-title">Create Education</h3>
                        </div>
                        <div class="panel-body">
                            <form action="{{ route('education.store') }}" method="POST">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="about_title">Education Title</label>
                                        <input type="text" class="form-control m-t-xxs" id="title" name="title" placeholder="Enter  Education Tttle">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="about_title">Education Sub Title</label>
                                        <input type="text" class="form-control m-t-xxs" id="sub_title" name="sub_title" placeholder="Enter  Education Sub Tttle">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="icon">Add Icon(font-awesome-icon)</label>
                                        <input type="text" name="icon" class="form-control m-t-xxs" id="icon" placeholder="Write Font-awesome Class Name">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="year">Passing Year</label>
                                        <input type="text" class="form-control m-t-xxs" name="year" id="year" placeholder=" Passing Year">
                                    </div>
                                </div>
                               <div class="form-row">
                                    <div class="text-ceter col-md-6 col-md-offset-3">
                                        <button type="submit" class="btn btn-info center btn-inline">Create Education</button>
                                    </div>
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
