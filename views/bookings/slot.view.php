<?php include 'views/partials/header.php'; ?>

<section class="bg-[#f2e9dc] min-h-screen py-16 sm:py-20 lg:py-24">
  <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
    
    <!-- Header section -->
    <div class="text-center mb-8 sm:mb-12">
      <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-[#845d45] mb-4 font-quicksand">confirm booking</h2>
      
      <!-- Session details card -->
      <div class="bg-white rounded-lg shadow-sm p-4 sm:p-6 mb-6 border border-[#845d45]/10">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2 sm:gap-4">
          <div class="text-center sm:text-left">
            <p class="text-sm sm:text-base text-gray-600 font-quicksand">selected session:</p>
            <p class="text-lg sm:text-xl font-semibold text-[#845d45] font-quicksand">
              <?= strtolower(date('l, F jS', strtotime($slot['slot_time']))) ?>
            </p>
            <p class="text-base sm:text-lg text-[#845d45] font-quicksand">
              <?= date('H:i', strtotime($slot['slot_time'])) ?>
            </p>
          </div>
          <div class="text-center sm:text-right">
            <p class="text-sm text-gray-600 font-quicksand">spots available:</p>
            <p class="text-xl sm:text-2xl font-bold text-[#845d45] font-quicksand">
              <?= $slot['capacity'] ?>
            </p>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Booking form -->
    <div class="bg-white rounded-lg shadow-lg p-6 sm:p-8">
      <form action="/book/start" method="POST" class="space-y-6" id="bookingForm">
        <input type="hidden" name="slot_id" value="<?= $slot['id'] ?>">
        
        <!-- Number of beds selection -->
        <div class="space-y-2">
          <label for="bed" class="block text-sm font-medium text-gray-700 font-quicksand">
            number of beds <span class="text-red-500">*</span>
          </label>
          <select id="bed" name="quantity" required 
                  class="block w-full px-3 py-3 sm:py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-[#845d45] focus:border-[#845d45] font-quicksand text-base sm:text-sm bg-white">
            <?php for($i = 1; $i <= $slot['capacity']; $i++): ?>
              <option value="<?= $i ?>"><?= $i ?> bed<?= $i > 1 ? 's' : '' ?> - £<?= $i * 20 ?></option>
            <?php endfor; ?>
          </select>
          <p class="text-xs sm:text-sm text-gray-500 font-quicksand">£20 per bed</p>
        </div>

        <!-- Personal details -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6">
          <div class="space-y-2">
            <label for="first_name" class="block text-sm font-medium text-gray-700 font-quicksand">
              first name <span class="text-red-500">*</span>
            </label>
            <input type="text" id="first_name" name="first_name" required 
                   class="block w-full px-3 py-3 sm:py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-[#845d45] focus:border-[#845d45] font-quicksand text-base sm:text-sm"
                   placeholder="Enter your first name" />
          </div>
          
          <div class="space-y-2">
            <label for="last_name" class="block text-sm font-medium text-gray-700 font-quicksand">
              last name <span class="text-red-500">*</span>
            </label>
            <input type="text" id="last_name" name="last_name" required 
                   class="block w-full px-3 py-3 sm:py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-[#845d45] focus:border-[#845d45] font-quicksand text-base sm:text-sm"
                   placeholder="Enter your last name" />
          </div>
        </div>

        <!-- Contact details -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6">
          <div class="space-y-2">
            <label for="email" class="block text-sm font-medium text-gray-700 font-quicksand">
              email address <span class="text-red-500">*</span>
            </label>
            <input type="email" id="email" name="email" required 
                   class="block w-full px-3 py-3 sm:py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-[#845d45] focus:border-[#845d45] font-quicksand text-base sm:text-sm"
                   placeholder="your@email.com" />
          </div>
          
          <div class="space-y-2">
            <label for="phone" class="block text-sm font-medium text-gray-700 font-quicksand">
              phone number
            </label>
            <input type="tel" id="phone" name="phone" 
                   class="block w-full px-3 py-3 sm:py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-[#845d45] focus:border-[#845d45] font-quicksand text-base sm:text-sm"
                   placeholder="07123 456789" />
          </div>
        </div>

        <!-- Important information -->
        <div class="bg-[#f2e9dc] rounded-lg p-4 border border-[#845d45]/20">
          <h4 class="text-sm font-semibold text-[#845d45] font-quicksand mb-2">
            ⚠️ important information
          </h4>
          <ul class="text-xs sm:text-sm text-gray-600 font-quicksand space-y-1">
            <li>• please arrive 10 minutes before your class starts</li>
            <li>• bring grip socks (available for purchase at studio)</li>
            <li>• cancellations must be made 24 hours in advance</li>
            <li>• complete the waiver form before your first visit</li>
          </ul>
        </div>

        <!-- Submit button -->
        <div class="pt-4">
          <button type="submit" 
                  class="w-full rounded-full border-2 border-[#845d45] px-4 sm:px-6 lg:px-8 py-3 sm:py-4 text-[#845d45] font-quicksand hover:bg-[#845d45] hover:text-white transition-all duration-200 font-medium text-base sm:text-lg focus:outline-none focus:ring-2 focus:ring-[#845d45] focus:ring-offset-2 active:scale-95"
                  id="submitBtn">
            <span id="submitText">continue to payment</span>
            <span id="loadingText" class="hidden">
              <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white inline" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
              </svg>
              processing...
            </span>
          </button>
        </div>

        <!-- Back button -->
        <div class="text-center pt-2">
          <a href="/book" 
             class="inline-flex items-center text-sm text-[#845d45] hover:text-[#6e4635] font-quicksand transition-colors">
            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
            back to time slots
          </a>
        </div>
      </form>
    </div>

    <!-- Security notice -->
    <div class="text-center mt-6">
      <p class="text-xs text-gray-500 font-quicksand">
        🔒 your payment is secured by stripe
      </p>
    </div>
  </div>
</section>

<style>
  /* Custom focus states for better accessibility */
  input:focus, select:focus, button:focus {
    box-shadow: 0 0 0 3px rgba(132, 93, 69, 0.1);
  }
  
  /* Improved mobile form styling */
  @media (max-width: 640px) {
    input, select, button {
      font-size: 16px; /* Prevents zoom on iOS */
    }
  }
  
  /* Loading state */
  .form-loading {
    pointer-events: none;
    opacity: 0.7;
  }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const form = document.getElementById('bookingForm');
  const submitBtn = document.getElementById('submitBtn');
  const submitText = document.getElementById('submitText');
  const loadingText = document.getElementById('loadingText');
  
  // Show loading state on form submission
  form.addEventListener('submit', function() {
    submitBtn.disabled = true;
    submitText.classList.add('hidden');
    loadingText.classList.remove('hidden');
    form.classList.add('form-loading');
  });
  
  // Update price when quantity changes
  const quantitySelect = document.getElementById('bed');
  quantitySelect.addEventListener('change', function() {
    // You can add price update logic here if needed
    console.log('Selected quantity:', this.value);
  });
  
  // Basic form validation
  const requiredFields = ['first_name', 'last_name', 'email'];
  requiredFields.forEach(fieldId => {
    const field = document.getElementById(fieldId);
    field.addEventListener('blur', function() {
      if (!this.value.trim()) {
        this.classList.add('border-red-300');
        this.classList.remove('border-gray-300');
      } else {
        this.classList.remove('border-red-300');
        this.classList.add('border-gray-300');
      }
    });
  });
});
</script>

<?php include 'views/partials/footer.php'; ?>