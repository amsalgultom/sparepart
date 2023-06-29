	<!-- header section start -->
	<header>
		<div class="header-top">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<div class="left floatleft">
							<ul>
								<li>
									<i class="fa fa-phone"></i>
									+62 822 1093 3929
								</li>
								<li>
									<i class="fa fa-envelope-o"></i>
									pelitanusawiratama@mail.com
								</li>
							</ul>
						</div>
						<div class="right floatright">
							<ul>
								<li>
									<i class="fa fa-user"></i>
									@if(Auth::user())
									<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
									<form id="logout-form" style="display: none;" action="{{ route('logout') }}" method="POST">
										@csrf
									</form>
									@else
									<a href="{{ route('login') }}">Account</a>
									@endif
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="sticky-menu" class="header-bottom">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 header-bottom-bg">
						<div class="logo floatleft">
							<a href="/">
								<img src="{{ asset('assets/img/logo.jpg') }}" width="50" alt="Rideo" />
							</a>
						</div>
						<div class="mainmenu text-center floatleft">
							<nav>
								<ul>
									<li>
										<a href="/">Beranda</a>
									</li>
									<li>
										<a href="/tentang-kami">Tentang Kami</a>
									</li>
									<li>
										<a href="/semua-item">Item Sparepart</a>
									</li>
									<li>
										<a href="/kontak-kami">Kontak</a>
									</li>
									@if(Auth::user() && Auth::user()->role == 'customer')
									<li>
										<a href="{{ route('orders.myorders',Auth::user()->id) }}">My Order</a>
									</li>
									<li>
										<a href="{{ route('user.myaccount',Auth::user()->id) }}">My Account</a>
									</li>
									@endif
									@if(Auth::user() && Auth::user()->role == 'admin')
									<li>
										<a href="{{ route('admin.dashboard') }}">Admin Dashboard</a>
									</li>
									@endif
								</ul>
							</nav>
						</div>
						<!-- mobile menu start -->
						<div class="mobile-menu-area">
							<div class="mobile-menu">
								<nav id="dropdown">
									<ul>
										<li>
											<a href="">Home</a>
										</li>
										<li>
											<a href="#">Tentang Kami</a>
										</li>
										<li>
											<a href="#">Produk</a>
										</li>
										<li>
											<a href="#">Kontak</a>
										</li>
										<li>
											<a href="#">My Order</a>
										</li>
									</ul>
								</nav>
							</div>
						</div>
						<!-- mobile menu end -->
						<div class="cart-menu-area floatright">
							<ul>
								@if(Auth::user())
								<li>
									<a href="{{ route('carts.index',Auth::user()->id) }}"><i class="pe-7s-shopbag"></i></a>
								</li>
								@else
								<li>
									<a href="{{ route('login') }}"><i class="pe-7s-shopbag"></i></a>
								</li>
								@endif
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
	<!-- header section end -->