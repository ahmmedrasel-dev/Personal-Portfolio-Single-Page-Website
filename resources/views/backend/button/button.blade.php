@extends('backend.master')
@section('banner-active')
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
                {{-- Category List View --}}
                <div class="col-md-8">
                    <div class="panel panel-white p-4">
                        <div class="panel-heading clearfix">
                            <h4 class="panel-title">Button List</h4>
                        </div>
                        <div class="panel-body">
                            <table id="datatable" class="table">
                                <thead>
                                    <tr>
                                        <th scope="col" width="5%">SL</th>
                                        <th scope="col" width="15%">Button Name</th>
                                        <th scope="col" width="15%">Button Link</th>
                                        <th scope="col" width="5%">Button Icon</th>
                                        <th scope="col" width="20%">Button Status</th>
                                        <th scope="col" width="30%">Action</th>
                                </thead>

                                <tbody>
                                    @foreach ( $buttons as $key => $button )
                                        <tr>
                                            <td>{{ $key + 1}}</td>
                                            <td>{{ $button->button_name }}</td>
                                            <td>{{ $button->button_link }}</td>
                                            <td><i class="{{ $button->button_icon }}"></i></td>
                                            <td>
                                                @if ($button->button_status == 1 )
                                                    <button class="btn btn-danger">Deactive</button>
                                                @else
                                                    <button class="btn btn-success">Active</button>
                                                @endif

                                            </td>
                                            <td>
                                                @if ( $button->button_status == 1 )
                                                    <a href="{{ route('buttonEdit', $button->id ) }}" class="btn btn-info">Edit</a>
                                                    <a href="{{ route('buttonDelete', $button->id ) }}" class="btn btn-danger">Delete</a>
                                                @else
                                                    <button class="btn btn-danger" disabled>Not Applicable</button>
                                                @endif

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
                            <h3 class="panel-title">Button Create</h3>
                        </div>
                        <div class="panel-body">
                            <form action="{{ route('buttonStore') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="button">Button Name</label>
                                    <input type="text" class="form-control m-t-xxs" id="button_name" name="button_name" placeholder="Write Button Name">
                                </div>

                                <div class="form-group">
                                    <label>Button Link</label>
                                    <input type="text" class="form-control m-t-xxs" id="button_link" name="button_link" placeholder="Enter Button Link">
                                </div>

                                <div class="form-group">
                                    <label>Button Icon (font awesome icon class name)</label>
                                    <input type="text" class="form-control m-t-xxs" id="button_icon" name="button_icon" placeholder="fa fa-facebook">
                                </div>
                                <button type="submit" class="btn btn-info">Save Button</button>
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

        // Add Permalink Slug.
        $('#category').keyup(function() {
            $('#slug').val($(this).val().toLowerCase().split(',').join('').replace(/\s/g,"-"));
        });

    </script>
@endsection
