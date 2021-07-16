@extends('layouts.admin')

@inject('banner', 'App\Models\Banner')

@section('content')

<div class="main-container flex flex-row flex-wrap w-full mx-14">
    @foreach ($banner->get() as $item)
    <div class="mb-5 mr-5">
        <figcaption class="ml-1 font-weight-bold mb-2 text-gray-800">{{ $item->banner_name }}. ზომა: {{ $item->resolution }}</figcaption> 
        <img class="image" src="/images/banner-image/{{ $banner->image_name( $item->id ) }}"> <br>
        <a class="btn btn-primary mt-2" href="/admin/banners/{{ $item->id }}">შეცვლა</a>
    </div>
    @endforeach
</div>
    
@endsection