<div class="well">

    <ul class="nav nav-pills nav-stacked nav-products">
      @foreach ($productsnav as $navitem)
        <li role="presentation" @if($navitem->id == $productcategory->id) class="active" @endif><a href="{{ URL::to('/') }}/products/{{ $navitem->id }}"> {{{ $navitem->title }}}</a></li>

            @if($navitem->id == $productcategory->id)

                @if($productsnav->find($navitem->id)->children->count() > 0)
                    <ul class="nav">
                    @foreach ($productsnav->find($navitem->id)->children as $child)
                        @if($child->product_active == 1)
                            <li role="presentation" @if( isset($product->id) && $child->id == $product->id) class="active" @endif><a href="{{ URL::to('/') }}/products/{{ $navitem->id }}/detail/{{ $child->id }}"> {{{ $child->title }}}</a></li>
                        @endif
                    @endforeach
                    </ul>
                @endif

            @endif

      @endforeach

    </ul>

</div>