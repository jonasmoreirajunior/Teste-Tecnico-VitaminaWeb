<?php

function the_SVG($file)
{
    echo get_the_SVG($file);
}

function get_the_SVG($file)
{
    $stream_opts = [
        "ssl" => [
            "verify_peer" => false,
            "verify_peer_name" => false,
        ]
    ];

    return file_get_contents(SVGPATH . $file . ".svg", false, stream_context_create($stream_opts));
}

function printf_array($format, $arr)
{
    return call_user_func_array('printf', array_merge((array)$format, $arr));
}

function bd_get_postthumbnail($post_id)
{
    $post_thumbnail_id = get_post_thumbnail_id($post_id);
    $post_thumbnail_full = wp_get_attachment_image_src($post_thumbnail_id, 'full');
    $post_thumbnail_large = wp_get_attachment_image_src($post_thumbnail_id, 'large');
    $post_thumbnail_medium = wp_get_attachment_image_src($post_thumbnail_id, '600x600');
    $post_thumbnail_hero_600 = wp_get_attachment_image_src($post_thumbnail_id, '600x600');
    $attachment = get_post($post_thumbnail_id);

    $images = array(
        $post_thumbnail_hero_600[0],
        $post_thumbnail_medium[0],
        $post_thumbnail_large[0],
        $post_thumbnail_full[0],
        $post_thumbnail_full[0],
        $post_thumbnail_full[1],
        $post_thumbnail_full[2],
        get_post_meta($attachment->ID, '_wp_attachment_image_alt', true), // alt
        $attachment->post_excerpt, // caption
        $attachment->post_content, // description
        $attachment->post_title // title
    );

    printf_array('<picture>
    <source srcset="%s" media="(max-width: 600px)">
    <source srcset="%s" media="(max-width: 768px)">
    <source srcset="%s" media="(max-width: 1024px)">
    <source srcset="%s">
    <img srcset="%s" width="%s" height="%s" alt="%s" caption="%s" description="%s" title="%s">
    </picture>', $images);
}