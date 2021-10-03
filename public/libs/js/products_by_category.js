jQuery(document).ready(function($) {

    let localVars = JSON.parse(document.getElementById("json_content").innerHTML,false);
    $('.digits').digits();

    // Initial Quantification Checkboxes
    if (getUrlParams().filters!== ''){
        const status_chk = (JSON.parse(getUrlParams().filters)).status;
        (status_chk==='available')? $('#status_checkbox').prop('checked',true) : $('#status_checkbox').prop('checked',false);

        if ($('input.brands-filter').length){
            const brandsArray = (JSON.parse(getUrlParams().filters)).brands;
            $.each($('input.brands-filter'),function () {
                brandsArray.forEach(item => {
                    if ($(this).data('brand').indexOf(item) !== -1){$(this).prop('checked', true);
                    }
                })
            });
        }
    }

    // Initial Quantification Price Range
    $(".price-range").ionRangeSlider({
        type: "double",
        grid: true,
        min: 0,
        max: Math.ceil(localVars.priceMax),
        from: Math.floor(localVars.priceMin),
        to: Math.ceil(localVars.priceMax),
        postfix: " تومان"
    });

    // Constants
    window.public_dir = localVars.publicDir;

    // Scroll Event
    let lastScrollY = 0;
    let isLoading = false;
    let canLoadMoreProducts = true;
    const href = (new URL(window.location.href)).href;
    const catPageBaseUrl = href.substr(0,href.lastIndexOf('?'));
    window.AllPages = Math.ceil(localVars.productsCount/localVars.productsPerPage);
    let showAlert=false;

    window.addEventListener('scroll', async (event) =>{
        const diff = window.scrollY - lastScrollY; // scrolling down
        lastScrollY = window.scrollY;


        if (diff>0 && !canLoadMoreProducts && (window.innerHeight + window.scrollY)>=document.body.offsetHeight - 250
            && isLoading==false) {
            if(!showAlert){
                showAlert = true;
                alert('No more Post');
            }
        }

        if (diff>0 && canLoadMoreProducts && (window.innerHeight + window.scrollY)>=document.body.offsetHeight - 250
            && isLoading==false) {
            // console.log('reload');
            isLoading=true;

            const data = {page_num: getUrlParams().page};
            fetch(`/getCatProducts/${getUrlParams().category_name}`, {
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
                        let productsContainer = $('.product-wrapper-grid');
                        const products = data.products;

                        products.forEach(product => {
                            appendProducts(productsContainer,product);
                        });
                    }

                    isLoading = false;
                    let np = Number(getUrlParams().page) + 1;

                    if (np<=window.AllPages){
                        let updatedUrl =  catPageBaseUrl+ '?page='+ np
                            +((getUrlParams().sortBy!=='')? '&sortBy='+getUrlParams().sortBy : '')
                            +((getUrlParams().filters!=='')? '&filters='+getUrlParams().filters : '') ;
                        window.history.replaceState(
                            { url: updatedUrl },
                            null,
                            updatedUrl);
                    }
                    if (np==window.AllPages){
                        // No More Products
                        canLoadMoreProducts = false;
                    }
                })
                .catch((error) => {
                    console.error('Error:', error);
                });
        }
    });

    $('.sorting-option-btn').on('click' , function (e) {
        e.preventDefault();
        canLoadMoreProducts = true;
        showAlert = true;

        const $thisBtn = $(this);
        if($thisBtn.hasClass('active')) return;
        const sort_type = $thisBtn.data('sort');

        const data = {
            sort_type: sort_type,
            page_num: 0
        };
        fetch(`/getCatProducts/${getUrlParams().category_name}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            body: JSON.stringify(data),
        })
            .then(response => response.json())
            .then(data => {
//                console.log('Data',data);
                if (data.result === 'Done') {
                    $('.sorting-option-btn').removeClass('active');
                    $thisBtn.addClass('active');

                    let productsContainer = $('.product-wrapper-grid');
                    productsContainer.find('.row').html('');
                    const products = data.products;

                    products.forEach(product => {
                        appendProducts(productsContainer,product);

                        let updatedUrl =  catPageBaseUrl+ '?page=1'
                            +'&sortBy='+sort_type
                            +((getUrlParams().filters!=='')? '&filters='+getUrlParams().filters : '');
                        window.history.replaceState({ url: updatedUrl }, null, updatedUrl);

                    });
                }
            })
    });

    window.brands_filters = [];
    $('.brands-filter').on('change', function () {
        let selected_val = $(this).data('brand');
        if ($(this).prop('checked')) {
            window.brands_filters.push(selected_val);
        } else {
            let index = window.brands_filters.indexOf(selected_val);
            window.brands_filters.splice(index,1);
        }
    });

    $('.category-apply-filters').on('click', function () {
        canLoadMoreProducts = true;
        showAlert = true;

        let priceRange = $('.price-range').val();
        let min_price = (priceRange.split(';'))[0];
        let max_price = (priceRange.split(';'))[1];
        let status = ($('#status_checkbox').prop('checked'))? 'available' : 'no_diff';

        const data = {
            brands_filters: ((window.brands_filters).length!==0)? window.brands_filters : null,
            min_price: min_price,
            max_price: max_price,
            status: status
        };
        fetch(`/getCatProducts/${getUrlParams().category_name}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            body: JSON.stringify(data),
        })
            .then(response => response.json())
            .then(data => {
                console.log('Data',data);
                if (data.result === 'Done') {
                    let productsContainer = $('.product-wrapper-grid');
                    productsContainer.find('.row').html('');
                    const products = data.products;
                    window.AllPages = Math.ceil(data.all_products_count/localVars.productsPerPage);

                    products.forEach(product => {
                        appendProducts(productsContainer,product);

                        let quotedArray = '"' + window.brands_filters.join('","') + '"';
                        let updatedUrl =  catPageBaseUrl+ '?page=1'
                            +((getUrlParams().sortBy!=='')? '&sortBy='+getUrlParams().sortBy : '')
                            +'&filters={'+ '"brands":[' + quotedArray + ']' + ',"price":{"min":"'+min_price+'","max":"'+max_price+'" },' +
                            '"status":"'+ status + '"' + '}' ;
                        window.history.replaceState({ url: updatedUrl }, null, updatedUrl);
                    });
                }
            })
    });

    $('.category-reset-filters').on('click',function () {
        let url = new URL(window.location.href);
        let href = url.href;
        let pageUrl = (href.indexOf('?')!==-1)? href.split('?')[0] : href;
        window.location.href=pageUrl;
    });

});


function getUrlParams() {
    let url = new URL(window.location.href);
    let href = url.href;
    let category_name = href.substr(href.lastIndexOf('/')+1,href.length);

    return{
        'page': (url.searchParams.get('page')) || 1,
        'sortBy': (url.searchParams.get('sortBy')) || '',
        'filters': (url.searchParams.get('filters')) || '',
        'category_name': category_name
    }
}

function appendProducts(productsContainer,product) {
    productsContainer.find('.row').append(`
                          <div class="col-lg-3 col-grid-box">
                            <div class="product-box">
                              <div class="product-imgbox">
                                <div class="product-front">
                                  <a href="/product/${product.id}">
                                    <img src="${window.public_dir + '/' + product.image + '.jpg'}" class="img-fluid" alt="product">
                                  </a>
                                </div>
                                <div class="product-back">
                                  <a href="/product/${product.id}">
                                    <img src="${window.public_dir + '/' + product.image + '.jpg'}" class="img-fluid " alt="product">
                                  </a>
                                </div>
                              </div>
                              <div class="product-detail detail-center detail-inverse">
                                <div class="detail-title">
                                  <div class="detail-left">
                                    <div class="rating-star"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                              class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                    </div>
                                    <p>${product.description}</p>
                                    <a href="/product/${product.id}">
                                      <h6 class="price-title">/product/${product.title}</h6>
                                    </a>
                                  </div>
                                  <div class="detail-right">
                                    ${(product.main_price!==null)? '<div class="check-price digits">  '+product.main_price+' تومان </div>' : ''}
                                    <div class="price text-center mx-0 my-2 w-100" style="font-weight: bold">
                                    ${(product.status=='not-available')?
                                        `<div class="text-danger"> ناموجود </div> `
                                        :
                                        `<div class="digits"> ${product.price} تومان </div> `
                                        }
                                    </div>
                                  </div>
                                </div>
                                <div class="icon-detail">
                                  <button class="tooltip-top add-cartnoty" data-tippy-content="افزودن به سبد خرید"> <i
                                            data-feather="shopping-cart"></i> </button>
                                  <a href="javascript:void(0)" class="add-to-wish tooltip-top"
                                     data-tippy-content="افزودن به لیست علاقه مندی"> <i data-feather="heart"></i> </a>
                                  <a href="#" data-bs-toggle="modal" data-bs-target="#quick-view"
                                     onclick="viewModal(${product.id})" class="tooltip-top" data-tippy-content="مشاهده سریع"> <i data-feather="eye"></i> </a>
                                  <a href="#" class="tooltip-top add-to-compare" data-id="${product.id}" data-tippy-content="مقایسه"> <i
                                            data-feather="refresh-cw"></i> </a>
                                </div>
                              </div>
                            </div>
                          </div>
                        `);
}