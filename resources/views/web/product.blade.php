<div class="py-3">
    <h5 class="fw-bold">ALL PRODUCTS</h5>
    <div class="row row-cols-4 mt-4">
        @foreach ($products as $product)
            <form action="{{ route('addToCart', ['product' => $product->id]) }}" method="post">
                @csrf
                <a href=" {{ route('product-detail', ['id' => $product->id]) }}" class="text-decoration-none">
                    <div class="card mb-4 border-0" style="box-shadow: 0px 15px 59px -14px rgba(0,0,0,0.94);">
                        <img src="{{ asset('/uploads/product/' . $product->image) }}" class="card-img-top"
                            style="height: 200px" alt="...">
                        <div class="card-body text-center">
                            <div class="mb-2">
                                {{ $product->name }}
                            </div>
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
