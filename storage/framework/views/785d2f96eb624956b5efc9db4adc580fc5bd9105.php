<?php $__env->startSection('title',trans('Category')); ?>

<?php $__env->startSection('banner_heading'); ?>
<?php echo app('translator')->get('Listing Category'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php if(count($listingCategory) > 0): ?>
<section class="category-section">
    <div class="container">
        <div class="row g-3 g-lg-4">

<?php /*
<section class="category-filter-section">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="categories categories-alphabet owl-carousel" id="categories">
                    <button class="character" data-character="a">@lang('a')</button>
                    <button class="character" data-character="b">@lang('b')</button>
                    <button class="character" data-character="c">@lang('c')</button>
                    <button class="character" data-character="d">@lang('d')</button>
                    <button class="character" data-character="e">@lang('e')</button>
                    <button class="character" data-character="f">@lang('f')</button>
                    <button class="character" data-character="g">@lang('g')</button>
                    <button class="character" data-character="h">@lang('h')</button>
                    <button class="character" data-character="i">@lang('i')</button>
                    <button class="character" data-character="j">@lang('j')</button>
                    <button class="character" data-character="k">@lang('k')</button>
                    <button class="character" data-character="l">@lang('l')</button>
                    <button class="character" data-character="m">@lang('m')</button>
                    <button class="character" data-character="n">@lang('n')</button>
                    <button class="character" data-character="o">@lang('o')</button>
                    <button class="character" data-character="p">@lang('p')</button>
                    <button class="character" data-character="q">@lang('q')</button>
                    <button class="character" data-character="r">@lang('r')</button>
                    <button class="character" data-character="s">@lang('s')</button>
                    <button class="character" data-character="t">@lang('t')</button>
                    <button class="character" data-character="u">@lang('u')</button>
                    <button class="character" data-character="v">@lang('v')</button>
                    <button class="character" data-character="w">@lang('w')</button>
                    <button class="character" data-character="x">@lang('x')</button>
                    <button class="character" data-character="y">@lang('y')</button>
                    <button class="me-5 character" data-character="z">@lang('z')</button>
                </div>
            </div>
        </div>

        <div class="row g-3 mt-5" id="renderCategory">
            @include($theme.'includes.listing.category')
        </div>
    </div>
</section> */  ?>
 <?php echo $__env->make($theme.'includes.listing.category', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
    </div>
</section>
<?php else: ?>
<div class="custom-not-found2">
    <img src="<?php echo e(asset($themeTrue.'img/no_data_found.png')); ?>" alt="<?php echo e(config('basic.site_title')); ?>" class="img-fluid">
</div>
<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>

<script>
'use strict'
$(document).ready(function() {
    $('.character').on('click', function() {
        let character = $(this).attr('data-character');
        let _this = this;
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "<?php echo e(route('categorySearch')); ?>",
            type: "post",
            data: {
                character: character,
            },
            success: function(data) {
                $('.owl-item').removeClass('active');
                $('.character').not(this).removeClass('active');
                $(_this).addClass('active')
                if ((data.count) * 1 < 1) {
                    $('#renderCategory').html(`<div class="custom-not-found2">
                            <img src="<?php echo e(asset($themeTrue.'img/no_data_found.png')); ?>" alt="<?php echo e(config('basic.site_title')); ?>"
                                 class="img-fluid">
                        </div>`);

                } else {

                    console.log(this);
                    $('#renderCategory').html(data.data);
                    $(this).addClass('active');
                }

            }
        });

    });

});
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make($theme.'layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sites/28a/2/26dd80d363/public_html/resources/views/themes/classic/category.blade.php ENDPATH**/ ?>