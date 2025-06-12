<script setup lang="ts">
import { Head, Link, router } from '@inertiajs/vue3';

defineProps<{ posts: any }>();

function logout() {
  router.post('/logout');
}
</script>

<template>
  <Head title="Posts" />
  <div class="min-h-screen bg-gray-100 bg-[url('https://www.toptal.com/designers/subtlepatterns/patterns/symphony.png')] py-12 flex flex-col min-h-screen">
    <div class="max-w-5xl mx-auto flex-1">
      <div class="flex items-center justify-between mb-8">
        <div>
          <h1 class="text-4xl font-bold tracking-tight text-gray-900">CC Blog Test</h1>
        </div>
        <div class="flex items-center gap-4">
          <Link href="/posts/create" class="inline-flex items-center gap-2 bg-blue-600 text-white px-5 py-2 rounded shadow hover:bg-blue-700 transition font-semibold"><svg xmlns='http://www.w3.org/2000/svg' class='h-5 w-5' fill='none' viewBox='0 0 24 24' stroke='currentColor'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M12 4v16m8-8H4' /></svg>Create Post</Link>
          <button @click="logout" class="inline-flex items-center gap-2 bg-white text-gray-600 border px-5 py-2 rounded font-semibold shadow hover:bg-gray-100 transition"><svg xmlns='http://www.w3.org/2000/svg' class='h-5 w-5' fill='none' viewBox='0 0 24 24' stroke='currentColor'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M17 16l4-4m0 0l-4-4m4 4H7' /></svg>Logout</button>
        </div>
      </div>
      <div class="grid gap-8 md:grid-cols-2">
        <div v-for="post in posts.data" :key="post.id" class="bg-white rounded-2xl shadow-xl p-8 border border-gray-200 flex flex-col justify-between min-h-[200px] transition-transform hover:-translate-y-1 hover:shadow-2xl group">
          <div class="flex items-center mb-4">
            <div class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center mr-3">
              <svg xmlns='http://www.w3.org/2000/svg' class='h-6 w-6 text-gray-400' fill='none' viewBox='0 0 24 24' stroke='currentColor'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M5.121 17.804A13.937 13.937 0 0112 15c2.5 0 4.847.655 6.879 1.804M15 11a3 3 0 11-6 0 3 3 0 016 0z' /></svg>
            </div>
            <div>
              <div class="text-gray-900 font-bold text-base">{{ post.user?.name || 'Unknown' }}</div>
              <div class="text-gray-400 text-xs">{{ new Date(post.created_at).toLocaleDateString() }}</div>
            </div>
          </div>
          <div>
            <Link :href="`/posts/${post.id}`" class="text-2xl font-bold text-gray-900 hover:text-blue-700 group-hover:underline">{{ post.title }}</Link>
          </div>
          <div class="mt-6 flex gap-3">
            <Link :href="`/posts/${post.id}/edit`" class="bg-gray-200 text-gray-800 px-4 py-1 rounded font-semibold shadow hover:bg-gray-300 transition">Edit</Link>
          </div>
        </div>
      </div>
    </div>
    <footer class="mt-12 text-center text-gray-400 text-sm py-6">&copy; {{ new Date().getFullYear() }} CC Blog Test. All rights reserved.</footer>
  </div>
</template> 