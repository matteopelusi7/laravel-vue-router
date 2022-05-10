<template>
    <div class="py-12">
        <div class="container pb-5">
            <h1>Ultimi post</h1>
        </div>
        <div class="container grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 pb-7">
            <PostCard v-for="post in posts" :key="post.id" :post="post"/>
        </div>
        <div class="container py-4">
            <ul class="pagination flex justify-center gap-4 item-center">
                <li @click="fetchPosts(n)" :class="[ currentPage === n ? 'bg-orange-400' : 'bg-white-400', 'dot bg-white/30 rounded-full cursor-pointer h-10 w-10 flex items-center justify-center text-sm']" v-for="n in lastPage" :key="n">{{ n }}</li>
            </ul>
        </div>
    </div>
</template>

<script>
import Axios from "axios"
import PostCard from '../components/PostCard.vue'

export default {
    components: {
        PostCard,
    },
    data() {
        return {
            posts: [],
            lastPage: 0,
            currentPage: 1
        }
    },
    methods: {
        fetchPosts( page = 1 ) {

            Axios.get('/api/posts', {
                params: {
                    page
                }
            })
            .then( res => {
                const {posts} = res.data
                const {data, last_page, current_page} = posts
                this.posts = data
                this.currentPage = current_page
                this.lastPage = last_page
            })
            .catch( err => {
                console.warn(err)
            })

        }
    },
    mounted() {
        this.fetchPosts()
    }
}
</script>

<style lang="scss" scoped>
    
</style>