@extends('user.layout.app')
@section('content')
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Berita</h2>
                <ol>
                    <li><a href="{{ route('index') }}">Home</a></li>
                    <li>Berita</li>
                </ol>
            </div>

        </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>Berita</h2>
                <p>Example inner page template</p>
            </div>

            <div class="row g-5">

                <div class="col-lg-8">

                    <div class="row gy-4 posts-list">

                        <div class="col-lg-6">
                            <article class="d-flex flex-column">

                                <div class="post-img">
                                    <img src="{{ url('HeroBiz') }}/assets/img/blog/blog-1.jpg" alt=""
                                        class="img-fluid">
                                </div>

                                <h2 class="title">
                                    <a href="blog-details.html">Dolorum optio tempore voluptas dignissimos cumque fuga qui
                                        quibusdam quia</a>
                                </h2>

                                <div class="meta-top">
                                    <ul>
                                        <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a
                                                href="blog-details.html">John Doe</a></li>
                                        <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                                href="blog-details.html"><time datetime="2022-01-01">Jan 1, 2022</time></a>
                                        </li>

                                    </ul>
                                </div>

                                <div class="content">
                                    <p>
                                        Similique neque nam consequuntur ad non maxime aliquam quas. Quibusdam animi
                                        praesentium. Aliquam et laboriosam eius aut nostrum quidem aliquid dicta.
                                    </p>
                                </div>

                                <div class="read-more mt-auto align-self-end">
                                    <a href="{{ route('berita.detail') }}">Read More</a>
                                </div>

                            </article>
                        </div><!-- End post list item -->

                        <div class="col-lg-6">
                            <article class="d-flex flex-column">

                                <div class="post-img">
                                    <img src="{{ url('HeroBiz') }}/assets/img/blog/blog-2.jpg" alt=""
                                        class="img-fluid">
                                </div>

                                <h2 class="title">
                                    <a href="blog-details.html">Nisi magni odit consequatur autem nulla dolorem</a>
                                </h2>

                                <div class="meta-top">
                                    <ul>
                                        <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a
                                                href="blog-details.html">John Doe</a></li>
                                        <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                                href="blog-details.html"><time datetime="2022-01-01">Jan 1, 2022</time></a>
                                        </li>

                                    </ul>
                                </div>

                                <div class="content">
                                    <p>
                                        Incidunt voluptate sit temporibus aperiam. Quia vitae aut sint ullam quis illum
                                        voluptatum et. Quo libero rerum voluptatem pariatur nam.
                                    </p>
                                </div>

                                <div class="read-more mt-auto align-self-end">
                                    <a href="{{ route('berita.detail') }}">Read More</a>
                                </div>

                            </article>
                        </div><!-- End post list item -->

                        <div class="col-lg-6">
                            <article class="d-flex flex-column">

                                <div class="post-img">
                                    <img src="{{ url('HeroBiz') }}/assets/img/blog/blog-3.jpg" alt=""
                                        class="img-fluid">
                                </div>

                                <h2 class="title">
                                    <a href="blog-details.html">Possimus soluta ut id suscipit ea ut. In quo quia et soluta
                                        libero sit sint.</a>
                                </h2>

                                <div class="meta-top">
                                    <ul>
                                        <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a
                                                href="blog-details.html">John Doe</a></li>
                                        <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                                href="blog-details.html"><time datetime="2022-01-01">Jan 1, 2022</time></a>
                                        </li>

                                    </ul>
                                </div>

                                <div class="content">
                                    <p>
                                        Aut iste neque ut illum qui perspiciatis similique recusandae non. Fugit autem
                                        dolorem labore omnis et. Eum temporibus fugiat voluptate enim tenetur sunt omnis.
                                    </p>
                                </div>

                                <div class="read-more mt-auto align-self-end">
                                    <a href="{{ route('berita.detail') }}">Read More</a>
                                </div>

                            </article>
                        </div><!-- End post list item -->

                        <div class="col-lg-6">
                            <article class="d-flex flex-column">

                                <div class="post-img">
                                    <img src="{{ url('HeroBiz') }}/assets/img/blog/blog-4.jpg" alt=""
                                        class="img-fluid">
                                </div>

                                <h2 class="title">
                                    <a href="blog-details.html">Non rem rerum nam cum quo minus. Dolor distinctio deleniti
                                        explicabo eius exercitationem.</a>
                                </h2>

                                <div class="meta-top">
                                    <ul>
                                        <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a
                                                href="blog-details.html">John Doe</a></li>
                                        <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                                href="blog-details.html"><time datetime="2022-01-01">Jan 1, 2022</time></a>
                                        </li>

                                    </ul>
                                </div>

                                <div class="content">
                                    <p>
                                        Aspernatur rerum perferendis et sint. Voluptates cupiditate voluptas atque quae. Rem
                                        veritatis rerum enim et autem. Saepe atque cum eligendi eaque iste omnis a qui.
                                    </p>
                                </div>

                                <div class="read-more mt-auto align-self-end">
                                    <a href="{{ route('berita.detail') }}">Read More</a>
                                </div>

                            </article>
                        </div><!-- End post list item -->

                        <div class="col-lg-6">
                            <article class="d-flex flex-column">

                                <div class="post-img">
                                    <img src="{{ url('HeroBiz') }}/assets/img/blog/blog-5.jpg" alt=""
                                        class="img-fluid">
                                </div>

                                <h2 class="title">
                                    <a href="blog-details.html">Accusamus quaerat aliquam qui debitis facilis
                                        consequatur</a>
                                </h2>

                                <div class="meta-top">
                                    <ul>
                                        <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a
                                                href="blog-details.html">John Doe</a></li>
                                        <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                                href="blog-details.html"><time datetime="2022-01-01">Jan 1,
                                                    2022</time></a></li>

                                    </ul>
                                </div>

                                <div class="content">
                                    <p>
                                        In itaque assumenda aliquam voluptatem qui temporibus iusto nisi quia. Autem vitae
                                        quas aperiam nesciunt mollitia tempora odio omnis. Ipsa odit sit ut amet
                                        necessitatibus. Quo ullam ut corrupti autem consequuntur totam dolorem.
                                    </p>
                                </div>

                                <div class="read-more mt-auto align-self-end">
                                    <a href="{{ route('berita.detail') }}">Read More</a>
                                </div>

                            </article>
                        </div><!-- End post list item -->

                        <div class="col-lg-6">
                            <article class="d-flex flex-column">

                                <div class="post-img">
                                    <img src="{{ url('HeroBiz') }}/assets/img/blog/blog-6.jpg" alt=""
                                        class="img-fluid">
                                </div>

                                <h2 class="title">
                                    <a href="blog-details.html">Distinctio provident quibusdam numquam aperiam aut</a>
                                </h2>

                                <div class="meta-top">
                                    <ul>
                                        <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a
                                                href="blog-details.html">John Doe</a></li>
                                        <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                                href="blog-details.html"><time datetime="2022-01-01">Jan 1,
                                                    2022</time></a></li>

                                    </ul>
                                </div>

                                <div class="content">
                                    <p>
                                        Expedita et temporibus eligendi enim molestiae est architecto praesentium dolores.
                                        Illo laboriosam officiis quis. Labore officia quia sit voluptatem nisi est
                                        dignissimos totam. Et voluptate et consectetur voluptatem id dolor magni impedit.
                                        Omnis dolores sit.
                                    </p>
                                </div>

                                <div class="read-more mt-auto align-self-end">
                                    <a href="{{ route('berita.detail') }}">Read More</a>
                                </div>

                            </article>
                        </div><!-- End post list item -->

                    </div><!-- End blog posts list -->

                    <div class="blog-pagination">
                        <ul class="justify-content-center">
                            <li><a href="#">1</a></li>
                            <li class="active"><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                        </ul>
                    </div><!-- End blog pagination -->

                </div>

                <div class="col-lg-4">

                    <div class="sidebar">

                        <div class="sidebar-item recent-posts">
                            <h3 class="sidebar-title">Berita Lainnya</h3>

                            <div class="mt-3">

                                <div class="post-item mt-3">
                                    <img src="{{ url('HeroBiz') }}/assets/img/blog/blog-recent-1.jpg" alt=""
                                        class="flex-shrink-0">
                                    <div>
                                        <h4><a href="blog-post.html">Nihil blanditiis at in nihil autem</a></h4>
                                        <time datetime="2020-01-01">Jan 1, 2020</time>
                                    </div>
                                </div><!-- End recent post item-->

                                <div class="post-item">
                                    <img src="{{ url('HeroBiz') }}/assets/img/blog/blog-recent-2.jpg" alt=""
                                        class="flex-shrink-0">
                                    <div>
                                        <h4><a href="blog-post.html">Quidem autem et impedit</a></h4>
                                        <time datetime="2020-01-01">Jan 1, 2020</time>
                                    </div>
                                </div><!-- End recent post item-->

                                <div class="post-item">
                                    <img src="{{ url('HeroBiz') }}/assets/img/blog/blog-recent-3.jpg" alt=""
                                        class="flex-shrink-0">
                                    <div>
                                        <h4><a href="blog-post.html">Id quia et et ut maxime similique occaecati ut</a>
                                        </h4>
                                        <time datetime="2020-01-01">Jan 1, 2020</time>
                                    </div>
                                </div><!-- End recent post item-->

                                <div class="post-item">
                                    <img src="{{ url('HeroBiz') }}/assets/img/blog/blog-recent-4.jpg" alt=""
                                        class="flex-shrink-0">
                                    <div>
                                        <h4><a href="blog-post.html">Laborum corporis quo dara net para</a></h4>
                                        <time datetime="2020-01-01">Jan 1, 2020</time>
                                    </div>
                                </div><!-- End recent post item-->

                                <div class="post-item">
                                    <img src="{{ url('HeroBiz') }}/assets/img/blog/blog-recent-5.jpg" alt=""
                                        class="flex-shrink-0">
                                    <div>
                                        <h4><a href="blog-post.html">Et dolores corrupti quae illo quod dolor</a></h4>
                                        <time datetime="2020-01-01">Jan 1, 2020</time>
                                    </div>
                                </div><!-- End recent post item-->
                                <br><a href="#" class="read-more align-self-start">Lihat Selengkapnya <i
                                        class="bi bi-arrow-right"></i></a>

                            </div>

                        </div><!-- End sidebar recent posts-->

                    </div><!-- End Blog Sidebar -->

                </div>

            </div>

        </div>
    </section><!-- End Blog Section -->
@endsection
