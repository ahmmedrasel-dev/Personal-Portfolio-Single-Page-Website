@extends('backend.master')
@section('social-active')
    active
    open
@endsection
@section('social-sub-active')
    active
@endsection
@section('content')
    <div class="page-inner" style="min-height:663px !important">
        <div class="page-title">
            <div class="page-breadcrumb">
                <ol class="breadcrumb">
                    <li><a href="{{ route('sociallink.index') }}">Socail Links</a></li>
                    <li class="active">Socail Link Edit</li>
                </ol>
            </div>
        </div>
        <div id="main-wrapper">
            <div class="row">
                {{-- Category Add Form --}}
                <div class="col-md-12">
                    <div class="panel panel-white p-4">
                        <div class="panel-heading clearfix">
                            <h3 class="panel-title">Edit Social Link</h3>
                        </div>
                        <div class="panel-body">
                            <form action="{{ route('sociallink.update', $sociallinks->id ) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="facebook">Facebook</label>
                                        <input type="text" class="form-control m-t-xxs" id="facebook" name="facebook" value="{{ $sociallinks->facebook }}">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="twitter">Twitter</label>
                                        <input type="text" class="form-control m-t-xxs" id="twitter" name="twitter" value="{{ $sociallinks->twitter }}">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="linkdin">Linkdin</label>
                                        <input type="text" class="form-control m-t-xxs" id="linkdin" name="linkdin" value="{{ $sociallinks->linkdin }}">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="instagram">Instagram</label>
                                        <input type="text" class="form-control m-t-xxs" id="instagram" name="instagram" value="{{ $sociallinks->instagram }}">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="github">Github</label>
                                        <input type="text" class="form-control m-t-xxs" id="github" name="github" value="{{ $sociallinks->github }}">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="behance">Behance</label>
                                        <input type="text" class="form-control m-t-xxs" id="behance" name="behance" value="{{ $sociallinks->behance }}">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="text-ceter col-md-6 col-md-offset-3 m-t-xs">
                                        <button type="submit" class="btn btn-info center btn-inline">Update Social Link</button>
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

