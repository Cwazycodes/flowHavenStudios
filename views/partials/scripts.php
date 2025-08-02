<script>
  //  Navbar scroll functionality
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

  // Mobile menu functionality
  function toggleMobileMenu() {
    const menu = document.getElementById('mobile-menu');
    menu.classList.toggle('hidden');
  }

  // Modal functionality
  let isLoginMode = true;

  function openLoginModal() {
    const modal = document.getElementById('authModal');
    const body = document.body;
    
    // Store current scroll position
    const scrollY = window.scrollY;
    body.setAttribute('data-scroll-y', scrollY);
    
    // Show modal
    modal.classList.remove('hidden');
    
    // Prevent body scroll but maintain position
    body.style.position = 'fixed';
    body.style.top = `-${scrollY}px`;
    body.style.width = '100%';
    body.style.overflow = 'hidden';
  }

  function closeAuthModal() {
    const modal = document.getElementById('authModal');
    const body = document.body;
    
    // Get the stored scroll position
    const scrollY = body.getAttribute('data-scroll-y') || '0';
    
    // Hide modal
    modal.classList.add('hidden');
    
    // Restore body scroll
    body.style.position = '';
    body.style.top = '';
    body.style.width = '';
    body.style.overflow = '';
    
    // Restore scroll position
    window.scrollTo(0, parseInt(scrollY));
    
    // Clean up
    body.removeAttribute('data-scroll-y');
    
    resetForms();
  }

  function toggleForm() {
    const loginForm = document.getElementById('loginForm');
    const registerForm = document.getElementById('registerForm');
    const modalTitle = document.getElementById('modalTitle');
    const toggleText = document.getElementById('toggleText');

    if (isLoginMode) {
      // Switch to register mode
      loginForm.classList.add('hidden');
      registerForm.classList.remove('hidden');
      modalTitle.textContent = 'create account';
      toggleText.innerHTML = 'already have an account? <button onclick="toggleForm()" class="text-[#845d45] hover:text-[#6e4635] font-medium">sign in</button>';
      isLoginMode = false;
    } else {
      // Switch to login mode
      registerForm.classList.add('hidden');
      loginForm.classList.remove('hidden');
      modalTitle.textContent = 'sign in';
      toggleText.innerHTML = 'don\'t have an account? <button onclick="toggleForm()" class="text-[#845d45] hover:text-[#6e4635] font-medium">sign up</button>';
      isLoginMode = true;
    }
    
    hideMessage();
  }

  function resetForms() {
    document.getElementById('loginForm').reset();
    document.getElementById('registerForm').reset();
    hideMessage();
  }

  function showMessage(message, isError = false) {
    const messageDiv = document.getElementById('authMessage');
    messageDiv.textContent = message;
    messageDiv.className = `mb-4 p-3 rounded-md font-quicksand ${isError ? 'bg-red-100 text-red-700 border border-red-300' : 'bg-green-100 text-green-700 border border-green-300'}`;
    messageDiv.classList.remove('hidden');
  }

  function hideMessage() {
    const authMessage = document.getElementById('authMessage');
    if (authMessage) {
      authMessage.classList.add('hidden');
    }
  }

  // Handle login form submission
  document.addEventListener('DOMContentLoaded', function() {
    const loginForm = document.getElementById('loginForm');
    const registerForm = document.getElementById('registerForm');

    if (loginForm) {
      loginForm.addEventListener('submit', async function(e) {
        e.preventDefault();
        
        const formData = new FormData(this);
        
        try {
          const response = await fetch('/auth/login', {
            method: 'POST',
            body: formData
          });
          
          const result = await response.json();
          
          if (result.success) {
            showMessage('Login successful! Redirecting...', false);
            setTimeout(() => {
              window.location.href = result.redirect || '/';
            }, 1500);
          } else {
            showMessage(result.message || 'Login failed. Please check your credentials.', true);
          }
        } catch (error) {
          showMessage('An error occurred. Please try again.', true);
        }
      });
    }

    // Handle register form submission
    if (registerForm) {
      registerForm.addEventListener('submit', async function(e) {
        e.preventDefault();
        
        const password = document.getElementById('registerPassword').value;
        const confirmPassword = document.getElementById('confirmPassword').value;
        
        if (password !== confirmPassword) {
          showMessage('Passwords do not match.', true);
          return;
        }
        
        const formData = new FormData(this);
        formData.append('role', 'student'); // Default role for public registration
        
        try {
          const response = await fetch('/auth/register', {
            method: 'POST',
            body: formData
          });
          
          const result = await response.json();
          
          if (result.success) {
            showMessage('Account created successfully! You can now sign in.', false);
            setTimeout(() => {
              toggleForm(); // Switch back to login form
            }, 2000);
          } else {
            showMessage(result.message || 'Registration failed. Please try again.', true);
          }
        } catch (error) {
          showMessage('An error occurred. Please try again.', true);
        }
      });
    }
  });

  // Close modal on Escape key
  document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
      closeAuthModal();
    }
  });
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
  .btn-brand {
    background-color: #fed783;
    color: #845d45;
    transition: background-color 0.3s ease, color 0.3s ease;
  }

  .btn-brand:hover {
    background-color: #845d45;
    color: #fed783;
  }
</style>