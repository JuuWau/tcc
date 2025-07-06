@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="row g-4 mb-4">
    <div class="col-md-6 col-lg-3">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-2">Consultas Hoje</h6>
                        <h3 class="mb-0">12</h3>
                    </div>
                    <div class="bg-blue-100 p-3 rounded-circle">
                        <i class="fas fa-calendar-day text-blue-500"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection