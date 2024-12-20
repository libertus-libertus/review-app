<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="https://img.icons8.com/?size=60&id=UG5EO81XNkPs&format=png" class="img-circle"
                    alt="User Image">
            </div>
            <div class="pull-left info">
                @auth
                    <p>{{ auth()->user()->name }}</p>
                    <a href="#">
                        <i class="fa fa-circle text-success"></i>
                        {{ auth()->user()->email }}
                    </a>
                @else
                    <p>Anda Belum Login</p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Pengunjung</a>
                @endauth
            </div>
        </div>

        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                        <i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>

        <ul class="sidebar-menu" data-widget="tree">
            <li>
                <a href="{{ route('film.index') }}">
                    <i class="fa fa-th" aria-hidden="true"></i>
                    <span>Halaman Beranda</span>
                </a>
            </li>
            <li class="header">MASTER DATA</li>
            @auth
            <li>
                <a href="{{ route('cast.index') }}">
                    <i class="fa fa-cubes" aria-hidden="true"></i>
                    <span>Cast</span>
                </a>
            </li>
            @endauth
            <li>
                <a href="{{ route('film.index') }}">
                    <i class="fa fa-film" aria-hidden="true"></i>
                    <span>Trending Movies</span>
                </a>
            </li>
            <li>
                <a href="{{ route('genre.index') }}">
                    <i class="fa fa-file-movie-o" aria-hidden="true"></i>
                    <span>Genre</span>
                </a>
            </li>
            {{-- @endauth --}}
            <li class="header">PENGATURAN</li>
            @auth
            <li>
                <a href="{{ route('profile.edit') }}">
                    <i class="fa fa-cogs" aria-hidden="true"></i>
                    <span>Settings</span>
                </a>
            </li>
            @endauth
            <li>
                <a href="{{ route('bantuan') }}">
                    <i class="fa fa-info-circle" aria-hidden="true"></i>
                    <span>Bantuan</span>
                </a>
            </li>
            <li>
                <a href="https://github.com/libertus-libertus/review-app" target="_blank">
                    <i class="fa fa-github" aria-hidden="true"></i>
                    <span>Documentation</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
