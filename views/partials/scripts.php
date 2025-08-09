<script>
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