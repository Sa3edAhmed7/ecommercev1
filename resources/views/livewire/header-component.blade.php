
					<div class="nav-section header-sticky">

					<div class="primary-nav-section">
						<div class="container">
							<ul class="nav primary clone-main-menu" id="mercado_main" data-menuname="Main menu" >
								<li class="menu-item home-icon">
									<a href="{{ route('index')}}" class="link-term mercado-item-title"><i class="fa fa-home" aria-hidden="true"></i></a>
								</li>
								@foreach($pages as $page)
								<li class="menu-item">
									<a href="{{ route('page',['title'=>$page->title]) }}" class="link-term mercado-item-title">{{$page->title}}</a>
								</li>
								@endforeach
								<li class="menu-item">
									<a href="{{ route('product.shop')}}" class="link-term mercado-item-title">Shop</a>
								</li>
								<li class="menu-item">
									<a href="{{ route('contact')}}" class="link-term mercado-item-title">Contact Us</a>
								</li>															
							</ul>
						</div>
					</div>
				</div>