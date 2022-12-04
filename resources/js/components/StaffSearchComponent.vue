<template>
    <div>
        <input class="form-control" name="staff_email" type="email" v-model="keyword" @input="handleInput">
        <ul class="list-group" v-if="Users.length > 0">
            <a role="button">
                <li class="list-group-item" v-for="user in Users" :key="user.id" v-text="user.email" @click="autocomplete(user.email)"></li>
            </a>
        </ul>
    </div>
</template>
<script>
export default {
    data() {
        return {
            keyword: null,
            Users: []
        };
    },
    watch: {
        keyword(after, before) {
            this.getResults();
        }
    },
    methods: {
        getResults() {
            axios.get('/staff-search', { params: { keyword: this.keyword } })
                .then(res => this.Users = res.data)
                .catch(error => { });
        },
        handleInput(userInput) {
            this.getResults();
        },
        autocomplete(email) {
            // Change "keyword" programmatically
            this.keyword = email;

            // Reset to hide autocomplete list
            this.Users = [];
        }
    }
}
</script>