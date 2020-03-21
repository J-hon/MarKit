@extends('admin_main')

@section('title', '| All markets')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="admin_product_container">
                <a href="{{ route('market.add') }}" class="text-uppercase s-btn s-btn--md s-btn--white-brd g-radius--50">
                    Add market
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
                                        <th style="width:25%">Market</th>
                                        <th style="width:35%">Address</th>
                                        <th style="width:15%">Edit</th>
                                        <th style="width:15%">Remove</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @if($markets->isEmpty())
                                        <h4>No markets found!</h4>
                                    @else

                                        <?php
                                            $count = 1;
                                        ?>

                                        @foreach($markets as $market)

                                            <tr>
                                                <td>{{ $count++ }}</td>
                                                <td data-th="Product">
                                                    <div class="row">
                                                        <div class="col-sm-9">
                                                            <h4 class="nomargin">{{ $market->name }}</h4>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td data-th="Product">
                                                    <div class="row">
                                                        <div class="col-sm-9">
                                                            <h4 class="nomargin">{{ $market->address }}</h4>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="edit">
                                                    <a href="{{ route('market.edit', $market->id) }}" class="btn btn-info btn-sm">
                                                        <i class="ti-pencil"></i>
                                                    </a>
                                                </td>

                                                <td class="edit">
                                                    <form action="{{ route('market.delete', $market->id) }}" method="post">
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
