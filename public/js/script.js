'use strict'

// Processing the search button click
function searchAction()
{
    $('.search__button').click(function () {
        let startDate = $('.input__startDate').val()
        let endDate = $('.input__endDate').val()
        let source = $('.select__source option:selected').val()
        let searchWord = $('.input__search').val()

        console.log(searchWord)
        if (source === $('.default__select').val()) {
            window.location.href = `/news/?startDate=${startDate}&endDate=${endDate}&searchWord=${searchWord}`
            return
        }
        window.location.href = `/news/${source}/?startDate=${startDate}&endDate=${endDate}&searchWord=${searchWord}`
    })
}

function addCreator()
{
    let data = $('.form__creator-add').serializeArray()

    $.ajax({
        url: '/src/add',
        method: 'POST',
        data: data,
        success: function (data) {
            alert('RSS поток ' + data['creator'] + ' добавлен')
        },
        error: function (data) {
            let msg = JSON.parse(data.responseText)
            alert(msg['message'])
        }
    })
}
