    document.addEventListener("DOMContentLoaded", function () {
    const sessionMessage = document.getElementById("session-message")
    if (sessionMessage) {

        setTimeout(() => {
            sessionMessage.remove();
        }, 2000);
    }
})
