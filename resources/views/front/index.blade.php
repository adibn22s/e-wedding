<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="{{ asset('css/output.css') }}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <!-- CSS -->
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
</head>
<body class="text-black font-poppins pt-10 pb-[50px]">
    <div id="hero-section" class="max-w-[1200px] mx-auto w-full flex flex-col gap-10 pb-[50px] bg-[url('assets/background/Hero-Banner.png')] bg-center bg-no-repeat bg-cover rounded-[32px] overflow-hidden">
        <nav class="flex justify-between items-center pt-6 px-[50px]">
            <a href="">
                <img src="assets/logo/logo.svg" alt="logo">
            </a>
            <ul class="flex items-center gap-[30px] text-white">
                <li>
                    <a href="{{ route('front.index') }}" class="font-semibold">Home</a>
                </li>
            </ul>
            @auth
                <div class="flex gap-[10px] items-center">
                    <div class="flex flex-col items-end justify-center">
                        <p class="font-semibold text-white">Hi, {{ Auth::user()->name }}</p>
                    </div>
                    <div class="w-[56px] h-[56px] overflow-hidden rounded-full flex shrink-0">
                        <a href="{{ route('dashboard') }}">
                            <img src="{{ Storage::url(Auth::user()->avatar)}}" class="w-full h-full object-cover" alt="photo">
                        </a>
                    </div>
                </div>
            @endauth
            @guest
            <div class="flex gap-[10px] items-center">
                <a href="{{ route('register') }}" class="text-white font-semibold rounded-[30px] p-[16px_32px] ring-1 ring-white transition-all duration-300 hover:ring-2 hover:ring-[#FF6129]">Sign Up</a>
                <a href="{{ route('login') }}" class="text-white font-semibold rounded-[30px] p-[16px_32px] bg-[#FF6129] transition-all duration-300 hover:shadow-[0_10px_20px_0_#FF612980]">Sign In</a>
            </div>
            @endguest
        </nav>
        <div class="flex flex-col items-center gap-[30px]">
            <div class="w-fit flex items-center gap-3 p-2 pr-6 rounded-full bg-[#FFFFFF1F] border border-[#3477FF24]">
                <div class="w-[100px] h-[48px] flex shrink-0">
                    <img src="assets/icon/avatar-group.png" class="object-contain" alt="icon">
                </div>
                <p class="font-semibold text-sm text-white">Join 3 million users</p>
            </div>
            <div class="flex flex-col gap-[10px]">
                <h1 class="font-semibold text-[80px] leading-[82px] text-center gradient-text-hero">Make Wedding Dream Come True.</h1>
                <p class="text-center text-xl leading-[36px] text-[#F5F8FA]">Alqowy provides exceptional wedding planning services to ensure your special day is unforgettable. Build lasting memories with our expert coordination and exquisite attention to detail.
                </p>
            </div>
            <div class="flex gap-6 w-fit">
                <a href="" class="text-white font-semibold rounded-[30px] p-[16px_32px] bg-[#FF6129] transition-all duration-300 hover:shadow-[0_10px_20px_0_#FF612980]">Explore Catalogue</a>
                <a href="" class="text-white font-semibold rounded-[30px] p-[16px_32px] ring-1 ring-white transition-all duration-300 hover:ring-2 hover:ring-[#FF6129]">Wedding Planning Guidance</a>
            </div>
        </div>
        <div class="flex gap-[70px] items-center justify-center">
            <div>
                <img src="assets/icon/logo-55.svg" alt="icon">
            </div>
            <div>
                <img src="assets/icon/logo.svg" alt="icon">
            </div>
            <div>
                <img src="assets/icon/logo-54.svg" alt="icon">
            </div>
            <div>
                <img src="assets/icon/logo.svg" alt="icon">
            </div>
            <div>
                <img src="assets/icon/logo-52.svg" alt="icon">
            </div>
        </div>
    </div>
    <section id="Top-Categories" class="max-w-[1200px] mx-auto flex flex-col p-[70px_50px] gap-[30px]">
        <div class="flex flex-col gap-[30px]">
            <div class="gradient-badge w-fit p-[8px_16px] rounded-full border border-[#FED6AD] flex items-center gap-[6px]">
                <div>
                    <img src="assets/icon/medal-star.svg" alt="icon">
                </div>
                <p class="font-medium text-sm text-[#FF6129]">Top Categories</p>
            </div>
            <div class="flex flex-col">
                <h2 class="font-bold text-[40px] leading-[60px]">Browse Catalogues</h2>
                <p class="text-[#6D7786] text-lg -tracking-[2%]">Creating Memorable Weddings with Exceptional Planning and Services
                </p>
            </div>
        </div>
        <div class="grid grid-cols-4 gap-[30px]">
            @forelse($categories as $c)
            <a href="{{ route('front.category', $c->slug) }}" class="card flex items-center p-4 gap-3 ring-1 ring-[#DADEE4] rounded-2xl hover:ring-2 hover:ring-[#FF6129] transition-all duration-300">
                <div class="w-[70px] h-[70px] flex shrink-0">
                    <img src="{{ Storage::url($c->icon) }}" class="object-contain" alt="icon">
                </div>
                <p class="font-bold text-lg">{{ $c->name }}</p>
            </a>
            @empty
            <p>
                Kategori belum tersedia
            </p>
            @endforelse()
        </div>
    </section>
    <section id="Popular-Courses" class="max-w-[1200px] mx-auto flex flex-col p-[70px_82px_0px] gap-[30px] bg-[#F5F8FA] rounded-[32px]">
        <div class="flex flex-col gap-[30px] items-center text-center">
            <div class="gradient-badge w-fit p-[8px_16px] rounded-full border border-[#FED6AD] flex items-center gap-[6px]">
                <div>
                    <img src="assets/icon/medal-star.svg" alt="icon">
                </div>
                <p class="font-medium text-sm text-[#FF6129]">Popular Package</p>
            </div>
            <div class="flex flex-col">
                <h2 class="font-bold text-[40px] leading-[60px]">Don’t Missed It, Book Now</h2>
                <p class="text-[#6D7786] text-lg -tracking-[2%]">Create unforgettable memories with our personalized wedding services</p>
            </div>
        </div>
        <div class="relative">
            <button class="btn-prev absolute rotate-180 -left-[52px] top-[216px]">
                <img src="assets/icon/arrow-right.svg" alt="icon">
            </button>
            <button class="btn-prev absolute -right-[52px] top-[216px]">
                <img src="assets/icon/arrow-right.svg" alt="icon">
            </button>
            <div id="course-slider" class="w-full">
                @forelse($catalogues as $catalogue)
                <div class="course-card w-1/3 px-3 pb-[70px] mt-[2px]">
                    <div class="flex flex-col rounded-t-[12px] rounded-b-[24px] gap-[32px] bg-white w-full pb-[10px] overflow-hidden transition-all duration-300 hover:ring-2 hover:ring-[#FF6129]">
                        <a href="{{ route('front.details', $catalogue->slug) }}" class="thumbnail w-full h-[200px] shrink-0 rounded-[10px] overflow-hidden">
                            <img src="{{ Storage::url($catalogue->thumbnail) }}" class="w-full h-full object-cover" alt="thumbnail">
                        </a>
                        <div class="flex flex-col px-4 gap-[10px]">
                            <a href="{{ route('front.details', $catalogue->slug) }}" class="font-semibold text-lg line-clamp-2 hover:line-clamp-none min-h-[56px]">{{ $catalogue->name }}</a>
                            <div class="flex justify-between items-center">
                                <div class="flex items-center gap-[2px]">
                                    <div>
                                        <img src="assets/icon/star.svg" alt="star">
                                    </div>
                                    <div>
                                        <img src="assets/icon/star.svg" alt="star">
                                    </div>
                                    <div>
                                        <img src="assets/icon/star.svg" alt="star">
                                    </div>
                                    <div>
                                        <img src="assets/icon/star.svg" alt="star">
                                    </div>
                                    <div>
                                        <img src="assets/icon/star.svg" alt="star">
                                    </div>
                                </div>
                                <p class="text-right text-[#6D7786]">{{ $catalogue->books->count() }} kali digunakan</p>
                            </div>
                            <div class="flex items-center gap-2">
                                <div class="w-8 h-8 flex shrink-0 rounded-full overflow-hidden">
                                    <img src="{{ Storage::url($catalogue->vendor->user->avatar) }}" class="w-full h-full object-cover" alt="icon">
                                </div>
                                <div class="flex flex-col">
                                    <p class="font-semibold">{{ $catalogue->vendor->user->name }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @empty 
                <p>
                    Belum ada data kelas terbaru
                </p>
                @endforelse
            </div>
        </div>
    </section>
    <section id="Pricing" class="max-w-[1200px] mx-auto flex justify-between items-center p-[70px_100px]">
        <div class="relative">
            <div class="w-[355px] h-[488px]">
                <img src="assets/background/benefit_illustration.png" alt="icon">
            </div>
            <div class="absolute w-[230px] transform -translate-y-1/2 top-1/2 left-[214px] bg-white z-10 rounded-[20px] gap-4 p-4 flex flex-col shadow-[0_17px_30px_0_#0D051D0A]">
                <p class="font-semibold">Materials</p>
                <div class="flex gap-2 items-center">
                    <div>
                        <img src="assets/icon/video-play.svg" alt="icon">
                    </div>
                    <p class="font-medium">Documentations</p>
                </div>
                <div class="flex gap-2 items-center">
                    <div>
                        <img src="assets/icon/note-favorite.svg" alt="icon">
                    </div>
                    <p class="font-medium">Book Date</p>
                </div>
                <div class="flex gap-2 items-center">
                    <div>
                        <img src="assets/icon/3dcube.svg" alt="icon">
                    </div>
                    <p class="font-medium">Catering</p>
                </div>
                <div class="flex gap-2 items-center">
                    <div>
                        <img src="assets/icon/award.svg" alt="icon">
                    </div>
                    <p class="font-medium">Experience</p>
                </div>
                <div class="flex gap-2 items-center">
                    <div>
                        <img src="assets/icon/book.svg" alt="icon">
                    </div>
                    <p class="font-medium">Entertainment</p>
                </div>
            </div>
        </div>
        <div class="flex flex-col text-left gap-[30px]">
            <h2 class="font-bold text-[36px] leading-[52px]">Plan Your Perfect Wedding,<br>Anywhere You Want</h2>
            <p class="text-[#475466] text-lg leading-[34px]">Creating unforgettable memories with our personalized <br> wedding planning services, tailored to make your day special.</p>
            <a href="" class="text-white font-semibold rounded-[30px] p-[16px_32px] bg-[#FF6129] transition-all duration-300 hover:shadow-[0_10px_20px_0_#FF612980] w-fit">Check Pricing</a>
        </div>
    </section>
    <section id="Zero-to-Success" class="max-w-[1200px] mx-auto flex flex-col py-[70px] px-[50px] gap-[30px] bg-[#F5F8FA] rounded-[32px]">
        <div class="flex flex-col gap-[30px] items-center text-center">
            <div class="gradient-badge w-fit p-[8px_16px] rounded-full border border-[#FED6AD] flex items-center gap-[6px]">
                <div>
                    <img src="assets/icon/medal-star.svg" alt="icon">
                </div>
                <p class="font-medium text-sm text-[#FF6129]">Turning Dreams into Reality</p>
            </div>
            <div class="flex flex-col">
                <h2 class="font-bold text-[40px] leading-[60px]">Happy & Success Couples</h2>
                <p class="text-[#6D7786] text-lg -tracking-[2%]">Making Your Dream Wedding a Reality, Effortlessly</p>
            </div>
        </div>
        <div class="testi w-full overflow-hidden flex flex-col gap-6 relative">
            <div class="fade-overlay absolute z-10 h-full w-[50px] bg-gradient-to-r from-[#F5F8FA] to-[#F5F8FA00]"></div>
            <div class="fade-overlay absolute right-0 z-10 h-full w-[50px] bg-gradient-to-r from-[#F5F8FA00] to-[#F5F8FA]"></div>
            <div class="group/slider flex flex-nowrap w-max items-center">
                <div class="testi-container animate-[slideToL_50s_linear_infinite] group-hover/slider:pause-animate flex gap-6 pl-6 items-center flex-nowrap">
                    <div class="test-card w-[300px] flex flex-col h-full bg-white rounded-xl gap-3 p-5">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 flex shrink-0 rounded-full overflow-hidden">
                                <img src="assets/photo/photo4.png" class="w-full h-full object-cover" alt="photo">
                            </div>
                            <p class="font-semibold">Shayna</p>
                        </div>
                        <p class="text-sm text-[#475466]">e-Wedding has made our wedding day perfect from start to finish. Thank you for making our dream wedding come true!
                        </p>
                        <div class="flex gap-[2px]">
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                        </div>
                    </div>
                    <div class="test-card w-[300px] flex flex-col h-full bg-white rounded-xl gap-3 p-5">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 flex shrink-0 rounded-full overflow-hidden">
                                <img src="assets/photo/photo4.png" class="w-full h-full object-cover" alt="photo">
                            </div>
                            <p class="font-semibold">Shayna</p>
                        </div>
                        <p class="text-sm text-[#475466]">e-Wedding has made our wedding day perfect from start to finish. Thank you for making our dream wedding come true!</p>
                        <div class="flex gap-[2px]">
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                        </div>
                    </div>
                    <div class="test-card w-[300px] flex flex-col h-full bg-white rounded-xl gap-3 p-5">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 flex shrink-0 rounded-full overflow-hidden">
                                <img src="assets/photo/photo4.png" class="w-full h-full object-cover" alt="photo">
                            </div>
                            <p class="font-semibold">Shayna</p>
                        </div>
                        <p class="text-sm text-[#475466]">e-Wedding has made our wedding day perfect from start to finish. Thank you for making our dream wedding come true!</p>
                        <div class="flex gap-[2px]">
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                        </div>
                    </div>
                    <div class="test-card w-[300px] flex flex-col h-full bg-white rounded-xl gap-3 p-5">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 flex shrink-0 rounded-full overflow-hidden">
                                <img src="assets/photo/photo4.png" class="w-full h-full object-cover" alt="photo">
                            </div>
                            <p class="font-semibold">Shayna</p>
                        </div>
                        <p class="text-sm text-[#475466]">e-Wedding has made our wedding day perfect from start to finish. Thank you for making our dream wedding come true!</p>
                        <div class="flex gap-[2px]">
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="logo-container animate-[slideToL_50s_linear_infinite] group-hover/slider:pause-animate flex gap-6 pl-6 items-center flex-nowrap ">
                    <div class="test-card w-[300px] flex flex-col h-full bg-white rounded-xl gap-3 p-5">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 flex shrink-0 rounded-full overflow-hidden">
                                <img src="assets/photo/photo4.png" class="w-full h-full object-cover" alt="photo">
                            </div>
                            <p class="font-semibold">Shayna</p>
                        </div>
                        <p class="text-sm text-[#475466]">e-Wedding has made our wedding day perfect from start to finish. Thank you for making our dream wedding come true!</p>
                        <div class="flex gap-[2px]">
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                        </div>
                    </div>
                    <div class="test-card w-[300px] flex flex-col h-full bg-white rounded-xl gap-3 p-5">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 flex shrink-0 rounded-full overflow-hidden">
                            <img src="assets/photo/photo4.png" class="w-full h-full object-cover" alt="photo">
                        </div>
                        <p class="font-semibold">Shayna</p>
                    </div>
                    <p class="text-sm text-[#475466]">e-Wedding has made our wedding day perfect from start to finish. Thank you for making our dream wedding come true!</p>
                    <div class="flex gap-[2px]">
                        <div>
                            <img src="assets/icon/star.svg" alt="star">
                        </div>
                        <div>
                            <img src="assets/icon/star.svg" alt="star">
                        </div>
                        <div>
                            <img src="assets/icon/star.svg" alt="star">
                        </div>
                        <div>
                            <img src="assets/icon/star.svg" alt="star">
                        </div>
                        <div>
                            <img src="assets/icon/star.svg" alt="star">
                        </div>
                    </div>
                    </div>
                    <div class="test-card w-[300px] flex flex-col h-full bg-white rounded-xl gap-3 p-5">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 flex shrink-0 rounded-full overflow-hidden">
                            <img src="assets/photo/photo4.png" class="w-full h-full object-cover" alt="photo">
                        </div>
                        <p class="font-semibold">Shayna</p>
                    </div>
                    <p class="text-sm text-[#475466]">e-Wedding has made our wedding day perfect from start to finish. Thank you for making our dream wedding come true!</p>
                    <div class="flex gap-[2px]">
                        <div>
                            <img src="assets/icon/star.svg" alt="star">
                        </div>
                        <div>
                            <img src="assets/icon/star.svg" alt="star">
                        </div>
                        <div>
                            <img src="assets/icon/star.svg" alt="star">
                        </div>
                        <div>
                            <img src="assets/icon/star.svg" alt="star">
                        </div>
                        <div>
                            <img src="assets/icon/star.svg" alt="star">
                        </div>
                    </div>
                    </div>
                    <div class="test-card w-[300px] flex flex-col h-full bg-white rounded-xl gap-3 p-5">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 flex shrink-0 rounded-full overflow-hidden">
                            <img src="assets/photo/photo4.png" class="w-full h-full object-cover" alt="photo">
                        </div>
                        <p class="font-semibold">Shayna</p>
                    </div>
                    <p class="text-sm text-[#475466]">e-Wedding has made our wedding day perfect from start to finish. Thank you for making our dream wedding come true!</p>
                    <div class="flex gap-[2px]">
                        <div>
                            <img src="assets/icon/star.svg" alt="star">
                        </div>
                        <div>
                            <img src="assets/icon/star.svg" alt="star">
                        </div>
                        <div>
                            <img src="assets/icon/star.svg" alt="star">
                        </div>
                        <div>
                            <img src="assets/icon/star.svg" alt="star">
                        </div>
                        <div>
                            <img src="assets/icon/star.svg" alt="star">
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            <div class="group/slider flex flex-nowrap w-max items-center">
                <div class="logo-container animate-[slideToR_50s_linear_infinite] group-hover/slider:pause-animate flex gap-6 pl-6 items-center flex-nowrap">
                    <div class="test-card w-[300px] flex flex-col h-full bg-white rounded-xl gap-3 p-5">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 flex shrink-0 rounded-full overflow-hidden">
                            <img src="assets/photo/photo4.png" class="w-full h-full object-cover" alt="photo">
                        </div>
                        <p class="font-semibold">Shayna</p>
                    </div>
                    <p class="text-sm text-[#475466]">e-Wedding has made our wedding day perfect from start to finish. Thank you for making our dream wedding come true!</p>
                    <div class="flex gap-[2px]">
                        <div>
                            <img src="assets/icon/star.svg" alt="star">
                        </div>
                        <div>
                            <img src="assets/icon/star.svg" alt="star">
                        </div>
                        <div>
                            <img src="assets/icon/star.svg" alt="star">
                        </div>
                        <div>
                            <img src="assets/icon/star.svg" alt="star">
                        </div>
                        <div>
                            <img src="assets/icon/star.svg" alt="star">
                        </div>
                    </div>
                    </div>
                    <div class="test-card w-[300px] flex flex-col h-full bg-white rounded-xl gap-3 p-5">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 flex shrink-0 rounded-full overflow-hidden">
                                <img src="assets/photo/photo4.png" class="w-full h-full object-cover" alt="photo">
                            </div>
                            <p class="font-semibold">Shayna</p>
                        </div>
                        <p class="text-sm text-[#475466]">e-Wedding has made our wedding day perfect from start to finish. Thank you for making our dream wedding come true!</p>
                        <div class="flex gap-[2px]">
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                        </div>
                    </div>
                    <div class="test-card w-[300px] flex flex-col h-full bg-white rounded-xl gap-3 p-5">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 flex shrink-0 rounded-full overflow-hidden">
                                <img src="assets/photo/photo4.png" class="w-full h-full object-cover" alt="photo">
                            </div>
                            <p class="font-semibold">Shayna</p>
                        </div>
                        <p class="text-sm text-[#475466]">e-Wedding has made our wedding day perfect from start to finish. Thank you for making our dream wedding come true!</p>
                        <div class="flex gap-[2px]">
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                        </div>
                    </div>
                    <div class="test-card w-[300px] flex flex-col h-full bg-white rounded-xl gap-3 p-5">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 flex shrink-0 rounded-full overflow-hidden">
                                <img src="assets/photo/photo4.png" class="w-full h-full object-cover" alt="photo">
                            </div>
                            <p class="font-semibold">Shayna</p>
                        </div>
                        <p class="text-sm text-[#475466]">e-Wedding has made our wedding day perfect from start to finish. Thank you for making our dream wedding come true!</p>
                        <div class="flex gap-[2px]">
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="logo-container animate-[slideToR_50s_linear_infinite] group-hover/slider:pause-animate flex gap-6 pl-6 items-center flex-nowrap ">
                    <div class="test-card w-[300px] flex flex-col h-full bg-white rounded-xl gap-3 p-5">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 flex shrink-0 rounded-full overflow-hidden">
                                <img src="assets/photo/photo4.png" class="w-full h-full object-cover" alt="photo">
                            </div>
                            <p class="font-semibold">Shayna</p>
                        </div>
                        <p class="text-sm text-[#475466]">e-Wedding has made our wedding day perfect from start to finish. Thank you for making our dream wedding come true!</p>
                        <div class="flex gap-[2px]">
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                        </div>
                    </div>
                    <div class="test-card w-[300px] flex flex-col h-full bg-white rounded-xl gap-3 p-5">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 flex shrink-0 rounded-full overflow-hidden">
                                <img src="assets/photo/photo4.png" class="w-full h-full object-cover" alt="photo">
                            </div>
                            <p class="font-semibold">Shayna</p>
                        </div>
                        <p class="text-sm text-[#475466]">e-Wedding has made our wedding day perfect from start to finish. Thank you for making our dream wedding come true!</p>
                        <div class="flex gap-[2px]">
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                        </div>
                    </div>
                    <div class="test-card w-[300px] flex flex-col h-full bg-white rounded-xl gap-3 p-5">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 flex shrink-0 rounded-full overflow-hidden">
                                <img src="assets/photo/photo4.png" class="w-full h-full object-cover" alt="photo">
                            </div>
                            <p class="font-semibold">Shayna</p>
                        </div>
                        <p class="text-sm text-[#475466]">e-Wedding has made our wedding day perfect from start to finish. Thank you for making our dream wedding come true!</p>
                        <div class="flex gap-[2px]">
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                        </div>
                    </div>
                    <div class="test-card w-[300px] flex flex-col h-full bg-white rounded-xl gap-3 p-5">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 flex shrink-0 rounded-full overflow-hidden">
                                <img src="assets/photo/photo4.png" class="w-full h-full object-cover" alt="photo">
                            </div>
                            <p class="font-semibold">Shayna</p>
                        </div>
                        <p class="text-sm text-[#475466]">e-Wedding has made our wedding day perfect from start to finish. Thank you for making our dream wedding come true!</p>
                        <div class="flex gap-[2px]">
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="FAQ" class="max-w-[1200px] mx-auto flex flex-col py-[70px] px-[100px]">
        <div class="flex justify-between items-center">
            <div class="flex flex-col gap-[30px]">
                <div class="gradient-badge w-fit p-[8px_16px] rounded-full border border-[#FED6AD] flex items-center gap-[6px]">
                    <div>
                        <img src="assets/icon/medal-star.svg" alt="icon">
                    </div>
                    <p class="font-medium text-sm text-[#FF6129]">Plan Your Dream Wedding</p>
                </div>
                <div class="flex flex-col">
                    <h2 class="font-bold text-[36px] leading-[52px]">Get Your Answers</h2>
                    <p class="text-lg text-[#475466]">It’s time to create unforgettable moments without limits!</p>
                </div>
                <a href="" class="text-white font-semibold rounded-[30px] p-[16px_32px] bg-[#FF6129] transition-all duration-300 hover:shadow-[0_10px_20px_0_#FF612980] w-fit">Contact Our Planner</a>
            </div>
            <div class="flex flex-col gap-[30px] w-[552px] shrink-0">
                <div class="flex flex-col p-5 rounded-2xl bg-[#FFF8F4] has-[.hide]:bg-transparent border-t-4 border-[#FF6129] has-[.hide]:border-0 w-full">
                    <button class="accordion-button flex justify-between gap-1 items-center" data-accordion="accordion-faq-1">
                        <span class="font-semibold text-lg text-left">Can you organize a wedding for a small budget?</span>
                        <div class="arrow w-9 h-9 flex shrink-0">
                            <img src="assets/icon/add.svg" alt="icon">
                        </div>
                    </button>
                    <div id="accordion-faq-1" class="accordion-content hide">
                        <p class="leading-[30px] text-[#475466] pt-[10px]">Yes, we have provided a variety range of course from beginner to intermediate level to prepare your next big career,</p>
                    </div>
                </div>
                <div class="flex flex-col p-5 rounded-2xl bg-[#FFF8F4] has-[.hide]:bg-transparent border-t-4 border-[#FF6129] has-[.hide]:border-0 w-full">
                    <button class="accordion-button flex justify-between gap-1 items-center" data-accordion="accordion-faq-2">
                        <span class="font-semibold text-lg text-left">How long does it take to plan a wedding?</span>
                        <div class="arrow w-9 h-9 flex shrink-0">
                            <img src="assets/icon/add.svg" alt="icon">
                        </div>
                    </button>
                    <div id="accordion-faq-2" class="accordion-content hide">
                        <p class="leading-[30px] text-[#475466] pt-[10px]">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolore placeat ut nostrum aperiam mollitia tempora aliquam perferendis explicabo eligendi commodi.</p>
                    </div>
                </div>
                <div class="flex flex-col p-5 rounded-2xl bg-[#FFF8F4] has-[.hide]:bg-transparent border-t-4 border-[#FF6129] has-[.hide]:border-0 w-full">
                    <button class="accordion-button flex justify-between gap-1 items-center" data-accordion="accordion-faq-3">
                        <span class="font-semibold text-lg text-left">Do you offer different wedding packages?</span>
                        <div class="arrow w-9 h-9 flex shrink-0">
                            <img src="assets/icon/add.svg" alt="icon">
                        </div>
                    </button>
                    <div id="accordion-faq-3" class="accordion-content hide">
                        <p class="leading-[30px] text-[#475466] pt-[10px]">Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae itaque facere ipsum animi sunt iure!</p>
                    </div>
                </div>
                <div class="flex flex-col p-5 rounded-2xl bg-[#FFF8F4] has-[.hide]:bg-transparent border-t-4 border-[#FF6129] has-[.hide]:border-0 w-full">
                    <button class="accordion-button flex justify-between gap-1 items-center" data-accordion="accordion-faq-4">
                        <span class="font-semibold text-lg text-left">How do you handle wedding invitations and RSVPs?</span>
                        <div class="arrow w-9 h-9 flex shrink-0">
                            <img src="assets/icon/add.svg" alt="icon">
                        </div>
                    </button>
                    <div id="accordion-faq-4" class="accordion-content hide">
                        <p class="leading-[30px] text-[#475466] pt-[10px]">Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae itaque facere ipsum animi sunt iure!</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer class="max-w-[1200px] mx-auto flex flex-col pt-[70px] pb-[50px] px-[100px] gap-[50px] bg-[#F5F8FA] rounded-[32px]">
        <div class="flex justify-between">
            <a href="">
                <div>
                    <img src="assets/logo/logo-black.svg" alt="logo">
                </div>
            </a>
            <div class="flex flex-col gap-5">
                <p class="font-semibold text-lg"></p>
                <ul class="flex flex-col gap-[14px]">
                    <li>
                        <a href="" class="text-[#6D7786]">Email</a>
                    </li>
                    <li>
                        <a href="" class="text-[#6D7786]">Phone Number</a>
                    </li>
                </ul>
            </div>
            <div class="flex flex-col gap-5">
                <p class="font-semibold text-lg"></p>
                <ul class="flex flex-col gap-[14px]">
                    
                    <li>
                        <a href="" class="text-[#6D7786]">Email</a>
                    </li>
                    <li>
                        <a href="" class="text-[#6D7786]">Maps</a>
                    </li>
                </ul>
            </div>
            <div class="flex flex-col gap-5">
                <p class="font-semibold text-lg"></p>
                <ul class="flex flex-col gap-[14px]">
                    <li>
                        <a href="" class="text-[#6D7786]">Instagram</a>
                    </li>
                    <li>
                        <a href="" class="text-[#6D7786]">Youtube</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="w-full h-[51px] flex items-end border-t border-[#E7EEF2]">
            <p class="mx-auto text-sm text-[#6D7786] -tracking-[2%]">All Rights Reserved e-Wedding 2024</p>
        </div>
    </footer>

    <!-- JavaScript -->
    <script
        src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
        crossorigin="anonymous"></script>
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    
</body>
</html>