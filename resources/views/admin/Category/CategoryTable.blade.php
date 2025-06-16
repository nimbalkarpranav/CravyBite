<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern FoodMaster Admin</title>
    <!-- Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#4F46E5',
                        secondary: '#10B981',
                        dark: '#1F2937',
                        light: '#F9FAFB'
                    },
                    animation: {
                        'fade-in': 'fadeIn 0.5s ease-out',
                        'slide-in': 'slideIn 0.6s ease-out',
                        'pulse-slow': 'pulse 4s cubic-bezier(0.4, 0, 0.6, 1) infinite'
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0' },
                            '100%': { opacity: '1' }
                        },
                        slideIn: {
                            '0%': { transform: 'translateY(20px)', opacity: '0' },
                            '100%': { transform: 'translateY(0)', opacity: '1' }
                        }
                    }
                }
            }
        }
    </script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f0f4ff 0%, #e6f7ff 100%);
            min-height: 100vh;
        }

        .admin-card {
            transition: all 0.3s ease;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            border-radius: 16px;
            overflow: hidden;
            background: rgba(255, 255, 255, 0.92);
            backdrop-filter: blur(10px);
        }

        .admin-card:hover {
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.12);
            transform: translateY(-5px);
        }

        .card-header {
            background: linear-gradient(135deg, #4F46E5 0%, #7C3AED 100%);
            border-bottom: 1px solid rgba(255, 255, 255, 0.15);
        }

        .sidebar {
            background: linear-gradient(180deg, #1F2937 0%, #111827 100%);
            transition: all 0.4s ease;
        }

        .nav-link {
            transition: all 0.3s ease;
        }

        .nav-link:hover, .nav-link.active {
            background: rgba(79, 70, 229, 0.2);
            transform: translateX(5px);
        }

        .form-control:focus {
            border-color: #4F46E5;
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.2);
        }

        .btn-success {
            background: linear-gradient(135deg, #10B981 0%, #059669 100%);
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px rgba(16, 185, 129, 0.3);
        }

        .btn-success:hover {
            transform: translateY(-3px);
            box-shadow: 0 7px 14px rgba(16, 185, 129, 0.4);
        }

        .stat-card {
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
        }

        .upload-area:hover {
            border-color: #4F46E5;
            background: rgba(79, 70, 229, 0.05);
        }

        .pulse {
            animation: pulse-slow 2s infinite;
        }
    </style>
</head>
<body class="flex">
    <!-- Sidebar -->
    <div class="sidebar w-64 min-h-screen fixed top-0 left-0 z-30 hidden md:block">
        <div class="p-6 border-b border-gray-800">
            <h1 class="text-white text-2xl font-bold flex items-center">
                <i class="fas fa-utensils text-secondary mr-3"></i>
                FoodMaster
                <span class="text-xs bg-secondary text-white px-2 py-1 rounded ml-2">ADMIN</span>
            </h1>
            <p class="text-gray-400 text-sm mt-2">Restaurant Management</p>
        </div>

        <div class="py-6">
            <nav>
                <a href="#" class="nav-link block text-white py-3 px-6 flex items-center active">
                    <i class="fas fa-tachometer-alt mr-4"></i>
                    Dashboard
                </a>
                <a href="#" class="nav-link block text-gray-300 hover:text-white py-3 px-6 flex items-center">
                    <i class="fas fa-list mr-4"></i>
                    Categories
                </a>
                <a href="#" class="nav-link block text-gray-300 hover:text-white py-3 px-6 flex items-center">
                    <i class="fas fa-hamburger mr-4"></i>
                    Menu Items
                </a>
                <a href="#" class="nav-link block text-gray-300 hover:text-white py-3 px-6 flex items-center">
                    <i class="fas fa-store mr-4"></i>
                    Restaurants
                </a>
                <a href="#" class="nav-link block text-gray-300 hover:text-white py-3 px-6 flex items-center">
                    <i class="fas fa-users mr-4"></i>
                    Customers
                </a>
                <a href="#" class="nav-link block text-gray-300 hover:text-white py-3 px-6 flex items-center">
                    <i class="fas fa-cog mr-4"></i>
                    Settings
                </a>
            </nav>
        </div>
    </div>

    <!-- Main Content -->
    <div class="flex-1 min-h-screen ml-0 md:ml-64 transition-all duration-300">
        <!-- Top Navigation -->
        <div class="bg-white shadow-sm">
            <div class="flex justify-between items-center px-6 py-4">
                <div class="flex items-center">
                    <button class="text-gray-600 focus:outline-none md:hidden">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                    <h2 class="text-xl font-semibold text-gray-800 ml-4">Add Food Category</h2>
                </div>

                <div class="flex items-center space-x-6">
                    <div class="relative">
                        <button class="text-gray-500 hover:text-gray-700 relative">
                            <i class="fas fa-bell text-xl"></i>
                            <span class="absolute top-0 right-0 bg-red-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">3</span>
                        </button>
                    </div>

                    <div class="flex items-center">
                        <div class="mr-3">
                            <img src="https://ui-avatars.com/api/?name=Admin+User&background=4F46E5&color=fff" alt="Admin" class="w-10 h-10 rounded-full">
                        </div>
                        <div>
                            <p class="text-gray-800 font-medium">Admin User</p>
                            <p class="text-gray-500 text-sm">admin@foodmaster.com</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="px-6 py-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                <div class="stat-card bg-white rounded-xl shadow-md p-5 animate-fade-in">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-gray-500 text-sm">Total Categories</p>
                            <h3 class="text-2xl font-bold text-gray-800 mt-1">42</h3>
                        </div>
                        <div class="bg-indigo-100 p-3 rounded-full">
                            <i class="fas fa-list text-primary text-xl"></i>
                        </div>
                    </div>
                </div>

                <div class="stat-card bg-white rounded-xl shadow-md p-5 animate-fade-in">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-gray-500 text-sm">Active Restaurants</p>
                            <h3 class="text-2xl font-bold text-gray-800 mt-1">28</h3>
                        </div>
                        <div class="bg-green-100 p-3 rounded-full">
                            <i class="fas fa-store text-secondary text-xl"></i>
                        </div>
                    </div>
                </div>

                <div class="stat-card bg-white rounded-xl shadow-md p-5 animate-fade-in">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-gray-500 text-sm">Pending Items</p>
                            <h3 class="text-2xl font-bold text-gray-800 mt-1">7</h3>
                        </div>
                        <div class="bg-yellow-100 p-3 rounded-full">
                            <i class="fas fa-clock text-yellow-500 text-xl"></i>
                        </div>
                    </div>
                </div>

                <div class="stat-card bg-white rounded-xl shadow-md p-5 animate-fade-in">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-gray-500 text-sm">New Customers</p>
                            <h3 class="text-2xl font-bold text-gray-800 mt-1">124</h3>
                        </div>
                        <div class="bg-blue-100 p-3 rounded-full">
                            <i class="fas fa-users text-blue-500 text-xl"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Form Card -->
            <div class="admin-card bg-white animate-slide-in">
                <div class="card-header px-6 py-5">
                    <h4 class="text-white text-xl font-semibold flex items-center">
                        <i class="fas fa-plus-circle mr-3"></i>
                        Add New Food Category
                    </h4>
                </div>

                <div class="card-body p-6">
                    <form>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div class="animate-fade-in" style="animation-delay: 0.1s;">
                                <label class="block text-gray-700 font-medium mb-2">
                                    <i class="fas fa-store text-primary mr-2"></i>
                                    Select Restaurant
                                </label>
                                <select class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition">
                                    <option disabled selected>Choose Restaurant</option>
                                    <option>Gourmet Paradise</option>
                                    <option>Seafood Haven</option>
                                    <option>Veggie Delight</option>
                                </select>
                            </div>

                            <div class="animate-fade-in" style="animation-delay: 0.2s;">
                                <label class="block text-gray-700 font-medium mb-2">
                                    <i class="fas fa-tag text-primary mr-2"></i>
                                    Category Name
                                </label>
                                <input type="text" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition" placeholder="e.g. Appetizers, Desserts">
                            </div>
                        </div>

                        <div class="mb-6 animate-fade-in" style="animation-delay: 0.3s;">
                            <label class="block text-gray-700 font-medium mb-2">
                                <i class="fas fa-image text-primary mr-2"></i>
                                Category Image
                            </label>
                            <div class="border-2 border-dashed border-gray-300 rounded-xl p-8 text-center cursor-pointer transition hover:border-primary hover:bg-blue-50">
                                <i class="fas fa-cloud-upload-alt text-3xl text-gray-400 mb-3 transition"></i>
                                <p class="text-gray-600 mb-1">Drag & drop your image here</p>
                                <p class="text-gray-500 text-sm">or click to browse (Max 2MB)</p>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div class="animate-fade-in" style="animation-delay: 0.4s;">
                                <label class="block text-gray-700 font-medium mb-2">
                                    <i class="fas fa-toggle-on text-primary mr-2"></i>
                                    Status
                                </label>
                                <select class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition">
                                    <option value="1" selected>Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>

                            <div class="flex items-end animate-fade-in" style="animation-delay: 0.5s;">
                                <button type="submit" class="btn-success w-full py-4 text-lg rounded-xl font-bold text-white flex items-center justify-center pulse">
                                    <i class="fas fa-plus-circle mr-2"></i>
                                    Add Category
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Animation for form elements
        document.addEventListener('DOMContentLoaded', function() {
            // Mobile sidebar toggle
            document.querySelector('.fa-bars').addEventListener('click', function() {
                document.querySelector('.sidebar').classList.toggle('hidden');
                document.querySelector('.sidebar').classList.toggle('md:block');
            });

            // Upload area interaction
            const uploadArea = document.querySelector('.border-dashed');
            uploadArea.addEventListener('click', function() {
                alert("File upload dialog would open here");
            });

            // Form submission animation
            const submitBtn = document.querySelector('.btn-success');
            submitBtn.addEventListener('click', function(e) {
                e.preventDefault();
                this.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i> Adding Category...';
                setTimeout(() => {
                    this.innerHTML = '<i class="fas fa-check mr-2"></i> Added Successfully!';
                    this.classList.remove('pulse');
                    this.classList.add('bg-green-600');
                }, 1500);
            });
        });
    </script>
</body>
</html>
