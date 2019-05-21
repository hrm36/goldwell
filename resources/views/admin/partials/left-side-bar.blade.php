 <nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <input type="hidden" name="_url_filemanage_1" id="_url_filemanage_1" value="{{env("URL_FILEMANAGE_1", "")}}">
        <input type="hidden" name="_url_filemanage_2" id="_url_filemanage_2" value="{{env("URL_FILEMANAGE_2", "")}}">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element"> 
                    <span>
                        <img alt="image" class="img-circle" src="{{asset('assets/img/user-default.png')}}" />
                    </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">{{Auth::user()->name}}</strong>
                    <span class="clear"> <span class="block m-t-xs"> <small class="font-bold">{{Auth::user()->email}}</small>
                    </span> <span class="text-muted text-xs block">Admin <b class="caret"></b></span> </span> </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="#">Thay đổi mật khẩu</a></li>
                        <li class="divider"></li>
                        <li><a href="{{ route('logout') }}"  onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Đăng xuất</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                             @csrf
                            </form>

                        </li>
                    </ul>
                </div>
                <div class="logo-element">
                    DNM
                </div>
            </li>
            <li class={{$flag == "dashboard" ? "active" : ""}}>
                <a href="{{route('dashboard')}}"><i class="fa fa-th-large"></i> <span class="nav-label">Bảng tin</span></span></a>
            </li>

            <li class={{$flag == "p_l" || $flag == "p_n" || $flag == "cat_p_l" || $flag == "list_ext" || $flag == "create_ext" || $flag == "create_ext"   
                        || $flag == "cat_p_n" || $flag == "gd" ? "active" : ""}}>
                <a href="#"><i class="fa fa-cubes"></i> 
                    <span class="nav-label">PRODUCTS</span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level collapse">
                    <li class={{$flag == "p_l" ? "active" : ""}}>
                        <a href="{{route('list-sp')}}">Danh sách</a>
                    </li>
                    <li class={{$flag == "p_n" ? "active" : ""}}>
                        <a href="{{route('create-sp')}}">Thêm mới</a>
                    </li>                
                    <li class={{$flag == "list_ext" || $flag == "create_ext" ? "active" : ""}}>
                        <a href="#">QUY TRÌNH & CÔNG NGHỆ</a>
                        <ul class="nav nav-third-level">
                            <li class={{$flag == "list_ext" ? "active" : ""}}>
                                <a href="{{route('extra.index')}}">Danh sách</a>
                            </li>
                            <li class={{$flag == "create_ext" ? "active" : ""}}>
                                <a href="{{route('extra.create')}}">Thêm mới</a>
                            </li>
                        </ul>
                    </li>
                    <li class={{$flag == "cat_p_l" || $flag == "cat_p_n" ? "active" : ""}}>
                        <a href="{{route('thong-tin-trang')}}">DANH MỤC</span></a>
                        <ul class="nav nav-third-level">
                            <li class={{$flag == "cat_p_l" ? "active" : ""}}>
                                <a href="{{route('list-dm')}}">Danh sách</a>
                            </li>
                            <li class={{$flag == "cat_p_n" ? "active" : ""}}>
                                <a href="{{route('create-dm')}}">Thêm mới</a>
                            </li>
                        </ul>
                    </li>
                    <li class={{$flag == "gd" ? "active" : ""}}>
                        <a href="{{route('thong-tin-trang')}}">GIAO DIỆN TRANG TỔNG</a>
                    </li>
                    
                </ul>                   
            </li>

            <li class={{$flag == "news_l" || $flag == "news_n" || $flag == "setup_news" ? "active" : ""}}>
                <a href="{{route('page-news')}}"><i class="fa fa-newspaper-o"></i> 
                    <span class="nav-label">NEWS & EVENTS</span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level collapse">
                    <li class={{$flag == "news_l" ? "active" : ""}}>
                        <a href="{{route('list-news')}}">Danh sách</a>
                    </li>
                    <li class={{$flag == "news_n" ? "active" : ""}}>
                        <a href="{{route('create-news')}}">Thêm mới</a>
                    </li>
                    <li class={{$flag == "setup_news" ? "active" : ""}}>
                        <a href="{{route('page-news')}}">GIAO DIỆN TRANG TỔNG</a>
                    </li>
                </ul>                   
            </li>

            <li class={{$flag == "brand_l" || $flag == "brand_n" || $flag == "setup_brand" ? "active" : ""}}>
                <a href="#"><i class="fa fa-fire"></i> 
                    <span class="nav-label">BRAND</span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level collapse">
                    <li class={{$flag == "brand_l" ? "active" : ""}}>
                        <a href="{{route('list-brand')}}">Danh sách</a>
                    </li>
                    <li class={{$flag == "brand_n" ? "active" : ""}}>
                        <a href="{{route('create-brand')}}">Thêm mới</a>
                    </li>
                    <li class={{$flag == "setup_brand" ? "active" : ""}}>
                        <a href="{{route('page-brand')}}">GIAO DIỆN TRANG TỔNG</a>
                    </li>
                </ul>                   
            </li>

            <li class={{$flag == "color_l" || $flag == "color_n" || $flag == "setup_color" ? "active" : ""}}>
                <a href="{{route('page-color')}}"><i class="fa fa-yelp"></i> 
                    <span class="nav-label">COLOR ZOOM</span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level collapse">                   
                    <li class={{$flag == "color_l" ? "active" : ""}}>
                        <a href="{{route('list-color')}}">Danh sách</a>
                    </li>
                    <li class={{$flag == "color_n" ? "active" : ""}}>
                        <a href="{{route('create-color')}}">Thêm mới</a>
                    </li>
                    <li class={{$flag == "setup_color" ? "active" : ""}}>
                        <a href="{{route('page-color')}}">GIAO DIỆN TRANG TỔNG</a>
                    </li>
                </ul>                   
            </li>

            <li class={{$flag == "tag_l" || $flag == "tag_n" ? "active" : ""}}>
                <a href="#"><i class="fa fa-tag"></i> 
                    <span class="nav-label">TAG</span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level collapse">
                    <li class={{$flag == "tag_l" ? "active" : ""}}>
                        <a href="#">Danh sách</a>
                    </li>
                    <li class={{$flag == "tag_n" ? "active" : ""}}>
                        <a href="#">Thêm mới</a>
                    </li>
                </ul>                   
            </li>

            <li class={{$flag == "coll_l" || $flag == "coll_n" || $flag == "media_l" || $flag == "media_n"  ? "active" : ""}}>
                <a href="#"><i class="fa fa-picture-o"></i> 
                    <span class="nav-label">BỘ SƯU TẬP</span> 
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level">
                    <li class={{$flag == "coll_l" ? "active" : ""}}><a href="{{route('coll.index')}}">Danh sách</a></li>
                    <li class={{$flag == "coll_n" ? "active" : ""}}><a href="{{route('coll.create')}}">Thêm mới</a></li>
                    <li class={{$flag == "media_l" || $flag == "media_n" ? "active" : ""}}>
                        <a href="#">ẢNH & VIDEOS</span></a>
                        <ul class="nav nav-third-level">
                            <li class={{$flag == "media_l" ? "active" : ""}}>
                                <a href="{{route('media.index')}}">Danh sách</a>
                            </li>
                            <li class={{$flag == "media_n" ? "active" : ""}}>
                                <a href="{{route('media.create')}}">Thêm mới</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>


            <li class={{$flag == "lienhe" ? "active" : ""}}>
                <a href="{{route('list-contact')}}"><i class="fa fa-tty"></i> <span class="nav-label">CONTACT</span></a>
            </li>

            <li class={{$flag == "info_page"  ? "active" : ""}}>
                <a href="#"><i class="fa fa-gears"></i> 
                    <span class="nav-label">GIAO DIỆN</span> 
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level">
                    <li class={{$flag == "info_page" ? "active" : ""}}><a href="{{route('system.index')}}">Thông tin website</a></li>          
                </ul>
            </li>
            <li class={{$flag == "gallery" ? "active" : ""}}>
                <a href="{{route('gallery')}}"><i class="fa fa-qrcode"></i> <span class="nav-label">FILE</span>  </a>
            </li>

            <li class="landing_link">
                <a target="_blank" href="{{route('homepage')}}"><i class="fa fa-globe"></i> <span class="nav-label">WEBSITE</span>
            </li>
        </ul>
    </div>
</nav>