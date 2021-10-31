(function($) {
    // codes
    $(window).on("load", function() { /*...*/ });
})(jQuery);

jQuery(document).ready(function($){

    $('.ArticleFrmSubmit').on('click',function () {
        const thisBtn = $(this),
            frm_type = thisBtn.data('type');

        let title = document.forms['ArticlePublic']['title'].value,
            desc = document.forms['ArticlePublic']['desc'].value,
            image_id = document.forms['ArticlePublic']['image_id'].value,
            status = (document.forms['ArticlePublic']['status'].checked)? 'published' : 'draft',
            meta_title = document.forms['ArticleSeo']['meta_title'].value,
            meta_desc = document.forms['ArticleSeo']['meta_desc'].value;

        const article_data={
            title:title,
            description:desc,
            status:status,
            article_image_id:image_id,
            meta_title:meta_title,
            meta_desc:meta_desc
        };

        if (frm_type==='Add'){
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
                        window.location.href = $('meta[name="articles-list"]').attr('content');
                    } else {
                        alert('خطا در عملیات!!!');
                    }
                }, error:function (err) {
                    console.log('Error',err);
                }, complete:function () {
                    thisBtn.html('ذخیره');
                },timeout:10000
            });
        } else if(frm_type==='Edit'){
            const article_id = thisBtn.data('id');

            $.ajax({
                url: `/admin/updateArticle/${article_id}`,
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'PUT',
                data: { 'data':article_data },
                dataType: 'json',
                beforeSend: function(){
                    thisBtn.html('در حال ویرایش...');
                },
                success: function (res , xhr) {
                    if (res.result==='Done' && xhr==='success'){
                        alert('مقاله ویرایش شد.');
                        window.location.href = $('meta[name="articles-list"]').attr('content');
                    } else {
                        alert('خطا در عملیات!!!');
                    }
                }, error:function (err) {
                    console.log('Error',err);
                }, complete:function () {
                    thisBtn.html('ویرایش');
                },timeout:10000
            });
        }
    });

});


function previewImage(e) {
    const image = e.target.files[0];
    const reader = new FileReader();
    reader.readAsDataURL(image);
    reader.onload = e =>{
        document.getElementById('article_image_preview').src= e.target.result;
    };
}

/* Image Uploader */
function uploadToServer(e){
    e.preventDefault();
    document.getElementById('prog').style.width = 0 + '%';

    var file = document.getElementById('article_image').files[0];
    var formData = new FormData();
    var httpReq = new XMLHttpRequest();

    formData.append('file', file);
    httpReq.upload.addEventListener('progress', progressFunc);
    httpReq.addEventListener('load', loadFunc);
    httpReq.addEventListener('error', errorFunc);
    httpReq.addEventListener('abort', abortFunc);
    httpReq.open('post', `/admin/uploadArticleImage`);
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
    document.getElementById('percent').innerHTML = p + "درصد" ;
    if(p === 100){
        setTimeout(function () {
            alert('فایل آپلود شد.');
            document.getElementById('article_image').value = '';
        },2000)
    }
}
function loadFunc(event){
    const resp = JSON.parse(event.target.responseText);
    if (resp.result==='Done'){
        document.getElementById('uploaded_image_id').value = resp.id;
        document.getElementById('result').innerHTML = 'آپلود موفق :)';
    } else {
        document.getElementById('uploaded_image_id').value = '';
        document.getElementById('result').innerHTML = 'خطای نامشخص';
    }
}
function errorFunc(){
    document.getElementById('result').innerHTML = "خطا در آپلود!!!";
    document.getElementById('uploaded_image_id').value = '';
}
function abortFunc(){
    document.getElementById('result').innerHTML = "لغو آپلود :| ";
    document.getElementById('uploaded_image_id').value = '';
}
function Cancel(){
    document.getElementById('uploaded_image_id').value = '';
    window.location.reload();
}
/* Image Uploader */


function delArticle(articleId) {
    if (confirm('مطمئنی؟')){
        const data = {articleId: articleId};

        fetch(`/admin/deleteArticle`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            body: JSON.stringify(data),
        })
            .then(response => response.json())
            .then(data => {
                // console.log('data',data);return;
                if (data.result === 'Done'){
                    alert('مقاله پاک شد:)');
                    window.location.reload();
                }else{
                    alert('خطا در عملیات');
                }

            })
            .catch((error) => {
                console.error('Error:', error);
            });
    }

}




