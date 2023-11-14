document.addEventListener('DOMContentLoaded', function () {
  // Get the form element
  const form = document.getElementById('Multiplex');

  // Add an event listener for form submission
  form.addEventListener('submit', function (event) {
    event.preventDefault(); // Prevent form submission

    // Get the input values
    const trancheAge = document.getElementById('tranche-age').value;
    const entrepriseName = document.getElementById('entreprise').value;
    const domaine = document.getElementById('domaine').value;
    const post = document.getElementById('post').value;
    const duree = document.getElementById('duree').value;
    const typeFormation = document.getElementById('type-formation').value;

    // Perform basic input validation
    if (trancheAge === '') {
      alert('Please choose your age group');
      return;
    }

    if (entrepriseName.trim() === '') {
      alert('Please enter the name of the enterprise');
      return;
    }

    if (domaine === '') {
      alert('Please choose your domain');
      return;
    }

    if (post === '') {
      alert('Please choose the post');
      return;
    }

    if (duree.trim() === '') {
      alert('Please enter the stage duration');
      return;
    }

    if (typeFormation === '') {
      alert('Please choose the type of training');
      return;
    }

    // Proceed with form submission if all validations pass
    // You can perform further actions or submit the form to a server here
    alert('Form submitted successfully!');
    form.reset(); // Reset the form after submission
  });
});
