@extends('layouts.master')
<style>
    @media (min-width: 950px) {
        .img-new {
            height: 630px;
        }

    }
</style>
@section('content')
    <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
        <!--begin::Hero-->
        <div id="kt_app_hero" class="app-hero py-6">
            <!--begin::Hero container-->
            <div id="kt_app_hero_container" class="app-container container-xxl d-flex">
                <!--begin::Hero wrapper=-->

                <!--end::Hero wrapper=-->
            </div>
            <!--end::Hero container-->
        </div>
        <!--end::Hero-->
        <!--begin::Wrapper container-->
        <div class="app-container container-xxl">
            <!--begin::Main-->
            <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                <!--begin::Content wrapper-->
                <div class="d-flex flex-column flex-column-fluid">
                    <!--begin::Content-->
                    <div id="kt_app_content" class="app-content">
                        <!--begin::Toolbar-->
                        <div id="carouselExampleIndicators" class="carousel slide">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                                    class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                                    aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                                    aria-label="Slide 3"></button>
                            </div>
                            <h1 style="text-align: center" class="mb-7">- Alpha Rent -</h1>
                            <div class="carousel-inner">

                                <div class="carousel-item">
                                    <img src="https://www.batam.cc/wp-content/uploads/2018/11/Rental-mobil-batam-nada-car-rental-1.jpg"
                                        class="d-block w-100 img-new" alt="...">
                                </div>
                                <div class="carousel-item active">
                                    <img src="https://cdnb.artstation.com/p/assets/covers/images/039/909/067/large/rental-mobil-batam-murah-terbaik-rental-mobil-batam-murah-terbaik-rental-mobil-batam-murah-kota-batam.jpg?1627309430"
                                        class="d-block w-100 img-new" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="https://wisataonline.com/wp-content/uploads/2020/08/rental-mobil-jember.jpg"
                                        class="d-block w-100 img-new" alt="...">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                        <div class="mt-7">
                            <h5 style="text-align: justify">Alpha Rent, sebuah perusahaan rental mobil yang telah
                                menyediakan solusi mobilitas yang handal dan efisien sejak didirikan. Sebagai pemimpin dalam
                                industri ini, Alpha Rent menawarkan armada kendaraan terkini yang dirawat dengan baik, mulai
                                dari mobil ekonomi hingga kendaraan mewah, memenuhi berbagai kebutuhan pelanggan dengan
                                berbagai selera dan anggaran.</h5>
                            <h5 style="text-align: justify">Alpha Rent, sebuah perusahaan rental mobil yang telah
                                menyediakan solusi mobilitas yang handal dan efisien sejak didirikan. Sebagai pemimpin dalam
                                industri ini, Alpha Rent menawarkan armada kendaraan terkini yang dirawat dengan baik, mulai
                                dari mobil ekonomi hingga kendaraan mewah, memenuhi berbagai kebutuhan pelanggan dengan
                                berbagai selera dan anggaran.

                                Komitmen utama Alpha Rent adalah memberikan layanan pelanggan terbaik. Tim kami yang
                                profesional dan berpengalaman selalu siap membantu pelanggan dalam memilih kendaraan yang
                                sesuai dengan kebutuhan mereka. Dengan proses pemesanan yang cepat dan transparan melalui
                                platform online kami, pelanggan Alpha Rent dapat dengan mudah merencanakan perjalanan mereka
                                tanpa kerumitan.</h5>
                            <h5 style="text-align: justify">Inovasi adalah landasan utama Alpha Rent dalam menjalankan
                                bisnisnya. Kami terus mengadopsi teknologi terkini untuk memastikan pengalaman pelanggan
                                yang lebih baik, termasuk aplikasi seluler yang memudahkan pelanggan dalam melakukan
                                pemesanan, pembayaran, dan melacak lokasi kendaraan secara real-time. Selain itu, kami
                                selalu berusaha untuk menghadirkan armada ramah lingkungan guna mendukung upaya
                                keberlanjutan dan menjaga lingkungan.</h5>
                            <h5 style="text-align: justify">Alpha Rent juga mengutamakan keamanan pelanggan dan kendaraan.
                                Seluruh armada kami menjalani pemeliharaan rutin dan pemeriksaan keamanan secara berkala.
                                Dengan prosedur pemeliharaan yang ketat, kami memastikan bahwa setiap kendaraan yang
                                disewakan oleh Alpha Rent dalam kondisi optimal, memberikan ketenangan pikiran kepada
                                pelanggan kami.</h5>

                            <div class="row" style="text-align: justify">

                                <div class="col">
                                    <h6>
                                        Sebagai bagian dari komitmen kami terhadap pelayanan unggul, Alpha Rent senantiasa
                                        mendengarkan umpan balik pelanggan dan terus melakukan peningkatan. Kami percaya
                                        bahwa keberhasilan kami tidak hanya terletak pada kualitas armada dan teknologi,
                                        tetapi juga pada kemampuan kami untuk terus beradaptasi dengan kebutuhan pelanggan
                                        serta tren industri. Dengan semangat inovasi yang terus berkobar, Alpha Rent siap
                                        menghadapi masa depan rental mobil dengan memberikan solusi mobilitas yang lebih
                                        baik dan efisien.</h6>
                                </div>
                                <div class="col">
                                    <h6>Alpha Rent tidak hanya sekadar penyedia kendaraan, tetapi juga mitra perjalanan yang
                                        mengutamakan kenyamanan dan kepuasan pelanggan. Kami berusaha memberikan pengalaman
                                        menyenangkan setiap kali pelanggan memilih layanan rental kami. Dengan harga yang
                                        kompetitif, layanan pelanggan yang responsif, dan armada kendaraan yang selalu
                                        diperbarui, Alpha Rent hadir untuk memenuhi kebutuhan mobilitas pelanggan modern.
                                    </h6>
                                </div>
                            </div>
                            <h5 style="text-align: justify">Sebagai bagian dari misi kami untuk menjadi mitra mobilitas yang
                                terpercaya, Alpha Rent terus berupaya untuk memberikan penawaran khusus, promosi, dan
                                keuntungan lainnya kepada pelanggan setia kami. Dengan pelayanan berkualitas tinggi,
                                inovasi, dan komitmen terhadap kepuasan pelanggan, Alpha Rent bangga menjadi pilihan utama
                                dalam dunia rental mobil.</h5>
                            <h1 style="text-align: center" class="mt-5">Thank you for using our services.</h1>
                        </div>
                    </div>
                    <div id="kt_app_footer"
                        class="app-footer d-flex flex-column flex-md-row align-items-center flex-center flex-md-stack py-2 py-lg-4">
                        <!--begin::Copyright-->
                        <div class="text-dark order-2 order-md-1">
                            <span class="text-gray-400 fw-semibold me-1">2023&copy;</span>
                            <a href="/" target="_blank" class="text-gray-400 text-hover-primary">Keenthemes</a>
                        </div>
                        <!--end::Copyright-->
                        <!--begin::Menu-->
                        <ul class="menu menu-gray-400 menu-hover-primary fw-semibold order-1">
                            <li class="menu-item">
                                <a href="/" target="_blank" class="menu-link px-2">About</a>
                            </li>
                            <li class="menu-item">
                                <a href="/" target="_blank" class="menu-link px-2">Support</a>
                            </li>
                            <li class="menu-item">
                                <a href="/" target="_blank" class="menu-link px-2">Purchase</a>
                            </li>
                        </ul>
                        <!--end::Menu-->
                    </div>
                    <!--end::Footer-->
                </div>
                <!--end:::Main-->
            </div>
            <!--end::Wrapper container-->
        </div>
        <!--end::Wrapper-->
    </div>
@endsection
