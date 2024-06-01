<div class="nav-left-sidebar sidebar-dark">
    <div class="menu-list" style="background-color: rgb(20 72 129)">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav flex-column">
                    <li class="nav-divider">
                        
                        <a class="nav-link" href="{{route('admin')}}">Menu</a>
                        <a class="nav-link" href="{{route('home')}}">Home</a>


                    </li>
                 

                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-4" aria-controls="submenu-4"><i class="fab fa-fw fa-wpforms"></i>Add Products</a>
                        <div id="submenu-4" class="collapse submenu" style="background-color: rgb(35, 69, 139); color:white">
                        <ul class="nav flex-column">
    <li class="nav-item">
        <a class="nav-link" href="{{route('vege')}}">Vegeproducts Add</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('fish')}}">Fish & Meat products Add</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('fruit')}}">Fruitproducts Add</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('dairy')}}">Dairyproducts Add</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('trendy')}}">Trendyproduct Add</a>
    </li>
    
</ul>

                        </div>
                    </li>

                    <li class="nav-item " >
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-5" aria-controls="submenu-5"><i class="fab fa-fw fa-wpforms"></i>View Products</a>
                        <div id="submenu-5" class="collapse submenu" style="background-color: rgb(35, 69, 139); color:white">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('vegelist')}}">Vegeproducts view</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('fishlist')}}">Fish & Meat products view</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('fruitlist')}}">Fruitproducts view</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('dairylist')}}">Dairyproducts view</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('trendylist')}}">Trendyproduct view</a>
                                </li>
                                
                            </ul>
                        </div>
                    </li>
                   
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-7" aria-controls="submenu-7"><i class="fab fa-fw fa-wpforms"></i>blog Data</a>
                        <div id="submenu-7" class="collapse submenu" style="background-color: rgb(35, 69, 139); color:white">
                        <ul class="nav flex-column">
                        <li class="nav-item">
        <a class="nav-link" href="{{route('blogadd')}}">Blog data Add</a>
    </li>
    <li class="nav-item">
                                    <a class="nav-link" href="{{route('bloglist')}}">Blog data view</a>
                                </li>
</ul>

                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
