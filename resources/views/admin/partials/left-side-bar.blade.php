 <nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
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
                <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">Bảng tin</span></span></a>
            </li>

            <li class={{$flag == "p_l" || $flag == "p_n" || $flag == "cat_p_l" || $flag == "quy_t_l" || $flag == "quy_t_n"   
                        || $flag == "cong_nghe" || $flag == "cat_p_n" || $flag == "gd" ? "active" : ""}}>
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
                    <hr/>                 
                    <li class={{$flag == "quy_t_l" || $flag == "quy_t_n" ? "active" : ""}}>
                        <a href="#">Quy trình<span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">
                            <li class={{$flag == "quy_t_l" ? "active" : ""}}>
                                <a href="">Danh sách</a>
                            </li>
                            <li class={{$flag == "quy_t_n" ? "active" : ""}}>
                                <a href="{{route('create-qt')}}">Thêm mới</a>
                            </li>
                        </ul>
                    </li>
                    <li class={{$flag == "cong_nghe" ? "active" : ""}}>
                        <a href="#">Công nghệ</a>
                    </li>
                    <li class={{$flag == "cat_p_l" || $flag == "cat_p_n" ? "active" : ""}}>
                        <a href="{{route('thong-tin-trang')}}">Danh mục Product<span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">
                            <li class={{$flag == "cat_p_l" ? "active" : ""}}>
                                <a href="{{route('list-dm')}}">Danh sách</a>
                            </li>
                            <li class={{$flag == "cat_p_n" ? "active" : ""}}>
                                <a href="{{route('create-dm')}}">Thêm mới</a>
                            </li>
                        </ul>
                    </li>
                    <hr/>
                    <li class={{$flag == "gd" ? "active" : ""}}>
                        <a href="{{route('thong-tin-trang')}}">Trang danh mục</a>
                    </li>
                    
                </ul>                   
            </li>

            <li class={{$flag == "news_l" || $flag == "news_n" || $flag == "setup_news" ? "active" : ""}}>
                <a href="{{route('page-news')}}"><i class="fa fa-newspaper-o"></i> 
                    <span class="nav-label">NEWS & EVENTS</span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level collapse">
                    <li class={{$flag == "setup_news" ? "active" : ""}}>
                        <a href="{{route('page-news')}}">Giao diện trang</a>
                    </li>
                    <li class={{$flag == "news_l" ? "active" : ""}}>
                        <a href="{{route('list-news')}}">Danh sách</a>
                    </li>
                    <li class={{$flag == "news_n" ? "active" : ""}}>
                        <a href="{{route('create-news')}}">Thêm mới</a>
                    </li>
                </ul>                   
            </li>

            <li class={{$flag == "brand_l" || $flag == "brand_n" || $flag == "setup_brand" ? "active" : ""}}>
                <a href="#"><i class="fa fa-fire"></i> 
                    <span class="nav-label">BRAND</span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level collapse">
                    <li class={{$flag == "setup_brand" ? "active" : ""}}>
                        <a href="{{route('page-brand')}}">Giao diện trang</a>
                    </li>
                    <li class={{$flag == "brand_l" ? "active" : ""}}>
                        <a href="{{route('list-brand')}}">Danh sách</a>
                    </li>
                    <li class={{$flag == "brand_n" ? "active" : ""}}>
                        <a href="{{route('create-brand')}}">Thêm mới</a>
                    </li>
                </ul>                   
            </li>

            <li class={{$flag == "color_l" || $flag == "color_n" || $flag == "setup_color" ? "active" : ""}}>
                <a href="{{route('page-color')}}"><i class="fa fa-yelp"></i> 
                    <span class="nav-label">COLOR ZOOM</span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level collapse">
                    <li class={{$flag == "setup_color" ? "active" : ""}}>
                        <a href="{{route('page-color')}}">Giao diện trang</a>
                    </li>
                    <li class={{$flag == "color_l" ? "active" : ""}}>
                        <a href="{{route('list-color')}}">Danh sách</a>
                    </li>
                    <li class={{$flag == "color_n" ? "active" : ""}}>
                        <a href="{{route('create-color')}}">Thêm mới</a>
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

            <li class={{$flag == "al_l" || $flag == "al_n" || $flag == "cat_al_n" || $flag == "cat_al_l" ? "active" : ""}}>
                <a href="#"><i class="fa fa-picture-o"></i> 
                    <span class="nav-label">ALBUM</span> 
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level">
                    <li class={{$flag == "al_l" ? "active" : ""}}><a href="#">Tất cả Album</a></li>
                    <li class={{$flag == "al_n" ? "active" : ""}}><a href="#">Thêm album mới</a></li>
                    <li class={{$flag == "cat_al_l" || $flag == "cat_al_n" ? "active" : ""}}>
                        <a href="#">Chuyên mục album <span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">
                            <li class={{$flag == "cat_al_l" ? "active" : ""}}>
                                <a href="#">Danh sách</a>
                            </li>
                            <li class={{$flag == "cat_al_n" ? "active" : ""}}>
                                <a href="#">Thêm mới</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>

            <li class={{$flag == "vi_l" || $flag == "vi_n" || $flag == "cat_vi_n" || $flag == "cat_vi_l" ? "active" : ""}}>
                <a href="#"><i class="fa fa-youtube-play"></i> 
                    <span class="nav-label">VIDEOS</span> 
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level">
                    <li class={{$flag == "vi_l" ? "active" : ""}}><a href="#">Tất cả videos</a></li>
                    <li class={{$flag == "vi_n" ? "active" : ""}}><a href="#">Thêm video mới</a></li>
                    <li class={{$flag == "cat_vi_l" || $flag == "cat_vi_n" ? "active" : ""}}>
                        <a href="#">Chuyên mục video <span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">
                            <li class={{$flag == "cat_vi_l" ? "active" : ""}}>
                                <a href="#">Danh sách</a>
                            </li>
                            <li class={{$flag == "cat_vi_n" ? "active" : ""}}>
                                <a href="#">Thêm mới</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>

            <li class={{$flag == "lienhe" ? "active" : ""}}>
                <a href="{{route('list-contact')}}"><i class="fa fa-tty"></i> <span class="nav-label">CONTACT</span></a>
            </li>

            <li class={{$flag == "lien_ket" || $flag == "banner" || $flag == "logo" 
                        || $flag == "page" || $flag == "info" ? "active" : ""}}>
                <a href="#"><i class="fa fa-gears"></i> 
                    <span class="nav-label">GIAO DIỆN</span> 
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level">
                    <li class={{$flag == "lien_ket" ? "active" : ""}}><a href="#">Trang liên kết</a></li>
                    <li class={{$flag == "banner" ? "active" : ""}}><a href="#">Banner</a></li>
                    <li class={{$flag == "logo" ? "active" : ""}}><a href="#">Logo</a></li>
                    <li class={{$flag == "page" ? "active" : ""}}><a href="#">Trang</a></li>
                    <li class={{$flag == "page" ? "active" : ""}}><a href="#">Thông tin website</a></li>                          
                </ul>
            </li>
            <li class={{$flag == "gallery" ? "active" : ""}}>
                <a href="{{route('gallery')}}"><i class="fa fa-qrcode"></i> <span class="nav-label">FILE</span>  </a>
            </li>

            <li class="landing_link">
                <a target="_blank" href=""><i class="fa fa-globe"></i> <span class="nav-label">WEBSITE</span>
            </li>
        </ul>
    </div>
</nav>