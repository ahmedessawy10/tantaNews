@extends('adminDashboard.layouts.master')
@section('css')
@livewireStyles
{{-- @powerGridStyles --}}
@vite(['resources/js/app.js','resources/css/app.css'])
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="bSreadcrumb-header justify-content-between">
	<div class="my-auto">
		<div class="d-flex">
			<h4 class="content-title mb-0 my-auto">Pages</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
				user</span>
		</div>
	</div>

</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row bg-white w-full flex items-center justify-center">

	<a href="{{route('admin.users.create')}}">create user</a>
	<livewire:user-table name="user table" />
</div>
<!-- row closed -->
</div>
<!-- Container closed -->
</div>
<!-- main-content closed -->
@endsection
@section('js')
@livewireScripts

@endsection