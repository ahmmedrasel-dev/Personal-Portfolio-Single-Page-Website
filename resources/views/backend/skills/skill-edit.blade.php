@extends('backend.master')
@section('skill-active')
    active
    open
@endsection
@section('skill-sub-active')
    active
@endsection
@section('content')
    <div class="page-inner" style="min-height:663px !important">
        <div class="page-title">
            <div class="page-breadcrumb">
                <ol class="breadcrumb">
                    <li><a href="{{ route('skill.index') }}">Skills</a></li>
                    <li class="active">Skill Edit</li>
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
                            <form action="{{ route('skill.update', $skills->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="control-label" for="skill_name">Skill Name</label>
                                        <input type="text" class="form-control" id="skill_name" name="skill_name" value="{{ $skills->skill_name }}">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label class="control-label">Skill Percentage</label>
                                        <select name="skill_percentage" id="skill_percentage" class="form-control">
                                            <option value="">Select Percentage</option>
                                            @for ($i=40; $i <= 100; $i +=1)
                                                @if ($i % 3 == 0)
                                                    <option @if ($skills->skill_percentage == $i )
                                                        selected
                                                    @endif value="{{ $i }}">{{ $i }}</option>
                                                @endif
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                               <div class="form-row">
                                    <div class="text-ceter col-md-6 col-md-offset-3">
                                        <button type="submit" class="btn btn-info center btn-inline">Update Skill</button>
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
