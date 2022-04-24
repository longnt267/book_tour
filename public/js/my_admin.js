$(document).ready(function() {
    // Double click button submit
    $('#frm').submit(function() {
        $(this).find("button[type='submit']").prop('disabled', true);
    });

    // Show password login
    $('.show-pass-login').click(function() {
        a = $(this).parent().find('div>input').attr('type');
        if ($(this).parent().find('div>input').attr('type') === "password") {
            $(this).parent().find('div>input').attr('type', 'text');
            $(this).find('.mdi').removeClass('mdi-eye').addClass('mdi-eye-off');
        } else {
            $(this).parent().find('div>input').attr('type', 'password');
            $(this).find('.mdi').removeClass('mdi-eye-off').addClass('mdi-eye');
        }
    });

    // Show password reset, change password
    $('.show-pass').click(function() {
        a = $(this).parent().find('input').attr('type');
        if ($(this).parent().find('input').attr('type') === "password") {
            $(this).parent().find('input').attr('type', 'text');
            $(this).find('.mdi').removeClass('mdi-eye').addClass('mdi-eye-off');
        } else {
            $(this).parent().find('input').attr('type', 'password');
            $(this).find('.mdi').removeClass('mdi-eye-off').addClass('mdi-eye');
        }
    });
});

function removeData(obj, tblObj, btnObj, imgObj, message = "")
{
    $('body').on('click', obj, function(e) {
        e.preventDefault();

        var me = $(this),
            url = me.attr('href'),
            csrf_token = $('meta[name="csrf-token"]').attr('content');

        swal({
            title: '',
            text: 'Bạn có muốn xóa thông tin?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#f15e5d',
            cancelButtonColor: '#c1c1c1',
            confirmButtonText: 'Có',
            cancelButtonText: 'Không',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: {
                        '_method': 'DELETE',
                        '_token': csrf_token,
                    },
                    success: function(response) {
                        console.log(response);
                        if (response == 1) {
                            toastr.options.positionClass = 'toast-top-right';
                            toastr.options.timeOut = 4000;
                            toastr.warning(message);
                        } else {
                            $(tblObj).DataTable().ajax.reload(null, false);
                            if (btnObj != "") {
                                $(btnObj).click();
                                sessionStorage.removeItem("oldImage");
                                if (imgObj) {
                                    var oldImg = sessionStorage.getItem("oldImage");
                                    if (oldImg != null) {
                                        var linkImage = '{{ URL::asset("/storage/categories/") }}/' + oldImg;
                                        $('#preview').attr('src', linkImage)
                                    } else {
                                        $('#preview').attr('src', '#')
                                    }
                                }
                            }
                            toastr.options.positionClass = 'toast-top-right';
                            toastr.options.timeOut = 4000;
                            toastr.success("Xóa thông tin thành công");
                        }
                    },
                    error: function(xhr) {
                        console.log(xhr);
                        toastr.options.positionClass = 'toast-top-right';
                        toastr.options.timeOut = 4000;
                        toastr.error("Xóa thông tin thất bại");
                    }
                });
            }
        });
    });
}

function readURL(input, imgControlName) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $(imgControlName).attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}

function previewImage(obj, tblObj, err1, err2, flag, check) {
    $('body').on('change', obj, function () {
        flag = 1, check = 1;
        var picsize = (this.files[0].size);
        var ext = $(this).val().split('.').pop().toLowerCase();
        if (picsize > 0) {
            if ($.inArray(ext, ['png','jpg','jpeg', 'webp', 'svg']) == -1){
                $(err1).html('<span class="text-danger">Hình ảnh không đúng định dạng: jpeg, png, jpg.</span>');
                $(obj).val("");
                $(err2).hide();
                check = 0;
            } else {
                check = 1;
            }
            if (picsize > 10500000){
                $(err1).html('<span class="text-danger">Hình ảnh không được lớn hơn 10Mb.</span>');
                $(obj).val("");
                $(err2).hide();
                flag = 0;
            }else{
                flag = 1;
            }
            if (flag == 1 && check == 1){
                $(err1).html('');
                var imgControlName = tblObj;
                readURL(this, imgControlName);
            }
        }
    })
}

function ChangeToSlug(title, inputSlug) {
    var title, slug;
    //Lấy text từ thẻ input title 
    title = title;
    //Đổi chữ hoa thành chữ thường
    slug = title.toLowerCase();
    //Đổi ký tự có dấu thành không dấu
    slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
    slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
    slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
    slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
    slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
    slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
    slug = slug.replace(/đ/gi, 'd');
    //Xóa các ký tự đặt biệt
    slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
    //Đổi khoảng trắng thành ký tự gạch ngang
    slug = slug.replace(/ /gi, "-");
    //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
    //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
    slug = slug.replace(/\-\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-/gi, '-');
    slug = slug.replace(/\-\-/gi, '-');
    //Xóa các ký tự gạch ngang ở đầu và cuối
    slug = '@' + slug + '@';
    slug = slug.replace(/\@\-|\-\@|\@/gi, '');
    //In slug ra textbox có id “slug”
    document.getElementById(inputSlug).value = slug;
}

function sortPosition(obj, tblObj) {
    $('body').on('click', obj, function(e) {
		e.preventDefault();
		var me = $(this),
			url = me.data('link'),
            type = me.data('type'),
            id = me.data('id'),
            position = me.data('position');
        
		$.ajax({
            url: url,
            cache: false,
			type: 'GET',
			data: {
				'id': id,
                'type': type,
                'position': position
            },
            beforeSend: function(){
                $('.loading').show();
            },
			success: function(response){
                toastr.options.positionClass = 'toast-top-right';
                toastr.options.timeOut = 4000;
                $(tblObj).DataTable().ajax.reload(null, false);
                $('.loading').hide();
                if (response[0] == 1) {
                    if (response[1] == 'up') {
                        toastr.success('Thay đổi thứ tự thành công');
                    } else {
                        toastr.success('Thay đổi thứ tự thành công');
                    }
                } else {
                    if (response[1] == 'up') {
                        toastr.warning('Đã có thứ tự nhỏ nhất');
                    } else {
                        toastr.warning('Đã có thứ tự lớn nhất');
                    }
                }
			},
			error: function(xhr){
				// console.log(xhr);
                toastr.options.positionClass = 'toast-top-right';
                toastr.options.timeOut = 4000;
				toastr.error('Thay đổi vị trí thất bại');
			}
		});
	});
}