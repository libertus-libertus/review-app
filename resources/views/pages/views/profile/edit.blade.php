@extends('pages.main')
@section('title')
Ubah Data Profile
@endsection

@section('content')
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Ubah Informasi Profile Anda</h3>
                </div>
                <!-- /.box-header -->

                <!-- form start -->
                <form role="form" action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')

                    <div class="box-body">
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}" autofocus
                                placeholder="Nama">
                            @error('name')
                            <span class="text-danger">
                                <i class="fa fa-times-circle-o"></i> {{ $message }}
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Alamat E-Mail</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" autofocus
                                placeholder="E-mail">
                            @error('email')
                            <span class="text-danger">
                                <i class="fa fa-times-circle-o"></i> {{ $message }}
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="avatar">Foto Profile</label>
                            <input type="file" class="form-control" id="avatar" name="avatar"> <br>
                            @error('avatar')
                            <span class="text-danger">
                                <i class="fa fa-times-circle-o"></i> {{ $message }}
                            </span>
                            @enderror

                            @if($user->avatar)
                                <img src="{{ asset('avatars/' . $user->avatar) }}" alt="Avatar" class="mt-3" style="width: 100px; height: 100px; border-radius: 50%;">
                            @endif
                        </div>

                        <!-- Pembagian kolom inputan -->
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="password">Password Baru (Opsional)</label>
                                    <input type="password" class="form-control" id="password" name="password"
                                        placeholder="Password">
                                    @error('password')
                                    <span class="text-danger">
                                        <i class="fa fa-times-circle-o"></i> {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                                <!-- /input-group -->
                            </div>
                            <!-- /.col-lg-6 -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="password_confirmation">Password Konfirmasi</label>
                                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Password Kofirmasi">
                                    @error('password_confirmation')
                                    <span class="text-danger">
                                        <i class="fa fa-times-circle-o"></i> {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                                <!-- /input-group -->
                            </div>
                            <!-- /.col-lg-6 -->
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <div class="btn-group">
                            <button type="submit" class="btn btn-xs btn-flat btn-primary">
                                <i class="fa fa-save" aria-hidden="true"></i>
                                Update Data
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.box -->
        </div>
    </div>
</section>
@endsection
