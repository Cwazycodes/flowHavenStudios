<script>
   // Improved mobile menu functionality
   function toggleMobileMenu() {
    const menu = document.getElementById('mobile-menu');
    const menuIcon = document.getElementById('menu-icon');
    const closeIcon = document.getElementById('close-icon');
    
    menu.classList.toggle('translate-x-full');
    
    // Toggle icons
    if (menu.classList.contains('translate-x-full')) {
      menuIcon.classList.remove('hidden');
      closeIcon.classList.add('hidden');
    } else {
      menuIcon.classList.add('hidden');
      closeIcon.classList.remove('hidden');
    }
  }

  // Close mobile menu when clicking on a link
  document.querySelectorAll('#mobile-menu a').forEach(link => {
    link.addEventListener('click', () => {
      if (!link.getAttribute('onclick')) {
        toggleMobileMenu();
      }
    });
  });
  // navbar scroll functionality
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

  // mobile menu functionality
  function toggleMobileMenu() {
    const menu = document.getElementById('mobile-menu');
    menu.classList.toggle('hidden');
  }

  // password modal functionality
  function openPasswordModal() {
    const modal = document.getElementById('passwordModal');
    const body = document.body;
    
    // store current scroll position
    const scrollY = window.scrollY;
    body.setAttribute('data-scroll-y', scrollY);
    
    // show modal
    modal.classList.remove('hidden');
    
    // prevent body scroll but maintain position
    body.style.position = 'fixed';
    body.style.top = `-${scrollY}px`;
    body.style.width = '100%';
    body.style.overflow = 'hidden';
    
    // focus on password input
    setTimeout(() => {
      document.getElementById('adminPassword').focus();
    }, 100);
  }

  function closePasswordModal() {
    const modal = document.getElementById('passwordModal');
    const body = document.body;
    
    // get the stored scroll position
    const scrollY = body.getAttribute('data-scroll-y') || '0';
    
    // hide modal
    modal.classList.add('hidden');
    
    // restore body scroll
    body.style.position = '';
    body.style.top = '';
    body.style.width = '';
    body.style.overflow = '';
    
    // restore scroll position
    window.scrollTo(0, parseInt(scrollY));
    
    // clean up
    body.removeAttribute('data-scroll-y');
    
    // reset form and hide messages
    document.getElementById('passwordForm').reset();
    hidePasswordMessage();
  }

  function showPasswordMessage(message, isError = false) {
    const messageDiv = document.getElementById('passwordMessage');
    messageDiv.textContent = message;
    messageDiv.className = `mb-4 p-3 rounded-md font-quicksand ${isError ? 'bg-red-100 text-red-700 border border-red-300' : 'bg-green-100 text-green-700 border border-green-300'}`;
    messageDiv.classList.remove('hidden');
  }

  function hidePasswordMessage() {
    const passwordMessage = document.getElementById('passwordMessage');
    if (passwordMessage) {
      passwordMessage.classList.add('hidden');
    }
  }

  // handle password form submission
  document.addEventListener('DOMContentLoaded', function() {
    const passwordForm = document.getElementById('passwordForm');

    if (passwordForm) {
      passwordForm.addEventListener('submit', async function(e) {
        e.preventDefault();
        
        const formData = new FormData(this);
        
        try {
          const response = await fetch('/admin/login', {
            method: 'POST',
            body: formData
          });
          
          const result = await response.json();
          
          if (result.success) {
            showPasswordMessage('access granted! redirecting...', false);
            setTimeout(() => {
              window.location.href = '/admin/dashboard';
            }, 1500);
          } else {
            showPasswordMessage('incorrect password. please try again.', true);
            // clear the password field
            document.getElementById('adminPassword').value = '';
            document.getElementById('adminPassword').focus();
          }
        } catch (error) {
          showPasswordMessage('an error occurred. please try again.', true);
        }
      });
    }
  });

  // close modal on escape key
  document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
      closePasswordModal();
    }
  });

  // allow enter key to submit password
  document.addEventListener('keydown', function(e) {
    if (e.key === 'Enter' && document.getElementById('passwordModal').classList.contains('hidden') === false) {
      e.preventDefault();
      document.getElementById('passwordForm').dispatchEvent(new Event('submit'));
    }
  });

  // Flow Haven Studios - Responsive JavaScript Enhancements

document.addEventListener('DOMContentLoaded', function() {
  
  // ========================================
  // MOBILE DETECTION & OPTIMIZATION
  // ========================================
  
  const isMobile = window.innerWidth <= 768;
  const isTouch = 'ontouchstart' in window;
  
  // Prevent iOS zoom on form inputs
  if (isMobile) {
    const inputs = document.querySelectorAll('input, select, textarea');
    inputs.forEach(input => {
      input.style.fontSize = '16px';
    });
  }
  
  // ========================================
  // RESPONSIVE NAVIGATION
  // ========================================
  
  const mobileMenu = document.getElementById('mobile-menu');
  const menuToggle = document.querySelector('[onclick="toggleMobileMenu()"]');
  
  function toggleMobileMenu() {
    if (mobileMenu) {
      const isOpen = !mobileMenu.classList.contains('translate-x-full');
      
      if (isOpen) {
        mobileMenu.classList.add('translate-x-full');
        document.body.style.overflow = 'auto';
      } else {
        mobileMenu.classList.remove('translate-x-full');
        document.body.style.overflow = 'hidden';
      }
    }
  }
  
  // Close mobile menu when clicking on links
  if (mobileMenu) {
    mobileMenu.querySelectorAll('a').forEach(link => {
      link.addEventListener('click', (e) => {
        if (!link.getAttribute('onclick')) {
          setTimeout(() => {
            mobileMenu.classList.add('translate-x-full');
            document.body.style.overflow = 'auto';
          }, 100);
        }
      });
    });
  }
  
  // ========================================
  // RESPONSIVE MODALS
  // ========================================
  
  function enhanceModal(modalId) {
    const modal = document.getElementById(modalId);
    if (!modal) return;
    
    // Close on backdrop click
    modal.addEventListener('click', function(e) {
      if (e.target === modal) {
        closeModal(modalId);
      }
    });
    
    // Close on escape key
    document.addEventListener('keydown', function(e) {
      if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
        closeModal(modalId);
      }
    });
    
    // Focus management
    const focusableElements = modal.querySelectorAll(
      'button, input, select, textarea, [tabindex]:not([tabindex="-1"])'
    );
    
    if (focusableElements.length > 0) {
      const firstElement = focusableElements[0];
      const lastElement = focusableElements[focusableElements.length - 1];
      
      modal.addEventListener('keydown', function(e) {
        if (e.key === 'Tab') {
          if (e.shiftKey && document.activeElement === firstElement) {
            e.preventDefault();
            lastElement.focus();
          } else if (!e.shiftKey && document.activeElement === lastElement) {
            e.preventDefault();
            firstElement.focus();
          }
        }
      });
    }
  }
  
  function openModal(modalId) {
    const modal = document.getElementById(modalId);
    if (modal) {
      modal.classList.remove('hidden');
      document.body.style.overflow = 'hidden';
      
      // Focus first input
      setTimeout(() => {
        const firstInput = modal.querySelector('input, select, textarea');
        if (firstInput) firstInput.focus();
      }, 100);
    }
  }
  
  function closeModal(modalId) {
    const modal = document.getElementById(modalId);
    if (modal) {
      modal.classList.add('hidden');
      document.body.style.overflow = 'auto';
    }
  }
  
  // Enhance existing modals
  ['passwordModal', 'createSlotModal', 'editSlotModal'].forEach(enhanceModal);
  
  // ========================================
  // RESPONSIVE TABLES
  // ========================================
  
  function makeTablesResponsive() {
    const tables = document.querySelectorAll('table:not(.responsive-enhanced)');
    
    tables.forEach(table => {
      table.classList.add('responsive-enhanced');
      
      // Add horizontal scroll wrapper if not exists
      if (!table.parentElement.classList.contains('table-responsive')) {
        const wrapper = document.createElement('div');
        wrapper.className = 'table-responsive overflow-x-auto';
        table.parentNode.insertBefore(wrapper, table);
        wrapper.appendChild(table);
      }
      
      // Add data-label attributes for mobile stacking
      const headers = table.querySelectorAll('thead th');
      const rows = table.querySelectorAll('tbody tr');
      
      rows.forEach(row => {
        const cells = row.querySelectorAll('td');
        cells.forEach((cell, index) => {
          if (headers[index]) {
            cell.setAttribute('data-label', headers[index].textContent.trim());
          }
        });
      });
    });
  }
  
  // ========================================
  // FORM ENHANCEMENTS
  // ========================================
  
  function enhanceForms() {
    const forms = document.querySelectorAll('form');
    
    forms.forEach(form => {
      // Add loading states to submit buttons
      const submitBtn = form.querySelector('button[type="submit"], input[type="submit"]');
      
      if (submitBtn && !submitBtn.classList.contains('enhanced')) {
        submitBtn.classList.add('enhanced');
        
        form.addEventListener('submit', function() {
          submitBtn.disabled = true;
          
          // Add loading indicator if it doesn't exist
          if (!submitBtn.querySelector('.loading-indicator')) {
            const originalText = submitBtn.textContent;
            const loadingHTML = `
              <svg class="loading-indicator animate-spin -ml-1 mr-2 h-4 w-4 text-white inline" 
                   xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" 
                      d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
              </svg>
              Processing...
            `;
            submitBtn.innerHTML = loadingHTML;
          }
        });
      }
      
      // Enhanced validation
      const requiredFields = form.querySelectorAll('[required]');
      requiredFields.forEach(field => {
        field.addEventListener('blur', function() {
          validateField(field);
        });
        
        field.addEventListener('input', function() {
          if (field.classList.contains('error')) {
            validateField(field);
          }
        });
      });
    });
  }
  
  function validateField(field) {
    const isValid = field.checkValidity();
    
    if (isValid) {
      field.classList.remove('error', 'border-red-300');
      field.classList.add('border-green-300');
      removeErrorMessage(field);
    } else {
      field.classList.add('error', 'border-red-300');
      field.classList.remove('border-green-300');
      showErrorMessage(field);
    }
  }
  
  function showErrorMessage(field) {
    removeErrorMessage(field); // Remove existing message
    
    const errorDiv = document.createElement('div');
    errorDiv.className = 'error-message text-red-600 text-xs mt-1';
    errorDiv.textContent = field.validationMessage;
    
    field.parentNode.insertBefore(errorDiv, field.nextSibling);
  }
  
  function removeErrorMessage(field) {
    const existingError = field.parentNode.querySelector('.error-message');
    if (existingError) {
      existingError.remove();
    }
  }
  
  // ========================================
  // SCROLL ENHANCEMENTS
  // ========================================
  
  function enhanceScrolling() {
    // Smooth scroll for anchor links
    const anchorLinks = document.querySelectorAll('a[href^="#"]');
    anchorLinks.forEach(link => {
      link.addEventListener('click', function(e) {
        const href = this.getAttribute('href');
        if (href === '#') return;
        
        const target = document.querySelector(href);
        if (target) {
          e.preventDefault();
          target.scrollIntoView({ behavior: 'smooth' });
        }
      });
    });
    
    // Intersection Observer for animations
    const observerOptions = {
      threshold: 0.1,
      rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('in-view');
        }
      });
    }, observerOptions);
    
    // Observe elements that should animate in
    const animateElements = document.querySelectorAll('.animate-on-scroll');
    animateElements.forEach(el => observer.observe(el));
  }
  
  // ========================================
  // TOUCH ENHANCEMENTS
  // ========================================
  
  function enhanceTouchInteractions() {
    if (!isTouch) return;
    
    // Add touch feedback to interactive elements
    const touchElements = document.querySelectorAll('button, .btn, [role="button"]');
    
    touchElements.forEach(element => {
      element.addEventListener('touchstart', function() {
        this.classList.add('touch-active');
      });
      
      element.addEventListener('touchend', function() {
        setTimeout(() => {
          this.classList.remove('touch-active');
        }, 150);
      });
    });
    
    // Prevent double-tap zoom on buttons
    touchElements.forEach(element => {
      element.addEventListener('touchend', function(e) {
        e.preventDefault();
        this.click();
      });
    });
  }
  
  // ========================================
  // RESIZE HANDLERS
  // ========================================
  
  let resizeTimeout;
  window.addEventListener('resize', function() {
    clearTimeout(resizeTimeout);
    resizeTimeout = setTimeout(() => {
      // Re-run responsive enhancements on significant size changes
      const newIsMobile = window.innerWidth <= 768;
      if (newIsMobile !== isMobile) {
        location.reload(); // Simple approach for major breakpoint changes
      }
    }, 250);
  });
  
  // ========================================
  // ACCESSIBILITY ENHANCEMENTS
  // ========================================
  
  function enhanceAccessibility() {
    // Skip to main content link
    const skipLink = document.createElement('a');
    skipLink.href = '#main-content';
    skipLink.textContent = 'Skip to main content';
    skipLink.className = 'sr-only focus:not-sr-only focus:absolute focus:top-0 focus:left-0 bg-brand-primary text-white p-2 z-50';
    document.body.insertBefore(skipLink, document.body.firstChild);
    
    // Add main content landmark if it doesn't exist
    if (!document.getElementById('main-content')) {
      const main = document.querySelector('main, .main, section');
      if (main) {
        main.id = 'main-content';
        main.setAttribute('role', 'main');
      }
    }
    
    // Enhance focus visibility
    document.addEventListener('keydown', function(e) {
      if (e.key === 'Tab') {
        document.body.classList.add('keyboard-navigation');
      }
    });
    
    document.addEventListener('mousedown', function() {
      document.body.classList.remove('keyboard-navigation');
    });
  }
  
  // ========================================
  // PERFORMANCE OPTIMIZATIONS
  // ========================================
  
  function optimizePerformance() {
    // Lazy load images
    const images = document.querySelectorAll('img[data-src]');
    const imageObserver = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          const img = entry.target;
          img.src = img.dataset.src;
          img.removeAttribute('data-src');
          imageObserver.unobserve(img);
        }
      });
    });
    
    images.forEach(img => imageObserver.observe(img));
    
    // Debounce scroll events
    let scrollTimeout;
    let isScrolling = false;
    
    window.addEventListener('scroll', function() {
      if (!isScrolling) {
        requestAnimationFrame(() => {
          // Scroll-based animations here
          isScrolling = false;
        });
        isScrolling = true;
      }
    });
  }
  
  // ========================================
  // INITIALIZATION
  // ========================================
  
  // Initialize all enhancements
  makeTablesResponsive();
  enhanceForms();
  enhanceScrolling();
  enhanceTouchInteractions();
  enhanceAccessibility();
  optimizePerformance();
  
  // Global functions for legacy code compatibility
  window.toggleMobileMenu = toggleMobileMenu;
  window.openModal = openModal;
  window.closeModal = closeModal;
  
  // Admin dashboard specific functions
  window.openCreateSlotModal = () => openModal('createSlotModal');
  window.closeCreateSlotModal = () => closeModal('createSlotModal');
  window.openEditSlotModal = function(slot) {
    // Populate edit form
    const modal = document.getElementById('editSlotModal');
    if (modal && slot) {
      const datetime = new Date(slot.slot_time);
      
      document.getElementById('editSlotId').value = slot.id;
      document.getElementById('editSlotDate').value = datetime.toISOString().split('T')[0];
      document.getElementById('editSlotTime').value = datetime.toTimeString().substr(0,5);
      document.getElementById('editSlotCapacity').value = slot.capacity;
    }
    openModal('editSlotModal');
  };
  window.closeEditSlotModal = () => closeModal('editSlotModal');
  
  // Password modal functions
  window.openPasswordModal = () => openModal('passwordModal');
  window.closePasswordModal = () => closeModal('passwordModal');
  
  console.log('🎯 Flow Haven Studios: Responsive enhancements loaded');
});

// ========================================
// CSS CLASSES FOR TOUCH FEEDBACK
// ========================================

// Add this to your CSS:
/*
.touch-active {
  transform: scale(0.95);
  opacity: 0.8;
  transition: transform 0.1s, opacity 0.1s;
}

.keyboard-navigation *:focus {
  outline: 2px solid #845d45 !important;
  outline-offset: 2px !important;
}

.animate-on-scroll {
  opacity: 0;
  transform: translateY(20px);
  transition: opacity 0.6s, transform 0.6s;
}

.animate-on-scroll.in-view {
  opacity: 1;
  transform: translateY(0);
}
*/
</script>

<style>
  .btn-custom {
    background-color: #fed783;
    color: #2b2a24;
    transition: background-color 0.3s ease, color 0.3s ease;
  }

  .btn-custom:hover {
    background-color: #845d45;
    color: #fed783;
  }
</style>

<style>
    .font-quicksand {
    font-family: 'Quicksand', sans-serif;
  }
  .modal-backdrop {
    backdrop-filter: blur(8px);
  }
    /* Ensure mobile menu is initially hidden */
    #mobile-menu.translate-x-full {
    transform: translateX(100%);
  }
  .btn-brand {
    background-color: #fed783;
    color: #845d45;
    transition: background-color 0.3s ease, color 0.3s ease;
  }

  .btn-brand:hover {
    background-color: #845d45;
    color: #fed783;
  }
  /* ========================================
   FLOW HAVEN STUDIOS - RESPONSIVE IMPROVEMENTS
   ======================================== */

/* Base responsive utilities */
.font-quicksand {
  font-family: 'Quicksand', sans-serif;
}

/* ========================================
   TYPOGRAPHY IMPROVEMENTS
   ======================================== */
   
/* Responsive text scaling */
.text-responsive-xs { font-size: 0.75rem; line-height: 1rem; }
.text-responsive-sm { font-size: 0.875rem; line-height: 1.25rem; }
.text-responsive-base { font-size: 1rem; line-height: 1.5rem; }
.text-responsive-lg { font-size: 1.125rem; line-height: 1.75rem; }
.text-responsive-xl { font-size: 1.25rem; line-height: 1.75rem; }

@media (min-width: 640px) {
  .text-responsive-xs { font-size: 0.875rem; line-height: 1.25rem; }
  .text-responsive-sm { font-size: 1rem; line-height: 1.5rem; }
  .text-responsive-base { font-size: 1.125rem; line-height: 1.75rem; }
  .text-responsive-lg { font-size: 1.25rem; line-height: 1.75rem; }
  .text-responsive-xl { font-size: 1.5rem; line-height: 2rem; }
}

/* ========================================
   TOUCH TARGETS & ACCESSIBILITY
   ======================================== */

/* Minimum touch target sizes for better mobile UX */
@media (max-width: 767px) {
  button, 
  a[role="button"], 
  input[type="submit"], 
  input[type="button"],
  .btn,
  .touch-target {
    min-height: 44px;
    min-width: 44px;
    padding: 12px 16px;
  }
  
  /* Form inputs on mobile */
  input, 
  select, 
  textarea {
    font-size: 16px !important; /* Prevents zoom on iOS */
    min-height: 44px;
    padding: 12px 16px;
  }
  
  /* Navigation links */
  nav a {
    padding: 12px 16px;
    display: block;
  }
}

/* ========================================
   FORM IMPROVEMENTS
   ======================================== */

/* Responsive form layouts */
.form-grid {
  display: grid;
  gap: 1rem;
  grid-template-columns: 1fr;
}

@media (min-width: 640px) {
  .form-grid {
    gap: 1.5rem;
  }
  
  .form-grid.sm\:grid-cols-2 {
    grid-template-columns: repeat(2, 1fr);
  }
}

@media (min-width: 768px) {
  .form-grid.md\:grid-cols-3 {
    grid-template-columns: repeat(3, 1fr);
  }
}

/* Focus states for accessibility */
input:focus, 
select:focus, 
textarea:focus, 
button:focus {
  outline: 2px solid #845d45;
  outline-offset: 2px;
}

/* Enhanced form field styling */
.form-field {
  position: relative;
}

.form-field input,
.form-field select,
.form-field textarea {
  width: 100%;
  border: 2px solid #e5e7eb;
  border-radius: 0.375rem;
  transition: border-color 0.2s, box-shadow 0.2s;
}

.form-field input:focus,
.form-field select:focus,
.form-field textarea:focus {
  border-color: #845d45;
  box-shadow: 0 0 0 3px rgba(132, 93, 69, 0.1);
}

.form-field label {
  display: block;
  margin-bottom: 0.5rem;
  font-weight: 500;
  color: #374151;
}

/* ========================================
   TABLE RESPONSIVENESS
   ======================================== */

/* Responsive tables - horizontal scroll approach */
.table-responsive {
  overflow-x: auto;
  -webkit-overflow-scrolling: touch;
}

.table-responsive table {
  min-width: 600px;
  width: 100%;
}

/* Alternative: Stacked table approach for mobile */
@media (max-width: 767px) {
  .table-stack {
    display: block;
  }
  
  .table-stack thead {
    display: none;
  }
  
  .table-stack tbody,
  .table-stack tr,
  .table-stack td {
    display: block;
  }
  
  .table-stack tr {
    background: white;
    border-radius: 0.5rem;
    margin-bottom: 1rem;
    padding: 1rem;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
  }
  
  .table-stack td {
    border: none;
    padding: 0.5rem 0;
    text-align: left;
  }
  
  .table-stack td:before {
    content: attr(data-label) ": ";
    font-weight: 600;
    color: #845d45;
  }
}

/* ========================================
   MODAL IMPROVEMENTS
   ======================================== */

/* Responsive modal sizing */
.modal-responsive {
  max-width: 95vw;
  max-height: 95vh;
  overflow-y: auto;
}

@media (min-width: 640px) {
  .modal-responsive {
    max-width: 28rem; /* 448px */
  }
}

@media (min-width: 768px) {
  .modal-responsive {
    max-width: 32rem; /* 512px */
  }
}

/* Modal backdrop improvements */
.modal-backdrop {
  backdrop-filter: blur(8px);
  -webkit-backdrop-filter: blur(8px);
}

/* ========================================
   CARD LAYOUTS
   ======================================== */

/* Responsive card grids */
.card-grid {
  display: grid;
  gap: 1rem;
  grid-template-columns: 1fr;
}

@media (min-width: 640px) {
  .card-grid {
    gap: 1.5rem;
    grid-template-columns: repeat(2, 1fr);
  }
}

@media (min-width: 1024px) {
  .card-grid {
    gap: 2rem;
    grid-template-columns: repeat(3, 1fr);
  }
}

@media (min-width: 1280px) {
  .card-grid.xl\:grid-cols-4 {
    grid-template-columns: repeat(4, 1fr);
  }
}

/* ========================================
   SCROLLABLE CONTENT
   ======================================== */

/* Hide scrollbars but maintain functionality */
.scrollbar-hide {
  -ms-overflow-style: none;
  scrollbar-width: none;
}

.scrollbar-hide::-webkit-scrollbar {
  display: none;
}

/* Horizontal scroll with snap */
.scroll-snap-x {
  scroll-snap-type: x mandatory;
  -webkit-overflow-scrolling: touch;
}

.scroll-snap-x > * {
  scroll-snap-align: start;
}

/* ========================================
   SPACING IMPROVEMENTS
   ======================================== */

/* Responsive spacing utilities */
.space-responsive {
  margin-bottom: 1rem;
}

@media (min-width: 640px) {
  .space-responsive {
    margin-bottom: 1.5rem;
  }
}

@media (min-width: 1024px) {
  .space-responsive {
    margin-bottom: 2rem;
  }
}

/* ========================================
   NAVIGATION IMPROVEMENTS
   ======================================== */

/* Mobile navigation enhancements */
.mobile-nav-slide {
  transform: translateX(100%);
  transition: transform 0.3s ease-in-out;
}

.mobile-nav-slide.open {
  transform: translateX(0);
}

/* ========================================
   LOADING STATES
   ======================================== */

/* Loading spinner */
.spinner {
  animation: spin 1s linear infinite;
}

@keyframes spin {
  from { transform: rotate(0deg); }
  to { transform: rotate(360deg); }
}

/* Skeleton loading */
.skeleton {
  background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
  background-size: 200% 100%;
  animation: loading 1.5s infinite;
}

@keyframes loading {
  0% { background-position: 200% 0; }
  100% { background-position: -200% 0; }
}

/* ========================================
   PRINT STYLES
   ======================================== */

@media print {
  .no-print {
    display: none !important;
  }
  
  .print-break {
    page-break-before: always;
  }
  
  body {
    font-size: 12pt;
    line-height: 1.4;
  }
  
  h1, h2, h3 {
    page-break-after: avoid;
  }
}

/* ========================================
   REDUCED MOTION ACCESSIBILITY
   ======================================== */

@media (prefers-reduced-motion: reduce) {
  * {
    animation-duration: 0.01ms !important;
    animation-iteration-count: 1 !important;
    transition-duration: 0.01ms !important;
  }
}

/* ========================================
   HIGH CONTRAST MODE
   ======================================== */

@media (prefers-contrast: high) {
  .border {
    border-width: 2px;
  }
  
  button, .btn {
    border: 2px solid currentColor;
  }
}

/* ========================================
   DARK MODE PREPARATIONS
   ======================================== */

@media (prefers-color-scheme: dark) {
  /* Add dark mode styles here if needed in the future */
}

/* ========================================
   UTILITY CLASSES
   ======================================== */

/* Screen reader only content */
.sr-only {
  position: absolute;
  width: 1px;
  height: 1px;
  padding: 0;
  margin: -1px;
  overflow: hidden;
  clip: rect(0, 0, 0, 0);
  white-space: nowrap;
  border: 0;
}

/* Focus visible for keyboard navigation */
.focus-visible:focus {
  outline: 2px solid #845d45;
  outline-offset: 2px;
}

/* Aspect ratio utilities */
.aspect-square {
  aspect-ratio: 1 / 1;
}

.aspect-video {
  aspect-ratio: 16 / 9;
}

.aspect-photo {
  aspect-ratio: 4 / 3;
}

/* Safe area padding for devices with notches */
.safe-area-padding {
  padding-left: env(safe-area-inset-left);
  padding-right: env(safe-area-inset-right);
}

/* ========================================
   BRAND-SPECIFIC RESPONSIVE UTILITIES
   ======================================== */

/* Flow Haven brand colors with responsive considerations */
.bg-brand-primary { background-color: #845d45; }
.bg-brand-secondary { background-color: #f2e9dc; }
.bg-brand-accent { background-color: #e8d7c3; }

.text-brand-primary { color: #845d45; }
.text-brand-secondary { color: #2b2a24; }
.text-brand-light { color: #f2e9dc; }

.border-brand-primary { border-color: #845d45; }
.border-brand-secondary { border-color: #f2e9dc; }

/* Hover states for brand elements */
.hover\:bg-brand-primary-dark:hover { background-color: #6e4635; }
.hover\:text-brand-primary-dark:hover { color: #6e4635; }

/* Focus states for brand elements */
.focus\:ring-brand-primary:focus {
  --tw-ring-color: rgba(132, 93, 69, 0.5);
}

/* ========================================
   COMPONENT-SPECIFIC RESPONSIVE STYLES
   ======================================== */

/* Booking cards */
.booking-card {
  transition: transform 0.2s, box-shadow 0.2s;
}

.booking-card:hover {
  transform: translateY(-2px);
  box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
}

@media (max-width: 767px) {
  .booking-card:active {
    transform: scale(0.98);
  }
}

/* Navigation improvements */
.nav-link {
  position: relative;
  transition: color 0.2s;
}

.nav-link:after {
  content: '';
  position: absolute;
  bottom: -4px;
  left: 0;
  width: 0;
  height: 2px;
  background-color: #845d45;
  transition: width 0.2s;
}

.nav-link:hover:after,
.nav-link.active:after {
  width: 100%;
}

/* ========================================
   PERFORMANCE OPTIMIZATIONS
   ======================================== */

/* GPU acceleration for smooth animations */
.will-change-transform {
  will-change: transform;
}

.will-change-opacity {
  will-change: opacity;
}

/* Optimize repaints */
.isolate {
  isolation: isolate;
}

/* ========================================
   RESPONSIVE IMAGE IMPROVEMENTS
   ======================================== */

img {
  height: auto;
  max-width: 100%;
}

.img-responsive {
  display: block;
  height: auto;
  max-width: 100%;
}

/* Object fit utilities */
.object-cover { object-fit: cover; }
.object-contain { object-fit: contain; }
.object-center { object-position: center; }

/* ========================================
   CONTAINER QUERIES (FUTURE-PROOFING)
   ======================================== */

/* Container query support when available */
@supports (container-type: inline-size) {
  .container-responsive {
    container-type: inline-size;
  }
  
  @container (min-width: 400px) {
    .container-responsive .text-responsive {
      font-size: 1.125rem;
    }
  }
}
</style>