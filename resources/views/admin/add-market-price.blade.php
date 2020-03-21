@extends('admin_main')

@section('title', '| All market prices')

@section('content')

    <!-- Feedback Form -->
    <div class="admin">
        <div class="g-bg-color--sky-light">
            <div class="container g-padding-y-80--xs g-padding-y-125--sm">
                <div class="g-text-center--xs g-margin-b-80--xs">
                    <h2 class="g-font-size-32--xs g-font-size-36--md">Add Market price</h2>
                </div>
                <form method="post" action="{{ route('price.store') }}">
                    {{ csrf_field() }}

                    <div class="row g-margin-b-40--xs">
                        <div class="col-sm-12 g-margin-b-20--xs g-margin-b-0--md">
                            <div class="g-margin-b-20--xs">
                                <select name="market_id" class="form-control s-form-v2__input g-radius--50">
                                    <option selected>Choose a market</option>
                                    @foreach($markets as $market)
                                            <option value="{{ $market->id }}">
                                                {{ $market->name }}
                                            </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-12 g-margin-b-20--xs g-margin-b-0--md">
                            <div class="g-margin-b-20--xs">
                                <select name="product_id" class="form-control s-form-v2__input g-radius--50">
                                    <option selected>Choose a product</option>
                                    @foreach($products as $product)
                                            <option value="{{ $product->id }}">
                                                {{ $product->name }}
                                            </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-12 g-margin-b-20--xs g-margin-b-0--md">
                            <div class="g-margin-b-20--xs">
                                <input type="text" class="form-control s-form-v2__input g-radius--50" name="price" placeholder="* price">
                            </div>
                        </div>

                    </div>
                    <div class="g-text-center--xs">
                        <button type="submit" class="text-uppercase s-btn s-btn--md s-btn--primary-bg g-radius--50 g-padding-x-80--xs">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Feedback Form -->

@endsection
