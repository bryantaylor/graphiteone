@php
$posts_data = App\get_post_list();
$categories = $posts_data['categories'];
$posts = $posts_data['posts'];
$page = $posts_data['page'];
$posts_per_page = $posts_data['posts_per_page'];
$no_posts_found_message = $posts_data['no_posts_found_message'];
$cat_query = $_GET['cat'];
$total_page = App\get_total_by_category_slug($cat_query, $posts_per_page);
foreach ($categories as $category) {
    $categories_list .= $category->slug . ' ';
}
@endphp

<div class="new-and-resources-block post-grid-block light" data-page="{{ $page }}" data-posts-per-page="{{ $posts_per_page }}"
    data-no-posts-found-message="{{ $no_posts_found_message }}" data-categories="{{ $categories_list }}">
    <div class="container">
        <div class="filter-bar">
            <div class="filter-item h3 filter-active">
                <span class="red-dot"></span>
                <div class="filter-name">All</div>
            </div>
            @foreach ($categories as $item)
                <div class="filter-item h3" data-cta="{{ $item->slug }}">
                    <span class="red-dot"></span>
                    <div class="filter-name">{{ $item->name }}</div>
                </div>
            @endforeach
        </div>

        <div class="post-category">
            <div class="posts">
                @foreach ($posts as $index => $post)
                    @php
                        $post_type = get_post_type($post->ID);
                        $taxonomies = get_object_taxonomies($post_type)[0];
                        $taxonomy_names = wp_get_object_terms($post->ID, $taxonomies, ['fields' => 'names']);
                        $post_date = date('F j, Y', strtotime($post->post_date));
                        $post_permalink = get_permalink($post->ID);
                        $external_link = get_field('external_link', $post->ID);
                        $post_link = $external_link['url'] ? $external_link['url'] : $post_permalink;
                    @endphp
                    <div class="post-card-wrap">
                        <div class="post">
                            <a href="{{ $post_link }}" target="{{ $external_link['target'] }}" class="post-wrap">
                                <div class="category-wrap title-border-top d-flex align-items-center justify-content-between">
                                    @if ($taxonomy_names[0])
                                        <div class="category d-flex align-items-center">
                                            <span class="dot"></span>
                                            <div class="category-name h5">{{ $taxonomy_names[0] }}</div>
                                        </div>
                                    @endif
                                    <div class="post-date h5">{{ $post_date }}</div>
                                </div>
                                <div class="post-title">{{ $post->post_title }}</div>
                                <div class="post-button primary-orange">
                                    @if ($taxonomy_names[0] == 'Company News' || $taxonomy_names[0] == 'Community News')
                                        Read News
                                    @else
                                        @if ($taxonomy_names[0] == 'Press')
                                            Visit Link
                                        @else
                                            View Resources
                                        @endif
                                    @endif
                                    <img src="@asset('images/arrow-right.png')" alt="arrow-right" class="arrow-icon">
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="post-loading spinner col-lg-12 text-center my-auto d-none">
                <div class="loading-spinner spinner-border primary-orange ">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>

            <div class="pagination-wrap">
                <ul class="page-bar">
                    @if ($total_page <= 4)
                        @for ($page_num = 1; $page_num <= $total_page; $page_num++)
                            <li class="page-number {{ $page_num == 1 ? 'active' : '' }} " data-page-number="{{ $page_num }}">
                                {{ $page_num }}
                            </li>
                        @endfor
                    @else
                        <li class="page-number active" data-page-number="1">1</li>
                        <li class="d-none pagination-dot">...</li>
                        <li class="page-number prev-page" data-page-number="2">2</li>
                        <li class="page-number current-page" data-page-number="3">3</li>
                        <li class="page-number next-page" data-page-number="4">4</li>
                    @endif
                </ul>
                <span>of</span>
                <div class="total-page">{{ $total_page }}</div>
            </div>
        </div>

        <div class="spinner col-lg-12 text-center my-auto d-none">
            <div class="loading-spinner spinner-border primary-orange ">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
    </div>
</div>
