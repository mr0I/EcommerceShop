(function($) {
    // codes
    $(window).on("load", function() { /*...*/ });
})(jQuery);

jQuery(document).ready(function($){
    $('#addArticleFrmSubmit').on('click',function () {
        const thisBtn = $(this);
        let title = document.forms['addArticlePublic']['title'].value;
        let desc = document.forms['addArticlePublic']['desc'].value;
        let status = (document.forms['addArticlePublic']['status'].checked)? 'published' : 'draft' ;
        let meta_title = document.forms['addArticleSeo']['meta_title'].value;
        let meta_desc = document.forms['addArticleSeo']['meta_desc'].value;

        const article_data={
            title:title,
            desc:desc,
            status:status,
            image:'image',
            meta_title:meta_title,
            meta_desc:meta_desc
        };

        $.ajax({
            url: '/admin/addArticle',
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            data: { 'data':article_data },
            dataType: 'json',
            beforeSend: function(){
                thisBtn.html('در حال ارسال...');
            },
            success: function (res , xhr) {
                if (res.result==='Done' && xhr==='success'){
                    alert('مقاله ثبت شد.');
                } else {
                    alert('خطا در عملیات!!!');
                }
            }, error:function (err) {
                console.log('Error',err);
            }, complete:function () {
                thisBtn.html('ذخیره');
            },timeout:10000
        });

    })
});

function previewImage(e) {
    console.log('sdad');
    const image = e.target.files[0];
    const reader = new FileReader();
    reader.readAsDataURL(image);
    reader.onload = e =>{
        document.getElementById("article_image").src=e.target.result;
        // this.preview_image = e.target.result;
    };
}


/* Image Uploader */
function uploadToServer(e){
    e.preventDefault();
    var file = document.getElementById('article_image').files[0];
    var formData = new FormData();
    var httpReq = new XMLHttpRequest();
    //var metas = document.getElementsByTagName('meta');

    formData.append('file', file);
    httpReq.upload.addEventListener('progress', progressFunc);
    httpReq.addEventListener('load', loadFunc);
    httpReq.addEventListener('error', errorFunc);
    httpReq.addEventListener('abort', abortFunc);
    httpReq.open('post', 'http://127.0.0.1:8000/admin/uploadArticleImage');
    httpReq.setRequestHeader("X-CSRF-Token", $('meta[name="csrf-token"]').attr('content'));

    httpReq.send(formData);
}

function progressFunc(event){
    var loaded = (event.loaded)/100;
    var total = (event.total)/100;
    document.getElementById('loaded').innerHTML = "uploaded " + loaded + "Kilobytes of "+
        total;
    var percent = (event.loaded / event.total) *100;
    var p = Math.round(percent);
    document.getElementById('prog').style.width = p + '%';
    document.getElementById('percent').innerHTML = p + "% ÂáæÏ ÔÏå" ;
    if(p === 100){
        setTimeout(function () {
            alert('Done');
            document.getElementById('prog').style.width = 0 + '%';
            document.getElementById('article_image').value = '';
        },2000)
    }
}
function loadFunc(event){
    const resp = JSON.parse(event.target.responseText);
    console.log('resppp',resp);
    if (resp.result==='Done'){
        document.getElementById('uploaded_img_name').value = resp.image;
    } else {
        document.getElementById('uploaded_img_name').value = '';
    }
    document.getElementById('result').innerHTML = resp.result;
}
function errorFunc(){
    document.getElementById('result').innerHTML = "ÎØÇ ÏÑ ÂáæÏ";
    document.getElementById('uploaded_img_name').value = '';
}
function abortFunc(){
    document.getElementById('result').innerHTML = "ÂáæÏ áÛæ ÔÏ!";
    document.getElementById('uploaded_img_name').value = '';
}
function Cancel(){
    document.getElementById('uploaded_img_name').value = '';
    location.reload();
}
/* Video Uploader */


