    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">

        <div class="footer-content">
            <div class="container">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible show fade">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
                @if ($message = Session::get('error'))
                    <div class="alert alert-danger alert-dismissible show fade">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
                <div class="row">

                    <div class="col-lg-3 col-md-6">
                        <div class="footer-info">
                            <h3>BPR. Punya Ciki - Dummy</h3>
                            <p>
                                A108 Adam Street <br>
                                NY 535022, USA<br><br>
                                <strong>Phone:</strong> +1 5589 55488 55<br>
                                <strong>Email:</strong> info@example.com<br>
                            </p>
                        </div>
                        <div class="text-white">GOOGLE MAPS</div>
                        <div class="embed-responsive embed-responsive-1by1" style="width: 100%">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d247.20254839324883!2d111.66315943367334!3d-7.548702381711798!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e79c7e1aa5e706b%3A0x3f538eb78c369f64!2sJl.%20Panglima%20Sudirman%20No.96b%2C%20Mejayan%2C%20Kec.%20Mejayan%2C%20Kabupaten%20Madiun%2C%20Jawa%20Timur%2063153!5e0!3m2!1sid!2sid!4v1659509842357!5m2!1sid!2sid"="600"="450"
                                style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        </div>
                        <br>
                    </div>

                    <div class="col-lg-2 col-md-6 footer-links">
                        <h4>Profil Perusahaan</h4>
                        <ul>
                            <li><i class="bi bi-chevron-right"></i> <a href="#">Visi & Misi</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#">Sejarah</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#">Direksi</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#">Jaringan Kantor</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-2 col-md-6 footer-links">
                        <h4>Produk & Layanan</h4>
                        <ul>
                            <li><i class="bi bi-chevron-right"></i> <a href="#">Simulasi Kredit</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#">Buka Tabungan</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#">Buka Deposito</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#">Pengajuan Kredit</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-2 col-md-6 footer-links">
                        <h4>Informasi</h4>
                        <ul>
                            <li><i class="bi bi-chevron-right"></i> <a href="#">Berita</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#">Lelang</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#">Galeri</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#">Download Area</a></li>
                            {{-- <li><i class="bi bi-chevron-right"></i> <a href="#">Graphic Design</a></li> --}}
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-newsletter">
                        <h4>Tentang Kami</h4>
                        <div style="color: white; font-family:sans-serif">
                            <p align="center">
                                <font color="#FFFFFF"><span style="font-weight: normal;">BPR Punya Ciki.<br>"Layanan
                                        Masyarakat Cepat dan Terpercaya"<br></span></font>
                            </p>
                        </div>
                        <form action="{{ route('subscribe.store') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="email" name="email">
                            <input type="submit" value="Subscribe">
                        </form>
                        <p>Dapatkan info terkini dari BPR. Punya Ciki di inbox email Anda.</p>
                        <br>
                    </div>

                </div>
            </div>
        </div>

        <div class="footer-legal text-center">
            <div
                class="container d-flex flex-column flex-lg-row justify-content-center justify-content-lg-between align-items-center">

                <div class="d-flex flex-column align-items-center align-items-lg-start">
                    <div class="copyright">
                        &copy; Copyright
                        <script>
                            document.write(new Date().getFullYear());
                        </script>
                        <strong><span>PT. Marstech Global</span></strong>. All Rights Reserved
                    </div>
                    <div class="credits">
                        <!-- All the links in the footer should remain intact. -->
                        <!-- You can delete the links only if you purchased the pro version. -->
                        <!-- Licensing information: https://bootstrapmade.com/license/ -->
                        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/herobiz-bootstrap-business-template/ -->
                        {{-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> --}}
                    </div>
                </div>

                <div class="social-links order-first order-lg-last mb-3 mb-lg-0">
                    <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                    <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="google-plus"><i class="bi bi-skype"></i></a>
                    <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                </div>

            </div>
        </div>

    </footer><!-- End Footer -->
