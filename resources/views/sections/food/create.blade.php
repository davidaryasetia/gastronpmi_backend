@push('css')
    <style>
        
    </style>
@endpush


@extends('layouts.main')
@section('row')
    <div class="container-fluid background-color">
        <!--  Row 1 -->
        <div class="row">
            <div class="col-lg-12 d-flex align-items-strech">
                <div class="card w-100">
                    <div class="card-body">
                        <div class="d-sm-flex d-block align-items-center justify-content-between align-items-center mb-9">
                            <div class="d-flex align-items-center mb-4">
                                <div>
                                    <a href="/food" class="d-flex align-items-center"><i class="ti ti-arrow-left me-3"
                                            style="font-size: 20px; color: black"></i>
                                    </a>
                                </div>
                                <div>
                                    <span class="card-title fw-semibold me-3">Add Food Culinary</span>
                                </div>

                            </div>

                            <div class="alert-container">
                                @if (session('success'))
                                    <div class="alert alert-primary" style role="alert">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                @if (session('error'))
                                    <div class="alert alert-danger" style role="alert">
                                        {{ session('error') }}
                                    </div>
                                @endif
                            </div>

                            <script>
                                setTimeout(function() {
                                    document.querySelectorAll('.alert').forEach(function(alert) {
                                        alert.style.display = "none";
                                    });
                                }, 5000);
                            </script>

                        </div>

                        {{-- Main Section --}}
                        <form action="{{route('food.store')}}" method="POST" enctype="multipart/form-data" id="FoodForm">
                            @csrf

                            <div class="row mb-2">
                                <div class="mb-2 col-lg-6">
                                    <label for="name" class="form-label">Food Name</label>
                                    <input type="text" class="form-control @error('nama_unit') is-invalid @enderror"
                                        id="name" name="name" aria-describedby="emailHelp"
                                        placeholder="Input Food Name..." required autofocus>

                                </div>
                                <div class="mb-2 col-lg-6">
                                    <label for="unit" class="form-label">Category Food</label>
                                    <select id="category" name="category" class="form-select">
                                        <option value="">Choice category....</option>
                                        <option value="Traditional Food">Traditional Food</option>
                                        <option value="Traditional Drink">Traditional Drink</option>
                                    </select>

                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="mb-2 col-lg-6">
                                    <label for="food" class="form-label">Description</label>
                                    <textarea type="text" class="form-control @error('nama_unit') is-invalid @enderror" id="description"
                                        name="description" aria-describedby="emailHelp" placeholder="Input Food Culinary..." required autofocus></textarea>

                                </div>
                                <div class="mb-2 col-lg-6">
                                    <label for="unit" class="form-label">History of Food</label>
                                    <textarea type="text" class="form-control @error('nama_unit') is-invalid @enderror" id="food_historical"
                                        name="food_historical" aria-describedby="emailHelp" placeholder="Input Food History..." required autofocus></textarea>

                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="mb-2 col-lg-6">
                                    <label for="food" class="form-label">Nutrition</label>
                                    <textarea type="text" class="form-control @error('nama_unit') is-invalid @enderror" id="nutrition"
                                        name="nutrition" aria-describedby="emailHelp" placeholder="Input Nutrition Of Food..." required autofocus></textarea>

                                </div>
                                <div class="mb-2 col-lg-6">
                                    <label for="unit" class="form-label">URL Youtube Ingredients</label>
                                    <textarea type="text" class="form-control @error('nama_unit') is-invalid @enderror" id="url_youtube"
                                        name="url_youtube" aria-describedby="emailHelp" placeholder="Input Url Youtube" required autofocus></textarea>

                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="mb-2 col-lg-6">
                                    <label for="ingredients" class="form-label">Ingredients</label>
                                    <!-- Create the editor container -->
                                    <div id="ingredients" style="height: 300px">
                                        <p>Input Ingredients Here......</p>
                                    </div>
                                    <input type="hidden" name="ingredients" id="ingredients-input">
                                </div>
                                <div class="mb-2 col-lg-6">
                                    <label for="directions" class="form-label">Directions</label>
                                    <!-- Create the editor container -->
                                    <div id="directions" style="height: 300px">
                                        <p>Input Directions Here.......</p>
                                        <input type="hidden" name="directions" id="directions-input">
                                    </div>
                                </div>
                            </div>

                            {{-- Upload Image File --}}
                            <div class="row mb-3">
                                <div class="mb-2 col-lg-6">
                                    <label for="ingredients" class="form-label">Foods Fotos</label>
                                    {{-- This is FilePound --}}
                                    <div class="galery-container">
                                        <input type="file" class="form-control-file filepond" name="detail_food_photos[]" id="food_photos"
                                            multiple>
                                    </div>
                                </div>
                               
                                <div class="mb-2 col-lg-6">
                                    <label for="ingredients" class="form-label">History Foods Fotos</label>
                                    {{-- This is FilePound --}}
                                    <div class="galery-container">
                                        <input type="file" class="form-control-file filepond" name="detail_historical_photos[]" id="historical_photos"
                                            multiple>
                                    </div>
                                </div>
                            </div>
                            <hr>

                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                        {{-- END Main Section --}}

                    </div>
                </div>
            </div>

        </div>

    </div>

    @push('script')
    
        <script>
            var editoringredients = new Quill("#ingredients", {
                theme: "snow",
            });
            var editordirections = new Quill("#directions", {
                theme: "snow",
            });
        </script>
        <script>
            document.getElementById('FoodForm').onsubmit = function() {
                // Copy HTML content from Quill editor to hidden input
                document.getElementById('ingredients-input').value = editoringredients.root.innerHTML;
                document.getElementById('directions-input').value = editordirections.root.innerHTML;
            };
        </script>
        <script>
            FilePond.registerPlugin(FilePondPluginImagePreview);
            
             // FilePond options (customize as needed)
             const pondOptions = {
                allowMultiple: true,
              
            };
            
            FilePond.parse(document.body);
            FilePond.create(document.querySelector('.filepond'), {
                allowMultiple: true,
            });

            Filepond.create(document.querySelector('input[name="detail_food_photos[]"]'), pondOptions);
            Filepond.create(document.querySelector('input[name="detail_historical_photos[]"]'), pondOptions);
        </script>
    @endpush
@endsection
