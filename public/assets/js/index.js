$(document).ready(function () {
    //delete smpt
    $('.delete-faq,.delete-image').click(function () {
        let url = $(this).attr('data-action-url')
        let token = $('meta[name="csrf-token"]').attr('content')
        let modal = new bootstrap.Modal(document.getElementById('jsConfirmModel'))
        modal.show()
        $('#jsconfirm').attr('href', url);
        $('#jsconfirm').click(function () {
            modal.hide()
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