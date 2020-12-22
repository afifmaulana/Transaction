@extends('welcome')
@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <ul class="breadcrumb breadcrumb-style ">
                            <li class="breadcrumb-item">
                                <h4 class="page-title">Edit Transaction</h4>
                            </li>
                            <li class="breadcrumb-item active">Edit</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Basic Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Edit Transaction</h2>
                        </div>
                        <div class="body">
                            <form id="form_validation" method="POST" action="{{ route('transaction.update', $transaction->id) }}">
                                @csrf
                                {{method_field('PATCH')}}
                                <div class="form-group">
                                    <label>Category Type</label>
                                    <select class="form-control {{$errors->has('category_type_id')?'is-invalid':''}}"
                                         name="category_type_id" value="{{old('category_type_id')}}">
                                        @foreach($category_types as $category_type)
                                        <option value="{{$category_type->id}}" {{$transaction->category_type_id === $category_type->id ? 'selected' : ''}}>
                                            {{$category_type->name}}
                                        </option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('category_type_id'))
                                            <span class="invalid-feedback" role="alert">
                                                        <p><b>{{ $errors->first('category_type_id') }}</b></p>
                                                    </span>
                                        @endif
                                </div>

                                <div class="form-group">
                                    <label>Category</label>
                                    <select class="form-control {{$errors->has('category_id')?'is-invalid':''}}"
                                         name="category_id" value="{{old('category_id')}}">
                                        @foreach($categories as $category)
                                        <option value="{{$category->id}}" {{$transaction->category_id === $category->id ? 'selected' : ''}}>
                                            {{$category->name}}
                                        </option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('category_id'))
                                            <span class="invalid-feedback" role="alert">
                                                        <p><b>{{ $errors->first('category_id') }}</b></p>
                                                    </span>
                                        @endif
                                </div>
                                <div class="form-group form-float">
                                    <label class="form-label">Nominal</label>
                                    <div class="form-line">
                                        <input type="numeric" class="form-control {{$errors->has('nominal')?'is-invalid':''}}"
                                               name="nominal" required placeholder="Input Nominal Transaction"
                                               value="{{$transaction->nominal}}">
                                        @if ($errors->has('nominal'))
                                            <span class="invalid-feedback" role="alert">
                                                        <p><b>{{ $errors->first('nominal') }}</b></p>
                                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <label class="form-label">Description</label>
                                    <div class="form-line">
                                        <input type="text" class="form-control {{$errors->has('description')?'is-invalid':''}}"
                                               name="description" required placeholder="Input Description"
                                               value="{{$transaction->description}}">
                                        @if ($errors->has('description'))
                                            <span class="invalid-feedback" role="alert">
                                                        <p><b>{{ $errors->first('description') }}</b></p>
                                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <label class="form-label">Date</label>
                                    <div class="form-line">
                                        <input type="date" class="form-control {{$errors->has('date')?'is-invalid':''}}"
                                               name="date" required placeholder="Input date"
                                               value="{{old('date')}}">
                                        @if ($errors->has('date'))
                                            <span class="invalid-feedback" role="alert">
                                                        <p><b>{{ $errors->first('date') }}</b></p>
                                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <button class="btn btn-primary waves-effect" type="submit">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
