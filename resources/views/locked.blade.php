@extends('layouts.app')
@section('styles')
@endsection

@section('content')

    @include('layouts.topnav')

    <div id="layoutSidenav">

        @include('layouts.sidenav')
        <div id="layoutSidenav_content">
            <main>

                <div class="page-header pb-10 page-header-dark bg-gradient-primary-to-secondary">
                    <div class="container-fluid">
                        <div class="page-header-content">
                            <h1 class="page-header-title">
                                <div class="page-header-icon"><i class="fas fa-tachometer-alt"></i></div>
                                <span>Dashboard</span>
                            </h1>
                            <div class="page-header-subtitle"></div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid mt-n10">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h2 class="text-white">Your account has been locked by administrator.</h2>
                        </div>
                    </div>
                </div>

            </main>
            @include('layouts.footer')
        </div>
    </div>

@endsection
@section('scripts')
    @parent
@endsection
