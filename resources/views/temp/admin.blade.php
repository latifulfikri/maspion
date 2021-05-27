<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('PageTitle')</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('assets/css/bootstrap.css') }}">

    <link rel="stylesheet" href="{{ url('assets/vendors/iconly/bold.css') }}">

    <link rel="stylesheet" href="{{ url('assets/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ url('assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/app.css') }}">
    <link rel="shortcut icon" href="{{ url('assets/images/favicon.svg') }}" type="image/x-icon">

    <style>
        body {
            min-height: 100vh;
            background: linear-gradient(0deg, #F7F8F9 0%, #F7F8F9 75%, #FFEDDE 75%, #FFEDDE 100%);
        }

        .avatar.avatar-jumbo img {
            width: 120px;
            height: 120px;
            font-size: 1.4rem
        }

        ;

        div.img-preview {
            height: 300px;
        }

        .ab {
            position: absolute;
        }

        .edit-profile {
            bottom: 0;
            right: 0;
        }

        .rv {
            position: relative;
        }

        .card img {
            height: 100% !important;
        }

        .submenu-item.active {
            font-weight: 800 !important;
            color: pink !important;
        }
    </style>
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="index.html"><img src="{{ url('storage/img/maspion-it.png') }}" alt="Logo" srcset=""></a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item">
                            <a href="{{url('/dashboard')}}" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li class="sidebar-item has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-people-fill"></i>
                                <span>Account</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="{{url('/dashboard/user-table')}}">User Table</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="{{url('/dashboard/admin-table')}}">Admin Table</a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-stack"></i>
                                <span>Data</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="{{url('/dashboard/category-table')}}">Categories Table</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="{{url('/dashboard/articles-table')}}">Articles Table</a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{url('/dashboard/edit-profile')}}" class='sidebar-link'>
                                <i class="bi bi-person-lines-fill"></i>
                                <span>Edit Profile</span>
                            </a>
                        </li>
                        <hr>
                        <li class="sidebar-item">
                            <a href="index.html" class='sidebar-link'>
                                <i class="bi bi-box-arrow-left"></i>
                                <span>Sign Out</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <h3>@yield('PageTitle')</h3>
            </div>
            <div class="page-content">
                @yield('PageContent')
            </div>

            <footer>
                <section id="copyright">
                    <div class="container pt-3">
                        <div class="row">
                            <div class="col-12 text-center">
                                <p><b>Copyright © 2021 - MASPION IT</b></p>
                            </div>
                        </div>
                    </div>
                </section>
            </footer>
        </div>
    </div>
    <script src="{{ url('assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ url('assets/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ url('assets/vendors/apexcharts/apexcharts.js') }}"></script>
    <script src="{{ url('assets/js/pages/dashboard.js') }}"></script>

    <script src="{{ url('assets/js/main.js') }}"></script>

    <script>
        var doctitle = document.title;

        var menu = document.getElementsByClassName('sidebar-item');

        for (var i = 0; i < menu.length; i++) {
            var menuName = menu[i].getElementsByTagName('span')[0].innerText;
            if (doctitle.includes(menuName)) {
                menu[i].className += ' active';
                if (menu[i].className.includes('has-sub')) {
                    var subMenu = menu[i].getElementsByClassName('submenu')[0];
                    subMenu.style.display = 'block';
                    var subMenuItem = menu[i].getElementsByClassName('submenu-item');

                    for (var o = 0; o < subMenuItem.length; o++) {
                        if (doctitle.includes(subMenuItem[o].getElementsByTagName('a')[0].innerText)) {
                            console.log(subMenuItem[o].getElementsByTagName('a')[0].innerText);
                            subMenuItem[o].className += ' active';
                        }
                    }
                }
            }
        }
    </script>
</body>

</html>