<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login - Smart Quiz Generator</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen flex items-center justify-center bg-cover bg-center relative"
    style="background-image: url('https://i.ibb.co.com/bMP1jxh4/Untitled.png');">

    <div class="absolute inset-0 bg-black/90"></div>

    <div class="relative z-10 w-full max-w-4xl px-6">
        <h1 class="text-6xl font-extrabold text-center text-[#512CDF] mb-10">
            MASUK
        </h1>

        <div class="bg-white/25 backdrop-blur-md rounded-3xl p-10 shadow-2xl">
            <div class="max-w-md mx-auto bg-white rounded-3xl p-10 shadow-xl">

                <h2 class="text-center text-2xl font-bold text-slate-700">
                    Selamat Datang
                </h2>

                <h3 class="text-center text-3xl font-extrabold text-[#512CDF] mt-2 mb-8">
                    Smart Quiz Generator
                </h3>

                <form method="POST" action="{{ route('login') }}" onsubmit="disableLoginButton()">
    @csrf

                    <input 
                        type="email"
                        name="email"
                        placeholder="Email"
                        class="w-full rounded-xl border-gray-300 mb-4"
                        required autofocus>

                    <input 
                        type="password"
                        name="password"
                        placeholder="Password"
                        class="w-full rounded-xl border-gray-300 mb-4"
                        required>

                    <div class="flex justify-between items-center mb-6 text-sm">
                        <label>
                            <input type="checkbox" name="remember">
                            Ingat Saya
                        </label>

                        <a href="{{ route('password.request') }}" class="text-[#512CDF]">
                            Lupa Password?
                        </a>
                    </div>

                    <button id="loginBtn" class="w-full bg-[#512CDF] text-white py-3 rounded-xl font-bold">
                        Login
                    </button>

                    <a href="/" class="block text-center mt-6 text-[#512CDF]">
                        Kembali Ke Halaman Awal
                    </a>
                </form>
            </div>

            <p class="text-center text-white mt-6">
                Belum Punya Akun?
                <a href="{{ route('register') }}" class="font-bold text-purple-200">
                    Register
                </a>
            </p>
        </div>
    </div>
<script>
function disableLoginButton() {
    const btn = document.getElementById('loginBtn');
    btn.disabled = true;
    btn.innerText = 'Loading...';
    btn.classList.add('opacity-50', 'cursor-not-allowed');
}
</script>
</body>
</html>