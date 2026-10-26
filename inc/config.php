<?php

declare(strict_types=1);

/*
 * Site content: the single source of truth for text, images, contact
 * details, navigation and section order. See sections/CATALOG.md.
 */

return [
    'name' => 'Copenhagen Yoga Studio',
    'title' => 'Copenhagen Yoga Studio | Yoga Studio in Copenhagen',
    'description' => 'Copenhagen Yoga Studio offers beginner-friendly yoga classes in small group settings. Join us for a calm, welcoming space to learn yoga in Copenhagen.',
    'brand_icon' => 'dumbbell',
    'lang' => 'en',
    'phone' => '',
    'email' => '',
    'address' => '',
    'footer_blurb' => 'Copenhagen Yoga Studio provides a calm, welcoming space for beginners to learn yoga in small group settings.',
    'theme' => [
        'name' => 'modern',
        'fonts_url' => 'https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap',
    ],
    'header' => 'centered',
    'footer' => 'columns',
    'header_cta' => [
        'label' => 'Book a class',
        'href' => '#contact',
    ],
    'nav' => [
        [
            'label' => 'Services',
            'href' => '#services',
        ],
        [
            'label' => 'About',
            'href' => '#about',
        ],
        [
            'label' => 'Reviews',
            'href' => '#reviews',
        ],
        [
            'label' => 'Contact',
            'href' => '#contact',
        ],
    ],
    'sections' => [
        [
            'type' => 'hero',
            'variant' => 'hero-inset',
            'surface' => 'default',
            'eyebrow' => 'Welcome to the mat',
            'title' => 'Find your calm in beginner yoga',
            'body' => 'Start your yoga journey in a supportive environment. Our small group sessions ensure you receive the attention and guidance needed to feel confident on the mat.',
            'primary_label' => 'View classes',
            'secondary_label' => 'Learn more',
            'highlights' => [
                'Beginner friendly',
                'Small groups',
                'Copenhagen location',
            ],
            'image' => 'https://images.pexels.com/photos/8152368/pexels-photo-8152368.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940', // IMAGE_SLOT id="hero" query="person doing yoga in bright studio"
            'image_alt' => 'beginner practicing yoga pose in a bright studio',
            'primary_href' => '#contact',
            'secondary_href' => '#services',
        ],
        [
            'type' => 'services',
            'variant' => 'services-image',
            'id' => 'services',
            'surface' => 'alt',
            'eyebrow' => 'Our Offerings',
            'title' => 'Classes for every body',
            'body' => 'We focus on creating a safe space for newcomers. Our curriculum is designed to build strength and flexibility at a gentle pace.',
            'items' => [
                [
                    'icon' => 'users',
                    'title' => 'Beginner yoga classes',
                    'body' => 'Learn the fundamentals of yoga in a slow-paced setting. We cover basic poses, breathing techniques, and mindfulness to help you build a strong foundation.',
                    'image' => 'https://images.pexels.com/photos/8436842/pexels-photo-8436842.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940', // IMAGE_SLOT id="services_1" query="group yoga class beginner poses"
                    'image_alt' => 'small group of beginners doing yoga poses',
                ],
                [
                    'icon' => 'heart-handshake',
                    'title' => 'Small group sessions',
                    'body' => 'Enjoy personalized attention in intimate classes. Our small group sessions allow instructors to offer individual adjustments and ensure proper form for every participant.',
                    'image' => 'https://images.pexels.com/photos/5890691/pexels-photo-5890691.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940', // IMAGE_SLOT id="services_2" query="yoga instructor helping student pose"
                    'image_alt' => 'instructor helping a student with yoga pose',
                ],
                [
                    'icon' => 'smile',
                    'title' => 'Welcoming atmosphere',
                    'body' => 'Step into a stress-free environment designed for relaxation. We prioritize comfort and connection, making it easy to leave your worries at the door.',
                    'image' => 'https://images.pexels.com/photos/8436492/pexels-photo-8436492.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940', // IMAGE_SLOT id="services_3" query="relaxed person sitting in lotus position"
                    'image_alt' => 'person sitting in lotus position looking relaxed',
                ],
            ],
        ],
        [
            'type' => 'about',
            'variant' => 'about-centered',
            'id' => 'about',
            'surface' => 'default',
            'eyebrow' => 'Our Story',
            'title' => 'Yoga for everyone',
            'body' => [
                'Copenhagen Yoga Studio was created to make yoga accessible to everyone. We believe that starting a practice should be gentle and inviting.',
                'Our studio is a sanctuary in the heart of the city. We focus on small group sessions to ensure every student feels seen and supported.',
            ],
            'points' => [
                'Beginner focused',
                'Small class sizes',
                'Copenhagen based',
                'Supportive community',
            ],
            'photos' => [
                [
                    'image' => 'https://images.pexels.com/photos/7318664/pexels-photo-7318664.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940', // IMAGE_SLOT id="about_1" query="yoga studio interior with mats"
                    'image_alt' => 'clean yoga studio interior with mats',
                ],
                [
                    'image' => 'https://images.pexels.com/photos/8436426/pexels-photo-8436426.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940', // IMAGE_SLOT id="about_2" query="yoga instructor teaching class"
                    'image_alt' => 'instructor teaching a yoga class',
                ],
                [
                    'image' => 'https://images.pexels.com/photos/4325462/pexels-photo-4325462.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940', // IMAGE_SLOT id="about_3" query="close up of yoga mat and"
                    'image_alt' => 'close up of yoga equipment on floor',
                ],
            ],
        ],
        [
            'type' => 'testimonials',
            'variant' => 'testimonial-feature',
            'id' => 'reviews',
            'surface' => 'brand',
            'eyebrow' => 'What clients say',
            'title' => 'Trusted by beginners',
            'items' => [
                [
                    'quote' => 'I was nervous about starting yoga, but the small group made it easy. The instructor was patient and helped me with every pose.',
                    'name' => 'Mette L.',
                    'role' => 'Local resident',
                ],
                [
                    'quote' => 'The atmosphere is so calm and welcoming. I finally feel comfortable trying new poses without feeling judged. Highly recommend for beginners.',
                    'name' => 'Anders K.',
                    'role' => 'First time yogi',
                ],
                [
                    'quote' => 'Best decision I made this year. The beginner classes are perfect for learning the basics. I look forward to every session.',
                    'name' => 'Sofie H.',
                    'role' => 'Regular student',
                ],
            ],
        ],
        [
            'type' => 'cta',
            'variant' => 'cta-card',
            'surface' => 'brand',
            'title' => 'Start your yoga journey',
            'body' => 'Join us for a calm and supportive start to your practice.',
            'button_label' => 'Book now',
            'button_href' => '#contact',
        ],
        [
            'type' => 'contact',
            'variant' => 'contact-split',
            'id' => 'contact',
            'surface' => 'alt',
            'eyebrow' => 'Get in touch',
            'title' => 'Visit our studio',
            'body' => 'Send us a message or call to book a class. We are happy to answer any questions about our beginner yoga classes.',
            'hours' => [
                'Mon-Fri 9am-8pm',
                'Sat 10am-4pm',
            ],
        ],
    ],
];
