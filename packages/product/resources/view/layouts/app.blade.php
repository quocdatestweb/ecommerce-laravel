<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Ecommerce</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="{{ asset('css/slick.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('css/slick-theme.css') }}" />

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="{{ asset('css/nouislider.min.css') }}" />

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}" />

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link rel="shortcut icon" href="https://seeklogo.com/images/J/jiomart-logo-CFA2176800-seeklogo.com.png"
        type="image/vnd.microsoft.icon" />
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js')}}"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js')}}"></script>
  <![endif]-->
  <style>
    /* sign in FORM */
    #logreg-forms {
        width: 412px;
        margin: 10vh auto;
        background-color: #f3f3f3;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
        transition: all 0.3s cubic-bezier(.25, .8, .25, 1);
    }

    #logreg-forms form {
        width: 100%;
        max-width: 410px;
        padding: 15px;
        margin: auto;
    }

    #logreg-forms .form-control {
        position: relative;
        box-sizing: border-box;
        height: auto;
        padding: 10px;
        font-size: 16px;
    }

    #logreg-forms .form-control:focus {
        z-index: 2;
    }

    #logreg-forms .form-signin input[type="email"] {
        margin-bottom: -1px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
    }

    #logreg-forms .form-signin input[type="password"] {
        border-top-left-radius: 0;
        border-top-right-radius: 0;
    }

    #logreg-forms .social-login {
        width: 390px;
        margin: 0 auto;
        margin-bottom: 14px;
    }

    #logreg-forms .social-btn {
        font-weight: 100;
        color: white;
        width: 190px;
        font-size: 0.9rem;
    }

    #logreg-forms a {
        display: block;
        padding-top: 10px;
        color: lightseagreen;
    }

    #logreg-form .lines {
        width: 200px;
        border: 1px solid red;
    }


    #logreg-forms button[type="submit"] {
        margin-top: 10px;
    }

    #logreg-forms .facebook-btn {
        background-color: #3C589C;
    }

    #logreg-forms .google-btn {
        background-color: #DF4B3B;
    }

    #logreg-forms .form-reset,
    #logreg-forms .form-signup {
        display: none;
    }

    #logreg-forms .form-signup .social-btn {
        width: 210px;
    }

    #logreg-forms .form-signup input {
        margin-bottom: 2px;
    }

    .form-signup .social-login {
        width: 210px !important;
        margin: 0 auto;
    }

    /* Mobile */

    @media screen and (max-width:500px) {
        #logreg-forms {
            width: 300px;
        }

        #logreg-forms .social-login {
            width: 200px;
            margin: 0 auto;
            margin-bottom: 10px;
        }

        #logreg-forms .social-btn {
            font-size: 1.3rem;
            font-weight: 100;
            color: white;
            width: 200px;
            height: 56px;

        }

        #logreg-forms .social-btn:nth-child(1) {
            margin-bottom: 5px;
        }

        #logreg-forms .social-btn span {
            display: none;
        }

        #logreg-forms .facebook-btn:after {
            content: 'Facebook';
        }

        #logreg-forms .google-btn:after {
            content: 'Google+';
        }

    }
</style>
</head>

<body>
    <!-- HEADER -->
    @include('products::layouts.header')
    <!-- /HEADER -->

    <!-- NAVIGATION -->
    @include('products::layouts.navigation')
    <!-- /NAVIGATION -->

    <!-- SECTION -->
    @yield('content')
    <!-- /SECTION -->

    <!-- FOOTER -->
    @include('products::layouts.footer')
    <!-- /FOOTER -->

    <!-- jQuery Plugins -->
    {{-- <script src="{{ asset('js/jquery.min.js') }}"></script> --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // JavaScript code for handling AJAX requests
        // ...
        // Add to Cart
        $('.add-to-cart-btn').submit(function(e) {
            e.preventDefault();

            var productId = $(this).data('product-id');

            $.ajax({
                url: '/cart/add',
                type: 'POST',
                data: {
                    product_id: productId,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    // Handle success response
                    alert(response.message);
                    updateCartCount();
                },
                error: function(xhr, status, error) {
                    // Handle error response
                    console.log(xhr.responseText);
                }
            });
        });
        // Update Quantity
        $('.update-quantity-btn').submit(function(e) {
            e.preventDefault();

            var productId = $(this).data('product-id');
            var quantity = parseInt($('#quantity-' + productId).val());

            $.ajax({
                url: '/cart/update',
                type: 'POST',
                data: {
                    product_id: productId,
                    quantity: quantity,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    // Handle success response
                    alert(response.message);
                    updateCartCount();
                },
                error: function(xhr, status, error) {
                    // Handle error response
                    console.log(xhr.responseText);
                }
            });
        });

        // Remove from Cart
        // Remove from Cart
        // $('.remove-from-cart-btn').click(function(e) {
        //     e.preventDefault();

        //     var productId = $(this).data('product-id');

        //     $.ajax({
        //         url: '/cart/remove',
        //         type: 'POST',
        //         data: {
        //             product_id: productId,
        //             _token: '{{ csrf_token() }}'
        //         },
        //         success: function(response) {
        //             // Handle success response
        //             alert(response.message);
        //             updateCartCount();
        //         },
        //         error: function(xhr, status, error) {
        //             // Handle error response
        //             console.log(xhr.responseText);
        //         }
        //     });
        // });
        // $('.remove-from-cart-btn').click(function(e) {
        //     e.preventDefault();

        //     var productId = $(this).data('product-id');
        //     var productCount = $(this).data('product-count');

        //     var productElement = $(this).closest('.product-widget'); // Get the product element

        //     $.ajax({
        //         url: '/cart/remove',
        //         type: 'POST',
        //         data: {
        //             product_id: productId,
        //             product_count: productCount,
        //             _token: '{{ csrf_token() }}'
        //         },
        //         success: function(response) {
        //             // Handle success response
        //             alert(response.message);
        //             productElement.remove(); // Remove the product element from the DOM
        //             updateCartCount();
        //         },
        //         error: function(xhr, status, error) {
        //             // Handle error response
        //             console.log(xhr.responseText);
        //         }
        //     });
        // });


        $('.remove-from-cart-btn').click(function(e) {
            e.preventDefault();

            var productId = $(this).data('product-id');
            var productCount = $(this).data('product-count');
            var productElement = $(this).closest(
                '.product-widget'); // Get the parent element containing the product elements
            var productElements = $(this).closest(
                '.product-widgets'); // Get the parent element containing the product elements

            $.ajax({
                url: '/cart/remove',
                type: 'POST',
                data: {
                    product_id: productId,
                    product_count: productCount,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    // Handle success response
                    alert(response.message);
                    productElement
                        .remove(); // Remove the parent element containing the product elements from the DOM
                    productElements
                        .remove(); // Remove the parent element containing the product elements from the DOM
                    taiLaiTrang();
                    updateCartCount();
                    updateTotalPrice(); // Update the total price
                },
                error: function(xhr, status, error) {
                    // Handle error response
                    console.log(xhr.responseText);
                }
            });
        });

        function taiLaiTrang() {
            location.reload();
            $('#total-prices').text(0);

        }
        // Function to update the cart count
        function updateCartCount() {
            $.ajax({
                url: '/cart/count', // Replace with the actual URL to fetch the updated cart count
                type: 'GET',
                success: function(response) {
                    // Update the cart count in the DOM
                    $('#count').text(response.count);
                    $('.qty').text(response.count);
                    // $('#counts').text(response.count);
                    // $('.qtys').text(response.count);
                },
                error: function(xhr, status, error) {
                    // Handle error response
                    console.log(xhr.responseText);
                }
            });
        }

        // Function to update the total price
        function updateTotalPrice() {
            var totalPrice = 0;
            var totalPrices = 0;

            $('.product-widget').each(function() {
                var quantity = parseInt($(this).find('.qty').text());
                var price = parseInt($(this).find('.product-price').text().replace('₫', '').replace(/\./g, ''));
                totalPrice += quantity * price;
            });

            $('.product-widgets').each(function() {
                var quantitys = parseInt($(this).find('.qtys').text());
                var prices = parseInt($(this).find('.product-prices').text().replace('₫', '').replace(/\./g, ''));
                totalPrices += quantitys * prices;
            });
            $('#total-price').text(totalPrice.toFixed(2));
            // Format totalPrices to VNĐ
            var formattedTotal = totalPrices.toLocaleString('vi-VN', {
                style: 'currency',
                currency: 'VND'
            });

            $('#total-prices').text(formattedTotal);
        }
    </script>

    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/slick.min.js') }}"></script>
    <script src="{{ asset('js/nouislider.min.js') }}"></script>
    <script src="{{ asset('js/jquery.zoom.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const quantityInput = document.getElementById('quantity');
            const qtyUpButton = document.querySelector('.qty-up');
            const qtyDownButton = document.querySelector('.qty-down');

            qtyUpButton.addEventListener('click', function() {
                quantityInput.stepUp();
            });

            qtyDownButton.addEventListener('click', function() {
                if (quantityInput.value > 1) {
                    quantityInput.stepDown();
                }
            });
        });
    </script>
    <script>
       // Set the target date and time for the countdown
var targetDate = new Date("2024-05-27T00:00:00Z");

// Update the countdown every second
var countdownInterval = setInterval(updateCountdown, 1000);

function updateCountdown() {
    // Get the current date and time
    var currentDate = new Date();

    // Calculate the remaining time
    var remainingTime = targetDate - currentDate;

    // Stop the countdown if the target date has passed
    if (remainingTime <= 0) {
        clearInterval(countdownInterval);
        return;
    }

    // Calculate the remaining days, hours, minutes, and seconds
    var days = Math.floor(remainingTime / (1000 * 60 * 60 * 24));
    var hours = Math.floor((remainingTime % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((remainingTime % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((remainingTime % (1000 * 60)) / 1000);

    // Update the countdown elements with the new values
    document.getElementById("days").textContent = days.toString().padStart(2, "0");
    document.getElementById("hours").textContent = hours.toString().padStart(2, "0");
    document.getElementById("minutes").textContent = minutes.toString().padStart(2, "0");
    document.getElementById("seconds").textContent = seconds.toString().padStart(2, "0");
}
    </script>



</body>

</html>
