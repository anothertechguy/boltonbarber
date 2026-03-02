<!DOCTYPE html>
<html <?php language_attributes(); ?> class="dark scroll-smooth">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- SEO Optimization: Single primary page title -->
    <title><?php 
        if ( is_front_page() || is_home() ) {
            echo 'Bolton Barber Studio | Denver Barber in Wheat Ridge, CO';
        } else {
            wp_title( '|', true, 'right' );
            bloginfo( 'name' );
        }
    ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet" />
    <?php wp_head(); ?>
    <script>
        // Inject Web3Forms Access Key from ACF front page fields
        window.WEB3FORMS_ACCESS_KEY = '<?php echo esc_js(get_field('web3forms_access_key', get_option('page_on_front')) ?: '7f11b2f4-2253-439e-aba0-474729ce130f'); ?>';
    </script>
</head>
<body <?php body_class('bg-background-dark text-slate-100 font-display'); ?>>
    <?php wp_body_open(); ?>

    <!-- Header / Navigation -->
    <header class="fixed top-0 w-full z-50 bg-background-dark/90 backdrop-blur-md border-b border-white/10">
        <div class="max-w-7xl mx-auto px-6 h-20 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <!-- Mobile Menu Button -->
                <button id="mobile-menu-btn" class="md:hidden flex flex-col justify-center items-center w-12 h-12 gap-1.5 focus:outline-none bg-primary hover:bg-primary/90 rounded-xl group p-3 shadow-2xl z-[60]">
                    <span class="w-full h-[2.5px] bg-white transition-all rounded-full group-active:bg-background-dark"></span>
                    <span class="w-full h-[2.5px] bg-white transition-all rounded-full group-active:bg-background-dark"></span>
                    <span class="w-3/4 h-[2.5px] bg-white transition-all rounded-full self-start group-active:bg-background-dark"></span>
                </button>
                <a href="<?php echo esc_url(home_url('/')); ?>" class="flex items-center gap-3 group cursor-pointer">
                    <img loading="lazy" decoding="async" src="<?php echo get_template_directory_uri(); ?>/assets/bolton-logo.jpg" alt="Bolton Barber Studio" class="h-12 w-auto hidden md:block">
                    <div class="text-xl font-black uppercase tracking-tighter hidden md:block group-hover:text-primary transition-colors">Bolton <span class="text-primary">Barber</span> Studio</div>
                </a>
            </div>
            <nav class="hidden md:flex items-center gap-10">
                <a class="text-sm font-semibold uppercase tracking-widest hover:text-primary transition-colors" href="#services">Services</a>
                <a class="text-sm font-semibold uppercase tracking-widest hover:text-primary transition-colors" href="#about">About</a>
                <a class="text-sm font-semibold uppercase tracking-widest hover:text-primary transition-colors" href="#contact">Contact</a>
            </nav>
            <div class="flex items-center gap-6">
                <a href="https://christopherbolton841377.wlbookings.com/booking?t=s&uuid=41ead2d9-c40d-41a1-b600-bce2d6e679b2" target="_blank" class="bg-primary hover:bg-primary/90 active:bg-primary/80 text-white px-6 py-2.5 rounded-lg text-sm font-bold uppercase tracking-wider transition-all inline-block text-center cursor-pointer">
                    Book Appointment
                </a>
            </div>
        </div>
    </header>

    <main class="pt-20">
        <?php if ( is_front_page() ) : ?>
            <!-- Hero Section -->
            <?php 
            $hero_headline = get_field('hero_headline') ?: 'Elite Fades';
            $hero_subheadline = get_field('hero_subheadline') ?: 'Modern Vibes';
            $hero_desc = get_field('hero_description') ?: 'Master Barber Chris Bolton serving up sharp fades and modern vibes. Real chill, real precision, sharp results.';
            $hero_bg = get_field('hero_bg') ?: get_template_directory_uri() . '/assets/hero background.jpeg';
            ?>
            <section class="relative h-[90vh] flex items-center overflow-hidden">
                <div class="absolute inset-0 z-0">
                    <style>
                        .hero-bg-mobile { 
                            background-position: 80% center; 
                            background-image: url('<?php echo esc_url($hero_bg); ?>');
                        }
                        @media (max-width: 768px) {
                            .hero-bg-mobile { 
                                background-image: url('<?php echo get_template_directory_uri(); ?>/assets/mobile\ hero.jpeg') !important;
                                background-size: cover !important;
                                background-repeat: no-repeat !important;
                                background-position: center !important;
                            }
                        }
                    </style>
                    <div class="absolute inset-0 bg-background-dark/20 md:bg-background-dark/10 z-10"></div>
                    <!-- Very dark gradient overlay on the left to ensure text is always readable against the bright mirror -->
                    <div class="absolute inset-0 bg-gradient-to-r from-[#111111] via-[#111111]/90 to-transparent w-[140%] md:w-full z-10"></div>
                    <div class="w-full h-full bg-cover hero-bg-mobile md:!bg-center"></div>
                </div>
                <div class="relative z-20 max-w-7xl mx-auto px-6 w-full">
                    <div class="max-w-2xl">
                        <span class="text-primary font-bold tracking-[0.3em] uppercase mb-4 block drop-shadow-md">Bolton Barber Studio</span>
                        <h1 class="text-6xl md:text-7xl font-black leading-tight mb-6 drop-shadow-xl text-transparent select-none" style="font-size: 0px;">
                            Bolton Barber Studio – Denver Barber in Wheat Ridge
                        </h1>
                        <h2 class="text-6xl md:text-7xl font-black leading-tight mb-6 drop-shadow-xl mt-0">
                            <?php echo esc_html($hero_headline); ?> <br/>
                            <span class="gold-gradient-text drop-shadow-md"><?php echo esc_html($hero_subheadline); ?></span>
                        </h2>
                        <?php if ($hero_desc) : ?>
                            <p class="text-xl text-slate-400 mb-10 max-w-lg leading-relaxed drop-shadow-md">
                                <?php echo esc_html($hero_desc); ?>
                            </p>
                        <?php endif; ?>
                        <div class="flex flex-wrap gap-4">
                                <a href="https://christopherbolton841377.wlbookings.com/booking?t=s&uuid=41ead2d9-c40d-41a1-b600-bce2d6e679b2" target="_blank" class="bg-primary text-white px-8 py-4 rounded-xl text-lg font-bold uppercase tracking-wider hover:scale-105 active:scale-95 transition-transform inline-block text-center cursor-pointer">
                                    Book Appointment
                                </a>
                            <a href="#services" class="border border-white/20 hover:bg-white/10 text-white px-8 py-4 rounded-xl text-lg font-bold uppercase tracking-wider transition-colors inline-block text-center">
                                View Services
                            </a>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Service Menu Section -->
            <section class="py-24 bg-surface-dark/50" id="services">
                <div class="max-w-7xl mx-auto px-6">
                    <div class="flex flex-col md:flex-row justify-between items-end mb-16 gap-6">
                        <div>
                            <h2 class="text-4xl font-black uppercase tracking-tight">Service Menu</h2>
                        </div>
                        <p class="text-slate-400 max-w-md text-right hidden md:block italic">
                            "Precision is not just a skill, it's a standard we live by every single day."
                        </p>
                    </div>

                    <?php 
                    $services = get_field('service_menu');
                    if ( empty($services) ) {
                        $services = [
                            ['name' => 'Hot Towel Shave', 'price' => '$55', 'description' => 'A relaxing straight razor shave laid back with hot lather, a facial steamer, two hot towels, and the closest shave you can get with that old school barber shop feeling.', 'is_premium' => false],
                            ['name' => 'Signature Haircut', 'price' => '$50', 'description' => 'A precise, and custom tailored haircut, Created specifically for your face shape, hair type, growth patterns, delivering you the best possible style blending functionality, form, and practicality for you and your lifestyle.', 'is_premium' => false],
                            ['name' => 'Beard Sculpt', 'price' => '$35', 'description' => 'Come in disheveled and leave distinguished. Leaving no single hair out of place. The beard sculpt is more than a trim, it takes your beard and creates the perfect shape to compliment your face and Includes a straight razor line up, and a premium aftershave to finish off.', 'is_premium' => false],
                            ['name' => 'Hair and Beard', 'price' => '$65', 'description' => 'A bundle deal combo of the Signature Haircut and the Beard Sculpt. Designed to save you money, and keep you looking pristine all the time.', 'is_premium' => false],
                            ['name' => 'VIP', 'price' => '$100', 'description' => 'The best value on the menu combining every add on and service together into one crazy bundle. I’ll take care of your eyebrows and hair and facial hair. Complete with two hot towels, shampoo, and style. If you’re looking for the best barbering experience money can buy this is it right here.', 'is_premium' => true],
                            ['name' => 'Kids Cut (Ages 1-11)', 'price' => '$40', 'description' => 'A great cut for the kids. No razor work, but still the great precision and sharpness you’ve come to love from the signature haircut.', 'is_premium' => false],
                        ];
                    }
                    ?>
                    
                    <?php if ( !empty($services) ) : ?>
                        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 mb-20">
                            <?php foreach ($services as $service) : 
                                $name = $service['name'];
                                $price = $service['price'];
                                $desc = $service['description'];
                                $premium = $service['is_premium'];
                            ?>
                                <div class="bg-surface-dark/40 p-8 rounded-2xl border border-white/5 hover:border-primary active:border-primary cursor-pointer transition-all duration-300 group relative overflow-hidden backdrop-blur-sm">
                                    <?php if ($premium) : ?>
                                        <div class="absolute top-0 right-0 bg-primary text-white text-[10px] font-bold px-3 py-1 uppercase tracking-tighter">Premium</div>
                                    <?php endif; ?>
                                    <div class="flex justify-between items-start mb-4">
                                        <h3 class="text-xl font-bold group-hover:text-primary group-active:text-primary transition-colors text-white"><?php echo esc_html($name); ?></h3>
                                        <span class="text-primary font-black text-xl"><?php echo esc_html($price); ?></span>
                                    </div>
                                    <p class="text-slate-400 text-sm leading-relaxed"><?php echo esc_html($desc); ?></p>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                    <!-- Add-ons Section -->
                    <?php 
                    $addons = get_field('addons_menu');
                    if ( empty($addons) ) {
                        $addons = [
                            ['name' => 'Hot Towel', 'price' => '$15'],
                            ['name' => 'Razor Eyebrows', 'price' => '$10'],
                            ['name' => 'Shampoo', 'price' => '$15'],
                            ['name' => 'Enhancements', 'price' => '$15'],
                            ['name' => 'Design', 'price' => '$10-$20'],
                            ['name' => 'Neck Shave', 'price' => '$15'],
                        ];
                    }
                    ?>
                    <?php if ( !empty($addons) ) : ?>
                        <div class="bg-surface-dark border border-white/10 rounded-3xl p-10 shadow-xl">
                            <h3 class="text-2xl font-bold mb-8 flex items-center gap-3 text-white">
                                <span class="material-symbols-outlined text-primary">remove_circle</span>
                                Premium Add-ons
                            </h3>
                            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6">
                                <?php foreach ($addons as $addon) : ?>
                                    <div class="space-y-1">
                                        <p class="font-bold text-slate-100"><?php echo esc_html($addon['name']); ?></p>
                                        <p class="text-primary font-black"><?php echo esc_html($addon['price']); ?></p>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </section>

            <!-- About Section -->
        <?php 
        $legacy_headline = get_field('legacy_headline') ?: 'Meet The Master';
        $legacy_content = get_field('legacy_content');
        $img = get_field('legacy_image');

        if ( empty($legacy_content) ) {
            $legacy_content = '<p>I’m the owner of Bolton Barber Studio, and barbering is more than a career to me. It’s legacy.</p>
            <p>After losing my father, a lifelong cosmetologist, I started thinking seriously about purpose. At his funeral, people kept saying how much he loved what he did. That stuck with me. Through prayer, reflection, and a series of undeniable signs, I felt called into barbering. A way to honor what and who he was, in my own way.</p>
            <p>I’m originally from Knoxville, TN, and over the past six years I’ve traveled the country cutting hair, refining my craft, and learning from different front runners of the industry. Consistency, precision, professionalism, and genuine connection are the foundation of my work. My clients know they can rely on me — not just for a sharp, detailed haircut, but for punctuality, problem-solving, and real conversation.</p>
            <p>I’ve been in recovery for over seven years, and that discipline shapes how I approach life and business. Work ethic matters. Showing up matters. Being someone people can depend on matters.</p>
            <p>Whether you’re a young professional, in a client-facing role, or simply someone who cares about how you present yourself, my goal is to deliver consistent, high-level work and build long-term relationships. I love pouring into the communities I live and work in, and I believe a great barbershop should elevate more than just your haircut. It should elevate your experience, It should deepen connections, and it should add to the culture. When you sit in my chair you’ll see and feel the difference immediately.</p>
            <p class="font-bold text-primary italic mt-8">⁃ Chris Bolton <br>Master Barber</p>';
        }
        $img = $img ?: get_template_directory_uri() . '/assets/bio pic.jpeg';
        ?>
        <section class="py-32 overflow-hidden" id="about">
            <div class="max-w-7xl mx-auto px-6">
                <!-- Mobile Only Headings -->
                <div class="block lg:hidden mb-10">
                    <span class="text-primary font-bold uppercase tracking-[0.2em] mb-4 block text-sm"><?php echo esc_html($legacy_headline); ?></span>
                    <h2 class="text-5xl font-black leading-tight">Master Barber <br /> <span class="text-primary">Chris Bolton</span></h2>
                </div>
                <div class="flex flex-col lg:flex-row gap-20 items-stretch">
                    <div class="w-full lg:w-1/2 relative flex">
                        <!-- Subtle Glow -->
                        <div class="absolute -top-10 -left-10 w-40 h-40 bg-primary/20 rounded-full blur-3xl z-0"></div>
                        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[120%] h-[120%] bg-white/5 rounded-full blur-[100px] z-0 pointer-events-none"></div>
                        
                        <div class="w-full h-[60vh] lg:h-auto rounded-[2rem] overflow-hidden shadow-2xl relative z-10 border border-white/10 flex-1">
                            <img loading="lazy" decoding="async" src="<?php echo esc_url($img); ?>" alt="Master Barber" class="w-full h-full object-cover object-top">
                        </div>
                    </div>
                    <div class="w-full lg:w-1/2">
                        <div class="hidden lg:block">
                            <span class="text-primary font-bold uppercase tracking-[0.2em] mb-4 block text-sm"><?php echo esc_html($legacy_headline); ?></span>
                            <h2 class="text-5xl font-black mb-10 leading-tight">Master Barber <br /> <span class="text-primary">Chris Bolton</span></h2>
                        </div>
                        <div class="space-y-6 text-slate-300 text-[15px] leading-relaxed font-light mb-12">
                            <?php echo $legacy_content; ?>
                        </div>

                        <!-- Mobile Only CTAs -->
                        <div class="flex flex-col gap-4 mt-8 md:hidden">
                            <a href="#gallery" class="w-full bg-white text-black py-4 rounded-xl font-black uppercase tracking-widest text-center hover:bg-slate-200 transition-colors">
                                See my work
                            </a>
                            <a href="#contact" class="w-full bg-primary text-white py-4 rounded-xl font-black uppercase tracking-widest text-center hover:bg-primary/90 transition-colors">
                                My location/contact me
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Gallery Section -->

        <section class="py-24 overflow-hidden relative border-t border-white/5" id="gallery">
            <div class="max-w-7xl mx-auto px-6 mb-12 flex flex-col md:flex-row md:items-end justify-between gap-6">
                <div>
                    <span class="text-primary font-bold uppercase tracking-[0.2em] mb-3 block text-[11px]">Portfolio</span>
                    <h2 class="text-4xl md:text-5xl font-black uppercase tracking-tight">See My <span class="text-primary">Work</span></h2>
                </div>
                <!-- Scroll Indicator -->
                <div class="flex items-center gap-2 text-slate-500 pb-2 hidden md:flex">
                    <span class="text-[11px] font-bold uppercase tracking-widest">Scroll</span>
                    <span class="material-symbols-outlined text-sm">arrow_forward</span>
                </div>
            </div>
            
            <div class="relative group w-full">
                <!-- Navigation Arrows -->
                <button id="gl-left" aria-label="Scroll Left" class="absolute left-2 md:left-8 top-1/2 -translate-y-1/2 z-20 w-12 h-12 bg-[#111]/60 backdrop-blur-md rounded-full text-white flex items-center justify-center border border-white/20 hover:bg-primary transition-all shadow-xl hover:scale-105 pointer-events-auto">
                    <span class="material-symbols-outlined shrink-0 text-xl font-bold translate-x-[-1px]">chevron_left</span>
                </button>
                <button id="gl-right" aria-label="Scroll Right" class="absolute right-2 md:right-8 top-1/2 -translate-y-1/2 z-20 w-12 h-12 bg-[#111]/60 backdrop-blur-md rounded-full text-white flex items-center justify-center border border-white/20 hover:bg-primary transition-all shadow-xl hover:scale-105 pointer-events-auto">
                    <span class="material-symbols-outlined shrink-0 text-xl font-bold translate-x-[1px]">chevron_right</span>
                </button>

                <div id="gl-container" class="flex gap-4 md:gap-8 overflow-x-auto snap-x snap-mandatory px-6 pb-8 w-full" style="scrollbar-width: none; scroll-behavior: smooth;">
                    <style>
                        #gallery .overflow-x-auto::-webkit-scrollbar { display: none; }
                    </style>
                <?php for($i = 1; $i <= 11; $i++): ?>
                    <div class="snap-center shrink-0 w-[75vw] md:w-[350px] aspect-[4/5] rounded-3xl overflow-hidden relative group border border-white/10">
                        <img loading="lazy" decoding="async" src="<?php echo get_template_directory_uri(); ?>/assets/gallery/Gallery_<?php echo $i; ?>.jpg" alt="Gallery Image <?php echo $i; ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out">
                    </div>
                <?php endfor; ?>
                <!-- Padding element to ensure the last image scrolls nicely to center on mobile -->
                <div class="snap-center shrink-0 w-[6vw] md:w-[20vw]"></div>
                </div>
            </div>

            <!-- Gallery Scroll Script -->
            <script>
                document.addEventListener('DOMContentLoaded', () => {
                    const box = document.getElementById('gl-container');
                    const lBtn = document.getElementById('gl-left');
                    const rBtn = document.getElementById('gl-right');
                    
                    if (box && lBtn && rBtn) {
                        const getAmount = () => window.innerWidth > 768 ? 382 : (window.innerWidth * 0.75) + 16;
                        lBtn.addEventListener('click', () => box.scrollBy({ left: -getAmount(), behavior: 'smooth' }));
                        rBtn.addEventListener('click', () => box.scrollBy({ left: getAmount(), behavior: 'smooth' }));
                    }
                });
            </script>
        </section>

                    <!-- Testimonials Section -->
        <section class="py-16 bg-surface-dark/50 overflow-hidden" id="reviews">
            <div class="max-w-7xl mx-auto px-6 mb-10">
                <h2 class="text-3xl font-black uppercase tracking-tight text-white mb-2">Word on the Street</h2>
                <p class="text-slate-400 max-w-xl text-base">Don't just take our word for it. Here's what the community is saying.</p>
            </div>

            <div class="relative w-full flex overflow-hidden group">
                <div class="flex gap-6 w-max animate-scroll px-3">
                    <!-- Set 1 -->
                    <div class="w-[340px] md:w-[400px] shrink-0 bg-background-dark/50 p-6 rounded-2xl border border-white/5 transition-colors flex flex-col h-full">
                        <div class="flex items-center gap-1 mb-4">
                            <span class="material-symbols-outlined text-[18px] bg-clip-text text-transparent bg-gradient-to-r from-primary to-amber-500" style="font-variation-settings: 'FILL' 1;">star</span><span class="material-symbols-outlined text-[18px] bg-clip-text text-transparent bg-gradient-to-r from-primary to-amber-500" style="font-variation-settings: 'FILL' 1;">star</span><span class="material-symbols-outlined text-[18px] bg-clip-text text-transparent bg-gradient-to-r from-primary to-amber-500" style="font-variation-settings: 'FILL' 1;">star</span><span class="material-symbols-outlined text-[18px] bg-clip-text text-transparent bg-gradient-to-r from-primary to-amber-500" style="font-variation-settings: 'FILL' 1;">star</span><span class="material-symbols-outlined text-[18px] bg-clip-text text-transparent bg-gradient-to-r from-primary to-amber-500" style="font-variation-settings: 'FILL' 1;">star</span>
                        </div>
                        <p class="text-slate-300 text-sm leading-relaxed mb-6 flex-grow">"Bolton Barber is hands down the best barber in Denver! His fades are insanely clean, shaves are smooth, and the consistency is unmatched. Highly recommend👌"</p>
                        <div class="flex items-center gap-3 mt-auto">
                            <div class="w-10 h-10 rounded-full bg-primary/20 flex items-center justify-center text-primary font-bold text-sm">NO</div>
                            <div>
                                <h4 class="text-white font-bold text-sm">Nick O'Shea</h4>
                                <span class="text-slate-500 text-[10px] uppercase tracking-widest font-bold">Google Review</span>
                            </div>
                        </div>
                    </div>

                    <div class="w-[340px] md:w-[400px] shrink-0 bg-background-dark/50 p-6 rounded-2xl border border-white/5 transition-colors flex flex-col h-full">
                        <div class="flex items-center gap-1 mb-4">
                            <span class="material-symbols-outlined text-[18px] bg-clip-text text-transparent bg-gradient-to-r from-primary to-amber-500" style="font-variation-settings: 'FILL' 1;">star</span><span class="material-symbols-outlined text-[18px] bg-clip-text text-transparent bg-gradient-to-r from-primary to-amber-500" style="font-variation-settings: 'FILL' 1;">star</span><span class="material-symbols-outlined text-[18px] bg-clip-text text-transparent bg-gradient-to-r from-primary to-amber-500" style="font-variation-settings: 'FILL' 1;">star</span><span class="material-symbols-outlined text-[18px] bg-clip-text text-transparent bg-gradient-to-r from-primary to-amber-500" style="font-variation-settings: 'FILL' 1;">star</span><span class="material-symbols-outlined text-[18px] bg-clip-text text-transparent bg-gradient-to-r from-primary to-amber-500" style="font-variation-settings: 'FILL' 1;">star</span>
                        </div>
                        <p class="text-slate-300 text-sm leading-relaxed mb-6 flex-grow">"I've been going to Chris for a while now and he absolutely kills it every single time. My haircut is always on point, clean, consistent, and exactly how I want it."</p>
                        <div class="flex items-center gap-3 mt-auto">
                            <div class="w-10 h-10 rounded-full bg-primary/20 flex items-center justify-center text-primary font-bold text-sm">TB</div>
                            <div>
                                <h4 class="text-white font-bold text-sm">Theo Bennett</h4>
                                <span class="text-slate-500 text-[10px] uppercase tracking-widest font-bold">Google Review</span>
                            </div>
                        </div>
                    </div>

                    <div class="w-[340px] md:w-[400px] shrink-0 bg-background-dark/50 p-6 rounded-2xl border border-white/5 transition-colors flex flex-col h-full">
                        <div class="flex items-center gap-1 mb-4">
                            <span class="material-symbols-outlined text-[18px] bg-clip-text text-transparent bg-gradient-to-r from-primary to-amber-500" style="font-variation-settings: 'FILL' 1;">star</span><span class="material-symbols-outlined text-[18px] bg-clip-text text-transparent bg-gradient-to-r from-primary to-amber-500" style="font-variation-settings: 'FILL' 1;">star</span><span class="material-symbols-outlined text-[18px] bg-clip-text text-transparent bg-gradient-to-r from-primary to-amber-500" style="font-variation-settings: 'FILL' 1;">star</span><span class="material-symbols-outlined text-[18px] bg-clip-text text-transparent bg-gradient-to-r from-primary to-amber-500" style="font-variation-settings: 'FILL' 1;">star</span><span class="material-symbols-outlined text-[18px] bg-clip-text text-transparent bg-gradient-to-r from-primary to-amber-500" style="font-variation-settings: 'FILL' 1;">star</span>
                        </div>
                        <p class="text-slate-300 text-sm leading-relaxed mb-6 flex-grow">"I've been getting cuts with Chris for about 6 months now. He's super talented... Getting fades from other barbers has been hit or miss for me in the past, but Chris nails it every time!"</p>
                        <div class="flex items-center gap-3 mt-auto">
                            <div class="w-10 h-10 rounded-full bg-primary/20 flex items-center justify-center text-primary font-bold text-sm">SA</div>
                            <div>
                                <h4 class="text-white font-bold text-sm">Sage</h4>
                                <span class="text-slate-500 text-[10px] uppercase tracking-widest font-bold">Google Review</span>
                            </div>
                        </div>
                    </div>

                    <div class="w-[340px] md:w-[400px] shrink-0 bg-background-dark/50 p-6 rounded-2xl border border-white/5 transition-colors flex flex-col h-full">
                        <div class="flex items-center gap-1 mb-4">
                            <span class="material-symbols-outlined text-[18px] bg-clip-text text-transparent bg-gradient-to-r from-primary to-amber-500" style="font-variation-settings: 'FILL' 1;">star</span><span class="material-symbols-outlined text-[18px] bg-clip-text text-transparent bg-gradient-to-r from-primary to-amber-500" style="font-variation-settings: 'FILL' 1;">star</span><span class="material-symbols-outlined text-[18px] bg-clip-text text-transparent bg-gradient-to-r from-primary to-amber-500" style="font-variation-settings: 'FILL' 1;">star</span><span class="material-symbols-outlined text-[18px] bg-clip-text text-transparent bg-gradient-to-r from-primary to-amber-500" style="font-variation-settings: 'FILL' 1;">star</span><span class="material-symbols-outlined text-[18px] bg-clip-text text-transparent bg-gradient-to-r from-primary to-amber-500" style="font-variation-settings: 'FILL' 1;">star</span>
                        </div>
                        <p class="text-slate-300 text-sm leading-relaxed mb-6 flex-grow">"Bolton did an awesome job with my hair and beard and was able to shape it just right despite my difficult cowlicks. Best hair cut I’ve had in years - I’ll be back!"</p>
                        <div class="flex items-center gap-3 mt-auto">
                            <div class="w-10 h-10 rounded-full bg-primary/20 flex items-center justify-center text-primary font-bold text-sm">NG</div>
                            <div>
                                <h4 class="text-white font-bold text-sm">Nate Green</h4>
                                <span class="text-slate-500 text-[10px] uppercase tracking-widest font-bold">Google Review</span>
                            </div>
                        </div>
                    </div>

                    <!-- Set 2 (Duplicate for seamless scroll) -->
                    <div class="w-[340px] md:w-[400px] shrink-0 bg-background-dark/50 p-6 rounded-2xl border border-white/5 transition-colors flex flex-col h-full">
                        <div class="flex items-center gap-1 mb-4">
                            <span class="material-symbols-outlined text-[18px] bg-clip-text text-transparent bg-gradient-to-r from-primary to-amber-500" style="font-variation-settings: 'FILL' 1;">star</span><span class="material-symbols-outlined text-[18px] bg-clip-text text-transparent bg-gradient-to-r from-primary to-amber-500" style="font-variation-settings: 'FILL' 1;">star</span><span class="material-symbols-outlined text-[18px] bg-clip-text text-transparent bg-gradient-to-r from-primary to-amber-500" style="font-variation-settings: 'FILL' 1;">star</span><span class="material-symbols-outlined text-[18px] bg-clip-text text-transparent bg-gradient-to-r from-primary to-amber-500" style="font-variation-settings: 'FILL' 1;">star</span><span class="material-symbols-outlined text-[18px] bg-clip-text text-transparent bg-gradient-to-r from-primary to-amber-500" style="font-variation-settings: 'FILL' 1;">star</span>
                        </div>
                        <p class="text-slate-300 text-sm leading-relaxed mb-6 flex-grow">"Bolton Barber is hands down the best barber in Denver! His fades are insanely clean, shaves are smooth, and the consistency is unmatched. Highly recommend👌"</p>
                        <div class="flex items-center gap-3 mt-auto">
                            <div class="w-10 h-10 rounded-full bg-primary/20 flex items-center justify-center text-primary font-bold text-sm">NO</div>
                            <div>
                                <h4 class="text-white font-bold text-sm">Nick O'Shea</h4>
                                <span class="text-slate-500 text-[10px] uppercase tracking-widest font-bold">Google Review</span>
                            </div>
                        </div>
                    </div>

                    <div class="w-[340px] md:w-[400px] shrink-0 bg-background-dark/50 p-6 rounded-2xl border border-white/5 transition-colors flex flex-col h-full">
                        <div class="flex items-center gap-1 mb-4">
                            <span class="material-symbols-outlined text-[18px] bg-clip-text text-transparent bg-gradient-to-r from-primary to-amber-500" style="font-variation-settings: 'FILL' 1;">star</span><span class="material-symbols-outlined text-[18px] bg-clip-text text-transparent bg-gradient-to-r from-primary to-amber-500" style="font-variation-settings: 'FILL' 1;">star</span><span class="material-symbols-outlined text-[18px] bg-clip-text text-transparent bg-gradient-to-r from-primary to-amber-500" style="font-variation-settings: 'FILL' 1;">star</span><span class="material-symbols-outlined text-[18px] bg-clip-text text-transparent bg-gradient-to-r from-primary to-amber-500" style="font-variation-settings: 'FILL' 1;">star</span><span class="material-symbols-outlined text-[18px] bg-clip-text text-transparent bg-gradient-to-r from-primary to-amber-500" style="font-variation-settings: 'FILL' 1;">star</span>
                        </div>
                        <p class="text-slate-300 text-sm leading-relaxed mb-6 flex-grow">"I've been going to Chris for a while now and he absolutely kills it every single time. My haircut is always on point, clean, consistent, and exactly how I want it."</p>
                        <div class="flex items-center gap-3 mt-auto">
                            <div class="w-10 h-10 rounded-full bg-primary/20 flex items-center justify-center text-primary font-bold text-sm">TB</div>
                            <div>
                                <h4 class="text-white font-bold text-sm">Theo Bennett</h4>
                                <span class="text-slate-500 text-[10px] uppercase tracking-widest font-bold">Google Review</span>
                            </div>
                        </div>
                    </div>

                    <div class="w-[340px] md:w-[400px] shrink-0 bg-background-dark/50 p-6 rounded-2xl border border-white/5 transition-colors flex flex-col h-full">
                        <div class="flex items-center gap-1 mb-4">
                            <span class="material-symbols-outlined text-[18px] bg-clip-text text-transparent bg-gradient-to-r from-primary to-amber-500" style="font-variation-settings: 'FILL' 1;">star</span><span class="material-symbols-outlined text-[18px] bg-clip-text text-transparent bg-gradient-to-r from-primary to-amber-500" style="font-variation-settings: 'FILL' 1;">star</span><span class="material-symbols-outlined text-[18px] bg-clip-text text-transparent bg-gradient-to-r from-primary to-amber-500" style="font-variation-settings: 'FILL' 1;">star</span><span class="material-symbols-outlined text-[18px] bg-clip-text text-transparent bg-gradient-to-r from-primary to-amber-500" style="font-variation-settings: 'FILL' 1;">star</span><span class="material-symbols-outlined text-[18px] bg-clip-text text-transparent bg-gradient-to-r from-primary to-amber-500" style="font-variation-settings: 'FILL' 1;">star</span>
                        </div>
                        <p class="text-slate-300 text-sm leading-relaxed mb-6 flex-grow">"I've been getting cuts with Chris for about 6 months now. He's super talented... Getting fades from other barbers has been hit or miss for me in the past, but Chris nails it every time!"</p>
                        <div class="flex items-center gap-3 mt-auto">
                            <div class="w-10 h-10 rounded-full bg-primary/20 flex items-center justify-center text-primary font-bold text-sm">SA</div>
                            <div>
                                <h4 class="text-white font-bold text-sm">Sage</h4>
                                <span class="text-slate-500 text-[10px] uppercase tracking-widest font-bold">Google Review</span>
                            </div>
                        </div>
                    </div>

                    <div class="w-[340px] md:w-[400px] shrink-0 bg-background-dark/50 p-6 rounded-2xl border border-white/5 transition-colors flex flex-col h-full">
                        <div class="flex items-center gap-1 mb-4">
                            <span class="material-symbols-outlined text-[18px] bg-clip-text text-transparent bg-gradient-to-r from-primary to-amber-500" style="font-variation-settings: 'FILL' 1;">star</span><span class="material-symbols-outlined text-[18px] bg-clip-text text-transparent bg-gradient-to-r from-primary to-amber-500" style="font-variation-settings: 'FILL' 1;">star</span><span class="material-symbols-outlined text-[18px] bg-clip-text text-transparent bg-gradient-to-r from-primary to-amber-500" style="font-variation-settings: 'FILL' 1;">star</span><span class="material-symbols-outlined text-[18px] bg-clip-text text-transparent bg-gradient-to-r from-primary to-amber-500" style="font-variation-settings: 'FILL' 1;">star</span><span class="material-symbols-outlined text-[18px] bg-clip-text text-transparent bg-gradient-to-r from-primary to-amber-500" style="font-variation-settings: 'FILL' 1;">star</span>
                        </div>
                        <p class="text-slate-300 text-sm leading-relaxed mb-6 flex-grow">"Bolton did an awesome job with my hair and beard and was able to shape it just right despite my difficult cowlicks. Best hair cut I’ve had in years - I’ll be back!"</p>
                        <div class="flex items-center gap-3 mt-auto">
                            <div class="w-10 h-10 rounded-full bg-primary/20 flex items-center justify-center text-primary font-bold text-sm">NG</div>
                            <div>
                                <h4 class="text-white font-bold text-sm">Nate Green</h4>
                                <span class="text-slate-500 text-[10px] uppercase tracking-widest font-bold">Google Review</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <style>
                @keyframes scroll {
                    0% { transform: translateX(0); }
                    100% { transform: translateX(calc(-50% - 0.75rem)); }
                }
                .animate-scroll {
                    animation: scroll 35s linear infinite;
                }
                .group:hover .animate-scroll {
                    animation-play-state: paused;
                }
            </style>
        </section>


            <!-- Contact Section -->
            <?php 
            $front_page_id = get_option('page_on_front');
            $phone = get_field('studio_phone', $front_page_id) ?: '303-901-1163';
            $address = get_field('studio_address', $front_page_id) ?: "10160 W 50th Ave Unit 3 Suite 104\nWheat Ridge, CO 80033";
            $email = get_field('studio_email', $front_page_id) ?: 'Boltonbarbering@gmail.com';
            $sms_text = get_field('sms_optin_text', $front_page_id);
            ?>
            <section class="py-24 bg-[#111111]" id="contact">
                <div class="max-w-7xl mx-auto px-6">
                    <div class="grid lg:grid-cols-2 gap-16">
                        <div>
                            <h2 class="text-4xl font-black uppercase tracking-tight mb-6 text-white">Get In The Chair</h2>
                            <p class="text-slate-400 mb-12 text-[15px] max-w-md">Ready for a transformation? Visit our studio in Wheat Ridge or reach out for inquiries.</p>
                            <div class="space-y-8 mb-12">
                                <a href="<?php echo esc_url('https://maps.google.com/?q=Bolton+Barber+Studio+Denver'); ?>" target="_blank" class="flex items-start gap-4 group">
                                    <div class="w-12 h-12 bg-[#1a1a1a] rounded-xl flex items-center justify-center shrink-0 group-hover:bg-primary/20 transition-colors">
                                        <span class="material-symbols-outlined text-primary text-xl">location_on</span>
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-white text-[15px] mb-1 group-hover:text-primary transition-colors">Our Location</h4>
                                        <p class="text-slate-400 text-sm"><?php echo nl2br(esc_html($address)); ?></p>
                                    </div>
                                </a>
                                <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $phone)); ?>" class="flex items-start gap-4 group">
                                    <div class="w-12 h-12 bg-[#1a1a1a] rounded-xl flex items-center justify-center shrink-0 group-hover:bg-primary/20 transition-colors">
                                        <span class="material-symbols-outlined text-primary text-xl">call</span>
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-white text-[15px] mb-1 group-hover:text-primary transition-colors">Phone</h4>
                                        <p class="text-slate-400 text-sm"><?php echo esc_html($phone); ?></p>
                                    </div>
                                </a>
                                <a href="mailto:<?php echo esc_attr($email); ?>" class="flex items-start gap-4 group">
                                    <div class="w-12 h-12 bg-[#1a1a1a] rounded-xl flex items-center justify-center shrink-0 group-hover:bg-primary/20 transition-colors">
                                        <span class="material-symbols-outlined text-primary text-xl">mail</span>
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-white text-[15px] mb-1 group-hover:text-primary transition-colors">Email</h4>
                                        <p class="text-slate-400 text-sm"><?php echo esc_html($email); ?></p>
                                    </div>
                                </a>
                            </div>
                            
                            <!-- Map Img -->
                            <div class="w-full h-48 rounded-3xl overflow-hidden bg-[#1a1a1a] relative group hover:opacity-100 transition-opacity">
                                <a href="<?php echo esc_url('https://maps.google.com/?q=Bolton+Barber+Studio+Denver'); ?>" target="_blank" class="absolute inset-0 z-10 w-full h-full cursor-pointer"></a>
                                <iframe src="https://maps.google.com/maps?q=Bolton%20Barber%20Studio%20Denver&t=&z=15&ie=UTF8&iwloc=&output=embed" width="100%" height="100%" style="border:0; filter: grayscale(100%) invert(85%) contrast(100%); opacity: 0.95;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                        
                        <div>
                            <div class="bg-[#151515] p-10 rounded-[2rem] border border-white/5 shadow-2xl">
                            <div class="mb-8">
                                <h3 class="text-white font-black text-2xl uppercase tracking-tight mb-2">Sign Up For Special Offers</h3>
                                <p class="text-slate-400 text-sm">Join our list to receive exclusive updates and VIP booking access.</p>
                            </div>
                                <form action="" class="google-sheet-form space-y-6" method="POST">
                                    <div class="space-y-2">
                                        <label class="text-[11px] font-black uppercase tracking-widest text-slate-400 block">Full Name</label>
                                        <input name="name" required class="w-full bg-[#1e1e1e] border-transparent rounded-xl px-5 py-3.5 text-white focus:border-primary focus:ring-1 focus:ring-primary transition-all text-sm outline-none placeholder:text-slate-600" placeholder="Enter your name" type="text" />
                                    </div>
                                    <div class="flex flex-col md:flex-row gap-6">
                                        <div class="space-y-2 flex-1">
                                            <label class="text-[11px] font-black uppercase tracking-widest text-slate-400 block">Phone</label>
                                            <input name="phone" required class="w-full bg-[#1e1e1e] border-transparent rounded-xl px-5 py-3.5 text-white focus:border-primary focus:ring-1 focus:ring-primary transition-all text-sm outline-none placeholder:text-slate-600" placeholder="(555) 000-0000" type="tel" />
                                        </div>
                                        <div class="space-y-2 flex-1">
                                            <label class="text-[11px] font-black uppercase tracking-widest text-slate-400 block">Email</label>
                                            <input name="email" required class="w-full bg-[#1e1e1e] border-transparent rounded-xl px-5 py-3.5 text-white focus:border-primary focus:ring-1 focus:ring-primary transition-all text-sm outline-none placeholder:text-slate-600" placeholder="john@example.com" type="email" />
                                        </div>
                                </div>
                                <div class="flex items-start gap-4 pt-2">
                                    <input class="mt-1 w-4 h-4 rounded border-slate-700 bg-[#1e1e1e] text-primary focus:ring-primary checked:bg-primary accent-primary cursor-pointer shrink-0" type="checkbox" id="sms-optin" />
                                    <label class="text-[11px] text-slate-500 leading-snug cursor-pointer" for="sms-optin">
                                        By checking this box, you consent to receive marketing and promotional text messages from Bolton Barber Studio at the number provided. Consent is not a condition of purchase. Message and data rates may apply. Message frequency varies. Reply STOP to cancel or HELP for help. View our <a href="<?php echo esc_url(home_url('/privacy-policy')); ?>" class="underline hover:text-white">Privacy Policy</a> and <a href="<?php echo esc_url(home_url('/terms-of-service')); ?>" class="underline hover:text-white">Terms of Service</a>.
                                    </label>
                                </div>
                                <button class="w-full bg-primary text-white py-4 rounded-xl font-black uppercase tracking-widest hover:bg-primary/90 transition-colors mt-4" type="submit">
                                    Join the movement
                                </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php else : ?>
            <section class="py-24 max-w-7xl mx-auto px-6">
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    <h2 class="text-5xl font-black mb-8"><?php the_title(); ?></h2>
                    <div class="prose prose-invert max-w-none">
                        <?php the_content(); ?>
                    </div>
                <?php endwhile; endif; ?>
            </section>
        <?php endif; ?>
    </main>

    <!-- Footer -->
    <!-- Footer -->
    <footer class="bg-[#111111] py-16 border-t border-white/5">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid md:grid-cols-3 gap-12 items-start mb-16">
                <div class="space-y-6">
                    <div class="flex items-center gap-2">
                        <span class="material-symbols-outlined text-primary text-2xl">content_cut</span>
                        <h2 class="text-lg font-black uppercase tracking-tighter text-white">Bolton <span class="text-primary">Barber</span> Studio</h2>
                    </div>
                    <p class="text-slate-500 text-xs leading-relaxed max-w-xs">Elevating the standards of modern barbering through discipline, art, and precision.</p>
                </div>
                
                <div class="space-y-6">
                    <h4 class="text-white font-black uppercase tracking-widest text-[11px]">Connect</h4>
                    <div class="flex gap-3">
                        <a href="<?php echo get_field('instagram_url', get_option('page_on_front')) ?: 'https://instagram.com/boltactioncuts'; ?>" target="_blank" class="w-10 h-10 rounded-full bg-[#1a1a1a] flex items-center justify-center hover:bg-primary transition-colors text-slate-400 hover:text-white border border-white/5">
                            <span class="sr-only">Instagram</span>
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.476 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" /></svg>
                        </a>
                        <a href="<?php echo get_field('tiktok_url', get_option('page_on_front')) ?: 'https://tiktok.com/@boltactioncuts'; ?>" target="_blank" class="w-10 h-10 rounded-full bg-[#1a1a1a] flex items-center justify-center hover:bg-primary transition-colors text-slate-400 hover:text-white border border-white/5">
                            <span class="sr-only">TikTok</span>
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-5.2 1.74 2.89 2.89 0 0 1 2.31-4.64 2.93 2.93 0 0 1 .88.13V9.4a6.84 6.84 0 0 0-1-.05A6.33 6.33 0 0 0 5 20.1a6.34 6.34 0 0 0 10.86-4.43v-7a8.16 8.16 0 0 0 4.77 1.52v-3.4a4.85 4.85 0 0 1-1-.1z"/></svg>
                        </a>
                        <a href="<?php echo get_field('facebook_url', get_option('page_on_front')) ?: 'https://facebook.com/Boltonbarberstudio'; ?>" target="_blank" class="w-10 h-10 rounded-full bg-[#1a1a1a] flex items-center justify-center hover:bg-primary transition-colors text-slate-400 hover:text-white border border-white/5">
                            <span class="sr-only">Facebook</span>
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" /></svg>
                        </a>
                    </div>
                </div>

                <div class="space-y-6">
                    <h4 class="text-white font-black uppercase tracking-widest text-[11px]">Sign up for texts</h4>
                        <form action="" class="google-sheet-form space-y-4 text-left" method="POST">
                            <div class="flex gap-3">
                                <input name="phone" required class="bg-[#1a1a1a] border border-white/5 rounded-xl px-5 py-3 text-sm flex-1 text-white focus:border-primary focus:ring-1 focus:ring-primary outline-none placeholder:text-slate-600" placeholder="Phone Number" type="tel" />
                            <button class="bg-primary text-white px-6 py-3 rounded-xl font-bold uppercase tracking-wider hover:bg-primary/90 transition-colors text-sm" type="submit">
                                Join
                            </button>
                        </div>
                        <div class="flex items-start gap-4">
                            <input class="mt-1 w-4 h-4 rounded border-slate-700 bg-[#1e1e1e] text-primary focus:ring-primary checked:bg-primary accent-primary cursor-pointer shrink-0" type="checkbox" id="footer-sms-optin" />
                            <label class="text-[11px] text-slate-500 leading-snug cursor-pointer" for="footer-sms-optin">
                                By checking this box, you consent to receive marketing and promotional text messages from Bolton Barber Studio. Consent is not a condition of purchase. Msg & data rates may apply. Msg frequency varies. Reply STOP to cancel. View our <a href="<?php echo esc_url(home_url('/privacy-policy')); ?>" class="underline hover:text-white">Privacy Policy</a> & <a href="<?php echo esc_url(home_url('/terms-of-service')); ?>" class="underline hover:text-white">Terms of Service</a>.
                            </label>
                        </div>
                    </form>
                </div>
            </div>
            
            <div class="pt-8 border-t border-white/5 flex flex-col md:flex-row justify-between items-center gap-6">
                <p class="text-slate-500 text-[10px] uppercase tracking-widest font-bold">© <?php echo date('Y'); ?> Bolton Barber Studio. All Rights Reserved.</p>
                <div class="flex gap-8 text-[10px] uppercase tracking-widest font-bold text-slate-500">
                    <a href="<?php echo esc_url(home_url('/privacy-policy')); ?>" class="hover:text-primary transition-colors">Privacy Policy</a>
                    <a href="<?php echo esc_url(home_url('/terms-of-service')); ?>" class="hover:text-primary transition-colors">Terms of Service</a>
                </div>
            </div>
        </div>

    </footer>

    <?php wp_footer(); ?>
    <!-- Mobile Menu Overlay -->
    <div id="mobile-menu" class="fixed inset-0 bg-background-dark/98 backdrop-blur-2xl z-[100] transform -translate-x-full transition-transform duration-300 flex flex-col items-center justify-center hidden border-r border-white/10 w-full md:w-80">
        <button id="close-menu-btn" class="absolute top-6 right-6 text-white hover:text-primary active:text-primary transition-colors p-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-10 h-10">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
        <div class="mb-12">
            <img loading="lazy" decoding="async" src="<?php echo get_template_directory_uri(); ?>/assets/bolton-logo.jpg" alt="Bolton Barber Studio" class="h-20 w-auto mx-auto rounded-lg shadow-xl shadow-black">
        </div>
        <nav class="flex flex-col items-center gap-8 w-full px-6">
            <a class="text-3xl font-black uppercase tracking-widest active:text-primary hover:text-primary transition-colors mobile-link w-full text-center py-2 border-b border-white/5" href="#services">Services</a>
            <a class="text-3xl font-black uppercase tracking-widest active:text-primary hover:text-primary transition-colors mobile-link w-full text-center py-2 border-b border-white/5" href="#gallery">Gallery</a>
            <a class="text-3xl font-black uppercase tracking-widest active:text-primary hover:text-primary transition-colors mobile-link w-full text-center py-2 border-b border-white/5" href="#about">About</a>
            <a class="text-3xl font-black uppercase tracking-widest active:text-primary hover:text-primary transition-colors mobile-link w-full text-center py-2 border-b border-white/5" href="#contact">Contact</a>
        </nav>
        <a href="https://christopherbolton841377.wlbookings.com/booking?t=s&uuid=41ead2d9-c40d-41a1-b600-bce2d6e679b2" target="_blank" class="bg-primary hover:bg-primary/90 active:bg-primary/80 text-white px-8 py-4 rounded-xl text-lg font-bold uppercase tracking-wider transition-all mt-12 w-3/4 mobile-link text-center block">
            Book Now
        </a>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const mobileMenuBtn = document.getElementById('mobile-menu-btn');
            const closeMenuBtn = document.getElementById('close-menu-btn');
            const mobileMenu = document.getElementById('mobile-menu');
            const mobileLinks = document.querySelectorAll('.mobile-link');

            function toggleMenu() {
                if (mobileMenu.classList.contains('hidden')) {
                    mobileMenu.classList.remove('hidden');
                    setTimeout(() => mobileMenu.classList.remove('-translate-x-full'), 10);
                    document.body.style.overflow = 'hidden';
                } else {
                    mobileMenu.classList.add('-translate-x-full');
                    document.body.style.overflow = '';
                    setTimeout(() => mobileMenu.classList.add('hidden'), 300);
                }
            }

            if (mobileMenuBtn && closeMenuBtn && mobileMenu) {
                mobileMenuBtn.addEventListener('click', toggleMenu);
                closeMenuBtn.addEventListener('click', toggleMenu);
                mobileLinks.forEach(link => {
                    link.addEventListener('click', toggleMenu);
                });
            }
        });
    </script>
    <script src="<?php echo get_template_directory_uri(); ?>/submit.js"></script>
</body>
</html>
