function show_Product($id,$name,$images,$price,description_en,description_vi){
  Swal.fire({
   showConfirmButton: false,
   showCloseButton:true,
   title: '<strong>'+$name+'</strong>',
   imageUrl: '../../upload/'+$images,
   html: '<b>Description-EN:</b> '+description_en+'<br>'+'<b>Description-VN:</b> '+description_vi,
   footer: 'Price:' + $price,

 })
}

function edit_Product($id,$name,$images,$price,description_en,description_vi){
  Swal.fire({
    title: '<strong>Edit ID '+$id+'</strong>',
    showCloseButton:true,
    confirmButtonColor: '#3085d6',
    confirmButtonText: 'Yes, change it!',
    showCancelButton: true,
    cancelButtonColor: '#d33',
    html: '<input class="swal2-input" type="text" name="editName" value="'+$name+'"/><br><input class="swal2-input" type="text" name="editDecription_en" value="'+description_en+'"/><br><input class="swal2-input" type="text" name="editDecription_vi" value="'+description_vi+'"/><br><input class="swal2-input" type="text" name="editPrice" value="'+$price+'"/>'
  })
}

function delete_Product($id){
  var id = $id;
  Swal.fire({
    title: 'Are you sure?',
    text: "You won't be able to revert this!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, delete it!'
  }).then((result) => {
    if (result.isConfirmed) {
     $.ajax({
      type : "POST", 
      url  : "./request/product.php", 
      data : {
        type: "remove_product",
        id : id
      },
      success: function(res){  
        location.reload();
      }
    });
     Swal.fire(
      'Deleted!',
      'Your file has been deleted.',
      'success'
      )
   }
 })
}