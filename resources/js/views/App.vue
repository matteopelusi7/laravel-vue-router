<template>
    <div class="app bg-zinc-800 text-white">
       <header class="flex justify-center py-5">
           <nav>
               <ul class="flex gap-7 cursor-pointer">
                   <li>Home</li>
                   <li>Posts</li>
                   <li>Categories</li>
               </ul>
           </nav>
       </header>
       <PostsGrid />
       <footer class="py-7">
           <div class="container flex justify-end">
               &copy; Boolpress 2022
           </div>
       </footer>
    </div>
</template>

<script>

import PostsGrid from './Posts.index.vue'

export default {
    components: {
        PostsGrid,
    }
}
</script>

<style lang="scss" scoped>

.app {
    min-height: 100vh;
}
    
</style>