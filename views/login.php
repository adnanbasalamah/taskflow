<div class="bg-gradient-to-br from-indigo-50 via-white to-purple-50 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900 min-h-screen flex items-center justify-center p-4">
  <div class="w-full max-w-sm" x-data="authApp()">
    <div class="text-center mb-8">
      <div class="w-16 h-16 bg-gradient-to-br from-indigo-400 to-purple-500 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg shadow-indigo-200">
        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
        </svg>
      </div>
      <h1 class="text-2xl font-bold text-gray-800">TaskFlow</h1>
      <p class="text-sm text-gray-400 mt-1" x-text="isRegister ? 'Buat akun baru' : 'Atur tugasmu, selesaikan tepat waktu'"></p>
    </div>

    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 p-6 border border-gray-100">
      <div x-show="error" x-text="error" class="mb-4 p-3 bg-red-50 border border-red-200 rounded-xl text-sm text-red-600"></div>
      <div x-show="success" class="mb-4 p-3 bg-emerald-50 border border-emerald-200 rounded-xl text-sm text-emerald-600">Pendaftaran berhasil! Mengalihkan...</div>

      <form class="space-y-4" @submit.prevent="isRegister ? register() : login()">
        <div>
          <label class="block text-sm font-medium text-gray-600 mb-1.5">Username</label>
          <input type="text" x-model="username" placeholder="Masukkan username"
            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100 outline-none transition text-sm bg-gray-50/50">
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-600 mb-1.5">Password</label>
          <input type="password" x-model="password" placeholder="password"
            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100 outline-none transition text-sm bg-gray-50/50">
        </div>
        <button type="submit" :disabled="loading"
          class="w-full py-3 bg-gradient-to-r from-indigo-500 to-purple-600 text-white font-semibold rounded-xl hover:from-indigo-600 hover:to-purple-700 transition shadow-md shadow-indigo-200/50 disabled:opacity-50">
          <span x-text="loading ? 'Memuat...' : (isRegister ? 'Daftar' : 'Masuk')"></span>
        </button>
      </form>

      <p class="text-center text-sm text-gray-400 mt-6">
        <span x-text="isRegister ? 'Sudah punya akun? ' : 'Belum punya akun? '"></span>
        <a href="#" @click.prevent="toggleMode" class="text-indigo-500 font-medium hover:text-indigo-600" x-text="isRegister ? 'Masuk' : 'Daftar'"></a>
      </p>
    </div>
  </div>
</div>

<script>
function authApp() {
  return {
    isRegister: false,
    username: '',
    password: '',
    error: '',
    success: false,
    loading: false,
    toggleMode() {
      this.isRegister = !this.isRegister;
      this.error = '';
      this.success = false;
    },
    login() {
      this.error = '';
      if (!this.username || !this.password) {
        this.error = 'Username dan password harus diisi';
        return;
      }
      this.loading = true;
      fetch('api/login.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ username: this.username, password: this.password })
      })
      .then(res => res.json())
      .then(data => {
        if (data.error) {
          this.error = data.error;
        } else {
          window.location.href = '/';
        }
      })
      .catch(() => { this.error = 'Terjadi kesalahan. Coba lagi.'; })
      .finally(() => { this.loading = false; });
    },
    register() {
      this.error = '';
      if (!this.username || !this.password) {
        this.error = 'Semua field harus diisi';
        return;
      }
      if (this.username.length < 3) {
        this.error = 'Username minimal 3 karakter';
        return;
      }
      if (this.password.length < 6) {
        this.error = 'Password minimal 6 karakter';
        return;
      }
      this.loading = true;
      fetch('api/register.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ username: this.username, password: this.password })
      })
      .then(res => res.json())
      .then(data => {
        if (data.error) {
          this.error = data.error;
        } else {
          this.success = true;
          setTimeout(() => {
            this.isRegister = false;
            this.success = false;
            this.username = '';
            this.password = '';
          }, 1500);
        }
      })
      .catch(() => { this.error = 'Terjadi kesalahan. Coba lagi.'; })
      .finally(() => { this.loading = false; });
    }
  }
}
</script>
