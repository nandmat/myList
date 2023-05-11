@extends('base')

@section('content')

<section class="vh-100" style="background-color: #eee;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-lg-9 col-xl-7">
          <div class="card rounded-3">
            <div class="card-body p-4">

              <h4 class="text-center my-3 pb-3">MyList - App</h4>

              <form action="{{ route('store') }}" method="post" class="row row-cols-lg-auto g-3 justify-content-center align-items-center mb-4 pb-2">
                @csrf
                <div class="col-12">
                  <div class="form-outline">
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if(session('danger'))
                            <div class="alert alert-danger">
                                {{ session('danger') }}
                            </div>
                        @endif
                    <input type="text" id="form1" class="form-control" name="tarefa" />
                    <label class="form-label" for="form1">Escreva uma tarefa</label>
                  </div>
                </div>

                <div class="col-12">
                  <button type="submit" class="btn btn-primary">Salvar</button>
                </div>

                <div class="col-12">
                  <a href="{{ route('viewTasksFinished') }}" class="btn btn-warning">Ver todas</a>
                </div>
              </form>

              <table class="table mb-4">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Tarefa</th>
                    <th scope="col">Status</th>
                    <th scope="col">Ações</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($tasks as $task)
                  <tr>
                    <th scope="row">{{ $task->id }}</th>
                    <td>{{ $task->tarefa }}</td>
                    <td>{{ $task->status }}</td>
                    <td>
                        <div style="display: flex;">
                            <form action="{{ route('destroy', ['id' => $task->id]) }}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger" type="submit">Apagar</button>
                            </form>
                            <form action="{{ route('finishedTask', ['id' => $task->id]) }}" method="post">
                                @csrf
                                <button class="btn btn-success ms-1" type="submit">Finalizar</button>
                            </form>
                        </div>
                    </td>
                  </tr>
                @endforeach
                </tbody>
              </table>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  @endsection
