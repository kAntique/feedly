$(function(){
    $('#modalButton').click(function() {
        $('#modal').modal('show')
          .find('#modalContent')
          .load($(this).attr('value'));
    });
    $('.popupModal').click(function(e) {
      e.preventDefault();
      $('#modal').modal('show').find('#id_playlist')
      .load($(this).attr('value'));
    

    });
});
