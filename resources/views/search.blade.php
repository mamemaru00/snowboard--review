<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a class="nav-item nav-link" href="{{ route('create') }}">投稿</a>
            <a class="nav-item nav-link" href="{{ route('search') }}">検索</a>
        </h2>
    </x-slot>
    
    <div>
        <form action="{{ route('search') }}" method="GET">
            <input type="text" name="keyword" value="{{ $keyword }}">
            <input type="submit" value="検索">
        </form>
    </div>
    @if(session('err_msg'))
    <p class="text-deanger">
        {{ session('err_msg') }}
    </p>
    @endif
    <table class="table table-striped">
        <tr>
            <th>記事番号</th>
            <th>ボード名</th>
            <th>日付</th>
            <th></th>
        </tr>
        @forelse($snows as $snow)
        <tr>
            <td>{{ $snow->id }}</td>
            <td><a href="/snow/{{ $snow->id }}">{{ $snow->title }}</a></td>
            <td>{{ $snow->created_at }}</td>
            <td><button type="button" class="btnbtn-primary" onclick="location.href='/snow/edit/{{ $snow->id }}'">編集</button></td>
            <form method="POST" action="{{ route('delete', $snow->id) }}" onSubmit="return checkDelete()">
                <!-- <form action="{{ route('delete', $snow->id) }}" method="get" onSubmit="return checkDelete()">   -->
                @csrf
                <td><button type="submit" class="btnbtn-primary" onclick=>削除</button></td>
        </tr>
        @empty
        <td>No board!!</td>
        @endforelse
    </table>
    </div>
    </div>
    <script>
        function checkDelete() {
            if (window.confirm('削除してよろしいですか？')) {
                return true;
            } else {
                return false;
            }
        }
    </script>
</x-app-layout>