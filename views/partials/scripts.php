
<script>
  const navbar = document.getElementById('main-navbar');

  window.addEventListener('scroll', () => {
    if (window.scrollY > 10) {
      navbar.style.backgroundColor = '#2b2a24';
      navbar.classList.add('bg-opacity-90', 'backdrop-blur-md');
    } else {
      navbar.style.backgroundColor = 'transparent';
      navbar.classList.remove('bg-opacity-90', 'backdrop-blur-md');
    }
  });
    function toggleMobileMenu() {
    const menu = document.getElementById('mobile-menu');
    menu.classList.toggle('hidden');
    }
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