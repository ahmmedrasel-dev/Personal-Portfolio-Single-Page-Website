@extends('backend.master')
@section('service-active')
    active
    open
@endsection
@section('service-sub-active')
    active
@endsection
@section('content')
    <div class="page-inner" style="min-height:663px !important">
        <div class="page-title">
            <div class="page-breadcrumb">
                <ol class="breadcrumb">
                    <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="active">Service</li>
                </ol>
            </div>
        </div>
        <div id="main-wrapper">
            <div class="row">
                {{-- Category List View --}}
                <div class="col-md-8">
                    <div class="panel panel-white p-4">
                        <div class="panel-heading clearfix">
                            <h4 class="panel-title">Service List</h4>
                        </div>
                        <div class="panel-body">
                            <table id="datatable" class="table display">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Name</th>
                                        <th>Summary</th>
                                        <th>Icon</th>
                                        <th width="150">Action</th>
                                </thead>

                                <tbody>
                                    @foreach ( $services as $key => $service )
                                        <tr>
                                            <td>{{ $key + 1}}</td>
                                            <td>{{ $service->title }}</td>
                                            <td>{{ $service->summary }}</td>
                                            <td>{{ $service->icon }}</td>
                                            <td>
                                                <form action="{{ route('service.destroy', $service->id) }}" method="POST">
                                                    <a href="{{ route('service.edit', $service->id) }}" class="btn btn-info">Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button  class="btn btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                {{-- Category Add Form --}}
                <div class="col-md-4">
                    <div class="panel panel-white p-4">
                        <div class="panel-heading clearfix">
                            <h3 class="panel-title">Add Service</h3>
                        </div>
                        <div class="panel-body">
                            <form action="{{ route('service.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="skill_name">Service Name</label>
                                    <input type="text" class="form-control m-t-xxs" id="title" name="title" placeholder="Enter  Service Name">
                                </div>

                                <div class="form-group">
                                    <label for="icon">Service Icon</label>
                                    <input type="text" class="form-control m-t-xxs" id="icon" name="icon" placeholder="fas fa-facebook">
                                </div>

                                <div class="form-group">
                                    <label class="control-label" for="summary">Service Sumamry</label>
                                    <textarea class="form-control m-t-xxs" name="summary" id="summary">Write Short Summary...</textarea>
                                </div>

                                <button type="submit" class="btn btn-info">Save Service</button>
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

<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<script>
    var options = {
      filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
      filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
      filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
      filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
    };

    CKEDITOR.replace('summary', options);
  </script>
@endsection
