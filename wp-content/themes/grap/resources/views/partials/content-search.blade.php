<div class="container">
    <div class="content-search">
        <article @php post_class() @endphp>
            <h2 class="entry-title"><a href="{{ get_permalink() }}">{!! get_the_title() !!}</a></h2>
            <div class="entry-summary">
                @php the_excerpt() @endphp
            </div>
        </article>
    </div>
</div>
