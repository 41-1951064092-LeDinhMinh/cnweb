$(document).ready(function(){
    function edit_data(id,text,column_name){
        $.ajax({
            url:"process-update-info.php",
            method:"POST",
            data:{id:id,text:text,column_name:column_name},
            success:function(data){
                alert('Chỉnh Sửa dữ liệu thành công');
                // fetch_data();
            }
        });
    }
    $(document).on('blur','.hovaten',function(){
        var id = $(this).data('id1');
        var text = $(this).text();
        edit_data(id,text,'hoVaTen');
    })
    
    $(document).on('blur','.gioitinh',function(){
        var id = $(this).data('id2');
        var text = $(this).text();
        edit_data(id,text,'gioiTinh');
    })
    
    $(document).on('blur','.sodienthoai',function(){
        var id = $(this).data('id3');
        var text = $(this).text();
        edit_data(id,text,'soDienThoai');
    })
    
    $(document).on('blur','.diachi',function(){
        var id = $(this).data('id4');
        var text = $(this).text();
        edit_data(id,text,'diaChi');
    })
    
    $(document).on('blur','.socmnd',function(){
        var id = $(this).data('id5');
        var text = $(this).text();
        edit_data(id,text,"soCMT");
    })
})
