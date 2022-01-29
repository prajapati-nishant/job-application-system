var Auth = function () {

    var validateLoginForm = function () {
        $('#login').validate({
            rules: {
                email: {
                    required: true,
                    email: true,
                },
                password: {
                    required: true,
                },
            },
            messages: {
                email: {
                    required: 'Please enter email.',
                    email: 'Please enter valid email.',
                },
                password: {
                    required: 'Please enter password.',
                },
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('error');
                element.closest('.form-control').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    };


    var manageForgotPasswordForm = function () {
        $('#forgotPassword').validate({
            rules: {
                email: {
                    required: true,
                    email: true,
                },
            },
            messages: {
                email: {
                    required: 'Please enter your registered email.',
                    email: 'Please enter valid email.',
                },
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('error');
                element.closest('.form-control').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });

        $('#forgotPasswordBtn').on('click', function (e) {
            e.preventDefault();
            let form = $(this).closest('form');
            if (!form.valid()) {
                return false;
            }
            $(this).attr('disabled', true);
            form.submit();
        });
    };

    var manageResetPassword = function () {
        $('#resetPassword').validate({
            rules: {
                email: {
                    required: true,
                    email: true,
                },
                password: {
                    required: true,
                    minlength: 8,
                    maxlength: 25,
                },
                password_confirmation: {
                    required: true,
                    equalTo: '#password',
                },

            },
            messages: {
                email: {
                    required: 'Please enter your email.',
                    email: 'Please enter valid email.',
                },
                password: {
                    required: 'Please enter password.',
                    minlength: 'Password must be at least 8 characters.',
                    maxlength: 'Password must be less than 25 characters.',
                },
                password_confirmation: {
                    required: "Please enter confirm-password",
                    equalTo: "password not matched",
                },
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('error');
                element.closest('.form-control').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });

        $('#resetPasswordBtn').on('click', function (e) {
            e.preventDefault();
            let form = $(this).closest('form');
            if (!form.valid()) {
                return false;
            }
            $(this).attr('disabled', true);
            form.submit();
        });

    };

    return {
        login: function () {
            validateLoginForm();
        },
        forgotPassword: function () {
            manageForgotPasswordForm();
        },
        resetPassword: function () {
            manageResetPassword();
        }
    }
}();
