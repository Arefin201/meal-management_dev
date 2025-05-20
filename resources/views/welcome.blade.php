<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- SEO Meta Tags -->
    <title>MealHub | Automated Meal Management System & Tracking Solution</title>
    <meta name="description" content="Top-rated Meal Management System for perfect meal tracking, cost control, and member management. Ideal meal solution for communities, offices, and shared living spaces. Start your free trial today!">
    <meta name="keywords" content="meal management, meal system, meal solution, meal tracking software, meal cost management, meal planning system, community meal management, automated meal tracking">
    <meta name="robots" content="index, follow">
    <meta property="og:title" content="MealHub | #1 Meal Management Solution">
    <meta property="og:description" content="Advanced meal management system for perfect food cost control and member tracking">
    <meta property="og:type" content="website">
    
    <!-- Fonts & Styling -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Structured Data -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "SoftwareApplication",
        "name": "MealHub",
        "applicationCategory": "BusinessApplication",
        "operatingSystem": "Web",
        "aggregateRating": {
            "@type": "AggregateRating",
            "ratingValue": "4.8",
            "reviewCount": "150"
        }
    }
    </script>
</head>

<body class="bg-gradient-to-br from-gray-50 to-white">
    <!-- Modern Navigation -->
    <nav class="bg-white/80 backdrop-blur-md shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <a href="/" class="text-2xl font-bold text-[#FF2D20] hover:text-[#E6261A] transition">
                    <span class="bg-[#FF2D20] text-white px-3 py-1 rounded-md">Meal</span>Hub
                </a>
                <div class="flex items-center space-x-4">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="px-4 py-2 text-gray-600 hover:text-[#FF2D20] transition font-medium">
                                Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="px-4 py-2 text-gray-600 hover:text-[#FF2D20] transition font-medium">
                                Login
                            </a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="px-6 py-2 bg-[#FF2D20] text-white rounded-full hover:bg-[#E6261A] transition transform hover:scale-105 shadow-lg">
                                    Start Free Trial
                                </a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <main class="flex-grow">
        <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
            <div class="text-center">
                <h1 class="text-4xl font-bold text-gray-900 sm:text-5xl md:text-6xl mb-6 leading-tight">
                    Revolutionize Your <span class="text-[#FF2D20]">Meal Management</span><br> with Smart Automation
                </h1>
                <p class="mt-4 max-w-2xl mx-auto text-xl text-gray-600">
                    The ultimate meal system solution for accurate tracking, cost control, and member management
                </p>
                <div class="mt-8 flex flex-col sm:flex-row justify-center gap-4">
                    <a href="{{ route('register') }}" class="px-8 py-4 bg-[#FF2D20] text-white rounded-full hover:bg-[#E6261A] transition transform hover:scale-105 text-lg font-semibold shadow-xl">
                        Start Free Trial →
                    </a>
                </div>
                
                <!-- Trust Badges -->
                <div class="mt-12 flex flex-wrap justify-center items-center gap-8 opacity-75">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-[#FF2D20]" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <span class="ml-2 text-gray-600">4.9/5 (150+ Reviews)</span>
                    </div>
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-[#FF2D20]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                        <span class="ml-2 text-gray-600">SOC 2 Certified</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section id="features" class="py-20 bg-white/50 backdrop-blur-lg">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-3xl font-bold text-gray-900 mb-4">
                        Everything You Need in a Meal Management Solution
                    </h2>
                    <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                        Comprehensive features designed to simplify meal tracking, cost management, and team coordination
                    </p>
                </div>

                <!-- Enhanced Feature Grid -->
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Feature 1 -->
                    <div class="p-8 bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300">
                        <div class="w-12 h-12 bg-[#FF2D20]/10 rounded-lg flex items-center justify-center mb-6">
                            <svg class="w-6 h-6 text-[#FF2D20]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold mb-4">Automated Meal Tracking</h3>
                        <p class="text-gray-600">Real-time meal system tracking with intelligent pattern recognition and predictive analytics</p>
                    </div>

                    <!-- Feature 2 -->
                    <div class="p-8 bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300">
                        <div class="w-12 h-12 bg-[#FF2D20]/10 rounded-lg flex items-center justify-center mb-6">
                            <svg class="w-6 h-6 text-[#FF2D20]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold mb-4">Cost Optimization</h3>
                        <p class="text-gray-600">Smart meal solution for reducing food waste and optimizing grocery budgets</p>
                    </div>

                    <!-- Additional Features... -->
                </div>
            </div>
        </section>

        <!-- Pricing Section -->
        <section class="py-20 bg-gradient-to-br from-[#FF2D20]/5 to-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-3xl font-bold text-gray-900 mb-4">
                        Flexible Meal Solution Plans
                    </h2>
                    <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                        Choose the perfect meal management system package for your organization's needs
                    </p>
                </div>

                <!-- Pricing Cards -->
                <div class="grid md:grid-cols-2 gap-8">
                    <!-- Pro Plan -->
                    <div class="relative bg-white rounded-2xl shadow-xl overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-r from-[#FF2D20] to-[#E6261A] opacity-5"></div>
                        <div class="p-8">
                            <h3 class="text-2xl font-bold text-[#FF2D20] mb-2">Pro Meal System</h3>
                            <div class="text-4xl font-bold mb-4">$14.99<span class="text-lg text-gray-500">/month</span></div>
                            <ul class="space-y-4 mb-8">
                                <li class="flex items-center">
                                    <svg class="w-5 h-5 text-[#FF2D20] mr-2" fill="currentColor" viewBox="0 0 20 20"><path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/></svg>
                                    Unlimited meal tracking
                                </li>
                                <!-- More features... -->
                            </ul>
                            <a href="{{ route('register') }}" class="w-full block text-center px-6 py-3 bg-gradient-to-r from-[#FF2D20] to-[#E6261A] text-white rounded-lg hover:opacity-90 transition">
                                Start Pro Trial
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Enhanced Footer -->
    <footer class="bg-gray-900 text-white pt-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-5 gap-8 pb-12">
                <!-- Company Info -->
                <div class="md:col-span-2">
                    <h4 class="text-lg font-semibold mb-4">Meal Management Experts</h4>
                    <p class="text-gray-400 text-sm leading-relaxed">
                        Leading provider of innovative meal system solutions since 2023. Trusted by 500+ communities worldwide for perfect meal management and cost control.
                    </p>
                </div>

                <!-- Quick Links -->
                <div>
                    <h4 class="text-lg font-semibold mb-4">Solutions</h4>
                    <ul class="space-y-2 text-sm text-gray-400">
                        <li><a href="/meal-tracking" class="hover:text-[#FF2D20] transition">Meal Tracking System</a></li>
                        <li><a href="/cost-management" class="hover:text-[#FF2D20] transition">Cost Management</a></li>
                        <!-- More links... -->
                    </ul>
                </div>

                <!-- Legal -->
                <div>
                    <h4 class="text-lg font-semibold mb-4">Legal</h4>
                    <ul class="space-y-2 text-sm text-gray-400">
                        <li><a href="/privacy" class="hover:text-[#FF2D20] transition">Privacy Policy</a></li>
                        <!-- More links... -->
                    </ul>
                </div>

                <!-- Contact -->
                <div>
                    <h4 class="text-lg font-semibold mb-4">Contact</h4>
                    <ul class="space-y-2 text-sm text-gray-400">
                        <li>support@mealhub.com</li>
                        <li>1-800-MEALHUB</li>
                    </ul>
                </div>
            </div>
            
            <!-- Copyright -->
            <div class="border-t border-gray-800 py-8 text-center text-gray-400 text-sm">
                <p>&copy; 2023 MealHub. All rights reserved. Proudly serving meal management solutions worldwide.</p>
            </div>
        </div>
    </footer>
</body>
</html>