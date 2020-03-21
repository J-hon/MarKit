@extends('admin_main')

@section('title', '| Add products')

@section('content')

    <!-- Feedback Form -->
    <div class="admin">
        <div class="g-bg-color--sky-light">
            <div class="container g-padding-y-80--xs g-padding-y-125--sm">
                <div class="g-text-center--xs g-margin-b-80--xs">
                    <h2 class="g-font-size-32--xs g-font-size-36--md">Add Products</h2>
                </div>

                <form method="post" action="{{ route('product.store') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="row g-margin-b-40--xs">
                        <div class="col-sm-12 g-margin-b-20--xs g-margin-b-0--md">
                            <div class="g-margin-b-20--xs">
                                <input type="text" class="form-control s-form-v2__input g-radius--50" name="name" placeholder="* Name">
                            </div>
                        </div>

                        <div class="col-sm-12 g-margin-b-20--xs g-margin-b-0--md">
                            <div class="g-margin-b-20--xs">
                                <input type="file" class="form-control s-form-v2__input g-radius--50" name="image">
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <textarea class="form-control s-form-v2__input g-radius--10 g-padding-y-20--xs" rows="8" name="description" placeholder="* Description"></textarea>
                        </div>
                    </div>
                    <div class="g-text-center--xs">
                        <button type="submit" class="text-uppercase s-btn s-btn--md s-btn--primary-bg g-radius--50 g-padding-x-80--xs">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Feedback Form -->

@endsection
