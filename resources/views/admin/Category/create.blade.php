@extends('layout.master')

@section('content')

<br><br>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            <div class="card border-0 rounded-4 overflow-hidden shadow-lg" style="background: rgba(255, 255, 255, 0.85); backdrop-filter: blur(12px);">
                <div class="card-header bg-gradient-primary border-0 rounded-top-4 d-flex align-items-center justify-content-between p-4">
                    <h4 class="mb-0 fw-bold text-white">
                        <i class="bi bi-tags-fill me-2"></i> Add Food Category
                    </h4>
                    <div class="bg-white p-2 rounded-circle">
                        <i class="bi bi-egg-fried fs-4 text-primary"></i>
                    </div>
                </div>

                <div class="card-body px-4 pb-4 pt-3">
                    @if (session('success'))
                        <div class="alert alert-success shadow-sm border-0 rounded-3">
                            <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger shadow-sm border-0 rounded-3">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-exclamation-triangle-fill me-2 fs-5"></i>
                                <strong class="me-2">⚠ Please fix the following:</strong>
                            </div>
                            <ul class="mt-2 mb-0 ps-3">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data" class="mt-3">
                        @csrf

                        <div class="form-group mb-4">
                            <label class="form-label fw-semibold text-muted mb-1">Select Restaurant</label>
                            <div class="input-group">
                                <span class="input-group-text bg-white border-end-0">
                                    <i class="bi bi-shop text-primary"></i>
                                </span>
                                <select name="restaurant_id" class="form-select form-control-lg rounded-end shadow-sm border-start-0" required>
                                    <option disabled selected>-- Choose Restaurant --</option>
                                    @foreach($restaurants as $restaurant)
                                        <option value="{{ $restaurant->id }}">{{ $restaurant->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group mb-4">
                            <label class="form-label fw-semibold text-muted mb-1">Category Name</label>
                            <div class="input-group">
                                <span class="input-group-text bg-white border-end-0">
                                    <i class="bi bi-card-heading text-primary"></i>
                                </span>
                                <input type="text" name="name" class="form-control form-control-lg rounded-end shadow-sm border-start-0" placeholder="e.g. Italian, Bakery, Desserts" required>
                            </div>
                        </div>

                        <div class="form-group mb-4">
                            <label class="form-label fw-semibold text-muted mb-1">Upload Image</label>
                            <div class="d-flex align-items-center">
                                <div class="position-relative me-3">
                                    <div class="image-preview bg-light rounded-3 border p-1 d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                                        <i class="bi bi-image text-muted fs-3"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <div class="input-group">
                                        <input type="file" name="image" id="imageUpload" class="form-control form-control-lg rounded-3 shadow-sm" onchange="previewImage(event)">
                                        <button type="button" class="btn btn-outline-secondary" onclick="document.getElementById('imageUpload').click()">
                                            <i class="bi bi-upload me-1"></i> Browse
                                        </button>
                                    </div>
                                    <small class="text-muted">Recommended size: 400x400 pixels</small>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-4">
                            <label class="form-label fw-semibold text-muted mb-1">Status</label>
                            <div class="d-flex">
                                <div class="form-check me-4">
                                    <input class="form-check-input" type="radio" name="status" id="activeStatus" value="1" checked>
                                    <label class="form-check-label d-flex align-items-center" for="activeStatus">
                                        <span class="status-indicator bg-success me-2"></span> Active
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="inactiveStatus" value="0">
                                    <label class="form-check-label d-flex align-items-center" for="inactiveStatus">
                                        <span class="status-indicator bg-danger me-2"></span> Inactive
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-primary btn-lg rounded-pill shadow fw-bold py-3">
                                <i class="bi bi-check-circle me-2"></i> Save Category
                            </button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

<script>
    function previewImage(event) {
        const preview = document.querySelector('.image-preview');
        const file = event.target.files[0];
        const reader = new FileReader();

        reader.onload = function() {
            preview.innerHTML = `<img src="${reader.result}" class="img-fluid rounded-3" style="max-height: 78px; object-fit: cover;">`;
        }

        if (file) {
            reader.readAsDataURL(file);
        }
    }
</script>

<style>
    .card-header.bg-gradient-primary {
        background: linear-gradient(120deg, #6C63FF, #4A43C7);
    }

    .form-control:focus, .form-select:focus {
        border-color: #6C63FF;
        box-shadow: 0 0 0 0.25rem rgba(108, 99, 255, 0.25);
    }

    .input-group-text {
        background-color: #f8f9fa;
        border-right: none;
    }

    .form-control.border-start-0 {
        border-left: none;
    }

    .status-indicator {
        display: inline-block;
        width: 12px;
        height: 12px;
        border-radius: 50%;
    }

    .image-preview {
        transition: all 0.3s ease;
        border: 2px dashed #dee2e6;
        cursor: pointer;
    }

    .image-preview:hover {
        border-color: #6C63FF;
        background-color: #f8f9ff;
    }

    .form-check-input:checked {
        background-color: #6C63FF;
        border-color: #6C63FF;
    }
</style>
@endsection
