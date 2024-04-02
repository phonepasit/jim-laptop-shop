<div class="py-3">
    <div>
        <h5 class="fw-bold">ALL PRODUCTS</h5>
        <div class="row row-cols-4 mt-4">
            @foreach ($products as $product)
                <form action="{{ route('addToCart', ['id' => $product->id]) }}" method="post">
                    @csrf
                    <a href=" {{ route('product-detail', ['id' => $product->id]) }}" class="text-decoration-none">
                        <div class="card mb-4 border-0" style="box-shadow: 0px 15px 59px -14px rgba(0,0,0,0.94);">
                            <img src="{{ asset('/uploads/product/' . $product->image) }}" class="card-img-top"
                                style="height: 200px; padding: 15px 15px;" alt="...">
                            <div class="card-body text-center">
                                <h5 class="mb-2 fw-bold w-100 text-truncate">
                                    {{ $product->name }}
                                </h5>
                                <div class="text-decoration-line-through">
                                    {{ number_format($product->price) }} VND
                                </div>
                                <div>
                                    {{ number_format($product->price_sale) }} VND
                                </div>
                                <button type="submit" class="btn btn-secondary mt-3">Add to Cart</button>
                            </div>
                        </div>
                    </a>
                </form>
            @endforeach
        </div>
    </div>

    @if (request()->is('/'))
        <hr>

        <div>
            <h5 class="fw-bold">PRODUCT NEW</h5>
            <div class="row row-cols-4 mt-4">
                @foreach ($productNews as $productNew)
                    <form action="{{ route('addToCart', ['id' => $productNew->id]) }}" method="post">
                        @csrf
                        <a href=" {{ route('product-detail', ['id' => $productNew->id]) }}" class="text-decoration-none">
                            <div class="card mb-4 border-0" style="box-shadow: 0px 15px 59px -14px rgba(0,0,0,0.94);">
                                <img src="{{ asset('/uploads/product/' . $productNew->image) }}" class="card-img-top"
                                    style="height: 200px; padding: 15px 15px;" alt="...">
                                <div class="card-body text-center">
                                    <h5 class="mb-2 fw-bold w-100 text-truncate">
                                        {{ $productNew->name }}
                                    </h5>
                                    <div class="text-decoration-line-through">
                                        {{ number_format($productNew->price) }} VND
                                    </div>
                                    <div>
                                        {{ number_format($productNew->price_sale) }} VND
                                    </div>
                                    <button type="submit" class="btn btn-secondary mt-3">Add to Cart</button>
                                </div>
                            </div>
                        </a>
                    </form>
                @endforeach
            </div>
        </div>
    @endif
</div>
