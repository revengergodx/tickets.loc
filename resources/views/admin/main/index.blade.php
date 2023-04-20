@extends('admin.layouts.main')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Головна</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">Головна</li>
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
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ count(\App\Models\User::all()) }}</h3>

                                <p>Користувачі</p>
                            </div>
                            <div class="icon">
                                <i class="nav-icon fas fa-solid fa-users"></i>
                            </div>
                            <a href="{{ route('admin.user.index') }}" class="small-box-footer">Подробиці <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>{{ count(\App\Models\Ticket::all()) }}</h3>

                                <p>Tickets</p>
                            </div>
                            <div class="icon">
                                <i class="nav-icon fas fa-regular fa-clipboard"></i>
                            </div>
                            <a href="{{ route('admin.ticket.index') }}" class="small-box-footer">Подробиці <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{ count(\App\Models\Category::all()) }}</h3>

                                <p>Категорії</p>
                            </div>
                            <div class="icon">
                                <i class="nav-icon fas fa-solid fa-list"></i>
                            </div>
                            <a href="{{ route('admin.category.index') }}" class="small-box-footer">Подробиці <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{{ count(\App\Models\Label::all()) }}}</h3>

                                <p>Labels</p>
                            </div>
                            <div class="icon">
                                <i class="nav-icon fas fa-solid fa-tag"></i>
                            </div>
                            <a href="{{ route('admin.label.index') }}" class="small-box-footer">Подробиці <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
