<header id="page-header" class="page-header header-06 header-dark nav-links-hover-style-01 header-sticky-dark-logo">
    <div class="page-header-place-holder"></div>
    <div id="page-header-inner" class="page-header-inner" data-sticky="1">

        <x-navheader />

        <div class="header-bottom">
            <div class="container">
                <div id="page-navigation" class="navigation page-navigation">
                    <nav id="menu" class="menu menu--primary">
                        @php
                            $menus = DB::table('menus')
                                ->whereNull('parent_id')
                                ->where('status', 1)
                                ->orderBy('sort_order', 'asc')
                                ->get();
                        @endphp
                      
                        <ul id="menu-primary" class="menu__container sm sm-simple">
                            @foreach ($menus as $menu)
                                @php
                                    $submenus = DB::table('menus')
                                        ->where('parent_id', $menu->id)
                                        ->where('status', 1)
                                        ->orderBy('sort_order', 'asc')
                                        ->get();
                                @endphp
                                <li
                                    class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home current-menu-ancestor current-menu-parent menu-item-has-children menu-item-53 level-1">
                                    @if ($submenus->isEmpty())
                                        <a href="{{ $menu->url }}" onClick="return true">
                                            <div class="menu-item-wrap"><span
                                                    class="menu-item-title">{{ $menu->title }}</span></div>
                                        </a>
                                    @else
                                        <a href="{{ $menu->title }}" onClick="return true">
                                            <div class="menu-item-wrap"><span
                                                    class="menu-item-title">{{ $menu->title }}</span><span
                                                    class="toggle-sub-menu"></span></div>
                                        </a>
                                        <ul class="sub-menu children simple-menu">
                                            @foreach ($submenus as $submenu)
                                                <li
                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-2136 current_page_item menu-item-2161">
                                                    <a href="{{ $submenu->title }}" onClick="return true">
                                                        <div class="menu-item-wrap"><span
                                                                class="menu-item-title">{{ $submenu->title }}</span>
                                                        </div>
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif

                                </li>
                            @endforeach
                            {{-- <li
												class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home current-menu-ancestor current-menu-parent menu-item-has-children menu-item-53 level-1"><a
													href="index.html" onClick="return true"><div
														class="menu-item-wrap"><span
															class="menu-item-title">Home</span><span class="toggle-sub-menu">
														</span></div></a>
                                                    <ul class="sub-menu children simple-menu"> 
                                                        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-2136 current_page_item menu-item-2161"><a
															href="index.html" onClick="return true"><div
																class="menu-item-wrap"><span class="menu-item-title">University
																	01</span></div></a>
                                                        </li>
												
												    </ul>
											</li> --}}

                        </ul>
                        {{-- <ul id="menu-primary" class="menu__container sm sm-simple">
                                            <li
												class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home current-menu-ancestor current-menu-parent menu-item-has-children menu-item-53 level-1"><a
													href="index.html" onClick="return true"><div
														class="menu-item-wrap"><span
															class="menu-item-title">Home</span><span class="toggle-sub-menu">
														</span></div></a><ul class="sub-menu children simple-menu"> <li
														class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-2136 current_page_item menu-item-2161"><a
															href="index.html" onClick="return true"><div
																class="menu-item-wrap"><span class="menu-item-title">University
																	01</span></div></a></li>
													<li
														class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2268"><a
															href="university-02/index.html" onClick="return true"><div
																class="menu-item-wrap"><span class="menu-item-title">University
																	02</span></div></a></li>
													<li
														class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2408"><a
															href="university-03/index.html" onClick="return true"><div
																class="menu-item-wrap"><span class="menu-item-title">University
																	03</span></div></a></li>
													<li
														class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2587"><a
															href="university-04/index.html" onClick="return true"><div
																class="menu-item-wrap"><span class="menu-item-title">University
																	04</span></div></a></li>
													<li
														class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2731"><a
															href="college-01/index.html" onClick="return true"><div
																class="menu-item-wrap"><span class="menu-item-title">College
																	01</span></div></a></li>
													<li
														class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2842"><a
															href="college-02/index.html" onClick="return true"><div
																class="menu-item-wrap"><span class="menu-item-title">College
																	02</span></div></a></li>
												</ul>
											</li>
											<li
												class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-461 level-1"><a
													href="academics/index.html" onClick="return true"><div
														class="menu-item-wrap"><span
															class="menu-item-title">Academics</span><span
															class="toggle-sub-menu"> </span></div></a><ul
													class="sub-menu children simple-menu"> <li
														class="menu-item menu-item-type-post_type menu-item-object-page menu-item-462"><a
															href="academics/index.html" onClick="return true"><div
																class="menu-item-wrap"><span
																	class="menu-item-title">Academics</span></div></a></li>
													<li
														class="menu-item menu-item-type-post_type menu-item-object-page menu-item-460"><a
															href="academics-02/index.html" onClick="return true"><div
																class="menu-item-wrap"><span class="menu-item-title">Academics
																	02</span></div></a></li>
													<li
														class="menu-item menu-item-type-custom menu-item-object-custom menu-item-3104"><a
															href="majors-and-programs/index.html" onClick="return true"><div
																class="menu-item-wrap"><span class="menu-item-title">Majors
																	01</span></div></a></li>
													<li
														class="menu-item menu-item-type-custom menu-item-object-custom menu-item-25"><a
															href="majors-and-programs/index0533.html?course_category_preset=02"
															onClick="return true"><div class="menu-item-wrap"><span
																	class="menu-item-title">Majors 02</span></div></a></li>
													<li
														class="menu-item menu-item-type-custom menu-item-object-custom menu-item-26"><a
															href="majors-and-programs/index08be.html?course_category_preset=03"
															onClick="return true"><div class="menu-item-wrap"><span
																	class="menu-item-title">Majors 03</span></div></a></li>
												</ul>
											</li>
											<li
												class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-695 level-1"><a
													href="admissions/index.html" onClick="return true"><div
														class="menu-item-wrap"><span
															class="menu-item-title">Admissions</span><span
															class="toggle-sub-menu"> </span></div></a><ul
													class="sub-menu children simple-menu"> <li
														class="menu-item menu-item-type-post_type menu-item-object-page menu-item-694"><a
															href="undergraduate-admission/index.html"
															onClick="return true"><div class="menu-item-wrap"><span
																	class="menu-item-title">Undergraduate
																	Admission</span></div></a></li>
													<li
														class="menu-item menu-item-type-post_type menu-item-object-page menu-item-3427"><a
															href="graduate-admission/index.html" onClick="return true"><div
																class="menu-item-wrap"><span class="menu-item-title">Graduate
																	Admission</span></div></a></li>
												</ul>
											</li>
											<li
												class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1614 level-1"><a
													href="research/index.html" onClick="return true"><div
														class="menu-item-wrap"><span
															class="menu-item-title">Research</span></div></a></li>
											<li
												class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-45 level-1"><a
													href="#" onClick="return true"><div class="menu-item-wrap"><span
															class="menu-item-title">Pages</span><span
															class="toggle-sub-menu"> </span></div></a><ul
													class="sub-menu children simple-menu"> <li
														class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1782"><a
															href="about/index.html" onClick="return true"><div
																class="menu-item-wrap"><span
																	class="menu-item-title">About</span></div></a></li>
													<li
														class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1066"><a
															href="contact/index.html" onClick="return true"><div
																class="menu-item-wrap"><span
																	class="menu-item-title">Contact</span></div></a></li>
													<li
														class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1481"><a
															href="campus-life/index.html" onClick="return true"><div
																class="menu-item-wrap"><span class="menu-item-title">Campus
																	Life</span></div></a></li>
													<li
														class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2965"><a
															href="request-info/index.html" onClick="return true"><div
																class="menu-item-wrap"><span class="menu-item-title">Request
																	Info</span></div></a></li>
													<li
														class="menu-item menu-item-type-post_type menu-item-object-page menu-item-885"><a
															href="library/index.html" onClick="return true"><div
																class="menu-item-wrap"><span
																	class="menu-item-title">Library</span></div></a></li>
													<li
														class="menu-item menu-item-type-post_type menu-item-object-page menu-item-3088"><a
															href="apply/index.html" onClick="return true"><div
																class="menu-item-wrap"><span
																	class="menu-item-title">Apply</span></div></a></li>
													<li
														class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1073"><a
															href="careers/index.html" onClick="return true"><div
																class="menu-item-wrap"><span
																	class="menu-item-title">Careers</span></div></a></li>
													<li
														class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1150"><a
															href="give-to-unicamp/index.html" onClick="return true"><div
																class="menu-item-wrap"><span class="menu-item-title">Give to
																	UniCamp</span></div></a></li>
													<li
														class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-3185"><a
															href="courses/index.html" onClick="return true"><div
																class="menu-item-wrap"><span
																	class="menu-item-title">Courses</span><span
																	class="toggle-sub-menu"> </span></div></a> <ul
															class="sub-menu children simple-menu"> <li
																class="menu-item menu-item-type-custom menu-item-object-custom menu-item-3189"><a
																	href="courses/index06f9.html?course_archive_preset=01"
																	onClick="return true"><div class="menu-item-wrap"><span
																			class="menu-item-title">Layout 01</span></div></a></li>
															<li
																class="menu-item menu-item-type-custom menu-item-object-custom menu-item-3190"><a
																	href="courses/index7219.html?course_archive_preset=02"
																	onClick="return true"><div class="menu-item-wrap"><span
																			class="menu-item-title">Layout 02</span></div></a></li>
															<li
																class="menu-item menu-item-type-custom menu-item-object-custom menu-item-3191"><a
																	href="courses/index95f2.html?course_archive_preset=03"
																	onClick="return true"><div class="menu-item-wrap"><span
																			class="menu-item-title">Layout 03</span></div></a></li>
															<li
																class="menu-item menu-item-type-custom menu-item-object-custom menu-item-3192"><a
																	href="courses/index2842.html?course_archive_preset=04"
																	onClick="return true"><div class="menu-item-wrap"><span
																			class="menu-item-title">Layout 04</span></div></a></li>
															<li
																class="menu-item menu-item-type-custom menu-item-object-custom menu-item-3193"><a
																	href="courses/index7a2c.html?course_archive_preset=05"
																	onClick="return true"><div class="menu-item-wrap"><span
																			class="menu-item-title">Layout 05</span></div></a></li>
															<li
																class="menu-item menu-item-type-custom menu-item-object-custom menu-item-3194"><a
																	href="courses/index81ea.html?course_archive_preset=06"
																	onClick="return true"><div class="menu-item-wrap"><span
																			class="menu-item-title">Layout 06</span></div></a></li>
															<li
																class="menu-item menu-item-type-custom menu-item-object-custom menu-item-3195"><a
																	href="courses/indexe0e9.html?course_archive_preset=07"
																	onClick="return true"><div class="menu-item-wrap"><span
																			class="menu-item-title">Layout 07</span></div></a></li>
															<li
																class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-3180"><a
																	href="#" onClick="return true"><div
																		class="menu-item-wrap"><span class="menu-item-title">Single
																			Layouts</span><span class="toggle-sub-menu">
																		</span></div></a> <ul class="sub-menu children simple-menu">
																	<li
																		class="menu-item menu-item-type-custom menu-item-object-custom menu-item-3181"><a
																			href="courses/the-entrepreneurs-guide-for-beginners/index0002.html?course_single_preset=01"
																			onClick="return true"><div class="menu-item-wrap"><span
																					class="menu-item-title">Layout 01</span></div></a></li>
																	<li
																		class="menu-item menu-item-type-custom menu-item-object-custom menu-item-3182"><a
																			href="courses/the-entrepreneurs-guide-for-beginners/index1e95.html?course_single_preset=02"
																			onClick="return true"><div class="menu-item-wrap"><span
																					class="menu-item-title">Layout 02</span></div></a></li>
																	<li
																		class="menu-item menu-item-type-custom menu-item-object-custom menu-item-3183"><a
																			href="courses/the-entrepreneurs-guide-for-beginners/index543f.html?course_single_preset=03"
																			onClick="return true"><div class="menu-item-wrap"><span
																					class="menu-item-title">Layout 03</span></div></a></li>
																	<li
																		class="menu-item menu-item-type-custom menu-item-object-custom menu-item-3184"><a
																			href="courses/the-entrepreneurs-guide-for-beginners/index42d9.html?course_single_preset=04"
																			onClick="return true"><div class="menu-item-wrap"><span
																					class="menu-item-title">Layout 04</span></div></a></li>
																</ul>
															</li>
														</ul>
													</li>
													<li
														class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-48"><a
															href="blog/index.html" onClick="return true"><div
																class="menu-item-wrap"><span
																	class="menu-item-title">Blog</span><span
																	class="toggle-sub-menu"> </span></div></a> <ul
															class="sub-menu children simple-menu"> <li
																class="menu-item menu-item-type-custom menu-item-object-custom menu-item-105"><a
																	href="blog/index5870.html?blog_archive_preset=grid-01"
																	onClick="return true"><div class="menu-item-wrap"><span
																			class="menu-item-title">Grid Layout 01</span></div></a></li>
															<li
																class="menu-item menu-item-type-custom menu-item-object-custom menu-item-106"><a
																	href="blog/index8b19.html?blog_archive_preset=grid-02"
																	onClick="return true"><div class="menu-item-wrap"><span
																			class="menu-item-title">Grid Layout 02</span></div></a></li>
															<li
																class="menu-item menu-item-type-custom menu-item-object-custom menu-item-107"><a
																	href="blog/index1b60.html?blog_archive_preset=grid-03"
																	onClick="return true"><div class="menu-item-wrap"><span
																			class="menu-item-title">Grid Layout 03</span></div></a></li>
															<li
																class="menu-item menu-item-type-custom menu-item-object-custom menu-item-108"><a
																	href="blog/index7898.html?blog_archive_preset=grid-04"
																	onClick="return true"><div class="menu-item-wrap"><span
																			class="menu-item-title">Grid Layout 04</span></div></a></li>
															<li
																class="menu-item menu-item-type-custom menu-item-object-custom menu-item-104"><a
																	href="blog/index1613.html?blog_archive_preset=list-01"
																	onClick="return true"><div class="menu-item-wrap"><span
																			class="menu-item-title">List Layout 01</span></div></a></li>
															<li
																class="menu-item menu-item-type-custom menu-item-object-custom menu-item-103"><a
																	href="blog/indexabc2.html?blog_archive_preset=list-02"
																	onClick="return true"><div class="menu-item-wrap"><span
																			class="menu-item-title">List Layout 02</span></div></a></li>
															<li
																class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-52"><a
																	href="#" onClick="return true"><div
																		class="menu-item-wrap"><span class="menu-item-title">Single
																			Layouts</span><span class="toggle-sub-menu">
																		</span></div></a> <ul class="sub-menu children simple-menu">
																	<li
																		class="menu-item menu-item-type-custom menu-item-object-custom menu-item-49"><a
																			href="how-to-harness-the-power-of-online-learning/index6d25.html?single_post_preset=left-sidebar"
																			onClick="return true"><div class="menu-item-wrap"><span
																					class="menu-item-title">Left Sidebar</span></div></a></li>
																	<li
																		class="menu-item menu-item-type-custom menu-item-object-custom menu-item-50"><a
																			href="how-to-harness-the-power-of-online-learning/index6d25.html?single_post_preset=left-sidebar"
																			onClick="return true"><div class="menu-item-wrap"><span
																					class="menu-item-title">Right Sidebar</span></div></a></li>
																	<li
																		class="menu-item menu-item-type-custom menu-item-object-custom menu-item-51"><a
																			href="how-to-harness-the-power-of-online-learning/index41da.html?single_post_preset=no-sidebar"
																			onClick="return true"><div class="menu-item-wrap"><span
																					class="menu-item-title">No Sidebar</span></div></a></li>
																</ul>
															</li>
														</ul>
													</li>
													<li
														class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-3151"><a
															href="shop/index.html" onClick="return true"><div
																class="menu-item-wrap"><span
																	class="menu-item-title">Shop</span><span
																	class="toggle-sub-menu"> </span></div></a> <ul
															class="sub-menu children simple-menu"> <li
																class="menu-item menu-item-type-custom menu-item-object-custom menu-item-3163"><a
																	href="shop/index37ed.html?shop_archive_preset=01"
																	onClick="return true"><div class="menu-item-wrap"><span
																			class="menu-item-title">Layout 01</span></div></a></li>
															<li
																class="menu-item menu-item-type-custom menu-item-object-custom menu-item-3164"><a
																	href="shop/indexbf0e.html?shop_archive_preset=02"
																	onClick="return true"><div class="menu-item-wrap"><span
																			class="menu-item-title">Layout 02</span></div></a></li>
															<li
																class="menu-item menu-item-type-custom menu-item-object-custom menu-item-3165"><a
																	href="shop/index2310.html?shop_archive_preset=03"
																	onClick="return true"><div class="menu-item-wrap"><span
																			class="menu-item-title">Layout 03</span></div></a></li>
															<li
																class="menu-item menu-item-type-post_type menu-item-object-page menu-item-3152"><a
																	href="cart/index.html" onClick="return true"><div
																		class="menu-item-wrap"><span
																			class="menu-item-title">Cart</span></div></a></li>
															<li
																class="menu-item menu-item-type-post_type menu-item-object-page menu-item-3153"><a
																	href="checkout/index.html" onClick="return true"><div
																		class="menu-item-wrap"><span
																			class="menu-item-title">Checkout</span></div></a></li>
															<li
																class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-3154"><a
																	href="#" onClick="return true"><div
																		class="menu-item-wrap"><span class="menu-item-title">Single
																			Layouts</span><span class="toggle-sub-menu">
																		</span></div></a> <ul class="sub-menu children simple-menu">
																	<li
																		class="menu-item menu-item-type-custom menu-item-object-custom menu-item-3225"><a
																			href="product/unicamp-hoodie/index0441.html?shop_single_preset=list-left-sidebar"
																			onClick="return true"><div class="menu-item-wrap"><span
																					class="menu-item-title">List &#8211; Left
																					Sidebar</span></div></a></li>
																	<li
																		class="menu-item menu-item-type-custom menu-item-object-custom menu-item-3226"><a
																			href="product/unicamp-hoodie/index3956.html?shop_single_preset=list-right-sidebar"
																			onClick="return true"><div class="menu-item-wrap"><span
																					class="menu-item-title">List &#8211; Right
																					Sidebar</span></div></a></li>
																	<li
																		class="menu-item menu-item-type-custom menu-item-object-custom menu-item-3227"><a
																			href="product/unicamp-hoodie/indexe3c2.html?shop_single_preset=list-no-sidebar"
																			onClick="return true"><div class="menu-item-wrap"><span
																					class="menu-item-title">List &#8211; No
																					Sidebar</span></div></a></li>
																	<li
																		class="menu-item menu-item-type-custom menu-item-object-custom menu-item-3228"><a
																			href="product/unicamp-hoodie/index1428.html?shop_single_preset=tabs-left-sidebar"
																			onClick="return true"><div class="menu-item-wrap"><span
																					class="menu-item-title">Tabs &#8211; Left
																					Sidebar</span></div></a></li>
																	<li
																		class="menu-item menu-item-type-custom menu-item-object-custom menu-item-3229"><a
																			href="product/unicamp-hoodie/index34db.html?shop_single_preset=tabs-right-sidebar"
																			onClick="return true"><div class="menu-item-wrap"><span
																					class="menu-item-title">Tabs &#8211; Right
																					Sidebar</span></div></a></li>
																	<li
																		class="menu-item menu-item-type-custom menu-item-object-custom menu-item-3230"><a
																			href="product/unicamp-hoodie/index477b.html?shop_single_preset=tabs-no-sidebar"
																			onClick="return true"><div class="menu-item-wrap"><span
																					class="menu-item-title">Tabs &#8211; No
																					Sidebar</span></div></a></li>
																</ul>
															</li>
														</ul>
													</li>
													<li
														class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-66"><a
															href="events/index.html" onClick="return true"><div
																class="menu-item-wrap"><span
																	class="menu-item-title">Events</span><span
																	class="toggle-sub-menu"> </span></div></a> <ul
															class="sub-menu children simple-menu"> <li
																class="menu-item menu-item-type-custom menu-item-object-custom menu-item-174"><a
																	href="events/indexf17a.html?event_archive_preset=grid-01"
																	onClick="return true"><div class="menu-item-wrap"><span
																			class="menu-item-title">Grid Layout 01</span></div></a></li>
															<li
																class="menu-item menu-item-type-custom menu-item-object-custom menu-item-175"><a
																	href="events/index3b5a.html?event_archive_preset=grid-02"
																	onClick="return true"><div class="menu-item-wrap"><span
																			class="menu-item-title">Grid Layout 02</span></div></a></li>
															<li
																class="menu-item menu-item-type-custom menu-item-object-custom menu-item-176"><a
																	href="events/indexb568.html?event_archive_preset=grid-03"
																	onClick="return true"><div class="menu-item-wrap"><span
																			class="menu-item-title">Grid Layout 03</span></div></a></li>
															<li
																class="menu-item menu-item-type-custom menu-item-object-custom menu-item-177"><a
																	href="events/index9aff.html?event_archive_preset=grid-04"
																	onClick="return true"><div class="menu-item-wrap"><span
																			class="menu-item-title">Grid Layout 04</span></div></a></li>
															<li
																class="menu-item menu-item-type-custom menu-item-object-custom menu-item-178"><a
																	href="events/index2787.html?event_archive_preset=list-01"
																	onClick="return true"><div class="menu-item-wrap"><span
																			class="menu-item-title">List Layout 01</span></div></a></li>
															<li
																class="menu-item menu-item-type-custom menu-item-object-custom menu-item-179"><a
																	href="events/index76c6.html?event_archive_preset=list-02"
																	onClick="return true"><div class="menu-item-wrap"><span
																			class="menu-item-title">List Layout 02</span></div></a></li>
															<li
																class="menu-item menu-item-type-post_type menu-item-object-tp_event menu-item-182"><a
																	href="events/research-in-distance-education-conference-2021/index.html"
																	onClick="return true"><div class="menu-item-wrap"><span
																			class="menu-item-title">Single Layout
																			01</span></div></a></li>
															<li
																class="menu-item menu-item-type-custom menu-item-object-custom menu-item-185"><a
																	href="events/how-to-harness-the-power-of-online-learning-10/index8dfb.html?single_event_preset=02"
																	onClick="return true"><div class="menu-item-wrap"><span
																			class="menu-item-title">Single Layout
																			02</span></div></a></li>
														</ul>
													</li>
												</ul>
											</li>
										</ul> --}}
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
