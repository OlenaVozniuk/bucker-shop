<article class="product_list_items border-bottom">
    <figure class="product_list_flex d-flex align-items-center">
        <div class="product_thumb">
            <a href="{{ route('show', $product->id) }}">
                <img src="{{ asset('storage/uploads').'/'.$product->image }}" alt=""></a>
        </div>
        <figcaption class="product_list_content">
            <h4><a href="{{ route('show', $product->id) }}">{{$product->name}}</a></h4>
            <div class="product__ratting"></div>
            <div class="price_box">
                <span class="current_price">{{$product->price}}&#8372</span>
            </div>
            <br>
            <div class="action_links product_list_action">
                <ul class="d-flex">
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
        </figcaption>
    </figure>
</article>
