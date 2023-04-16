// confirm delete


$(".confirmDelete").click(function (e) {
    var module = $(this).attr('module');
    var moduleid = $(this).attr('moduleid');
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
          Swal.fire(
            'Deleted!',
            'Your file has been deleted.',
            'success'
          )
          window.location = "/delete-"+module+"/"+moduleid;
        }
      })

});




