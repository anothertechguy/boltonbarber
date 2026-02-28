// Set this string to the URL of your Google Apps Script Web App
// Make sure this is exactly what Google provides (e.g., https://script.google.com/macros/s/.../exec)
const scriptURL = "https://script.google.com/macros/s/AKfycbwhbRkNddJVdiLzKyKj05cCgXi91CHTchldOQTyrn8_e6U5NCjlSV5_MjKxJn0wqDNq/exec";

/**
 * Handle form submissions via AJAX
 * Find all forms with data-ajax-form attribute and set up listener
 */
document.addEventListener('DOMContentLoaded', () => {
    const ajaxForms = document.querySelectorAll('.google-sheet-form');

    ajaxForms.forEach(form => {
        form.addEventListener('submit', e => {
            e.preventDefault();

            // Only proceed if URL is set
            if (scriptURL === "REPLACE_WITH_YOUR_WEB_APP_URL") {
                alert("Developer Notice: Please set the scriptURL in submit.js first.");
                return;
            }

            const submitBtn = form.querySelector('button[type="submit"]');
            const originalBtnText = submitBtn.innerHTML;

            // Change button state
            submitBtn.innerHTML = 'Sending...';
            submitBtn.disabled = true;

            // Serialize form data
            const data = new URLSearchParams(new FormData(form)).toString();

            // Send via fetch API to the Web App URL
            fetch(scriptURL, {
                method: 'POST',
                mode: 'no-cors',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: data
            })
                .then(response => {
                    // Success UI State
                    submitBtn.innerHTML = 'Success!';
                    submitBtn.classList.remove('bg-primary', 'hover:bg-primary/90');
                    submitBtn.classList.add('bg-green-600', 'hover:bg-green-700');

                    // Reset form
                    form.reset();

                    // Revert button text after 3 seconds
                    setTimeout(() => {
                        submitBtn.innerHTML = originalBtnText;
                        submitBtn.disabled = false;
                        submitBtn.classList.add('bg-primary', 'hover:bg-primary/90');
                        submitBtn.classList.remove('bg-green-600', 'hover:bg-green-700');
                    }, 3000);
                })
                .catch(error => {
                    console.error('Error!', error.message);

                    // Error UI State
                    submitBtn.innerHTML = 'Error - try again';
                    submitBtn.classList.remove('bg-primary', 'hover:bg-primary/90');
                    submitBtn.classList.add('bg-red-600', 'hover:bg-red-700');

                    setTimeout(() => {
                        submitBtn.innerHTML = originalBtnText;
                        submitBtn.disabled = false;
                        submitBtn.classList.add('bg-primary', 'hover:bg-primary/90');
                        submitBtn.classList.remove('bg-red-600', 'hover:bg-red-700');
                    }, 3000);
                });
        });
    });
});
