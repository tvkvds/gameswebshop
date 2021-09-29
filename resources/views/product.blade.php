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
                            <img class="img-fluid gallery-main-img" src="https://www.liveabout.com/thmb/Nvi2qTRdhM6gNNTOptxr6HMqB10=/1250x0/filters:no_upscale():max_bytes(150000):strip_icc():format(webp)/halo-combat-evolved-game-57900ff03df78c09e9a2071e.jpg" alt="">
                        </div>
                        <hr class="my-3">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-3 picker-div d-flex align-items-center justify-content-center">
                                    <img class="img-fluid gallery-img" src="https://www.liveabout.com/thmb/Nvi2qTRdhM6gNNTOptxr6HMqB10=/1250x0/filters:no_upscale():max_bytes(150000):strip_icc():format(webp)/halo-combat-evolved-game-57900ff03df78c09e9a2071e.jpg" alt="">
                                </div>
                                <div class="col-3 picker-div d-flex align-items-center justify-content-center">
                                    <img class="img-fluid gallery-img" src="https://cdn.cloudflare.steamstatic.com/steam/apps/1064221/ss_237c21c0824571f17ea6e286bfed88e83b0d1ac0.1920x1080.jpg?t=1589213788" alt="">
                                </div>
                                <div class="col-3 picker-div d-flex align-items-center justify-content-center">
                                    <img class="img-fluid gallery-img" src="https://cdn.cloudflare.steamstatic.com/steam/apps/1064221/ss_1df66dab41f25a49786f7e4c4555ee5f42dce35e.1920x1080.jpg?t=1589213788" alt="">
                                </div>
                                <div class="col-3 picker-div d-flex align-items-center justify-content-center">
                                    <img class="img-fluid gallery-img" src="https://cdn.cloudflare.steamstatic.com/steam/apps/1064221/ss_1e9953b94826bb4ad96bec1bfa581dab6a0a9832.1920x1080.jpg?t=1589213788" alt="">
                                </div>
                            </div>
                        </div>
                    </div>

                
                </div>
                <div class="col-12 col-md-6">
                    <div class="top-content">
                        <h3 class="px-3 py-1">Halo Combat Evolved</h3>
                        <p class="px-3 py-1">
                            Halo: Combat Evolved is a 2001 first-person shooter game developed by Bungie and published by Microsoft Game Studios. 
                            It was released as a launch game for Microsoft's Xbox video game console on November 15, 2001. 
                            Microsoft released versions of the game for Windows and Mac OS X in 2003. 
                            The game was later released as a downloadable Xbox Original for the Xbox 360. 
                            Halo is set in the twenty-sixth century, with the player assuming the role of the Master Chief, a cybernetically enhanced supersoldier. 
                            The Chief is accompanied by Cortana, an artificial intelligence. 
                            Players battle aliens as they attempt to uncover the secrets of the eponymous Halo, a ring-shaped artificial world.
                        </p>
                        <strong class="px-3 py-1">in stock</strong>
                        <strong class="text-muted px-3 py-1"><del>in stock</del></strong>
                        <br>
                        <strong class="px-3 py-1">€60.00</strong>
                        <strong class="px-3 py-1"><del class="text-muted pe-2">€60.00</del>€45.00</strong>
                    </div>

                    <div class="bottom-content mx-3 mt-4">             
                        <div class="input-group">
                            <input type="text" class="form-control prod-input text-center counter input-sm p-0" maxlength="2" value="0">
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
                            <button class="ms-4 btn btn-sm">
                                Add To Cart
                            </button>
                        </div>   
                    </div>
                </div>
            </div>
            <hr class="my-4">
            <div class="row">
                <div class="container">
                    <p>
                        Ratings
                    </p>
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