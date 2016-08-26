<?php 

					if(Request::is('admincp')){ ?>
						<li>

						<a href="{{ url('admincp') }}"><i class="fa fa-home" aria-hidden="true"></i></i>
							{{ (Request::is('admincp*') ? 'Dashboard' : '') }}

						</a>
					</li>
		
					<?php } else {

					 ?>
					<li>

						<a href="{{ url('admincp') }}"><i class="fa fa-home" aria-hidden="true"></i></i>
							{{ (Request::is('admincp/*') ? 'Dashboard' : '') }}

						</a>

					</li>
					<li>
		
							<a href="{{ url('admincp/user') }}">
								{{ (Request::is('admincp/user*') ? 'Tài khoản' : '')  }}
							</a>
							<a href="{{ url('admincp/menu') }}">
								{{ (Request::is('admincp/menu*') ? 'Danh mục' : '')  }}
							</a>
							{{-- project --}}
							<a href="{{ url('admincp/project') }}">
								{{ (Request::is('admincp/project*') ? 'Dự án' : '')  }}
							</a>
							{{-- cate project --}}
							<a href="{{ url('admincp/category-project') }}">
								{{ (Request::is('admincp/category-project*') ? 'Danh mục dự án' : '')  }}
							</a>
							{{-- location --}}
							<a href="{{ url('admincp/location') }}">
								{{ (Request::is('admincp/location*') ? 'Khu vực dự án' : '')  }}
							</a>

							{{-- months --}}
							<a href="{{ url('admincp/months') }}">
								{{ (Request::is('admincp/months*') ? 'Khu vực dự án' : '')  }}
							</a>

							{{-- news --}}
							<a href="{{ url('admincp/news') }}">
								{{ (Request::is('admincp/news*') ? 'Tin tức' : '')  }}
							</a>

							{{-- contact --}}
							<a href="{{ url('admincp/contact') }}">
								{{ (Request::is('admincp/contact*') ? 'Liên hệ' : '')  }}
							</a>

							{{-- slider --}}
							<a href="{{ url('admincp/slider') }}">
								{{ (Request::is('admincp/slider*') ? 'Slider' : '')  }}
							</a>

							{{-- slider --}}
							<a href="{{ url('admincp/about') }}">
								{{ (Request::is('admincp/about*') ? 'Giới thiệu' : '')  }}
							</a>
					</li>
					<li class="active">
		
								
								{{-- user --}}
								{{ (Request::is('admincp/user') ? 'Danh sách' : '')  }}
								{{ (Request::is('admincp/user/create*') ? 'Thêm' : '')  }}
								{{ (Request::is('admincp/user/*/edit*') ? 'Sửa' : '')  }}

								{{-- category --}}
								{{ (Request::is('admincp/menu') ? 'Danh sách' : '')  }}
								{{ (Request::is('admincp/menu/create*') ? 'Thêm' : '')  }}
								{{ (Request::is('admincp/menu/*/edit*') ? 'Sửa' : '')  }}

								{{-- project --}}
								{{ (Request::is('admincp/project') ? 'Danh sách' : '')  }}
								{{ (Request::is('admincp/project/create*') ? 'Thêm' : '')  }}
								{{ (Request::is('admincp/project/*/edit*') ? 'Sửa' : '')  }}
								{{-- cate project --}}
								{{ (Request::is('admincp/category-project') ? 'Danh sách' : '')  }}
								{{ (Request::is('admincp/category-project/create*') ? 'Thêm' : '')  }}
								{{ (Request::is('admincp/category-project/*/edit*') ? 'Sửa' : '')  }}

								{{-- Location --}}
								{{ (Request::is('admincp/location') ? 'Danh sách' : '')  }}
								{{ (Request::is('admincp/location/create*') ? 'Thêm' : '')  }}
								{{ (Request::is('admincp/location/*/edit*') ? 'Sửa' : '')  }}

								{{-- Months --}}
								{{ (Request::is('admincp/months') ? 'Danh sách' : '')  }}
								{{ (Request::is('admincp/months/create*') ? 'Thêm' : '')  }}
								{{ (Request::is('admincp/months/*/edit*') ? 'Sửa' : '')  }}

								{{-- News --}}
								{{ (Request::is('admincp/news') ? 'Danh sách' : '')  }}
								{{ (Request::is('admincp/news/create*') ? 'Thêm' : '')  }}
								{{ (Request::is('admincp/news/*/edit*') ? 'Sửa' : '')  }}

								{{-- Contact --}}
								{{ (Request::is('admincp/contact') ? 'Danh sách' : '')  }}
								{{ (Request::is('admincp/contact/create*') ? 'Thêm' : '')  }}
								{{ (Request::is('admincp/contact/*/edit*') ? 'Sửa' : '')  }}

								{{-- Slider --}}
								{{ (Request::is('admincp/slider') ? 'Danh sách' : '')  }}
								{{ (Request::is('admincp/slider/create*') ? 'Thêm' : '')  }}
								{{ (Request::is('admincp/slider/*/edit*') ? 'Sửa' : '')  }}

								{{-- About --}}
								{{ (Request::is('admincp/about') ? 'Danh sách' : '')  }}
								{{ (Request::is('admincp/about/create*') ? 'Thêm' : '')  }}
								{{ (Request::is('admincp/about/*/edit*') ? 'Sửa' : '')  }}

							
					</li>

					<?php } ?>