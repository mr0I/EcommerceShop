(function($) {
    // codes
    $(window).on("load", function() { /*...*/ });
})(jQuery);

jQuery(document).ready(function($){

    /* Toasts */
    window.BottomToast = Swal.mixin({
        toast: true,
        position: 'bottom-start',
        showConfirmButton: false,
        timer: 3500,
        background: '#1c272b',
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer);
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    });
    window.swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success mx-1',
            cancelButton: 'btn btn-danger mx-1'
        },
        buttonsStyling: false
    });


    $('.changeTheme').on('click', function () {
        let selected_theme = $(this).data('theme');
        if (selected_theme === null || selected_theme === '') {
            alert('لطفا یک تم را انتخاب کنید');
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
                if (data.result === 'Done'){
                    if (data.selected_theme === 'dark'){
                        $('#MainBody').removeClass('bg-light').addClass('dark');
                        $('.curroncy-dropdown-click').find('.txt').text('تم تیره');
                    } else {
                        $('#MainBody').removeClass('dark').addClass('bg-light');
                        $('.curroncy-dropdown-click').find('.txt').text('تم روشن');
                    }
                } else{
                    alert('خطا در انجام عملیات!!!');
                }
            })
            .catch((error) => {
                console.error('Error:', error);
            });

        // $.ajax({
        //     url: '/changeTheme',
        //     headers:{
        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //     },
        //     type: 'POST',
        //     data: { 'theme':selected_theme },
        //     dataType: 'json',
        //     beforeSend: function(){},
        //     success: function (res , xhr) {
        //         console.log(res);
        //         console.log(xhr);
        //         if (res.result === 'Done'){
        //             if (res.selected_theme === 'dark'){
        //                 $('#MainBody').removeClass('bg-light').addClass('dark');
        //                 $('.curroncy-dropdown-click').find('.txt').text('تم تیره');
        //             } else {
        //                 $('#MainBody').removeClass('dark').addClass('bg-light');
        //                 $('.curroncy-dropdown-click').find('.txt').text('تم روشن');
        //             }
        //         } else{
        //             alert('خطا در انجام عملیات!!!');
        //         }
        //     }, error:function (err) {
        //     }, complete:function () {
        //     },timeout:10000
        // });

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
            alert('لطفا یک تم را انتخاب کنید');
            return;
        }

        if(selected_theme==='light') {
            $('input#tooglenight').prop('checked',true);
        }else{
            $('input#tooglenight').prop('checked',false);
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
                if (data.selected_theme === 'dark'){
                    $('#MainBody').removeClass('bg-light').addClass('dark');
                    $('.curroncy-dropdown-click').find('.txt').text('تم تیره');
                } else {
                    $('#MainBody').removeClass('dark').addClass('bg-light');
                    $('.curroncy-dropdown-click').find('.txt').text('تم روشن');
                }
            })
            .catch((error) => {
                const data= { log_type:'change language error',log_text:error, };
                fetch('/writeLog', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    body: JSON.stringify(data),
                })
                    .then(response => response.json())
                    .then(data => {
                        console.log(data);
                    }).catch((error) => {
                    console.error('Error:', error);
                });
            });
    });

    // Night-Day Switcher
    $("#tooglenight").change(function() {
        let selected_theme = '';

        if(this.checked) {
            selected_theme = 'light';
            $('.changeThemeSelect option[value=light]').prop('selected',true);
        }else{
            selected_theme = 'dark';
            $('.changeThemeSelect option[value=dark]').prop('selected',true);
        }

        if (selected_theme === null || selected_theme === '') {
            alert('خطا در تغییر تم');
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
                if (data.selected_theme === 'dark'){
                    $('#MainBody').removeClass('bg-light').addClass('dark');
                    $('.curroncy-dropdown-click').find('.txt').text('تم تیره');
                } else {
                    $('#MainBody').removeClass('dark').addClass('bg-light');
                    $('.curroncy-dropdown-click').find('.txt').text('تم روشن');
                }
            })
            .catch((error) => {
                const data= { log_type:'change language error',log_text:error, };
                fetch('/writeLog', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    body: JSON.stringify(data),
                })
                    .then(response => response.json())
                    .then(data => {
                        console.log(data);
                    }).catch((error) => {
                    console.error('Error:', error);
                });
            });
    });


    /* Remove Compare */
    $('.remove-compare').on('click' , function () {
        const pid = $(this).data('pid');

        window.swalWithBootstrapButtons.fire({
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
                            window.swalWithBootstrapButtons.fire({
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
                            window.swalWithBootstrapButtons.fire({
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

    /* Remove wishlist */
    $('.remove-wish-product').on('click',function (e) {
        e.preventDefault();
        let pid = $(this).data('id');

        window.swalWithBootstrapButtons.fire({
            position: 'center',
            icon: 'warning',
            title: '',
            html:`محصول انتخابی از لیست علاقه مندی حذف شود؟`,
            showConfirmButton: true,
            confirmButtonText: 'بله',
            showCloseButton: false,
            showCancelButton: true,
            cancelButtonText: 'خیر'
        }).then((result) => {
            if (result.isConfirmed) {
                const data = { product_id: pid };
                fetch('/removeFromWishList', {
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
                            window.BottomToast.fire({
                                icon: 'success',
                                title: 'محصول از لیست علاقه مندی حذف شد :)',
                                timer:1500
                            });
                            setTimeout(function () {
                                window.location.reload(true);
                            },2000)
                        } else {
                            window.swalWithBootstrapButtons.fire({
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

    // split prices By comma
    $.fn.digits = function () {
        return this.each(function () {
            $(this).text($(this).text().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
        })
    };
    $('.digits').digits();


});


function viewModal(pid) {
    let loader = document.getElementById("modal_loading");
    let loader_icon = document.getElementById("modal_loading_icon");

    const data = { pid: pid };
    loader.style.display='block';
    loader_icon.classList.add('fa-spin');
    fetch('/getProductInfo', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        body: JSON.stringify(data),
    })
        .then(response => response.json())
        .then(data => {
            if (data.result === 'Done') {
                let product = data.product;
                const modalBody = $('.modal').find('.modal-body');

                modalBody.html('');
                modalBody.append(`
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          <div class="row">
                            <div class="col-lg-6 col-xs-12">
                              <div class="quick-view-img">
                                <img src="/uploads/product_images/${product.image}.jpg" alt="تصویر محصول" class="img-fluid bg-img">
                              </div>
                            </div>
                            <div class="col-lg-6 rtl-text">
                              <div class="product-right">
                                <div class="pro-group">
                                  <h2> ${product.title} </h2>
                                  <ul class="pro-price">
                                  ${
                    (product.main_price!==null && product.main_price!=='')?
                        ` <li><span>${product.main_price} تومان</span></li>` : ``
                    }
                                  ${
                    (product.price!==0)?
                        `<li>${product.price} تومان</li>` : `<li class="text-danger">ناموجود</li>`
                    }
                                    
                                    ${
                    (product.main_price!==null && product.main_price!=='')?
                        `<li>${data.discount}% تخفیف</li>` : ``
                    }
                                  </ul>
                                  <ul class="best-seller">
                                    <li>
                                      <svg enable-background="new 0 0 497 497" viewBox="0 0 497 497" xmlns="http://www.w3.org/2000/svg">
                                        <g>
                                          <path
                                                  d="m329.63 405.42-.38.43c-10.048 19.522-48.375 35.567-80.775 35.607-24.881 0-53.654-9.372-71.486-20.681-5.583-3.54-2.393-10.869-6.766-15.297l19.149-5.13c3.76-1.22 6.46-4.54 6.87-8.47l8.574-59.02 82.641-2.72 12.241 28.06.837 8.668-1.844 9.951 3.456 6.744.673 6.967c.41 3.93 3.11 7.25 6.87 8.47z"
                                                  fill="#f2d1a5" />
                                          <path
                                                  d="m420.39 497h-343.78c-6.21 0-7.159-6.156-6.089-12.266l2.53-14.57c3.82-21.96 16.463-37.323 37.683-44.153l27.702-8.561 28.754-8.035c18.34 18.57 48.615 27.957 81.285 27.957 32.4-.04 61.709-8.478 80.259-26.809l.38-.43 31.486 5.256 26.39 8.5c21.22 6.83 36.9 24.87 40.72 46.83l2.53 14.57c1.07 6.111-3.64 11.711-9.85 11.711z"
                                                  fill="#7e8b96" />
                                          <g>
                                            <path
                                                    d="m384.055 215c-2.94 43.71-18.85 104.74-24.92 130.96-.68 2.94-2.33 5.45-4.56 7.22-2.23 1.78-5.05 2.82-8.06 2.82-6.88 0-12.55-5.37-12.94-12.23 0 0-5.58-84.28-7.63-128.77z"
                                                    fill="#dc4955" />
                                          </g>
                                          <path
                                                  d="m141 271c-27.062 0-49-21.938-49-49 0-11.046 8.954-20 20-20h8.989l240.468-6.287 8.293 6.287h15.25c11.046 0 20 8.954 20 20 0 27.062-21.938 49-49 49z"
                                                  fill="#f2bb88" />
                                          <path
                                                  d="m360.6 415.39-.06.09c-49.3 66.23-174.56 66.38-223.76.56l-.43-.63 18.171-1.91 12.669-8.02c18.34 18.57 48.41 29.8 81.08 29.8h.15c32.4-.04 62.28-11.1 80.83-29.43l.38-.43z"
                                                  fill="#a9a4d3" />
                                          <path
                                                  d="m147.8 418.394v10.136l-32.89 10.59c-15.6 5.02-27.05 18.18-29.86 34.34l-3.59 23.54h-4.85c-6.21 0-10.92-5.6-9.85-11.71l2.53-14.57c3.82-21.96 19.5-40 40.72-46.83l26.34-8.48z"
                                                  fill="#64727a" />
                                          <path
                                                  d="m182.19 417.45-34.39 11.08c-3.99-3.86-7.68-8.02-11.02-12.49l-.43-.63 30.84-9.93c1.828 1.848 10.344.351 12.353 2.02 2.928 2.433-.561 7.928 2.647 9.95z"
                                                  fill="#938dc8" />
                                          <path
                                                  d="m299.7 358.2-2.71-28.06-79.861 2.255.001-.005-16.48.47-2.98 26.56-.763 6.8 2.039 12.83-3.989 4.55-.778 6.93c-.41 3.93-3.11 7.25-6.87 8.47l-20.12 6.48c4.37 4.43 9.41 8.44 15 11.97l10.02-3.22c9.79-3.17 16.79-11.79 17.88-21.97l2.058-17.506c.392-3.33 3.888-5.367 6.958-4.02 11.414 5.008 21.565 7.765 28.393 7.765 11.322.001 31.852-7.509 52.202-20.299z"
                                                  fill="#f2bb88" />
                                          <path
                                                  d="m134.539 164.427s-.849 18.411-.849 33.002c0 38.745 9.42 76.067 25.701 105.572 20.332 36.847 72.609 61.499 88.109 61.499s68.394-24.653 89.275-61.499c14.137-24.946 23.338-55.482 25.843-87.741.458-5.894-9.799-20.073-9.799-26.058l10.491-24.775c0-38.422-36.205-111.427-114.81-111.427s-113.961 73.005-113.961 111.427z"
                                                  fill="#f2d1a5" />
                                          <g>
                                            <path
                                                    d="m294 227.5c-4.142 0-7.5-3.358-7.5-7.5v-15c0-4.142 3.358-7.5 7.5-7.5s7.5 3.358 7.5 7.5v15c0 4.142-3.358 7.5-7.5 7.5z"
                                                    fill="#64727a" />
                                          </g>
                                          <g>
                                            <path
                                                    d="m203 227.5c-4.142 0-7.5-3.358-7.5-7.5v-15c0-4.142 3.358-7.5 7.5-7.5s7.5 3.358 7.5 7.5v15c0 4.142-3.358 7.5-7.5 7.5z"
                                                    fill="#64727a" />
                                          </g>
                                          <g>
                                            <path
                                                    d="m249 260.847c-5.976 0-11.951-1.388-17.398-4.163-3.691-1.88-5.158-6.397-3.278-10.087 1.88-3.691 6.398-5.158 10.087-3.278 6.631 3.379 14.547 3.379 21.178 0 3.689-1.881 8.207-.413 10.087 3.278 1.88 3.69.413 8.207-3.278 10.087-5.447 2.775-11.422 4.163-17.398 4.163z"
                                                    fill="#f2bb88" />
                                          </g>
                                          <path
                                                  d="m288.989 40.759c0 22.511-9.303 40.759-40.489 40.759s-48.702-42.103-48.702-42.103 17.516-39.415 48.702-39.415c25.911 0 47.746 12.597 54.392 29.769 1.353 3.497-13.903 7.182-13.903 10.99z"
                                                  fill="#df646e" />
                                          <path
                                                  d="m254.305 81.307c1.031-.099 2.069-.167 3.093-.295 26.96-3.081 47.572-19.928 47.572-40.252 0-3.81-.72-7.49-2.08-10.99-15.42-6.31-33.46-10.34-54.39-10.34-4.139 0-8.163.159-12.073.462-5.127.397-7.393-6.322-3.107-9.163 7.36-4.878 16.519-8.364 26.68-9.879-3.71-.56-7.56-.85-11.5-.85-25.933 0-47.766 12.621-54.393 29.813-.006.002-.011.004-.017.007-1.337 3.487-2.055 7.201-2.06 10.94 0 22.51 25.28 40.76 56.47 40.76 1.946.008 3.872-.09 5.805-.213z"
                                                  fill="#dc4955" />
                                          <path
                                                  d="m363.31 164.43v33c0 5.99-.23 11.94-.7 17.83-4.32-.91-8.4-2.66-12.05-5.19-22.785-15.834-31.375-40.163-37.64-60.936-.382-1.268-1.547-2.134-2.871-2.134h-30.949c-4.96 0-9.65-2.15-12.89-5.91l-10.947-12.711c-1.197-1.39-3.349-1.39-4.546 0l-10.947 12.711c-3.24 3.76-7.93 5.91-12.89 5.91h-90.33c8.47-39.6 44.09-94 111.95-94 78.61 0 114.81 73 114.81 111.43z"
                                                  fill="#f2bb88" />
                                          <path
                                                  d="m381 164.19v37.81h-11.25c-4 0-7.93-1.16-11.22-3.44-19.74-13.72-26.93-35.65-33.69-58.43-1.26-4.24-5.16-7.13-9.58-7.13h-36.165c-.873 0-1.703-.38-2.273-1.042l-21.559-25.029c-1.197-1.389-3.349-1.389-4.546 0l-21.559 25.029c-.57.662-1.4 1.042-2.273 1.042h-38.015c-5.3 0-9.68 4.14-9.98 9.44 0 0-2.331 25.591-4.032 66.31-1.765 42.256-7.908 135.02-7.908 135.02-.16 2.822-1.215 5.393-2.879 7.441-2.381 2.929-5.67.375-9.72.375-3.01 0-5.83-1.04-8.06-2.82-2.23-1.77-.792-5.474-1.472-8.414-6.7-28.94-23.83-94.686-23.83-138.351 0-13.73-.14-34.689 0-37.649.14-26.43 12.74-54.048 32-78.128 12.937-16.178 28.667-38.955 58.628-47.692 10.986-3.204 23.248-5.101 36.883-5.101 50.8 0 82.75 26.31 100.6 48.39 19.68 24.319 31.9 55.879 31.9 82.369z"
                                                  fill="#df646e" />
                                          <path
                                                  d="m211.62 38.54c-19.38 9.9-33.55 23.84-43.37 36.44-19.26 24.69-31.27 56.78-31.41 83.88-.14 3.03-.84 25.18-.84 39.25 0 44.77 18.69 117.93 25.39 147.6.47 2.08 1.4 3.94 2.68 5.5-2.38 2.93-6.01 4.79-10.06 4.79-3.01 0-5.83-1.04-8.06-2.82-2.23-1.77-3.88-4.28-4.56-7.22-6.7-28.94-25.39-100.29-25.39-143.96 0-13.73.7-35.33.84-38.29.14-26.43 12.15-57.73 31.41-81.81 12.94-16.18 33.4-34.63 63.37-43.36z"
                                                  fill="#dc4955" />
                                          <g>
                                            <path
                                                    d="m316.539 193.816c-1.277 0-2.571-.327-3.755-1.013-11.762-6.82-25.806-6.82-37.567 0-3.583 2.078-8.172.858-10.25-2.726-2.078-3.583-.857-8.172 2.726-10.25 16.474-9.552 36.143-9.552 52.616 0 3.583 2.078 4.804 6.667 2.726 10.25-1.392 2.399-3.909 3.739-6.496 3.739z"
                                                    fill="#df646e" />
                                          </g>
                                          <g>
                                            <path
                                                    d="m225.539 193.816c-1.277 0-2.571-.327-3.755-1.013-11.762-6.82-25.806-6.82-37.567 0-3.583 2.078-8.171.858-10.25-2.726-2.078-3.583-.857-8.172 2.726-10.25 16.474-9.552 36.143-9.552 52.616 0 3.583 2.078 4.804 6.667 2.726 10.25-1.392 2.399-3.909 3.739-6.496 3.739z"
                                                    fill="#df646e" />
                                          </g>
                                          <g>
                                            <path
                                                    d="m302.143 383.517c-16.23 10.87-34.973 16.353-53.643 16.353s-37.3-5.41-53.54-16.27l3.476-6.313-1.526-11.067 4.15 3.37c28.46 20.41 66.63 20.37 95.05-.12.2-.14.39-.27.6-.39l3.826-2.211z"
                                                    fill="#a9a4d3" />
                                          </g>
                                          <g>
                                            <path
                                                    d="m211.98 376.2-1.85 15.68c-5.23-2.27-10.31-5.03-15.17-8.28l1.95-17.38 4.15 3.37c3.5 2.51 7.15 4.72 10.92 6.61z"
                                                    fill="#938dc8" />
                                          </g>
                                          <g>
                                            <path
                                                    d="m269.5 306.5h-42c-4.142 0-7.5-3.358-7.5-7.5s3.358-7.5 7.5-7.5h42c4.142 0 7.5 3.358 7.5 7.5s-3.358 7.5-7.5 7.5z"
                                                    fill="#df646e" />
                                          </g>
                                        </g>
                                      </svg>
                                      ${data.views} مشاهده 
                                    </li>
                                  </ul>
                                </div>
                                <div class="pro-group">
                                  <h6 class="product-title">اطلاعات محصول</h6>
                                  <p> ${(product.description).substring(0,300) + ' ... '} </p>
                                </div>
                                <div class="pro-group pb-0">
                                  <div class="product-buttons">
                                    <a href="${product.url}" class="btn cart-btn btn-normal tooltip-top"
                                       data-tippy-content="افزودن به سبد خرید" target="_blank">
                                      <i class="fa fa-shopping-cart"></i>
                                      افزودن به سبد خرید
                                    </a>
                                    <a href="/product/${product.id}" class="btn btn-normal tooltip-top"
                                       data-tippy-content="view detail">
                                      مشاهده جزئیات
                                    </a>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                    `)
            } else {
                window.swalWithBootstrapButtons.fire({
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
            loader.style.display='none';
            loader_icon.classList.remove('fa-spin');
        })
        .catch((error) => {
            loader.style.display='none';
            loader_icon.classList.remove('fa-spin');
            console.error('Error:', error);
        });
}

function addToWish(e,pid) {
    e.preventDefault();

    const data = { product_id: pid };
    fetch('/addToWish', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        body: JSON.stringify(data),
    })
        .then(response => response.json())
        .then(data => {
            if (data.result === 'Done') {
                window.swalWithBootstrapButtons.fire({
                    position: 'center',
                    icon: 'success',
                    title: '',
                    html:`محصول به لیست علاقه مندی اضافه شد :)`,
                    showConfirmButton: true,
                    confirmButtonText: 'برو به لیست علاقه مندی',
                    showCloseButton: false,
                    showCancelButton: false,
                    timer: 3000,
                    timerProgressBar: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = $('meta[name="wishlist-url"]').attr('content');
                        return false;
                    }
                });
                $('.item-count-contain').html(data.count);
            } else if(data.result==='Duplicate'){
                window.swalWithBootstrapButtons.fire({
                    position: 'center',
                    icon: 'error',
                    title: '',
                    html:`این محصول قبلا به لیست علاقه مندی اضافه شده است!`,
                    showConfirmButton: false,
                    showCloseButton: false,
                    showCancelButton: true,
                    cancelButtonText: 'خُب'
                });
            } else {
                window.swalWithBootstrapButtons.fire({
                    position: 'center',
                    icon: 'error',
                    title: '',
                    html:`خطا در افزودن به لیست علاقه مندی!`,
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

function addToCompare(e,pid) {
    e.preventDefault();

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
                window.swalWithBootstrapButtons.fire({
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
                window.swalWithBootstrapButtons.fire({
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
                window.swalWithBootstrapButtons.fire({
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
                window.swalWithBootstrapButtons.fire({
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
}