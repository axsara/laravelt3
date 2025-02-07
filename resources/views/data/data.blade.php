@extends('home.mainho')

@section('title', 'Dasboard')

@section('breadcrumbs')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Dashboard</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active"><i class="fa fa-dashboard"></i></li>
                </ol>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="content mt-3">
    <div class="animates fadeIn">

        @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

        <div class="card">
            <div class="card-header">
                <div class="pull-left">
                    <strong>Account Mambers</strong>
                </div>
                <div class="pull-right">
                    <a href="{{ url('data/add') }}" class="btn btn-success btn-sm">
                        <i class="fa fa-plus"></i> Add
                    </a>
                </div>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Opsi</th>
                        </tr>
                    </tbody>
        
                    @foreach ($data as $isi)
                        <tr>
                            <td>{{ $loop -> iteration }}</td>
                            <td>{{ $isi -> name }}</td>
                            <td>{{ $isi -> email }}</td>
                            <td class="text-center">
                                <div>
                                    <a href="{{ url('data/edit/' . $isi->id) }}" class="btn-primary btn-sm">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <form action="{{ url('data/' . $isi->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin Hapus Akun?')">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                    
                                </div>
                                
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>

    </div>

</div>
@endsection