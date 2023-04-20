@extends('agent.layouts.main')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6 d-flex align-items-center">
                        <h1 class="m-0 mr-4">{{ $ticket->title }}</h1>
                        <a href="{{ route('agent.ticket.edit', $ticket->id) }}" class="text-success"><i
                                class="fas fa-solid fa-pen"></i></a>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('agent.main.index') }}">Головна</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('agent.ticket.index') }}">Пости</a></li>
                            <li class="breadcrumb-item active">{{ $ticket->title }}</li>
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
                    <div class="col-8">
                        <div class="card">
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <tbody>
                                    <tr>
                                        <td>Назва</td>
                                        <td>{{$ticket->title}}</td>
                                    </tr>
                                    <tr>
                                        <td>Текст</td>
                                        <td>{{$ticket->message}}</td>
                                    </tr>
                                    <tr>
                                        <td>Статус</td>
                                        <td>{{$ticket->status}}</td>
                                    </tr>
                                    <tr>
                                        <td>Прікріплені файли</td>
                                        <td>
                                            @foreach($ticket->images as $img)
                                                <img src="/images/{{$img->image}}" class="img-responsive" style="max-height:100px; max-width:100px" alt="" >
                                            @endforeach
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card --><!-- ======= Comments ======= -->
                        <div class="comments">
                            <h5 class="comment-title py-4">Коментарі ({{ $ticket->comments->count() }})</h5>
                            <div class="comment d-flex mb-4">
                                <div class="flex-grow-1 ms-2 ms-sm-3">
                                    @foreach($ticket->comments as $comment)
                                        <div class="comment-meta d-flex align-items-baseline">
                                            <h6 class="me-2 mr-3 text-bold">{{ $comment->user->name }}</h6>
                                            <span
                                                class="text-muted">{{ $comment->dateAsCarbon->diffForHumans() }}</span>
                                        </div>
                                        <div class="comment-body">
                                            {{ $comment->message }}
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div><!-- End Comments -->
                        <!-- ======= Comments Form ======= -->
                        <div class="row justify-content-center mt-5">

                            <div class="col-lg-12">
                                <h5 class="comment-title">Залишити коментар</h5>
                                <form action="{{ route('agent.comment.store', $ticket->id) }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12 mb-3">
                                                <textarea name="message" class="form-control" id="message"
                                                          placeholder="Введіть ваш коментар" cols="30"
                                                          rows="10"></textarea>
                                        </div>
                                        <div class="col-12">
                                            <input type="submit" class="btn btn-primary" value="Відправити">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div><!-- End Comments Form -->
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
