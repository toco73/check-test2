@extends('layouts.app')
<style>
    svg.w-5.h-5{
        width:30px;
        height:30px;
    }
</style>

@section('css')
<link rel="stylesheet" href="{{asset('css/product.css')}}">
@endsection

@section('content')
<div class="product-page">
    <div class="product-page__header">
        <h2 class="product-page__heading content__heading">商品一覧</h2>
        <a class="product-page__btn-add" href="/products/register">+商品を追加</a>
    </div>
    <div class="product-form__inner">
        <form action="/products/search" method="get">
            @csrf
            <input class="product-form__input" type="text" name="keyword" value="{{request('keyword')}}" placeholder="商品名で検索">
            <button class="product-form__btn" type="submit">検索</button>
        </form>

        <form action="/products/search" method="get">
            @csrf
            <input type="hidden" name="keyword" value="{{request('keyword')}}">
            <span class="product-form__label">価格順で表示</span>
            <select class="product-form__select" name="sort" onchange="this.form.submit()">
                <option value="" disabled selected>価格順で並べ替え</option>
                <option value="price-desc" {{request('sort') == 'price-desc' ? 'selected' : '' }}>高い順に表示</option>
                <option value="price-asc" {{request('sort') == 'price-asc' ? 'selected' : '' }}>低い順に表示</option>
            </select>
            @if(request('sort'))
                <div class="">
                    {{request('sort') == 'price-desc' ? '高い順に表示' : '低い順に表示'}}
                    <a href="/products">&times;</a>
                </div>
                @endif
        </form>
        
        <div class="product-card">
            @foreach($products as $product)
            <div class="product-card__group">
                <a href="{{route('products.detail',$product->id)}}">
                    <img class="product-card__img" src="{{asset('storage/' . $product->image)}}" alt="{{$product->name}}">
                    <div class="product-card__body">
                        <p class="product-card__name">{{$product->name}}</p>
                        <p class="product-card__price">¥{{$product->price}}</p>
                    </div>
                </a>
            </div>
            
            @endforeach
        </div>
        {{$products->links()}}
    </div>
</div>
@endsection

