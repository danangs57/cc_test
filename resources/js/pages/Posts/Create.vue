<script setup lang="ts">
import { Head, Link, useForm, router } from '@inertiajs/vue3';
import { ref, onMounted, nextTick } from 'vue';
import Quill from 'quill';
import 'quill/dist/quill.snow.css';

const form = useForm({
  title: '',
  content: '',
});

const editor = ref();
const editorContainer = ref();
const quillInitialized = ref(false);
const quillError = ref('');

onMounted(async () => {
  await nextTick();
  if (!quillInitialized.value) {
    try {
      editor.value = new Quill(editorContainer.value, {
        theme: 'snow',
        placeholder: 'Write your post content here...'
      });
      editor.value.on('text-change', () => {
        form.content = editor.value.root.innerHTML;
      });
      quillInitialized.value = true;
    } catch (e) {
      quillError.value = 'Failed to initialize editor.';
      console.error('Failed to initialize Quill:', e);
    }
  }
});

function logout() {
  router.post('/logout');
}
</script>

<template>
  <Head title="Create Post" />
  <div class="min-h-screen bg-gradient-to-br from-gray-100 to-gray-200 py-16 flex flex-col min-h-screen">
    <div class="max-w-2xl w-full mx-auto flex-1">
      <div class="mb-10 text-center">
        <h1 class="text-5xl font-extrabold text-gray-900 mb-2">Create Post</h1>
        <p class="text-gray-500 text-lg">Share your thoughts with the world</p>
      </div>
      <form @submit.prevent="form.post('/posts')" class="space-y-8 bg-white p-10 rounded-3xl shadow-2xl border border-gray-100">
        <div>
          <label class="block font-semibold mb-2 text-gray-700 text-lg">Title</label>
          <input v-model="form.title" type="text" class="w-full border border-gray-300 rounded-lg px-4 py-3 text-lg focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition" required />
        </div>
        <div>
          <label class="block font-semibold mb-2 text-gray-700 text-lg">Content</label>
          <div ref="editorContainer" class="bg-white border border-gray-300 rounded-lg min-h-[250px] shadow p-4 focus-within:border-blue-500 focus-within:ring-2 focus-within:ring-blue-100 transition text-lg" style="min-height: 300px;"></div>
          <div v-if="quillError" class="text-red-500 mt-2">{{ quillError }}</div>
        </div>
        <div class="flex gap-4 justify-end">
          <button type="submit" class="bg-blue-600 text-white px-8 py-3 rounded-lg font-bold shadow hover:bg-blue-700 transition text-lg">Create</button>
          <Link href="/posts" class="text-gray-600 hover:underline self-center font-semibold text-lg">Cancel</Link>
        </div>
      </form>
    </div>
    <footer class="mt-16 text-center text-gray-400 text-base py-8">&copy; {{ new Date().getFullYear() }} CC Blog Test. All rights reserved.</footer>
  </div>
</template> 