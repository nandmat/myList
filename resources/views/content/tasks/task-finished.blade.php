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
                  <a href="{{ route('index') }}" class="btn btn-warning">Voltar</a>
                </div>

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
                    <td><a href="{{ route('backTasks', ['id' => $task->id]) }}" class="btn btn-primary">Retomar</a></td>
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
