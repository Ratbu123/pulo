// Show the selected section and highlight the sidebar link
function showSection(id, event) {
  // Hide all sections
  document.querySelectorAll('.content-section').forEach(section => {
    section.style.display = 'none';
  });

  // Remove active class from all sidebar links
  document.querySelectorAll('.sidebar nav a').forEach(link => {
    link.classList.remove('active');
  });

  // Show selected section
  const targetSection = document.getElementById(id);
  if (targetSection) targetSection.style.display = 'block';

  // Highlight the active link
  if (event && event.currentTarget) {
    event.currentTarget.classList.add('active');
  }

  // Close sidebar if on mobile
  if (window.innerWidth <= 768) {
    document.querySelector('.sidebar')?.classList.remove('show');
  }
}

// Preview selected image before upload
function previewImage(event) {
  const input = event.target;
  const previewImage = document.getElementById('preview-image');

  if (input.files && input.files[0]) {
    const reader = new FileReader();
    reader.onload = function (e) {
      previewImage.src = e.target.result;
    };
    reader.readAsDataURL(input.files[0]);
  }
}

// Run all setup after DOM content is loaded
document.addEventListener('DOMContentLoaded', () => {
  // Show default section
  const defaultLink = document.querySelector('.sidebar nav a.active') || document.querySelector('.sidebar nav a');
  const defaultSectionId = defaultLink?.getAttribute('onclick')?.match(/'(.+?)'/)?.[1] || 'dashboard';
  showSection(defaultSectionId, { currentTarget: defaultLink });

  // Modal: Open logic
  document.querySelectorAll('.view-all-btn').forEach(btn => {
    btn.addEventListener('click', () => {
      const barangay = btn.getAttribute('data-barangay');
      const modalId = 'modal-' + barangay.toLowerCase().replace(/\s+/g, '-');
      const modal = document.getElementById(modalId);
      if (modal) {
        modal.classList.add('active');
        document.querySelector('.overlay')?.classList.add('active');
      }
    });
  });

  // Modal: Close button
  document.querySelectorAll('.modal .close-btn').forEach(close => {
    close.addEventListener('click', () => {
      close.closest('.modal')?.classList.remove('active');
      document.querySelector('.overlay')?.classList.remove('active');
    });
  });

  // Modal: Click outside to close
  document.querySelector('.overlay')?.addEventListener('click', () => {
    document.querySelectorAll('.modal.active').forEach(modal => modal.classList.remove('active'));
    document.querySelector('.overlay')?.classList.remove('active');
  });

  // Hamburger menu toggle
  const hamburger = document.getElementById('hamburger');
  if (hamburger) {
    hamburger.addEventListener('click', () => {
      document.querySelector('.sidebar')?.classList.toggle('show');
    });
  }
});
