import re

new_html = """        <!-- Testimonials Section -->
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
        </section>\n"""

for filename in ['index.html', 'index.php']:
    # Read the file
    with open(filename, 'r') as f:
        content = f.read()
    
    # 1. Strip out the old reviews section entirely
    # It might have padding spaces so we'll construct a safe regex
    pattern = re.compile(r'\s*<!-- Testimonials Section -->\s*<section class="py-24 bg-surface-dark/50" id="reviews">.*?</section>\n', re.DOTALL)
    content = re.sub(pattern, '\n', content)
    
    # Also strip accidental duplicate <!-- Gallery Section --> from formatting mistakes
    content = content.replace('        <!-- Gallery Section -->\n        <!-- Gallery Section -->', '        <!-- Gallery Section -->')
    
    # 2. Insert the new reviews section RIGHT BEFORE the <!-- Contact Section -->
    # Find the <!-- Contact Section --> comment
    contact_pattern = re.compile(r'(\s*)(<!-- Contact Section -->)')
    
    def repl_func(match):
        indent = match.group(1)
        # return new component, indent is prepended by our string manually
        return indent + new_html + indent + match.group(2)
        
    content = re.sub(contact_pattern, repl_func, content, count=1)
    
    # 3. Write back
    with open(filename, 'w') as f:
        f.write(content)

print("Updated Testimonials in index.html and index.php successfully.")
