@extends('layouts.layout')
@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-blog set-bg" data-setbg="/temp/assets/img/breadcrumb-bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Bài viết</h2>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Blog Section Begin -->
    <section class="blog spad">
        <div class="container">
            <div class="row">
                @foreach($posts as $post)
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic set-bg" data-setbg="/temp/images/post/{{$post->thumb}}" ></div>
                        <div class="blog__item__text">
                            <span><img src="/temp/assets/img/icon/calendar.png" alt=""> {{$post->updated_at}}</span>
                            <h5>{{$post->Title}}</h5>
                            <a href="{{ route('posts.details', ['slug' =>$post->slug]) }}">Đọc thêm</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="pagination">
                    {{ $posts->links() }}
            </div>
        </div>
    </section>
    <!-- Blog Section End -->
@endsection
