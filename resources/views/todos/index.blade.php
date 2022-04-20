<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>My Todos</title>
    </head>
    <body>
        <main>
            <header>
                <h1>Todos</h1>
            </header>
            <form action="{{route('todos.store')}}" method="post">
                @csrf

                <input type="text" name="title">
                <button>送信</button>
            </form>
            <form action="{{route('todos.done-delete')}}" method="post">
                @csrf
              <button onclick="return confirm('削除してもよろしいでしょうか')">完了したタスクを削除</button>

            </form>
            <ul>
                @foreach ($todos as $todo)
                <div>
                    <input type="checkbox" {{ $todo->is_done ? 'checked' : ''}} disabled/>
                    {{ $todo->title }}
                    <form action="{{route('todos.done',$todo->id)}}" method="post">
                        @csrf
                        <button>完了</button>
                    </form>
                    <form action="{{route('todos.destroy',$todo->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <button onclick="return confirm('削除してもよろしいでしょうか')">削除</button>
                    </form>
                </div>
                @endforeach

            </ul>
        </main>
    </body>
</html>
