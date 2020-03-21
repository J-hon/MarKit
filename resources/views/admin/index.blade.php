@extends('admin_main')

@section('title', '| All Market')

@section('content')

    <div class="admin_container">
        <a href="{{ route('product') }}" class="text-uppercase s-btn s-btn--md s-btn--white-brd g-radius--50">
            Product
        </a>

        <br><br>

        <a href="{{ route('market') }}" class="text-uppercase s-btn s-btn--md s-btn--white-brd g-radius--50">
            Market
        </a>

        <br><br>

        <a href="{{ route('price') }}" class="text-uppercase s-btn s-btn--md s-btn--white-brd g-radius--50">
            Market Price
        </a>
    </div>

@endsection
