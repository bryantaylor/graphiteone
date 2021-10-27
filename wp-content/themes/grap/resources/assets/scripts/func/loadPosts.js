export function handleLoadPosts() {
    $(document).on('click', '.page-number', handleChangePage)
    $('.filter-item').click(handleChangePostCat)
}

let ajax

function handleChangePostCat(e) {
    e.preventDefault()
    $('.post-category').addClass('d-none')
    $('.spinner').removeClass('d-none')
    $('.filter-bar').find('.filter-item').removeClass('filter-active')
    !$(this).hasClass('filter-active') && $(this).addClass('filter-active')
    let category = $(this).data('cta')
    getPosts({ category, page: 1 });
}

function preLoadPosts(pageNum) {
    $('.page-bar').find('.page-number').removeClass('active')
    !$('.current-page').hasClass('active') && $('.current-page').addClass('active')
    $('.current-page').text(pageNum)
    $('.current-page').attr('data-page-number', pageNum)
    $('.prev-page').text(pageNum - 1)
    $('.prev-page').attr('data-page-number', pageNum - 1)
    $('.next-page').text(pageNum + 1)
    $('.next-page').attr('data-page-number', pageNum + 1)
}

function handleChangePage() {
    $('.posts').addClass('d-none')
    $('.post-loading').removeClass('d-none')
    const totalPage = +($('.total-page').text())
    const currentPage = +($(this)[0].innerHTML)

    if (currentPage < 3 || currentPage == totalPage) {
        $('.page-bar').find('.page-number').removeClass('active')
        !$(this).hasClass('active') && $(this).addClass('active')
    } else {
        preLoadPosts(currentPage)
        if (currentPage == 3) {
            !$('.pagination-dot').hasClass('d-none') && $('.pagination-dot').addClass('d-none')
        } else {
            if (currentPage >= 4 && currentPage < totalPage) {
                $('.pagination-dot').removeClass('d-none')
            }
        }
    }
    let category = $('.filter-active').data('cta')
    getPosts({ page: currentPage, category })
}

function getPosts({ page, category, preRequest }) {
    if (ajax) {
        ajax.abort()
    }

    !!preRequest && preRequest()

    const postGridBlock = $('.post-grid-block')
    const noPostsFoundMessage = postGridBlock.data('no-posts-found-message') || 'No Posts Found.'
    const postList = $('.posts')
    let url = new URL(window.location.href)
    url.searchParams.append('paged', page)

    if (category) url.href += '&cat=' + category

    ajax = $.ajax({
        url: url.href,
        success: function (res) {
            let postListHtml = ''
            const postsInListRes = $(res).find('.post-card-wrap') || []
            const paginationWrapRes = $(res).find('.pagination-wrap') || ''

            $.each(postsInListRes, function (index, post) {
                postListHtml += post.outerHTML
            })

            if (page === 1) {
                postList.find('.post-card-wrap').remove()
                if (postListHtml) {
                    postList.prepend(postListHtml)
                    $('.pagination-wrap').replaceWith(paginationWrapRes)
                    $('.posts').hasClass('d-none') && $('.posts').removeClass('d-none')
                    $('.post-category').removeClass('d-none')
                    $('.spinner').addClass('d-none')
                    $('.no-posts-found').remove()
                } else {
                    $('.post-category').removeClass('d-none')
                    $('.spinner').addClass('d-none')
                    $('.pagination-wrap').hide()
                    postList.html(`<p class="no-posts-found mx-auto py-5 text-center"><b>${noPostsFoundMessage}</b></p>`)
                }
            } else {
                $('.posts').removeClass('d-none')
                $('.post-loading').addClass('d-none')
                postList.html(postListHtml)
            }
            postGridBlock.attr('data-page', page)
        },
        error: function () { },
    })
}
