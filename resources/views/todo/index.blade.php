@extends('layouts.admin')
@section('content')
<div class="pagetitle">
    <h1>Todo Page</h1>
    {{-- <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item">Pages</li>
            <li class="breadcrumb-item active">Blank</li>
        </ol>
    </nav> --}}
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Table Todo</h5>
                    <div class="row mb-5">
                        <div class="col-lg-12">
                            <a class="btn btn-success" href="{{ route("todo.create") }}">
                              Tambah Todo
                            </a>
                        </div>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Detail</th>
                                <th scope="col">Status</th>
                                <th>Change Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($datas as $key => $data)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $data->title }}</td>
                                <td>{{ $data->detail }}</td>
                                <td>{{ $data->status }}</td>
                                <td>
                                    @if($data->status == 'waiting')
                                        <form action="{{ route('todo.mark.onprocess', $data->id) }}" method="POST" onsubmit="return confirm('Are You Sure ? ');" style="display: inline-block;">
                                            <input type="hidden" name="_method" value="PUT">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="submit" class="btn btn-xs btn-warning" value="Make On Process">
                                        </form>
                                    @elseif($data->status == 'On Process')
                                        <form action="{{ route('todo.mark.done', $data->id) }}" method="POST" onsubmit="return confirm('Are You Sure ? ');" style="display: inline-block;">
                                            <input type="hidden" name="_method" value="PUT">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="submit" class="btn btn-xs btn-danger" value="Make Done">
                                        </form>
                                    @else
                                        <span class="btn btn-xs btn-success">
                                            {{ $data->status }}
                                        </span>
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-xs btn-info" href="{{ route('todo.edit', $data->id) }}">
                                        Edit
                                    </a>

                                    <form action="{{ route('todo.destroy', $data->id) }}" method="POST" onsubmit="return confirm('Are You Sure ? ');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="Delete">
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection