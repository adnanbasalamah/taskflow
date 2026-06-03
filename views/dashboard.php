<div class="sticky top-0 bg-white border-b border-gray-100 z-10">
  <div class="flex items-center gap-2 px-4 py-2 max-w-lg md:max-w-5xl mx-auto">
    <h1 class="text-lg font-bold text-gray-800 dark:text-gray-200 shrink-0">TaskFlow</h1>
    <div class="flex-1 flex justify-center">
      <div class="relative w-full max-w-md">
        <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
        <input type="text" placeholder="Cari task..." x-model="searchQuery" @input="onSearchInput"
          class="w-full pl-9 pr-8 py-1.5 bg-gray-100 dark:bg-gray-700 rounded-lg text-sm text-gray-700 dark:text-gray-200 placeholder-gray-400 dark:placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-300 focus:bg-white dark:focus:bg-gray-700 transition">
        <button x-show="searchQuery.length > 0" @click="clearSearch" class="absolute right-2 top-1/2 -translate-y-1/2 text-gray-400 dark:text-gray-500 hover:text-gray-600 dark:hover:text-gray-300">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>
      </div>
    </div>
    <button @click="toggleTheme" class="w-10 h-10 rounded-lg flex items-center justify-center text-gray-500 hover:bg-black/5 transition shrink-0" title="Toggle tema">
      <svg x-show="theme === 'light'" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path>
      </svg>
      <svg x-show="theme === 'dark'" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>
      </svg>
    </button>
    <div @click="logout()" class="w-8 h-8 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-600 font-semibold text-sm cursor-pointer hover:bg-indigo-200 transition shrink-0" x-text="initial" title="Logout"></div>
  </div>
</div>

<div class="max-w-lg md:max-w-5xl mx-auto px-4 pb-8">
  <div class="mt-4 mb-3 overflow-x-auto">
    <div class="flex gap-2">
      <template x-for="f in filters" :key="f.value">
        <button class="filter-pill text-xs" :class="{ 'active': filter === f.value }" @click="filter = f.value" x-text="f.label"></button>
      </template>
    </div>
  </div>

  <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
    <template x-for="task in filteredTasks" :key="task.id">
      <div class="task-card rounded-[8px] p-4 border shadow-sm relative" :class="cardBg(task.state)">
        <div class="flex items-start justify-between mb-2">
          <h3 class="font-medium text-[#202124] text-sm cursor-pointer" @click="editTask(task.id)" x-text="task.title || 'Task'"></h3>
          <span class="status-pill px-2.5 py-0.5 rounded-full text-xs font-medium" :class="statusBg(task.state)" x-text="capitalize(task.state)"></span>
        </div>
          <div class="card-content text-[13px] text-[#3c4043] mb-3 cursor-pointer" @click="editTask(task.id)" x-html="task.content"></div>

        <template x-if="task.labels && task.labels.length">
          <div class="flex gap-1.5 flex-wrap mb-3">
            <template x-for="l in task.labels" :key="l.id">
              <span class="inline-block px-2 py-0.5 rounded text-[10px] font-medium text-white" :style="'background:' + l.color" x-text="l.name"></span>
            </template>
          </div>
        </template>

        <template x-if="task.state === 'delegate' && task.contacts && task.contacts.length">
          <div class="mb-3">
            <template x-for="c in task.contacts" :key="c.id">
              <a :href="'https://wa.me/' + c.phone.replace(/[^0-9]/g, '') + '?text=' + encodeURIComponent('Task: ' + (task.title || 'Task') + '\n' + task.content)"
                target="_blank"
                class="flex items-center gap-2 text-xs bg-green-100 text-green-700 px-3 py-1.5 rounded-lg hover:bg-green-200 transition mb-1.5 block">
                <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                <span x-text="'Kirim ke ' + c.name + ' via WA'"></span>
              </a>
            </template>
          </div>
        </template>

        <div class="flex justify-end">
          <button @click="editTask(task.id)" class="text-xs text-gray-400 hover:text-indigo-500 font-medium">Edit</button>
        </div>
      </div>
    </template>
    <div x-show="filteredTasks.length === 0" class="text-center py-12 text-gray-400 text-sm">
      Belum ada task <span x-text="filter !== 'semua' ? 'dengan status ini' : ''"></span>
    </div>
  </div>
</div>

<!-- Toast -->
<div x-show="toast.show" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="translate-y-4 opacity-0" x-transition:enter-end="translate-y-0 opacity-100" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="translate-y-0 opacity-100" x-transition:leave-end="translate-y-4 opacity-0"
  class="fixed bottom-24 left-1/2 -translate-x-1/2 z-50 px-4 py-2.5 rounded-lg text-sm font-medium shadow-lg"
  :class="toast.type === 'success' ? 'bg-green-600 text-white' : 'bg-red-600 text-white'"
  x-text="toast.message">
</div>

<!-- Floating add button -->
<button @click="createTask"
  class="fab fixed bottom-6 right-6 w-14 h-14 bg-blue-500 hover:bg-blue-600 text-white rounded-full shadow-lg hover:shadow-xl transition-all flex items-center justify-center z-30 active:scale-95">
  <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
</button>

<script>
function dashboardApp() {
  return {
    tasks: [],
    filter: 'semua',
    searchQuery: '',
    theme: localStorage.getItem('theme') || 'light',
    filters: [
      { label: 'Semua', value: 'semua' },
      { label: 'Todo', value: 'todo' },
      { label: 'Doing', value: 'doing' },
      { label: 'Delegate', value: 'delegate' },
      { label: 'Done', value: 'done' }
    ],
    initial: '',
    toast: { show: false, message: '', type: 'success' },
    _searchTimer: null,
    get filteredTasks() {
      if (this.filter === 'semua') return this.tasks;
      return this.tasks.filter(t => t.state === this.filter);
    },
    init() {
      this.checkAuth();
      this.fetchTasks();
    },
    onSearchInput() {
      clearTimeout(this._searchTimer);
      this._searchTimer = setTimeout(() => {
        this.fetchTasks(this.searchQuery);
      }, 300);
    },
    clearSearch() {
      this.searchQuery = '';
      this.fetchTasks();
    },
    toggleTheme() {
      this.theme = this.theme === 'light' ? 'dark' : 'light';
      localStorage.setItem('theme', this.theme);
      document.documentElement.classList.toggle('dark', this.theme === 'dark');
    },
    checkAuth() {
      fetch('api/session.php')
        .then(res => res.json())
        .then(data => {
          if (!data.authenticated) window.location.href = '/';
          else if (data.user?.username) this.initial = data.user.username[0].toUpperCase();
        });
    },
    fetchTasks(q) {
      let url = 'api/tasks/list.php';
      if (q) url += '?q=' + encodeURIComponent(q);
      fetch(url)
        .then(res => res.json())
        .then(data => {
          if (data.data) {
            this.tasks = data.data;
            this.tasks.forEach(t => this.loadContacts(t));
          }
        });
    },
    loadContacts(task) {
      fetch('api/tasks/contacts.php?task_id=' + task.id)
        .then(res => res.json())
        .then(data => {
          if (data.data) task.contacts = data.data;
        });
    },
    createTask() {
      window.location.href = '/?page=task';
    },
    editTask(id) {
      window.location.href = '/?page=task&id=' + id;
    },
    showToast(msg, type) {
      this.toast = { show: true, message: msg, type: type || 'success' };
      clearTimeout(this._toastTimer);
      this._toastTimer = setTimeout(() => { this.toast.show = false; }, 3000);
    },
    logout() {
      fetch('api/logout.php', { method: 'POST' })
        .then(() => { window.location.href = '/'; });
    },
    capitalize(s) { return s.charAt(0).toUpperCase() + s.slice(1); },
    cardBg(state) {
      const colors = { todo: 'bg-amber-50 border-amber-100', doing: 'bg-blue-50 border-blue-100', delegate: 'bg-purple-50 border-purple-100', done: 'bg-emerald-50 border-emerald-100 opacity-70' };
      return colors[state] || colors.todo;
    },
    statusBg(state) {
      const colors = { todo: 'bg-amber-200 text-amber-800', doing: 'bg-blue-200 text-blue-800', delegate: 'bg-purple-200 text-purple-800', done: 'bg-emerald-200 text-emerald-800' };
      return colors[state] || colors.todo;
    },
  }
}
</script>
