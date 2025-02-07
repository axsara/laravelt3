@extends('home.mainho')

@section('title', 'Edit - Manajement')

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

        <div class="card">
            <div class="card-header">
                <div class="pull-left">
                    <strong>Edit Mambers</strong>
                </div>
                <div class="pull-right">
                    <a href="{{ url('data') }}" class="btn btn-success btn-sm">
                        <i class="fa fa-plus"></i> back
                    </a>
                </div>
            </div>
            <div class="card-body">

                <div class="row">
                    <div class="col-md-4 offset-md-4">
                        <form action="{{ url('data/' . $data->id ) }}" method="POST">
                            @csrf
                            @method('patch')
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" name="name" class="form-control" value="{{ $data->name }}" placeholder="Enter Nama" autofocus required>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" value="{{ $data->email }}" placeholder="Enter Email" autofocus required>
                            </div>
                            <div class="form-group">
                                <label>Passowrd</label>
                                <input type="password" name="password" class="form-control" value="{{ $data->password }}" placeholder="Enter Password" autofocus required>
                            </div>
                                <button type="submit" class="btn btn-success">Simpan</button>
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