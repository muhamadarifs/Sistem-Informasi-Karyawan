// assets/js/sweetalert.js

// Import the SweetAlert library (you need to include the SweetAlert library in your project)
import Swal from 'sweetalert2';

// Function to display a success alert
function showSuccessAlert() {
    Swal.fire({
        title: 'Success!',
        text: 'Your submission was successful.',
        icon: 'success',
        confirmButtonText: 'OK'
    });
}

// Function to display an error alert
function showErrorAlert(errorMessage) {
    Swal.fire({
        title: 'Error!',
        text: errorMessage,
        icon: 'error',
        confirmButtonText: 'OK'
    });
}

// Export the functions
export { showSuccessAlert, showErrorAlert };
