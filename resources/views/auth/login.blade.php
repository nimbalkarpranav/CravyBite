<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
            <link rel="stylesheet" href="assets/css/custom.css">

    <title>Login Dashboard</title>

</head>

<body>
    <div class="login-container">
        <!-- Background Elements -->
        <div class="bg-shapes">
            <div class="shape shape-1"></div>
            <div class="shape shape-2"></div>
            <div class="shape shape-3"></div>
        </div>

        <!-- Main Content -->
        <div class="container-fluid h-100 p-0">
            <div class="row h-100 g-0">
                <!-- Left Side - Branding -->
                <div class="col-lg-6 d-none d-lg-flex">
                    <div class="bg-gradient-primary w-100 d-flex flex-column justify-content-center align-items-center">
                        <div class="brand-section text-center px-5">
                            <div class="brand-logo mb-4">
                                <div class="logo-circle">
                                    <i class="fas fa-chart-line"></i>
                                </div>
                            </div>
                            <h1 class="brand-title">Welcome to Dashboard</h1>
                            <p class="brand-subtitle">Manage your business with powerful analytics and insights</p>
                            <div class="features-list">
                                <div class="feature-item">
                                    <i class="fas fa-shield-alt"></i>
                                    <span>Enterprise-grade security</span>
                                </div>
                                <div class="feature-item">
                                    <i class="fas fa-rocket"></i>
                                    <span>Lightning-fast performance</span>
                                </div>
                                <div class="feature-item">
                                    <i class="fas fa-users"></i>
                                    <span>Team collaboration tools</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Side - Login Form -->
                <div class="col-lg-6">
                    <div class="form-side">
                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="fas fa-exclamation-triangle me-2"></i>
                                <strong>Login Failed!</strong>
                                <ul class="mb-0 mt-2">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        <!-- Success Messages (for password reset, etc.) -->
                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="fas fa-check-circle me-2"></i>
                                {{ session('status') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif
                        <div class="login-form-container">
                            <div class="login-header text-center mb-5">
                                <h2>Sign In</h2>
                                <p>Access your dashboard</p>
                            </div>

                            <!-- Error Messages -->
                            <div class="alert alert-danger alert-dismissible fade show d-none" role="alert"
                                id="errorAlert">
                                <i class="fas fa-exclamation-triangle me-2"></i>
                                <strong>Login Failed!</strong>
                                <span id="errorMessage">Invalid credentials provided.</span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>

                            <!-- Success Messages -->
                            <div class="alert alert-success alert-dismissible fade show d-none" role="alert"
                                id="successAlert">
                                <i class="fas fa-check-circle me-2"></i>
                                <span id="successMessage">Operation completed successfully!</span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>

                            <!-- Social Login -->
                            <div class="social-login">
                                <div class="row g-3">
                                    <div class="col-4">
                                        <button class="btn btn-social btn-google w-100" type="button">
                                            <i class="fab fa-google"></i>
                                        </button>
                                    </div>
                                    <div class="col-4">
                                        <button class="btn btn-social btn-github w-100" type="button">
                                            <i class="fab fa-github"></i>
                                        </button>
                                    </div>
                                    <div class="col-4">
                                        <button class="btn btn-social btn-microsoft w-100" type="button">
                                            <i class="fab fa-microsoft"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="divider">
                                <span>or continue with email</span>
                            </div>

                            <!-- Login Form -->
                            <form method="POST" action="{{ route('login') }}" id="loginForm">
                                @csrf
                                <div class="form-floating">
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        id="email" name="email" value="{{ old('email') }}"
                                        placeholder="name@example.com" required autocomplete="email" autofocus>
                                    <label for="email">Email address</label>
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @else
                                        <div class="invalid-feedback d-none">
                                            Please enter a valid email address.
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-floating">
                                    <input type="password"
                                        class="form-control @error('password') is-invalid @enderror" id="password"
                                        name="password" placeholder="Password" required
                                        autocomplete="current-password">
                                    <label for="password">Password</label>
                                    <button type="button" class="password-toggle" id="togglePassword">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @else
                                        <div class="invalid-feedback d-none">
                                            Please enter your password.
                                        </div>
                                    @enderror
                                </div>

                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember"
                                            id="remember">
                                        <label class="form-check-label" for="remember">
                                            Remember me
                                        </label>
                                    </div>
                                    <a href="#" class="text-decoration-none">Forgot password?</a>
                                </div>

                                <button type="submit" class="btn btn-primary btn-lg w-100 mb-4">
                                    <span class="btn-text">Sign In</span>
                                    <div class="btn-loader d-none">
                                        <div class="spinner-border spinner-border-sm" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </div>
                                </button>

                                <div class="text-center">
                                    <p class="text-muted mb-0">
                                        Don't have an account?
                                        <a href="{{ route('register') }}" class="text-decoration-none">Create
                                            account</a>
                                    </p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
