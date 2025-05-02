
<section class="container video-section">
        <?php
    // Loop through up to 4 videos
    $videos = [];
    for ($i = 1; $i <= 4; $i++) {
        $video_title = get_post_meta(get_the_ID(), "_people_video_{$i}_title", true);
        $video_description = get_post_meta(get_the_ID(), "_people_video_{$i}_description", true);
        $video_link = get_post_meta(get_the_ID(), "_people_video_{$i}_link", true);

        if (!empty($video_link)) {
            $videos[] = [
                'title' => $video_title,
                'description' => $video_description,
                'link' => $video_link,
            ];
        }
    }

    if (!empty($videos)) : ?>
        <div class="splide pvid-splide">
            <div class="splide__track">
                <ul class="splide__list">
                    <?php foreach ($videos as $video) : ?>
                    <li class="splide__slide">
                        <div class="pvid-video-container">
                            <div class="pvid-video-wrapper">
                                <iframe src="<?php echo esc_url($video['link']); ?>?enablejsapi=1" frameborder="0"
                                    allow="autoplay; encrypted-media" allowfullscreen>
                                </iframe>
                            </div>
                            <?php if (!empty($video['title']) || !empty($video['description'])) : ?>
                            <div class="pvid-video-info">
                                <?php if (!empty($video['title'])) : ?>
                                <h3 class="pvid-video-title"><?php echo esc_html($video['title']); ?></h3>
                                <?php endif; ?>
                                <?php if (!empty($video['description'])) : ?>
                                <p class="pvid-video-description"><?php echo esc_html($video['description']); ?></p>
                                <?php endif; ?>
                            </div>
                            <?php endif; ?>
                        </div>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <?php endif; ?>
    </section>