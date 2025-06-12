<script setup lang="ts">
import { Head, Link, router } from '@inertiajs/vue3';
import 'quill/dist/quill.snow.css';
defineProps<{ post: any }>();

function logout() {
  router.post('/logout');
}
</script>

<template>
  <Head :title="post.title" />
  <div class="min-h-screen bg-gradient-to-br from-gray-100 to-gray-200 py-16 flex flex-col min-h-screen">
    <div class="max-w-3xl w-full mx-auto flex-1">
      <div class="flex items-center justify-between mb-10">
        <Link href="/posts" class="inline-flex items-center gap-2 text-gray-700 px-4 py-2 rounded-lg font-semibold hover:bg-gray-200 transition border border-gray-300 shadow-sm"><svg xmlns='http://www.w3.org/2000/svg' class='h-5 w-5' fill='none' viewBox='0 0 24 24' stroke='currentColor'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M15 19l-7-7 7-7' /></svg>Back</Link>
        <button @click="logout" class="inline-flex items-center gap-2 bg-white text-gray-600 border px-4 py-2 rounded-lg font-semibold shadow hover:bg-gray-100 transition"><svg xmlns='http://www.w3.org/2000/svg' class='h-5 w-5' fill='none' viewBox='0 0 24 24' stroke='currentColor'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M17 16l4-4m0 0l-4-4m4 4H7' /></svg>Logout</button>
      </div>
      <article class="bg-white rounded-3xl shadow-2xl p-14 border border-gray-100 relative">
        <header class="flex items-center mb-10">
          <div class="w-16 h-16 rounded-full bg-gray-200 flex items-center justify-center mr-6">
            <svg xmlns='http://www.w3.org/2000/svg' class='h-9 w-9 text-gray-400' fill='none' viewBox='0 0 24 24' stroke='currentColor'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M5.121 17.804A13.937 13.937 0 0112 15c2.5 0 4.847.655 6.879 1.804M15 11a3 3 0 11-6 0 3 3 0 016 0z' /></svg>
          </div>
          <div>
            <div class="text-gray-900 font-bold text-xl">{{ post.user?.name || 'Unknown' }}</div>
            <div class="text-gray-400 text-base">{{ new Date(post.created_at).toLocaleDateString() }}</div>
          </div>
        </header>
        <h1 class="text-5xl font-extrabold mb-8 text-gray-900 leading-tight">{{ post.title }}</h1>
        <div class="ql-snow ql-container rounded ql-disabled prose max-w-none text-gray-800 bg-white border-0 shadow-none p-3 text-xl leading-relaxed" v-html="post.content" style="min-height:350px;"></div>
      </article>
    </div>
    <footer class="mt-20 text-center text-gray-400 text-base py-8">&copy; {{ new Date().getFullYear() }} CC Blog Test. All rights reserved.</footer>
  </div>
</template> 