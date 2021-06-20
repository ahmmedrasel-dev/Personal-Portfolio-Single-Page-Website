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
                    <li class="active">Education Edit</li>
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
                            <form action="{{ route('education.update', $educations->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="about_title">Education Title</label>
                                        <input type="text" class="form-control m-t-xxs" id="title" name="title" value="{{ $educations->title }}">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="about_title">Education Sub Title</label>
                                        <input type="text" class="form-control m-t-xxs" id="sub_title" name="sub_title" value="{{ $educations->sub_title }}">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="icon">Add Icon(font-awesome-icon)</label>
                                        <input type="text" name="icon" class="form-control m-t-xxs" id="icon" value="{{ $educations->icon }}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="year">Passing Year</label>
                                        <input type="text" class="form-control m-t-xxs" name="year" id="year" value="{{ $educations->year }}">
                                    </div>
                                </div>
                               <div class="form-row">
                                    <div class="text-ceter col-md-6 col-md-offset-3">
                                        <button type="submit" class="btn btn-info center btn-inline">Update Education</button>
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
@section('footer_js')
    <script type="text/javascript">
        // Data Table
        $(document).ready(function() {
            $('#datatable').DataTable();
            //Buttons examples
            var table = $('#datatable-buttons').DataTable({
                lengthChange: false,
                buttons: ['copy', 'excel', 'pdf', 'colvis']
            });

            table.buttons().container().appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');

        } );
      </script>
@endsection
