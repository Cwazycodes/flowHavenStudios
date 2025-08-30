

<!-- Updated Header with Mindbody Login -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flow Haven Studios</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" type="image/jpeg" href="/assets/images/favicon.jpeg">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Mindbody Widget Script -->
    <script src="https://widgets.mindbodyonline.com/javascripts/healcode.js" type="text/javascript"></script>
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
      
      <!-- Mobile menu button -->
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
        <a href="/pricing" class="text-sm xl:text-base font-quicksand transition-colors duration-200 text-[#845d45] hover:text-white py-2">pricing</a>
        <a href="/instructors" class="text-sm xl:text-base font-quicksand transition-colors duration-200 text-[#845d45] hover:text-white py-2">instructors</a>
        <a href="/faq" class="text-sm xl:text-base font-quicksand transition-colors duration-200 text-[#845d45] hover:text-white py-2">faq</a>
      </div>
      
      <!-- Desktop Mindbody Login/Register -->
      <div class="hidden lg:flex lg:flex-1 lg:justify-end">
        <div class="mindbody-login-container">
          <healcode-widget 
            data-version="0.2" 
            data-link-class="mindbody-login-btn" 
            data-site-id="128729" 
            data-mb-site-id="5747508"  
            data-bw-identity-site="true" 
            data-type="account-link" 
            data-inner-html="my account"
            data-show-first-name="true"
            data-logged-in-inner-html="{{first_name}}"
            data-show-account-link="true" />
        </div>
      </div>
    </nav>
</header>

<!-- Updated Mobile Menu -->
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
        <a href="/pricing" class="block rounded-lg px-4 py-3 text-lg font-quicksand text-[#2b2a24] hover:bg-[#845d45] hover:text-white transition-colors">pricing</a>
        <a href="/instructors" class="block rounded-lg px-4 py-3 text-lg font-quicksand text-[#2b2a24] hover:bg-[#845d45] hover:text-white transition-colors">instructors</a>
        <a href="/faq" class="block rounded-lg px-4 py-3 text-lg font-quicksand text-[#2b2a24] hover:bg-[#845d45] hover:text-white transition-colors">faq</a>
        
        <!-- Mobile Mindbody Login/Register -->
        <div class="pt-4 border-t border-[#845d45]/20">
          <div class="mindbody-login-container mobile">
            <healcode-widget 
              data-version="0.2" 
              data-link-class="mindbody-login-btn-mobile" 
              data-site-id="128729" 
              data-mb-site-id="5747508"  
              data-bw-identity-site="true" 
              data-type="account-link" 
              data-inner-html="my account"
              data-show-first-name="true"
              data-logged-in-inner-html="{{first_name}}"
              data-show-account-link="true" />
          </div>
        </div>
      </div>
      
      <!-- Footer info -->
      <div class="p-4 border-t border-[#845d45]/20 text-center">
        <p class="text-sm text-[#845d45] font-quicksand">find your flow</p>
      </div>
    </div>
  </div>
</div>

<style>
/* Mindbody Login Button Styling */
.mindbody-login-container {
  display: flex;
  align-items: center;
}

/* Desktop Login Button Styling - Logged Out State */
.mindbody-login-btn,
.mindbody-login-btn:link,
.mindbody-login-btn:visited {
  color: #845d45 !important;
  text-decoration: none !important;
  font-family: 'Quicksand', sans-serif !important;
  font-weight: 500 !important;
  font-size: 0.875rem !important;
  padding: 0.5rem 0 !important;
  border: none !important;
  background: transparent !important;
  transition: color 0.2s ease !important;
  text-transform: lowercase !important;
}

.mindbody-login-btn:hover,
.mindbody-login-btn:focus {
  color: #ffffff !important;
}

.mindbody-login-btn:after {
  content: ' →';
  margin-left: 0.25rem;
}

/* Desktop Login Button Styling - Logged In State (showing first name) */
.mindbody-login-btn.logged-in,
.mindbody-login-btn.logged-in:link,
.mindbody-login-btn.logged-in:visited {
  color: #845d45 !important;
  text-decoration: none !important;
  font-family: 'Quicksand', sans-serif !important;
  font-weight: 600 !important;
  font-size: 0.875rem !important;
  padding: 0.5rem 0 !important;
  border: none !important;
  background: transparent !important;
  transition: color 0.2s ease !important;
  text-transform: capitalize !important;
  position: relative;
}

.mindbody-login-btn.logged-in:hover,
.mindbody-login-btn.logged-in:focus {
  color: #ffffff !important;
}

.mindbody-login-btn.logged-in:before {
  content: '👋 ';
  margin-right: 0.25rem;
}

.mindbody-login-btn.logged-in:after {
  content: ' ⚙️';
  margin-left: 0.25rem;
}

/* Mobile Login Button Styling - Logged Out State */
.mindbody-login-btn-mobile,
.mindbody-login-btn-mobile:link,
.mindbody-login-btn-mobile:visited {
  display: block !important;
  width: 100% !important;
  color: #2b2a24 !important;
  text-decoration: none !important;
  font-family: 'Quicksand', sans-serif !important;
  font-weight: 500 !important;
  font-size: 1.125rem !important;
  padding: 0.75rem 1rem !important;
  border: none !important;
  background: transparent !important;
  border-radius: 0.5rem !important;
  transition: all 0.2s ease !important;
  text-transform: lowercase !important;
  text-align: left !important;
}

.mindbody-login-btn-mobile:hover,
.mindbody-login-btn-mobile:focus {
  background-color: #845d45 !important;
  color: #ffffff !important;
}

/* Mobile Login Button Styling - Logged In State (showing first name) */
.mindbody-login-btn-mobile.logged-in,
.mindbody-login-btn-mobile.logged-in:link,
.mindbody-login-btn-mobile.logged-in:visited {
  display: block !important;
  width: 100% !important;
  color: #2b2a24 !important;
  text-decoration: none !important;
  font-family: 'Quicksand', sans-serif !important;
  font-weight: 600 !important;
  font-size: 1.125rem !important;
  padding: 0.75rem 1rem !important;
  border: none !important;
  background: transparent !important;
  border-radius: 0.5rem !important;
  transition: all 0.2s ease !important;
  text-transform: capitalize !important;
  text-align: left !important;
  position: relative;
}

.mindbody-login-btn-mobile.logged-in:hover,
.mindbody-login-btn-mobile.logged-in:focus {
  background-color: #845d45 !important;
  color: #ffffff !important;
}

.mindbody-login-btn-mobile.logged-in:before {
  content: '👋 ';
  margin-right: 0.25rem;
}

.mindbody-login-btn-mobile.logged-in:after {
  content: '';
  position: absolute;
  right: 1rem;
  top: 50%;
  transform: translateY(-50%);
  content: '⚙️';
}

/* Responsive adjustments */
@media (min-width: 1280px) {
  .mindbody-login-btn {
    font-size: 1rem !important;
  }
}

/* Remove any default Mindbody widget styling */
healcode-widget {
  display: block;
}

/* Ensure the widget integrates seamlessly */
.mindbody-login-container.mobile {
  width: 100%;
}

.mindbody-login-container.mobile healcode-widget {
  width: 100%;
  display: block;
}

/* Override any iframe styling if needed */
.mindbody-login-container iframe {
  border: none !important;
  background: transparent !important;
}
</style>

<script>
// Updated mobile menu functionality (removing password modal code)
function toggleMobileMenu() {
  const menu = document.getElementById('mobile-menu');
  const menuIcon = document.getElementById('menu-icon');
  const closeIcon = document.getElementById('close-icon');
  
  menu.classList.toggle('translate-x-full');
  
  // Toggle icons
  if (menu.classList.contains('translate-x-full')) {
    menuIcon.classList.remove('hidden');
    closeIcon.classList.add('hidden');
    document.body.style.overflow = 'auto';
  } else {
    menuIcon.classList.add('hidden');
    closeIcon.classList.remove('hidden');
    document.body.style.overflow = 'hidden';
  }
}

// Close mobile menu when clicking on links
document.querySelectorAll('#mobile-menu a').forEach(link => {
  link.addEventListener('click', () => {
    setTimeout(() => {
      const menu = document.getElementById('mobile-menu');
      if (menu) {
        menu.classList.add('translate-x-full');
        document.getElementById('menu-icon').classList.remove('hidden');
        document.getElementById('close-icon').classList.add('hidden');
        document.body.style.overflow = 'auto';
      }
    }, 100);
  });
});

// Navbar scroll functionality
const navbar = document.getElementById('main-navbar');

window.addEventListener('scroll', () => {
  if (window.scrollY > 10) {
    navbar.style.backgroundColor = '#e8d7c3';
    navbar.classList.add('bg-opacity-90', 'backdrop-blur-md');
  } else {
    navbar.style.backgroundColor = 'transparent';
    navbar.classList.remove('bg-opacity-90', 'backdrop-blur-md');
  }
});

// Initialize Mindbody widgets after page load
document.addEventListener('DOMContentLoaded', function() {
  // Ensure Mindbody widgets are properly initialized
  if (typeof HealCode !== 'undefined') {
    HealCode.init();
  }
});
</script>

</body>
</html>