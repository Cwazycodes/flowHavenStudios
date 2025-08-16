<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flow Haven Studios</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" type="image/jpeg" href="/assets/images/favicon.jpeg">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
<div class="bg-gray-900">
<header id="main-navbar" class="fixed inset-x-0 top-0 z-50 transition-colors duration-300">
    <nav aria-label="Global" class="flex items-center justify-between p-4 sm:p-6 lg:px-8">
      <div class="flex lg:flex-1">
        <a href="/" class="-m-1.5 p-1.5">
          <span class="sr-only">Flow Haven Studios</span>
          <img src="/assets/images/flowHavenTransparent.png" alt="" class="h-6 sm:h-8 w-auto" />
        </a>
      </div>
      
      <!-- Mobile menu button - improved touch target -->
      <div class="flex lg:hidden">
        <button type="button" onclick="toggleMobileMenu()" 
                class="-m-2.5 inline-flex items-center justify-center rounded-md p-3 text-gray-400 hover:bg-gray-700 transition-colors">
          <span class="sr-only">Open main menu</span>
          <svg id="menu-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" 
               class="size-6 transition-transform duration-200">
            <path d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
          <svg id="close-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" 
               class="size-6 transition-transform duration-200 hidden">
            <path d="M6 18L18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
        </button>
      </div>
      
      <!-- Desktop navigation -->
      <div class="hidden lg:flex lg:gap-x-8 xl:gap-x-12">
        <a href="/" class="text-sm xl:text-base font-quicksand transition-colors duration-200 text-[#845d45] hover:text-white py-2">home</a>
        <a href="/book" class="text-sm xl:text-base font-quicksand transition-colors duration-200 text-[#845d45] hover:text-white py-2">book</a>
        <a href="/instructors" class="text-sm xl:text-base font-quicksand transition-colors duration-200 text-[#845d45] hover:text-white py-2">instructors</a>
        <a href="/faq" class="text-sm xl:text-base font-quicksand transition-colors duration-200 text-[#845d45] hover:text-white py-2">faq</a>
      </div>
      
      <!-- Desktop login -->
      <div class="hidden lg:flex lg:flex-1 lg:justify-end">
        <a href="#" onclick="openPasswordModal()" 
           class="text-sm xl:text-base font-quicksand transition-colors duration-200 text-[#845d45] hover:text-white py-2">
          login <span aria-hidden="true">&rarr;</span>
        </a>
      </div>
    </nav>
</header>

<!-- Improved Mobile Menu -->
<div id="mobile-menu" class="lg:hidden fixed inset-0 z-50 transform translate-x-full transition-transform duration-300 ease-in-out">
  <!-- Backdrop -->
  <div class="absolute inset-0 bg-black bg-opacity-50" onclick="toggleMobileMenu()"></div>
  
  <!-- Menu Panel -->
  <div class="absolute right-0 top-0 h-full w-80 max-w-full bg-[#e8d7c3] shadow-xl">
    <div class="flex flex-col h-full">
      <!-- Header -->
      <div class="flex items-center justify-between p-4 border-b border-[#845d45]/20">
        <a href="/" class="-m-1.5 p-1.5">
          <img src="/assets/images/flowHavenTransparent.png" alt="FlowHaven" class="h-8 w-auto" />
        </a>
        <button type="button" onclick="toggleMobileMenu()" 
                class="rounded-md p-2 text-gray-600 hover:bg-gray-200 transition-colors">
          <span class="sr-only">Close menu</span>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="h-6 w-6">
            <path d="M6 18L18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
        </button>
      </div>

      <!-- Navigation Links -->
      <div class="flex-1 p-4 space-y-2">
        <a href="/" class="block rounded-lg px-4 py-3 text-lg font-quicksand text-[#2b2a24] hover:bg-[#845d45] hover:text-white transition-colors">home</a>
        <a href="/book" class="block rounded-lg px-4 py-3 text-lg font-quicksand text-[#2b2a24] hover:bg-[#845d45] hover:text-white transition-colors">book</a>
        <a href="/instructors" class="block rounded-lg px-4 py-3 text-lg font-quicksand text-[#2b2a24] hover:bg-[#845d45] hover:text-white transition-colors">instructors</a>
        <a href="/faq" class="block rounded-lg px-4 py-3 text-lg font-quicksand text-[#2b2a24] hover:bg-[#845d45] hover:text-white transition-colors">faq</a>
        
        <!-- Mobile-only admin link -->
        <div class="pt-4 border-t border-[#845d45]/20">
          <a href="#" onclick="openPasswordModal(); toggleMobileMenu();" 
             class="block rounded-lg px-4 py-3 text-lg font-quicksand text-[#2b2a24] hover:bg-[#845d45] hover:text-white transition-colors">admin login</a>
        </div>
      </div>
      
      <!-- Footer info -->
      <div class="p-4 border-t border-[#845d45]/20 text-center">
        <p class="text-sm text-[#845d45] font-quicksand">find your flow</p>
      </div>
    </div>
  </div>
</div>

<!-- Responsive Password Modal -->
<div id="passwordModal" class="fixed inset-0 z-[60] hidden">
    <!-- Backdrop -->
    <div class="fixed inset-0 bg-black bg-opacity-50 modal-backdrop" onclick="closePasswordModal()"></div>
    
    <!-- Modal Content -->
    <div class="fixed inset-0 flex items-center justify-center p-4">
        <div class="bg-[#f2e9dc] rounded-lg shadow-xl max-w-md w-full mx-4">
            <!-- Modal Header -->
            <div class="bg-[#e8d7c3] flex justify-between items-center p-4 sm:p-6 border-b rounded-t-lg">
                <h2 class="text-xl sm:text-2xl font-semibold text-[#2b2a24] font-quicksand">admin access</h2>
                <button onclick="closePasswordModal()" 
                        class="text-gray-400 hover:text-gray-600 p-2 rounded-full hover:bg-gray-200 transition-colors">
                    <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <!-- Modal Body -->
            <div class="p-4 sm:p-6">
                <!-- Error/Success Messages -->
                <div id="passwordMessage" class="hidden mb-4 p-3 rounded-md text-sm"></div>

                <!-- Password Form -->
                <form id="passwordForm" class="space-y-4">
                    <div>
                        <label for="adminPassword" class="block text-sm font-medium text-gray-700 font-quicksand mb-2">enter admin password</label>
                        <input type="password" id="adminPassword" name="password" required 
                               class="block w-full px-3 py-3 sm:py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-[#845d45] focus:border-[#845d45] font-quicksand text-base sm:text-sm"
                               placeholder="Password">
                    </div>
                    <button type="submit" 
                            class="w-full bg-[#845d45] text-white py-3 sm:py-2 px-4 rounded-md hover:bg-[#6e4635] focus:outline-none focus:ring-2 focus:ring-[#845d45] focus:ring-offset-2 font-quicksand font-medium text-base transition-colors">
                        access dashboard
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>


</body>
</html>