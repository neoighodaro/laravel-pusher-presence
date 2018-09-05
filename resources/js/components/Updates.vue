<template>
    <div class="my-3 p-3 bg-white rounded shadow-sm">
        <h6 class="border-bottom border-gray pb-2 mb-0">Recent updates</h6>
        <div class="media text-muted pt-3" v-if="updates.length == 0">
            Loading updates...
        </div>
        <div class="media text-muted pt-3 pb-3 border-bottom border-grey" v-else>
            <form class="form-inline" v-on:submit.prevent="addUpdate">
                <div class="form-group mr-2">
                    <input type="text" class="form-control" v-model="update" placeholder="What's happening?">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
        <div class="media text-muted pt-3" v-for="update in updates" :key="update.id">
            <img :src="update.user.avatar" :alt="update.user.name" class="size-32 mr-2 rounded">
            <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                <strong class="d-block text-gray-dark">{{ update.user.name }}</strong>
                {{ update.text }}
            </p>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Updates',
    data() {
        return {
            update: '',
            updates: [],
        }
    },
    mounted () {
        axios.get('/updates').then(res => (this.updates = res.data))
        Echo.private('updates').listen('UpdateCreated', r => this.updates.unshift(r.update))
    },
    methods: {
        addUpdate () {
            if (this.update.trim() !== '') {
                axios.post('/updates', {text: this.update}).then(res => {
                    this.update = ''
                    this.updates.unshift(res.data)
                })
            }
        }
    }
}
</script>
