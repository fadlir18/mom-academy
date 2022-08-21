var base_url = window.location.origin + '/';
var selectClassCategory = $('#select-category');

$('#loginForm').submit(function(e) {
    var token = $(this).attr('content');
    e.preventDefault();
    const val = $(this).serialize()
    console.log(val)
    login(val,token);
})

$('#registerForm').submit(function(e) {
    var token = $(this).attr('content');
    e.preventDefault();
    const val = $(this).serialize()
    console.log(val)
    register(val,token);
})

$('#incomeForm').submit(function(e) {
    var token = $(this).attr('content');
    e.preventDefault();
    const val = $(this).serialize()
    console.log(val)
    registerIncome(val,token);
})

$('#PaymentForm').submit(function(e) {
    var token = $(this).attr('content');
    e.preventDefault();
    const val = $(this).serialize()
    console.log(val)
    registerPayment(val,token);
})

function login(data,token) {
    $.ajax({
        url: base_url + "login",
        type: "POST",
        data:data,
        dataType: 'json',
        beforeSend: function () {
            var spiner = $('.btn-spinner-login')
            spiner.html(` <div class="spinner-border" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>`)
            // $('#modal-default .modal-body').html('Loading....');
            // $('#modal-default .modal-footer .modal-save').attr('disabled', 'disabled');

        },
        headers: {
            'X-CSRF-TOKEN': token
        },
        success: function (data) {
            console.log(data)
            var spiner = $('.btn-spinner-login').find('.spinner-border')
            spiner.fadeOut(200)
            if (data['code'] == 200) {
                // $('#modalRegist .modal-body').html('<div class="alert alert-success">' + data['message'][0] + '</div>');
                window.location.href = '/'
            } else {
                let message = '<ul>'
                for (const row of data['message']) {
                    message += `<li>${row}</li>`
                }
                message += '</ul>'
                console.log(message)
                $('#modalLogin .form-group.alert').html('<div class="alert alert-danger">' + message + '</div>');
            }

            // setTimeout(function () {
            //     $('#modal-default .modal-body').html('Loading....');
            //     $('#modal-default .modal-footer .modal-save').removeAttr('disabled');

            //     $('#modal-default').modal('hide');
            // }, 2000);
        }
    });
}

function register(data,token) {
    $.ajax({
        url: base_url + "register",
        type: "POST",
        data:data,
        dataType: 'json',
        beforeSend: function () {
            var spiner = $('.btn-spinner-login')
            spiner.html(` <div class="spinner-border" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>`)
            // $('#modal-default .modal-body').html('Loading....');
            // $('#modal-default .modal-footer .modal-save').attr('disabled', 'disabled');

        },
        headers: {
            'X-CSRF-TOKEN': token
        },
        success: function (data) {
            console.log(data['message'])
            var spiner = $('.btn-spinner-login').find('.spinner-border')
            spiner.fadeOut(200)
            if (data['code'] == 200) {
                // $('#modalRegist .modal-body').html('<div class="alert alert-success">' + data['message'][0] + '</div>');
                window.location.href = '/'
            } else {                
                let message = '<ul>'
                for (const row of data['message']) {
                    message += `<li>${row}</li>`
                }
                message += '</ul>'
                console.log(message)
                $('#modalRegist .form-group.alert').html('<div class="alert alert-danger">' + message + '</div>');
            }

            // setTimeout(function () {
            //     $('#modal-default .modal-body').html('Loading....');
            //     $('#modal-default .modal-footer .modal-save').removeAttr('disabled');

            //     $('#modal-default').modal('hide');
            // }, 2000);
        }
    });
}

function registerIncome(data,token) {
    $.ajax({
        url: base_url + "get-income/register",
        type: "POST",
        data:data,
        dataType: 'json',
        beforeSend: function () {
            var spiner = $('.btn-spinner-login')
            spiner.html(` <div class="spinner-border" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>`)
            // $('#modal-default .modal-body').html('Loading....');
            // $('#modal-default .modal-footer .modal-save').attr('disabled', 'disabled');

        },
        headers: {
            'X-CSRF-TOKEN': token
        },
        success: function (data) {
            console.log(data['message'])
            var spiner = $('.btn-spinner-login').find('.spinner-border')
            spiner.fadeOut(200)
            if (data['code'] == 200) {
                // $('#modalRegist .modal-body').html('<div class="alert alert-success">' + data['message'][0] + '</div>');
                $('#modalIncome .form-group.alert').html('<div class="alert alert-success">Register Sukses</div>');
                setTimeout(function() { 
                    window.location.href = '/get-income'
                }, 2000);                
            } else {                
                let message = '<ul>'
                for (const row of data['message']) {
                    message += `<li>${row}</li>`
                }
                message += '</ul>'
                console.log(message)
                $('#modalIncome .form-group.alert').html('<div class="alert alert-danger">' + message + '</div>');
            }          
        }
    });
}

function registerPayment(data,token) {
    $.ajax({
        url: base_url + "addorder",
        type: "POST",
        data:data,
        dataType: 'json',
        beforeSend: function () {
            var spiner = $('.btn-spinner-login')
            spiner.html(` <div class="spinner-border" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>`)
            // $('#modal-default .modal-body').html('Loading....');
            // $('#modal-default .modal-footer .modal-save').attr('disabled', 'disabled');

        },
        headers: {
            'X-CSRF-TOKEN': token
        },
        success: function (data) {
            console.log(data['message'])
            var spiner = $('.btn-spinner-login').find('.spinner-border')
            spiner.fadeOut(200)
            if (data['code'] == 200) {
                // $('#modalRegist .modal-body').html('<div class="alert alert-success">' + data['message'][0] + '</div>');
                $('#modalPayment .form-group.alert').html('<div class="alert alert-success">Register Sukses</div>');
                setTimeout(function() { 
                    window.location.href = '/orders'
                }, 2000);                
            } else {                
                let message = '<ul>'
                for (const row of data['message']) {
                    message += `<li>${row}</li>`
                }
                message += '</ul>'
                console.log(message)
                $('#modalPayment .form-group.alert').html('<div class="alert alert-danger">' + message + '</div>');
            }          
        }
    });
}

// selectClassCategory.change(function () { //voucher single
//     var _val = $(this).val();    
//     window.location = base_url+'class?data_type='+_val
// })
$('#academyBtn').click(function() {
    var _val = selectClassCategory.val()  
    if (_val === '') {
        return false
    }  
})
$('#incomeForm [name="category"]').on('change', function() {
     let _val = this.value
     if (_val === 'others'){
         $('.select-hd').fadeIn(500)
     }else{
        $('.select-hd').fadeOut(500)
        $('[name="category2"]').val('')
     }
});