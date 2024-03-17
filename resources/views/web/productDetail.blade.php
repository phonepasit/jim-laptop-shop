<div class="container-fuild mb-3">
    <a href="/">Go back</a>
</div>

<form action="{{ route('addToCart', ['product' => $product->id]) }}" method="post">
    @csrf
    <div class="d-flex" style="width: 100%">
        <div class="d-flex flex-column">
            @foreach ($product->productImages as $productDetail)
                <div class="mb-2">
                    <img src="{{ asset('/uploads/product_image/' . $productDetail->image) }}"
                        style="width: 75px; height: 75px">
                </div>
            @endforeach
        </div>

        <div class="mx-4" style="width: 60%">
            <img src="{{ asset('/uploads/product/' . $product->image) }}" style="width: 100%; height: 550px">
        </div>

        <div style="width: 30%">
            <h3 class="fw-bold">
                {{ $product->name }}
            </h3>
            <div class="mt-2 d-flex">
                Price:&nbsp;
                <p class="text-decoration-line-through mb-0">
                    {{ number_format($product->price_sale) }} VND
                </p>
            </div>
            <div>
                <p class="mb-0">
                    Price Sale: {{ number_format($product->price_sale) }} VND
                </p>
            </div>
            <div class="mt-3">
                {{ $product->description }}
            </div>
            <button type="submit" class="btn btn-secondary mt-3 w-100">Add to Cart</button>
        </div>
    </div>
</form>
