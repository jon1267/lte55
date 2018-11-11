<!-- Nav -->
<nav class="gray">
    <div class="container">
        <div class="row">

            <!-- Logo -->
            <div class="logo col-md-2">
                <span class="bg_logo"></span>
                <a href="{{route('index.home')}}"><h1>Mega <span>Host</span></h1></a>
            </div>
            <!-- End Logo -->

            <div class="col-md-10">
                <!-- Menu-->
                <ul id="menu" class="sf-menu">
                    {{--<li class="current">--}}
                    <li class="{{$active[0] ? 'current' : ''}}">
                        <a href="{{route('index.home')}}">Home</a>
                        <ul>
                            <li><a href="{{ route('index.home1') }}">Home 1</a></li>
                            <li><a href="{{ route('index.home2') }}">Home 2</a></li>
                            <li><a href="{{ route('index.home3') }}">Home 3</a></li>
                        </ul>
                    </li>
                    <li class="{{$active[1] ? 'current' : ''}}" >
                        <a href="{{ route('index.about') }}">About</a>
                    </li>
                    <li class="{{$active[2] ? 'current' : ''}}">
                        <a href="#">Our Solutions</a>
                        <ul>
                            <li><a href="{{ route('index.sharedHosting') }}">Shared Hosting</a></li>
                            <li><a href="{{ route('index.virtualServers') }}">Virtual Servers</a></li>
                            <li><a href="{{ route('index.dedicatedServers') }}">Dedicated Servers</a></li>
                        </ul>
                    </li>
                    <li class="{{$active[3] ? 'current' : ''}}">
                        <a href="{{ route('index.portfolio4') }}">Portfolio</a>
                        <ul>
                            <li>
                                <a href="{{ route('index.portfolio2') }}">Portfolio 2 Columns</a>
                            </li>
                            <li>
                                <a href="{{ route('index.portfolio3') }}">Portfolio 3 Columns</a>
                            </li>
                            <li>
                                <a href="{{ route('index.portfolio4') }}">Portfolio 4 Columns</a>
                            </li>
                        </ul>
                    </li>
                    <li class="{{$active[4] ? 'current' : ''}}">
                        <a href="#">Features</a>
                        <ul>
                            <li>
                                <a href="#">Pages</a>
                                <ul>
                                    <li><a href="{{ route('index.fullWidth') }}">Full Width</a></li>
                                    <li><a href="{{ route('index.leftBar') }}">Left Sidebar</a></li>
                                    <li><a href="{{ route('index.rightBar') }}">Right Sidebar</a></li>
                                    <li><a href="{{ route('index.pageFaq') }}">FAQ</a></li>
                                    <li><a href="{{ route('index.siteMap') }}">Sitemap</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Error Pages</a>
                                <ul>
                                    <li><a href="403_page.html">403 Page</a></li>
                                    <li><a href="404_page.html">404 Page</a></li>
                                    <li><a href="405_page.html">405 Page</a></li>
                                    <li><a href="500_page.html">500 Page</a></li>
                                    <li><a href="503_page.html">503 Page</a></li>
                                    <li><a href="offline.html">Website is Offline</a></li>
                                </ul>
                            </li>
                            {{--<li><a href="feature-grid-system.html">Grind System</a></li>
                            <li><a href="feature-typograpy.html">Tipograpy</a></li>
                            <li><a href="feature-icons.html">Icons</a></li>
                            <li><a href="feature-shortcodes.html">Shortcodes</a></li>
                            <li>
                                <a href="#">Third Level</a>
                                <ul>
                                    <li><a href="#">menu item</a></li>
                                    <li><a href="#">menu item</a></li>
                                    <li><a href="#">menu item</a></li>
                                </ul>
                            </li>--}}
                        </ul>
                    </li>
                    <li class="{{$active[5] ? 'current' : ''}}" >
                        <a href="{{ route('index.promotions') }}">Promotions</a>
                    </li>
                    <li class="{{$active[6] ? 'current' : ''}}" >
                        <a href="{{ route('index.blog') }}">Blog</a>
                        <ul>
                            <li><a href="{{ route('index.blog') }}">Blog Entry</a></li>
                            <li><a href="{{ route('index.blogSingle') }}">Single Post</a></li>
                        </ul>
                    </li>
                    <li class="{{$active[7] ? 'current' : ''}}" ><a href="{{ route('index.contact') }}">Contact</a></li>
                </ul>
                <!-- End Menu-->
            </div>
        </div>
    </div>
</nav>
<!-- End Nav -->