<template>
    <ul class="nav float-right">
        <li class="nav-link squished">Online Users</li>
        <li class="nav-link squished" href="#" v-for="user in users" :key="user.id">
            <img class="avatar" :src="user.avatar" :alt="user.name">
        </li>
    </ul>
</template>

<script>
export default {
    name: 'OnlineList',
    props: ['me'],
    data () {
        return {
            users: []
        }
    },
    mounted () {
        this.users.push(this.me)
        Echo.join('online')
            .here(users => (this.users = users))
            .joining(user => this.users.push(user))
            .leaving(user => (this.users = this.users.filter(u => (u.id !== user.id))))
    }
}
</script>
