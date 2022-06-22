const response = (res, statusCode = 200, success = false, message = '', data = {}) => {
    res.status(statusCode)
    res.json({
        success,
        message,
        data,
    })

    res.end()
}

export default response
