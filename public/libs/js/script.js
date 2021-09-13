(function($) {
    // codes
    $(window).on("load", function() { /*...*/ });
})(jQuery);

jQuery(document).ready(function($){

    /* Toasts */
    const TopToast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3500,
        background: '#1c272b',
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer);
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    });
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success mx-1',
            cancelButton: 'btn btn-danger mx-1'
        },
        buttonsStyling: false
    });

    setTimeout(function () {
        $('div.alert').fadeOut(200);
    } , 3000);


    $('.changeTheme').on('click', function () {
        let selected_theme = $(this).data('theme');
        if (selected_theme === null || selected_theme === '') {
            alert('لطفا یک تم را انتخاب کنید');
            return;
        }

        $.ajax({
            url: '/changeTheme',
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            data: { 'theme':selected_theme },
            dataType: 'json',
            beforeSend: function(){},
            success: function (res , xhr) {
                console.log(res);
                console.log(xhr);
                if (res.result === 'Done'){
                    if (res.selected_theme === 'dark'){
                        $('#MainBody').removeClass('bg-light').addClass('dark');
                        $('.curroncy-dropdown-click').find('.txt').text('تم تیره');
                    } else {
                        $('#MainBody').removeClass('dark').addClass('bg-light');
                        $('.curroncy-dropdown-click').find('.txt').text('تم روشن');
                    }
                } else{
                    alert('خطا در انجام عملیات!!!');
                }
            }, error:function (err) {
            }, complete:function () {
            },timeout:10000
        });

    });

    /* Change Language */
    $('.changeLangSelect').on('change', function () {
        let lang = $(this).val();

        if (lang === '0' ) return;
        if (lang === null || lang === '') {
            alert('لطفا یک زبان را انتخاب کنید');
            return;
        }

        const data= { lang:lang };
        fetch('/changeLang', {
            method: 'POST', // or 'PUT'
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            body: JSON.stringify(data),
        })
            .then(response => response.json())
            .then(data => {
                console.log(data);
                if (data.result === 'Done'){
                    window.location.reload('true');
                } else{
                    alert('خطا در انجام عملیات!!!');
                }
            })
            .catch((error) => {
                console.error('Error:', error);
            });
    });

    /* Change Theme */
    $('.changeThemeSelect').on('change' , function () {
        let selected_theme = $(this).val();

        if (selected_theme === '0' ) return;
        if (selected_theme === null || selected_theme === '') {
            alert('لطفا یک زبان را انتخاب کنید');
            return;
        }

        const data= { theme:selected_theme };
        fetch('/changeTheme', {
            method: 'POST', // or 'PUT'
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            body: JSON.stringify(data),
        })
            .then(response => response.json())
            .then(data => {
                console.log(data);
                if (data.selected_theme === 'dark'){
                    $('#MainBody').removeClass('bg-light').addClass('dark');
                    $('.curroncy-dropdown-click').find('.txt').text('تم تیره');
                } else {
                    $('#MainBody').removeClass('dark').addClass('bg-light');
                    $('.curroncy-dropdown-click').find('.txt').text('تم روشن');
                }
            })
            .catch((error) => {
                console.error('Error:', error);
            });
    });

    /* Add 2 Compare */
    $('.add-to-compare').on('click' , function (e) {
        e.preventDefault();
        const pid = $(this).data('id');

        const data = { product_id: pid };
        fetch('/addToCompare', {
            method: 'POST', // or 'PUT'
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            body: JSON.stringify(data),
        })
            .then(response => response.json())
            .then(data => {
                console.log(data);
                if (data.result === 'Done') {
                    swalWithBootstrapButtons.fire({
                        position: 'center',
                        icon: 'success',
                        title: '',
                        html:`محصول به لیست مقایسه اضافه شد :)`,
                        showConfirmButton: true,
                        confirmButtonText: 'برو به لیست مقایسه',
                        showCloseButton: false,
                        showCancelButton: false,
                        timer: 3000,
                        timerProgressBar: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = $('meta[name="compare-url"]').attr('content');
                            return false;
                        }
                    });
                } else if(data.result === 'Full'){
                    swalWithBootstrapButtons.fire({
                        position: 'center',
                        icon: 'info',
                        title: '',
                        html:`لیست مقایسه پر شده است!`,
                        showConfirmButton: true,
                        confirmButtonText: 'برو به لیست مقایسه',
                        showCloseButton: false,
                        showCancelButton: true,
                        cancelButtonText: 'بستن',
                        timer: 3000,
                        timerProgressBar: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = $('meta[name="compare-url"]').attr('content');
                            return false;
                        }
                    });
                } else if(data.result==='Duplicate'){
                    swalWithBootstrapButtons.fire({
                        position: 'center',
                        icon: 'error',
                        title: '',
                        html:`این محصول قبلا به لیست اضافه شده است!`,
                        showConfirmButton: false,
                        showCloseButton: false,
                        showCancelButton: true,
                        cancelButtonText: 'خُب'
                    });
                } else {
                    swalWithBootstrapButtons.fire({
                        position: 'center',
                        icon: 'error',
                        title: '',
                        html:`خطا در افزودن به لیست!`,
                        showConfirmButton: false,
                        showCloseButton: false,
                        showCancelButton: true,
                        cancelButtonText: 'خُب'
                    });
                }
            })
            .catch((error) => {
                console.error('Error:', error);
            });
    });

    /* Remove Compare */
    $('.remove-compare').on('click' , function () {
        const pid = $(this).data('pid');

        swalWithBootstrapButtons.fire({
            position: 'center',
            icon: 'warning',
            title: '',
            html:`محصول انتخابی از لیست مقایسه حذف شود؟`,
            showConfirmButton: true,
            confirmButtonText: 'بله',
            showCloseButton: false,
            showCancelButton: true,
            cancelButtonText: 'خیر'
        }).then((result) => {
            if (result.isConfirmed) {
                const data = { product_id: pid };
                fetch('/removeFromCompare', {
                    method: 'POST', // or 'PUT'
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    body: JSON.stringify(data),
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.result === 'Done') {
                            swalWithBootstrapButtons.fire({
                                position: 'center',
                                icon: 'success',
                                title: '',
                                html:`محصول از لیست مقایسه حذف شد :)`,
                                showConfirmButton: true,
                                confirmButtonText: 'خُب',
                                showCloseButton: false,
                                showCancelButton: false,
                                timer: 3000,
                                timerProgressBar: true
                            }).then((result)=>{
                                if (result.isConfirmed || result.isDismissed)  window.location.reload(true);
                            });
                        } else {
                            swalWithBootstrapButtons.fire({
                                position: 'center',
                                icon: 'error',
                                title: '',
                                html:`خطا در عملیات!`,
                                showConfirmButton: false,
                                showCloseButton: false,
                                showCancelButton: true,
                                cancelButtonText: 'خُب'
                            });
                        }
                    })
                    .catch((error) => {
                        console.error('Error:', error);
                    });
            }
        });
    });


    /* Category Page Filters */
    // $('.product-pp-select').on('change' , function () {
    //     const url = new URL(window.location.href);
    //     let base_url = ((url.href).split('?'))[0];
    //
    //     window.location.href = base_url + '?page=1&per_page=' +  $(this).val();
    // });
    /* Category Page Filters */




    $.fn.digits = function () {
        return this.each(function () {
            $(this).text($(this).text().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
        })
    };
    $('.digits').digits();
});