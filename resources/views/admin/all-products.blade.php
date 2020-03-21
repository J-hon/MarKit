@extends('admin_main')

@section('title', '| All products')

@section('content')

        <div class="row">
            <div class="col-md-12">
                <div class="admin_product_container">
                    <a href="{{ route('product.add') }}" class="text-uppercase s-btn s-btn--md s-btn--white-brd g-radius--50">
                        Add Product
                    </a>
                </div>
            </div>
        </div>

        <div class="cart_section">
            <div class="section_container">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="cart_container">
                                <table id="cart" class="container table table-hover table-condensed">
                                    <thead>
                                        <tr>
                                            <th style="width:10%">S/N</th>
                                            <th style="width:70%">Product</th>
                                            <th style="width:10%">Edit</th>
                                            <th style="width:10%">Remove</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @if($products->isEmpty())
                                            <h4>No products found!</h4>
                                        @else

                                            <?php
                                                $count = 1;
                                            ?>

                                            @foreach($products as $product)

                                                <tr>
                                                    <td>{{ $count++ }}</td>
                                                    <td data-th="Product">
                                                        <div class="row">
                                                            <div class="col-sm-3 hidden-xs">
                                                                <img src="{{ asset('/img/product/'.$product->image) }}" width="100" height="100" style="border-radius: 50%" class="img-responsive"/>
                                                            </div>

                                                            <div class="col-sm-9">
                                                                <h4 class="nomargin">{{ $product->name }}</h4>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="edit">
                                                        <a href="{{ route('product.edit', $product->id) }}" class="btn btn-info btn-sm">
                                                            <i class="ti-pencil"></i>
                                                        </a>
                                                    </td>

                                                    <td class="edit">
                                                        <form action="{{ route('product.delete', $product->id) }}" method="post">
                                                            @csrf
                                                            <button class="btn btn-outline-danger" type="submit">
                                                                <i class="ti-trash"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{--End cart--}}

@endsection
