jQuery(document).ready(function () {
    //
    $('.lastcomplete').click(function (e) {
        var mail = $(this).attr('mail');
//        alert(mail);
        var orderitemid = $(this).attr('orderitemid');
        var orderid = $(this).attr('orderid');
        $('#mailaddress').val(mail);
        $('#orderitem_id').val(orderitemid);
         $('#order_id_').val(orderid);
        
    });
    $('.removestyle').click(function (e) {
        var userid = $(this).attr('user_id');
        var workstyle = $(this).attr('style');
        $.ajax({
            type: "GET",
            url: removestyle,
            data: "userid=" + userid + "&workstyle=" + workstyle,
            dataType: "json",
            success: function (data) {
                console.log(data);
                if (data.results == "success") {
                    location.reload();
                }
            }
        });
    });

    $('.close_note').click(function (e) {
        location.reload();
    });
    $('.rejectby').click(function (e) {
        var orderitemid = $(this).attr('orderitemid');
        $.ajax({
            type: "GET",
            url: rejectby,
            data: "orderitemid=" + orderitemid,
            dataType: "json",
            success: function (data) {
                $('#reject_by').html(data);
            }
        });
    });
    $('.reject-order').click(function (e) {
        var orderitemid = $(this).attr('orderitemid');
        var orderid = $(this).attr('orderid');
        var orderusersid = $(this).attr('orderusersid');
        $('#orderusersid').val(orderusersid);
        $('#orderitemid_reject').val(orderitemid);
        $('#orderid_reject').val(orderid);
//        alert();
    });

    $('.order_complete').click(function (e) {
        var orderitemid = $(this).attr('orderitemid');
        var orderid = $(this).attr('orderid');
        $('#orderitemid_complete').val(orderitemid);
        $('#orderid_complete').val(orderid);
    });

    $('.reaction').click(function (e) {
        var orderitemid = $(this).attr('orderitemid');
        $('.orderitemid').val(orderitemid);
    });

    $('.notehistory').click(function (e) {
        var orderitemid = $(this).attr('orderitemid');
        $('#orderitemid_note').val(orderitemid);
        $.ajax({
            type: "GET",
            url: getnote,
            data: "orderitemid=" + orderitemid,
            dataType: "json",
            success: function (data) {
                $('#message').html(data);
            }
        });
    });

    $('.cencelorder').click(function (e) {
        var mail = $(this).attr('e-mail');
        var orderid = $(this).attr('orderid');
        var orderitemid = $(this).attr('orderitemid');
//        alert(orderitemid);
        $('.mailaddress').val(mail);
        $('#order_id_').val(orderid);
        $('#orderitemid_').val(orderitemid);
    });

    $('.assign').click(function (e) {
        var userroleId = $(this).attr('userroleId');
        var orderid = $(this).attr('orderid');
        $('#orderid').val(orderid);
        var orderitemid = $(this).attr('orderitemid');
        $('#orderitemid').val(orderitemid);
        $.ajax({
            type: "GET",
            url: getstaffname,
            data: "userroleId=" + userroleId,
            dataType: "json",
            success: function (data) {
                console.log(data);
                //if (data.results == "success") {
                $('#mySelect').html(data);

                //}
            }
        });
    });
    $('#currentpassworderror').hide();
    $('#newpassword').click(function (e) {
        checkpassword();
    });
    $('#editpassword').click(function (e) {
        $('#currentpassworderror').hide();
    });

    function checkpassword() {
        var password = $("#editpassword").val();
//        alert(password);
        var userid = $("#userid").val();
//        alert(userid);
        if (password == '') {
            $('#currentpassworderror').hide();
            return false;
        } else {
            $.ajax({
                type: "GET",
                url: verifypassword,
                data: "password=" + password + "&userid=" + userid,
                dataType: "json",
                success: function (data) {
                    if (data.results == "success") {
                        //location.reload();
                    } else {
                        $("#editpassword").val('');
                        $("#newpassword").val('');
                        $("#repassword").val('');
                        $('#currentpassworderror').show();
                        $("#currentpassworderror").text(' Current Password invalid!').css("color", "#a94442");
//                        $('#step-1').trigger('click');
                        return;
                    }
                }
            });
        }
    }

    $(".theme-color-user").click(function () {
        var userid = $(this).attr('user_id');
        var themename = $(this).attr('data-style');

        $.ajax({
            type: "GET",
            url: settheme,
            data: "userid=" + userid + "&themename=" + themename,
            dataType: 'json',
            success: function (data) {
                if (data.results == "success") {
                    location.reload();
                }
            }
        });
    });

    $('#emailerror').hide();
    $("#password").click(function (e) {
        checkEmail();
    });
    $('#phonenumber').click(function (e) {
        checkEmail();
    });
    $('#task').click(function (e) {
        checkEmail();
    });
    $("#address").click(function (e) {
        checkEmail();
    });
    $("#btn-submit").click(function (e) {
        checkEmail();
    });
    $("#email").click(function (e) {
        $("#emailerror").text('');
    });

    function checkEmail() {
        var email = $("#email").val();
        if (email == '') {
            $('#emailerror').hide();
            return false;
        } else {
            $.ajax({
                type: "GET",
                url: verify,
                data: "email=" + email,
                dataType: "json",
                success: function (data) {
                    if (data.results == "success") {
                    } else {
                        $("#email").val('');
                        $('#emailerror').show();
                        $("#emailerror").text(email + ' e-mail address already exists').css("color", "#a94442");
                        $('#step-1').trigger('click');
                        return;
                    }
                }
            });
        }
    }
    $(".editskill").click(function () {
        var skillId = $(this).attr('skill-id');
        var skillname = $(this).attr('skillname');
        var skillnote = $(this).attr('skill-note');
        $('.skill_id').val(skillId);
        $('#skillname').val(skillname);
        $('#skillnote').val(skillnote);

    });
    $(".userstatus").click(function () {
        var userId = $(this).attr('user_id');
        $.ajax({
            type: "GET",
            url: getuserdetails,
            data: "userId=" + userId,
            dataType: 'json',
            success: function (data) {
                console.log(data);
                if (data.results == "success") {
                    $('.userid').val(data.id);
                    var worktask = data.worktask.split(",");
                    $('.taskedit').val(worktask);
                }
            }
        }
        );
    });
});