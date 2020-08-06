@extends('layouts.app')

@section('content')

@include('layouts.topnav')

<div id="layoutSidenav">
    
    @include('layouts.sidenav')
    <div id="layoutSidenav_content">
        <main>
            
            <Br />

            <div class="container-fluid">
                <div class="card mb-4">
                    <div class="card-header">{{ $pageconfig['title'] }}</div>
                    <div class="card-body">
                        {!! Messages::display() !!}
                        <div class="datatable table-responsive">
                            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Created</th>
                                        <th>QR Code</th>                                        
                                        <th width="70">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($pageconfig['rs'] as $row)
                                    <tr>
                                        <td>{{ $row->created_at }}</td>
                                        <td>{{ $row->qrcode }}</td>                                        
                                        <td>
                                            <a href="/{{ Request::segment(1) }}/view/{{ encrypt($row->id) }}" class="btn btn-datatable btn-icon btn-transparent-dark mr-2"><i data-feather="search"></i></a>
                                            <a href="/{{ Request::segment(1) }}/delete/{{ encrypt($row->id) }}" onclick="return confirm('Are you sure you want to delete this campaign?');" class="btn btn-datatable btn-icon btn-transparent-dark mr-2"><i data-feather="trash"></i></a>
                                        </td>
                                    </tr>    
                                    @endforeach                             
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>                
            </div>
           

        </main>
        @include('layouts.footer')
    </div>
</div>

@endsection
