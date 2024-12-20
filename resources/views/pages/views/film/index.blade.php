@extends('pages.main')
@section('title')
Data Films
@endsection

@section('subTitle')
Direkomendasikan untukmu
@endsection

@section('content')
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                    @auth
                    <a href="{{ route('film.create') }}" class="btn btn-xs btn-info">
                        <i class="fa fa-plus-circle" aria-hidden="true"></i>
                        Tambah Data
                    </a>
                    @endauth
                </div>
                <div class="box-body">
                    <div class="row">
                        @foreach ($film as $item)
                        <div class="col-md-4" style="margin-bottom: 15px">
                            <div class="card">
                                <div class="card-body">
                                    <img src="{{ asset('films/'. $item->poster) }}" height="200px" style="width: 100%">
                                </div>
                                <div class="card-body" style="margin-top: 10px">
                                    <strong>Judul: </strong> {{ $item->title }} <br>
                                    <strong>Genre: </strong> {{ $item->genre->name }} <br>
                                    <strong>Summary: </strong>{!! Str::limit($item->summary, 100) !!}
                                    <a href="{{ route('film.show', $item->id) }}" style="text-decoration: underline">
                                        Reead more
                                    </a>
                                </div>
                                <hr>
                                <div class="btn-group">
                                    @auth
                                    <form action="{{ route('film.destroy', $item->id) }}" method="POST"
                                        style="display:inline;">
                                        <a href="{{ route('film.show', $item->id) }}"
                                            class="btn btn-xs btn-flat btn-info">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                            Review
                                        </a>
                                        <a href="{{ route('film.edit', $item->id) }}"
                                            class="btn btn-xs btn-flat btn-warning">
                                            <i class="fa fa-edit" aria-hidden="true"></i>
                                            Update
                                        </a>
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-xs btn-flat btn-danger"
                                            onclick="return confirm('Hapus cast ini?')">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                            Delete
                                        </button>
                                    </form>
                                    @else
                                    <a href="{{ route('film.show', $item->id) }}"
                                        class="btn btn-xs btn-flat btn-warning">
                                        <i class="fa fa-history" aria-hidden="true"></i>
                                        Review Film
                                    </a>
                                    @endauth
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('js')
<!-- Tambahkan SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endpush
