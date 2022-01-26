@extends('layouts.admin')
@section('content')
<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card-box">
                    <h4>Tambah Todo</h4>

                    <div class="row">
                        <div class="col-lg-12">
                            <form action="{{ route("todo.update", $data->id) }}" method="POST">
                                <input type="hidden" name="_method" value="PUT">
                                @csrf
                                <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                                    <label for="title">Title*</label>
                                    <input type="text" id="title" name="title" class="form-control" value="{{ old('title', isset($data) ? $data->title : '') }}" required>
                                    @if($errors->has('title'))
                                        <em class="invalid-feedback">
                                            {{ $errors->first('title') }}
                                        </em>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="title">Detail</label>
                                    <input type="text" name="detail" class="form-control" value="{{ old('detail', isset($data) ? $data->detail : '') }}" required>
                                </div>
                                <div class="mt-3">
                                    <a href="{{ url()->previous() }}" class="btn btn-warning">
                                        <span class="fa fa-arrow-left"></span> 
                                         Kembali
                                    </a>
                                    <button class="btn btn-primary" type="submit">
                                        <span class="fa fa-plus-square"></span>
                                        Save
                                    </button> 
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</div>
@endsection