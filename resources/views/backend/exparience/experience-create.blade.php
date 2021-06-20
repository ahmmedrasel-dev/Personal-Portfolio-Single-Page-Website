@extends('backend.master')
@section('experience-active')
    active
    open
@endsection
@section('experience-sub-active')
    active
@endsection
@section('content')
    <div class="page-inner" style="min-height:663px !important">
        <div class="page-title">
            <div class="page-breadcrumb">
                <ol class="breadcrumb">
                    <li><a href="{{ route('experience.index') }}">Experience</a></li>
                    <li class="active">Experience Create</li>
                </ol>
            </div>
        </div>
        <div id="main-wrapper">
            <div class="row">
                {{-- Category Add Form --}}
                <div class="col-md-12">
                    <div class="panel panel-white p-4">
                        <div class="panel-heading clearfix">
                            <h3 class="panel-title">Create Experience</h3>
                        </div>
                        <div class="panel-body">
                            <form action="{{ route('experience.store') }}" method="POST">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="institute_name">Institute Name</label>
                                        <input type="text" class="form-control m-t-xxs" id="institute_name" name="institute_name" placeholder="Enter  Institure Name">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="job_title">Job Title</label>
                                        <input type="text" class="form-control m-t-xxs" id="job_title" name="job_title" placeholder="Enter  Job Tttle">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="year">Job Period</label>
                                        <input type="text" class="form-control m-t-xxs" name="year" id="year" placeholder="End Job Period">
                                    </div>
                                </div>
                               <div class="form-row">
                                    <div class="text-ceter col-md-6 col-md-offset-3">
                                        <button type="submit" class="btn btn-info center btn-inline">Save Experience</button>
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
