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
                  <h3 class="box-title">Berikut detail genre</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <strong><i class="fa fa-book margin-r-5"></i> {{ $genre->name }}</strong>

                  <hr>
                  <a href="{{ route('genre.index') }}" class="btn btn-xs btn-flat btn-warning">
                    <i class="fa fa-arrow-left" aria-hidden="true"></i>
                    Kembali ke Home
                  </a>
                </div>
                <!-- /.box-body -->
              </div>
        </div>
    </div>
</section>
@endsection
