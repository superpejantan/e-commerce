<div class="nav-top">
					<nav class="navbar navbar-default">
					
					<div class="navbar-header nav_2">
						<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
@if(Auth::guest())
<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
						<ul class="nav navbar-nav ">
							<li class=" active"><a href="{{url('/')}}" class="hyper "><span>Home</span></a></li>	
							
							<li class="dropdown ">
								<a href="#" class="dropdown-toggle  hyper" data-toggle="dropdown" ><span>Kitchen<b class="caret"></b></span></a>
								<ul class="dropdown-menu multi">
									<div class="row">
										<div class="col-sm-3">
											<ul class="multi-column-dropdown">
			
												<li><a href="kitchen.html"><i class="fa fa-angle-right" aria-hidden="true"></i>Water & Beverages</a></li>
												<li><a href="kitchen.html"><i class="fa fa-angle-right" aria-hidden="true"></i>Fruits & Vegetables</a></li>
												<li><a href="kitchen.html"> <i class="fa fa-angle-right" aria-hidden="true"></i>Staples</a></li>
												<li><a href="kitchen.html"><i class="fa fa-angle-right" aria-hidden="true"></i>Branded Food</a></li>
										
											</ul>
                                            @else
                                            <li class=" active"><a href="{{url('/')}}" class="hyper "><span>Home</span></a></li>
                                           
						</ul>
                        @endif
					</div>
					</nav>