//input text and label
const inputName = document.getElementById('name');
const inputLastName = document.getElementById('last_name');
const labelName = document.getElementById('labelName');
const labelLastName = document.getElementById('labelLastName');

// Agregar un evento 'input' al inputText
inputName.addEventListener('input', (event) => {
    const inputValue = event.target.value;
    labelName.textContent = inputValue;
});

// Agregar un evento 'input' al inputText
inputLastName.addEventListener('input', (event) => {
    const inputValue = event.target.value;
    labelLastName.textContent = inputValue;
});