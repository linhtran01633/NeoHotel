<!DOCTYPE html>
<html>
<head>
    <title>Laravel with Ant Design</title>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <link href="https://unpkg.com/tailwindcss@^2.0/dist/tailwind.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.10.2/dist/cdn.min.js" defer></script>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
</head>
<body>
    <header class="h-[60px] sm:h-[84px] z-[2] bg-black text-gray-100">
        <div class="max-w-[1080px] h-[60px] sm:h-[84px] container flex justify-between mx-auto">
           <a aria-label="Back to homepage" class="flex items-center p-6" href="/en">
              <div class="relative w-[50px] h-[50px] sm:w-[75px] sm:h-[75px]"><img alt="neo-hotel-logo" loading="lazy" decoding="async" data-nimg="fill" style="position:absolute;height:100%;width:100%;left:0;top:0;right:0;bottom:0;color:transparent" sizes="100vw" srcset="/_next/image?url=%2Flogo.webp&amp;w=640&amp;q=100 640w, /_next/image?url=%2Flogo.webp&amp;w=750&amp;q=100 750w, /_next/image?url=%2Flogo.webp&amp;w=828&amp;q=100 828w, /_next/image?url=%2Flogo.webp&amp;w=1080&amp;q=100 1080w, /_next/image?url=%2Flogo.webp&amp;w=1200&amp;q=100 1200w, /_next/image?url=%2Flogo.webp&amp;w=1920&amp;q=100 1920w, /_next/image?url=%2Flogo.webp&amp;w=2048&amp;q=100 2048w, /_next/image?url=%2Flogo.webp&amp;w=3840&amp;q=100 3840w" src="/_next/image?url=%2Flogo.webp&amp;w=3840&amp;q=100"></div>
           </a>
           <div class="items-center justify-end flex-shrink-0 hidden lg:flex lg:flex-1">
              <ul class="items-stretch hidden lg:flex">
                 <li><a class="flex text-white self-baseline h-full active border-customColor text-customColor border-b-2 hover:text-customColor items-center mx-4 mb-1 " href="/en">Home</a></li>
                 <li><a class="flex text-white self-baseline h-full  hover:text-customColor items-center mx-4 mb-1 " href="/en/about-us">About us</a></li>
                 <li><a class="flex text-white self-baseline h-full  hover:text-customColor items-center mx-4 mb-1 " href="/en/services">Hotel concept &amp; service</a></li>
                 <li><a class="flex text-white self-baseline h-full  hover:text-customColor items-center mx-4 mb-1 " href="/en/rooms">Rooms</a></li>
                 <li><a class="flex text-white self-baseline h-full  hover:text-customColor items-center mx-4 mb-1 " href="/en/activities">Activities</a></li>
                 <li><a class="flex text-white self-baseline h-full  hover:text-customColor items-center mx-4 mb-1 " href="/en/faq">FAQ</a></li>
                 <li><a class="flex text-white self-baseline h-full  hover:text-customColor items-center mx-4 mb-1 " href="/en/contact">Contact</a></li>
              </ul>
              <div class="relative inline-block text-left" data-headlessui-state="">
                 <button class="items-center inline-flex w-[80px] justify-center rounded-md bg-black/20 px-4 py-2 text-sm font-medium text-white hover:bg-black/30 focus:outline-none focus-visible:ring-2 focus-visible:ring-white/75" id="headlessui-menu-button-:R34dta:" type="button" aria-haspopup="menu" aria-expanded="false" data-headlessui-state="">
                    <div class="w-5">
                       <svg xmlns="http://www.w3.org/2000/svg" id="flag-icons-gb" viewBox="0 0 640 480">
                          <path fill="#012169" d="M0 0h640v480H0z"></path>
                          <path fill="#FFF" d="m75 0 244 181L562 0h78v62L400 241l240 178v61h-80L320 301 81 480H0v-60l239-178L0 64V0z"></path>
                          <path fill="#C8102E" d="m424 281 216 159v40L369 281zm-184 20 6 35L54 480H0zM640 0v3L391 191l2-44L590 0zM0 0l239 176h-60L0 42z"></path>
                          <path fill="#FFF" d="M241 0v480h160V0zM0 160v160h640V160z"></path>
                          <path fill="#C8102E" d="M0 193v96h640v-96zM273 0v480h96V0z"></path>
                       </svg>
                    </div>
                    <span class="ml-2 text-white self-center hover:text-[#DBB98E]">EN</span>
                 </button>
              </div>
           </div>
           <div style="position:fixed;top:1px;left:1px;width:1px;height:0;padding:0;margin:-1px;overflow:hidden;clip:rect(0, 0, 0, 0);white-space:nowrap;border-width:0;display:none"></div>
           <button class="p-4 lg:hidden">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" class="h-7 w-7 text-gray-100">
                 <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"></path>
              </svg>
           </button>
        </div>
     </header>


     <div id="headlessui-portal-root">
        <div data-headlessui-portal="">
           <button type="button" data-headlessui-focus-guard="true" aria-hidden="true" style="position: fixed; top: 1px; left: 1px; width: 1px; height: 0px; padding: 0px; margin: -1px; overflow: hidden; clip: rect(0px, 0px, 0px, 0px); white-space: nowrap; border-width: 0px;"></button>
           <div>
              <div class="lg:hidden" id="headlessui-dialog-:R6dta:" role="dialog" aria-modal="true" data-headlessui-state="open">
                 <div class="fixed inset-0 z-50"></div>
                 <div class="shadow-md fixed flex flex-col justify-center right-0 h-[340px] w-[250px] inset-y-0 z-50 bg-white  p-6  sm:ring-1 sm:ring-gray-100/10" id="headlessui-dialog-panel-:rj:" data-headlessui-state="open">
                    <div class="flex items-center justify-between">
                       <button type="button" class="absolute left-[-20%] rounded-md p-2.5 text-customColor ">
                          <span class="sr-only">Close menu</span>
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" class="h-6 w-6">
                             <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                          </svg>
                       </button>
                    </div>
                    <div class="margin-auto flow-root">
                       <div class="divide-y divide-gray-200/10">
                          <div class="flex flex-col gap-y-4">
                             <li class="list-none"><a class="block text-xsContent rounded-lg text-base font-normal leading-tight hover:text-customColor active text-customColor " href="/en">Home</a></li>
                             <li class="list-none"><a class="block text-xsContent rounded-lg text-base font-normal leading-tight hover:text-customColor " href="/en/about-us">About us</a></li>
                             <li class="list-none"><a class="block text-xsContent rounded-lg text-base font-normal leading-tight hover:text-customColor " href="/en/services">Hotel concept &amp; service</a></li>
                             <li class="list-none"><a class="block text-xsContent rounded-lg text-base font-normal leading-tight hover:text-customColor " href="/en/rooms">Rooms</a></li>
                             <li class="list-none"><a class="block text-xsContent rounded-lg text-base font-normal leading-tight hover:text-customColor " href="/en/activities">Activities</a></li>
                             <li class="list-none"><a class="block text-xsContent rounded-lg text-base font-normal leading-tight hover:text-customColor " href="/en/faq">FAQ</a></li>
                             <li class="list-none"><a class="block text-xsContent rounded-lg text-base font-normal leading-tight hover:text-customColor " href="/en/contact">Contact</a></li>
                             <div class="relative inline-block text-left" data-headlessui-state="">
                                <button class="flex justify-start text-sm font-medium items-center" id="headlessui-menu-button-:rk:" type="button" aria-haspopup="menu" aria-expanded="false" data-headlessui-state="">
                                   <div class="w-5">
                                      <svg xmlns="http://www.w3.org/2000/svg" id="flag-icons-gb" viewBox="0 0 640 480">
                                         <path fill="#012169" d="M0 0h640v480H0z"></path>
                                         <path fill="#FFF" d="m75 0 244 181L562 0h78v62L400 241l240 178v61h-80L320 301 81 480H0v-60l239-178L0 64V0z"></path>
                                         <path fill="#C8102E" d="m424 281 216 159v40L369 281zm-184 20 6 35L54 480H0zM640 0v3L391 191l2-44L590 0zM0 0l239 176h-60L0 42z"></path>
                                         <path fill="#FFF" d="M241 0v480h160V0zM0 160v160h640V160z"></path>
                                         <path fill="#C8102E" d="M0 193v96h640v-96zM273 0v480h96V0z"></path>
                                      </svg>
                                   </div>
                                   <span class="ml-2 text-xsContent self-center hover:text-[#DBB98E]">EN</span>
                                   <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" class="-mr-1 ml-1 h-5 w-5">
                                      <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd"></path>
                                   </svg>
                                </button>
                             </div>
                          </div>
                       </div>
                    </div>
                 </div>
              </div>
           </div>
           <button type="button" data-headlessui-focus-guard="true" aria-hidden="true" style="position: fixed; top: 1px; left: 1px; width: 1px; height: 0px; padding: 0px; margin: -1px; overflow: hidden; clip: rect(0px, 0px, 0px, 0px); white-space: nowrap; border-width: 0px;"></button>
        </div>
     </div>
</body>
</html>
