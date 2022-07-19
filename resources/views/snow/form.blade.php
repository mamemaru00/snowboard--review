@extends('layout')
@section('title', '投稿フォーム')
@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h2>投稿フォーム</h2>
        <form method="POST" action="{{ route('store') }}" enctype="multipart/form-data" onSubmit="return checkSubmit()">
            @csrf
            <div class="form-group">
                <label for="title">
                    ボード名
                </label>
                <input id="title" name="title" class="form-control" value="{{ old('title') }}" type="text">
                @if ($errors->has('title'))
                <div class="text-danger">
                    {{ $errors->first('title') }}
                </div>
                @endif
            </div>
            <div id="image">
                <div id="img">
                    <img id="preview" width="200" height="auto" class="img-thumbnail" alt="スノボー">
                </div>
                <input type="file" id="myImage" name="image" accept="image/png, image/jpeg" />
            </div>
            <div class="form-group">
                <label for="content">
                    本文
                </label>
                <textarea id="content" name="content" class="form-control" rows="4">{{ old('content') }}</textarea>
                @if ($errors->has('content'))
                <div class="text-danger">
                    {{ $errors->first('content') }}
                </div>
                @endif
            </div>
            <div class="mt-5">
                <a class="btn btn-secondary" href="{{ route('snows') }}">
                    キャンセル
                </a>
                <button type="submit" class="btn btn-primary">
                    投稿する
                </button>
            </div>
        </form>
    </div>
</div>
<script>
    function checkSubmit() {
        if (window.confirm('送信してよろしいですか？')) {
            return true;
        } else {
            return false;
        }
    }
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 {{-- <script src="/js/style.js"></script> --}}
 <script>


   $("#myImage").on("change", function (e) {
    var reader = new FileReader();
    reader.onload = function (e) {
        $("#preview").attr("src", e.target.result);
    }
    reader.readAsDataURL(e.target.files[0]);
   });


 </script>
@endsection