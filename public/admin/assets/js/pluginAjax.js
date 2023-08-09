function getObjectKey(obj, value) {
    return Object.keys(obj).find(key => obj[key] === value);
}

function ajaxRequest(data, methodForm) {
    return new Promise(function(resolve, reject) {
        const url = config.urlAdd;
        $.ajax({
            url: url,
            method: methodForm,
            data: data,
            dataType: 'JSON',
            success: function(response) {
                if ($.isEmptyObject(response.error)) {
                    resolve(response.success); // Trả về thành công
                } else {
                    $.each(response.error, function(key, value) {
                        var errorAlert = '<div class="py-[18px] mt-4 px-6 font-normal font-Inter text-sm rounded-md bg-danger-500 bg-opacity-[14%] text-danger-500">' +
                            '<div class="flex items-start space-x-3 rtl:space-x-reverse">' +
                            '<div class="flex-1">' + value + '</div>' +
                            '</div>' +
                            '</div>';
                        $('[name="' + key + '"]').next('.error-message').html(errorAlert);
                    });
                    reject(response.error); // Trả về lỗi
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                reject(errorThrown); // Trả về lỗi khi gặp lỗi trong quá trình gửi yêu cầu Ajax
            }
        });
    });
}



