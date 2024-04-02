@php
    $totalPrice = 0;
@endphp

<h2 class="fw-bold text-center">
    SHOPPING CART
</h2>

<table class="table">
    <thead class="table-dark">
        <tr>
            <th class="px-5 py-2 text-center" style="width: 250px;">Name</th>
            <th class="px-5 py-2 text-center">Image</th>
            <th class="px-5 py-2 text-center" style="width: 230px;">Price</th>
            <th class="px-5 py-2 text-center" style="width: 250px;">Quantity</th>
            <th class="px-5 py-2 text-center">Total Price</th>
            <th class="px-5 py-2 text-center"></th>
        </tr>
    </thead>
    <tbody>
        @if (count($productDetails) > 0)
            @foreach ($productDetails as $productDetail)
                @php
                    // Calculate individual total price for each product
                    $individualTotalPrice = $productDetail['price_total'];
                    $totalPrice += $individualTotalPrice; // Add to the total price
                @endphp
                <tr>
                    <td class="px-5 py-2 text-center">{{ $productDetail['name'] }}</td>
                    <td class="px-5 py-2 text-center">
                        <img src="{{ asset('/uploads/product/' . $productDetail['image']) }}" class="card-img-top"
                            style="height: 75px; width:75px" alt="...">
                    </td>
                    <td class="px-5 py-2 text-center">{{ number_format($productDetail['price_sale']) }} VND</td>
                    <td class="px-5 py-2" style="text-align: center;">
                        <!-- Quantity update form -->
                        <form action="{{ route('update.cart', ['id' => $productDetail['id']]) }}" method="POST">
                            @csrf
                            <div class="input-group">
                                <button class="btn btn-outline-secondary" type="submit" name="decrement"
                                    {{ $productDetail['quantity_choose'] <= 1 ? 'disabled' : '' }}>-</button>
                                <input type="text" class="form-control text-center"
                                    value="{{ $productDetail['quantity_choose'] }}" name="quantity_choose"
                                    min="1" max="{{ $productDetail['quantity'] }}" style="width: 70px;" disabled>
                                <button class="btn btn-outline-secondary" type="submit" name="increment">+</button>
                            </div>
                        </form>
                    </td>
                    <td class="px-5 py-2 text-center">{{ number_format($productDetail['price_total']) }} VND</td>
                    <td class="px-5 py-2 text-center">
                        <form action="{{ route('delete.cart', ['id' => $productDetail['id']]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            <tr>
                <td colspan="4" class="text-end fw-bold">Total:</td>
                <td colspan="1" class="px-5 py-2 text-center fw-bold">{{ number_format($totalPrice) }} VND</td>
                <td></td>
            </tr>
        @else
            <tr>
                <td colspan="6" class="text-center">There are no products in your shopping cart.</td>
            </tr>
        @endif


    </tbody>
</table>

<div class="row mt-4">
    <div class="col-md-6">
        <a href="/" class="btn btn-secondary"><i class="fas fa-chevron-left me-1"></i>Continue purchasing the
            product</a>
    </div>
    <div class="col-md-6 text-end">
        @if (auth()->check())
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#checkoutModal">
                Checkout
            </button>
        @else
            <a href="{{ route('login') }}" class="btn btn-success">Login for checkout</a>
        @endif
    </div>
</div>

<div class="modal fade modal-xl" id="checkoutModal" tabindex="-1" aria-labelledby="checkoutModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold" id="checkoutModalLabel">Shipment Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="checkoutForm" action="{{ route('checkout') }}" method="POST">
                @csrf
                <div class="modal-body" style="padding: 25px 30px;">
                    <div class="row">

                        <input type="hidden" id="total_price" name="total_price"
                            value="{{ old('total_price', $totalPrice) }}">

                        <div class="col-12 mb-3">
                            <label for="note" class="form-label fw-bold">Note:</label>
                            <textarea class="form-control" id="note" name="note">{{ old('note') }}</textarea>
                        </div>

                        <div class="col-6 mb-3">
                            <label for="phone" class="form-label fw-bold">Phone number:</label>
                            <input type="text" class="form-control" id="phone" name="phone"
                                value="{{ old('phone') }}" required>
                        </div>

                        <div class="col-6 mb-3">
                            <label for="district" class="form-label fw-bold">District:</label>
                            <input type="text" class="form-control" id="district" name="district"
                                value="{{ old('district') }}" required>
                        </div>

                        <div class="col-6 mb-3">
                            <label for="ward" class="form-label fw-bold">Ward:</label>
                            <input type="text" class="form-control" id="ward" name="ward"
                                value="{{ old('ward') }}" required>
                        </div>

                        <div class="col-6 mb-3">
                            <label for="province" class="form-label fw-bold">Province:</label>
                            <input type="text" class="form-control" id="province" name="province"
                                value="{{ old('province') }}" required>
                        </div>

                        <div class="col-6 mb-3">
                            <label for="address" class="form-label fw-bold">Address:</label>
                            <input type="text" class="form-control" id="address" name="address"
                                value="{{ old('address') }}" required>
                        </div>

                        <div class="col-12">
                            <div class="row justify-content-end">
                                <div class="col-auto">
                                    <button type="button" class="btn btn-danger"
                                        data-bs-dismiss="modal">Close</button>
                                </div>
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-secondary">Place Order</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
