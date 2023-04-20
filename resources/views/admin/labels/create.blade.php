@extends('admin.layouts.main')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{ isset($label) ? 'Редагувати Label' : 'Додавання Label'}}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Головна</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.label.index') }}">Labels</a></li>
                            <li class="breadcrumb-item active">Додавання Label</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-4">
                        <form action="{{ isset($label) ? route('admin.label.update', $label->id) : route('admin.label.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control" name="title" placeholder="Назва Label" value="{{ isset($label)? $label->title : null}}">
                                @error('title')
                                <div class="text-danger">Це поле необхідно заповнити</div>
                                @enderror
                            </div>
                            <input type="submit" value="{{ isset($label) ? 'Редагувати' : 'Додати' }}" class="btn btn-block btn-info">
                        </form>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection
