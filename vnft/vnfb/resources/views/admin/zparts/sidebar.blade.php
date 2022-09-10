<div class="left-sidebar-pro">
    <nav id="sidebar" class="">
        <div class="sidebar-header">
            <a href="{{URL('/dashboard')}}"><img class="main-logo" src="{{asset('public/server/img/custom/logo/LogoVN.webp')}}" style="height: 50px;" alt="" /></a>
            <?php
                use Illuminate\Support\Facades\Session;
                $name = Session::get('admin_name');
                if ($name) {
                    echo $name;
                } else {
                    echo 'Đăng nhập';
                }
                ?>
        </div>
        <!-- <div class="nalika-profile">
            <div class="profile-social-dtl">
                <ul class="dtl-social">
                    <li><a href="#"><i class="icon nalika-facebook"></i></a></li>
                    <li><a href="#"><i class="icon nalika-twitter"></i></a></li>
                    <li><a href="#"><i class="icon nalika-linkedin"></i></a></li>
                </ul>
            </div>
        </div> -->
        <div class="left-custom-menu-adp-wrap comment-scrollbar">
            <nav class="sidebar-nav left-sidebar-menu-pro">
                <ul class="metismenu" id="menu1">

                    <!-- sidebar banner -->
                    <li>
                        <a class="has-arrow" href="#">
                            <!-- <i class="icon nalika-home icon-wrap"></i> -->
                            <span class="material-icons">wallpaper</span>
                            <span class="mini-click-non">Banner Manage</span>
                        </a>
                        <ul class="submenu-angle" aria-expanded="false">
                            <li><a title="Add Partner" href="{{route('partner.add')}}"><span class="mini-sub-pro">Add Partner</span></a></li>
                            <li><a title="Partner List" href="{{route('partner.list')}}"><span class="mini-sub-pro">Partner List</span></a></li>
                            <li><a title="Add Slider" href="{{route('slider.add')}}"><span class="mini-sub-pro">Add Slider</span></a></li>
                            <li><a title="Slider List" href="{{route('slider.list')}}"><span class="mini-sub-pro">Slider List</span></a></li>
                        </ul>
                    </li>

                    <!-- sidebar User -->
                    <li>
                        <a class="has-arrow" href="#">
                            <!-- <i class="icon nalika-home icon-wrap"></i> -->
                            <span class="material-icons">supervisor_account</span>
                            <span class="mini-click-non">User Manage</span>
                        </a>
                        <ul class="submenu-angle" aria-expanded="false">
                            <li><a title="Add Account" href="{{route('user.add')}}"><span class="mini-sub-pro">Add Account</span></a></li>
                            <li><a title="Customer List" href="{{route('list.client')}}"><span class="mini-sub-pro">Customer List</span></a></li>
                            <li><a title="Staff List" href="{{route('list.staff')}}"><span class="mini-sub-pro">Staff List</span></a></li>
                        </ul>
                    </li>

                    <!-- sidebar Product Category -->
                    <!-- <li>
                        <a class="has-arrow" href="#"> -->
                            <!-- <i class="icon nalika-home icon-wrap"></i> -->
                            <!-- <span class="material-icons">category</span>
                            <span class="mini-click-non">Product Category Manage</span>
                        </a>
                        <ul class="submenu-angle" aria-expanded="false">
                            <li><a title="Add Product Category" href="{{('add-category-product')}}"><span class="mini-sub-pro">Add Product Category</span></a></li>
                            <li><a title="Product Category List" href="{{('list-categories-product')}}"><span class="mini-sub-pro">Product Category List</span></a></li>
                        </ul>
                    </li> -->

                    <!-- sidebar Product -->
                    <li>
                        <a class="has-arrow" href="#">
                            <!-- <i class="icon nalika-home icon-wrap"></i> -->
                            <span class="material-icons">inventory</span>
                            <span class="mini-click-non">Product Manage</span>
                        </a>
                        <ul class="submenu-angle" aria-expanded="false">
                            <li><a title="Add Product" href="{{route('product.add')}}"><span class="mini-sub-pro">Add Product</span></a></li>
                            <li><a title="Product List" href="{{route('product.list')}}"><span class="mini-sub-pro">Product List</span></a></li>
                            <li><a title="Add Product Category" href="{{route('cate.product.add')}}"><span class="mini-sub-pro">Add Product Category</span></a></li>
                            <li><a title="Product Category List" href="{{route('cate.product.list')}}"><span class="mini-sub-pro">Product Category List</span></a></li>
                        </ul>
                    </li>

                    <!-- sidebar Post Category -->
                    <!-- <li>
                        <a class="has-arrow" href="#"> -->
                            <!-- <i class="icon nalika-home icon-wrap"></i> -->
                            <!-- <span class="material-icons">category</span>
                            <span class="mini-click-non">News Category Manage</span>
                        </a>
                        <ul class="submenu-angle" aria-expanded="false">
                            <li><a title="Add Post Category" href="{{route('cate.post.add')}}"><span class="mini-sub-pro">Add Post Category</span></a></li>
                            <li><a title="Post Category List" href="{{route('cate.post.list')}}"><span class="mini-sub-pro">Post Category List</span></a></li>
                        </ul>
                    </li> -->

                    <!-- sidebar News -->
                    <li>
                        <a class="has-arrow" href="#">
                            <!-- <i class="icon nalika-home icon-wrap"></i> -->
                            <span class="material-icons">newspaper</span>
                            <span class="mini-click-non">News Manage</span>
                        </a>
                        <ul class="submenu-angle" aria-expanded="false">
                            <li><a title="Add News" href="{{route('post.add')}}"><span class="mini-sub-pro">Add News</span></a></li>
                            <li><a title="News List" href="{{route('post.list')}}"><span class="mini-sub-pro">News List</span></a></li>
                            <li><a title="Add Post Category" href="{{route('cate.post.add')}}"><span class="mini-sub-pro">Add News Category</span></a></li>
                            <li><a title="Post Category List" href="{{route('cate.post.list')}}"><span class="mini-sub-pro">News Category List</span></a></li>
                        </ul>
                    </li>

                    <!-- sidebar players -->
                    <li>
                        <a class="has-arrow" href="#">
                            <!-- <i class="icon nalika-home icon-wrap"></i> -->
                            <span class="material-icons">settings_accessibility</span>
                            <span class="mini-click-non">Player</span>
                        </a>
                        <ul class="submenu-angle" aria-expanded="false">
                            <li><a title="Player Add" href="{{route('player.add')}}"><span class="mini-sub-pro">Player Add</span></a></li>
                            <li><a title="Player List" href="{{route('player.list')}}"><span class="mini-sub-pro">Player List</span></a></li>
                            <li><a title="Player Details Add" href="{{route('player.details.add')}}"><span class="mini-sub-pro">Player Details Add</span></a></li>
                            <li><a title="Player Details List" href="{{route('player.details.list')}}"><span class="mini-sub-pro">Player Details List</span></a></li>
                        </ul>
                    </li>

                    <!-- sidebar tickets -->
                    <li>
                        <a class="has-arrow" href="#">
                            <!-- <i class="icon nalika-home icon-wrap"></i> -->
                            <span class="material-icons">confirmation_number</span>
                            <span class="mini-click-non">Tickets</span>
                        </a>
                        <ul class="submenu-angle" aria-expanded="false">
                            <li><a title="Tickets List" href="{{route('ticket.list')}}"><span class="mini-sub-pro">Tickets List</span></a></li>
                        </ul>
                    </li>

                    <!-- sidebar matches -->
                    <li>
                        <a class="has-arrow" href="#">
                            <!-- <i class="icon nalika-home icon-wrap"></i> -->
                            <span class="material-icons">sports_soccer</span>
                            <span class="mini-click-non">Matches</span>
                        </a>
                        <ul class="submenu-angle" aria-expanded="false">
                            <!-- <li><a title="Add Match" href="{{route('match.add')}}"><span class="mini-sub-pro">Match Add</span></a></li> -->
                            <li><a title="List Match" href="{{route('match.list')}}"><span class="mini-sub-pro">Match List</span></a></li>
                            <!-- <li><a title="Add Tournament" href="{{route('tournament.add')}}"><span class="mini-sub-pro">Tournament Add</span></a></li> -->
                            <li><a title="List Tournament" href="{{route('tournament.list')}}"><span class="mini-sub-pro">Tournament List</span></a></li>
                            <!-- <li><a title="Add Team" href="{{route('team.add')}}"><span class="mini-sub-pro">Team Add</span></a></li> -->
                            <li><a title="List Team" href="{{route('team.list')}}"><span class="mini-sub-pro">Team List</span></a></li>
                        </ul>
                    </li>

                    <!-- sidebar order -->
                    <li>
                        <a class="has-arrow" href="#">
                            <!-- <i class="icon nalika-home icon-wrap"></i> -->
                            <span class="material-icons">shopping_bag</span>
                            <span class="mini-click-non">Orders Manage</span>
                        </a>
                        <ul class="submenu-angle" aria-expanded="true">
                            <li><a title="Waiting orders" href="{{route('order.waiting')}}"><span class="mini-sub-pro">Waiting orders</span></a></li>
                            <li><a title="Handled orders" href="{{route('order.handled')}}"><span class="mini-sub-pro">Handled orders</span></a></li>
                        </ul>
                    </li>
                    
                    <!-- sidebar Coupon -->
                    <li>
                        <a class="has-arrow" href="#">
                            <!-- <i class="icon nalika-home icon-wrap"></i> -->
                            <span class="material-icons">local_activity</span>
                            <span class="mini-click-non">Coupon Manage</span>
                        </a>
                        <ul class="submenu-angle" aria-expanded="false">
                            <li><a title="Add Coupon" href="{{route('coupon.add')}}"><span class="mini-sub-pro">Add Coupon</span></a></li>
                            <li><a title="Coupon List" href="{{route('coupon.list')}}"><span class="mini-sub-pro">Coupon List</span></a></li>
                        </ul>
                    </li>

                    <!-- sidebar Delivery -->
                    <li>
                        <a class="has-arrow" href="#">
                            <!-- <i class="icon nalika-home icon-wrap"></i> -->
                            <span class="material-icons">local_shipping</span>
                            <span class="mini-click-non">Delivery Manage</span>
                        </a>
                        <ul class="submenu-angle" aria-expanded="false">
                            <li><a title="Delivery Manage" href="{{route('delivery')}}"><span class="mini-sub-pro">Delivery Manage</span></a></li>
                        </ul>
                    </li>

                    <!-- <li id="removable">
                        <a class="has-arrow" href="#" aria-expanded="false">
                            <i class="icon nalika-new-file icon-wrap"></i>
                            <span class="material-icons">manage_accounts</span>
                             <span class="mini-click-non">Pages</span></a>
                        <ul class="submenu-angle" aria-expanded="false">
                            <li><a title="Login" href="#"><span class="mini-sub-pro">Login</span></a></li>
                            <li><a title="Register" href="#"><span class="mini-sub-pro">Register</span></a></li>
                            <li><a title="Lock" href="#"><span class="mini-sub-pro">Lock</span></a></li>
                            <li><a title="Password Recovery" href="#"><span class="mini-sub-pro">Password Recovery</span></a></li>
                        </ul>
                    </li> -->
                </ul>
            </nav>
        </div>
    </nav>
</div>