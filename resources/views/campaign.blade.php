@extends('layouts.app')

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
                            <div class="page-header-icon"><i class="fas fa-qrcode"></i></div>
                            <span>Start Campaign</span>
                        </h1>
                        <div class="page-header-subtitle">Create a new QR Code Campaign</div>
                    </div>
                </div>
            </div>
            <div class="container-fluid mt-n10">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card mb-4">
                            <div class="card-header">Campaign Details</div>
                            <div class="card-body">
                                                           
                                @if($pageconfig['campaign'] == null)
                                    <form method="POST">
                                    <input type="hidden" name="fp" value="1">
                                    @csrf
                                        <div class="form-group"
                                            ><label class="small mb-1" for="inputCode">Campaign name:</label>
                                            <input class="form-control py-4 @error('qrcode') is-invalid @enderror" id="inputCode" type="text" placeholder="Enter campaign name..."  name="qrcode" value="{{ old('qrcode') }}" required autofocus />

                                            @error('qrcode')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>       
                                        <div class="form-group"
                                            ><label class="small mb-1" for="inputUrl">URL:</label>
                                            <input class="form-control py-4 @error('url') is-invalid @enderror" id="inputUrl" type="text" placeholder="Enter URL..."  name="url" value="{{ old('url') }}" required autofocus />

                                            @error('url')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>                               
                                        <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0"><a class="small" href="/viewcampaigns">Previous Campaigns</a><button type="submit" class="btn btn-primary">Create Campaign</button></div>
                                    </form>
                                @else

                                    <div class="form-group"
                                        ><label class="small mb-1" for="inputCode">Campaign name:</label>
                                        <input class="form-control" value="{{ $pageconfig['campaign']->qrcode }}" id="inputCode" type="text" readonly="readonly" />
                                    </div>  

                                    <div class="form-group"
                                        ><label class="small mb-1" for="inputUrl">URL:</label>
                                        <input class="form-control" value="{{ $pageconfig['campaign']->url }}" id="inputUrl" type="text" readonly="readonly" />
                                    </div>  

                                @endif

                            </div>
                        </div>
                    </div>

                    @if($pageconfig['campaign'] != null)
                    <div class="col-md-6">
                        <div class="card mb-4">
                            <div class="card-header">QR Code</div>
                            <div class="card-body">
                                <img src="/qrcode/{{ $pageconfig['campaign']->id }}" width="200">
                            </div>
                        </div>
                    </div>
                    @endif

                </div>
            </div>
           

        </main>
        @include('layouts.footer')
    </div>
</div>

@endsection
