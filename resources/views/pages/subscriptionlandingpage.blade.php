<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Subscription Pricing</title> 
        <link href="{{ asset('https://fonts.googleapis.com/css?family=Emilys+Candy|Glass+Antiqua|Montserrat:100,200,300,400,500,600,700,800,900|Playfair+Display:400,700,900|Raleway:100,200,300,400,500,600,700,800,900|Rozha+One|Suranna|UnifrakturMaguntia" rel="stylesheet')}}">
        <link rel="stylesheet" href="{{ asset('css/stylepricing.css')}}">
        <link href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js')}}" rel="stylesheet"> 
        <link href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js')}}" rel="stylesheet"> 
        <link href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.min.css')}}">
        <link href="{{ asset('https://codepen.io/yy/pen/doPgJW')}}">
        <script src="{{ asset('https://kit.fontawesome.com/b99e675b6e.js')}}"></script>
        <script src="{{ asset('css/scriptpricing.js')}}"></script>
        <link href="{{ asset('https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css')}}" rel='stylesheet'>
    </head>
    <body>


        <section class="pricing-tables text-center">
            <div class="container">
                <h2 class="section__title">Pricing</h2>
                <div class="switch">
                    <span class="monthly">Monthly</span>
                    <input type="checkbox" class="custom-switch">
                    <span class="annually">Annually<span class="save">*(Save 15%)</span>
                    </span>
                </div>

                <div class="plans grid-wrapper text-center">
                    @foreach ($servicePlanDto->getServicePlanArr() as $servicePlanArr)
                    <div class="plan plan--starter flex-wrapper">
                        <div class="plan__head">
                            <h3 class="plan__title caps lspg2">{{$servicePlanArr[0]}}</h3>
                            <div class="plan__price">
                                <span class="price price--monthly">{{$servicePlanArr[1]}} SAR<span class="plan__type">Monthly</span></span>
                            </div>
                        </div>
                        <div class="plan__features">
                            <p>
                                @for($x=2; $x < count($servicePlanArr); $x++)
                                <span>{{$servicePlanArr[$x]}}</span>
                                @endfor
                            </p>
                        </div>
                        <button class="plan__btn--start btn btn-default--outline btn-lg" onclick="alert('ISG Message\n\nUnder Development!')"><span>Buy</span></button>
                    </div>
                    @endforeach

                </div>
            </div>
        </section>
    </body>
</html>



<script>

$(".custom-switch").each(function (i) {
    var classes = $(this).attr("class"),
            id = $(this).attr("id"),
            name = $(this).attr("name");

    $(this).wrap('<div class="custom-switch" id="' + name + '"></div>');
    $(this).after('<label for="custom-switch-' + i + '"></label>');
    $(this).attr("id", "custom-switch-" + i);
    $(this).attr("name", name);
});
$(".custom-switch input").change(function () {
    $(".pricing-tables").toggleClass("plans--annually");
});
</script> 