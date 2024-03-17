<style>
    .nav-link:hover {
        background-color: #e9ecef;
        /* Change to your desired hover color */
    }

    .nav-link.active {
        background-color: #007bff;
        /* Change to your desired active color */
        color: #fff;
        /* Change to your desired text color */
    }
</style>

<div>
    <nav class="nav flex-column ">
        <li>
            <a href="/" class="text-decoration-none">
                <p class="nav-link p-2 mb-0 rounded-top text-center text-white bg-dark">All CATEGORY</p>
            </a>
        </li>
        @foreach ($categories as $category)
            <a class="nav-link text-dark" href="{{ route('productCategory', ['id' => $category->id]) }}">{{ $category->name }}</a>
        @endforeach
    </nav>
</div>
