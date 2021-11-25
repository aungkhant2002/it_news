@extends("blog.master")

@section("content")
    @forelse($articles as $article)

        <div class="border-bottom mb-4 pb-4 article-preview">
            <div class="p-0 p-md-3">
                <a class="fw-bold h4 d-block text-decoration-none"
                   href="http://localhost:9090/2021/09/15/et-omnis-eum-ab-non/">
                    {{ $article->title }}
                </a>

                <div class="small post-category mb-3">
                    <a href="http://localhost:9090/category/apple/" rel="category tag">{{ $article->category->title }}</a>
                </div>

                <div class="text-black-50 the-excerpt">
                    <p>{{ $article->description }}</p>
                </div>

                <div class="d-flex justify-content-between align-items-center see-more-group">
                    <div class="d-flex align-items-center">
                        @if($article->user->photo)
                            <img alt="" src="{{ asset("storage/profile/".$article->user->photo) }}"
                                 class="avatar avatar-50 photo rounded-circle" height="50" width="50"
                                 loading="lazy">
                        @else
                            <img alt="" src="{{ asset("dashboard/img/default-user-img.jpg") }}"
                                 class="avatar avatar-50 photo rounded-circle" height="50" width="50"
                                 loading="lazy">
                        @endif

                        <div class="ms-2">
                            <span class="small">
                                <i class="feather-user"></i>
                                {{ $article->user->name }}
                            </span>
                            <br>
                            <span class="small">
                                {{ $article->created_at->format("d M Y") }}
                            </span>
                        </div>
                    </div>

                    <a href="{{ route("detail", $article->id) }}" class="btn btn-outline-primary rounded-pill px-3">Read More</a>
                </div>
            </div>
        </div>

    @empty

    @endforelse
@endsection

@section("pagination-place")

    {{ $articles->links() }}

@endsection
