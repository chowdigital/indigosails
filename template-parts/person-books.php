<section class="container books-section">
    <h2 class="center-text"> Books by <?php the_title(); ?></h2>
    <?php
    // Loop through up to 5 books
    $books = [];
    for ($i = 1; $i <= 5; $i++) {
        $book_image = get_post_meta(get_the_ID(), "_people_book_{$i}_image", true);
        $book_title = get_post_meta(get_the_ID(), "_people_book_{$i}_title", true);
        $book_link = get_post_meta(get_the_ID(), "_people_book_{$i}_link", true);

        if (!empty($book_image) || !empty($book_title) || !empty($book_link)) {
            $books[] = [
                'image' => $book_image,
                'title' => $book_title,
                'link' => $book_link,
            ];
        }
    }

    if (!empty($books)) : ?>
    <div class="books-grid">
        <?php foreach ($books as $book) : ?>
        <div class="book-card">
            <?php if (!empty($book['image'])) : ?>
            <a href="<?php echo esc_url($book['link']); ?>" target="_blank" rel="noopener noreferrer">
                <img src="<?php echo esc_url($book['image']); ?>" alt="<?php echo esc_attr($book['title']); ?>"
                    class="book-image" />
            </a>
            <?php endif; ?>
            <?php if (!empty($book['title'])) : ?>
            <h3 class="book-title"><?php echo esc_html($book['title']); ?></h3>
            <?php endif; ?>
        </div>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>
</section>