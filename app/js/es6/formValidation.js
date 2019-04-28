function validateEmail (email) {
    const regexEmail = /(?!.*\.{2})^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i
    if (!regexEmail.test(email)) {
        return false
    } else {
        return true
    }
}

function validateEmptyField (fieldText) {
    if (fieldText.trim().length === 0) {
        return false
    } else {
        return true
    }
}

function showMessage (message, input) {
    const newElement = document.createElement('div')
    newElement.textContent = message
    newElement.classList.add('error-message')
    input.after(newElement)
}

function removeErrorMessages (messages) {
    if (messages.length !== 0 ) {
        messages.forEach(data => {
            data.remove()
        })
    }
}

function removeErrorHighlighter (inputs, content) {
    inputs.forEach(data => {
        if (data.classList.contains('error')) {
            data.classList.remove('error')
        }
    })
    if (content.classList.contains('error')) {
        content.classList.remove('error')
    }
}

const form = document.getElementById('form-email')
form.addEventListener('submit', event => {
    event.preventDefault()
    let error = false
    let inputs = document.querySelectorAll('input')
    let content = document.getElementById('content-email')
    let errorMessages = document.querySelectorAll('.error-message')
    removeErrorMessages(errorMessages)
    removeErrorHighlighter(inputs, content)
    inputs.forEach(data => {
        let message = ''
        if (data.type === 'text') {
            const type = data.getAttribute('data-type')
            if (type === 'email') {
                if(!validateEmptyField(data.value)) {
                    data.classList.add('error')
                    message += 'Required Field!'
                    if (!error) {
                        error = true
                    }
                } else {
                    if (!validateEmail(data.value)) {
                        data.classList.add('error')
                        message += 'Invalid Email'
                        if (!error) {
                            error = true
                        }
                    }
                }
            }
            if (type === 'title') {
                if (!validateEmptyField(data.value)) {
                    data.classList.add('error')
                    message += 'Required Field'
                    if (!error) {
                        error = true
                    }
                }
            }
            if (message.length!== 0) {
                showMessage(message, data)
            }
        }
    })
    let message = ''
    if (!validateEmptyField(content.value)) {
        content.classList.add('error')
        message += 'Required Field'
        if (!error) {
            error = true
        }
    }
    if (message.length !== 0) {
        showMessage(message, content)
    }
})