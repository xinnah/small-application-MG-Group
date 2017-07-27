<style type="text/css">
    .sidebar .nav>li.nav-profile .image { width: 70%; height: auto; border-radius: 0}
    .fa-inbox{margin-right: 6px;}
</style>
<!-- begin #sidebar -->
<div id="sidebar" class="sidebar">
    <!-- begin sidebar scrollbar -->
    <div data-scrollbar="true" data-height="100%">
        <!-- begin sidebar user -->
        <ul class="nav">
            <li class="nav-profile">
                <div class="image">
                    <a href="javascript:;">
                    
                    </a>
                </div>
                <div class="info">
                    {{ Auth::user()->name }}
                </div>
            </li>
        </ul>
        <!-- end sidebar user -->
        <!-- begin sidebar nav -->
        <ul class="nav">
            <li class="nav-header">Navigation</li>

            <li><a href="{{URL::to('/dashboard')}}"><i class="fa fa-laptop"></i> <span>Dashboard</span></a></li>

            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret pull-right"></b>
                    <i class="fa fa-align-left"></i>
                    <span>Product Category</span>
                </a>

                <ul class="sub-menu">
                    <li><a href="{{ URL::to('product-category/create') }}"><i class="fa fa-location" aria-hidden="true"></i> <span>Add New Category</span></a></li>
                    
                    
                    <li><a href="{{ URL::to('product-category') }}"><i class="fa fa-location" aria-hidden="true"></i> <span>View Categories</span></a></li>
                    
                </ul>
            </li>

            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret pull-right"></b>
                    <i class="fa fa-align-left"></i>
                    <span>Products</span>
                </a>

                <ul class="sub-menu">
                    <li><a href="{{ URL::to('products/create') }}"><i class="fa fa-location" aria-hidden="true"></i> <span>Add New Product</span></a></li>
                    
                    
                    <li><a href="{{ URL::to('products') }}"><i class="fa fa-location" aria-hidden="true"></i> <span>View Products</span></a></li>
                    
                </ul>
            </li>
            
            
            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret pull-right"></b>
                    <i class="fa fa-user-o" aria-hidden="true"></i>
                    <span>My Profile</span>
                </a>
                <ul class="sub-menu">
                    <li><a href="{{URL::to('my-profile')}}">View Profile</a></li>
                    <?php $userId = Auth::user()->id; ?>
                    <li><a href='{{ URL::to("my-profile/$userId/edit")}}'>Update Profile</a></li>
                </ul>
            </li>
            
            <li><a href="{{ URL::to('logout') }}"><i class="fa fa-sign-out" aria-hidden="true"></i> <span>Logout</span></a></li>
            
            <li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
            <!-- end sidebar minify button -->
        </ul>
        <!-- end sidebar nav -->
    </div>
    <!-- end sidebar scrollbar -->
</div>
<div class="sidebar-bg"></div>
<!-- end #sidebar -->