<template>
    <div>
        <div class="container">
            <h1>Ultimi post</h1>
        </div>
        <div class="container grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
            <PostCard v-for="post in posts" :key="post.id" :post="post"/>
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
            posts: []
        }
    },
    methods: {
        fetchPosts() {

            Axios.get('/api/posts')
            .then( res => {
                const {posts} = res.data
                this.posts = posts
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