@extends('main')

@section('title', '| ' . $product->name)

@section('content')

    <!-- Parallax -->
    <div class="js__parallax-window" style="background: #222324 50% 0 no-repeat fixed; height: 300px">
        <div class="container g-text-center--xs g-padding-y-80--xs g-padding-y-125--sm">
            <div class="g-margin-b-80--xs">
                <h2 class="g-font-size-40--xs g-font-size-50--sm g-font-size-60--md g-color--white">The Fastest Way To Develop</h2>
            </div>
        </div>
    </div>
    <!-- End Parallax -->

    <section class="product-content">
        <div class="container">
            <div class="back-link">
                <a href="{{ route('home') }}"> &lt;&lt; Back to Products</a>
            </div>

            <div class="row">
                <div class="col-lg-6 product-pic">
                    <img src="{{ asset('/img/product/'.$product->image) }}" class="img-responsive" alt="{{ $product->image }}">
                </div>

                <div class="col-lg-6 product-details">
                    <h1 class="p-title">{{ $product->name }}</h1>
                    <br>
                    <h6 class="p-title">{{ $product->description }}</h6>

                    <br>

                    @foreach($prices as $price)
                        <h5 class="p-title">Price - {{ $price->price }}</h5>

                        <h6 class="p-title">Market - {{ $price->market->name }}</h6>
                    @endforeach

                </div>

            </div>
        </div>
    </section>

@endsection
