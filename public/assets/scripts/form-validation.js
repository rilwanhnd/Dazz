var FormValidation = function () {
//alert();cancelorder  
var reject_form = function () {
//alert();
        var form1 = $('#rejectorder');
        var error1 = $('.alert-danger', form1);
        var success1 = $('.alert-success', form1);
//        alert();
        form1.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",
            rules: {
                rejectreason: {
                    minlength: 2,
                    required: true
                }
            },
            invalidHandler: function (event, validator) { //display error alert on form submit              
                success1.hide();
                error1.show();
                App.scrollTo(error1, -200);
            },
            highlight: function (element) { // hightlight error inputs
                $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
            },
            unhighlight: function (element) { // revert the change done by hightlight
                $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
            },
            success: function (label) {
                label
                        .closest('.form-group').removeClass('has-error'); // set success class to the control group
            },
            submitHandler: function (form) {
                success1.show();
                error1.hide();
                document.getElementById("rejectorder").submit();
            }
        });

    }
var submitnote_form = function () {
//alert();
        var form1 = $('#submitnote');
        var error1 = $('.alert-danger', form1);
        var success1 = $('.alert-success', form1);
//        alert();
        form1.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",
            rules: {
                comment: {
                    minlength: 2,
                    required: true
                }
            },
            invalidHandler: function (event, validator) { //display error alert on form submit              
                success1.hide();
                error1.show();
                App.scrollTo(error1, -200);
            },
            highlight: function (element) { // hightlight error inputs
                $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
            },
            unhighlight: function (element) { // revert the change done by hightlight
                $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
            },
            success: function (label) {
                label
                        .closest('.form-group').removeClass('has-error'); // set success class to the control group
            },
            submitHandler: function (form) {
                success1.show();
                error1.hide();
                document.getElementById("submitnote").submit();
            }
        });

    }
 var cancelorder_form = function () {

        var form1 = $('.cancelorder');
        var error1 = $('.alert-danger', form1);
        var success1 = $('.alert-success', form1);
//        alert();
        form1.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",
            rules: {
                reason: {
                    minlength: 2,
                    required: true
                }
            },
            invalidHandler: function (event, validator) { //display error alert on form submit              
                success1.hide();
                error1.show();
                App.scrollTo(error1, -200);
            },
            highlight: function (element) { // hightlight error inputs
                $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
            },
            unhighlight: function (element) { // revert the change done by hightlight
                $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
            },
            success: function (label) {
                label
                        .closest('.form-group').removeClass('has-error'); // set success class to the control group
            },
            submitHandler: function (form) {
                success1.show();
                error1.hide();
                document.getElementById("cancelorder").submit();
            }
        });

    }
    var createorder_form = function () {

        var form1 = $('.createorder');
        var error1 = $('.alert-danger', form1);
        var success1 = $('.alert-success', form1);
//        alert();
        form1.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",
            rules: {
                name: {
                    minlength: 2,
                    required: true
                },
                email:{
                    required:true,
                     email: true
                },
                phonenumber:{
                    required: true
                },
                address:{
                    required: true
                },
                photestyle:{
                    required: true
                },
                originalfile:{
                    required: true
                },
                needbydate:{
                    required: true
                }
            },
            invalidHandler: function (event, validator) { //display error alert on form submit              
                success1.hide();
                error1.show();
                App.scrollTo(error1, -200);
            },
            highlight: function (element) { // hightlight error inputs
                $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
            },
            unhighlight: function (element) { // revert the change done by hightlight
                $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
            },
            success: function (label) {
                label
                        .closest('.form-group').removeClass('has-error'); // set success class to the control group
            },
            submitHandler: function (form) {
                success1.show();
                error1.hide();
                document.getElementById("createorder").submit();
            }
        });

    }
    var skilledit_form = function () {

        var form1 = $('.skilledit_form');
        var error1 = $('.alert-danger', form1);
        var success1 = $('.alert-success', form1);
//        alert();
        form1.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",
            rules: {
                skillname: {
                    minlength: 2,
                    required: true
                }
            },
            invalidHandler: function (event, validator) { //display error alert on form submit              
                success1.hide();
                error1.show();
                App.scrollTo(error1, -200);
            },
            highlight: function (element) { // hightlight error inputs
                $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
            },
            unhighlight: function (element) { // revert the change done by hightlight
                $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
            },
            success: function (label) {
                label
                        .closest('.form-group').removeClass('has-error'); // set success class to the control group
            },
            submitHandler: function (form) {
                success1.show();
                error1.hide();
                document.getElementById("skilledit_form").submit();
            }
        });

    }
    var handleValidation1 = function () {

        var form1 = $('.form_sample_1');
        var error1 = $('.alert-danger', form1);
        var success1 = $('.alert-success', form1);
//        alert();
        form1.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",
            rules: {
                name: {
                    minlength: 2,
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
                password: {
                    minlength: 6,
                    required: true
                },
                task: {
                    required: true
                }
            },
            invalidHandler: function (event, validator) { //display error alert on form submit              
                success1.hide();
                error1.show();
                App.scrollTo(error1, -200);
            },
            highlight: function (element) { // hightlight error inputs
                $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
            },
            unhighlight: function (element) { // revert the change done by hightlight
                $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
            },
            success: function (label) {
                label
                        .closest('.form-group').removeClass('has-error'); // set success class to the control group
            },
            submitHandler: function (form) {
                success1.show();
                error1.hide();
                document.getElementById("form_sample_1").submit();
            }
        });

    }

    var handleValidation2 = function () {
//        alert();
        // for more info visit the official plugin documentation: 
        // http://docs.jquery.com/Plugins/Validation

        var form2 = $('#form_password');
        var error2 = $('.alert-danger', form2);
        var success2 = $('.alert-success', form2);

        form2.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",
            rules: {
                currentpassword: {
                    minlength: 6,
                    required: true
                },
                newpassword: {
                    required: true,
                },
                repassword: {
                    required: true,
                    equalTo: "#newpassword"
                },
            },
            invalidHandler: function (event, validator) { //display error alert on form submit              
                success2.hide();
                error2.show();
                App.scrollTo(error2, -200);
            },
            errorPlacement: function (error, element) { // render error placement for each input type
                var icon = $(element).parent('.input-icon').children('i');
                icon.removeClass('fa-check').addClass("fa-warning");
                icon.attr("data-original-title", error.text()).tooltip({'container': 'body'});
            },
            highlight: function (element) { // hightlight error inputs
                $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group   
            },
            unhighlight: function (element) { // revert the change done by hightlight

            },
            success: function (label, element) {
                var icon = $(element).parent('.input-icon').children('i');
                $(element).closest('.form-group').removeClass('has-error').addClass('has-success'); // set success class to the control group
                icon.removeClass("fa-warning").addClass("fa-check");
            },
            submitHandler: function (form) {
                success2.show();
                error2.hide();
                document.getElementById("form_password").submit();
            }
        });


    }

    var handleValidation3 = function () {
        // for more info visit the official plugin documentation: 
        // http://docs.jquery.com/Plugins/Validation

        var form3 = $('#form_sample_5');
        var error3 = $('.alert-danger', form3);
        var success3 = $('.alert-success', form3);

        //IMPORTANT: update CKEDITOR textarea with actual content before submit
        form3.on('submit', function () {
            for (var instanceName in CKEDITOR.instances) {
                CKEDITOR.instances[instanceName].updateElement();
            }
        })

        form3.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",
            rules: {
                skillname: {
                    minlength: 2,
                    required: true
                }
            },
            messages: {// custom messages for radio buttons and checkboxes
                membership: {
                    required: "Please select a Membership type"
                },
                service: {
                    required: "Please select  at least 2 types of Service",
                    minlength: $.validator.format("Please select  at least {0} types of Service")
                }
            },
            errorPlacement: function (error, element) { // render error placement for each input type
                if (element.parent(".input-group").size() > 0) {
                    error.insertAfter(element.parent(".input-group"));
                } else if (element.attr("data-error-container")) {
                    error.appendTo(element.attr("data-error-container"));
                } else {
                    error.insertAfter(element); // for other inputs, just perform default behavior
                }
            },
            invalidHandler: function (event, validator) { //display error alert on form submit   
                success3.hide();
                error3.show();
                App.scrollTo(error3, -200);
            },
            highlight: function (element) { // hightlight error inputs
                $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
            },
            unhighlight: function (element) { // revert the change done by hightlight
                $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
            },
            success: function (label) {
                label
                        .closest('.form-group').removeClass('has-error'); // set success class to the control group
            },
            submitHandler: function (form) {
                success3.show();
                error3.hide();
                document.getElementById("form_sample_5").submit();
            }

        });

        //apply validation on select2 dropdown value change, this only needed for chosen dropdown integration.
        $('.select2me', form3).change(function () {
            form3.validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input
        });
    }

    var handleWysihtml5 = function () {
        if (!jQuery().wysihtml5) {

            return;
        }

        if ($('.wysihtml5').size() > 0) {
            $('.wysihtml5').wysihtml5({
                "stylesheets": ["assets/plugins/bootstrap-wysihtml5/wysiwyg-color.css"]
            });
        }
    }

    return {
        //main function to initiate the module
        init: function () {

//            handleWysihtml5();
cancelorder_form();
submitnote_form();
reject_form();
            skilledit_form();
            handleValidation1();
            handleValidation2();
            handleValidation3();
            createorder_form();

        }

    };

}();