@extends('backend.master')
@section('contact-active')
    active
    open
@endsection
@section('contact-sub-active')
    active
@endsection
@section('content')
    <div class="page-inner" style="min-height:663px !important">
        <div class="page-title">
            <div class="page-breadcrumb">
                <ol class="breadcrumb">
                    <li><a href="{{ route('contactIndex') }}">Contact</a></li>
                    <li class="active">Contact Edit</li>
                </ol>
            </div>
        </div>
        <div id="main-wrapper">
            <div class="row">
                {{-- Category Add Form --}}
                <div class="col-md-12">
                    <div class="panel panel-white p-4">
                        <div class="panel-heading clearfix">
                            <h3 class="panel-title">Edit Contact</h3>
                        </div>
                        <div class="panel-body">
                            <form action="{{ route('contactUpdate') }}" method="POST">
                                @csrf
                                <input type="hidden" name="contact_id" value="{{ $contact->id }}">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="phone_one">Phone Number One</label>
                                        <input type="text" class="form-control m-t-xxs" id="phone_one" name="phone_one" value="{{ $contact->phone_one }}">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="phone_two">Phone Number Two</label>
                                        <input type="text" class="form-control m-t-xxs" id="phone_two" name="phone_two" value="{{ $contact->phone_two }}">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="email_one">Email Address Two</label>
                                        <input type="email" class="form-control m-t-xxs" name="email_one" id="email_one" value="{{ $contact->email_one }}">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="email_two">Email Address One</label>
                                        <input type="email" name="email_two" class="form-control m-t-xxs" id="email_two" value="{{ $contact->email_two }}">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="address">Home Address</label>
                                        <textarea class="form-control" name="address" id="address" cols="30" rows="10">{{ $contact->address }}</textarea>
                                    </div>
                                </div>
                               <div class="form-row">
                                    <div class="text-ceter col-md-6 col-md-offset-3">
                                        <button type="submit" class="btn btn-info center btn-inline">Update Contact</button>
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
