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
        <div class="product-page__heading-inner">
            <h2 class="product-page__heading content__heading">{{request('keyword') ? '"' . request('keyword') . '"の商品一覧' :'商品一覧'}}</h2>
        </div>
        <div class="product-page__form-inner">
            <form  class="product-page__form" action="/products/register" method="get">
                <button class="product-page__add-btn">+商品を追加</button>
            </form>
        </div>
    </div>
    <div class="product-form__inner">
        <div class="product-form__area">  
            <form action="/products/search" method="get">
                @csrf
                <div class="product-form__area-search">
                    <div class="product-form__area-input">
                        <input class="product-form__input" type="text" name="keyword" value="{{request('keyword')}}" placeholder="商品名で検索">
                    </div>
                    <div class="product-form__area-btn">
                        <button class="product-form__search-btn btn" type="submit">検索</button>
                    </div>
                </div> 
            </form>
            
            <form action="/products/search" method="get">
                <div class="product-form__area-sort">
                    @csrf
                    <div class="product-form__area-sort-label">
                        <input type="hidden" name="keyword" value="{{request('keyword')}}">
                        <span class="product-form__label">価格順で表示</span>
                    </div>
                    <div class="product-form__area-sort-select">
                        <select class="product-form__select" name="sort" onchange="this.form.submit()">
                            <option value="" disabled selected>価格順で並べ替え</option>
                            <option value="price-desc" {{request('sort') == 'price-desc' ? 'selected' : '' }}>高い順に表示</option>
                            <option value="price-asc" {{request('sort') == 'price-asc' ? 'selected' : '' }}>低い順に表示</option>
                        </select>
                    </div>
                    @if(request('sort'))
                    <div class="product-form__select-item">
                        {{request('sort') == 'price-desc' ? '高い順に表示' : '低い順に表示'}}
                        <a class="product-form__select-dlete" href="/products">&times;</a>
                    </div>
                    @endif
                </div>
            </form>
            
        </div>
        <div class="product-card__area">
            <div class="product-card__inner">
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
</div>
@endsection

