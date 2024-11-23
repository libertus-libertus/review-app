@extends('pages.main')
@section('title')
@auth
Bantuan
@else
LINStation
@endauth
@endsection

@section('subTitle')
Bantuan
@endsection

@section('content')
<section class="content">
    <!-- Info boxes -->
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Cara Mengaplikasikan Website <strong>LINStation</strong>:</h3> <br> <br>
                    <p>Untuk melihat lebih jauh terkait bagaimana cara penggunaan website <strong>LINStation</strong> serta mengakses beberapa fitur yang terdapat didalamnya, maka Anda terlebih dahulu <label class="label label-primary">DAFTAR</label> atau <label class="label label-success">LOGIN</label>  sebagai user baru di platform kami.</p>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="box-group" id="accordion">
                        <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                        <div class="panel box box-primary">
                            <div class="box-header with-border">
                                <h4 class="box-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                        Cara daftar di platform LINStation
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in">
                                <div class="box-body">
                                    <ol>
                                        <li>Klik tombol daftar atau klik <a href="#">Daftar disini</a> untuk kemudian diarahkan ke halaman
                                            daftar</li>
                                        <li>Untuk datanya sendirinya bisa disesuaikan dengan permintaan form yang diminta</li>
                                        <li>Pastikan seluruh data dan password anda benar dan tidak keliru</li>
                                        <li>Seteleh semuanya berhasil di register, maka akan diarahkan secara otomatis di halaman beranda yang
                                            berbeda dengan halaman sebelumnya saat masih menjadi pengunjung biasa.</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                        <div class="panel box box-danger">
                            <div class="box-header with-border">
                                <h4 class="box-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                        Cara login di platform LINStation
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse">
                                <div class="box-body">
                                    <ol>
                                        <li>Klik tombol login atau klik <a href="#">Login disini</a> untuk kemudian diarahkan ke halaman login
                                        </li>
                                        <li>Untuk datanya sendiri hanya dibutuhkan email dan password saja.</li>
                                        <li>Tapi untuk email dan password, gunakan email dan password yang Anda registrasikan</li>
                                        <li>Seteleh semuanya berhasil di inputkan, maka tekan tombol login agar diarahkan secara otomatis di
                                            halaman beranda yang berbeda dengan halaman sebelumnya saat masih menjadi pengunjung biasa.</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                        <div class="panel box box-success">
                            <div class="box-header with-border">
                                <h4 class="box-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                        Bagaimana caranya agar saya dapat melakukan review?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse">
                                <div class="box-body">
                                    <ol>
                                        <li>Terlebih dahulu anda <a href="{{ route('register') }}">daftar</a> atau <a href="{{ route('login') }}">login disini</a></li>
                                        <li>Setelah anda berhasil login, maka akan secara otomatis di arahkan ke menu dashboard</li>
                                        <li>Kemudian, untuk melakukan review, cukup klik menu <strong>Trending Movies</strong> maka akan tampil semua list film yang ingin kamu review</li>
                                        <li>Klik tombol <label class="label label-warning">Review</label>, untuk mereview film tersebut.</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
    <!-- /.row -->
</section>
@endsection
