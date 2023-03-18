@extends('layouts.main')

@section('content')
<div class="container-fluid">
    <h2>Exhibition</h2>
</div>
    <div class="container-fluid" id="app">
        <div class="row">
            <div class="col-md-12 col-12">
                <div class="grid row">
                    @foreach($artworks as $artwork)
    {{--                <div class="grid-item col-sm-6 col-md-2 col-lg-2">--}}
                    <div class="grid-item">
                        <a data-fancybox="gallery" data-fancybox-title="{{$artwork->title}}" href="/images/gallery/{{$artwork->file}}">
                            <span class="fancybox-title">{{$artwork->title}} (#{{ $artwork->id }})</span>
                            <img src="/thumbnail/{{$artwork->file}}" alt="{{$artwork->title}}" title="{{$artwork->title}}">
                        </a>
                    </div>
                    @endforeach
                </div>


                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="row paginate">
                    {{ $artworks->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection
