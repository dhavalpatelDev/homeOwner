@php


$crt_url = URL::current();

$exp = explode('/',$crt_url);

$exp_file_name  = last($exp);




@endphp

<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head><base href="../">
		<meta charset="utf-8" />
		<title>@yield('title')</title>
		<meta name="description" content="ACP 1.0" />
		<meta name="keywords" content="ACP 1.0" />
		<link rel="canonical" href="" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="shortcut icon" href="{{ asset('media/logos/favicon.ico') }}" />
		<!--begin::Fonts-->
		<!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" /> -->
		<!--end::Fonts-->
		<!--begin::Global Stylesheets Bundle(used by all pages)-->
		<link href="{{ asset('plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
		<!-- <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" /> -->
		<script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
        @yield('styles')
        @yield('scripts')
		<!-- <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script> -->
		<!--end::Global Stylesheets Bundle-->

		<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style type="text/css">
	.table-responsive{
		margin-top: 20px;
	}
</style>
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed toolbar-tablet-and-mobile-fixed aside-enabled aside-fixed" style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">
		<!--begin::Main-->
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Page-->
			<div class="page d-flex flex-row flex-column-fluid">
				<!--begin::Aside-->
				<div id="kt_aside" class="aside aside-dark aside-hoverable" data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_mobile_toggle">
					<!--begin::Brand-->
					<div class="aside-logo flex-column-auto" id="kt_aside_logo">
						<!--begin::Logo-->
						<a href="{{url('/admin')}}">
							<img alt="Logo" src="{{asset('media/logos/logo-default.svg') }}" class="h-15px logo" />
						</a>
						<!--end::Logo-->
						<!--begin::Aside toggler-->
						<div id="kt_aside_toggle" class="btn btn-icon w-auto px-0 btn-active-color-primary aside-toggle" data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body" data-kt-toggle-name="aside-minimize">
							<!--begin::Svg Icon | path: icons/duotone/Navigation/Angle-double-left.svg-->
							<span class="svg-icon svg-icon-1 rotate-180">
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<polygon points="0 0 24 0 24 24 0 24" />
										<path d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z" fill="#000000" fill-rule="nonzero" transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999)" />
										<path d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.5" transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999)" />
									</g>
								</svg>
							</span>
							<!--end::Svg Icon-->
						</div>
						<!--end::Aside toggler-->
					</div>
					<!--end::Brand-->
          <!--begin::Aside-->
					<div class="aside-menu flex-column-fluid">
						<!--begin::Aside Menu-->
						<div class="hover-scroll-overlay-y my-2 py-5 py-lg-8" id="kt_aside_menu_wrapper" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside_menu" data-kt-scroll-offset="0">
							<!--begin::Menu-->
							<div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500" id="#kt_aside_menu" data-kt-menu="true">
								<div class="menu-item">
									<a class="menu-link" href="{{url('/admin')}}">
										<span class="menu-icon">
											<i class="bi bi-house fs-3"></i>
										</span>
										<span class="menu-title">{{trans('NAVI_ADM_DASHBOARD')}}</span>
									</a>
								</div>
								<div data-kt-menu-trigger="click" class="menu-item menu-accordion mb-1">
									<span class="menu-link">
										<span class="menu-icon">
											<i class="bi bi-chat-left fs-3"></i>
										</span>
										<span class="menu-title">{{trans('NAVI_ADM_COMMUNICATIONS')}}</span>
										<span class="menu-arrow"></span>
									</span>
									<div class="menu-sub menu-sub-accordion menu-active-bg">
										<div class="menu-item">
											<a class="menu-link" href="{{route('admin.announcement')}}">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
												<span class="menu-title">{{trans('NAVI_ADM_ANNOUNCEMENT_LIST')}}</span>
											</a>
										</div>
										<div class="menu-item">
											<a class="menu-link" href="{{route('admin.announcementAdd')}}">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
												<span class="menu-title">{{trans('NAVI_ADM_ANNOUNCEMENT_ADD')}}</span>
											</a>
										</div>
									</div>
								</div>
								<div data-kt-menu-trigger="click" class="menu-item menu-accordion mb-1">
									<span class="menu-link">
										<span class="menu-icon">
											<i class="bi bi-people fs-3"></i>
										</span>
										<span class="menu-title">{{trans('NAVI_ADM_USERS')}}</span>
										<span class="menu-arrow"></span>
									</span>
									<div class="menu-sub menu-sub-accordion menu-active-bg">
										<div class="menu-item">
											<a class="menu-link" href="{{ Route('admin_members_list') }}">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
												<span class="menu-title">{{trans('NAVI_ADM_USERS_LIST')}}</span>
											</a>
										</div>
										<div class="menu-item">
											<a class="menu-link" href="{{ route('admin_members_referral') }}">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
												<span class="menu-title">{{trans('NAVI_ADM_USERS_REFERRAL_NETWORK')}}</span>
											</a>
										</div>
										<div class="menu-item">
											<a class="menu-link" href="account/settings.html">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
												<span class="menu-title">{{trans('NAVI_ADM_USERS_MBR_ACCESS')}}</span>
											</a>
										</div>
									</div>
								</div>
								<div data-kt-menu-trigger="click" class="menu-item menu-accordion mb-1">
									<span class="menu-link">
										<span class="menu-icon">
											<i class="bi bi-pin fs-3"></i>
										</span>
										<span class="menu-title">{{trans('NAVI_ADM_PIN')}}</span>
										<span class="menu-arrow"></span>
									</span>
									<div class="menu-sub menu-sub-accordion menu-active-bg">
										<div class="menu-item">
											<a class="menu-link" href="{{route('admin.pin')}}">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
												<span class="menu-title">{{trans('NAVI_ADM_PIN_LIST')}}</span>
											</a>
										</div>
										<div class="menu-item">
											<a class="menu-link" href="{{route('admin.pinAdd')}}">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
												<span class="menu-title">{{trans('NAVI_ADM_PIN_ADD')}}</span>
											</a>
										</div>
									</div>
								</div>
								<div data-kt-menu-trigger="click" class="menu-item menu-accordion mb-1">
									<span class="menu-link">
										<span class="menu-icon">
											<i class="bi bi-cart fs-3"></i>
										</span>
										<span class="menu-title">{{trans('NAVI_ADM_PRODUCTS')}}</span>
										<span class="menu-arrow"></span>
									</span>
									<div class="menu-sub menu-sub-accordion menu-active-bg">
										<div class="menu-item">
											<a class="menu-link" href="{{route('admin.category.index')}}">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
												<span class="menu-title">{{trans('NAVI_ADM_PRODUCTS_CATEGORIES')}}</span>
											</a>
										</div>
										<div class="menu-item">
											<a class="menu-link" href="{{route('admin.subcategory.index')}}">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
												<span class="menu-title">{{trans('NAVI_ADM_PRODUCTS_SUBCATEGORIES')}}</span>
											</a>
										</div>
										<div class="menu-item">
											<a class="menu-link" href="{{route('admin.products.index')}}">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
												<span class="menu-title">{{trans('NAV_PRODUCT_LIST')}}</span>
											</a>
										</div>
										<div class="menu-item">
											<a class="menu-link" href="{{route('admin.packages.index')}}">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
												<span class="menu-title">{{trans('NAV_COMBO_LIST')}}</span>
											</a>
										</div>
									</div>
								</div>
								<div data-kt-menu-trigger="click" class="menu-item menu-accordion mb-1 {{ Request::is('ewallet*') ? 'show' : '' }}">
									<span class="menu-link">
										<span class="menu-icon">
											<i class="bi bi-currency-dollar fs-3"></i>
										</span>
										<span class="menu-title">{{trans('NAVI_ADM_EWALLET')}}</span>
										<span class="menu-arrow"></span>
									</span>
									<div class="menu-sub menu-sub-accordion menu-active-bg {{ Request::is('ewallet*') ? 'show active' : '' }}">
										<div class="menu-item">
											<a class="menu-link" href="{{url('/admin/ewallet/history')}}">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
												<span class="menu-title">{{trans('NAVI_ADM_EWALLET_HISTORY')}}</span>
											</a>
										</div>
										<div class="menu-item">
											<a class="menu-link" href="{{ url('/admin/ewallet/balance') }}">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
												<span class="menu-title">{{trans('NAVI_ADM_EWALLET_BALANCE')}}</span>
											</a>
										</div>
										<div class="menu-item">
											<a class="menu-link" href="{{ url('/admin/ewallet/withdrawal') }}">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
												<span class="menu-title">{{trans('NAVI_MBR_WITHDRAWAL')}}</span>
											</a>
										</div>
									</div>
								</div>
								<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
									<span class="menu-link">
										<span class="menu-icon">
											<i class="bi bi-sticky fs-3"></i>
										</span>
										<span class="menu-title">{{trans('NAVI_ADM_SALES')}}</span>
										<span class="menu-arrow"></span>
									</span>
								<div class="menu-sub menu-sub-accordion menu-active-bg">
										<div class="menu-item">
											<a class="menu-link" href="account/overview.html">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
												<span class="menu-title">{{trans('NAVI_ADM_REPORTS_SALES')}}</span>
											</a>
										</div>
										<div class="menu-item">
											<a class="menu-link" href="account/settings.html">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
												<span class="menu-title">{{trans('NAVI_ADM_REPORTS_BONUS')}}</span>
											</a>
										</div>
										<div class="menu-item">
											<a class="menu-link" href="account/settings.html">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
												<span class="menu-title">{{trans('NAVI_ADM_REPORTS_WITHDRAWAL')}}</span>
											</a>
										</div>
									</div>
								</div>
								<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
									<span class="menu-link">
										<span class="menu-icon">
											<i class="bi bi-lightning fs-3"></i>
										</span>
										<span class="menu-title">{{trans('NAVI_ADM_SERVERS')}}</span>
										<span class="menu-arrow"></span>
									</span>
								<div class="menu-sub menu-sub-accordion menu-active-bg">
										<div class="menu-item">
											<a class="menu-link" href="{{route('admin.server')}}">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
												<span class="menu-title">{{trans('NAV_SERVER_LIST')}}</span>
											</a>
										</div>
										<div class="menu-item">
											<a class="menu-link" href="{{route('admin.serverAdd')}}">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
												<span class="menu-title">{{trans('NAVI_ADM_SERVERS_ADD')}}</span>
											</a>
										</div>
									</div>
								</div>
								<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
									<span class="menu-link">
										<span class="menu-icon">
											<i class="bi bi-question-square fs-3"></i>
										</span>
										<span class="menu-title">{{trans('NAVI_ADM_TICKET_SUPPORT')}}</span>
										<span class="menu-arrow"></span>
									</span>
								<div class="menu-sub menu-sub-accordion menu-active-bg">
										<div class="menu-item">
											<a class="menu-link" href="{{route('admin.ticket')}}">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
												<span class="menu-title">{{trans('NAV_TICKET_LIST')}}</span>
											</a>
										</div>
										<div class="menu-item">
											<a class="menu-link" href="{{route('admin.ticketClosedList')}}">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
												<span class="menu-title">{{trans('NAV_TICKET_CLOSED_LIST')}}</span>
											</a>
										</div>
										<div class="menu-item">
											<a class="menu-link" href="{{route('admin.ticketDepartment')}}">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
												<span class="menu-title">{{trans('NAVI_ADM_TICKETS_DEPARTMENT')}}</span>
											</a>
										</div>
										<div class="menu-item">
											<a class="menu-link" href="{{route('admin.ticketDepartmentAdd')}}">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
												<span class="menu-title">{{trans('NAVI_ADM_TICKETS_DEPARTMENT_ADD')}}</span>
											</a>
										</div>
										<div class="menu-item">
											<a class="menu-link" href="{{route('admin.ticketFAQS')}}">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
												<span class="menu-title">{{trans('NAVI_ADM_TICKETS_FAQS')}}</span>
											</a>
										</div>
										<div class="menu-item">
											<a class="menu-link" href="{{route('admin.ticketFAQSAdd')}}">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
												<span class="menu-title">{{trans('NAV_ADD_TICKET_FAQ_LIST')}}</span>
											</a>
										</div>
									</div>
								</div>
								<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
									<span class="menu-link">
										<span class="menu-icon">
											<i class="bi bi-layers fs-3"></i>
										</span>
										<span class="menu-title">{{trans('NAVI_ADM_ADM_ACCESS')}}</span>
										<span class="menu-arrow"></span>
									</span>
									<div class="menu-sub menu-sub-accordion menu-active-bg">
										<div class="menu-item">
											<a class="menu-link" href="{{ Route('admin_access_list') }}">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
												<span class="menu-title">{{trans('NAVI_ADM_ADM_LIST')}}</span>
											</a>
										</div>
										<div class="menu-item">
											<a class="menu-link" href="{{ Route('admin_access_add') }}">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
												<span class="menu-title">{{trans('NAVI_ADM_ADM_ADD')}}</span>
											</a>
										</div>
										<div class="menu-item">
											<a class="menu-link" href="{{ Route('admin_access_grouplist') }}">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
												<span class="menu-title">{{trans('NAVI_ADM_ADM_GROUP_LIST')}}</span>
											</a>
										</div>
										<div class="menu-item">
											<a class="menu-link" href="{{ Route('admin_access_groupadd') }}">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
												<span class="menu-title">{{trans('NAVI_ADM_ADM_GROUP_LIST_ADD')}}</span>
											</a>
										</div>
									</div>
								</div>
								<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
									<span class="menu-link">
										<span class="menu-icon">
											<i class="bi bi-gear fs-3"></i>
										</span>
										<span class="menu-title">{{trans('NAVI_ADM_ACCT_SETTINGS')}}</span>
										<span class="menu-arrow"></span>
									</span>
								<div class="menu-sub menu-sub-accordion menu-active-bg">
										<div class="menu-item">
											<a class="menu-link" href="{{ Route('admin_setting_managelogin') }}">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
												<span class="menu-title">{{trans('NAVI_ADM_SET_MANAGE_LOGIN')}}</span>
											</a>
										</div>
										<div class="menu-item">
											<a class="menu-link" href="{{ Route('admin_setting_memberprofile') }}">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
												<span class="menu-title">{{trans('NAV_MBR_PROFILE')}}</span>
											</a>
										</div>
										<div class="menu-item">
											<a class="menu-link" href="{{ url('/admin/settings/language') }}">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
												<span class="menu-title">{{trans('NAVI_ADM_SET_LANG')}}</span>
											</a>
										</div>
										<div class="menu-item">
											<a class="menu-link" href="account/settings.html">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
												<span class="menu-title">{{trans('NAVI_ADM_SET_PAYMENT_GATEWAY')}}</span>
											</a>
										</div>
										<div class="menu-item">
											<a class="menu-link" href="{{route('admin.log')}}">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
												<span class="menu-title">{{trans('NAV_A_LOG')}}</span>
											</a>
										</div>
										<div class="menu-item">
											<a class="menu-link" href="account/settings.html">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
												<span class="menu-title">{{trans('NAV_M_LOG')}}</span>
											</a>
										</div>
									</div>
								</div>
							</div>
							<!--end::Menu-->
						</div>
					</div>
					<!--end::Aside menu-->
				</div>
				<!--end::Aside-->
        <!--begin::Wrapper-->
				<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
					<!--begin::Header-->
					<div id="kt_header" style="" class="header align-items-stretch">
						<!--begin::Container-->
						<div class="container-fluid d-flex align-items-stretch justify-content-between">
							<!--begin::Aside mobile toggle-->
							<div class="d-flex align-items-center d-lg-none ms-n3 me-1" title="Show aside menu">
								<div class="btn btn-icon btn-active-color-white" id="kt_aside_mobile_toggle">
									<i class="bi bi-list fs-1"></i>
								</div>
							</div>
							<!--end::Aside mobile toggle-->
							<!--begin::Mobile logo-->
							<div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
								<a href="index.html" class="d-lg-none">
									<img alt="Logo" src="{{ asset('media/logos/logo-compact.svg') }}" class="h-15px" />
								</a>
							</div>
							<!--end::Mobile logo-->
							<!--begin::Wrapper-->
							<div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1">
								<!--begin::Navbar-->
								<div class="d-flex align-items-stretch" id="kt_header_nav">
									<!--begin::Menu wrapper-->
									<div class="header-menu align-items-stretch" data-kt-drawer="true" data-kt-drawer-name="header-menu" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="end" data-kt-drawer-toggle="#kt_header_menu_mobile_toggle" data-kt-place="true" data-kt-place-mode="prepend" data-kt-place-parent="{default: '#kt_body', lg: '#kt_header_nav'}">

									</div>
									<!--end::Menu wrapper-->
								</div>
								<!--end::Navbar-->
								<!--begin::Topbar-->
								<div class="d-flex align-items-stretch flex-shrink-0">
									<!--begin::Toolbar wrapper-->
									<div class="topbar d-flex align-items-stretch flex-shrink-0">

										<!--begin::User-->
										<div class="d-flex align-items-stretch" id="kt_header_user_menu_toggle">
											<!--begin::Menu wrapper-->
											<div class="topbar-item cursor-pointer symbol px-3 px-lg-5 me-n3 me-lg-n5 symbol-30px symbol-md-35px" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end" data-kt-menu-flip="bottom">
												<img src="{{ $avatar_url }}" alt="metronic" />
											</div>
											<!--begin::Menu-->
											<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold py-4 fs-6 w-275px" data-kt-menu="true">
												<!--begin::Menu item-->
												<div class="menu-item px-3">
													<div class="menu-content d-flex align-items-center px-3">
														<!--begin::Avatar-->
														<div class="symbol symbol-50px me-5">
															<img alt="Logo" src="{{ $avatar_url }}" />
														</div>
														<!--end::Avatar-->
														<!--begin::Username-->
														<div class="d-flex flex-column">
															<div class="fw-bolder d-flex align-items-center fs-5">{{ Auth::guard('admin')->user()->given_name }}
															<span class="badge badge-light-success fw-bolder fs-8 px-2 py-1 ms-2">{{ Auth::guard('admin')->user()->aame }}</span></div>
															<a href="#" class="fw-bold text-muted text-hover-primary fs-7">{{ Auth::guard('admin')->user()->email }}</a>
														</div>
														<!--end::Username-->
													</div>
												</div>
												<!--end::Menu item-->
												<!--begin::Menu separator-->
												<div class="separator my-2"></div>
												<!--end::Menu separator-->
												<!--begin::Menu item-->
												@php
													$locale = App::getlocale();;
													$currentLocale = App\Models\Language::where('lcode',$locale)->first();
													$locales = App\Models\Language::get();
												@endphp
												<div class="menu-item px-5" data-kt-menu-trigger="hover" data-kt-menu-placement="left-start" data-kt-menu-flip="bottom">
													<a href="#" class="menu-link px-5">
														<span class="menu-title position-relative">{{trans('NAVI_ADM_SET_LANG')}}
														<span class="fs-8 rounded bg-light px-3 py-2 position-absolute translate-middle-y top-50 end-0">
															@if(!empty($currentLocale))
																 @switch($locale)
																	@case('en')
																	<img class="w-15px h-15px rounded-1 ms-2" src="{{ asset('media/flags/united-states.svg') }}" alt="metronic" /> {{$currentLocale->lname}}
																	@break
																	@case('cn_si')
																	<img class="w-15px h-15px rounded-1 ms-2" src="{{ asset('media/flags/china.svg') }}" alt="metronic" /> {{$currentLocale->lname}}
																	@break
																	@case('cn_tr')
																	<img class="w-15px h-15px rounded-1 ms-2" src="{{ asset('media/flags/china.svg') }}" alt="metronic" /> {{$currentLocale->lname}}
																	@break
																	@default
																	<img class="w-15px h-15px rounded-1 ms-2" src="{{ asset('media/flags/united-states.svg') }}" alt="metronic" /> {{$currentLocale->lname}}
																@endswitch
															@else
																<img class="w-15px h-15px rounded-1 ms-2" src="{{ asset('media/flags/united-states.svg') }}" alt="metronic" /> English {{$locale}}
															@endif
														</span></span>
													</a>
													<!--begin::Menu sub-->
													<div class="menu-sub menu-sub-dropdown w-175px py-4">
														@foreach($locales as $lang)
															<!--begin::Menu item-->
															<div class="menu-item px-3">
																<a href="{{url('/set/locale/'.$lang->lcode)}}" class="menu-link d-flex px-5 @if(!empty($locale) && $lang->lcode == $locale) active @endif">
																<span class="symbol symbol-20px me-4">
																	<img class="rounded-1" src="@if($lang->lcode == 'cn_si' || $lang->lcode == 'cn_tr') {{ asset('media/flags/china.svg') }} @else {{ asset('media/flags/united-states.svg') }} @endif" alt="metronic" />
																</span>{{$lang->lname}}</a>
															</div>
															<!--end::Menu item-->
														@endforeach
													</div>
													<!--end::Menu sub-->
												</div>
												<!--end::Menu item-->
												<!--begin::Menu separator-->
												<div class="separator my-2"></div>
												<!--end::Menu separator-->
												<!--begin::Menu item-->
												<div class="menu-item px-5">
													<a href="{{ route('admin_account_overview') }}" class="menu-link px-5">{{trans('NAV_MY_PROFILE')}}</a>
												</div>
												<!--end::Menu item-->
												<!--begin::Menu item-->
												<div class="menu-item px-5">
													<a href="{{ route('admin_account_setting') }}" class="menu-link px-5">{{trans('NAV_ACCOUNT_SETTINGS')}}</a>
												</div>
												<!--end::Menu item-->
												<!--begin::Menu item-->
												<div class="menu-item px-5">
													<a href="{{ Route('admin_account_security') }}" class="menu-link px-5">{{trans('NAVI_ADM_ACCT_SECURITY')}}</a>
												</div>
												<!--end::Menu item-->
												<!--begin::Menu separator-->
												<div class="separator my-2"></div>
												<!--end::Menu separator-->
												<!--begin::Menu item-->
												<div class="menu-item px-5">
													<a href="{{ route('admin.logout') }}" class="menu-link px-5">{{trans('NAV_SIGN_OUT')}}</a>
												</div>
												<!--end::Menu item-->
											</div>
											<!--end::Menu-->
											<!--end::Menu wrapper-->
										</div>
										<!--end::User -->
										<!--begin::Heaeder menu toggle-->
										<div class="d-flex align-items-stretch d-lg-none px-3 me-n3" title="Show header menu">
											<div class="topbar-item" id="kt_header_menu_mobile_toggle">
												<i class="bi bi-text-left fs-1"></i>
											</div>
										</div>
										<!--end::Heaeder menu toggle-->
									</div>
									<!--end::Toolbar wrapper-->
								</div>
								<!--end::Topbar-->
							</div>
							<!--end::Wrapper-->
						</div>
						<!--end::Container-->
					</div>
					<!--end::Header-->
          @section('content')
          @show
        </div>
        <!--end::Wrapper-->
      </div>
      <!--end::Page-->
    </div>
    <!--end::Root-->
    <!--begin::Scrolltop-->
    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
      <!--begin::Svg Icon | path: icons/duotone/Navigation/Up-2.svg-->
      <span class="svg-icon">
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
          <polygon points="0 0 24 0 24 24 0 24" />
          <rect fill="#000000" opacity="0.5" x="11" y="10" width="2" height="10" rx="1" />
          <path d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z" fill="#000000" fill-rule="nonzero" />
        </g>
        </svg>
      </span>
      <!--end::Svg Icon-->
    </div>
    <!--end::Scrolltop-->
    <!--end::Main-->
    <!--begin::Javascript-->
    <!--begin::Global Javascript Bundle(used by all pages)-->

    <script src="{{ asset('plugins/global/plugins.bundle.js') }}"></script>
	<script src="{{ asset('js/scripts.bundle.js')}}"></script>

	<script type="text/javascript" src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>


<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.colVis.min.js"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script type="text/javascript">
	var publicPath = "{{url('admin')}}/";
</script>

<script type="text/javascript">
	$(document).ready( function () {
		let current_datetime = new Date()

	    $('.DataTable').DataTable({
	    	responsive: true,
	    	"pageLength": 15,
        	"lengthMenu": [[10, 15, 25, 35, 50, 100, -1], [10, 15, 25, 35, 50, 100, "All"]],
	        buttons: [
	            	{
		               	extend: 'colvis',
		               	attr: {class:'btn btn-light' },
		                exportOptions: {
		                    columns: ':visible'
		                }
            		},
	            {
		               	extend: 'copy',
		               	attr: {class:'btn btn-light' },
		                exportOptions: {
		                    columns: ':visible'
		                }
            		},
	             {
		               	extend: 'csvHtml5',
		               	attr: {class:'btn btn-light' },
		                title: '{{$exp_file_name}}_{{date("YmdHis")}}',
		                exportOptions: {
		                    columns: ':visible'
		                }
            		},
	              	{
                extend: 'excelHtml5',
                attr: {class:'btn btn-light' },
                title: '{{$exp_file_name}}_{{date("YmdHis")}}',
                exportOptions: {
                    columns: ':visible'
                }
            		},
	                {
		               	extend: 'print',
		               	attr: {class:'btn btn-light' },
		                exportOptions: {
		                    columns: ':visible'
		                }
            		},
	                {
		                extend: 'pdfHtml5',
		                orientation: 'landscape',
		                pageSize: 'A4',
		                title: '{{$exp_file_name}}_{{date("YmdHis")}}',
		                attr: {class:'btn btn-light' },
		                exportOptions: {
                    	columns: ':visible'
                		}
		            }
	        ],
	        dom: 'Blfrtip',
		});
	} );
</script>


<script type="text/javascript">

	$(document).ready(function(){
      $(".confirm").click(function(eve){
          eve.preventDefault();
       // alert("The paragraph was clicked.");

        var href = $(this).attr('href');

            Swal.fire({
              title: 'Are you sure?',
              text: "You won't be able to revert this!",
              // icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
              if (result.isConfirmed) {
                window.location.replace(href);
              }
            });

      });
    });
</script>
	@section('jsscripts')
	@show
  </body>
</html>
