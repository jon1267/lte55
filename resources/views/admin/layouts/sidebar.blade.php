<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('admin/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p> Admin </p>
                <!--<a href="#"><i class="fa fa-circle text-success"></i> Online</a>-->
            </div>
        </div>
        <!-- search form закомментир Jon
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>

            <!--<li class="active treeview">-->
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-home"></i> <span>Home Pages</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="#"><a href="{{ route('msliders.index') }}"><i class="fa fa-circle-o"></i> Main Slider</a></li>
                    <li class="#"><a href="{{ route('features.index') }}"><i class="fa fa-circle-o"></i> Home Features</a></li>
                    <li class="#"><a href="{{ route('prices.index') }}"><i class="fa fa-circle-o"></i> Home Price</a></li>
                    <li class="#"><a href="{{ route('ssliders.index') }}"><i class="fa fa-circle-o"></i> Home1 Slider</a></li>
                    <li class="#"><a href="{{ route('grays.index') }}"><i class="fa fa-circle-o"></i> Home1 Article</a></li>
                    <li class="#"><a href="{{ route('homes.index') }}"><i class="fa fa-circle-o"></i> Home2 Article</a></li>

                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-pagelines"></i>
                    <span>About</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('abouts.index') }}"><i class="fa fa-circle-o"></i> About US</a></li>
                    <li><a href="{{ route('accordions.index') }}"><i class="fa fa-circle-o"></i> Accordion</a></li>
                    <li><a href="{{ route('teams.index') }}"><i class="fa fa-circle-o"></i> Team</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-briefcase"></i>
                    <span>Solutions</span>
                    <span class="pull-right-container">
                        <!--<span class="label label-primary pull-right">3</span>-->
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('shareds.index') }}"><i class="fa fa-database"></i> Shared Hosting</a></li>
                    <li><a href="{{ route('svps.index') }}"><i class="fa fa-cloud"></i> Virtual Servers</a></li>
                    <li><a href="{{ route('sdedics.index') }}"><i class="fa fa-server"></i> Dedicated Servers</a></li>
                </ul>
            </li>

            <!--<li class="treeview">
                <a href="#">
                    <i class="fa fa-coffee"></i>
                    <span>Portfolio</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Portfolio 2</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Portfolio 3</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Portfolio 4</a></li>
                </ul>
            </li>-->
            <li>
                <a href="{{ route('portfolios.index') }}">
                    <i class="fa fa-coffee"></i> <span>Portfolio</span>
                </a>
            </li>

            <li>
                <a href="{{ route('promotions.index') }}">
                    <i class="fa fa-fire"></i> <span>Promotions</span>
                    <!--<span class="pull-right-container">
                      <small class="label pull-right bg-red">3</small>
                      <small class="label pull-right bg-blue">17</small>
                    </span>-->
                </a>
            </li>

            <li>
                <a href="{{ route('contacts.index') }}">
                    <i class="fa fa-star-half-o"></i> <span>Contact</span>
                </a>
            </li>

            <li>
                <a href="{{ route('seops.index') }}">
                    <i class="fa fa-bell"></i> <span>SEO</span>
                </a>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user"></i>
                    <span> User</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('users.index') }}"><i class="fa fa-circle-o"></i> Users</a></li>
                    <li><a href="{{ route('index.home') }}"><i class="fa fa-circle-o"></i>to Frontend</a></li>
                    <!--<li><a href="#"><i class="fa fa-sign-out"></i> Logout</a></li>-->
                    <li><a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"> <i class="fa fa-sign-out"></i>&nbsp;
                            Logout
                        </a></li>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>

                </ul>
            </li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>