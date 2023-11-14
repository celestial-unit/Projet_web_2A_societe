// script.js

console.log('Script loaded successfully');

const form = document.querySelector('form');

form.addEventListener('submit', function (e) {
    e.preventDefault();

    const firstname = document.getElementById('firstname').value;
    const lastname = document.getElementById('lastname').value;
    const email = document.getElementById('email').value;
    const phone = document.getElementById('phone').value;

    
    const nameRegex = /^[a-zA-Z]+$/;
    if (!nameRegex.test(firstname) || !nameRegex.test(lastname)) {
        alert('Please enter valid first and last names (letters only).');
        return;
    }

   
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        alert('Please enter a valid email address.');
        return;
    }

    
    const phoneRegex = /^[0-9]+$/;
    if (!phoneRegex.test(phone)) {
        alert('Please enter a valid phone number (numbers only).');
        return;
    }

    console.log('Validation passed'); 

   
    const formData = new FormData(this);

    console.log('FormData:', formData); 
    fetch('submit_form.php', {
        method: 'POST',
        body: formData
    })
    .then(response => {
        if (!response.ok) {
            throw new Error(`Network response was not ok: ${response.status}`);
        }
        return response.json();
    })
    .then(data => {
        console.log('Server response:', data); // Add this line for debugging

        if (data.status === 'success') {
            alert('Form submitted successfully!');
            // Optionally, you can redirect to another page
            location.reload();
        } else {
            alert('Error .');
            console.error(data.message);
        }
    })
    .catch(error => {
        alert('done.');
        console.error(error);
    });
});
