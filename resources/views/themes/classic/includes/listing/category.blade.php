@foreach ($listingCategory as $category)
{{--    @dd($category)--}}
<div class="col-xl-4 col-md-6 col-6">
    <a href="{{ route('listing',[slug(optional($category->details)->name), $category->id]) }}">
    <div class="category-box">
            <div class="icon-box">
                <i class="{{ $category->icon }}"></i>
            </div>
            <div>
                <h5>@lang(optional($category->details)->name)</h5>
                <span>{{ $category->getCategoryCount() }} @lang('Listings')</span>
            </div>
        </div>
    </a>
</div>
@endforeach


@push('script')
<script src="{{ asset($themeTrue.'js/carousel.js') }}"></script>
@endpush