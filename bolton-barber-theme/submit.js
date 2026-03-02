// Replace this with your Web3Forms Access Key
// You can get one for free at https://web3forms.com/
// When you hand this off to your client, just have them generate a key with their email and paste it here!
// Pulls the Access Key injected by WordPress ACF in the <head>
const web3formsAccessKey = window.WEB3FORMS_ACCESS_KEY || "7f11b2f4-2253-439e-aba0-474729ce130f";

/**
 * Handle form submissions via AJAX for all elements with class 'google-sheet-form'
 * (Kept the class name 'google-sheet-form' so we didn't have to change the HTML)
 */
document.addEventListener('DOMContentLoaded', () => {
    const ajaxForms = document.querySelectorAll('.google-sheet-form');

    ajaxForms.forEach(form => {
        form.addEventListener('submit', e => {
            e.preventDefault();

            if (web3formsAccessKey === "YOUR_ACCESS_KEY_HERE") {
                alert("Developer Notice: Please set the Web3Forms Access Key in submit.js first.");
                return;
            }

            const submitBtn = form.querySelector('button[type="submit"]');
            const originalBtnText = submitBtn.innerHTML;

            // Change button state
            submitBtn.innerHTML = 'Sending...';
            submitBtn.disabled = true;

            // Gather form data
            const formData = new FormData(form);
            const object = Object.fromEntries(formData);

            // Web3Forms requires the access key in the payload
            object.access_key = web3formsAccessKey;

            // Optional: You can set a custom subject line for the emails
            object.subject = "New Submission from Bolton Barber Studio";

            const json = JSON.stringify(object);

            // Send via fetch API to Web3Forms
            fetch('https://api.web3forms.com/submit', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: json
            })
                .then(async (response) => {
                    let jsonResponse = await response.json();

                    if (response.status == 200) {
                        // Success UI State
                        submitBtn.innerHTML = 'Success!';
                        submitBtn.classList.remove('bg-primary', 'hover:bg-primary/90');
                        submitBtn.classList.add('bg-green-600', 'hover:bg-green-700');
                        form.reset();
                    } else {
                        // API Error State
                        console.log(response);
                        submitBtn.innerHTML = jsonResponse.message || 'Error - try again';
                        submitBtn.classList.remove('bg-primary', 'hover:bg-primary/90');
                        submitBtn.classList.add('bg-red-600', 'hover:bg-red-700');
                    }
                })
                .catch(error => {
                    console.log(error);
                    // Network Error UI State
                    submitBtn.innerHTML = 'Error - try again';
                    submitBtn.classList.remove('bg-primary', 'hover:bg-primary/90');
                    submitBtn.classList.add('bg-red-600', 'hover:bg-red-700');
                })
                .finally(() => {
                    // Revert button text after 3 seconds
                    setTimeout(() => {
                        submitBtn.innerHTML = originalBtnText;
                        submitBtn.disabled = false;
                        submitBtn.classList.add('bg-primary', 'hover:bg-primary/90');
                        submitBtn.classList.remove('bg-green-600', 'hover:bg-green-700');
                        submitBtn.classList.remove('bg-red-600', 'hover:bg-red-700');
                    }, 3000);
                });
        });
    });
});
