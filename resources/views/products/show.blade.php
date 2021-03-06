@extends('layouts.app')

@section('content')

    <section>
        <div class="container">

            <div class="row">
                <div class="col-12 text-center">
                    <hr class="mt-4">
                </div>
            </div>

            <div class="row">

                <div class="col-12 col-md-6">
                    <div class="row">

                        <div class="col-12 d-flex align-items-center justify-content-center gallery-div">
                            @foreach ($product->images as $image)
                                @if ($image->box === 1)
                                    <img class="img-fluid gallery-main-img" src="{{asset($image->location)}}" alt="{{$image->alt}}">  
                                @endif
                            @endforeach
                        </div>

                        <hr class="my-3">
                        <div class="col-12">
                            <div class="row">

                                @foreach ($product->images as $image)
                                    <div class="col-3 picker-div d-flex align-items-center justify-content-center">
                                        <img class="img-fluid gallery-img" src="{{asset($image->location)}}" alt="{{$image->alt}}">
                                    </div>
                                @endforeach
                            
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-12 col-md-6 d-flex flex-column">

                    <div class="top-content">

                        <h3 class="px-3 py-1">{{$product->name}}</h3>
                        
                        <p class="px-3 py1">
                            <span class="stars stars-{{$product->ratings_avg[0] ?? null}}">
                                ★★★★★
                            </span> ({{$product->ratings_count}})
                        </p>

                        <p class="px-3 py-1">
                            {{$product->description}}
                        </p>

                        @if ($product->stock <= 30)
                            <strong class="text-muted px-3 py-1"><del>in stock </del></strong>
                        @else
                            <strong class="px-3 py-1">in stock </strong>
                        @endif 

                        <br>
                        
                        @if ($product->price_discount)
                            <strong class="px-3 py-1">€{{$product->price_discount}}</strong>
                            <strong class="px-3 py-1"><del class="text-muted pe-2">€{{$product->price}}</del></strong>
                        @else
                            <strong class="px-3 py-1">€{{$product->price}}</strong>
                        @endif

                    </div>

                    <div class="bottom-content mx-3 my-auto">

                        <form action="/cart" method="post">
                        @csrf

                            <div class="input-group">


                                <input type="text" class="form-control prod-input text-center counter input-sm p-0" maxlength="2" name="product[{{$product->id}}]" 
                                id="{{$product->id}}"   @if( isset($cart[$product->id])) value="{{$product->id}}"@else value="0" @endif>

                                
                                <span class="input-group-btn ms-2">
                                    <button class="btn-counter btn-prod-minus" type="button">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#000" class="bi bi-dash-circle" viewBox="0 0 16 16">
                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                        <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z"/>
                                        </svg>
                                    </button>
                                </span>

                                <span class="input-group-btn ms-2">
                                    <button class="btn-counter btn-prod-plus" type="button">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#000" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                        </svg>
                                    </button>
                                </span>

                                <button class="atc-button ms-4 btn btn-sm">
                                    Add To Cart
                                </button>

                            </div> 

                        </form>

                    </div>
                </div>
            </div>
            <hr class="my-4">
            <div class="row">

                <div class="container">
                    @include('.products.partials.product-reviews')
                </div>

            </div>
        </div>
    </section>

@endsection

@push('scripts')
    <script>
        // changes main img on click smaller img
        $('.gallery-img').on({'click': function(){
                $('.gallery-main-img').attr('src',$(this).attr('src'));
            }
        });
        // resizes the images
        $(window).on( 'resize', function () {
            $('.gallery-div').height( $('.gallery-div').width() / 1.5);
        }).resize();
        $(window).on( 'resize', function () {
            $('.picker-div').height( $('.picker-div').width() / 1.5);
        }).resize();
        //plus minus button for text field
        $('.btn-prod-minus').on('click', function(){           
            $(this).parent().siblings('.prod-input').val(parseInt($(this).parent().siblings('.prod-input').val()) - 1)
        })
        $('.btn-prod-plus').on('click', function(){            
            $(this).parent().siblings('.prod-input').val(parseInt($(this).parent().siblings('.prod-input').val()) + 1)
        })
    </script>
@endpush