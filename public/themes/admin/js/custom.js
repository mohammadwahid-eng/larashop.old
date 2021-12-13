/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 *
 */

"use strict";


$(document).on('keyup', '[data-slugify]', function () {
    let target = $(this).data('slugify');
    let slug = $(this).val().trim().toLowerCase().replace(/[^a-zA-Z0-9]+/g, '-');
    $(target).val(slug);
    if ($(target).val().trim()) {
        $(target).removeClass('error');
        $(target).parent().find('label.error').hide().text("");
    }
});