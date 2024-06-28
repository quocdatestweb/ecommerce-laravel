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
    <meta name="csrf-token" content="{{ csrf_token() }}">

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
   

    :root {
	--size-wheelss: 45rem;
}

.spin-wheel-container {
    position: fixed;
    bottom: 20px;
    right: 20px;
    width: 50px; /* Adjust size based on your image dimensions */
    height: 50px; /* Adjust size based on your image dimensions */
    overflow: hidden;
    transform: translateX(-50%);
    z-index: 9999;
}

.spin-wheel {
    display: block;
    width: 100%;
    height: auto;
    animation: spin 2s linear infinite;
    object-fit: cover; /* Ensure the image covers the container */
    cursor: pointer;
    transition: transform 0.3s ease;
    /* box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); */
}

.spin-wheel:hover {
    transform: scale(1.1); /* Scale up on hover */
}




@keyframes spin {
 0% { transform: rotate(0deg); }
 100% { transform: rotate(360deg); }
}

.msg {
	min-height: 4rem;
	font-family: Arial, Helvetica, sans-serif;
	margin-top: 0.5rem;
	text-transform: capitalize;
}

#ul {
	position: relative;
	padding: 0;
	margin: 1rem 0;
	width: var(--size-wheelss);
	height: var(--size-wheelss);
    /* width: 700px;
	height: 700px; */
	border: 20px solid #e0144a;
	border-radius: 50%;
	list-style: none;
	overflow: hidden;
	transition: cubic-bezier(0.075, 0.8, 0.2, 1) 7s;
}

/* #spans {
	display: inline-block;
	position: relative;
	padding: 0.5rem;
}

#spans::before {
	content: '';
	position: absolute;
	top: 0rem;
	left: 50%;
	border-left: 2rem solid transparent;
	border-right: 2rem solid transparent;
	border-top: 4rem solid rgb(255, 0, 0);
	z-index: 2;
	transform: translateX(-50%);
	animation: arrow ease-out 0.6s infinite;
}

@keyframes arrow {
	0% {
		top: -2rem;
	}
	80% {
		top: 0;
	}
	100% {
		top: -1.5rem;
	}
} */

#spans {
	display: inline-block;
	position: relative;
	padding: 0.5rem;
}

#spans::before {
	content: '';
	position: absolute;
	top: -4rem; /* Adjust the top position to place the arrow correctly */
	left: 50%;
	width: 5rem; /* Set the width of the arrow image */
	height: 5rem; /* Set the height of the arrow image */
	background-image: url('https://seeklogo.com/images/M/map-pin-logo-724AC2A023-seeklogo.com.png'); /* Replace with the actual path to your arrow image */
	background-repeat: no-repeat;
	background-size: contain;
	z-index: 2;
	transform: translateX(-50%);
	animation: arrow 1s ease-in-out infinite;
}

@keyframes arrow {
	0% {
		transform: translateX(-50%) translateY(0);
	}
	50% {
		transform: translateX(-50%) translateY(0.5rem);
	}
	100% {
		transform: translateX(-50%) translateY(0);
	}
}

#spans::after {
	content: '';
	width: 2rem;
	height: 2rem;
	position: absolute;
	top: 50%;
	left: 50%;
	transform: translate(-50%, -50%);
	background-color: rgb(255, 255, 255);
	border-radius: 50%;
}

#lis {
	overflow: hidden;
	position: absolute;
	top: 0;
	right: 0;
	width: 50%;
	height: 50%;
	transform-origin: 0% 100%;
}

.text {
    font-family: Arial, Helvetica, sans-serif;
    position: absolute;
    left: -100%;
    width: 200%;
    height: 200%;
    display: block;
    text-align: center;
    padding-top: 1.7rem;
    font-weight: 600;
    color: #fff;
}

.text > b {
    display: inline-block;
    word-break: break-word; /* Cho phép ngắt dòng từ */
    width: 100px; /* Đặt chiều rộng cố định */
    white-space: normal; /* Cho phép ngắt dòng bình thường */
}


.main {
	display: flex;
	align-items: center;
	justify-content: center;
	flex-direction: column;
}

button {
	display: inline-block;
	text-align: center;
	border: 0;
	background-color: #333;
	color: #fff;
	font-size: 1.5rem;
	border-radius: 4rem;
	padding: 0.5rem 1.5rem;
	width: auto;
	cursor: pointer;
	outline: none;
}

button:hover {
	opacity: 0.8;
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
    const qtyUpButton = document.querySelector('.qty-ups');
    const qtyDownButton = document.querySelector('.qty-downs');

    qtyUpButton.addEventListener('click', function() {
        let currentValue = parseInt(quantityInput.value);
        quantityInput.value = currentValue + 1;
    });

    qtyDownButton.addEventListener('click', function() {
        let currentValue = parseInt(quantityInput.value);
        if (currentValue > 1) {
            quantityInput.value = currentValue - 1;
        }
    });
});
    </script>
<script>
        // Set the target date and time for the countdown
    var targetDate = new Date("2024-09-27T00:00:00Z");

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
<script>
    (() => {
const $ = document.querySelector.bind(document);

let timeRotate = 7000; //7 giây
let currentRotate = 0;
let isRotating = false;
const wheelss = $('.wheelss');
const btnwheelss = $('.btn--wheelss');
const showMsg = $('.msg');

//=====< Danh sách phần thưởng >=====

const listGift = []; // Initialize an empty array

@foreach ($prizes as $prize)
    listGift.push({
        text: '{{ $prize->quantity > 0 ? $prize->name : " $prize->name" }}',
        status: '{{ $prize->quantity > 0 ? "": "Đã hết" }}',
        percent: {{ $prize->winning_rate}},
        img:  '{{ $prize->quantity > 0 ? $prize->description :  $prize->description }}',
        // img: '{{ url('image/product/' . $prize->ThumbImage) }}'
    });
@endforeach

//=====< Số lượng phần thưởng >=====
const size = listGift.length;

//=====< Số đo góc của 1 phần thưởng chiếm trên hình tròn >=====
const rotate = 360 / size;

//=====< Số đo góc cần để tạo độ nghiêng, 90 độ trừ đi góc của 1 phần thưởng chiếm >=====
const skewY = 90 - rotate;


const colors = ['#f24a6d', '#3673df', '#2ed5a0', '#f8b818'];

listGift.map((item, index) => {
const elm = document.createElement('li');
elm.id = 'lis';
elm.style.transform = `rotate(${rotate * index}deg) skewY(-${skewY}deg)`;

// Get a random color from the list
const currentColor = colors[index % colors.length];

//   elm.innerHTML = `
//     <p style="transform: skewY(${skewY}deg) rotate(${rotate / 2}deg); background-color: ${currentColor};" class="text texts">
//       <img src="${item.img}" alt="${item.text}" width="50">
//       <br>
//       <b>${item.text}</b>
//     </p>
//   `;

elm.innerHTML = `
<p style="transform: skewY(${skewY}deg) rotate(${rotate / 2}deg); background-color: ${currentColor};" class="text texts">
  <b> ${item.text}</b>
  <br>
  <img src="${item.img}" alt="${item.text}" width="50">
  <br>
  <b> ${item.status}</b>
</p>
`;

wheelss.appendChild(elm);
});

// Function to generate a random hex color
function getRandomColor() {
const letters = '0123456789ABCDEF';
let color = '#';
for (let i = 0; i < 6; i++) {
color += letters[Math.floor(Math.random() * 16)];
}
return color;
}
/********** Hàm bắt đầu **********/
const start = () => {
    showMsg.innerHTML = '';
    isRotating = true;
    //=====< Lấy 1 số ngầu nhiên 0 -> 1 >=====
    const random = Math.random();

    //=====< Gọi hàm lấy phần thưởng >=====
    const gift = getGift(random);

    //=====< Số vòng quay: 360 độ = 1 vòng (Góc quay hiện tại) >=====
    currentRotate += 360 * 100;

    //=====< Gọi hàm quay >=====
    rotatewheelss(currentRotate, gift.index);

    //=====< Gọi hàm in ra màn hình >=====
    showGift(gift);
};

/********** Hàm quay vòng quay **********/
const rotatewheelss = (currentRotate, index) => {
    $('.wheelss').style.transform = `rotate(${
        //=====< Góc quay hiện tại trừ góc của phần thưởng>=====
        //=====< Trừ tiếp cho một nửa góc của 1 phần thưởng để đưa mũi tên về chính giữa >=====
        currentRotate - index * rotate - rotate / 2
    }deg)`;
};

/********** Hàm lấy phần thưởng **********/
const getGift = randomNumber => {
    let currentPercent = 0;
    let list = [];

    listGift.forEach((item, index) => {
        //=====< Cộng lần lượt phần trăm trúng của các phần thưởng >=====
        currentPercent += item.percent;

        //=====< Số ngẫu nhiên nhỏ hơn hoặc bằng phần trăm hiện tại thì thêm phần thưởng vào danh sách >=====
        if (randomNumber <= currentPercent) {
            list.push({ ...item, index });
        }
    });

    //=====< Phần thưởng đầu tiên trong danh sách là phần thưởng quay được>=====
    return list[0];
};

/********** In phần thưởng ra màn hình **********/



const showGift = (gift) => {
    let timer = setTimeout(() => {
        isRotating = false;
        // Hiển thị thông báo cho người dùng
        let message = `Chúc mừng bạn đã nhận được "${gift.text}"`;
        alert(message);
   
      

        // Lấy thông tin người dùng hiện tại (đã đăng nhập)
        let userId = '{{ $id_user }}'; // Get the ID of the authenticated user
        let username = '{{ $name }}'; // Get the name of the authenticated user
        let image_url = gift.img; // Get the name of the authenticated user
        let status = gift.status;
        // Lưu thông tin phần thưởng
        saveGiftToServer(userId, username, gift.text,image_url);

        clearTimeout(timer);
    }, timeRotate);
};


const saveGiftToServer = (userId, username, giftText, image_url) => {
  fetch('{{ route("user.save-gift") }}', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
      'X-CSRF-TOKEN': '{{ csrf_token() }}'
    },
    body: JSON.stringify({
      userId: userId,
      giftText: giftText,
      image_url: image_url,
      status: status

    })
  })
  .then(response => {
    if (response.ok) {
      console.log('Gift saved successfully');
    } else {
      console.error('Failed to save gift');
    }
  })
  .catch(error => {
    console.error('Error saving gift:', error);
  });
};
/********** Sự kiện click button start **********/
btnwheelss.addEventListener('click', () => {
    !isRotating && start();
});
})
();



</script>
 
@if ($name == "")
@elseif ($name !="")
<div class="spin-wheel-container">
    <a href="{{ route('user.wheel') }}">
        <img  class="spin-wheel" src="https://png.pngtree.com/png-vector/20230220/ourmid/pngtree-spin-wheel-vector-illustration-png-image_6606505.png" alt="Spin Wheel">
    </a>
</div>
@endif

</body>

</html>
