@extends('pages.main')
@section('title', 'Detail data film')

@section('content')
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Berikut detail film</h3>
                </div>
                <div class="box-body">
                    <img src="{{ asset('films/'.$film->poster) }}" alt="poster-film" width="100%">

                    <p class="text-muted">
                        <strong>Judul film: </strong> {{ $film->title }}<br>
                        <strong>Tahun rilis: </strong>{{ $film->release_year }} <br>
                        <strong>Genre: </strong>{{ $film->genre->name }} <br>
                        <strong>Summary film: </strong> {!! $film->summary !!}
                    </p>

                    <hr>
                    <h4>Reviews</h4>
                    @foreach ($film->reviews as $review)
                        <div class="review">
                            <strong>{{ $review->user->name }}</strong>:
                            <p>{{ $review->content }}</p>
                            <p>Rating:
                                <span style="color: gold;">
                                    {{ str_repeat('★', $review->rating) }}
                                    {{ str_repeat('☆', 5 - $review->rating) }}
                                </span>
                            </p>
                        </div>
                        <hr>
                    @endforeach

                    @auth
                        <form action="{{ route('film.review.store', $film->id) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="content">Your Review</label>
                                <textarea name="content" id="content" class="form-control" rows="3" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="rating">Your Rating</label>
                                <select name="rating" id="rating" class="form-control" required>
                                    <option value="5">★★★★★ (Excellent)</option>
                                    <option value="4">★★★★☆ (Good)</option>
                                    <option value="3">★★★☆☆ (Average)</option>
                                    <option value="2">★★☆☆☆ (Poor)</option>
                                    <option value="1">★☆☆☆☆ (Terrible)</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm">Submit Review</button>
                        </form>
                    @else
                        <p>Please <a href="{{ route('login') }}">login</a> to write a review and rating.</p>
                    @endauth

                    <a href="{{ route('film.index') }}" class="btn btn-warning btn-xs" style="margin-top: 10px">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i>
                        Kembali ke Home
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
