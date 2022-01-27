(function($) {
  'use strict';
  $(function() {
    var todoListItem = $('.todo-list');
    var todoListInput = $('.todo-list-input');
    //Thêm
    $('.todo-list-add-btn').on("click", function(event) {
      event.preventDefault();

      var item = $(this).prevAll('.todo-list-input').val();

      if (item) {
        todoListItem.append("<li><div class='form-check'><label class='form-check-label'><input class='checkbox' type='checkbox'/>" + item + "<i class='input-helper'></i></label></div><i class='remove mdi mdi-close-circle-outline'></i></li>");
        // var value = todoListInput.val("");
        $.post( "./request/todolist.php",{
          type: "add",
          value: item
        });
        // function(data,status){
        //   alert("Data: " + data + "\nStatus: " + status);
        // });
      }

    });

    // Check list
    todoListItem.on('change', '.checkbox', function() {
      if ($(this).attr('checked')) {
        $(this).removeAttr('checked');
      } else {
        $(this).attr('checked', 'checked');
      }

      $(this).closest("li").toggleClass('completed');

    });
    // Xóa task
    todoListItem.on('click', '.remove', function() {
      $(this).parent().remove();
    });

  });
})(jQuery);