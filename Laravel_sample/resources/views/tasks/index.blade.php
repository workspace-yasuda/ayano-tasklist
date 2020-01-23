@extends('layouts.app')
@section('content')

@include('commons.errors')

<div class="container">
  <div class="col-sm-offset-2 col-sm-8">
    <div class="panel panel-default">
      <div class="panel-heading">
        新規タスク
      </div>

      <div class="panel-body">

          <!-- 新規タスク入力フォーム -->

          <form class="form-horizontal" action="/tasks" method="post">

            {{csrf_field()}}

          <!-- 内容入力エリア -->

          <div class="form-group">
            <label for="task" class="col-sm-3 control-label">内容を入力して下さい</label>
            <div class="col-sm-6">
              <input type="text" name="title" id="task-name" class="form-control">
            </div>

          </div>
          <!-- タスク追加ボタン -->
          <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
              <button type="submit" class="btn btn-default">
                <i class="fa fa-plus"></i>タスクを追加
              </button>

            </div>

          </div>
        </form>

      </div>

    </div>
    <!-- 登録済タスク一覧 -->

    @if (count($tasks)>0)
    <div class="panel-default">
    <div class="panel-heading">
      現在のタスク
    </div>
    <div class="panel-body">
      <table class="table-striped task-table">

        <thead>
          <th>Task</th>
          <th>&nbsp;</th>
        </thead>

        <tbody>
          @foreach($tasks as $task)
          <tr>
            <!-- タスク名 -->
            <td class="table-text">
                <div>{{$task->title}}</div>
            </td>
            <td>

              <!-- タスク削除ボタン -->
                <form action="/tasks/{{$task->id}}" method="post">
                  {{method_field('DELETE')}}

                  {{csrf_field()}}

                  <button type="submit" class="btn btn-danger">
                    <i class="fa fa-trash"></i>削除
                  </button>
                </form>
            </td>
          </tr>

          @endforeach
        </tbody>
      </table>
    </div>
    </div>
    @endif

  </div>

</div>

@endsection
