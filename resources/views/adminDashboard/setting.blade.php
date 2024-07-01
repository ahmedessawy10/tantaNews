@extends('adminDashboard.layouts.master')

@section('css')
@vite(['resources/css/app.css', 'resources/js/app.js'])
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="left-content">
        <div>
            <p class="mg-b-0">{{__("dashboard.setting")}}</p>
        </div>
    </div>

</div>


@endsection
@section('content')


@if ($errors->any())
<ul>

    @foreach ($errors->all() as $error)
    <li>
        {{ $error }}
    </li>
    @endforeach
</ul>
@else

@endif

@if(Session::has('sucess'))


<div class="alert alert-sucess ">
    {{Session::get('sucess')}}
</div>
@endif

<!-- /breadcrumb -->
<div class="bg-white  w-full fluid-container m-0">
    <form class="px-3 py-2" action="{{route("admin.setting.store")}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="grid sm:grid-cols-2 grid-cols-1 gap-2">
            <div class=" flex flex-col align-center justify-start">
                <label for="from-logo" class="font-bold text-md">{{__('dashboard.logo')}}</label>
                <input type="file" name="logo" id="from-logo">
                <img src="{{ asset(preg_replace('/\\\\/', '/', substr($setting->favicon, strpos($setting->favicon, 'img/')))) }}"
                    class="w-10 h-10 mt-2">
            </div>
            <div class=" flex flex-col align-center justify-start">
                <label for="favlogo" class="font-bold text-md">{{__('dashboard.favlogo')}}</label>
                <input type="file" name="favicon" id="favlogo">
                <img src="{{ asset(preg_replace('/\\\\/', '/', substr($setting->favicon, strpos($setting->favicon, 'img/')))) }}"
                    class="w-10 h-10 mt-2">

            </div>



            <div class="flex flex-col align-center justify-start">
                <label for="instagram" class="font-bold text-md">{{__('dashboard.instagram')}}</label>
                <input type="text" class="border rounded-lg" value="{{$setting->linkedin_url}}" name="linkedin_url"
                    id="instagram">
            </div>
            <div class="flex flex-col align-center justify-start">
                <label for="facebook" class="font-bold text-md">{{__('dashboard.facebook')}}</label>
                <input type="text" class="border rounded-lg" value="{{$setting->facebook_url}}" name="facebook_url"
                    id="facebook">
            </div>
            <div class="flex flex-col align-center justify-start">
                <label for="email" class="font-bold text-md">{{__('dashboard.email')}}</label>
                <input type="text" class="border rounded-lg" value="{{$setting->email}}" name="email" id="email">
            </div>
            <div class="flex flex-col align-center justify-start">
                <label for="phone" class="font-bold text-md">{{__('dashboard.phone')}}</label>
                <input type="text" class="border rounded-lg" value="{{$setting->phone_number}}" name="phone_number"
                    id="phone">
            </div>
        </div>

        <div class="panel panel-primary tabs-style-3 my-3">
            <div class="tab-menu-heading">
                <div class="tabs-menu ">
                    <!-- Tabs -->
                    <ul class="nav panel-tabs">
                        @foreach (config('app.languages') as $key=>$value )
                        <li class=""><a href="#{{$key}}" class="@if ($loop->index==0) 
                            active
                        @endif" data-toggle="tab"> {{$value}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="panel-body tabs-menu-body">
                <div class="tab-content">
                    @foreach (config('app.languages') as $key=>$value)

                    <div class="tab-pane @if ($loop->index==0)
                        active
                    @endif" id="{{$key}}">
                        <div class=" grid sm:grid-cols-2 grid-cols-1 gap-2 ">
                            <div class="flex flex-col align-center justify-start">
                                <label for="title{{$key}}" class="font-bold text-md">{{__('dashboard.title')}}
                                    {{$value}}</label>
                                <input type="text" class="border rounded-lg"
                                    value="{{$setting->translate($key)->title}}" name="{{$key}}[title]"
                                    id="title{{$key}}">
                            </div>
                            <div class="flex flex-col align-center justify-start">
                                <label for="address{{$key}}" class="font-bold text-md">{{__('dashboard.address')}}
                                    {{$value}}</label>
                                <input type="text" class="border rounded-lg" name="{{$key}}[address]"
                                    id="address{{$key}}" value="{{$setting->translate($key)->address}}">
                            </div>
                            <div class=" flex flex-col align-center justify-start">
                                <label for="content{{$key}}" class="font-bold text-md">{{__('dashboard.content')}}
                                    {{$value}}</label>
                                <textarea type="text" rows="6" class="border rounded-lg" name="{{$key}}[content]"
                                    id="content{{$key}}">{{$setting->translate($key)->content}}</textarea>
                            </div>

                        </div>
                    </div>
                    @endforeach


                </div>
            </div>
        </div>

        </ul>

        <div class="flex justify-center items-center w-full">
            <input type="submit" class="button bg-primary rounded-3xl  px-6 py-3 text-white w-lg max-w-full">
        </div>

    </form>
</div>



@endsection


@section('js')

@endsection