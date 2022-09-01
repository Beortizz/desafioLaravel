<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" onclick="responsiveLogo()" data-widget="pushmenu" href="#"><svg
                    xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-list"
                    viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                </svg></a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto mr-3">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="border"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-power" viewBox="0 0 16 16">
                    <path d="M7.5 1v7h1V1h-1z" />
                    <path d="M3 8.812a4.999 4.999 0 0 1 2.578-4.375l-.485-.874A6 6 0 1 0 11 3.616l-.501.865A5 5 0 1 1 3 8.812z" />
            </svg></button>
        </form>
        </li>
    </ul>
</nav>
<!-- Fim Navbar -->