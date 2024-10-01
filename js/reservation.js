document.getElementById('reservation-form').addEventListener('submit', function(event) {
    event.preventDefault();

    let name = document.getElementById('name').value;
    let dni = document.getElementById('dni').value;
    let phone = document.getElementById('phone').value;
    let email = document.getElementById('email').value;
    let checkin = document.getElementById('checkin').value;
    let checkout = document.getElementById('checkout').value;
    let room = document.getElementById('room').value;
    let guests = parseInt(document.getElementById('guests').value); // Convertir a número
    let requests = document.getElementById('requests').value;

    // Validación del nombre
    const nameRegex = /^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/; // Solo letras y espacios
    if (!nameRegex.test(name)) {
        alert('El nombre solo puede contener letras y espacios.');
        return; // Detener el envío del formulario
    }

    // Validación del DNI
    if (!/^\d{8,}$/.test(dni)) {
        alert('DNI inválido. Debe tener al menos 8 dígitos.');
        return;
    }

    // Validación del número de teléfono
    if (!/^\d{9,}$/.test(phone)) {
        alert('Número de teléfono inválido. Debe tener al menos 9 dígitos.');
        return;
    }

    // Validación de la fecha de entrada
    const today = new Date().toISOString().split('T')[0]; // Obtener la fecha actual en formato YYYY-MM-DD
    if (checkin < today) {
        alert('La fecha de entrada no puede ser una fecha pasada.');
        return;
    }

    // Validación de la cantidad de huéspedes
    if (guests < 1 || guests > 10) { // Establecer el rango de huéspedes (1 a 10)
        alert('El número de huéspedes debe estar entre 1 y 10.');
        return;
    }

    let formData = new FormData();
    formData.append('name', name);
    formData.append('dni', dni);
    formData.append('phone', phone);
    formData.append('email', email);
    formData.append('checkin', checkin);
    formData.append('checkout', checkout);
    formData.append('room', room);
    formData.append('guests', guests);
    formData.append('requests', requests);

    fetch('php/reserve.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        document.getElementById('status').textContent = data;
    })
    .catch(error => {
        document.getElementById('status').textContent = 'Ocurrió un error, intenta nuevamente.';
        console.error('Error:', error);
    });
});
