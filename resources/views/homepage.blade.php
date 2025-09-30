<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ellie Store - Your Fashion Destination</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #592F7B;
            --secondary-color: #783F91;
            --accent-color: #BC98C4;
            --dark-color: #391F4F;
            --darkest-color: #220D38;
            --dark-text: #2d2d2d;
            --light-bg: #f5f0f7;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: var(--dark-text);
        }

        /* Navbar Styling */
        .navbar {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%) !important;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            padding: 1rem 0;
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.8rem;
            color: white !important;
            letter-spacing: 1px;
            font-style: italic;
        }

        .navbar-nav .nav-link {
            color: rgba(255,255,255,0.9) !important;
            font-weight: 500;
            margin: 0 0.5rem;
            transition: all 0.3s ease;
            position: relative;
        }

        .navbar-nav .nav-link:hover {
            color: white !important;
            transform: translateY(-2px);
        }

        .navbar-nav .nav-link.active {
            color: white !important;
        }

        .navbar-nav .nav-link.active::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 50%;
            transform: translateX(-50%);
            width: 30px;
            height: 3px;
            background: white;
            border-radius: 2px;
        }

        .btn-login {
            background: transparent;
            border: 2px solid white;
            color: white !important;
            padding: 0.5rem 1.5rem;
            border-radius: 25px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-login:hover {
            background: #592F7B;
            color: var(--primary-color) !important;
        }

        .btn-register {
            background: var(--primary-color);
            border: 2px solid white;
            color: var(--primary-color) !important;
            padding: 0.5rem 1.5rem;
            border-radius: 25px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-register:hover {
            background: var(--accent-color);
            border-color:  violet !important;;
            color: white !important;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(255,107,157,0.3);
        }

        /* Carousel Styling */
        .carousel {
            margin-top: 0 !important;
        }

        .carousel-item {
            height: 600px;
            position: relative;
        }

        .carousel-item img {
            object-fit: cover;
            height: 100%;
            filter: brightness(0.8);
        }

        .carousel-caption {
            top: 50%;
            transform: translateY(-50%);
            bottom: auto;
            text-align: left;
            left: 10%;
            right: 10%;
        }

        .carousel-caption h2 {
            font-size: 3.5rem;
            font-weight: 700;
            text-shadow: 2px 2px 8px rgba(0,0,0,0.7);
            margin-bottom: 1.5rem;
        }

        .carousel-caption p {
            font-size: 1.3rem;
            text-shadow: 1px 1px 5px rgba(0,0,0,0.7);
            margin-bottom: 2rem;
            max-width: 600px;
        }

        .carousel-caption .btn {
            padding: 0.8rem 2.5rem;
            font-size: 1.1rem;
            font-weight: 600;
            border-radius: 30px;
            margin-right: 1rem;
            transition: all 0.3s ease;
        }

        .btn-primary-custom {
            background: var(--accent-color);
            border: none;
            color: white;
        }

        .btn-primary-custom:hover {
            background: var(--primary-color);
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(212,82,110,0.4);
        }

        .btn-outline-custom {
            background: transparent;
            border: 2px solid white;
            color: white;
        }

        .btn-outline-custom:hover {
            background: white;
            color: var(--primary-color);
        }

        /* Features Section */
        .features-section {
            padding: 5rem 0;
            background: var(--light-bg);
        }

        .features-section h2 {
            text-align: center;
            margin-bottom: 3rem;
            color: var(--primary-color);
            font-weight: 700;
            font-size: 2.5rem;
        }

        .feature-card {
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
            height: 100%;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
        }

        .feature-icon {
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.5rem;
            color: white;
            font-size: 2rem;
        }

        .feature-card h4 {
            color: var(--primary-color);
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .feature-card p {
            color: #666;
            line-height: 1.7;
        }

        @media (max-width: 768px) {
            .carousel-item {
                height: 400px;
            }
            
            .carousel-caption h2 {
                font-size: 2rem;
            }
            
            .carousel-caption p {
                font-size: 1rem;
            }
        }

        .btn-logout {
            padding: 0.5rem 1rem;
            color: #dc3545;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .btn-logout:hover {
            color: #bb2d3b;
            transform: translateY(-2px);
        }
        
        .nav-link strong {
            color: white;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#"> Ellie Store</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">New Arrivals</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Collections</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Sale</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>

                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    @auth
                        <!-- Show when user is logged in -->
                        <li class="nav-item">
                            <span class="nav-link">
                                Welcome, <strong>{{ Auth::user()->name }}</strong>
                            </span>
                        </li>
                        <li class="nav-item">
                            <form action="{{ url('/logout') }}" method="POST" style="display: inline;">
                                @csrf
                                <button type="submit" class="nav-link btn-logout" style="border: none; background: none; cursor: pointer;">
                                    Logout
                                </button>
                            </form>
                        </li>
                    @else
                        <!-- Show when user is NOT logged in -->
                        <li class="nav-item">
                            <a class="nav-link btn-login me-2" href="{{ url('/user-login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn-register" href="{{ url('/user-login') }}">Shop Now</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <!-- Carousel -->
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>

        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://images.unsplash.com/photo-1483985988355-763728e1935b?w=1920&q=80" class="d-block w-100" alt="Fashion Collection">
                <div class="carousel-caption">
                    <h2>Spring Collection 2024</h2>
                    <p>Discover the latest trends in fashion. Elevate your style with our curated collection</p>
                    <a href="#" class="btn btn-primary-custom">Shop Collection</a>
                    <a href="#" class="btn btn-outline-custom">View Lookbook</a>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://images.unsplash.com/photo-1445205170230-053b83016050?w=1920&q=80" class="d-block w-100" alt="Shopping Experience">
                <div class="carousel-caption">
                    <h2>Exclusive Designer Pieces</h2>
                    <p>Premium quality clothing for the modern fashionista. Express your unique style</p>
                    <a href="#" class="btn btn-primary-custom">Explore Now</a>
                    <a href="#" class="btn btn-outline-custom">New Arrivals</a>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://images.unsplash.com/photo-1490481651871-ab68de25d43d?w=1920&q=80" class="d-block w-100" alt="Fashion Style">
                <div class="carousel-caption">
                    <h2>Up to 50% Off Sale</h2>
                    <p>Don't miss out on amazing deals. Limited time offers on selected items</p>
                    <a href="#" class="btn btn-primary-custom">Shop Sale</a>
                    <a href="#" class="btn btn-outline-custom">View Deals</a>
                </div>
            </div>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>

        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- Features Section -->
    <section class="features-section">
        <div class="container">
            <h2>Why Shop at Ellie Store?</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon">👗</div>
                        <h4>Trendy Collections</h4>
                        <p>Stay ahead of fashion trends with our carefully curated collections. From casual wear to elegant evening dresses.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon">✨</div>
                        <h4>Premium Quality</h4>
                        <p>Every piece is selected for its exceptional quality, comfort, and durability. Fashion that lasts.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon">🚚</div>
                        <h4>Free Shipping</h4>
                        <p>Enjoy free worldwide shipping on orders over $50. Fast delivery and easy returns within 30 days.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>