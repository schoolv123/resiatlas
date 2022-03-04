$(document).ready(function () {
    //delete smpt
    $('.delete-faq').click(function () {
        let url = $(this).attr('data-action-url')
        let token = $('meta[name="csrf-token"]').attr('content')
        let modal = new bootstrap.Modal(document.getElementById('jsConfirmModel'))
        modal.show()
        console.log(url)
        $('#jsconfirm').click(function () {
            modal.hide()
            $.ajax({
                type: "DELETE",
                url: url,
                data: {
                    _token: token
                },
                success: (data) => {
                    if (data.status) {
                        giveAlert('success', data.message)
                    } else {
                        giveAlert('danger', data.message)
                    }
                    console.log(data)
                    setInterval(() => {
                        location.reload()
                    }, 3000)
                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    giveAlert('danger', "Status: " + textStatus + " Error: " + errorThrown)
                    console.log("Status: " + textStatus + " Error: " + errorThrown)
                    setInterval(() => {
                        location.reload()
                    }, 3000)
                }
            })
        })
    })
})

//give alert function
const giveAlert = (alertType = null, msg) => {
    document.querySelector('.js-alert').style = 'position:fixed width: 500px top:20% left: 41% z-index: 1 visibility: visible'
    $('.js-alert').addClass('show')
    $('.js-alert').removeClass('alert-danger')
    $('.js-alert').removeClass('alert-info')
    $('.js-alert').removeClass('alert-warning')
    $('.js-alert').removeClass('alert-success')
    $('.js-alert').removeClass('alert-primary')
    $('#jsAlertMsg').html(msg)
    if (alertType == 'success') {
        $('.js-alert').addClass('alert-success')
    } else if (alertType == 'waring') {
        $('.js-alert').addClass('alert-warning')
    } else if (alertType == 'info') {
        $('.js-alert').addClass('alert-info')
    } else if (alertType == 'danger') {
        $('.js-alert').addClass('alert-danger')
    } else {
        $('.js-alert').addClass('alert-primary')
    }
    //close js alert 
    $('#js-alert-close').click(function () {
        document.querySelector('.js-alert').style = 'visibility: hidden !importent'
    })
}