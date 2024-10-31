<!DOCTYPE html>
<html lang="en">
    @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<head>
    <meta charset="utf-8">
    <title>MultiShop - Online Shop Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="{{ asset('img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">  

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row bg-secondary py-1 px-xl-5">
            <div class="col-lg-6 d-none d-lg-block">
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                @if(session('customer'))
                <div class="d-inline-flex align-items-center">
                 <div class="btn-group">
                     <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">{{session('customer')->name}}</button>
                     <div class="dropdown-menu dropdown-menu-right">
                         <button class="dropdown-item" type="button"></button>
                         <a class="dropdown-item" type="button" href="{{route('contact')}}">Order History</a>
                         <a class="dropdown-item" type="button" href="{{route('logout')}}">logout</a>
                     </div>
                 </div>
             </div>
                 @else
                     <div class="d-inline-flex align-items-center">
                         <div class="btn-group">
                             <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">My Account</button>
                             <div class="dropdown-menu dropdown-menu-right">
                                 <a class="dropdown-item" type="button" href="{{route('logincus')}}">Sign in</a>
                                 <a class="dropdown-item" type="button" href="{{route('signup')}}">Sign up</a>
                             </div>
                         </div>
                     </div>
                 @endif
                <div class="d-inline-flex align-items-center d-block d-lg-none">
                    <a href="" class="btn px-0 ml-2">
                        <i class="fas fa-heart text-dark"></i>
                        <span class="badge text-dark border border-dark rounded-circle" style="padding-bottom: 2px;">0</span>
                    </a>
                    <a href="" class="btn px-0 ml-2">
                        <i class="fas fa-shopping-cart text-dark"></i>
                        <span class="badge text-dark border border-dark rounded-circle" style="padding-bottom: 2px;">0</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="row align-items-center bg-light py-3 px-xl-5 d-none d-lg-flex">
            <div class="col-lg-4">
                <a href="{{route('index')}}" class="text-decoration-none">
                    <span class="h1 text-uppercase text-primary bg-dark px-2">ANH MINH</span>
                    <span class="h1 text-uppercase text-dark bg-primary px-2 ml-n1">Shop</span>
                </a>
            </div>
            <div class="col-lg-4 col-6 text-left">
                <form action="{{route('Shop')}}">
                    <div class="input-group">
                        <input type="text" class="form-control" name="search" placeholder="Search for products">
                        <div class="input-group-append">
                            <span class="input-group-text bg-transparent text-primary">
                                <i class="fa fa-search"></i>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid bg-dark mb-30">
        <div class="row px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn d-flex align-items-center justify-content-between bg-primary w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; padding: 0 30px;">
                    <h6 class="text-dark m-0"><i class="fa fa-bars mr-2"></i>Categories</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 999;">
                    <div class="navbar-nav w-100">
                        @foreach($categories as $category)
                            <a href="#" class="nav-item nav-link">{{ $category->name }}</a>
                        @endforeach
                    </div> 
                </nav>
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <span class="h1 text-uppercase text-dark bg-light px-2">ANH MINH</span>
                        <span class="h1 text-uppercase text-light bg-primary px-2 ml-n1">Shop</span>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="{{route('index')}}" class="nav-item nav-link">Home</a>
                            <a href="{{route('Shop')}}" class="nav-item nav-link">Shop</a>
                        </div>
                        <div class="navbar-nav ml-auto py-0 d-none d-lg-block">
                            <a href="{{ route('cart') }}" class="btn px-0 ml-3">
                                <i class="fas fa-shopping-cart text-primary"></i>
                                <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;">0</span>
                            </a>
                        </div>  
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="{{route('index')}}">Home</a>
                    <a class="breadcrumb-item text-dark" href="{{route('Shop')}}">Shop</a>
                    <a class="breadcrumb-item text-dark" href="{{route('cart')}}">cart</a>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Cart Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-light table-borderless table-hover text-center mb-0">
                    <thead class="thead-dark">
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        @foreach($cart as $id => $item)
                            <tr>
                                <td class="align-middle">
                                    <img src="{{ asset('img/' . $item['image']) }}" alt="{{ $item['name'] }}" style="width: 50px;">
                                    {{ $item['name'] }}
                                </td>
                                <td class="align-middle" data-price="{{ $item['price'] }}">${{ $item['price'] }}</td>
                                <td class="align-middle">
                                    <div class="input-group quantity mx-auto" style="width: 100px;">
                                        <div class="input-group-btn">
                                            <button class="btn btn-sm btn-primary btn-minus" data-id="{{ $id }}" data-action="decrease">
                                                <i class="fa fa-minus"></i>
                                            </button>
                                        </div>
                                        <input type="text" class="form-control form-control-sm bg-secondary border-0 text-center" value="{{ $item['quantity'] }}" readonly>
                                        <div class="input-group-btn">
                                            <button class="btn btn-sm btn-primary btn-plus" data-id="{{ $id }}" data-action="increase">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                                <td class="align-middle total" data-total="{{ $item['price'] * $item['quantity'] }}">
                                    ${{ $item['price'] * $item['quantity'] }}
                                </td>
                                <td class="align-middle">
                                    <form action="{{ route('cart.remove') }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="id" value="{{ $id }}">
                                        <button class="btn btn-sm btn-danger"><i class="fa fa-times"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-lg-4">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Cart Summary</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="border-bottom pb-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Subtotal</h6>
                            <h6>{{ array_sum(array_map(function($item) { return $item['price'] * $item['quantity']; }, $cart)) }}</h6>
                        </div>
                    </div>  
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Total</h5>
                            <h5>${{ array_sum(array_map(function($item) { return $item['price'] * $item['quantity']; }, $cart))}}</h5>
                        </div>
                        @if(count($cart) > 0)
                    <a class="btn btn-block btn-primary font-weight-bold my-3 py-3" href="{{ route('check') }}">Proceed To Checkout</a>
                    @else
                    <button class="btn btn-block btn-secondary font-weight-bold my-3 py-3" disabled>Proceed To Checkout</button>
                    <div class="alert alert-warning mt-2">Your cart is empty. Please add some products.</div>
                    @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-secondary mt-5 pt-5">
        <div class="row px-xl-5 pt-5">
            <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
                <h5 class="text-secondary text-uppercase mb-4">Get In Touch</h5>
                <p class="mb-4"></p>
                <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>515 Nguyễn trãi, Thanh Xuân, Hà nội</p>
                <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>info@example.com</p>
                <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+ 0966943904</p>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    <div class="col-md-4 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4"></h5>
                        {{-- <div class="d-flex flex-column justify-content-start">
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Home</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Our Shop</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Shop Detail</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Shopping Cart</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Checkout</a>
                            <a class="text-secondary" href="#"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
                        </div> --}}
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4"></h5>
                        {{-- <div class="d-flex flex-column justify-content-start">
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Home</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Our Shop</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Shop Detail</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Shopping Cart</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Checkout</a>
                            <a class="text-secondary" href="#"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
                        </div> --}}
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4"></h5>
                        <p></p>
                        <form action="">
                            {{-- <div class="input-group">
                                <input type="text" class="form-control" placeholder="Your Email Address">
                                <div class="input-group-append">
                                    <button class="btn btn-primary">Sign Up</button>
                                </div>
                            </div> --}}
                        </form>
                        <h6 class="text-secondary text-uppercase mt-4 mb-3"></h6>
                        {{-- <div class="d-flex">
                            <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a class="btn btn-primary btn-square" href="#"><i class="fab fa-instagram"></i></a>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="row border-top mx-xl-5 py-4" style="border-color: rgba(256, 256, 256, .1) !important;">
            <div class="col-md-6 px-xl-0">
                <p class="mb-md-0 text-center text-md-left text-secondary">
                    &copy; <a class="text-primary" href="#"></a>. All Rights Reserved. Designed
                    by
                    <a class="text-primary" href="">Long</a>
                </p>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <script>
        $(document).ready(function() {
            $('.container-fluid').off('click', '.btn-plus, .btn-minus');
            $('.container-fluid').on('click', '.btn-plus, .btn-minus', function() {
                var id = $(this).data('id');
                var action = $(this).data('action');
                var qtyInput = $(this).parent().siblings('input');
                var currentQty = parseInt(qtyInput.val());
                var newQty = action === 'increase' ? currentQty  : currentQty ;
                
                // Prevent quantity from being less than 0
                if (newQty < 0) newQty = 0;
        
                if (newQty === 0) {
                    $.ajax({
                        url: '{{ route("cart.remove") }}',
                        method: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}',
                            id: id
                        },
                        success: function(response) {
                            if (response.success) {
                                // Remove the row and update cart summary
                                qtyInput.closest('tr').remove();
                                updateCartSummary();
                                // Reload the page to ensure update
                                location.reload();
                            } else {
                                alert(response.message);
                            }
                        }
                    });
                } else {
                    $.ajax({
                        url: '{{ route("cart.update") }}',
                        method: 'patch',
                        data: {
                            _token: '{{ csrf_token() }}',
                            id: id,
                            quantity: newQty
                        },
                        success: function(response) {
                            if (response.success) {
                                // Update the quantity input value
                                qtyInput.val(newQty);
                                // Update the total price
                                var price = parseFloat(qtyInput.closest('tr').find('td[data-price]').data('price'));
                                var totalElement = qtyInput.closest('tr').find('.total');
                                totalElement.data('total', price * newQty);
                                totalElement.text('$' + (price * newQty).toFixed(2));
                                // Update cart summary
                                updateCartSummary();
                                // Reload the page to ensure update
                                location.reload();
                            } else {
                                alert(response.message);
                            }
                        }
                    });
                }
            });
        
            // Handle direct quantity change
            $('.container-fluid').on('change', 'input[type="text"]', function() {
                var id = $(this).closest('tr').find('.btn-plus').data('id');
                var newQty = parseInt($(this).val());
        
                // Prevent quantity from being less than 0
                if (newQty < 0) newQty = 0;
        
                if (newQty === 0) {
                    $.ajax({
                        url: '{{ route("cart.remove") }}',
                        method: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}',
                            id: id
                        },
                        success: function(response) {
                            if (response.success) {
                                // Remove the row and update cart summary
                                $(this).closest('tr').remove();
                                updateCartSummary();
                                // Reload the page to ensure update
                                location.reload();
                            } else {
                                alert(response.message);
                            }
                        }.bind(this)
                    });
                } else {
                    $.ajax({
                        url: '{{ route("cart.update") }}',
                        method: 'patch',
                        data: {
                            _token: '{{ csrf_token() }}',
                            id: id,
                            quantity: newQty
                        },
                        success: function(response) {
                            if (response.success) {
                                // Update the total price
                                var price = parseFloat($(this).closest('tr').find('td[data-price]').data('price'));
                                var totalElement = $(this).closest('tr').find('.total');
                                totalElement.data('total', price * newQty);
                                totalElement.text('$' + (price * newQty).toFixed(2));
                                // Update cart summary
                                updateCartSummary();
                                // Reload the page to ensure update
                                location.reload();
                            } else {
                                alert(response.message);
                            }
                        }.bind(this)
                    });
                }
            });
        
            function updateCartSummary() {
                var subtotal = 0;
                $('.total[data-total]').each(function() {
                    subtotal += parseFloat($(this).data('total'));
                });
                $('.subtotal').text('$' + subtotal.toFixed(2));
                $('.total-amount').text('$' + subtotal.toFixed(2));
        
                if (subtotal === 0) {
                    $('.table tbody').html('<tr><td colspan="5">Your cart is empty.</td></tr>');
                    $('.checkout-button').remove();
                }
            }
        });
        </script>
        
        
    
</body>

</html>