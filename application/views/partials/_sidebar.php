<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- User profile -->
        <div class="user-profile" style="background: url('<?php echo base_url('/assets/img/profile-bg.jpg')?>') no-repeat;">
            <!-- User profile image -->
            <div class="profile-img"><img src="<?php echo base_url('/assets/img/default-profile.png')?>" alt="user"/></div>
            <!-- User profile text-->
            <div class="profile-text"><span
                        style="color: white !important; width: 100%; padding: 6px 30px; background: rgba(0, 0, 0, 0.5); display: block; font-size: 15px;"
                ><?php echo $_SESSION['nama'];?></span>
            </div>
        </div>
        <!-- End User profile text-->
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="nav-small-cap">MENU</li>
                <li>
                    <a href="#" aria-expanded="false"><i class="fa fa-dashboard"></i><span
                                class="hide-menu">Dasboard</span></a>
                </li>
                <li>
                    <a class="has-arrow " href="#" aria-expanded="false"><i class="mdi mdi-map-marker"></i><span
                                class="hide-menu">With Dropdown</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="map-google.html">Google Maps</a></li>
                        <li><a href="map-vector.html">Vector Maps</a></li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow " href="#" aria-expanded="false"><i
                                class="mdi mdi-arrange-send-backward"></i><span class="hide-menu">Multi level dd</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="javascript:void(0)">item 1.1</a></li>
                        <li><a href="javascript:void(0)">item 1.2</a></li>
                        <li>
                            <a class="has-arrow" href="#" aria-expanded="false">Menu 1.3</a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="javascript:void(0)">item 1.3.1</a></li>
                                <li><a href="javascript:void(0)">item 1.3.2</a></li>
                                <li><a href="javascript:void(0)">item 1.3.3</a></li>
                                <li><a href="javascript:void(0)">item 1.3.4</a></li>
                            </ul>
                        </li>
                        <li><a href="#">item 1.4</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
    <!-- Bottom points-->
    <div class="sidebar-footer">
        <!-- item-->
        <a href="#" class="link" data-toggle="tooltip" title="Settings"><i class="ti-settings"></i></a>
        <!-- item-->
        <a href="#" class="link" data-toggle="tooltip" title="Email"><i class="mdi mdi-gmail"></i></a>
        <!-- item-->
        <a href="#" class="link" data-toggle="tooltip" title="Logout"><i class="mdi mdi-power"></i></a>
    </div>
    <!-- End Bottom points-->
</aside>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->