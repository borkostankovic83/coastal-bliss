<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<div id="successMessage" style="display: none; color: green; margin-top: 1rem;">
  Application submitted successfully!
</div>

  <div class="container">
    <h3>🌿 We're Hiring at Coastal Bliss Wellness! 🌿</h3>
    <p>Join our serene, natural spa located in beautiful Rehoboth Beach, DE.</p>

    <p>We’re currently seeking passionate and licensed professionals to join our growing team:</p>
    <ul style="list-style: none; padding: 0; font-size: 1.1em;">
      <li>✨ Massage Therapists</li>
      <li>✨ Nail Technicians</li>
      <li>✨ Estheticians</li>
      <li>✨ Front Desk Associates</li>
    </ul>

    <h4>Requirements:</h4>
    <ul style="list-style: none; padding: 0;">
      <li>🔹 Active Delaware professional license (for applicable positions)</li>
      <li>🔹 Friendly, reliable, and wellness-focused</li>
      <li>🔹 Committed to delivering exceptional client care</li>
    </ul>

    <p>Be a part of a spa that celebrates natural beauty, coastal calm, and holistic wellness.</p>

    <p>📧 Apply today by sending your resume to <a href="mailto:info@coastalblissrehoboth.com">info@coastalblissrehoboth.com</a> or click below to submit your application online.</p>

    <button class="btn" id="openModalBtn">Apply Now</button>

    <p style="margin-top: 1em;">📍 <strong>Coastal Bliss Wellness</strong> – Where tranquility meets talent.</p>
  </div>


  <!-- Modal -->
  <div id="applicationModal" class="modal">
    <div class="modal-content">
      <span class="close" id="closeModalBtn">&times;</span>
      <h2>Job Application</h2>
      <form id="applicationForm" method="POST" action="includes/submit_aplication.php" enctype="multipart/form-data">
        <div class="form-group">
          <label for="name">Full Name</label>
          <input required type="text" name="name" id="name">
        </div>
        <div class="form-group">
          <label for="email">Email Address</label>
          <input required type="email" name="email" id="email">
        </div>
        <div class="form-group">
          <label for="position">Position Applying For</label>
          <select required name="position" id="position">
            <option value="">Select...</option>
            <option>Massage Therapist</option>
            <option>Nail Technician</option>
            <option>Facial Specialist</option>
            <option>Front Desk Associate</option>
          </select>
        </div>
        <div class="form-group">
          <label>Do you have a Delaware license for this position?</label>
          <label><input type="radio" name="license_status" value="Yes" required> Yes</label>
          <label><input type="radio" name="license_status" value="No" required> No</label>
          <label><input type="radio" name="license_status" value="In Progress" required> In Progress</label>
        </div>
        <div class="form-group">
          <label for="resume">Upload Resume (PDF/DOC)</label>
          <input type="file" name="resume" id="resume" accept=".pdf,.doc,.docx">
        </div>
        <div class="mb-3">
           <label for="cover_letter" class="form-label">Brief Introduction or Cover Letter</label>
           <textarea name="cover_letter" id="cover_letter" class="form-control" rows="4" required></textarea>
         </div>

         <div class="mb-3">
           <label for="availability" class="form-label">Availability (Days/Hours)</label>
           <textarea name="availability" id="availability" class="form-control" rows="2" required></textarea>
         </div>

         <div class="mb-3">
           <label for="experience" class="form-label">Years of Experience in this Field</label>
           <input type="text" name="experience" id="experience" class="form-control" required>
         </div>

         <div class="mb-3">
           <label for="certifications" class="form-label">Certifications or Additional Training</label>
           <textarea name="certifications" id="certifications" class="form-control" rows="3"></textarea>
         </div>

         <div class="mb-3">
           <label for="start_date" class="form-label">Preferred Start Date</label>
           <input type="date" name="start_date" id="start_date" class="form-control" required>
         </div>

         <div class="mb-3">
           <label for="referral" class="form-label">How Did You Hear About Us?</label>
           <input type="text" name="referral" id="referral" class="form-control">
         </div>

        <div class="form-actions">
          <button type="button" class="cancel" id="cancelBtn">Cancel</button>
          <button type="submit">Submit Application</button>
        </div>
      </form>
    </div>
  </div>

<script>
  // Get elements
  const openModalBtn = document.getElementById('openModalBtn');
  const closeModalBtn = document.getElementById('closeModalBtn');
  const cancelBtn = document.getElementById('cancelBtn');
  const modal = document.getElementById('applicationModal');
  const form = document.getElementById('applicationForm');
  const submitBtn = form.querySelector('button[type="submit"]');

  // Open modal
  openModalBtn.addEventListener('click', () => {
    modal.style.display = 'block';
  });

  // Close modal
  closeModalBtn.addEventListener('click', () => {
    modal.style.display = 'none';
  });

  cancelBtn.addEventListener('click', () => {
    modal.style.display = 'none';
  });

  // Close modal when clicking outside the modal content
  window.addEventListener('click', (event) => {
    if (event.target == modal) {
      modal.style.display = 'none';
    }
  });

  // Submit form with prevention of double-click
  form.addEventListener('submit', function(e) {
    e.preventDefault();

    submitBtn.disabled = true;
    const originalText = submitBtn.textContent;
    submitBtn.textContent = 'Submitting...';

    const formData = new FormData(form);
    fetch('includes/submit_application.php', {
      method: 'POST',
      body: formData
    })
    .then(response => response.json())
    .then(data => {
      if (data.status === 'success') {
        alert(data.message || 'Application submitted successfully! Thank you.');
        modal.style.display = 'none';
        form.reset();
      } else {
        alert(data.message || 'Something went wrong. Please try again.');
      }
    })
    .catch(error => {
      console.error('Error:', error);
      alert('An error occurred while submitting the form. Please try again.');
    })
    .finally(() => {
      submitBtn.disabled = false;
      submitBtn.textContent = originalText;
    });
  });
</script>


  <style>

  . body {
         font-family: Arial, sans-serif;
         background-color: #f4f4f4;
         margin: 0;
         padding: 0;
       }

       .container {
         padding: 2rem;
         text-align: center;
       }

       h1 {
         color: #beac5a;
       }

       .btn {
         background-color: #beac5a;
         color: #fff;
         padding: 0.75rem 1.5rem;
         border: none;
         cursor: pointer;
         font-size: 1rem;
         margin-top: 1rem;
       }

       .modal {
         display: none;
         position: fixed;
         z-index: 1000;
         left: 0;
         top: 0;
         width: 100%;
         height: 100%;
         overflow: auto;
         background-color: rgba(71, 76, 85, 0.8);
       }

       .modal-content {
         background-color: #fff;
         margin: 10% auto;
         padding: 2rem;
         border: 1px solid #888;
         width: 90%;
         max-width: 500px;
         position: relative;
       }

       .close {
         color: #aaa;
         position: absolute;
         top: 1rem;
         right: 1rem;
         font-size: 1.5rem;
         font-weight: bold;
         cursor: pointer;
       }

       .form-group {
         margin-bottom: 1rem;
         text-align: left;
       }

       label {
         display: block;
         margin-bottom: 0.5rem;
         color: #474c55;
       }

       input[type="text"],
       input[type="email"],
       select,
       input[type="file"] {
         width: 100%;
         padding: 0.5rem;
         border: 1px solid #ccc;
         border-radius: 4px;
       }

       .form-actions {
         text-align: right;
       }

       .form-actions button {
         background-color: #beac5a;
         color: #fff;
         padding: 0.5rem 1rem;
         border: none;
         cursor: pointer;
       }

       .form-actions button.cancel {
         background-color: #ccc;
         margin-right: 0.5rem;
       }
  </style>