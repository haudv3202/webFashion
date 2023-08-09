// var form = document.getElementById('formAdd');
document.getElementById(getObjectKey(config,config.title_form_add)).innerText = config.title_form_add;
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).ready(function() {
    $('#submitButton').click(function() {
        var form = $('#formAdd');
        var formData = new FormData();
        const methodForm = form.attr('method').toUpperCase();
        // Chuyển đổi giá trị thành đối tượng dạng key-value
        var formValues = form.serializeArray();

        // Thêm các giá trị vào FormData
        $.each(formValues, function(index, field) {
            formData.append(field.name, field.value);
        });

        console.log(formValues)
        console.log(formData)

        const file = $('#fileInput');
        const name = file.attr('name');
        if (file[0].files.length > 0) {
            formData.append(name, file[0].files[0]); // Thêm tệp tin vào FormData
        }

        console.log(formData);
        // ajaxRequest(data, methodForm)
        //     .then(function(response) {
        //         // Xử lý kết quả thành công
        //         console.log(response);
        //     })
        //     .catch(function(error) {
        //         // Xử lý lỗi
        //         console.error(error);
        //     });
    });
});

$(document).ready(function() {
    // ...

    // Xóa thông báo lỗi khi người dùng thay đổi giá trị của trường nhập liệu
    $('#formAdd input, #formAdd select').on('input change', function() {
        $(this).next('.error-message').empty(); // Xóa nội dung của phần tử .error-message
    });

    // ...
});


