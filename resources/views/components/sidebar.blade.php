<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="/" class="app-brand-link">
            <span class="app-brand-text demo menu-text fw-bolder">Sistem Informasi</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <li class="menu-item {{ Request::is('/') ? 'active' : '' }}">
            <a href="/" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Data Master</span>
        </li>

        <li class="menu-item {{ Request::is('mahasiswa*') ? 'active' : '' }}">
            <a href="{{ route('mahasiswa.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-user-circle"></i>
                <div data-i18n="Analytics">Data Mahasiswa</div>
            </a>
        </li>
        <li class="menu-item {{ Request::is('nilai*') ? 'active' : '' }}">
            <a href="{{ route('nilai.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-file-blank"></i>
                <div data-i18n="Analytics">Data Nilai</div>
            </a>
        </li>

    </ul>
</aside>
