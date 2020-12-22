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
                                <h4 class="page-title">Transactions</h4>
                            </li>

                            <li class="breadcrumb-item active">Transactions Data</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Transactions</h2>
                            <ul class="header-dropdown m-r--5">
                                <div class="btn-group m-l-15">
                                    <a href="{{ route('transaction.create') }}">
                                        <button id="addRow" class="btn btn-info">
                                            Add Transaction
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </a>
                                </div>
                            </ul>
                        </div>
                        <form action="{{ route('transaction.search') }}" method="POST">
                            @csrf
                            <br>
                            <div class="container">
                                <div class="row">
                                    <div class="container-fluid">
                                        <div class="form-gorup row">
                                            <label for="date" class="col-form-label col-sm-2">Dimulai Tanggal</label>
                                            <div class="col-sm-3">
                                                <input type="date" class="form-control input-sm" id="daritanggal" name="daritanggal" required>
                                            </div>
                                            <label for="date" class="col-form-label col-sm-2">Sampai Tanggal</label>
                                            <div class="col-sm-3">
                                                <input type="date" class="form-control input-sm" id="sampaitanggal" name="sampaitanggal" required>
                                            </div>
                                            <div class="col-sm-2">
                                                <button type="submit" class="btn" name="search" title="Search">Search</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </form>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover save-stage dataTable"
                                       style="width:100%;" id="table_transaction">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Category Type</th>
                                        <th>Category</th>
                                        <th>Nominal</th>
                                        <th>Description</th>
                                        <th>created_at</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($datas as $data)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $data->category_type->name }}</td>
                                            <td>{{ $data->category->name }}</td>
                                            <td>{{ $data->nominal }}</td>
                                            <td>{{ $data->description }}</td>
                                            <td>{{ $data->date }}</td>
                                            <td>
                                                <a href="{{ route('transaction.edit', $data->id) }}"
                                                   class="btn tblActnBtn"><i class="material-icons">mode_edit</i></a>
                                                <a href="{{ route('transaction.destroy', $data->id) }}"
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
