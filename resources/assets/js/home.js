$(function(){
    var table = $('#posts-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: url_users,
        columns: [
            { data: 'id', name: 'id' },
            { data: 'title', name: 'title' }, 
            { data: 'name', name: 'users.name' },
            { data: 'photo', name: 'thumbnail' },
            { data: 'action', name: 'action' }
        ]
    });
    /*$('#posts-table').on('click','.btn-del',function(){
        var user_id = $(this).attr('userId');
        $.ajax({
            type: 'delete',
            url: base_url + 'users/'+ user_id,
            success: function(response){
                table.ajax.reload();
            }
        })
    });*/
    $('#posts-table').on('click','.btn-del',function(){
        var user_id= $(this).attr('userId');
        swal({
          title: "Bạn có muốn xóa không?",
          /*text: "Once deleted, you will not be able to recover this imaginary file!",*/
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            $.ajax({
            type: 'delete',
             url: base_url + 'users/'+ user_id,
            success:function(response){
                table.ajax.reload();
            }
        })
            swal("Poof! Your imaginary file has been deleted!", {
              icon: "success",
            });
          } else {
            swal("Your imaginary file is safe!");
          }
        });
    })
    $('#posts-table').on('click','.btn-show',function(){
        $('#show').modal('show');
        var user_id = $(this).attr('userId');
        $.ajax({
            type: 'get',
            url: base_url + 'users/'+ user_id,
            success: function(response){
              /* $('.modal-body').append('<div>'+response.title+'<br>'+response.content+' </div>');*/
              $('#title').text(response.title);
             /* $('#thumbnail').text(response.thumbnail);*/
              $('#content').html(response.content);
              $('#img').attr('src',response.thumbnail);
            }
        })
    });
});