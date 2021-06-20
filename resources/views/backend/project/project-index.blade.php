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
                    <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="active">Project</li>
                </ol>
            </div>
        </div>
        <div id="main-wrapper">
            <div class="row">
                {{-- Category List View --}}
                <div class="col-md-8">
                    <div class="panel panel-white p-4">
                        <div class="panel-heading clearfix">
                            <h4 class="panel-title">All Project</h4>
                        </div>
                        <div class="panel-body">
                            <table id="datatable" class="table display">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Category</th>
                                        <th>Project Image</th>
                                        <th>Live Link</th>
                                        <th>Github Link</th>
                                        <th width="180">Action</th>
                                </thead>

                                <tbody>
                                    @foreach ( $projects as $key => $project )
                                        <tr>
                                            <td>{{ $key + 1}}</td>
                                            <td>{{ $project->Category->category_name ?? 'NA'}}</td>
                                            <td><img class="img-fluid" width="10%" src="{{ asset('images/projects/'.$project->created_at->format('Y/m/').$project->id.'/'.$project->project_image) }}" alt=""></td>
                                            <td>{{ $project->live_link }}</td>
                                            <td>{{ $project->github_link }}</td>
                                            <td>
                                                <form action="{{ route('project.destroy', $project->id) }}" method="POST">
                                                    <a href="{{ route('project.edit', $project->id) }}" class="btn btn-info">Edit</a>
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

                {{-- Project Add Form --}}
                <div class="col-md-4">
                    <div class="panel panel-white p-4">
                        <div class="panel-heading clearfix">
                            <h3 class="panel-title">Add Project</h3>
                        </div>
                        <div class="panel-body">
                            <form action="{{ route('project.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="from-row">
                                    <div class="form-group">
                                        <label class="control-label">Select Category</label>
                                        <select name="category_id" id="category_id" class="form-control">
                                            <option value="">Select Category</option>
                                            @foreach ( $categories as  $category)
                                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="project_image">Chose Banner Photo</label>
                                        <input type="file" class="form-control" name="project_image" id="project_image" onchange="preview_image()">
                                    </div>
                                </div>

                                <div class="from-row">
                                    <div class="form-group">
                                        <label for="live_link">Live Website Link</label>
                                        <input type="text" class="form-control m-t-xxs" id="live_link" name="live_link" placeholder="Enter Live Website Url">
                                    </div>
                                </div>

                                <div class="from-row">
                                    <div class="form-group">
                                        <label for="github_link">Github Project Link</label>
                                        <input type="text" class="form-control m-t-xxs" id="github_link" name="github_link" placeholder="Enter  Category Name">
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-info">Save Project</button>
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
