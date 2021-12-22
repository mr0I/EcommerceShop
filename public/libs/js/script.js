(function($) {
    // codes
    $(window).on("load", function() { /*...*/ });
})(jQuery);

jQuery(document).ready(function($){

    window.localVars = JSON.parse(document.getElementById("master_json_content").innerHTML,false);

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


    /* Split Prices By Comma */
    $.fn.digits = function () {
        return this.each(function () {
            $(this).text($(this).text().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
        })
    };
    $('.digits').digits();
});



const mobileSearchInput = document.getElementById("mobile_search_product_input");
mobileSearchInput.addEventListener('keyup',function (e) {
    if (e.keyCode === 13){
        const sq = mobileSearchInput.value;
        const cat_id = '0';

        _do_search(sq,cat_id);
    }
});
function searchProduct(e) {
    e.preventDefault();
    const sq = document.querySelector('#search_product_input').value;
    const cat_id = document.querySelector('#search_product_select').value;

    _do_search(sq,cat_id);
}
let _do_search = (searchQuery,catId) => {
    if (searchQuery.length >2 && searchQuery.trim()!=='' &&  !hasOnlySpecialCharacter(searchQuery)) {
        window.location.href = `${window.localVars.siteUrl}search?q=${searchQuery}&cat=${catId}`;
    } else {
        window.BottomToast.fire({
            icon: 'warning',
            title: 'عبارت  جستجو شده نامعتبر است!!!',
            timer:1500
        });
    }
};

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
                                        `<li class="check-price digits" style="text-decoration: line-through"><span>${ product.main_price } تومان <span></li>` : ``
                                    }
                                  ${
                                    (product.price!==0)?
                                        `<li class="price digits">${product.price} تومان </li>` : `<li class="text-danger">ناموجود</li>`
                                    }
                                  ${
                                    (product.main_price!==null && product.main_price!=='')?
                                        `<li>${data.discount} % تخفیف </li>` : ``
                                    }
                                  </ul>
                                  <ul class="best-seller">
                                    <li>
                                      <i class="fa fa-eye align-middle mx-2"></i>
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
                    `);

                $('.digits').digits();

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
function hasOnlySpecialCharacter(val) {
    const pattern = /^[^a-zA-Z0-9ا-ی]+$/;
    return (pattern.test(val));
}