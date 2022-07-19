@extends('layout')
@section('title', '投稿詳細')
@section('content')
<div class="container col-xxl-8 px-4 py-5">
    <div id="detail" class="row flex-lg-row-reverse align-items-center g-5 py-5">
      <div class="border border-dark col-10 col-sm-8 col-lg-6" style="background-color: white;" >
        <img src="{{ asset('storage/image/'.$snow->image)}}" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
      </div>
      <div class="border border-dark col-lg-6 detail-bg">
        <h1 class="display-5 fw-bold lh-1 mb-3">{{ $snow->title }}</h1>
        <p class="border-dark lead" style="border-top: 2px solid black;">{{ $snow->content }}</p>
        <span class="detail">作成日:{{ $snow->created_at }}</</span>
        <span class="detail">更新日:{{ $snow->update_at }}</</span>
      </div>
    </div>
  </div>
@endsection

