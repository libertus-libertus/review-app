@extends('pages.main')
@section('title')
Genres
@endsection

@section('subTitle')
@auth
Seluruh Data Genres
@endauth
@endsection

@push('css')
<link rel="stylesheet"
    href="{{ asset('lte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endpush

@section('content')
@auth
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <a href="{{ route('genre.create') }}" class="btn btn-xs btn-info">
                        <i class="fa fa-plus-circle" aria-hidden="true"></i>
                        Tambah Data
                    </a>
                </div>
                <div class="box-body">
                    <table id="table-data" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="7%">#</th>
                                <th>Name</th>
                                <th class="text-center">
                                    <i class="fa fa-cogs" aria-hidden="true"></i>
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($genre as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <form action="{{ route('genre.destroy', $item->id) }}" method="POST"
                                            style="display:inline;">
                                            <a href="{{ route('genre.show', $item->id) }}"
                                                class="btn btn-xs btn-flat btn-info">
                                                <i class="fa fa-edit" aria-hidden="true"></i>
                                                Detail
                                            </a>
                                            <a href="{{ route('genre.edit', $item->id) }}"
                                                class="btn btn-xs btn-flat btn-warning">
                                                <i class="fa fa-edit" aria-hidden="true"></i>
                                                Update
                                            </a>

                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-xs btn-flat btn-danger"
                                                onclick="return confirm('Hapus genre film ini?')">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@else

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="col-md-1">
                        Genre
                    </div>
                    <div class="col-md-11">
                        @foreach ($genre as $item)
                        <a href="{{ route('genre.show', $item->id) }}">
                            <span class="label {{ $loop->iteration % 2 ? 'label-warning' : 'label-primary' }}">{{ $item->name }}</span>
                        </a> <br>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endauth
@endsection

@push('js')
<!-- Tambahkan SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="{{ asset('lte/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('lte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<!-- page script -->
<script>
    $(function () {
        $("#table-data").DataTable();
    });
</script>
@endpush
