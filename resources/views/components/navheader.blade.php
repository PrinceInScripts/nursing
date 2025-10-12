<div class="container">
							<div class="header-wrap">

								<div class="header-left">
									<div class="header-content-inner">
										<div id="page-navigation-secondary" class="navigation-secondary">
											<nav class="menu menu--secondary">
												<ul id="menu-secondary" class="menu__container sm sm-simple">
                                                    @php
                                                        $top_menus=DB::table("top_headers")
                                                                   ->whereNull('parent_id')
                                                                   ->where('status',1)
                                                                   ->orderBy('sort_order','asc')
                                                                   ->get();
                                                    @endphp

                                         

                                                    @foreach($top_menus as $menus)
                                                    <li
														class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1444 level-1"><a
															href="{{ $menus->url }}" onClick="return true"><div
																class="menu-item-wrap"><span
																	class="menu-item-title">{{ $menus->title }}</span></div></a></li>
													@endforeach
												</ul> </nav>
										</div>
									</div>
								</div>

								<div class="header-center">
									<div class="header-content-inner">
										<div class="branding">
											<div class="branding-logo-wrap">
												<a href="index.html" rel="home">
													<img
														src="../../unicamp-4437.kxcdn.com/main/wp-content/themes/unicamp/assets/images/logo/dark-logo.png"
														alt="Main"
														class="branding-logo dark-logo">
												</a>
											</div>
										</div>
									</div>
								</div>

								<div class="header-right">
									<div class="header-content-inner">
										<div id="header-right-inner" class="header-right-inner">
											<div class="header-right-inner-content">

												<div class="header-search-form">
													<form role="search" method="get" class="search-form"
														action="https://unicamp.thememove.com/main/">
														<label>
															<span class="screen-reader-text">Search for:</span>
															<input type="search" class="search-field"
																placeholder="Search&hellip;"
																value name="s"
																title="Search for:" />
														</label>
														<button type="submit" class="search-submit">
															<span class="search-btn-icon far fa-search"></span>
															<span class="search-btn-text">
																Search </span>
														</button>
													</form>
												</div>

											</div>
										</div>

										<div id="page-open-mobile-menu"
											class="header-icon page-open-mobile-menu">
											<div class="burger-icon">
												<span class="burger-icon-top"></span>
												<span class="burger-icon-bottom"></span>
											</div>
										</div>

										<div id="page-open-components"
											class="header-icon page-open-components">
											<div class="inner">
												<div class="circle circle-one"></div>
												<div class="circle circle-two"></div>
												<div class="circle circle-three"></div>
											</div>
										</div>
									</div>
								</div>

							</div>
						</div>