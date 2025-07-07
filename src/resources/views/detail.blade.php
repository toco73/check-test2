@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{asset('css/detail.css')}}">
@endsection

@section('content')
<div class="detail-page">
<div class="detail-page__inner">
        <form action="{{route('products.update',$product->id)}}" method="post" enctype="multipart/form-data">
            @method('PATCH')
            @csrf
            <div class="detail-page__group">
                <img src="{{asset('storage/' . $product->image)}}" alt="{{$product->name}}">
                <input class="detail-page__input" type="file" name="image" value="{{$product['image']}}" placeholder="ファイルを選択">
                <p class="detail-page__eeror-message">
                    @error('image')
                    {{$message}}
                    @enderror
                </p>
            </div>

            <div class="detail-page__group">
                <label class="detail-page__label" for="name">
                    商品名
                </label>
                <input class="detail-page__input" type="text" name="name" id="name" value="{{$product['name']}}" placeholder="商品名を入力">
                <p class="detail-page__eeror-message">
                    @error('name')
                    {{$message}}
                    @enderror
                </p>
            </div>

            <div class="detail-page__group">
                <label class="detail-page__label" for="price">
                    値段
                </label>
                <input class="detail-page__input" type="text"  name="price" id="price" value="{{$product['price']}}" placeholder="値段を入力">
                <p class="detail-page__eeror-message">
                    @error('price')
                    {{$message}}
                    @enderror
                </p>
            </div>

            <div class="detail-page__group">
                <label class="detail-page__label" for="">
                    季節
                </label>
                <div class="detail-page__season-inputs">
                    @foreach($seasons as $season)
                    <div class="detail-page__season-option">
                        <label class="detail-page__season-label">
                            <input class="detail-page__season-input" name="season_id[]" type="checkbox" value="{{$season->id}}" {{in_array($season->id, old('season_id',$product->seasons->pluck('id')->toArray())) ? 'checked' : ''}}><span class="detail-page__season-text">{{$season->name}}</span>
                        </label>
                    </div>
                    @endforeach
                </div>
                <p class="detail-page__eeror-message">
                    @error('season_id')
                    {{$message}}
                    @enderror
                </p>
            </div>

            <div class="detail-page__group">
                <label class="detail-page__label" for="description">
                    商品説明
                </label>
                <textarea class="detail-page__input" name="description"  id="description"  placeholder="商品の説明を入力">{{$product['description']}}</textarea>
                <p class="detail-page__eeror-message">
                    @error('description')
                    {{$message}}
                    @enderror
                </p>
            </div>
            <a class="detail-page__btn-back" href="/products">戻る</a>
            <input class="detail-page__btn-update" type="submit" value="変更を保存">

        </form>
        <form action="{{route('products.delete',$product->id)}}" class="detail-page__delete-form" method="post">
            @method('DELETE')
            @csrf
            <input class="detail-page__btn-delete" type="image" src="{{asset('images/react-icons.png')}}" alt="削除" style="width:30px; height:auto;">
        </form>
    </div>
</div>
@endsection