<section id="home" class="relative py-40 flex flex-col items-center text-center overflow-hidden">
    <!-- Background image -->
    <div class="absolute inset-0 h-full w-full">
        <img src="/assets/bg-new.png" alt="Background" class="h-full object-cover object-center"
            style="width:100vw;max-width:100vw;left:0;right:0;">
        <!-- Gradient transparan putih di atas -->
        <div class="absolute inset-0 pointer-events-none"
            style="background: linear-gradient(to bottom, rgba(255,255,255,0.8) 0%, rgba(255,255,255,0.5) 70%, rgba(255,255,255,0) 95%);">
        </div>
    </div>
    <div class="relative z-10 flex flex-col items-center text-center mt-[-40px] animate-fadein">
        <img src="/assets/MAIN-LOGO.png" alt="BEM FT Logo" class="mx-auto mb-4 animate-fadein-logo"
            style="max-width:220px;width:100%;height:auto;aspect-ratio:16/9;object-fit:contain;">
        <h1 class="text-3xl md:text-5xl font-extrabold mb-2 animate-fadein-text">BEM FT UNWAHAS</h1>
        <h2 class="text-xl md:text-2xl font-bold mb-4 animate-fadein-text">Kabinet CAKRA AKSATA</h2>
    </div>
    <style>
        @keyframes fadein {
            0% {
                opacity: 0;
                transform: translateY(40px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fadein {
            animation: fadein 1s cubic-bezier(.4, 0, .2, 1) 0.1s both;
        }

        .animate-fadein-logo {
            animation: fadein 1.2s cubic-bezier(.4, 0, .2, 1) 0.2s both;
        }

        .animate-fadein-text {
            animation: fadein 1.4s cubic-bezier(.4, 0, .2, 1) 0.3s both;
        }

        .animate-fadein-btn {
            animation: fadein 1.6s cubic-bezier(.4, 0, .2, 1) 0.4s both;
        }
    </style>
    <!-- Animasi typing dihapus, judul tampil statis -->
</section>