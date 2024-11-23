@extends('pages.main')
@section('title')
Detail data
@endsection

@section('subTitle')
    Detail Data
@endsection

@section('content')
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Film dalam Genre: {{ $genre->name }}</h3>
                </div>
                <div class="box-body">
                    @if ($films->isEmpty())
                        <!-- Notifikasi jika tidak ada film -->
                        <div class="alert alert-warning">
                            <strong>Info:</strong> Belum ada film yang menggunakan genre ini.
                        </div>

                        <a href="{{ route('genre.index') }}" style="margin: 10px 0" class="btn btn-xs btn-flat btn-info">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i>
                            Kembali ke Home
                        </a>
                    @else
                        <!-- Daftar film -->
                        <div class="row">
                            @foreach ($films as $film)
                                <div class="col-md-4" style="margin-bottom: 15px">
                                    <div class="card">
                                        <div class="card-body">
                                            <img src="{{ asset('films/' . $film->poster) }}" height="200px" style="width: 100%">
                                        </div>
                                        <div class="card-body" style="margin-top: 10px">
                                            <strong>Judul: </strong> {{ $film->title }} <br>
                                            <strong>Tahun: </strong> {{ $film->release_year }} <br>
                                            <strong>Summary: </strong> {!! Str::limit($film->summary, 100) !!}
                                            <a href="{{ route('film.show', $film->id) }}" style="text-decoration: underline">
                                                Read more
                                            </a>
                                        </div>
                                        <div class="card-footer">
                                            <a href="{{ route('genre.index') }}" class="btn btn-xs btn-flat btn-warning" style="margin: 10px 0">
                                                <i class="fa fa-arrow-left" aria-hidden="true"></i>
                                                Kembali ke Home
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
