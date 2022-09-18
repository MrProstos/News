function searchAction() {
    $('.search__button').click(function () {
        let startDate = $('.input__startDate').val()
        let endDate = $('.input__endDate').val()
        let source = $('.select__source option:selected').val()
        if (source === $('.default__select').val()) {
            window.location.href = `/news/?startDate=${startDate}&endDate=${endDate}`
            return
        }
        window.location.href = `/news/${source}/?startDate=${startDate}&endDate=${endDate}`
    })

}
