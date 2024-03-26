<div>
    <form action="{{ route('search') }}" method="GET">
        <div class="input-group mb-3" style="width: 100%;">
            <select class="form-select bg-dark text-white p-2" name="category" style="width: 25%;">
                <option value="" selected>Select Category</option>
                <!-- Add options for each category -->
                @foreach ($categories as $category)
                    <option  value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            <input type="text" class="form-control" placeholder="Search" name="query_search" style="width: 55%;">
            <button class="btn btn-outline-secondary bg-dark text-white" type="submit" style="width: 10%;">Search</button>
        </div>
    </form>
</div>

<div id="carouselFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
    <div class="carousel-inner">
        @foreach ($ads as $ad)
            <div class="carousel-item active">
                <img src="{{ asset('uploads/Ad/' . $ad->image) }}" class="d-block w-100  rounded" style="height: 350px;" alt="...">
            </div>
        @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselFade" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselFade" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
