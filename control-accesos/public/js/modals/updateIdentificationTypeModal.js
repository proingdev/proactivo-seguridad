/**
 * Code for modals
 * dmr
 */
let modalUpdateIdentificationType = document.getElementById('modalUpdateIdentificationType')
modalUpdateIdentificationType.addEventListener('show.bs.modal', function(event) {
    // Button that triggered the modal
    let button = event.relatedTarget
    // Extract info from data-bs-* attributes

    let identificationTypeId = button.getAttribute('data-bs-identification-type-id');
    let identificationTypeName = button.getAttribute('data-bs-identification-type-name');

    let modalTitle = modalUpdateIdentificationType.querySelector('.modal-title');

    let inputidentificationTypeName = modalUpdateIdentificationType.querySelector('#name');

    modalTitle.textContent = `Editar tipo de identificación: ${identificationTypeName}`;

    inputidentificationTypeName.value = identificationTypeName;

    let getFormUpdate = modalUpdateIdentificationType.querySelector('.update-identification-type-form');
    getFormUpdate.action = `tipo-indentificaciones/${identificationTypeId}`;
});