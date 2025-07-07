@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{asset('css/register.css')}}">
@endsection

@section('content')
<div class="register-page">
    <div class="register-page__header">
        <h2 class="register-page__heading content__heading">商品登録</h2>
    </div>
    <div class="register-page__inner">
        <form action="/products" method="post" enctype="multipart/form-data">
            @csrf
            <div class="register-page__group">
                <label class="register-page__label" for="name">
                    商品名<span class="register-page__required">必須</span>
                </label>
                <input class="register-page__input" type="text" name="name" id="name" value="{{old('name')}}" placeholder="商品名を入力">
                <p class="register-page__eeror-message">
                    @error('name')
                    {{$message}}
                    @enderror
                </p>
            </div>

            <div class="register-page__group">
                <label class="register-page__label" for="price">
                    値段<span class="register-page__required">必須</span>
                </label>
                <input class="register-page__input" type="text"  name="price" id="price" value="{{old('price')}}" placeholder="値段を入力">
                <p class="register-page__eeror-message">
                    @error('price')
                    {{$message}}
                    @enderror
                </p>
            </div>

            <div class="register-page__group">
                <label class="register-page__label" for="image">
                    商品画像<span class="register-page__required">必須</span>
                </label>
                <input class="register-page__input" type="file" name="image" id="image" value="{{old('image')}}" placeholder="ファイルを選択">
                <p class="register-page__eeror-message">
                    @error('image')
                    {{$message}}
                    @enderror
                </p>
            </div>

            <div class="register-page__group">
                <label class="register-page__label" for="">
                    季節<span class="register-page__required">必須</span><span class="register-page__multiple">複数選択可</span>
                </label>
                <div class="register-page__season-inputs">
                    @foreach($seasons as $season)
                    <div class="register-page__season-option">
                        <label class="register-page__season-label">
                            <input class="register-page__season-input" name="season_id[]" type="checkbox" value="{{$season->id}}" {{in_array($season->id, old('season_id',[])) ? 'checked' : ''}}><span class="register-page__season-text">{{$season->name}}</span>
                        </label>
                    </div>
                    @endforeach
                </div>
                <p class="register-page__eeror-message">
                    @error('season_id')
                    {{$message}}
                    @enderror
                </p>
            </div>

            <div class="register-page__group">
                <label class="register-page__label" for="description">
                    商品説明<span class="register-page__required">必須</span>
                </label>
                <textarea class="register-page__input" name="description"  id="description"  placeholder="商品の説明を入力">{{old('description')}}</textarea>
                <p class="register-page__eeror-message">
                    @error('description')
                    {{$message}}
                    @enderror
                </p>
            </div>
            <a class="register-page__btn-back" href="/products">戻る</a>
            <input class="register-page__btn" type="submit" value="登録">
        </form>
    </div>
</div>
@endsection