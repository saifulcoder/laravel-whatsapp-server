const BASE_URI = 'http://localhost:8000/'
const SESSION_ID = 'john'

const sendRequest = async () => {
    // Here we are using fetch API to send the request
    const response = await fetch(`${BASE_URI}sessions/add`, {
        method: 'POST',
        body: JSON.stringify({
            id: SESSION_ID,
            // A string value representing the client type.
            // Use 'false' for Multi-Device,
            // or 'true' for Legacy (Normal WhatsApp Web).
            // This is important since the generated QR is not compatible each other.
            // So make sure you generated the correct one.
            isLegacy: 'false',
        }),
        headers: {
            'Content-Type': 'application/json',
        },
    })

    return response.json()
}

;(async () => {
    const response = await sendRequest()

    if (response.success && 'qr' in response.data) {
        // Scan the QR
    }
})()
