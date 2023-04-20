@extends('admin.layouts.main')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Tickets</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Головна</a></li>
                            <li class="breadcrumb-item active">Ticket</li>
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
                    <div class="col-1 mb-4">
                        <a href="{{ route('admin.ticket.create') }}" class="btn btn-block btn-info">Додати</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Заголовок</th>
                                        <th>Опис</th>
                                        <th>Статус</th>
                                        <th>Пріорітет</th>
                                        <th colspan="3">Дії</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($tickets as $ticket)
                                        <tr>
                                            <td>{{$ticket->id}}</td>
                                            <td>{{$ticket->title}}</td>
                                            <td>{{ \Illuminate\Support\Str::of($ticket->message)->limit(20)}}</td>
                                            <td>{{$ticket->status}}</td>
                                            <td>{{$ticket->priority->name}}</td>
                                            <td><a href="{{ route('admin.ticket.show', $ticket->id) }}"><i
                                                        class="fas fa-solid fa-eye"></i></a>
                                            </td>
                                            <td><a class="text-success border-0 bg-transparent" href="{{ route('admin.ticket.edit', $ticket->id) }}"><i
                                                        class="fas fa-solid fa-pen"></i></a>
                                            </td>
                                            <td>
                                                <form action="{{ route('admin.ticket.delete', $ticket->id) }}"
                                                      method="POST">
                                                    @csrf
                                                    @method('post')
                                                    <button type="submit" class="text-danger border-0 bg-transparent">
                                                        <i class="fas fa-solid fa-trash" role="button"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection
