
@extends('layout')
@section('title', '投稿一覧')
@section('content')
<div class="row">
  <div class="col-md-10 col-md-offset-2">
    <h2>投稿記事一覧</h2>
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
      @foreach($snows as $snow)
      <tr>
        <td>{{ $snow->id }}</td>
        <td><a href="/snow/{{ $snow->id }}">{{ $snow->title }}</a></td>
        <td>{{ $snow->created_at }}</td>
      </tr>
      @endforeach
    </table>
  </div>
</div>
<script>
function checkDelete(){
    if(window.confirm('削除してよろしいですか？')){
        return true;
    } else {
        return false;
    }
}
</script>
@endsection