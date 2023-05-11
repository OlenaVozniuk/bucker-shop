<figure>
    <div class="product_thumb">
        <a href="{{ route('show', $product->id) }}" tabindex="0"><img
                src="{{asset('storage/uploads').'/'.$product->image }}" alt=""></a>
        <div class="action_links">
            <ul class="d-flex justify-content-center">
                @if(in_array($product->id, $wishlist))
                    <li class="add_to_cart"><a href="{{ route('add-to-cart', $product) }}" title="Add to cart">
                            <span class="pe-7s-shopbag"></span></a></li>
                    <li class="wishlist"><a href="{{ route('remove-from-wishlist', $product) }}"
                                            title="Remove from Wishlist" class="active-in-wishlist"><span
                                class="pe-7s-like"></span></a>
                    </li>
                @elseif (in_array($product->id, $cart['product_ids'] ?? []))
                    <li class="add_to_cart"><a href="{{ route('remove-from-cart', $product) }}"
                                               title="Remove from cart" class="active-in-cart">
                            <span class="pe-7s-shopbag"></span></a></li>
                @else
                    <li class="add_to_cart"><a href="{{ route('add-to-cart', $product) }}" title="Add to cart">
                            <span class="pe-7s-shopbag"></span></a></li>
                    <li class="wishlist"><a href="{{ route('add-item-to-wishlist', $product) }}"
                                            title="Add to Wishlist"><span
                                class="pe-7s-like"></span></a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
    <figcaption class="product_content text-center">
        <h4><a href="{{route('show', $product->id)}}" tabindex="0">{{$product->name}}</a></h4>
        <div class="price_box">
            <span class="current_price">{{$product->price}} &#8372</span>
        </div>
    </figcaption>
</figure>
