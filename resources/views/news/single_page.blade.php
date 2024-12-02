@extends('layouts.news')
@section('contentnews')
<section id="contentSection">
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8">
            <div class="left_content">
                <div class="single_page">
                    <h1>{{ $news->title }}</h1>
                    <div class="post_commentbox">
                        <span><i class="fa fa-user"></i>{{ $news->user->name }}</span>
                        <span><i class="fa fa-calendar"></i>{{ \Carbon\Carbon::parse($news->date)->format('d F Y') }}</span>
                        <span><i class="fa fa-clock-o"></i>{{ \Carbon\Carbon::parse($news->time)->format('h:i A') }}</span>
                    </div>
                    <div class="single_page_content">
                        <img class="img-center" src="{{ asset('storage/images/News & Update/'. $news->image)}}" alt="" style="max-width: 100%;">
                        <p>
                            {{ $news->body}}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-4">
            <aside class="right_content">
                <div class="single_sidebar">
                    <h2><span>Other Post</span></h2>
                    <ul class="spost_nav">
                        @forelse ( $listPost as $data )
                            <li>
                                <div class="media wow fadeInDown">
                                    <a href="single_page.html" class="media-left">
                                        <img alt="" src="{{ asset('storage/images/News & Update/'. $data->image)}}">
                                    </a>
                                    <div class="media-body">
                                        <a href="{{ route('news.singlepage', ['id' => $data->id])}}" class="catg_title">{{ $data->title }}</a><br>
                                        <p class="catg_title">{{ Str::limit($data->body, 50) }}</p>
                                    </div>
                                </div>
                            </li>
                        @empty
                            There are no recent posts
                        @endforelse
                    </ul>
                </div>
            </aside>
        </div>
    </div>
</section>
@endsection
