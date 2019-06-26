import '@coreui/coreui'

$('.card-checkbox').on('click', event => {
    const _this = $(event.currentTarget)
    const checkbox = _this.find('input')

    if (checkbox[0].checked) {
        _this.removeClass('card-checkbox-checked')
        checkbox.attr('checked', false)
    } else {
        _this.addClass('card-checkbox-checked')
        checkbox.attr('checked', true)
    }

    $('#btn-delete-many').attr(
        'disabled',
        !($('.card-checkbox-checked').length > 0)
    )
})
