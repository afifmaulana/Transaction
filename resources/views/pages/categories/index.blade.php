@extends('welcome')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                @if($message = Session::get('create'))
                    <div class="alert alert-success alert-dismissible mb-2" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        {{$message}}
                    </div>
                @endif

                @if($message = Session::get('update'))
                    <div class="alert alert-success alert-dismissible mb-2" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        {{$message}}
                    </div>
                @endif

                @if($message = Session::get('delete'))
                    <div class="alert alert-success alert-dismissible mb-2" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        {{$message}}
                    </div>
                @endif
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <ul class="breadcrumb breadcrumb-style ">
                            <li class="breadcrumb-item">
                                <h4 class="page-title">Categories</h4>
                            </li>

                            <li class="breadcrumb-item active">Categories Data</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #START# Table With State Save -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Categories</h2>
                            <ul class="header-dropdown m-r--5">
                                <div class="btn-group m-l-15">
                                    <a href="{{ route('category.create') }}">
                                        <button id="addRow" class="btn btn-info">
                                            Add Category
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </a>
                                </div>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover save-stage dataTable"
                                       style="width:100%;">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Category Type</th>
                                        <th>Category Name</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($categories as $category)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $category->category_type->name }}</td>
                                            <td>{{ $category->name }}</td>
                                            <td>{{ $category->description }}</td>
                                            <td>
                                                <a href="{{ route('category.edit', $category->id) }}"
                                                   class="btn tblActnBtn"><i class="material-icons">mode_edit</i></a>
                                                <a href="{{ route('category.destroy', $category->id) }}"
                                                   onclick="return confirm('Apakah Anda akan menghapus data ini?')"
                                                   class="btn tblActnBtn danger"><i class="material-icons">delete</i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
