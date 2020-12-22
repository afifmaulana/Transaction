@extends('welcome')
@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <ul class="breadcrumb breadcrumb-style ">
                            <li class="breadcrumb-item">
                                <h4 class="page-title">Add Category</h4>
                            </li>
                            <li class="breadcrumb-item active">Add</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Basic Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Add Category</h2>
                        </div>
                        <div class="body">
                            <form id="form_validation" method="POST" action="{{ route('category.store') }}">
                                @csrf

                                <div class="form-group">
                                    <label>Category Type</label>
                                    <select class="form-control {{$errors->has('category_type_id')?'is-invalid':''}}"
                                         name="category_type_id" value="{{old('category_type_id')}}">
                                        @foreach($datas as $data)
                                            <option value="{{$data->id}}">{{$data->name}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('category_type_id'))
                                            <span class="invalid-feedback" role="alert">
                                                        <p><b>{{ $errors->first('category_type_id') }}</b></p>
                                                    </span>
                                        @endif
                                </div>

                                <div class="form-group form-float">
                                    <label class="form-label">Category Name</label>
                                    <div class="form-line">
                                        <input type="text" class="form-control {{$errors->has('name')?'is-invalid':''}}"
                                               name="name" required placeholder="Input Category Name"
                                               value="{{old('name')}}">
                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                                        <p><b>{{ $errors->first('name') }}</b></p>
                                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <label class="form-label">Category Description</label>
                                    <div class="form-line">
                                        <input type="text" class="form-control {{$errors->has('description')?'is-invalid':''}}"
                                               name="description" required placeholder="Input Category Description"
                                               value="{{old('description')}}">
                                        @if ($errors->has('description'))
                                            <span class="invalid-feedback" role="alert">
                                                        <p><b>{{ $errors->first('description') }}</b></p>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <button class="btn btn-primary waves-effect" type="submit">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
