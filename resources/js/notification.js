window.toggleNotification = function (type, message) {
    document.getElementById(type + '-notification').classList.toggle('hidden');
    let messageElement = document.getElementById(type + '-notification-message');
    if (messageElement) {
        messageElement.textContent = message;
    }
}
