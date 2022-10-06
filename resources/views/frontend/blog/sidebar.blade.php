<div class="col-lg-4">
    <div class="sidebar" data-aos="fade-left">
        <h3 class="sidebar-title">Search</h3>
        <div class="sidebar-item search-form">
            <form action="{{ route('blog') }}" method="GET" id="searchBlogForm">                
                <input type="text" name="search" value="{{ request()->query('search') }}" placeholder="Search by title or content">
                <button type="submit"><i class="icofont-search"></i></button>
            </form>
        </div>
        <!-- End sidebar search formn-->
        <h3 class="sidebar-title">Categories</h3>
        <div class="sidebar-item categories">
            <ul>
                <?php $categories = get_categories(); ?>                                
                @foreach ($categories as $key => $category)
                <li><a href="{{ route('blog-category',$category->slug) }}">{{ $category->name }} <span>({{ $category->blogs()->count() }})</span></a></li>
                @endforeach
            </ul>
        </div>
        <!-- End sidebar categories-->
        <h3 class="sidebar-title">Recent Posts</h3>
        <div class="sidebar-item recent-posts">                            
            <?php $recent_blogs = get_recent_blogs(); ?>
            @foreach ($recent_blogs as $key => $recent_blog)
            <div class="post-item clearfix">
                <img src="{{ getBlogImage($recent_blog->image) }}" alt="{{ $recent_blog->title }}">
                <h4><a href="{{ route('blog-detail',$recent_blog->slug) }}">{{ $recent_blog->title }}</a></h4>
                <time datetime="2020-01-01">{{ $recent_blog->posted_at->diffForHumans() }}</time>
            </div>
            @endforeach
        </div>
        <!-- End sidebar recent posts-->
        <h3 class="sidebar-title">Tags</h3>
        <div class="sidebar-item tags">
            <ul>                                
                <?php $tags = get_tags(); ?>
                @foreach ($tags as $key => $tag)
                <li><a href="{{ route('blog-tag',$tag->slug) }}">{{ $tag->name }}</a></li>
                @endforeach
            </ul>
        </div>
        <!-- End sidebar tags-->
    </div>
    <!-- End sidebar -->
</div>
<!-- End blog sidebar -->

@section('scripts')
<script src="{{ asset('js/frontend/blog/sidebar.js') }}"></script>
@endsection