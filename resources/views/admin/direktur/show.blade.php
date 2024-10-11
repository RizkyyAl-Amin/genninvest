@extends('admin.layouts.main')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-title">{{ $direktur->nama }}</p>
                            <p class="font-weight-500">{{ $direktur->sambutan }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex">
                <button class="btn btn-info" style="margin-right: 7px;">
                    <a href="{{ route('direktur.index') }}" style="text-decoration: none; color: white;">
                        Back to Tables
                    </a>
                </button>
                <button class="btn btn-warning" style="margin-right: 7px;">
                    <a href="{{ route('direktur.edit', [Crypt::encrypt($direktur->id)]) }}" style="text-decoration: none; color: white;">
                        Edit
                    </a>
                </button>
            </div>
@endsection
