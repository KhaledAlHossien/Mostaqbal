@extends('layouts.main')

@section('content')
    <div class="container mt-4">
        <!-- Products Section -->
        <div class="container mt-5">
            <h3 class="mb-3">Latest Products</h3>
            <div class="d-flex align-items-center">
                <!-- Left Button -->
                <button id="prevProductBtn" class="btn btn-dark me-2">&lt;</button>

                <!-- Scrollable Product Container -->
                <div id="productContainer" class="d-flex overflow-hidden flex-nowrap" style="scroll-behavior: smooth; width: 90%;">
                    @foreach($products as $product)

                        <div class="col-md-4 mb-4">
                            <div class="card h-100">
                                <img src="
                                  {{ asset('storage/' . $product->photo) }}
                                    " class="card-img-top" alt="{{ $product->name }}">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $product->name }}</h5>
                                    <p class="card-text">{{ $product->description }}</p>
                                    <a href="/showProduct/{{$product->id}}" class="btn btn-primary">View Details</a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>

                <!-- Right Button -->
                <button id="nextProductBtn" class="btn btn-dark ms-2">&gt;</button>
            </div>
        </div>

        <!-- Projects Section -->
        <div class="container mt-5">
            <h3 class="mb-3">Latest Projects</h3>
            <div class="d-flex align-items-center">
                <!-- Left Button -->
                <button id="prevProjectBtn" class="btn btn-dark me-2">&lt;</button>

                <!-- Scrollable Project Container -->
                <div id="projectContainer" class="d-flex overflow-hidden flex-nowrap" style="scroll-behavior: smooth; width: 90%;">
                    @foreach($projects as $project)
                        <div class="col-md-4 mb-4">
                            <div class="card h-100">
                                <img src="
                                {{ asset('storage/' . $project->photo) }}
                                    " class="card-img-top" alt="{{ $project->name }}">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $project->name }}</h5>
                                    <p class="card-text">{{ $project->description }}</p>
                                    <a href="/showProject/{{$project->id}}" class="btn btn-primary">View Details</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Right Button -->
                <button id="nextProjectBtn" class="btn btn-dark ms-2">&gt;</button>
            </div>
        </div>
    </div>
@endsection


<script>
    document.addEventListener("DOMContentLoaded", function() {
        function setupScroll(containerId, prevBtnId, nextBtnId) {
            const container = document.getElementById(containerId);
            const prevBtn = document.getElementById(prevBtnId);
            const nextBtn = document.getElementById(nextBtnId);

            function updateButtons() {
                prevBtn.style.visibility = container.scrollLeft > 0 ? "visible" : "hidden";
                nextBtn.style.visibility = container.scrollLeft + container.clientWidth < container.scrollWidth ? "visible" : "hidden";
            }

            nextBtn.addEventListener("click", function() {
                container.scrollBy({ left: 300, behavior: "smooth" });
                setTimeout(updateButtons, 500);
            });

            prevBtn.addEventListener("click", function() {
                container.scrollBy({ left: -300, behavior: "smooth" });
                setTimeout(updateButtons, 500);
            });

            window.addEventListener("resize", updateButtons);
            updateButtons(); // Run initially
        }

        // Initialize scrolling for both sections
        setupScroll("productContainer", "prevProductBtn", "nextProductBtn");
        setupScroll("projectContainer", "prevProjectBtn", "nextProjectBtn");
    });
</script>
