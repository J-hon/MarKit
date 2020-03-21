@extends('main')

@section('title', '')

@section('content')

    <!--========== SWIPER SLIDER ==========-->
    <div class="s-swiper js__swiper-one-item">
        <!-- Swiper Wrapper -->
        <div class="swiper-wrapper">
            <div class="g-fullheight--xs g-bg-position--center swiper-slide" style="background: url('img/1920x1080/02.jpg');">
                <div class="container g-text-center--xs g-ver-center--xs">
                    <div class="g-margin-b-30--xs">
                        <h1 class="g-font-size-35--xs g-font-size-45--sm g-font-size-55--md g-color--white">MarKit</h1>
                    </div>
                </div>
            </div>

            <div class="g-fullheight--xs g-bg-position--center swiper-slide" style="background: url('img/1920x1080/01.jpg');">
                <div class="container g-text-center--xs g-ver-center--xs">
                    <div class="g-margin-b-30--xs">
                        <h1 class="g-font-size-35--xs g-font-size-45--sm g-font-size-55--md g-color--white">
                            Various prices you can choose from.
                        </h1>
                    </div>
                </div>
            </div>
        </div>

        <!-- End Swiper Wrapper -->

        <!-- Arrows -->
        <a href="javascript:void(0);" class="s-swiper__arrow-v1--right s-icon s-icon--md s-icon--white-brd g-radius--circle ti-angle-right js__swiper-btn--next"></a>
        <a href="javascript:void(0);" class="s-swiper__arrow-v1--left s-icon s-icon--md s-icon--white-brd g-radius--circle ti-angle-left js__swiper-btn--prev"></a>
        <!-- End Arrows -->

        <a href="#js__scroll-to-section" class="s-scroll-to-section-v1--bc g-margin-b-15--xs">
            <span class="g-font-size-18--xs g-color--white ti-angle-double-down"></span>
            <p class="text-uppercase g-color--white g-letter-spacing--3 g-margin-b-0--xs">Learn More</p>
        </a>
    </div>
    <!--========== END SWIPER SLIDER ==========-->

    <!-- Portfolio Filter -->
    <div class="container g-padding-y-80--xs" id="js__scroll-to-section">
        <div class="g-text-center--xs g-margin-b-40--xs">
            <h2 class="g-font-size-32--xs g-font-size-36--md">Products</h2>
        </div>
    </div>
    <!-- End Portfolio Filter -->

    <!-- Portfolio Gallery -->
    <div class="container g-margin-b-100--xs">
        <div id="js__grid-portfolio-gallery" class="cbp">

            @foreach($products as $product)
                <!-- Item -->
                <div class="s-portfolio__item cbp-item">
                    <div class="s-portfolio__img-effect">
                        <img src="{{ asset('img/product/'. $product->image) }}" alt="{{ $product->image }}">
                    </div>
                    <div class="s-portfolio__caption-hover--cc">
                        <div class="g-margin-b-25--xs">
                            <h4 class="g-font-size-18--xs g-color--white g-margin-b-5--xs">
                                {{ $product->name }}
                            </h4>
                            <p class="g-color--white-opacity">
                                {{ $product->description }}
                            </p>
                        </div>
                        <ul class="list-inline g-ul-li-lr-5--xs g-margin-b-0--xs">
                            <li>
                                <a href="{{ asset('img/product/'. $product->image) }}" class="cbp-lightbox s-icon s-icon--sm s-icon--white-bg g-radius--circle" data-title="Portfolio Item <br/> by KeenThemes Inc.">
                                    <i class="ti-fullscreen"></i>
                                </a>
                            </li>
                            <br>
                            <a href="{{ route('show', $product->id) }}" style="color: white">
                                View more
                            </a>
                        </ul>
                    </div>
                </div>
            @endforeach
            <!-- End Item -->

        </div>
        <!-- End Portfolio Gallery -->
    </div>
    <!-- End Portfolio -->

    <!-- Contact -->
    <div class="s-promo-block-v7 g-bg-position--center g-bg-color--dark-light" style="background: url('img/1920x1080/05.jpg') no-repeat;">
        <div class="g-container--sm g-padding-y-80--xs g-padding-y-125--xsm">
            <div class="g-text-center--xs g-margin-b-60--xs">
                <p class="text-uppercase g-font-size-14--xs g-font-weight--700 g-color--white-opacity g-letter-spacing--2 g-margin-b-25--xs">Contact Us</p>
                <h2 class="g-font-size-32--xs g-font-size-36--md g-color--white">Get in Touch</h2>
            </div>
            <form class="center-block g-width-500--sm g-width-550--md">
                <div class="g-margin-b-30--xs">
                    <input type="text" class="form-control s-form-v3__input" placeholder="* Name">
                </div>
                <div class="row g-margin-b-50--xs">
                    <div class="col-sm-6 g-margin-b-30--xs g-margin-b-0--md">
                        <input type="email" class="form-control s-form-v3__input" placeholder="* Email">
                    </div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control s-form-v3__input" placeholder="* Phone">
                    </div>
                </div>
                <div class="g-margin-b-80--xs">
                    <textarea class="form-control s-form-v3__input" rows="5" placeholder="* Your message"></textarea>
                </div>
                <div class="g-text-center--xs">
                    <button type="submit" class="text-uppercase s-btn s-btn--md s-btn--white-brd g-radius--50 g-padding-x-70--xs g-margin-b-20--xs">Submit</button>
                </div>
            </form>
        </div>
    </div>
    <!-- End Contact -->

    <!--========== END PAGE CONTENT ==========-->

@endsection
