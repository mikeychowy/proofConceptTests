@php
    $r = \Route::current()->getAction();
    $route = (isset($r['as'])) ? $r['as'] : '';
@endphp

<li class="nav-item mT-30">
    <a class="sidebar-link {{ Str::startsWith($route, ADMIN . '.dash') ? 'active' : '' }}" href="{{ route(ADMIN . '.dash') }}">
        <span class="icon-holder">
            <i class="c-blue-500 ti-home"></i>
        </span>
        <span class="title">Dashboard</span>
    </a>
</li>

<li class="nav-item">
    <a class="sidebar-link {{ Str::startsWith($route, ADMIN . '.users') ? 'active' : '' }}" href="{{ route(ADMIN . '.users.index') }}">
        <span class="icon-holder">
            <i class="c-brown-500 ti-user"></i>
        </span>
        <span class="title">Users</span>
    </a>
</li>

<li class="nav-item">
    <a class="sidebar-link {{ Str::startsWith($route, ADMIN . '.books') ? 'active' : '' }}" href="{{ route(ADMIN . '.books.index') }}">
        <span class="icon-holder">
            <i class="c-brown-500 ti-book"></i>
        </span>
        <span class="title">Books</span>
    </a>
</li>

<li class="nav-item">
    <a class="sidebar-link {{ Str::startsWith($route, ADMIN . '.authors') ? 'active' : '' }}" href="{{ route(ADMIN . '.authors.index') }}">
        <span class="icon-holder">
            <i class="c-brown-500 ti-pencil-alt"></i>
        </span>
        <span class="title">Authors</span>
    </a>
</li>
