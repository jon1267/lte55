$('.delete-form').on('click', '.delete-button', function () {
    event.preventDefault();
    console.log('modal');

    $('#your-sure-delete').modal()                      // initialized with defaults
    $('#your-sure-delete').modal({ keyboard: false })   // initialized with no keyboard (!обязательно)
    $('#your-sure-delete').modal('show')                // initializes and invokes show immediately

    var id = this.getAttribute("data-param");
    deleteWithConfirm(id);

    return false;

});

function deleteWithConfirm(id) {
    //event.preventDefault();
    console.log(id);

    //$('#your-sure-delete').modal()                      // initialized with defaults
    //$('#your-sure-delete').modal({ keyboard: false })   // initialized with no keyboard (!обязательно)
    //$('#your-sure-delete').modal('show')                // initializes and invokes show immediately

    //$('#your-sure-delete').modal('hide')
    return false;
}

/**
 * Проблемы трудности непонятки...хочется сделать удален с confirmation
 * Щас как бы  хоть окно подтверждения и показывается но от нажатия кнопок ничего не зависит
 * Возвращаю как было по кнопе удалить все тупо удалаяется
 *
$('.modal-footer').on('click', '.delete', function () {
    //console.log('нажато удалить');

    $.ajax({
        type: 'post',
        url: urlDelete + id ,
        data: {
            '_token': $('input[name=_token]').val(),
            'id': $('.id').text()
        },
        success: function (data) {
            $('.item' + $('.id').text()).remove();
        }
    });
    $('#your-sure-delete').modal('hide')
    return false
});
*/


