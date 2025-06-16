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
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/custom.css">
    
    <title>Registration Dashboard</title>
    
    
</head>
<body>
    <div class="registration-container">
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
                                    <i class="fas fa-user-plus"></i>
                                </div>
                            </div>
                            <h1 class="brand-title">Join Our Platform</h1>
                            <p class="brand-subtitle">Create your account and start managing your business today</p>
                            <div class="features-list">
                                <div class="feature-item">
                                    <i class="fas fa-clock"></i>
                                    <span>Quick 2-minute setup</span>
                                </div>
                                <div class="feature-item">
                                    <i class="fas fa-shield-alt"></i>
                                    <span>Secure & encrypted data</span>
                                </div>
                                <div class="feature-item">
                                    <i class="fas fa-gift"></i>
                                    <span>Free 30-day trial included</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Right Side - Registration Form -->
                <div class="col-lg-6">
                    <div class="form-side">
                        <div class="registration-form-container">
                            <div class="registration-header text-center mb-4">
                                <h2>Create Account</h2>
                                <p>Start your journey with us</p>
                            </div>
                            
                            <!-- Social Registration -->
                            <div class="social-registration">
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
                                <span>or register with email</span>
                            </div>
                            
                            <!-- Registration Form -->
                                            @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                            <form method="POST" action="{{route('register')}}" class="needs-validation" novalidate  >
                                   @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" 
                                                class="form-control" 
                                                id="name" 
                                                name="name" 
                                                placeholder="Full Name"
                                                required 
                                                autocomplete="name">
                                            <label for="name">Full Name</label>
                                            <div class="invalid-feedback d-none">
                                               {{'message'}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" 
                                                   class="form-control" 
                                                   id="lastName" 
                                                   name="lastName" 
                                                   placeholder="Last Name"
                                                   required 
                                                   autocomplete="family-name">
                                            <label for="lastName">Last Name</label>
                                            <div class="invalid-feedback d-none">
                                                Please enter your last name.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-floating">
                                    <input type="email" 
                                        class="form-control @error('email') is-invalid @enderror" 
                                        id="email" 
                                        name="email" 
                                        value="{{ old('email') }}"
                                        placeholder="name@example.com"
                                        required 
                                        autocomplete="email">
                                    <label for="email">Email address</label>
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                
                                <div class="form-floating">
                                    <input type="password" 
                                           class="form-control" 
                                           id="password" 
                                           name="password" 
                                           placeholder="Password"
                                           required 
                                           autocomplete="new-password">
                                    <label for="password">Password</label>
                                    <button type="button" class="password-toggle" id="togglePassword">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <div class="invalid-feedback d-none">
                                        Password must be at least 8 characters long.
                                    </div>
                                    <div class="password-strength" id="passwordStrength">
                                        <div class="strength-indicator">
                                            <div class="strength-bar" id="strengthBar"></div>
                                        </div>
                                        <div class="strength-text" id="strengthText">Enter a password</div>
                                    </div>
                                </div>
                                
                                <div class="form-floating">
                                    <input type="password" 
                                           class="form-control" 
                                           id="password_confirmation" 
                                           name="password_confirmation" 
                                           placeholder="Confirm Password"
                                           required 
                                           autocomplete="new-password">
                                    <label for="password_confirmation">Confirm Password</label>
                                    <button type="button" class="password-toggle" id="toggleConfirmPassword">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <div class="invalid-feedback d-none">
                                        Passwords do not match.
                                    </div>
                                    <div class="valid-feedback d-none">
                                        Passwords match!
                                    </div>
                                </div>
                                
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" name="terms" id="terms" required>
                                    <label class="form-check-label" for="terms">
                                        I agree to the <a href="#" class="text-decoration-none">Terms of Service</a> 
                                        and <a href="#" class="text-decoration-none">Privacy Policy</a>
                                    </label>
                                </div>
                                
                                <div class="form-check mb-4">
                                    <input class="form-check-input" type="checkbox" name="newsletter" id="newsletter">
                                    <label class="form-check-label" for="newsletter">
                                        Send me product updates and marketing emails
                                    </label>
                                </div>
                                
                                <button type="submit" class="btn btn-primary btn-lg w-100 mb-4">
                                    <span class="btn-text">Create Account</span>
                                    <div class="btn-loader d-none">
                                        <div class="spinner-border spinner-border-sm" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </div>
                                </button>
                                
                                <div class="text-center">
                                    <p class="text-muted mb-0">
                                        Already have an account? 
                                        <a href="/login" class="text-decoration-none">Sign in</a>
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Password toggle functionality
            const togglePassword = document.getElementById('togglePassword');
            const toggleConfirmPassword = document.getElementById('toggleConfirmPassword');
            const passwordInput = document.getElementById('password');
            const confirmPasswordInput = document.getElementById('confirmPassword');
            
            function setupPasswordToggle(toggleBtn, input) {
                if (toggleBtn && input) {
                    toggleBtn.addEventListener('click', function() {
                        const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
                        input.setAttribute('type', type);
                        
                        const icon = this.querySelector('i');
                        icon.classList.toggle('fa-eye');
                        icon.classList.toggle('fa-eye-slash');
                    });
                }
            }
            
            setupPasswordToggle(togglePassword, passwordInput);
            setupPasswordToggle(toggleConfirmPassword, confirmPasswordInput);
            
            // Password strength indicator
            const passwordStrength = document.getElementById('passwordStrength');
            const strengthBar = document.getElementById('strengthBar');
            const strengthText = document.getElementById('strengthText');
            
            function checkPasswordStrength(password) {
                let strength = 0;
                let feedback = '';
                
                if (password.length >= 8) strength += 1;
                if (/[a-z]/.test(password)) strength += 1;
                if (/[A-Z]/.test(password)) strength += 1;
                if (/[0-9]/.test(password)) strength += 1;
                if (/[^A-Za-z0-9]/.test(password)) strength += 1;
                
                strengthBar.className = 'strength-bar';
                strengthText.className = 'strength-text';
                
                switch (strength) {
                    case 0:
                    case 1:
                        strengthBar.classList.add('weak');
                        strengthText.classList.add('weak');
                        feedback = 'Weak password';
                        break;
                    case 2:
                        strengthBar