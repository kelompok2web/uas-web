{{-- <!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="/css/headers.css" rel="stylesheet">
    <link href="/css/carousel.css" rel="stylesheet">
</head>

<body>
    <header>

        @include('home.nav')

    </header>

    <main>
        @include('home.slide')

        <div class="container">
            <h1>Halo</h1>

        </div>

        <footer class="container">
            <p class="float-end"><a href="#">Back to top</a></p>
            <p>&copy; 2017–2022 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a
                    href="#">Terms</a></p>
        </footer>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html> --}}

<!DOCTYPE html>

<html lang="en">
	<!--begin::Head-->
	<head>
		<base href="" />
		<title>SAW Beasiswa</title>
		<meta charset="utf-8" />
		<meta name="description" content="Perawatan Kesehatan di Rumah dengan Layanan Homecare Profesional dan Berkualitas" />
		<meta name="keywords" content="Saw" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta property="og:locale" content="en_US" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="SAW" />
		<meta property="og:site_name" content="SPK SAW PNP" />
		<link rel="shortcut icon" href="{{asset('assets/img/pnp_ico.ico')}}" />
		<!--begin::Fonts(mandatory for all pages)-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Vendor Stylesheets(used for this page only)-->
		
		<link href="{{asset('assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
		<!--end::Vendor Stylesheets-->
		<!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
		<link href="{{asset('assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('assets/style/custom.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('template/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
        <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
		<!--
			end::Global Stylesheets Bundle-->
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body style="background-color: #ffffff;" id="kt_app_body" data-kt-app-layout="light-header" data-kt-app-header-fixed="true" data-kt-app-toolbar-enabled="true" class="app-default">
		
		<div class="d-flex flex-column flex-root app-root" id="kt_app_root">
			<!--begin::Page-->
			<div class="app-page flex-column flex-column-fluid" id="kt_app_page">
				<div id="kt_app_header" class="app-header">
                    
					<div class="app-container container-xxl d-flex align-items-stretch justify-content-between" id="kt_app_header_container">
                        <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0 me-lg-15">
							<a href="?page=index">
								<img alt="Logo" src="assets/img/pnp.png" class="text-black h-50px app-sidebar-logo-default theme-light-show">
							</a>
						</div>
                        <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1" id="kt_app_header_wrapper">
                            <div class="app-header-menu  ms-auto me-auto app-header-mobile-drawer align-items-stretch" id="navPage" data-kt-drawer="true" data-kt-drawer-name="app-header-menu" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="250px" data-kt-drawer-direction="end" data-kt-drawer-toggle="#kt_app_header_menu_toggle" data-kt-swapper="true" data-kt-swapper-mode="{default: 'prepend', lg: 'prepend'}" data-kt-swapper-parent="{default: '#kt_app_body', lg: '#kt_app_header_wrapper'}">
                                <div class="menu menu-rounded menu-column menu-lg-row my-5 my-lg-0 align-items-stretch  fw-semibold px-2 px-lg-0" id="kt_app_header_menu" data-kt-menu="true">
                                    <div class="menu-item">
										<a class="menu-link nav-link active py-3 px-4 px-xxl-6" href="#beranda" data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Home</a>
									
									</div>
                                    <div class="menu-item ">
										<a class="menu-link nav-link  py-3 px-4 px-xxl-6" href="#metode" data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">
											Metode SAW
										</a>
						
									</div>
                                    <div class="menu-item ">
										<a class="menu-link nav-link  py-3 px-4 px-xxl-6" href="#ranking" data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">
											Ranking SAW
										</a>
						
									</div>
                                    {{-- <div class="menu-item ">
										<a class="menu-link nav-link  py-3 px-4 px-xxl-6" href="#testimoniHomecare" data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">
											Testimoni
										</a>
						
									</div>
                                    <div class="menu-item ">
										<a class="menu-link nav-link  py-3 px-4 px-xxl-6" href="#bergabungHomecare" data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">
											Bergabung
										</a>
						
									</div>
                                    <div class="menu-item ">
										<a class="menu-link nav-link  py-3 px-4 px-xxl-6" href="#kontakHomecare" data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">
											Kontak
										</a>
						
									</div> --}}
									<div class="d-lg-none py-3 px-4">	
										<a href="/login">
											<button type="button" class="btn rounded-pill w-100" style="color: white;background-color: #2EBBBE;">
												Login Sekarang
											</button>
										</a>
									</div>
									
                                </div>
                            </div>
                            <div class="app-navbar ">
                                <div class="app-navbar-item ms-1 ms-lg-3" id="kt_app_header_menu">
                                    <a href="/login">
										<button type="button" class="btn rounded-pill w-100" style="color: white;background-color: #2EBBBE;">
											Login Sekarang
										</button>
									</a>
									
                                </div>
                                <div class="app-navbar-item d-lg-none ms-2 me-n3" title="Show header menu">
									<div class="btn btn-icon btn-active-color-success w-35px h-35px" id="kt_app_header_menu_toggle">
										<!--begin::Svg Icon | path: icons/duotune/text/txt001.svg-->
										<span class="svg-icon svg-icon-1">
											<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M13 11H3C2.4 11 2 10.6 2 10V9C2 8.4 2.4 8 3 8H13C13.6 8 14 8.4 14 9V10C14 10.6 13.6 11 13 11ZM22 5V4C22 3.4 21.6 3 21 3H3C2.4 3 2 3.4 2 4V5C2 5.6 2.4 6 3 6H21C21.6 6 22 5.6 22 5Z" fill="currentColor" />
												<path opacity="0.3" d="M21 16H3C2.4 16 2 15.6 2 15V14C2 13.4 2.4 13 3 13H21C21.6 13 22 13.4 22 14V15C22 15.6 21.6 16 21 16ZM14 20V19C14 18.4 13.6 18 13 18H3C2.4 18 2 18.4 2 19V20C2 20.6 2.4 21 3 21H13C13.6 21 14 20.6 14 20Z" fill="currentColor" />
											</svg>
										</span>
										<!--end::Svg Icon-->
									</div>
								</div>
                                
                            </div>
                        </div>
					</div>
					<!--end::Header container-->
				</div>
				
				<div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
					<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
						<div class="d-flex flex-column flex-column-fluid ">
							<div id="kt_app_content" class="app-content flex-column-fluid">
								<div id="kt_app_content_container" class="app-container container-xxl mt-5">
									<div class="d-flex flex-column">
										<section id="beranda" data-kt-scroll-offset="{default: 100, lg: 250}">
											<div class="mb-20">
												<div class="row position-relative">
													<div class="col-12 col-lg-6 ">
							
														<div class="pt-10 pe-1">
															<h1 class="mt-lg-10 mt-12 display-6 lh-sm text-bg-bold">
																Beasiswa Menggunakan Sistem SAW Akan Memberikan Peluang Bagi Mahasiswa yang Berprestasi dan Berkualitas serta Layak  
															</h1>
															<div class="row pt-lg-15 pt-5 ">
																<div class="col-sm-6 col-8 col-md-6 col-lg-6">
																	<a href="https://wa.me/6282386879350">
																		<button type="button"
																		class="btn rounded-pill py-3 w-100 fs-3 fw-semibold text-white"
																		style="background-color: #2EBBBE;">
																			Login Sekarang
																		</button>
																	</a>
																</div>
															</div>
														</div>
														
													</div>
													<div class="col-12 col-lg-6 ps-10">
														<div class="card border-0 ps-6 " style="background-color: transparent;">
															<img alt="" src="assets/img/header.svg" class="d-none d-lg-block w-75 text-end"	/>
														</div>
													</div>
												</div>
												
											</div>
										</section>
										
										
									</div>
								</div>
								<div class="mb-20 py-20" style="background-color: #f6f6f6;">
									<div class="app-container container">
										<div class="d-flex flex-column">
											<div class="text-center" >
												<div class="app-container">
													<div class="row">
														<div class="col-12 col-lg-4 ">
															<div class="fs-lg-2hx fs-2x fw-bold d-flex flex-center" style="color: #272727;">
																<div class="min-w-70px" data-kt-countup="true" data-kt-countup-value="{{$jurusan}}">0</div>
															</div>
															<h2 class="fw-normal" style="color: #272727;">
																Total Jurusan di Politeknik Negeri Padang
															</h2>
														</div>
														<div class="col-12 col-lg-4 mt-lg-0 mt-4">
															<div class="fs-lg-2hx fs-2x fw-bold d-flex flex-center" style="color: #272727;">
																<div class="min-w-70px" data-kt-countup="true" data-kt-countup-value="{{$prodi}}" >0</div>
															</div>
															<h2 class="fw-normal" style="color: #272727;">
																Total Prodi di Politeknik Negeri Padang
															</h2> 
														</div>
														<div class="col-12 col-lg-4 mt-lg-0 mt-4">
															<div class="fs-lg-2hx fs-2x fw-bold d-flex flex-center" style="color: #272727;">
																<div class="min-w-70px" data-kt-countup="true" data-kt-countup-value="{{$mhs}}">0</div>
															</div>
															<h2 class="fw-normal" style="color: #272727;">
																Total Mahasiswa di Politeknik Negeri Padang
															</h2>
															 
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div id="kt_app_content_container" class="app-container container-xxl">
									<div class="d-flex flex-column">
										<section id="metode" data-kt-scroll-offset="{default: 100, lg: 250}">
											<div class="mb-20 text-center" >
												<div class="row">
													<h1 class="display-6 pb-3 text-bg-bold">
														Tentang Metode
													</h1>
													<div class="col-12">
														<div class="card card-bg">
															<div class="card-body text-start">
																<img src="assets/img/icon3.svg"  alt="" class="mb-6">
																<p class="fs-2" class="fw-bold text-bg-bold">
																	Pengertian SAW
																</p>
																<p class="fs-3"style="color: #272727;">
																	Menurut Fishburn dan MacCrimmon dalam
                                                                    <b> (Munthe, 2013)</b> mengemukakan bahwa Metode
                                                                    Simple Additive Weight (SAW), sering juga dikenal
                                                                    dengan istilah metode penjumlahan terbobot.
                                                                    Konsep dasar metode Simple Additive Weight
                                                                    (SAW) adalah mencari penjumlahan terbobot
                                                                    dari rating kinerja pada setiap alternatif pada
                                                                    semua atribut.
                                                                    Menurut <b>(Asnawati dan Kanedi, 2012)</b>
                                                                    “Kriteria penilaian dapat ditentukan sendiri
                                                                    sesuai dengan kebutuhan perusahaan.”
																</p>
															</div>
														</div>
													</div>
                                                    <div class="col-12 mt-5">
														<div class="card card-bg">
															<div class="card-body text-start">
																<img src="assets/img/icon3.svg"  alt="" class="mb-6">
																<p class="fs-3" class="fw-bold text-bg-bold">
																	Rumus SAW
																</p>
																<p class="fs-4"style="color: #272727;">
																	Rumus Normalisasi <br>
                                                                    <img alt="" src="assets/img/r1.png" class=" w-50 text-end pb-5 pt-5"	/>
                                                                    <br>
                                                                    Keterangan : <br>
                                                                    <ul class="fs-4">
                                                                        <li>Rij = Rating kinerja ternormalisasi</li>
                                                                        <li>Maxij = Nilai maksimum dari setiap baris dankolom</li>
                                                                        <li>Minij = Nilai minimum dari setiap baris dankolom</li>
                                                                        <li>Xij = Baris dan kolom dari matriks</li>
                                                                        <li>Xij = Baris dan kolom dari matriks</li>
                                                                    </ul>
                                                                    <p class="fs-4 ">Dengan Rij adalah rating kinerja ternormalisasi
                                                                    dari alternatif Ai pada atribut Cj; i =1,2,…m dan j
                                                                    = 1,2,…,n.
                                                                    
                                                                    <br><br>
                                                                    Rumus Perankingan <br>
                                                                    <img alt="" src="assets/img/r2.png" class=" w-50 text-end pb-5 pt-5"	/>
                                                                    <br>
                                                                    Keterangan : <br>
                                                                    <ul class="fs-4">
                                                                        <li>Vi = Nilai akhir dari alternatif </li>
                                                                        <li>Wi = Bobot yang telah ditentukan </li>
                                                                        <li>Rij = Normalisasi matriks </li>
                                                                    </ul>
                                                                </p>
															</div>
														</div>
													</div>
													
												</div>
											</div>
										</section>
										
									</div>
								</div>
								<div id="kt_app_content_container" class="app-container container-xxl mt-5">
									<div class="d-flex flex-column">
										<section id="ranking" data-kt-scroll-offset="{default: 100, lg: 250}">
											<div class="mb-20 text-center">
												<div class="row">
													<h1 class="display-6 text-bg-bold">
														Ranking Beasiswa Mahasiswa PNP Dengan SAW
													</h1>
													<h4 class="text-bg-bold fw-normal mb-5">
														Ranking yang dikeluarkan dari kampus berdasarkan keadaan mahasiswa yang telah sesuai
													</h4>
													<div class="mt-4 col-md-12">
                                                        <div class="card card-bg">
                                                            <div class="card-body">
                                                                <div class="table-responsive">
                                                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                                        <thead class="text-center align-middle">
                                                                            <tr  >
                                                                                <th>NIM</th>
                                                                                <th>IPK</th>
                                                                                <th>Penghasilan Ortu/bln (Juta)</th>
                                                                                <th>Jumlah Tanggungan Orgtua</th>
                                                                                <th>Prestasi</th>
                                                                                <th>Kondisi Rumah</th>
                                                                                <th>Total</th>
                                                                                <th>Rangking</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @foreach ($DATA as $item)
                                                                                <tr class="text-center align-middle">
                                                                                    <td>{{ $item->nim_mahasiswa }}</td>
                                                                                    <td>{{ $item->p1_level3 }}</td>
                                                                                    <td>{{ $item->p2_level3 }}</td>
                                                                                    <td>{{ $item->p3_level3 }}</td>
                                                                                    <td>{{ $item->p4_level3 }}</td>
                                                                                    <td>{{ $item->p5_level3 }}</td>
                                                                                    <td>{{ $item->pSum_level3 }}</td>
                                                                                    <td>{{ $item->ranking }}</td>
                                                                                </tr>
                                                                            @endforeach
                                                                        </tbody>
                                                                    
                                                                    </table>
                                                                </div>
                                                                
                                                    
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
												</div>
											</div>
										</section>
									</div>
								</div>
							</div>
						</div>
						<div id="kt_app_footer" class="footer justify-content-center" style="background-color: #002A2B;">
							<!--begin::Footer container-->
							<div class="app-container container d-flex flex-column text-center justify-content-center flex-md-row flex-center flex-md-stack py-2">
								<div class="row mt-4 m-0 py-4">
									<div class="col-12 ">
										<h4 class="mb-3 text-white">
											Beasiswa Mahasiswa SAW
										</h4>
									</div>
								</div>
							</div>
							<!--end::Footer container-->
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
			<!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
			<span class="svg-icon">
				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
					<rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="currentColor" />
					<path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="currentColor" />
				</svg>
			</span>
			<!--end::Svg Icon-->
		</div>

		<script>
			// Add active class to the current button (highlight it)
			var header = document.getElementById("navPage");
			var links = header.getElementsByClassName("nav-link");
			for (var i = 0; i < links.length; i++) 
			{
			  links[i].addEventListener("click", function() {
			  var current = document.getElementsByClassName("active");
			  current[0].className = current[0].className.replace(" active", "");
			  this.className += " active";
			  });
			}
		</script>
	
		<script>var hostUrl = "assets/";</script>
		<!--begin::Global Javascript Bundle(mandatory for all pages)-->
		<script src="{{asset('assets/plugins/global/plugins.bundle.js')}}"></script>
		<script src="{{asset('assets/js/scripts.bundle.js')}}"></script>

		<script src="{{asset('assets/plugins/custom/fslightbox/fslightbox.bundle.js')}}"></script>
		<script src="{{asset('assets/plugins/custom/typedjs/typedjs.bundle.js')}}"></script>

		<script src="{{asset('assets/js/custom/landing.js')}}"></script>
		<script src="{{asset('assets/js/custom/pages/pricing/general.js')}}"></script>
        <script src="{{ asset('template/js/demo/datatables-demo.js') }}"></script>

        <script src="{{ asset('template/vendor/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('template/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
	</body>
	<!--end::Body-->
</html>