@extends('user.layouts.app')
@section('content')
<section class="blog_wrapper">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 gallery">
                <div class="gallery-items card-columns"></div>

                <div class="col-12">
                    <div class="row justify-content-center">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination" aria-label="coming-games"></ul>
                        </nav>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<div id="img-view" class="row align-items-center">
    <div class="col-12 p-0">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8 w-100">
                <div class="row justify-content-center">
                    <img class="current-image image-div" src="">
                </div>
            </div>
        </div>
        <span id="prev" class="prev">◄</span>
        <span id="next" class="next">►</span>
    </div>
    <span id="close" class="close fas fa-times"></span>
</div>
@endsection

@section('script')
<script>
    let images = [];
    pageItems(1)
    function pageItems(number) {

        $.ajax({
            async: false,
            url: "{{ route('gallery.items') }}",
            method: "GET",
            data: {number},
            success: function (data) {
                $(".gallery").find('.gallery-items').html(data.gallery)
                window.images = data.images
                let count = Math.ceil(data.total/9);
                let disabledPerv = (number == 1) ? 'disabled' : '';
                let disabledNext = (number == count) ? 'disabled' : '';

                $(".gallery").find('.pagination').html(`<li class="page-item ${disabledPerv}">
                        <span class="page-link" aria-label="Previous">
                          <span aria-hidden="true">&laquo;</span>
                        </span>
                      </li>`)
                for(let i = 1; i<=count; i++){
                    let active = (i == number) ? 'active' : '';

                    $(".gallery").find('.pagination').append(`<li class="page-item ${active}"><span class="page-link" aria-label="${i}">${i}</span></li>`)
                }
                $(".gallery").find('.pagination').append(`<li class="page-item ${disabledNext}" >
                        <span class="page-link" aria-label="Next">
                          <span aria-hidden="true">&raquo;</span>
                        </span>
                      </li>`)
            }
        })
    }

    $(document).on('click', '.page-item', function(){
        let go = $(this).find('.page-link').attr('aria-label')
        if(!$(this).hasClass('disabled')){
            if(go == 'Previous'){
                let number =  $(".gallery").find(".pagination").find(".active").find('.page-link').attr("aria-label")
                 $(".gallery").find('.pagination').find(".active").removeClass("active")
                pageItems(parseInt(number)-1)
            }
            else if(go == 'Next'){
                let number =  $(".gallery").find(".pagination").find(".active").find('.page-link').attr("aria-label")
                $(".gallery").find('.pagination').find(".active").removeClass("active")
                pageItems(parseInt(number)+1)
            }
            else{
                pageItems(go)
            }
        }
    })


	// -------------------------------------------------------------------------------------


	$(document).on('click', '.gallery-image', (e) => {
        let img = e.target.src;
        $("#img-view").find("img").attr("src", img);
        $("#img-view").css("display", "flex");
		$("body").css("overflow", "hidden");
    })

    $("#img-view").on('click', (event) => {
        	let img = $("#img-view").find(".image-div").attr("src")
			let currentImg = window.images.indexOf(img);
            // console.log(event.target)
            if (event.target.classList[0] === 'current-image'){
                if (currentImg == window.images.length - 1) {
					currentImg = 0;
				} else {
					currentImg = currentImg + 1;
				}
				$("#img-view").find(".image-div").attr("src", window.images[currentImg]);
            }
            else if (event.target.classList[0] === 'prev'){
                if (currentImg == 0) {
					currentImg = window.images.length - 1;
				} else {
					currentImg = currentImg - 1;
				}
				$("#img-view").find(".image-div").attr("src", window.images[currentImg]);
            }
            else if (event.target.classList[0] === 'next'){
                if (currentImg == window.images.length - 1) {
					currentImg = 0;
				} else {
					currentImg = currentImg + 1;
				}
				$("#img-view").find(".image-div").attr("src",window.images[currentImg]);
            }
            else{
                $("#img-view").css("display", "none");
				$("body").css("overflow", "auto");
            }
    })
</script>
@endsection
