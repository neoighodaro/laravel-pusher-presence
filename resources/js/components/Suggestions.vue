<template>
    <div class="my-3 p-3 bg-white rounded shadow-sm">
        <h6 class="border-bottom border-gray pb-2 mb-0">Suggestions</h6>
        <div class="media text-muted pt-3" v-if="users.length == 0">
            Loading users...
        </div>
        <div class="media text-muted pt-3" v-for="user in users" :key="user.id">
            <img :src="user.avatar" :alt="user.name" class="size-32 mr-2 rounded">
            <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                <div class="d-flex justify-content-between align-items-center w-100">
                    <strong class="text-gray-dark">{{ user.name }}</strong>
                    <a href="#">Follow</a>
                </div>
                <span class="d-block">Follow my updates</span>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Suggestions',
    data() {
        return {
            users: []
        }
    },
    mounted () {
        axios.get('/updates/suggestions').then(res => (this.users = res.data))
    }
}
</script>
