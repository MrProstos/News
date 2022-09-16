function selectSrc() {
    $('.select__source').change(function () {
        $.get('/src/list/', function (data, status) {
            console.log(data, status)
        })
    })
}
