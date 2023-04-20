@extends('agent.layouts.main')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Редагування ticket</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('agent.main.index') }}">Головна</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('agent.ticket.index') }}">Ticket</a></li>
                            <li class="breadcrumb-item active">Редагування ticket</li>
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
                        <form
                            action="{{ route('agent.ticket.update', $ticket->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-group col-5">
                                <input type="text" class="form-control" name="title" placeholder="Title"
                                       value="{{ $ticket->title }}">
                                @error('title')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-12">
                                <textarea type="text" class="form-control" name="message"
                                          placeholder="Введіть ваш текст">{{ $ticket->message }}</textarea>
                                @error('content')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-10">
                                <label>Оберіть категорію</label>
                                <div>
                                    @foreach($categories as $category)
                                        <input type="checkbox" name="category_ids[]"
                                               value="{{ $category->id }}" @checked(old('categories') ? in_array($category->id, old('categories', [])) : $ticket->category->contains($category->id))>{{ $category->title }}
                                    @endforeach
                                    @error('category_id')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group col-10">
                                <label>Оберіть Label</label>
                                <div>
                                @foreach($labels as $label)
                                    <input type="checkbox" name="label_ids[]"
                                           value="{{ $label->id }}" @checked(old('labels') ? in_array($label->id, old('labels', [])) : $ticket->label->contains($label->id))>{{ $label->title }}
                                    @endforeach
                                    @error('tag_ids')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group col-4">
                            <label>Оберіть приорітет</label>
                            <select name="priority_id" class="form-control">
                                @foreach($priorities as $priority)
                                    <option value="{{ $priority->id }}" {{ $priority->id == $ticket->priority_id ? 'selected' : '' }}>{{ $priority->name }}</option>
                                @endforeach
                            </select>
                            </div>
                            <div>
                                <div class="form-group col-6">
                                    <div class="mb-3">
                                        <label for="formFileMultiple" class="form-label">Додайте ваші зображення</label>
                                        <input class="form-control" name="images[]" type="file" id="formFileMultiple" multiple>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <input type="submit" value="Редагувати"
                                       class="btn btn-block btn-info w-25">
                            </div>

                        </form>
                    </div>
                    <div class="col-12">
                        @if(count($ticket->images)>0)
                            <label>Прикріплені зображення:</label><br>
                            @foreach($ticket->images as $img)
                                <form action="{{route('agent.ticket.delete_image', $img->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn text-danger">x</button><br>
                                </form>
                                <img src="/images/{{$img->image}}" class="img-responsive mb-4" style="max-height:100px; max-width:100px" alt="" >
                            @endforeach
                        @endif
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
