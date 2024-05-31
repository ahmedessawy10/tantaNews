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

<!-- /breadcrumb -->
<div class="bg-white  w-full fluid-container m-0">
    @if ($errors->any())
    <ul>


        @foreach ($errors->all() as $error )
        <li>{{$error}}</li>
        @endforeach
    </ul>
    @endif
    <form class="px-3 py-2" action="{{route("dashboard.setting.store")}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="grid sm:grid-cols-2 grid-cols-1 gap-2">
            <div class=" flex flex-col align-center justify-start">

                <img src="{{ asset(substr($setting->logo,strpos($setting->logo,"public")+7)) }}" id="logo-img"
                    class="w-[100px] h-[100px] pb-3">

                <label for="from-logo" class="font-bold text-md">{{__('dashboard.logo')}}</label>
                <input type="file" name="logo" id="from-logo">
            </div>
            <div class=" flex flex-col align-center justify-start">
                <img src="{{ asset(substr($setting->favicon,strpos($setting->favicon,"public")+7)) }}"
                    class="w-[100px] h-[100px] pb-3">
                <label for="favlogo" class="font-bold text-md">{{__('dashboard.favlogo')}}</label>
                <input type="file" name="favicon" id="favlogo">
            </div>



            <div class="flex flex-col align-center justify-start">
                <label for="instagram" class="font-bold text-md">{{__('dashboard.instagram')}}</label>
                <input type="text" class="border rounded-lg" name="linkedin_url" id="instagram"
                    value="{{$setting->linkedin_url}}">
            </div>
            <div class="flex flex-col align-center justify-start">
                <label for="facebook" class="font-bold text-md">{{__('dashboard.facebook')}}</label>
                <input type="text" class="border rounded-lg" name="facebook_url" id="facebook"
                    value="{{$setting->facebook_url}}">
            </div>
            <div class="flex flex-col align-center justify-start">
                <label for="email" class="font-bold text-md">{{__('dashboard.email')}}</label>
                <input type="text" class="border rounded-lg" name="email" id="email" value="{{$setting->email}}">
            </div>
            <div class="flex flex-col align-center justify-start">
                <label for="phone" class="font-bold text-md">{{__('dashboard.phone')}}</label>
                <input type="text" class="border rounded-lg" name="phone_number" id="phone"
                    value="{{$setting->phone_number}}">
            </div>
        </div>



        <div class="panel panel-primary tabs-style-3 mt-9 px-3">
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
                                <label for="title{{$key}}" class="font-bold text-md">title
                                    {{$value}}</label>
                                <input type="text" class="border rounded-lg" name="{{$key}}[title]" id="title{{$key}}"
                                    value="{{$setting->getTranslation($key)['title']}}">
                            </div>
                            <div class="flex flex-col align-center justify-start">
                                <label for="address{{$key}}" class="font-bold text-md">address
                                    {{$value}}</label>
                                <input type="text" class="border rounded-lg" name="{{$key}}[address]"
                                    id="address{{$key}}" value="{{$setting->getTranslation($key)['address']}}">
                            </div>
                            <div class=" flex flex-col align-center justify-start">
                                <label for="content{{$key}}" class="font-bold text-md">content
                                    {{$value}}</label>
                                <textarea type="text" rows="6" class="border rounded-lg" name="{{$key}}[content]"
                                    id="content{{$key}} ">{{$setting->getTranslation($key)["content"]}}</textarea>
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
@section('content')






@endsection


@section('js')


<script>
    $(document).ready(function(){
    $('#from-logo').change(function() {
        var file = this.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#logo-img').attr('src', e.target.result);
            }
            reader.readAsDataURL(file);
        }
    });
});
</script>
@endsection