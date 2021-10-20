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
    const image = e.target.files[0];
    const reader = new FileReader();
    reader.readAsDataURL(image);
    reader.onload = e =>{
        document.getElementById("article_image").src=e.target.result;
        // this.preview_image = e.target.result;
    };
}
