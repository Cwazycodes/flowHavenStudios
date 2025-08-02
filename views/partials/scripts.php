<script>
  //  navbar scroll functionality
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

  // modal functionality
  let currentModalMode = 'login'; // 'login', 'register', 'forgot'

  function openLoginModal() {
    const modal = document.getElementById('authModal');
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
  }

  function closeAuthModal() {
    const modal = document.getElementById('authModal');
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
    
    resetForms();
    currentModalMode = 'login';
    showLogin();
  }

  function showLogin() {
    const loginForm = document.getElementById('loginForm');
    const registerForm = document.getElementById('registerForm');
    const forgotPasswordForm = document.getElementById('forgotPasswordForm');
    const modalTitle = document.getElementById('modalTitle');
    const toggleText = document.getElementById('toggleText');

    // hide all forms
    loginForm.classList.remove('hidden');
    registerForm.classList.add('hidden');
    forgotPasswordForm.classList.add('hidden');

    modalTitle.textContent = 'sign in';
    toggleText.innerHTML = 'don\'t have an account? <button onclick="toggleForm()" class="text-[#845d45] hover:text-[#6e4635] font-medium">sign up</button>';
    
    currentModalMode = 'login';
    hideMessage();
  }

  function showRegister() {
    const loginForm = document.getElementById('loginForm');
    const registerForm = document.getElementById('registerForm');
    const forgotPasswordForm = document.getElementById('forgotPasswordForm');
    const modalTitle = document.getElementById('modalTitle');
    const toggleText = document.getElementById('toggleText');

    // hide all forms
    loginForm.classList.add('hidden');
    registerForm.classList.remove('hidden');
    forgotPasswordForm.classList.add('hidden');

    modalTitle.textContent = 'create account';
    toggleText.innerHTML = 'already have an account? <button onclick="showLogin()" class="text-[#845d45] hover:text-[#6e4635] font-medium">sign in</button>';
    
    currentModalMode = 'register';
    hideMessage();
    
    // load locations when switching to register form
    loadLocations();
  }

  function showForgotPassword() {
    const loginForm = document.getElementById('loginForm');
    const registerForm = document.getElementById('registerForm');
    const forgotPasswordForm = document.getElementById('forgotPasswordForm');
    const modalTitle = document.getElementById('modalTitle');
    const toggleText = document.getElementById('toggleText');

    // hide all forms
    loginForm.classList.add('hidden');
    registerForm.classList.add('hidden');
    forgotPasswordForm.classList.remove('hidden');

    modalTitle.textContent = 'reset password';
    toggleText.innerHTML = 'remember your password? <button onclick="showLogin()" class="text-[#845d45] hover:text-[#6e4635] font-medium">sign in</button>';
    
    currentModalMode = 'forgot';
    hideMessage();
  }

  function toggleForm() {
    if (currentModalMode === 'login') {
      showRegister();
    } else {
      showLogin();
    }
  }

  // load locations for the dropdown
  async function loadLocations() {
    try {
      const response = await fetch('/api/locations');
      const result = await response.json();
      
      if (result.success) {
        const locationSelect = document.getElementById('preferredLocation');
        
        // clear existing options except the first one
        locationSelect.innerHTML = '<option value="">select a location...</option>';
        
        // add location options
        result.locations.forEach(location => {
          const option = document.createElement('option');
          option.value = location.id;
          option.textContent = location.name;
          locationSelect.appendChild(option);
        });
      }
    } catch (error) {
      console.error('failed to load locations:', error);
    }
  }

  function resetForms() {
    document.getElementById('loginForm').reset();
    document.getElementById('registerForm').reset();
    document.getElementById('forgotPasswordForm').reset();
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

  // handle login, register, and forgot password form submissions
  document.addEventListener('DOMContentLoaded', function() {
    const loginForm = document.getElementById('loginForm');
    const registerForm = document.getElementById('registerForm');
    const forgotPasswordForm = document.getElementById('forgotPasswordForm');

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
            showMessage('login successful! redirecting...', false);
            setTimeout(() => {
              window.location.href = result.redirect || '/';
            }, 1500);
          } else {
            showMessage(result.message || 'login failed. please check your credentials.', true);
          }
        } catch (error) {
          showMessage('an error occurred. please try again.', true);
        }
      });
    }

    // handle register form submission
    if (registerForm) {
      registerForm.addEventListener('submit', async function(e) {
        e.preventDefault();
        
        const password = document.getElementById('registerPassword').value;
        const confirmPassword = document.getElementById('confirmPassword').value;
        const locationId = document.getElementById('preferredLocation').value;
        
        if (password !== confirmPassword) {
          showMessage('passwords do not match.', true);
          return;
        }
        
        if (!locationId) {
          showMessage('please select a location.', true);
          return;
        }
        
        const formData = new FormData(this);
        formData.append('role', 'student'); // default role for public registration
        
        try {
          const response = await fetch('/auth/register', {
            method: 'POST',
            body: formData
          });
          
          const result = await response.json();
          
          if (result.success) {
            showMessage('account created successfully! you can now sign in.', false);
            setTimeout(() => {
              showLogin(); // switch back to login form
            }, 2000);
          } else {
            showMessage(result.message || 'registration failed. please try again.', true);
          }
        } catch (error) {
          showMessage('an error occurred. please try again.', true);
        }
      });
    }

    // handle forgot password form submission
    if (forgotPasswordForm) {
      forgotPasswordForm.addEventListener('submit', async function(e) {
        e.preventDefault();
        
        const formData = new FormData(this);
        
        try {
          const response = await fetch('/auth/forgot-password', {
            method: 'POST',
            body: formData
          });
          
          const result = await response.json();
          
          if (result.success) {
            showMessage('reset instructions sent! check your email for the reset link.', false);
            // optionally switch back to login after a delay
            setTimeout(() => {
              showLogin();
            }, 3000);
          } else {
            showMessage(result.message || 'failed to send reset email. please try again.', true);
          }
        } catch (error) {
          showMessage('an error occurred. please try again.', true);
        }
      });
    }
  });

  // close modal on escape key
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