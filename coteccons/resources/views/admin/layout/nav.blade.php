<div class="sidebar-menu">

		<div class="sidebar-menu-inner">
			
			<header class="logo-env">

				<!-- logo -->
				<div class="logo">
					{{-- <a href="index.html">
						<img src="assets/images/logo@2x.png" width="120" alt="" />
					</a> --}}
				</div>

				<!-- logo collapse icon -->
				<div class="sidebar-collapse">
					<a href="#" class="sidebar-collapse-icon"><!-- add class "with-animation" if you want sidebar to have animation during expanding/collapsing transition -->
						<i class="entypo-menu"></i>
					</a>
				</div>

								
				<!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
				<div class="sidebar-mobile-menu visible-xs">
					<a href="#" class="with-animation"><!-- add class "with-animation" to support animation -->
						<i class="entypo-menu"></i>
					</a>
				</div>

			</header>
			
									
			<ul id="main-menu" class="main-menu">
				<!-- add class "multiple-expanded" to allow multiple submenus to open -->
				<!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->
				
									<li {{{ (Request::is('admincp') ? 'class=active' : '') }}} class="has-sub">
										<a href="{{ url('admincp') }}">
											<i class="entypo-gauge"></i>
											<span class="title">Dashboard</span>
										</a>
										
									</li>
									<li {{{ (Request::is('admincp/user*') ? 'class=opened' : '') }}} class="has-sub">
										<a href="layout-api.html">
											<i class="entypo-layout"></i>
											<span class="title">Tài khoản</span>
										</a>
										<ul>
											<li {{{ (Request::is('admincp/user') ? 'class=active' : '') }}}>
												<a href="{{ URL::to('admincp/user') }}">
													<span class="title">Danh sách</span>
												</a>
											</li>
											<li {{{ (Request::is('admincp/user/create') ? 'class=active' : '') }}}>
												<a href="{{ URL::to('admincp/user/create') }}">
													<span class="title">Thêm mới</span>
												</a>
											</li>
											
											
											
										</ul>
									</li>
									
									
								
									<li {{{ (Request::is('admincp/menu*') ? 'class=opened' : '') }}} class="has-sub">
										<a href="layout-api.html">
											<i class="entypo-layout"></i>
											<span class="title">Menu</span>
										</a>
										<ul>
											<li {{{ (Request::is('admincp/menu') ? 'class=active' : '') }}}>
												<a href="{{ URL::to('admincp/menu') }}">
													<span class="title">Danh sách</span>
												</a>
											</li>
											<li {{{ (Request::is('admincp/menu/create') ? 'class=active' : '') }}}>
												<a href="{{ URL::to('admincp/menu/create') }}">
													<span class="title">Thêm mới</span>
												</a>
											</li>
											
											
											
										</ul>
									</li>
									<li {{{ (Request::is('admincp/category-project*') ? 'class=opened' : '') }}}
										{{{ (Request::is('admincp/months*') ? 'class=opened' : '') }}}
										{{{ (Request::is('admincp/location*') ? 'class=opened' : '') }}}
										{{{ (Request::is('admincp/project*') ? 'class=opened' : '') }}}

										class="has-sub">
										<a href="layout-api.html">
											<i class="entypo-layout"></i>
											<span class="title">Dự án</span>
										</a>
										<ul>
											<li {{{ (Request::is('admincp/category-project') ? 'class=active' : '') }}}>
												<a href="{{ URL::to('admincp/category-project') }}">
													<span class="title">Danh mục</span>
												</a>
											</li>
											<li {{{ (Request::is('admincp/category-project/create') ? 'class=active' : '') }}}>
												<a href="{{ URL::to('admincp/category-project/create') }}">
													<span class="title">Thêm mới danh mục</span>
												</a>
											</li>
											<li {{{ (Request::is('admincp/months') ? 'class=active' : '') }}}>
												<a href="{{ URL::to('admincp/months') }}">
													<span class="title">Năm</span>
												</a>
											</li>
											<li {{{ (Request::is('admincp/months/create') ? 'class=active' : '') }}}>
												<a href="{{ URL::to('admincp/months/create') }}">
													<span class="title">Thêm năm</span>
												</a>
											</li>
											<li {{{ (Request::is('admincp/location') ? 'class=active' : '') }}}>
												<a href="{{ URL::to('admincp/location') }}">
													<span class="title">Khu vực</span>
												</a>
											</li>
											<li {{{ (Request::is('admincp/location/create') ? 'class=active' : '') }}}>
												<a href="{{ URL::to('admincp/location/create') }}">
													<span class="title">Thêm khu vực</span>
												</a>
											</li>
											<li {{{ (Request::is('admincp/project') ? 'class=active' : '') }}}>
												<a href="{{ URL::to('admincp/project') }}">
													<span class="title">Danh sách dự án</span>
												</a>
											</li>
											<li {{{ (Request::is('admincp/project/create') ? 'class=active' : '') }}}>
												<a href="{{ URL::to('admincp/project/create') }}">
													<span class="title">Thêm mới dự án</span>
												</a>
											</li>
											
											
											
										</ul>

									</li>
								<li {{{ (Request::is('admincp/news*') ? 'class=opened' : '') }}} class="has-sub">
										<a href="layout-api.html">
											<i class="entypo-layout"></i>
											<span class="title">Tin tức</span>
										</a>
										<ul>
											<li {{{ (Request::is('admincp/news') ? 'class=active' : '') }}}>
												<a href="{{ URL::to('admincp/news') }}">
													<span class="title">Danh sách</span>
												</a>
											</li>
											<li {{{ (Request::is('admincp/news/create') ? 'class=active' : '') }}}>
												<a href="{{ URL::to('admincp/news/create') }}">
													<span class="title">Thêm mới</span>
												</a>
											</li>
											
											
											
										</ul>
									</li>

								<li {{{ (Request::is('admincp/contact*') ? 'class=opened' : '') }}} class="has-sub">
									<a href="layout-api.html">
										<i class="entypo-layout"></i>
										<span class="title">Liên Hệ</span>
									</a>
									<ul>
										<li {{{ (Request::is('admincp/contact') ? 'class=active' : '') }}}>
											<a href="{{ URL::to('admincp/contact') }}">
												<span class="title">Danh sách</span>
											</a>
										</li>
										<li {{{ (Request::is('admincp/contact/create') ? 'class=active' : '') }}}>
											<a href="{{ URL::to('admincp/contact/create') }}">
												<span class="title">Thêm mới</span>
											</a>
										</li>



									</ul>
								</li>

								<li {{{ (Request::is('admincp/slider*') ? 'class=opened' : '') }}} class="has-sub">
									<a href="layout-api.html">
										<i class="entypo-layout"></i>
										<span class="title">Slider</span>
									</a>
									<ul>
										<li {{{ (Request::is('admincp/slider') ? 'class=active' : '') }}}>
											<a href="{{ URL::to('admincp/slider') }}">
												<span class="title">Danh sách</span>
											</a>
										</li>
										<li {{{ (Request::is('admincp/slider/create') ? 'class=active' : '') }}}>
											<a href="{{ URL::to('admincp/slider/create') }}">
												<span class="title">Thêm mới</span>
											</a>
										</li>



									</ul>
								</li>

								<li {{{ (Request::is('admincp/about*') ? 'class=opened' : '') }}} class="has-sub">
									<a href="layout-api.html">
										<i class="entypo-layout"></i>
										<span class="title">Giới Thiệu</span>
									</a>
									<ul>
										<li {{{ (Request::is('admincp/about') ? 'class=active' : '') }}}>
											<a href="{{ URL::to('admincp/about') }}">
												<span class="title">Danh sách</span>
											</a>
										</li>
										<li {{{ (Request::is('admincp/about/create') ? 'class=active' : '') }}}>
											<a href="{{ URL::to('admincp/about/create') }}">
												<span class="title">Thêm mới</span>
											</a>
										</li>



									</ul>
								</li>
								



				
				
				
			</ul>
			
		</div>

	</div>