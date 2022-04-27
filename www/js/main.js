function addToCart(itemId) {
    $.ajax({
        type: 'POST',
        async: true,
        url: "/cart/addtocart/" + itemId,
        contentType: "application/json; charset=utf-8",
        dataType: "json",

        success: data => {
            if (data['success']) {
                $('#cartCntItems').html(data['cntItems']);

                $('#addCart_' + itemId).hide();
                $('#removeCart_' + itemId).show();
            }
        },
        error: function (error, err, e) {
            alert(e);
        }
    })
}

function deleteFromCart(itemId) {
    $.ajax({
        type: 'POST',
        url: '/cart/deletefromcart/' + itemId,
        dataType: 'json',

        success: data => {
            if (data['success']) {
                $('#cartCntItems').html(data['cntItems']);

                $('#addCart_' + itemId).show();
                $('#removeCart_' + itemId).hide();
            }
        }
    });
}

function conversionPrice(itemId) {
    let count = $('#itemCnt_' + itemId).val();
    let price = $('#itemPrice_' + itemId).attr('value');
    let fullPrice = price * count;

    $('#itemRealPrice_' + itemId).html(fullPrice);
}

function getData(obj) {
    var data = {};
    console.log(obj);
    $('input, textarea, select', obj).each(function () {
        if (this.name && this.name != '') {
            data[this.name] = this.value;
            console.log('data[' + this.name + '] = ' + this.value);
        }
    });

    return data;
}

function registerNewUser() {
    var postData = getData('#registerBox');

    $.ajax({
        type: 'POST',
        url: '/user/register',
        data: postData,
        dataType: 'json',
        success: function (data) {
            if (data['success']) {
                $('#userBox').show();
                $('#loginBox').hide();

                $('#userLink').attr('href', '/user');
                $('#userLink').html(data['userName']);

                $('#registerBox').hide();
            } else {
                alert(data['message']);
            }
        },
        error: () => {
            alert("POCHEMU");
        }
    });
}

function login() {
    var postData = getData('#loginBox');

    $.ajax({
        type: 'POST',
        url: '/user/login',
        data: postData,
        dataType: 'json',
        success: (data) => {
            if(data['success']) {
                $('#loginBox').hide();
                $('#registerBox').hide();
                $('#userBox').show();
                $('#userLink').attr('href', '/user');
                $('#userLink').html(data['email']);
            } else {
                alert(data['message']);
            }
        }
    });
}

function logout() {
    $.ajax({
        type: 'POST',
        url: '/user/logout',
        success: function() {
            $('#userBox').hide();

            $('#loginBox').show();
            $('#registerBox').show();
        },
        error: () => {
            alert('NET');
        }
    });
}