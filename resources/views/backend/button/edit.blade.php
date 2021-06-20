@extends('backend.master')
@section('button-active')
    active
    open
@endsection
@section('button-sub-active')
    active
@endsection
@section('content')
    <div class="page-inner" style="min-height:663px !important">
        <div class="page-title">
            <div class="page-breadcrumb">
                <ol class="breadcrumb">
                    <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="active">Button</li>
                </ol>
            </div>
        </div>
        <div id="main-wrapper">
            <div class="row">
                {{-- Category Add Form --}}
                <div class="col-md-6 col-md-offset-3">
                    <div class="panel panel-white p-4">
                        <div class="panel-heading clearfix">
                            <h3 class="panel-title">Button Create</h3>
                        </div>
                        <div class="panel-body">
                            <form action="{{ route('buttonUpdate') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $button->id }}">
                                <div class="form-group">
                                    <label for="button">Button Name</label>
                                    <input type="text" class="form-control m-t-xxs" id="button_name" name="button_name" value="{{ $button->button_name }}">
                                </div>

                                <div class="form-group">
                                    <label>Button Link</label>
                                    <input type="text" class="form-control m-t-xxs" id="button_link" name="button_link" value="{{ $button->button_link }}">
                                </div>

                                <div class="form-group">
                                    <label>Button Icon (font awesome icon class name)</label>
                                    <input type="text" class="form-control m-t-xxs" id="button_icon" name="button_icon" value="{{ $button->button_icon }}">
                                </div>
                                <button type="submit" class="btn btn-info">Update Button</button>
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
